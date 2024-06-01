<?php

namespace App\Filament\Pages;

use App\Filament\Resources\ShiftAssignmentResource\Pages\ShiftCalender;
use App\Livewire\ResidentsCalendarWidget;
use Carbon\Carbon;
use Filament\Pages\Page;

class Generate extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.generate';

    protected function getHeaderWidgets(): array
    {
        return [
            ResidentsCalendarWidget::make(['data' => [
                'id'    => 1,
                'title' => "hello",
                'start' => Carbon::parse('31-05-2024')->toDateString(),
                'end'   => Carbon::parse('31-05-2024')->toDateString(),
                'color' =>  'blue',
                'shiftmployee_id' => 2,
                'display'   => 'block',
            ]])
        ];
    }
}
