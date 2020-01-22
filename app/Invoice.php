<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    /**
     * paymentType
     *
     * @return BelongsTo
     */
    public function paymentType(): BelongsTo
    {
        return $this->belongsTo(PaymentType::class);
    }

    /**
     * client
     *
     * @return BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * invoiceState
     *
     * @return BelongsTo
     */
    public function invoiceState(): BelongsTo
    {
        return $this->belongsTo(InvoiceState::class);
    }

    public function details(): HasMany
    {
        return $this->hasMany(Detail::class);
    }

    //protected $fillable = ['invoice_state_id'];

    // protected static function boot() {
    //     parent::boot();
    
    //     self::updating(function($invoice) {
    //         if($invoice->isDirty('invoice_state_id')) { //si ha cambiado el correo
    //             return true;
    //         }
    //     });
    // }
}
