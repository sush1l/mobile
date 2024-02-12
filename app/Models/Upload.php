<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Upload extends Model
{
    protected $fillable = [
        'uploadable_type',
        'uploadable_id',
        'file',
    ];

    public function uploadable(): MorphTo
    {
        return $this->morphTo();
    }
}
