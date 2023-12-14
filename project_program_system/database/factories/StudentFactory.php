<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Cohort;
use App\Models\Student;
use Faker\Factory as FactoryImage;
use Smknstd\FakerPicsumImages\FakerPicsumImagesProvider;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = FactoryImage::create();
        $faker->addProvider(new FakerPicsumImagesProvider($faker));
        return [
            'identification' => $this->faker->numberBetween(1000000, 1500000000),
            'name' => $this->faker->name,
            'gender' => $this->faker->randomElement(['Masculino', 'Femenino', 'Otro']),
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->safeEmail,
            'birth_date' => $this->faker->date(),
            'photo' => $faker->imageUrl(300, 400),
            'student_code' => $this->faker->numberBetween(0, 1500000000),
            'semester' => $this->faker->word,
            'civil_status' => $this->faker->randomElement(['Soltero', 'Casado', 'Unión Libre']),
            'join_date' => $this->faker->date(),
            'egress_date' => $this->faker->date(),
            'cohort_id' => function (){
                return Cohort::inRandomOrder()->first()->id;
            },
        ];
    }
}
