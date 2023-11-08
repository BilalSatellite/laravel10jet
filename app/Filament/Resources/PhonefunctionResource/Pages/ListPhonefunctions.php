<?php

namespace App\Filament\Resources\PhonefunctionResource\Pages;

use App\Filament\Resources\PhonefunctionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPhonefunctions extends ListRecords
{
    protected static string $resource = PhonefunctionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
