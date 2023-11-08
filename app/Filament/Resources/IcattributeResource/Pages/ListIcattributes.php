<?php

namespace App\Filament\Resources\IcattributeResource\Pages;

use App\Filament\Resources\IcattributeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIcattributes extends ListRecords
{
    protected static string $resource = IcattributeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
