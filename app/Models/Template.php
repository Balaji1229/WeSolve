<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'image',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public const CATEGORIES = [
        'Clothing',
        'Fashion',
        'E-Commerce',
        'Food & Restaurant',
        'Hotel',
        'Travel & Tourism',
        'Mechanic',
        'Real Estate',
        'Healthcare',
        'Education',
        'Beauty & Salon',
        'Corporate',
        'Portfolio',
        'Others',
    ];

    public const IMAGE_DIRECTORY = 'images/themes';

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    public function imageUrl(): string
    {
        if (empty($this->image)) {
            return asset('images/logo/weslovetechnologies.png');
        }

        if (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://')) {
            return $this->image;
        }

        return asset(ltrim($this->image, '/'));
    }

    public function imageDiskPath(): string
    {
        return public_path($this->image);
    }
}
