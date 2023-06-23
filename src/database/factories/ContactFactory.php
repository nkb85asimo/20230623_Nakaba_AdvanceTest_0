<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname' => $this->faker->name,
            'gender' => $this->faker->randomElement([1, 2]),
            'email' => $this->faker->unique()->safeEmail,
            'postcode' => substr_replace($this->faker->numberBetween(1000000, 9999999), '-', 3, 0),
            'address' => $this->faker->address,
            'building_name' => $this->faker->secondaryAddress,
            'opinion' => $this->faker->realText(120)
        ];
    }
}
