<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ContactController extends Controller
{
    /**
     * Redirect to admin phone number via WhatsApp
     */
    public function index()
    {
        // Get the first admin user with a phone number
        $admin = User::role('Admin')
            ->whereNotNull('phone')
            ->first();

        if (!$admin || !$admin->phone) {
            // Fallback: redirect to welcome page if no admin phone found
            return redirect()->route('welcome')
                ->with('error', 'Maaf, informasi kontak admin tidak tersedia saat ini.');
        }

        // Clean phone number (remove non-numeric characters except +)
        $phoneNumber = preg_replace('/[^0-9+]/', '', $admin->phone);
        
        // Convert to WhatsApp format if it's Indonesian number
        if (substr($phoneNumber, 0, 1) === '0') {
            $phoneNumber = '62' . substr($phoneNumber, 1);
        } elseif (substr($phoneNumber, 0, 3) !== '+62' && substr($phoneNumber, 0, 2) !== '62') {
            $phoneNumber = '62' . $phoneNumber;
        }
        
        // Remove + if exists
        $phoneNumber = str_replace('+', '', $phoneNumber);
        
        // Create WhatsApp URL
        $whatsappUrl = "https://wa.me/{$phoneNumber}?text=" . urlencode("Halo, saya ingin bertanya tentang program Rumah Literasi.");
        
        // Return a view that opens WhatsApp in new tab
        return view('pages.contact-redirect', [
            'whatsappUrl' => $whatsappUrl,
            'adminName' => $admin->name,
            'adminPhone' => $admin->phone
        ]);
    }
}
