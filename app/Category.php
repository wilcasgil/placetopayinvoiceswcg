<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    //

    /**
     * products_services
     *
     * @return HasMany
     */
    public function subcategories(): HasMany
    {
        return $$this->hasMany(Subcategory::class);
    }
}
