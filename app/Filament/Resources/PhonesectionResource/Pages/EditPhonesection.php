<?php

namespace App\Filament\Resources\PhonesectionResource\Pages;

use App\Filament\Resources\PhonesectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPhonesection extends EditRecord
{
    protected static string $resource = PhonesectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
