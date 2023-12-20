<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Smknstd\FakerPicsumImages\FakerPicsumImagesProvider;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new FakerPicsumImagesProvider($faker));

        $user = $this->faker->numberBetween(1, 5);
        $sex = $this->faker->randomElement(['M', 'F']);
        $race = $this->faker->randomElement(['Criollo', 'Husky siberiano', 'Golden retriever', 'Pastor alemán', 'Yorkshire terrier', 'Dálmata', 'Boxer', 'Chihuahua', 'Bulldog', 'Otra']);
        $birth_date = $this->faker->dateTimeBetween('-15 years', 'now')->format('Y-m-d');
        $weight = $this->faker->randomFloat('1', 0.5, 50);
        $height = $this->faker->numberBetween(5, 150);
        $image = $faker->imageUrl(130, 190);

        return [
            'user_id' => $user,
            'name' => $this->faker->userName($sex),
            'sex' => $sex,
            'race' => $race,
            'birth_date' => $birth_date,
            'weight' => $weight,
            'height' => $height,
            'image' => $image
        ];
    }
}
