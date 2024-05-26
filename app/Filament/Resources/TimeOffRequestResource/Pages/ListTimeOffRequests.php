<?php

namespace App\Filament\Resources\TimeOffRequestResource\Pages;

use App\Filament\Resources\TimeOffRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTimeOffRequests extends ListRecords
{
    protected static string $resource = TimeOffRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
