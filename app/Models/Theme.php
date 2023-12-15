<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Theme extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    protected function name()
    {
        return Attribute::make(
            get: function ($value) {
                return ucfirst($value);
            },
            set:function ($value) {
                return ucfirst($value);
            }
        );
    }

    public function meetings(): HasMany
    {
        return $this->hasMany(Meeting::class);
    }

    public function lectors(): HasMany
    {
        return $this->hasMany(Lector::class);
    }
}
