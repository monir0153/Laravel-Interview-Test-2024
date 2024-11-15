<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends Model
{
    //
    protected $fillable = ['state_id', 'name', 'description'];

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }
    public static function truncate()
    {
        static::query()->truncate();
    }
}
