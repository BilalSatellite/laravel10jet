<?php

namespace App\Filament\Resources\IcbrandResource\Pages;

use App\Filament\Resources\IcbrandResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIcbrand extends EditRecord
{
    protected static string $resource = IcbrandResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
