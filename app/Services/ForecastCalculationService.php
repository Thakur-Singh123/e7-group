<?php
namespace App\Services;

class ForecastCalculationService
{
    public function getTotalsYearWise($query)
    {
        return [
            'jan' => (int)$query->sum('jan_25_a'),
            'feb' => (int)$query->sum('feb_25_a'),
            'mar' => (int)$query->sum('mar_25_a'),
            'apr' => (int)$query->sum('apr_25_a'),
            'may' => (int)$query->sum('may_25_a'),
            'jun' => (int)$query->sum('jun_25_a'),
            'jul' => (int)$query->sum('jul_25_f2'),
            'aug' => (int)$query->sum('aug_25_f2'),
            'sep' => (int)$query->sum('sep_25_f2'),
            'oct' => (int)$query->sum('oct_25_f2'),
            'nov' => (int)$query->sum('nov_25_f2'),
            'dec' => (int)$query->sum('dec_25_f2'),
        ];
    }

    //function for get half year total
    public function getRecordHalfYearTotal($record)
    {
        return 
          (int)$record->jan_25_a
         + (int)$record->feb_25_a
         + (int)$record->mar_25_a
         + (int)$record->apr_25_a
         + (int)$record->may_25_a
         + (int)$record->jun_25_a;
    }

    //function for get totals of this function getRecordHalfYearTotal
    public function fy_h1_total($query)
    {
        return (int)$query->sum('jan_25_a') 
            + (int)$query->sum('feb_25_a')
            + (int)$query->sum('mar_25_a')
            + (int)$query->sum('apr_25_a')
            + (int)$query->sum('may_25_a')
            + (int)$query->sum('jun_25_a');
    }

    //function for get other half year total from july
    public function getRecordHalfYearTotalFromJuly($record)
    {
        return (int)$record->jul_25_f2
         + (int)$record->aug_25_f2
         + (int)$record->sep_25_f2
         + (int)$record->oct_25_f2
         + (int)$record->nov_25_f2
         + (int)$record->dec_25_f2;
    }

    //function for get totals of this function getRecordHalfYearTotalFromJuly
    public function fy_h2_total($query)
    {
        return (int)$query->sum('jul_25_f2') 
            + (int)$query->sum('aug_25_f2')
            + (int)$query->sum('sep_25_f2')
            + (int)$query->sum('oct_25_f2')
            + (int)$query->sum('nov_25_f2')
            + (int)$query->sum('dec_25_f2');
    }

    //function for get full year total for each month
    public function getFullYearTotaleachMonth($record)
    {
        return $this->getRecordHalfYearTotal($record) 
            + $this->getRecordHalfYearTotalFromJuly($record);
    }

    //function for get full year total for all month
    public function getFullYearTotalAllRecords($query){
      return (int)$query->sum('jan_25_a') 
            + (int)$query->sum('feb_25_a')
            + (int)$query->sum('mar_25_a')
            + (int)$query->sum('apr_25_a')
            + (int)$query->sum('may_25_a')
            + (int)$query->sum('jun_25_a')
            + (int)$query->sum('jul_25_f2') 
            + (int)$query->sum('aug_25_f2')
            + (int)$query->sum('sep_25_f2')
            + (int)$query->sum('oct_25_f2')
            + (int)$query->sum('nov_25_f2')
            + (int)$query->sum('dec_25_f2');
    }
}
