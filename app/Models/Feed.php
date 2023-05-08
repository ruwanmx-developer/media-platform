<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Feed extends Model
{
    use HasFactory;

    protected $fillable = [
        'source',
        'description',
        'user',
        'state',
    ];

    public function user(): BelongsTo

    {
        return $this->belongsTo(User::class, 'user', 'id');
    }
}
