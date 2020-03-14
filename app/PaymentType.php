<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaymentType extends Model
{
    /**
     * invoices.
     */
    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }
}
