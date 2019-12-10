<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    //
    /**
     * Relation between country and customers
     * @return HasMany
     */
    public function customers(): HasMany
    {
        return $this->hasMany(Client::class);
    }
}
