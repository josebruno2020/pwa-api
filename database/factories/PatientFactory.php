<?php

namespace Database\Factories;

use App\Enums\PatientStatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'created_by' => $this->faker->numberBetween(0, 10),
            'name' => $this->faker->name(),
            'birthdate' => $this->faker->date(),
            'name_mother' => $this->faker->name(),
            'cns' => '12345',
            'cpf' => '01234567890',
            'rg' => '123456789',
            'from_city' => $this->faker->city(),
            'from_state' => $this->faker->city(),
            'phone_number' => $this->faker->phoneNumber(),
            'mobile_number' => $this->faker->phoneNumber(),
            'street' => $this->faker->streetAddress(),
            'number' => $this->faker->numberBetween(0, 10),
            'complement' => null,
            'neighborhood' => $this->faker->text(10),
            'city' => $this->faker->city(),
            'state' => $this->faker->city(),
            'status' => PatientStatusEnum::OBSERVATION
        ];
    }
}
