<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
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
        'student_code',
        'semester',
        'civil:status',
        'join_date',
        'egress_date',
        'cohort',
        'cohort_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'birth_date' => 'date',
        'join_date' => 'date',
        'egress_date' => 'date',
        'cohort_id' => 'integer',
    ];


    public function cohort()
    {
        return $this->belongsTo(Cohort::class);
    }
}
