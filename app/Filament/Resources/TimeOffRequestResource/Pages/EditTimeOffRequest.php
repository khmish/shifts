<?php

namespace App\Filament\Resources\TimeOffRequestResource\Pages;

use App\Filament\Resources\TimeOffRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTimeOffRequest extends EditRecord
{
    protected static string $resource = TimeOffRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
