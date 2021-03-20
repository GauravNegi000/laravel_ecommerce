<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\City;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=5; $i++) {
            $country = Country::factory(1)->create();
            City::factory(5)->create([
                'country_id' => $country[0]->id,
            ]);
        }
    }
}
