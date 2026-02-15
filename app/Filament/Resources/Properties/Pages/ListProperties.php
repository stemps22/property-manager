<?php

namespace App\Filament\Resources\Properties\Pages;

use App\Filament\Resources\PropertyResource;
use Filament\Actions\CreateAction; // v5 Unified Action
use Filament\Resources\Pages\ListRecords;

use Filament\Notifications\Notification; //

class ListProperties extends ListRecords
{
    protected static string $resource = PropertyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Add New Property')
                ->icon('heroicon-m-plus')
                ->modalHeading('Create New Property Listing')
                ->modalWidth('2xl') 
                ->slideOver()
                ->successNotification(
                Notification::make()
                    ->success()
                    ->title('Property Published')
                    ->body('The property has been successfully added to your business portfolio.')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->duration(5000) // Stays for 5 seconds
            ),
        ];
    }
}
