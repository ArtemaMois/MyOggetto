<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date'
    ];

    protected function title()
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

    protected function description()
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
}
