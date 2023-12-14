<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'description',
        'logo',
        'email',
        'phone',
        'work_lines',
        'resolution',
        'register_date',
        'modality',
        'user_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'register_date' => 'date',
        'user_id' => 'integer',
    ];

    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cohorts()
    {
        return $this->hasMany(Cohort::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }
}
