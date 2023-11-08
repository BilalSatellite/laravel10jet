<?php

namespace App\Filament\Resources\IcattributeResource\Pages;

use App\Filament\Resources\IcattributeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateIcattribute extends CreateRecord
{
    protected static string $resource = IcattributeResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
