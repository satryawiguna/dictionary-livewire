<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'nick_name',
        'birth_date',
        'gender',
        'country',
        'state',
        'address',
        'phone',
        'mobile',
        'photo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
