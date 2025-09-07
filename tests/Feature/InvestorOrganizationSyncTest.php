<?php

use App\Models\User;
use App\Models\Investor;
use Spatie\Permission\Models\Role;

test('investor company_name syncs with user organization when investor is updated', function () {
    // Create investor role if not exists
    Role::firstOrCreate(['name' => 'Investor']);
    
    // Create a user with investor role
    $user = User::factory()->create([
        'organization' => 'Old Organization'
    ]);
    $user->assignRole('Investor');
    
    // Create investor profile
    $investor = Investor::create([
        'user_id' => $user->id,
        'company_name' => 'New Company Name'
    ]);
    
    // Refresh user to get updated data
    $user->refresh();
    
    // Assert that user organization was synced
    expect($user->organization)->toBe('New Company Name');
});

test('user organization syncs with investor company_name when user is updated', function () {
    // Create investor role if not exists
    Role::firstOrCreate(['name' => 'Investor']);
    
    // Create a user with investor role
    $user = User::factory()->create([
        'organization' => 'Original Organization'
    ]);
    $user->assignRole('Investor');
    
    // Create investor profile
    $investor = Investor::create([
        'user_id' => $user->id,
        'company_name' => 'Original Company'
    ]);
    
    // Update user organization
    $user->update(['organization' => 'Updated Organization']);
    
    // Refresh investor to get updated data
    $investor->refresh();
    
    // Assert that investor company_name was synced
    expect($investor->company_name)->toBe('Updated Organization');
});

test('sync command works correctly', function () {
    // Create investor role if not exists
    Role::firstOrCreate(['name' => 'Investor']);
    
    // Create users with different states
    $user1 = User::factory()->create(['organization' => 'User Org 1']);
    $user1->assignRole('Investor');
    
    $user2 = User::factory()->create(['organization' => null]);
    $user2->assignRole('Investor');
    
    // Create investors with different states
    Investor::create([
        'user_id' => $user1->id,
        'company_name' => 'Different Company 1'
    ]);
    
    Investor::create([
        'user_id' => $user2->id,
        'company_name' => 'Company 2'
    ]);
    
    // Run sync command
    $this->artisan('sync:investor-organization');
    
    // Refresh models
    $user1->refresh();
    $user2->refresh();
    
    // Assert synchronization happened
    expect($user1->organization)->toBe('Different Company 1');
    expect($user2->organization)->toBe('Company 2');
});
