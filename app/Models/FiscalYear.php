<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class FiscalYear extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title'
    ];

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }
}
