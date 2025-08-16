<?php
namespace App\Imports;

use App\Models\Forecast;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Cell\Cell;

class ForecastImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if (! empty($row['segment']) && ! empty($row['category']) && ! empty($row['country'])) {
                Forecast::create([
                    'segment'           => $row['segment'] ?? '',
                    'category'          => $row['category'] ?? '',
                    'revised_category'  => $row['revised_category'] ?? '',
                    'country'           => $row['country'] ?? '',
                    'gp_id'             => $row['gp_id'] ?? '',
                    'customer_name'     => $row['customer_name'] ?? '',
                    'jan_25_a'          => $this->formatValue($row['jan25_a'] ?? 0),
                    'feb_25_a'          => $this->formatValue($row['fef25_a'] ?? 0),
                    'mar_25_a'          => $this->formatValue($row['mar25_a'] ?? 0),
                    'apr_25_a'          => $this->formatValue($row['apr25_a'] ?? 0),
                    'may_25_a'          => $this->formatValue($row['may25_a'] ?? 0),
                    'jun_25_a'          => $this->formatValue($row['jun25_a'] ?? 0),
                    'jul_25_f2'         => $this->formatValue($row['jul25_f2'] ?? 0),
                    'aug_25_f2'         => $this->formatValue($row['aug25_f2'] ?? 0),
                    'sep_25_f2'         => $this->formatValue($row['sep25_f2'] ?? 0),
                    'oct_25_f2'         => $this->formatValue($row['oct25_f2'] ?? 0),
                    'nov_25_f2'         => $this->formatValue($row['nov25_f2'] ?? 0),
                    'dec_25_f2'         => $this->formatValue($row['dec25_f2'] ?? 0),
                    'fy_2025_h1'        => $this->formatValue($row['fy_2025_h1'] ?? 0),
                    'h1'                => $this->formatValue($row['h1'] ?? 0),
                    'h2_july'           => $this->formatValue($row['h2_july'] ?? 0),
                    'per_month'         => $this->formatValue($row['per_month'] ?? 0),
                    're_forecast_25_h2' => $this->formatValue($row['re_forecast25_h2'] ?? 0),
                    'fy2025'            => $this->formatValue($row['fy2025'] ?? 0),
                    'status'            => $row['status'] ?? '',
                ]);
            }
        }
    }

    private function formatValue($value)
    {
        if ($value instanceof Cell) {
            return $value->getFormattedValue(); // Jo Excel me dikh rha hai wahi lega
        }
        return $value;
    }
}
