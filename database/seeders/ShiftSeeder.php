<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dt = Carbon::create(2024, 6, 1, 16);
        DB::table('shifts')->insert([
            'id' => 1,
            'name' => "Late Night shift",
            'start_time' => $dt->toTimeString(),
            'end_time' => $dt->addHours(16)->toTimeString(),
            'status' => "approved",
        ]);
        $dt = Carbon::create(2024, 6, 1, 8);
        DB::table('shifts')->insert([
            'id' => 2,
            'name' => "Early Morning shift",
            'start_time' => $dt->toTimeString(),
            'end_time' => $dt->addHours(16)->toTimeString(),
            'status' => "approved",
        ]);
        $dt = Carbon::create(2024, 6, 1, 8);
        DB::table('shifts')->insert([
            'id' => 3,
            'name' => "8 to 4",
            'start_time' => $dt->toTimeString(),
            'end_time' => $dt->addHours(8)->toTimeString(),
            'status' => "approved",

            // 'status' => Arr::random(["pending","approved","canceled"]),
        ]);
    }
}
