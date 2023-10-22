<?php

namespace App\Filament\Widgets;

use App\Models\Paciente;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class PacienteChart extends ChartWidget
{
    protected static ?string $heading = 'Estatística: Entrada de Pacientes';

    protected static string $color = 'info';

    public ?string $filter = 'today';

    protected static ?string $pollingInterval = '10s';

    protected static ?int $sort =  3;

    protected function getData(): array
    {

        $data = Trend::model(Paciente::class)
        ->between(
            start: now()->startOfMonth(),
            end: now()->endOfMonth(),
        )
        ->perDay()
        ->count();

    return [
        'datasets' => [
            [
                'label' => 'Registro de pacientes ',
                'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
            ],
        ],
        'labels' => $data->map(fn (TrendValue $value) => $value->date),

    ];
    }

    protected function getType(): string
    {
        return 'line';
    }

}
