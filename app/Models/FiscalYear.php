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
        'year',
        'is_active'
    ];

    protected static function boot()
    {
        parent::boot();
        static::saving(function ($fiscalYear) {
            if ($fiscalYear->is_active) {
                static::where('id', '!=', $fiscalYear->id)->update(['is_active' => false]);
            }
        });
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    public function settings(): HasMany
    {
        return $this->hasMany(Setting::class);
    }
}
