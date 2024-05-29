<?php

namespace App\Livewire;

use App\Models\ShiftAssignment;
use Filament\Widgets\Widget;
use Illuminate\Database\Eloquent\Model;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms;

use Carbon\Carbon;
use Closure;

class CalendarWidget extends FullCalendarWidget
{
    public  Model |string | null $model = ShiftAssignment::class;
    public function getFormSchema(): array
    {
        return [
            Forms\Components\Select::make('user_id')
                ->relationship('user', 'name')
                ->searchable()
                ->preload()
                ->required(),
            Forms\Components\Select::make('shiftmployee_id')
                ->relationship('shiftmployee', 'name')
                ->searchable()
                ->preload()
                ->required(),
            Forms\Components\DatePicker::make('start'),
            Forms\Components\DatePicker::make('end')
                ->afterOrEqual('start')
                ->rules([
                    function () {
                        return function (string $attribute, $value, Closure $fail) {
                            $shiftmployee_id = $this->mountedActionsArguments[0]['event']['extendedProps']['shiftmployee_id'];
                            
                            $start = Carbon::parse($this->mountedActionsArguments[0]['event']['start']);
                            $end = Carbon::parse($value);

                            if ($shiftmployee_id == 1 ||  $shiftmployee_id == 2) {
                                if ($end->isAfter($start)) {
                                    # code...
                                } else {
                                    
                                    $fail("The :attribute is should be after this {$start->toDateString()}");
                                }
                            }
                        };
                    },
                ]),
            Forms\Components\Select::make('status')
                ->options([
                    'pending' => 'pending',
                    'approved' => 'approved',
                    'banned' => 'banned',
                ])
                ->required(),
        ];
    }
    // protected static string $view = 'livewire.calendar-widget';
    public function fetchEvents(array $fetchInfo): array
    {
        $shiftAssignments = ShiftAssignment::whereHas('shiftmployee', function (Builder $query) use ($fetchInfo) {
            // $query->where('start_time', '>=', $fetchInfo['start'])
            //     ->where('end_time', '<', $fetchInfo['end']);
            $query;
        })
            // ->where('shiftmployee_id', 2)
            ->get()
            ->map(function (ShiftAssignment $shiftAssignment) {

                return [
                    'id'    => $shiftAssignment->id,
                    'title' => "{$shiftAssignment->user->name} - {$shiftAssignment->user->phone} ",
                    'start' => Carbon::parse($shiftAssignment->start)->setTimeFrom($shiftAssignment->shiftmployee->start_time)->toDateTimeString(),
                    'end'   => Carbon::parse($shiftAssignment->end)->setTimeFrom($shiftAssignment->shiftmployee->end_time)->toDateTimeString(),
                    'color' => ($shiftAssignment->shiftmployee_id == 1) ? 'blue' : (($shiftAssignment->shiftmployee_id == 2) ? "#009e0b" : '#f59e0b'),
                    'shiftmployee_id' => $shiftAssignment->shiftmployee_id,
                    'display'   => 'block',
                ];
            })
            ->toArray();
        // dd($shiftAssignments);
        return $shiftAssignments;
    }
}
