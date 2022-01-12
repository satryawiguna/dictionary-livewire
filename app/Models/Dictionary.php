<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'category_id',
        'vocab_id',
        'vocab_en'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
