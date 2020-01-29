<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Detail extends Model
{
    /**
     * subcategory.
     */
    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class);
    }

    /**
     * invoice.
     */
    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }
}
