<?php

namespace App\Filament\Resources\IcbrandResource\Pages;

use App\Filament\Resources\IcbrandResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIcbrands extends ListRecords
{
    protected static string $resource = IcbrandResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
