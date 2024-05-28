<?php

namespace App\Filament\Resources\ShiftAssignmentResource\Pages;

use App\Filament\Resources\ShiftAssignmentResource;
use Filament\Resources\Pages\Page;
// use Filament\Resources\Pages\Concerns\InteractsWithRecord;
class ShiftCalender extends Page
{
    protected static string $resource = ShiftAssignmentResource::class;

    protected static string $view = 'filament.resources.shift-assignment-resource.pages.shift-calender';
    // use InteractsWithRecord;
    public function mount(): void
    {
        // $this->record = $this->resolveRecord($record);
    }
    
}
