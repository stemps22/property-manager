<?php

namespace App\Filament\Resources\LoginLogs\Pages;

use App\Filament\Resources\LoginLogResource;
use Filament\Resources\Pages\CreateRecord;

class CreateLoginLog extends CreateRecord
{
    protected static string $resource = LoginLogResource::class;
}
