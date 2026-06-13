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
        return $this->image ? asset('storage/' . $this->image) : asset('images/logo/weslovetechnologies.png');
    }
}
