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
                    'company_name' => 'DeMi Studio, s. r. o.',
                    'company_address' => 'Lomnická 26',
                    'company_postal_code' => '949 01',
                    'company_city' => 'Nitra',
                    'company_country' => 'Slovensko',
                    'business_id' => '51 037 483',
                    'tax_id' => '2120 569 319',
                    'iban' => 'SK02 1100 0000 0029 4904 3065'
                ]
            );
        }
    }
}
