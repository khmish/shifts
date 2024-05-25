<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Shift;
use App\Models\ShiftAssignment;
use App\Models\User;

class ShiftAssignmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShiftAssignment::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'employee_id' => User::factory(),
            'shift_id' => Shift::factory(),
            'status' => $this->faker->randomElement(["pending","approved","canceled"]),
            'user_id' => User::factory(),
            'shiftmployee_id' => Shift::factory(),
        ];
    }
}
