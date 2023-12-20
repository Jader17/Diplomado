<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sex',
        'race',
        'birth_date',
        'weight',
        'height',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
