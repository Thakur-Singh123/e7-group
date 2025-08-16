<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forecast extends Model
{
    protected $table    = 'forecasts';
    protected $fillable = [
        'segment',
        'category',
        'revised_category',
        'country',
        'gp_id',
        'customer_name',
        'jan_25_a',
        'feb_25_a',
        'mar_25_a',
        'apr_25_a',
        'may_25_a',
        'jun_25_a',
        'jul_25_f2',
        'aug_25_f2',
        'sep_25_f2',
        'oct_25_f2',
        'nov_25_f2',
        'dec_25_f2',
        'fy_2025_h1',
        'h1',
        'h2_july',
        'per_month',
        're_forecast_25_h2',
        'fy2025',
        'status',
    ];
}
