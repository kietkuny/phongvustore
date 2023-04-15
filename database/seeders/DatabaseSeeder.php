<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\UserType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    // \App\Models\User::factory(10)->create();
    UserType::factory()->create([
      'name' => 'Admin'
    ]);
    
    User::factory()->create([
      'name' => 'Tuấn Kiệt',
      'usertype_id' => 1,
      'cccd' => '056201009724',
      'phone' => '0987654321',
      'email' => 'admin@localhost.com',
      'thumb' => '/storage/uploads/admin/avatar.jpg',
      'email_verified_at' => now(),
      'password' => Hash::make('123456'),
    ]);
  }
}
