<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    //
    protected $fillable = ['name', 'description'];

    public function states(): HasMany
    {
        return $this->hasMany(State::class);
    }

    public static function truncate()
    {
        static::query()->truncate();
    }
}
