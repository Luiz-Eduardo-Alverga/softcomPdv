<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Addresses extends Model
{
    use SoftDeletes;

    public function users(): BelongsTo
    {
        return $this->belongsTo('users', 'user_id');
    }

    public function customers(): BelongsTo {
        return $this->belongsTo('customers', 'customer_id');
    }
}
