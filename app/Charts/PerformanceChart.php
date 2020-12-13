<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

use App\Models\Band;

class PerformanceChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $performances = (new Band)->perfByMonth();
        return Chartisan::build()
            ->labels(['Jan', 'Fev', 'Mars', 'Avr', 'Mai', 'Juin', 'Juil', 'Ao', 'Sept', 'Oct', 'Nov', 'Dec'])
            ->dataset('Performance (%)', $performances);
    }
}