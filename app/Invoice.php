<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    /**
     * paymentType.
     */
    public function paymentType(): BelongsTo
    {
        return $this->belongsTo(PaymentType::class);
    }

    /**
     * client.
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * invoiceState.
     */
    public function invoiceState(): BelongsTo
    {
        return $this->belongsTo(InvoiceState::class);
    }

    public function details(): HasMany
    {
        return $this->hasMany(Detail::class);
    }
}
