<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      User::create([
        'name' => 'Admin',
        'usertype_id' => 1,
        'cccd' => '056201009724',
        'phone' => '0987654321',
        'email' => 'admin@localhost.com',
        'password' => bcrypt('123456'),
        'email_verified_at' => now(),
      ]);
    }
}
