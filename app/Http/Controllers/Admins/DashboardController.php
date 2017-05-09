<?php

namespace App\Http\Controllers\Admins; // กำหนดที่อยู่ของ Controller

use App\Http\Controllers\Controller; //เรียกใช้ Controller หลักของ Laravel 5.0
use Illuminate\Http\Request;

class DashboardController extends Controller {

    public function getIndex() {
       
        return view('admin.dashboard.index');
    }
    
   
    
    

    public function getCalculate(Request $request) {
        $salary = $request->input('salary');
        $salary_up = $request->input('salary_up');
        $salary_per_month = $request->input('salary_per_month');
        $bonus_per_salary = $request->input('bonus_per_salary');
        $purpose_per_year = $request->input('purpose_per_year');
        $age = $request->input('age');


        $age_math = (60 - $age);
        $salary_sum = array();
        $salary_month_up = array();
        $bonus_sum = array();
        $month1_year = array();
        $benefit = array();
        $income = array();
        $month12_year = array();        
        $sum_up = ($salary_up + 100) / 100;
        $sum_purpose = $purpose_per_year  / 100;
        for ($i = 1; $i <= $age_math+1; $i++) {
            if ($i == 1) {
                $salary_month_up[$i] = $salary;
                $month1_year[$i] = 0;
            } 
            else {

                $salary_month_up[$i] = round($salary_month_up[$i - 1] * $sum_up);
                $month1_year[$i] = round($month12_year[$i -1]); 
            }
            $salary_sum[$i] = round(($salary_month_up[$i] * $salary_per_month) / 100);
            $bonus_sum[$i] = round($salary_month_up[$i] * $bonus_per_salary);                        
            $income[$i] = round(($salary_sum[$i] * 12) + $bonus_sum[$i]);
            $benefit[$i] = round($month1_year[$i]  * $sum_purpose);
            $month12_year[$i] = round($month1_year[$i] + $income[$i] + $benefit[$i] );
            
        }

        $data = array(
            'salary' => $salary,
            'salary_up' => $salary_up,
            'salary_per_month' => $salary_per_month,
            'bonus_per_salary' => $bonus_per_salary,
            'purpose_per_year' => $purpose_per_year,
            'age_math' => $age_math,
            'age' => $age
        );

        return view("admin.layouts.table-cal", $data, array("salary_month_up"=>$salary_month_up,"salary_sum" => $salary_sum, "bonus_sum" => $bonus_sum,
            "month1_year" => $month1_year, "income" => $income, "benefit" => $benefit ,"month12_year" => $month12_year));
    }

}
