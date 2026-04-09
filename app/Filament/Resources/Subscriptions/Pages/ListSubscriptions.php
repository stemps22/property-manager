<?php

namespace App\Filament\Resources\Subscriptions\Pages;

use App\Filament\Resources\SubscriptionResource;
use Filament\Resources\Pages\ListRecords;

class ListSubscriptions extends ListRecords
{
    /**
     * Link this page to the SubscriptionResource.
     */
    protected static string $resource = SubscriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}