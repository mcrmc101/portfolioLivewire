<?php

namespace App\Filament\Widgets;

use App\Models\Contact;
use App\Models\Item;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('New Contacts:', function () {
                return Contact::where('message_read', 0)->count();
            }),
            Stat::make('Items:', function () {
                return Item::all()->count();
            })
        ];
    }
}
