<?php
namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use App\Models\Forecast;
use App\Services\ForecastCalculationService;
 
class DashboardController extends Controller
{
    //function for dashboard controller
    public function index()
    {
        $monthly_outlook = $this->monthly_outlook();
        $h1vsh2          = $this->h1_h2_chart();
        $performanceData          = $this->performance_per_segment();
        $top_country          = $this->top_5_country();
        return view('Admin.index', compact('monthly_outlook', 'h1vsh2','performanceData','top_country'));
    }
 
    //function for monthly outlook chart
    public function monthly_outlook()
    {
        $columns = [
            'Jan'   => 'jan_25_a',
            'Feb'   => 'feb_25_a',
            'March' => 'mar_25_a',
            'April' => 'apr_25_a',
            'May'   => 'may_25_a',
            'June'  => 'jun_25_a',
            'July'  => 'jul_25_f2',
            'Aug'   => 'aug_25_f2',
            'Sep'   => 'sep_25_f2',
            'Oct'   => 'oct_25_f2',
            'Nov'   => 'nov_25_f2',
            'Dec'   => 'dec_25_f2',
        ];
 
        $labels    = [];
        $data      = [];
        $totalYear = 0;
 
        foreach ($columns as $label => $columnName) {
            $labels[] = $label;
            $monthSum = Forecast::sum($columnName);
            $monthSum = number_format($monthSum, 2, '.', ''); //2 decimal places
            $data[]   = (float) $monthSum;
            $totalYear += (float) $monthSum; //yearly total calculation
        }
 
        $year = now()->year;
 
        return [
            'labels' => $labels,
            'data'   => $data,
            'year'   => $year,
            'total'  => number_format($totalYear, 2, '.', ''), // final total
        ];
    }
 
    //function for H1 vs H2 chart
    public function h1_h2_chart()
    {
        $query       = Forecast::query();
        $calculator  = new ForecastCalculationService();
        $fy_h1_total = $calculator->fy_h1_total($query);
        $fy_h2_total = $calculator->fy_h2_total($query);
 
        $difference = abs($fy_h1_total - $fy_h2_total);
        if ($fy_h1_total != 0) {
            $percentage = abs($difference / $fy_h1_total) * 100;
        } else {
            $percentage = 0;
        }
 
        return [
            'fy_h1_total' => $fy_h1_total,
            'fy_h2_total' => $fy_h2_total,
            'difference'  => $difference,
            'percentage'  => $percentage,
        ];
    }
 
    //function for performance per segment
    public function performance_per_segment()
    {
        // Get all unique segments
        $segments = Forecast::select('segment')->distinct()->pluck('segment');
 
        $data = [];
        $calculator  = new ForecastCalculationService();
 
        foreach ($segments as $segment) {
            // Filter forecasts by segment
            $query = Forecast::where('segment', $segment);
 
            // Use your service to calculate totals
            $fy_h1_total = $calculator->fy_h1_total($query);
            $fy_h2_total = $calculator->fy_h2_total($query);
 
            // Store totals per segment
            $data[$segment] = [
                'fy_h1_total' => $fy_h1_total,
                'fy_h2_total' => $fy_h2_total,
            ];
        }
 
        return $data;
    }
 
    //function for top 5 country chart
    public function top_5_country()
    {
        // Get all unique segments
        $countries = ['UAE', 'Uzbekistan', 'Rwanda', 'Yemen', 'Turmenikistan'];
 
        $data = [];
        $calculator  = new ForecastCalculationService();
 
        foreach ($countries as $country) {
            // Filter forecasts by segment
            $query = Forecast::where('country', $country);
 
            // Use your service to calculate totals
            $fy_h1_total = $calculator->fy_h1_total($query);
            $fy_h2_total = $calculator->fy_h2_total($query);
 
            // Store totals per segment
            $top_country[$country] = [
                'fy_h1_total' => $fy_h1_total,
                'fy_h2_total' => $fy_h2_total,
            ];
        }
 
        return $top_country;
    }
 
};