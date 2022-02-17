<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subtitle extends Model
{
    use HasFactory;

    protected $fillable = ['from', 'to', 'description'];

    public function video(): BelongsTo
    {
        return $this->belongsTo(Video::class);
    }
}
