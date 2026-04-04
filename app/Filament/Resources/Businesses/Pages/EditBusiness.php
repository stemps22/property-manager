<?php

namespace App\Filament\Resources\Businesses\Pages;

use App\Filament\Resources\Businesses\BusinessResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions\Action;
use Filament\Support\Colors\Color;
use Filament\Support\Icons\Heroicon;

class EditBusiness extends EditRecord
{
    protected static string $resource = BusinessResource::class;

    protected function getHeaderActions(): array
{
    return [
        Action::make('manageBilling')
            ->label('Manage Subscription & Invoices')
            ->icon(Heroicon::OutlinedCreditCard)
            ->color(Color::Amber)
            ->url(route('billing.portal')) // Points to the controller above
            ->openUrlInNewTab(),
    ];
}
}
