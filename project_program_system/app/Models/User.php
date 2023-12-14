<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
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
        'link_date',
        'agreement',
        'password',
        'role',
        'job',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'birth_date' => 'date',
        'link_date' => 'date',
    ];

    public function programs()
    {
        return $this->hasMany(Program::class);
    }
}
