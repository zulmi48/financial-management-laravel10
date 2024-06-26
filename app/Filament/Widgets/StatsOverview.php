<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;
use Illuminate\Support\Number;

class StatsOverview extends BaseWidget
{
    use InteractsWithPageFilters;

    protected function getStats(): array
    {
        $startDate = !is_null($this->filters['startDate'] ?? null) ?
            Carbon::parse($this->filters['startDate']) :
            Carbon::parse('first day of this month');

        $endDate = !is_null($this->filters['endDate'] ?? null) ?
            Carbon::parse($this->filters['endDate']) :
            now();

        $pemasukan = Transaction::incomes()->whereBetween('date_transaction', [$startDate, $endDate])->sum('amount');
        $pengeluaran = Transaction::expenses()->whereBetween('date_transaction', [$startDate, $endDate])->sum('amount');
        $selisih = $pemasukan - $pengeluaran;

        return [
            Stat::make('Total Pemasukan', Number::currency($pemasukan, in: 'IDR', locale: 'id_ID')),
            Stat::make('Total Pengeluaran', Number::currency($pengeluaran, in: 'IDR', locale: 'id_ID')),
            Stat::make('Selisih', Number::currency($selisih, in: 'IDR', locale: 'id_ID')),
        ];
    }
}
