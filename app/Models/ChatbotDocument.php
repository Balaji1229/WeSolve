<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatbotDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'source',
        'url',
        'weight',
    ];

    protected function casts(): array
    {
        return [
            'weight' => 'integer',
        ];
    }
}
