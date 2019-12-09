<?php

namespace App\Http\View\Composers;

use App\Country;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class CountryComposer
{
    /**
     * @var Country
     */

    private $countries;
    public function __construct(Country $countries)
    {
        $this->countries = $countries;
    }
    public function compose(View $view)
    {
        $countries = Cache::remember('countries', 24 * 60, function () {
            return $this->countries->orderBy('name', 'asc')->select('id', 'name')->get();
        });
        return $view->with('countries', $countries);
    }
}