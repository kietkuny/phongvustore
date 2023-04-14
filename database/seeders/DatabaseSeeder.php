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
      'thumb' => 'https://scontent.fsgn2-4.fna.fbcdn.net/v/t39.30808-6/325613973_707256360966234_3290542666158986906_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=jwdu7_uMcgsAX_VoRKu&_nc_ht=scontent.fsgn2-4.fna&oh=00_AfCcsMaXx1UrRAbI_dvdKsE1IHbe9PUbG1L_fTYzEG70IA&oe=643C7950',
      'email_verified_at' => now(),
      'password' => Hash::make('123456'),
    ]);
  }
}
