<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Member;
use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin user
        User::factory()->create([
            'name' => 'Admin Utama',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);

        // Members
        Member::create([
            'name' => 'Alvika Fradisi',
            'nim' => '2023101001',
            'email' => 'alvika@example.com',
            'phone' => '081234567890',
            'address' => 'Jl. Merdeka No. 1'
        ]);
        
        Member::create([
            'name' => 'Budi Santoso',
            'nim' => '2023101002',
            'email' => 'budi@example.com',
            'phone' => '089876543210',
            'address' => 'Jl. Sudirman No. 45'
        ]);

        // Books via BookSeeder
        $this->call([
            BookSeeder::class,
        ]);
    }
}
