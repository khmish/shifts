<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Department;
use App\Models\User;

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
     */
    public function definition(): array
    {


        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'phone' => "05".random_int(11111111,99999999),
            // 'email_verified_at' => $this->faker->dateTime(),
            'password' => bcrypt('password'),
            // 'remember_token' => $this->faker->uuid(),
            'department_id' => Department::factory(),
            // 'Preferences' => '{}',
            'status' => $this->faker->randomElement(["pending","approved","banned"]),
        ];
    }
}
