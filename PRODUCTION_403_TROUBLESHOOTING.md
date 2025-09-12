# PRODUCTION 403 TROUBLESHOOTING GUIDE

## Masalah yang Terjadi
User dengan role "Donatur Buku" mengalami 403 Unauthorized saat:
1. Submit form donasi buku
2. Mengakses detail donasi 
3. Edit donasi
4. Modal detail donasi

## Analisis Berdasarkan Output Production

Dari output production terlihat:
- ✅ Role "Donatur Buku" ada (ID: 3)
- ✅ User "donatur@example.com" (Siti Nurhaliza) memiliki role "Donatur Buku"
- ✅ Permission system berfungsi normal
- ✅ Cache key "spatie.permission.cache" ada

## Kemungkinan Penyebab

### 1. Cache Permission Corruption
Meskipun cache ada, isinya mungkin corrupt atau tidak sinkron.

### 2. Session/Auth Issues
User mungkin ter-authenticate tapi session role tidak ter-load dengan benar.

### 3. Database Inconsistency
Model relationships atau foreign key constraints mungkin bermasalah.

### 4. Middleware Chain Issues
Middleware 'role:Donatur Buku' mungkin tidak berjalan dengan benar.

## Langkah Troubleshooting

### Step 1: Clear All Caches
```bash
# Di production, jalankan:
php artisan fix:production-cache
```

### Step 2: Debug Specific User
```bash
# Test user yang bermasalah:
php artisan debug:production-donation-403
```

### Step 3: Fix Role Assignments (jika diperlukan)
```bash
# Fix otomatis:
php artisan debug:production-donation-403 --fix
```

### Step 4: Verify Database
```bash
# Check role assignments:
php artisan debug:check-production-roles
```

### Step 5: Manual Cache Clear (jika command gagal)
```bash
# Di server production:
rm -rf storage/framework/cache/*
rm -rf storage/framework/views/*
rm -rf bootstrap/cache/*
```

### Step 6: Check File Permissions
```bash
# Pastikan direktori writable:
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
chown -R www-data:www-data storage/
chown -R www-data:www-data bootstrap/cache/
```

## Commands untuk Production

Jalankan command berikut secara berurutan di production:

```bash
# 1. Debug role assignments
php artisan debug:check-production-roles

# 2. Clear caches
php artisan fix:production-cache

# 3. Debug 403 issues
php artisan debug:production-donation-403

# 4. Fix issues if found
php artisan debug:production-donation-403 --fix

# 5. Assign missing roles
php artisan fix:assign-donators-role

# 6. Final cache clear
php artisan permission:cache-reset
php artisan cache:clear
```

## Testing After Fix

Setelah menjalankan commands di atas, test dengan user "donatur@example.com":

1. Login sebagai donatur
2. Akses halaman donasi
3. Submit form donasi baru
4. Akses history donasi
5. Edit donasi pending
6. Lihat detail donasi

## Jika Masih Error 403

### Check Log Files
```bash
# Check Laravel logs:
tail -f storage/logs/laravel.log

# Check web server logs:
tail -f /var/log/apache2/error.log
# atau
tail -f /var/log/nginx/error.log
```

### Database Check
```sql
-- Check user roles:
SELECT u.name, u.email, r.name as role_name 
FROM users u 
LEFT JOIN model_has_roles mhr ON u.id = mhr.model_id 
LEFT JOIN roles r ON mhr.role_id = r.id 
WHERE u.email = 'donatur@example.com';

-- Check recent donations:
SELECT * FROM book_donations 
WHERE donor_id = (SELECT id FROM users WHERE email = 'donatur@example.com')
ORDER BY created_at DESC LIMIT 5;
```

### Restart Services (jika memungkinkan)
```bash
# Restart web server
sudo systemctl restart apache2
# atau
sudo systemctl restart nginx

# Restart PHP-FPM
sudo systemctl restart php8.1-fpm
```

## Monitoring

Setelah fix, monitor untuk memastikan tidak ada error lagi:
```bash
# Monitor logs:
tail -f storage/logs/laravel.log | grep -i "403\|unauthorized\|permission"
```
