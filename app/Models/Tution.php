<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tution extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_name',
        'time_to',
        'time_form',
        'day',
        'location',
        'district',
        'user_id',
        'state',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
