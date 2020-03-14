<?php

use App\Country;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //factory(Country::class)->create();
        factory(Country::class)->create(['name' => 'Colombia']);
        factory(Country::class)->create(['name' => 'Francia']);
    }
}
