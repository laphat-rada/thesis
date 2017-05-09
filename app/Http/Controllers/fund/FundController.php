<?php

namespace App\Http\Controllers\fund;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class FundController extends Controller {

    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */

    
    public function getFund() {
        /* select fund form database table fund */
        $fund = DB::table('fund')->pluck('namefund', 'idFund')->toArray();
        return view('template.fundselect', compact('fund', $fund));
    }

    public function getResult() {

        $exp = Input::get('exp');
        $fund1 = Input::get('fund1');
        $fund2 = Input::get('fund2');
        $fund3 = Input::get('fund3');
        $fund4 = Input::get('fund4');
        $fund5 = Input::get('fund5');

        $s_exp = round(($exp * 1000) / 8) * 0.188;
        $f1 = self::getName($fund1);
        $f2 = self::getName($fund2);
        $f3 = self::getName($fund3);
        $f4 = self::getName($fund4);
        $f5 = self::getName($fund5);


        $s_risk1 = self::getRisk($fund1);
        $s_risk2 = self::getRisk($fund2);
        $s_risk3 = self::getRisk($fund3);
        $s_risk4 = self::getRisk($fund4);
        $s_risk5 = self::getRisk($fund5);

        $s_pay1 = self::getPay($fund1);
        $s_pay2 = self::getPay($fund2);
        $s_pay3 = self::getPay($fund3);
        $s_pay4 = self::getPay($fund4);
        $s_pay5 = self::getPay($fund5);

        $s_nav1 = self::getNav($fund1);
        $s_nav2 = self::getNav($fund2);
        $s_nav3 = self::getNav($fund3);
        $s_nav4 = self::getNav($fund4);
        $s_nav5 = self::getNav($fund5);

        $s_vary1 = self::getVary($fund1);
        $s_vary2 = self::getVary($fund2);
        $s_vary3 = self::getVary($fund3);
        $s_vary4 = self::getVary($fund4);
        $s_vary5 = self::getVary($fund5);

        $sumary = array();
        $sumarysort = array();
        $namesort = array();
        $names = array();
        $qryid = array();
        $qryshow = array();
        $qrypay = array();
        $qryrisk = array();
        $sumary[0] = $s_risk1 + $s_pay1 + $s_nav1 + $s_vary1 + $s_exp;
        $sumary[1] = $s_risk2 + $s_pay2 + $s_nav2 + $s_vary2 + $s_exp;
        $sumary[2] = $s_risk3 + $s_pay3 + $s_nav3 + $s_vary3 + $s_exp;
        $sumary[3] = $s_risk4 + $s_pay4 + $s_nav4 + $s_vary4 + $s_exp;
        $sumary[4] = $s_risk5 + $s_pay5 + $s_nav5 + $s_vary5 + $s_exp;

        $names[0] = $f1;
        $names[1] = $f2;
        $names[2] = $f3;
        $names[3] = $f4;
        $names[4] = $f5;

        $sumarysort = self::bubbleSort($sumary);
        $namesort = self::getNamesort($names, $sumary, $sumarysort);
        for ($i = 0; $i < 5; $i++) {
           $qryid[$i] = self::getQryid($namesort[$i]);
           $qryshow[$i] = self::getQryShow($qryid[$i]);
           $qryrisk[$i] = self::getQryRisk($namesort[$i]);
           $qrypay[$i] = self::getQryPay($namesort[$i]);
        }
        
//        if (Auth::guest()) {
//            $save = "โปรดลงชื่อเข้าใช้เพื่อบันทึกข้อมูล";
//        } else {
//            
//            DB::table('save')->insert([                   
//                    ['nouser' =>  Auth::user()->id ,'no_1' => $namesort[4],'no_2' => $namesort[3],'no_3' => $namesort[2],'no_4' => $namesort[1],'no_5' => $namesort[0]]
//            ]);
//            $save = "บันทึกข้อมูลเรียบร้อยแล้ว";
//        }
        return view('template.fundresult', ['s_exp' => $s_exp], array("s_risk1" => $s_risk1,
            "s_risk2" => $s_risk2,
            "s_risk3" => $s_risk3,
            "s_risk4" => $s_risk4,
            "s_risk5" => $s_risk5,
            "s_pay1" => $s_pay1,
            "s_pay2" => $s_pay2,
            "s_pay3" => $s_pay3,
            "s_pay4" => $s_pay4,
            "s_pay5" => $s_pay5,
            "s_nav1" => $s_nav1,
            "s_nav2" => $s_nav2,
            "s_nav3" => $s_nav3,
            "s_nav4" => $s_nav4,
            "s_nav5" => $s_nav5,
            "s_vary1" => $s_vary1,
            "s_vary2" => $s_vary2,
            "s_vary3" => $s_vary3,
            "s_vary4" => $s_vary4,
            "s_vary5" => $s_vary5,
            "f1" => $f1,
            "f2" => $f2,
            "f3" => $f3,
            "f4" => $f4,
            "f5" => $f5,
            "sumarysort" => $sumarysort,
            "names" => $names,
            "sumary" => $sumary,
            "namesort" => $namesort,
            
            "qryshow" => $qryshow,
            "qrypay"=>$qrypay,
            "qryrisk"=>$qryrisk 
//            "sumary1" => $sumary1,
//            "sumary2" => $sumary2,
//            "sumary3" => $sumary3,
//            "sumary4" => $sumary4,
//            "sumary5" => $sumary5,
                )
        );
    }
    public function getQryid($name) {
        $qry = DB::table('fund')->where('namefund', $name)->first();
        return $qry->idfund;
    }
    public function getQryPay($name) {
        $qry = DB::table('fund')->where('namefund', $name)->first();
        return $qry->payment;
    }
    public function getQryRisk($name) {
        $qry = DB::table('fund')->where('namefund', $name)->first();
        return $qry->risk;
    }
    public function getQryShow($fund) {
        $qry = DB::table('nav')->where('foo', $fund)->first();
        return $qry->Alltime;
    }
    public function bubbleSort($data) {

        for ($i = 0; $i < 5; $i++) {
            for ($j = 0; $j < 5 - 1 - $i; $j++) {
                if ($data[$j + 1] < $data[$j]) {
                    $data = self::swappositions($data, $j, $j + 1);
                }
            }
        }
        return $data;
    }

    public function getNamesort($name_n, $sum, $sum_sort) {
        for ($i = 0; $i < 5; $i++) {
            for ($j = 0; $j < 5; $j++) {
                if ($sum_sort[$i] == $sum[$j]) {
                    $data[$i] = $name_n[$j];
                }
            }
        }
        return $data;
    }

    public function swappositions($data, $left, $right) {
        $backup_old_data_right_value = $data[$right];
        $data[$right] = $data[$left];
        $data[$left] = $backup_old_data_right_value;
        return $data;
    }

    public function getName($fund) {

        $qry = DB::table('fund')->where('idfund', $fund)->first();
        $fname = $qry->namefund;
        return $fname;
    }

    
    public function getRisk($fund) {

        $qry = DB::table('fund')->where('idfund', $fund)->first();
        $risk = $qry->risk;
        $payment = $qry->payment;

        if ($risk == 1) {
            return round((5 * 1000) / 9) * 0.158;
        } elseif ($risk == 2) {
            return round((7 * 1000) / 9) * 0.158;
        } elseif ($risk == 3) {
            return round((9 * 1000) / 9) * 0.158;
        } elseif ($risk == 4) {
            return round((8 * 1000) / 9) * 0.158;
        } elseif ($risk == 5) {
            return round((6 * 1000) / 9) * 0.158;
        } elseif ($risk == 6) {
            return round((4 * 1000) / 9) * 0.158;
        } elseif ($risk == 7) {
            return round((3 * 1000) / 9) * 0.158;
        } else {
            return round((1 * 1000) / 9) * 0.158;
        }
    }

    public function getPay($fund) {
        $qry = DB::table('fund')->where('idfund', $fund)->first();
        $payment = $qry->payment;
        if ($payment < 1.00) {
            return round((9 * 1000) / 9) * 0.158;
        } elseif ($payment < 2.00) {
            return round((7 * 1000) / 9) * 0.158;
        } elseif ($payment < 3.00) {
            return round((1 * 1000) / 9) * 0.158;
        } else {
            return round((0.5 * 1000) / 9) * 0.158;
        }
    }

    public function getNav($fund) {
        $qry = DB::table('nav')->where('foo', $fund)->first();

        $m1 = $qry->m3nav;
        $m2 = $qry->m6nav;
        $m3 = $qry->y1nav;
        $m4 = $qry->y3nav;
        $m5 = $qry->y5nav;
        $m6 = $qry->y10nav;
        $m7 = $qry->Alltime;

        $m3nav = self::checkNV($m1);
        $m6nav = self::checkNV($m2);
        $y1nav = self::checkNV($m3);
        $y3nav = self::checkNV($m4);
        $y5nav = self::checkNV($m5);
        $y10nav = self::checkNV($m6);
        $allnav = self::checkNV($m7);

        $sum = $m3nav + $m6nav + $y1nav + $y3nav + $y5nav + $y10nav + $allnav;
        return (($sum * 1000) / 50) * 0.248;
    }

    public function getVary($fund) {
        $qry = DB::table('vary')->where('fnumber', $fund)->first();

        $m1 = $qry->m3vary;
        $m2 = $qry->m6vary;
        $m3 = $qry->y1vary;
        $m4 = $qry->y3vary;
        $m5 = $qry->y5vary;
        $m6 = $qry->y10vary;
        $m7 = $qry->Alltime;

        $m3vary = self::checkNV($m1);
        $m6vary = self::checkNV($m2);
        $y1vary = self::checkNV($m3);
        $y3vary = self::checkNV($m4);
        $y5vary = self::checkNV($m5);
        $y10vary = self::checkNV($m6);
        $allvary = self::checkNV($m7);

        $sum = $m3vary + $m6vary + $y1vary + $y3vary + $y5vary + $y10vary + $allvary;
        return (($sum * 1000) / 50) * 0.248;
    }

    public function checkNV($nav) {

        if ($nav < -10) {
            return 1.50;
        } elseif ($nav < -9) {
            return 1.75;
        } elseif ($nav < -8) {
            return 2.00;
        } elseif ($nav < -7) {
            return 2.25;
        } elseif ($nav < -6) {
            return 2.50;
        } elseif ($nav < -5) {
            return 2.75;
        } elseif ($nav < -4) {
            return 3.00;
        } elseif ($nav < -3) {
            return 3.25;
        } elseif ($nav < -2) {
            return 3.50;
        } elseif ($nav < -1) {
            return 3.75;
        } elseif ($nav < 0) {
            return 4.00;
        } elseif ($nav < 1) {
            return 4.25;
        } elseif ($nav < 2) {
            return 4.50;
        } elseif ($nav < 3) {
            return 4.75;
        } elseif ($nav < 4) {
            return 5.00;
        } elseif ($nav < 5) {
            return 5.25;
        } elseif ($nav < 6) {
            return 5.50;
        } elseif ($nav < 7) {
            return 5.75;
        } elseif ($nav < 8) {
            return 6.00;
        } elseif ($nav < 9) {
            return 6.25;
        } elseif ($nav < 10) {
            return 6.50;
        } elseif ($nav < 11) {
            return 6.75;
        } elseif ($nav < 12) {
            return 7.00;
        } elseif ($nav < 13) {
            return 7.25;
        } elseif ($nav < 14) {
            return 7.50;
        } elseif ($nav < 15) {
            return 7.75;
        } elseif ($nav < 16) {
            return 8.00;
        } elseif ($nav < 17) {
            return 8.25;
        } elseif ($nav < 18) {
            return 8.50;
        } elseif ($nav < 19) {
            return 8.75;
        } else {
            return 9.00;
        }
    }

// do things with them...
//    public function getRisk($qry) {
//        
//        return view('template.fundresult', ['scorerisk' => $scorerisk],['qry' => $qry]);
//    }
}

//             return Redirect::to('people/'.$lastName.'/'.$firstName) ;
//    }
//    public function show($lastName,$firstName) {
//        $qry = 'SELECT * FROM tableFoo WHERE LastName LIKE "'.$lastName.'" AND GivenNames LIKE "'.$firstName.'%" ' ;
//        $ppl = DB::select($qry);
//        return view('people.show', ['ppl' => $ppl] ) ;
//    }  
//$navres = DB::table('nav')->where('foo',$fund1)->first();
//