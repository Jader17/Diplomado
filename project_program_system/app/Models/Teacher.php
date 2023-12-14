<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'identification',
        'name',
        'gender',
        'address',
        'phone',
        'email',
        'birth_date',
        'photo',
        'academic_formation',
        'knowledge_areas',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'birth_date' => 'date',
    ];

    public function programs()
    {
        return $this->belongsToMany(Program::class);
    }
}
