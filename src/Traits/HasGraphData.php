<?php

namespace Vemcogroup\Charts\Traits;

trait HasChartData
{
    public function chartResourceData($selection)
    {
        return [
            'labels' => [],
            'datasets' => [],
        ];
    }

    public function chartDashboardData($selection)
    {
        return $this->chartResourceData($selection);
    }
}
