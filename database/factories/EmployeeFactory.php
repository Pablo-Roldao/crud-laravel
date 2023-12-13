<?php

namespace Database\Factories;

use App\Enum\GendersEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $genders = (new \ReflectionClass(GendersEnum::class))->getConstants();

        return [
            'name' => $this->faker->name(),
            'cpf' => $this->faker->numerify('###.###.###-##'),
            'birth_date' => $this->faker->numberBetween(0, now()->getTimestamp()),
            'phone' => $this->faker->numerify('+## (##) #####-####'),
            'email' => $this->faker->email(),
            'gender' => $this->faker->randomElement($genders)
        ];
    }
}
