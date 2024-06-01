<?php
namespace App\Custom\CustomCarbon;

use Carbon\Carbon;
use Illuminate\Support\Arr;

class CustomCarbon extends Carbon
{
    
    public function isWeekend(): bool
    {
        // Define custom weekend days (0 = Sunday, 1 = Monday, ..., 6 = Saturday)
        $weekendDays = [5, 6]; // Example: Thursday and Friday as weekends

        return Arr::hasAny($weekendDays);
    }
}
