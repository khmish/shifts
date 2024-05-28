<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Shift;
use App\Models\ShiftAssignment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Arr;

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
        $date= Carbon::now();
        $date->month=7;
        $date->day=rand(1,28);
        $users =User::all()->pluck('id')->toArray();
        $shift =Arr::random([1,2,3]);
        // dd($users);
        return [
            'start' => $date->format('Y-m-d'),
            'end' => $date->addDays($shift==1?1:0)->format('Y-m-d'),
            'status' => $this->faker->randomElement(["approved"]),
            'user_id' => Arr::random($users),
            'shiftmployee_id' => $shift,
        ];
    }
}
