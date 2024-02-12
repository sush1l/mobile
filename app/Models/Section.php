<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'section_id',
        'document_id',
    ];

    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

    public function sections(): HasMany
    {
        return $this->hasMany(Section::class);
    }


    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class);
    }

    public function uploads(): MorphMany
    {
        return $this->morphMany(Upload::class, 'uploadable');
    }
}
