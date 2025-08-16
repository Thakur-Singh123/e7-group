<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Forecast;
use App\Services\ForecastCalculationService;

class ForecastController extends Controller
{
    //function for view excel import page
    public function index(Request $request){
        return view('Admin.Importforecast');
    }

    //function for show all records
    public function view_all_records(Request $request, ForecastCalculationService $calculator){
        $query = Forecast::query();
        $segments = Forecast::distinct()->pluck('segment');
        $categories = Forecast::distinct()->pluck('category');
        $revisedCategories = Forecast::distinct()->pluck('revised_category');
        $countries = Forecast::distinct()->pluck('country');
        $queryForTotals = (clone $query);
        $forecasts = $query->paginate(10);  
        $totals = $calculator->getTotalsYearWise($queryForTotals);
        $fy_h1_total = $calculator->fy_h1_total($queryForTotals);
        $fy_h2_total = $calculator->fy_h2_total($queryForTotals);
        $getFullYearTotalAllRecords = $calculator->getFullYearTotalAllRecords($queryForTotals);
        return view('Admin.forecast.all-records', compact('forecasts', 'segments', 'categories', 'revisedCategories', 'countries','totals','calculator'
        ,'fy_h1_total','fy_h2_total','getFullYearTotalAllRecords'));
    }

    //function for search forecast record
    public function search_forecast(Request $request, ForecastCalculationService $calculator){
        $query = Forecast::query();
        if ($request->segment) {
            $query->where('segment', $request->segment);
        }
        if ($request->category) {
            $query->where('category', $request->category);
        }
        if ($request->revised_category) {
            $query->where('revised_category', $request->revised_category);
        }
        if ($request->country) {
            $query->where('country', $request->country);
        }

        $segments = Forecast::distinct()->pluck('segment');
        $categories = Forecast::distinct()->pluck('category');
        $revisedCategories = Forecast::distinct()->pluck('revised_category');
        $countries = Forecast::distinct()->pluck('country');
        $queryForTotals = (clone $query);
        $forecasts = $query->paginate(10);  
        $totals = $calculator->getTotalsYearWise($queryForTotals);
        $fy_h1_total = $calculator->fy_h1_total($queryForTotals);
        $fy_h2_total = $calculator->fy_h2_total($queryForTotals);
        $getFullYearTotalAllRecords = $calculator->getFullYearTotalAllRecords($queryForTotals);
        return view('Admin.forecast.search-records', compact('forecasts', 'segments', 'categories', 'revisedCategories', 'countries','totals','calculator'
        ,'fy_h1_total','fy_h2_total','getFullYearTotalAllRecords'));
    }
}
