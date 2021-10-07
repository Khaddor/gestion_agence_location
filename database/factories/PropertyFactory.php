<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Property::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'city' => $this->faker->city(),
            'type' => $this->faker->word(),
            'description' => $this->faker->text(20),
            'image' => 'test'


        ];
    }
}
