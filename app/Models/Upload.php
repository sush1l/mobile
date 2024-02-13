<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;

class Upload extends Model
{
    protected $fillable = [
        'uploadable_type',
        'uploadable_id',
        'file',
    ];

    public function getFileUrlAttribute(): ?string
    {
        if ($this->file) {
            return Storage::disk('public')->url($this->file);
        }

        return null;
    }

    public function uploadable(): MorphTo
    {
        return $this->morphTo();
    }
}
