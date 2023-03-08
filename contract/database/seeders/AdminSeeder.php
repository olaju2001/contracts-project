<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'first_name' => 'admin',
            'last_name' => 'user',
            'email' => 'admin@admin.com',
            'email_verified_at' =>now(),
            'password' => '$2y$10$gV.JF0qeuW9D6fA1N/9P1OtVNgc96sEInIeJMhUtYp1sSbZ0u8a1W',  // 123456789
            'role_id' => 1,
        ];

        User::create($admin);
    }
}
