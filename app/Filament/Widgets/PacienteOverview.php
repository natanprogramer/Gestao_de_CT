<?php

namespace App\Filament\Widgets;

use App\Models\CheckList;
use App\Models\Farmacia;
use App\Models\Paciente;
use App\Models\Psicologa;
use Filament\Actions\Action;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;


class PacienteOverview extends BaseWidget
{

    protected static ?int $sort =  2;

    protected function getStats(): array
    {

        return [
            Stat::make('Total de Pacientes', Paciente::count())
                ->description('Estatísticas')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('Total de CheckList Feitos', CheckList::count())
                ->description('Estatísticas')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('Total de Cadastro de Medicamentos', Farmacia::count())
                ->description('Estatísticas')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('Psicologia. Total de Consultas', Psicologa::count())
                ->description('Estatísticas')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),

        ];
    }

}
