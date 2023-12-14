<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use Faker\Factory as FactoryImage;
use Smknstd\FakerPicsumImages\FakerPicsumImagesProvider;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

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
            'link_date' => $this->faker->date(),
            'agreement' => $this->faker->text,
            'password' => $this->faker->password,
            'role' => $this->faker->randomElement(['Administrador', 'Coordinador']),
            'job' => $this->faker->randomElement(['Presidente del Comité', 'Coordinador del programa', 'Asistente del programa']),
        ];
    }
}
