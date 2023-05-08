<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventFavourite extends Model
{
    use HasFactory;

    protected $fillable = [
        'event',
        'user',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class, 'event', 'id');
    }
}
