<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(env('APP_ENV') !== 'production' && User::where('email', 'user@test.com')->count() <= 0){
            User::factory(1)->create(
                [
                    'name' => 'Test User',
                    'email' => 'user@test.com',
                    'password' => Hash::make('secret'),
                    'company_name' => 'Example company, s. r. o.',
                    'company_address' => 'Address 17',
                    'company_postal_code' => '001 01',
                    'company_city' => 'Bratislava',
                    'company_country' => 'Slovensko',
                    'business_id' => '12 345 789',
                    'tax_id' => '2222 111 333',
                    'iban' => 'SK00 0000 0000 0000 0000 0000'
                ]
            );
        }
    }
}
