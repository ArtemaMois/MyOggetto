<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date',
        'lector_id',
        'theme_id'
    ];

    protected $casts = [
        'date' => "datetime:d.m H:i"
    ];



    public function theme(): BelongsTo
    {
        return $this->belongsTo(Theme::class);
    }

    public function lector(): BelongsTo
    {
        return $this->belongsTo(Lector::class);
    }


    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
