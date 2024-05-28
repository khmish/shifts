<?php

namespace Database\Seeders;

use App\Models\ShiftAssignment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShiftAssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ShiftAssignment::factory(50)->create();
        //
        // DB::table('shift_assignments')->insert([
        //     'id' => 1,
        //     'name' => "Late Night shift",
        //     'start_time' => $dt->toTimeString(),
        //     'end_time' => $dt->addHours(16)->toTimeString(),
        //     'status' => "approved",
        // ]);
    }
}
