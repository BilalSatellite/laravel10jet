<?php

namespace App\Filament\Resources\PhonefunctionResource\Pages;

use App\Filament\Resources\PhonefunctionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPhonefunction extends EditRecord
{
    protected static string $resource = PhonefunctionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
