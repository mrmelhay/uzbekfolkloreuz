<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use \App\Traits\HasTranslations;

    protected $fillable = [
        'category_id',
        'title_uz',
        'title_en',
        'content_uz',
        'content_en',
        'slug',
        'status',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }
}
