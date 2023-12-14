<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Program;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FactoryImage;
use Smknstd\FakerPicsumImages\FakerPicsumImagesProvider;

class ProgramFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Program::class;

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
            'code' => $this->faker->numberBetween(1000, 9999),
            'title' => $this->faker->text(200),
            'description' => $this->faker->text,
            'logo' => $faker->imageUrl(300, 300),
            'email' => $this->faker->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'work_lines' => $this->faker->text,
            'resolution' => $this->faker->text,
            'register_date' => $this->faker->date(),
            'modality' => $this->faker->randomElement(['Investigación', 'Profundización']),
            'user_id' => function () {
                return User::inRandomOrder()->first()->id;
            },
        ];
    }
}
