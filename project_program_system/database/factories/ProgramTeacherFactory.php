<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Program;
use App\Models\ProgramTeacher;
use App\Models\Teacher;

class ProgramTeacherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProgramTeacher::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'program_id' => function () {
                return Program::inRandomOrder()->first()->id;
            },
            'teacher_id' => function () {
                return Teacher::inRandomOrder()->first()->id;
            },
        ];
    }
}
