<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TutionRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'user_id',
        'state',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function tution(): BelongsTo
    {
        return $this->belongsTo(Tution::class, 'class_id', 'id');
    }
}
