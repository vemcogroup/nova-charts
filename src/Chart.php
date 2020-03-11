<?php

namespace Vemcogroup\Charts;

use Laravel\Nova\Card;

class Chart extends Card
{
    public const CHART_TYPE_BAR = 'bar';
    public const CHART_TYPE_LINE = 'line';
    public const CHART_TYPE_STACKED_BAR = 'stackedBar';

    public $width = '1/3';

    public function __construct()
    {
        parent::__construct();

        $this->withMeta([
            'type' => self::CHART_TYPE_BAR,
            'selection' => null,
            'model' => null,
            'selections' => [],
            'showLabels' => true,
            'showLegends' => true,
            'showSelections' => false,
        ]);
    }

    public function title($title)
    {
        return $this->withMeta(['title' => $title]);
    }

    public function description($description)
    {
        return $this->withMeta(['description' => $description]);
    }

    public function type($type)
    {
        return $this->withMeta(['type' => $type]);
    }

    public function model($model)
    {
        return $this->withMeta(['model' => $model]);
    }

    public function selections($selections)
    {
        return $this->withMeta([
            'showSelections' => true,
            'selections' => !is_array($selections) ? [$selections] : $selections
        ]);
    }

    public function startFromSelection($selection)
    {
        return $this->withMeta(['selection' => $selection]);
    }

    public function withoutLabels()
    {
        return $this->withMeta(['showLabels' => false]);
    }

    public function withoutLegends()
    {
        return $this->withMeta(['showLegends' => false]);
    }

    public function component()
    {
        return 'chart-card';
    }
}
