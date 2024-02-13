<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

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


    public function fiscalYear(): BelongsTo
    {
        return $this->belongsTo(FiscalYear::class);
    }

    public function sections(): HasMany
    {
        return $this->hasMany(Section::class);
    }
}


