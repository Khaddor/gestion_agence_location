<?php

namespace Database\Seeders;

use App\Models\Invoice;
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

         Invoice::create([
            'number' => 12000,
            'date' => '2021-04-07',
            'rent_type' => 'studio',
            'amount' => 15000,
            'payment_date' => '2019-05-06',
            'Property_id' => null,
            'Tenant_id' => null,
            'contract_id' => null,
            

        ]);


    }
}
