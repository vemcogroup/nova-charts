<?php

namespace Vemcogroup\Charts\Http\Controller;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChartController extends Controller
{
    public function resourceData(Request $request, $resource, $resourceId) 
    {
        $selection = $request->get('selection');
        $modelName = 'App\\'.ucfirst(Str::singular($resource));
        $model = $modelName::find($resourceId);
    
        return $model->chartResourceData($selection);
    }

    public function dashboardData(Request $request, $resource) 
    {
        $data = [];
        $labels = null;
        
        $selection = $request->get('selection');
        $modelName = 'App\\'.ucfirst(Str::singular($resource));
    
        foreach($modelName::all() as $model) {
            $chartData = $model->chartDashboardData($selection);
            
            $labels = $labels ?? $chartData['labels'];
            $data = array_merge($data, $chartData['datasets']);
        }

        return [
            'labels' => $labels,
            'datasets' => $data,
        ];
    }
}