<?php

namespace App\Filament\Resources\PhonesectionResource\Pages;

use App\Filament\Resources\PhonesectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPhonesections extends ListRecords
{
    protected static string $resource = PhonesectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
