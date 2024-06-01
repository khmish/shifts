<?php

namespace App\Livewire;

use App\Custom\CustomCarbon\CustomCarbon;
use App\Models\ShiftAssignment;
use App\Models\User;
use Filament\Widgets\Widget;
use Illuminate\Database\Eloquent\Model;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms;
use Filament\Forms\Get;
// use Carbon\Carbon;
use Closure;
use Filament\Resources\Resource;


class ResidentsCalendarWidget extends FullCalendarWidget
{
    // public  Model |string | null $model = ShiftAssignment::class;
    public array $data;
    // public function getFormSchema(): array
    // {

    //     return [
            
    //     ];
    // }
    // protected static string $view = 'livewire.calendar-widget';
    public function fetchEvents(array $fetchInfo): array
    {
        $date1= CustomCarbon::yesterday();
        dd($date1,$date1->isWeekend());
        return [$this->data];
    }
}
