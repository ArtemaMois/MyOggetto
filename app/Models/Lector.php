<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Lector extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'email',
        'theme_id'
    ];

    protected $casts = [
        'lector_id' => 'integer'
    ];

    public function meetings(): HasMany
    {
        return $this->hasMany(Meeting::class);
    }

    public function theme(): BelongsTo
    {
        return $this->belongsTo(Theme::class);
    }
}
