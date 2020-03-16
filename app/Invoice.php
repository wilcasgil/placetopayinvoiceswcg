<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Invoice
 */
class Invoice extends Model
{
    
    /**
     * dates
     *
     * @var array
     */
    protected $dates = [
        'due_date',
    ];
    
    /**
     * casts
     *
     * @var array
     */
    protected $casts = [
        'due_date' => 'datetime:Y-m-d',
    ];
    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'due_date',
        'payment_type_id',
        'client_id',
        'invoice_state_id',
    ];
        
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
    
    /**
     * details
     *
     * @return HasMany
     */
    public function details(): HasMany
    {
        return $this->hasMany(Detail::class);
    }
    
    
    /**
     * scopeClientId
     *
     * @param  mixed $query
     * @param  mixed $client_id
     * @return Builder
     */
    public function scopeClientId(Builder $query, ?int $client_id): Builder
    {
        if ($client_id) {
            return $query->orWhere('client_id', $client_id);
        }

        return $query;
    }
    
    /**
     * scopeSearch
     *
     * @param  mixed $query
     * @param  mixed $code
     * @return Builder
     */
    public function scopeSearch(Builder $query, ?int $code): Builder
    {
        if ($code) {
            return $this->clientId($code);
        }

        return $query;
    }
}
