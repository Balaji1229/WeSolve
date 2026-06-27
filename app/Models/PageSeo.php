<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSeo extends Model
{
    use HasFactory;

    protected $fillable = [
        'page',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_image',
        'faqs',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'faqs' => 'array',
    ];
}
