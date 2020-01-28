<?php

namespace Tests\Unit;

use App\Country;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
//use PHPUnit\Framework\TestCase;

class CountryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCreateCountry()
    {
        $country = factory(Country::class)->create();
        
        $this->assertDatabaseMissing('countries', [
            'name' => $country->name,
            'active' => $country->active,
        ]);        
    }
}
