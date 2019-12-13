# A Nova card to use add ChartJS charts

[![Latest Version on Packagist](https://img.shields.io/packagist/v/vemcogroup/nova-charts.svg?style=flat-square)](https://packagist.org/packages/vemcogroup/nova-charts)
[![Total Downloads](https://img.shields.io/packagist/dt/vemcogroup/nova-charts.svg?style=flat-square)](https://packagist.org/packages/vemcogroup/nova-charts)

This card tool gives the possibility to add cards with charts from [Chart.js](https://www.chartjs.org/).

![Screenshot 2019-12-13 at 09 55 37](https://user-images.githubusercontent.com/283184/70787345-c243b480-1d8e-11ea-98d5-6cb36764c4b2.png)

## Installation

You can install the nova tool in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require vemcogroup/nova-charts
```

## Usage

You can now use add card with charts from your resources data.

First you need to add the trait ``HasGraphData`` to the models that should show chart data.

```php
use Vemcogroup\Charts\Traits\HasChartData;

class Product extends Model 
{
    use HasChartData;
    ... 
}
```

The trait has 2 functions which can be extended to show chart data:
```php
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
``` 
When adding the chart card to a resource these options are available:

**At the moment its only possible to use chart on resource detail page**

```php
return [
    (new \Vemcogroup\Charts\Chart)->onlyOnDetail()
];
```

### Title
You can set the title of the card.
```php
(new \Vemcogroup\Charts\Chart())->title('Title of card');
```

### Description
You can set the description of the card which will be shown below title.
```php
(new \Vemcogroup\Charts\Chart())->description('Description of card');
```

### Type
There are at the moment 3 types of charts available:

```php
\Vemcogroup\Charts\Chart::CHART_TYPE_BAR = 'bar';
\Vemcogroup\Charts\Chart::CHART_TYPE_STACKED_BAR = 'stackedBar';
\Vemcogroup\Charts\Chart::CHART_TYPE_LINE = 'line';
```

You can set your chart type like this, default is `bar`

```php
(new \Vemcogroup\Charts\Chart())->type(\Vemcogroup\Charts\Chart::CHART_TYPE_BAR);
```

### Labels
If you dont want to display labels on the chart, you able to hide them.
```php
(new \Vemcogroup\Charts\Chart())->withoutLabels();
```

### Legends
If you dont want to display legends on the chart, you able to hide them.
```php
(new \Vemcogroup\Charts\Chart())->withoutLegends();
```

### Selections
You are able to create a section of selections below the chart that, when clicked, will change the data with the selection ex. selections of years.

By default selections are hidden until set.
```php
(new \Vemcogroup\Charts\Chart())->selections([2018, 2019, 2020, 2021, 2022]);
```

You are also able to select which selection to start from.
```php
(new \Vemcogroup\Charts\Chart())->startFromSelection(2019);
```
            
### Resource
If you want to show a chart on a dashboard the chart dont know what resources to take data from, this can be defined by this option.

Remember to type resource as plural, ex companies 

```php
(new \Vemcogroup\Charts\Chart())->resource('companies');
```

When using a chart on dashboard remember to override the function `chartDashboardData($selection)`
  