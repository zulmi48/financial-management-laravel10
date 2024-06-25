<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $pemasukan = Transaction::incomes()->sum('amount');
        $pengeluaran = Transaction::expenses()->sum('amount');
        $selisih = $pemasukan - $pengeluaran;
        return [
            Stat::make('Total Pemasukan', Number::currency($pemasukan, in: 'IDR', locale: 'id_ID')),
            Stat::make('Total Pengeluaran', Number::currency($pengeluaran, in: 'IDR', locale: 'id_ID')),
            Stat::make('Selisih',Number::currency($selisih, in: 'IDR', locale: 'id_ID')),
        ];
    }
}
