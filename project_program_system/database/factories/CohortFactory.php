<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Cohort;
use App\Models\Program;

class CohortFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cohort::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->numberBetween(50000, 99999),
            'name' => $this->faker->name,
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'total_students' => $this->faker->numberBetween(10, 50),
            'program_id' => function () {
                return Program::inRandomOrder()->first()->id;
            }
        ];
    }
}
