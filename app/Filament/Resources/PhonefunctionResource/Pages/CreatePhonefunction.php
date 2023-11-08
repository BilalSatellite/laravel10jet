<?php

namespace App\Filament\Resources\PhonefunctionResource\Pages;

use App\Filament\Resources\PhonefunctionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePhonefunction extends CreateRecord
{
    protected static string $resource = PhonefunctionResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
