<?php
include("DynaDBWhereBuilder.php");
class DynaDBModels extends DynaDBWhereBuilder {
    //GENERAL
    public function getDaysInMonth($data){
        $slicing = explode("-", $data);
        $month = $slicing[1];
        $year = $slicing[0];
        $DayInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        return $DayInMonth;
    }

    public function getMonthNumber($data){
        $slicing = explode("-", $data);
        $month = $slicing[1];
        return $month;
    }

    public function getYears($data) {
        $slicing = explode("-", $data);
        $year = $slicing[0];
        return $year;
    }

    public function getNumeric($day){
        $output = "";
        if ($day < 10) {
            $output = "0" . $day;
        } else {
            $output = $day;
        }
        return $output;
    }

    public function count_array_values($my_array, $match){
        $count = 0;
        foreach ($my_array as $arr) {
            if ($arr->Lang == $match) {
                $count++;
            }
        }
        return $count;
    }
    

    public function GetFiscalYear(){
        $thisMonth = intval(date('m'));
        $thisYear = intval(date('Y'));
        $current_fiscal_year = 0;
        if ($thisMonth >= 4) {
            $current_fiscal_year = $thisYear;
        } else {
            $current_fiscal_year = $thisYear-1;
        }
        return $current_fiscal_year;
    }














    
}