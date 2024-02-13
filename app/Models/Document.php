<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Document extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'fiscal_year_id',
        'title',
        'cover_page',
        'publish_date',
        'publisher',
        'is_featured',
        'is_active',
    ];


    public function getCoverUrlAttribute(): ?string
    {
        if ($this->cover_page) {
            return Storage::disk('public')->url($this->cover_page);
        }

        return null;
    }

    public function fiscalYear(): BelongsTo
    {
        return $this->belongsTo(FiscalYear::class);
    }

    public function sections(): HasMany
    {
        return $this->hasMany(Section::class);
    }
}


