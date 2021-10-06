<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
      /*  User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin2021'),
            'email_verified_at' => null,

        ]);*/

        // \App\Models\User::factory(10)->create();
         \App\Models\Property::factory(10)->create();
         \App\Models\Tenant::factory(10)->create();


    }
}
