<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function customers(): BelongsTo {
        return $this->belongsTo(Customer::class);
    }
}
