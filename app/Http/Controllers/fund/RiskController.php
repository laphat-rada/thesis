<?php

namespace App\Http\Controllers\fund; // กำหนดที่อยู่ของ Controller

use App\Http\Controllers\Controller; //เรียกใช้ Controller หลักของ Laravel 5.0
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class RiskController extends Controller {

    public function getRisk() {
        return view('template.fund-risk');
    }

    public function getResult() {
        $ans1 = Input::get('ans1');
        $ans2 = Input::get('ans2');
        $ans3 = Input::get('ans3');
        $ans4 = Input::get('ans4');
        $ans5 = Input::get('ans5');
        $ans6 = Input::get('ans6');
        $ans7 = Input::get('ans7');
        $ans8 = Input::get('ans8');
        $ans9 = Input::get('ans9');
        $ans10 = Input::get('ans10');
        $ans11 = Input::get('ans11');
        $score = $ans1 + $ans2 + $ans3 + $ans4 + $ans5 + $ans6 + $ans7 + $ans8 + $ans9 + $ans10 + $ans11;
        $score_pay = array();
        $score_nav = array();
        $risks = array();
        $score_vary = array();
        $sumarysort = array();
        $namesort = array();
        $nav = array();
        $type = array();
        $risks = self::getRisks($score);

        $qry = DB::table('fund')->where('risk', $risks)->get();
        $num = count($qry);
        $score_pay = self::getPay($risks, $qry, $num, $score_pay);

        for ($i = 0; $i < $num; $i++) {
            $score_nav[$i] = self::getNav($qry[$i]->idfund);
        }
        for ($i = 0; $i < $num; $i++) {
            $score_vary[$i] = self::getVary($qry[$i]->idfund);
        }
        for ($i = 0; $i < $num; $i++) {
            $sumary[$i] = $score_nav[$i] + $score_pay[$i] + $score_vary[$i];
        }
        $sumarysort = self::bubbleSort($sumary, $num);
        $namesort = self::getNamesort($qry, $sumary, $sumarysort, $num);
        for ($i = 0; $i < $num; $i++) {
            $nav[$i] = self::getNavAll($namesort[$i]->idfund);
        }
        $type= self::getType($risks,$type);
        
        if (Auth::guest()) {
            $save = "โปรดลงชื่อเข้าใช้เพื่อบันทึกข้อมูล";
        } else {
            
            DB::table('save')->insert([                   
                    ['nouser' =>  Auth::user()->id ,'no_1' => $namesort[$num-1]->shortfd,'no_2' => $namesort[$num-2]->shortfd,'no_3' => $namesort[$num-3]->shortfd,'no_4' => $namesort[$num-4]->shortfd]
            ]);
            $save = "บันทึกข้อมูลเรียบร้อยแล้ว";
        }
        
        return view('template.fundriskresult', array("qry" => $qry, "num" => $num, "score_pay" => $score_pay, "score_nav" => $score_nav,
            "score_vary" => $score_vary, "sumary" => $sumary, "sumarysort" => $sumarysort, "namesort" => $namesort, "nav" => $nav, "type" => $type,
            "score" => $score,"save"=>$save));
    }

    public function getRisks($score) {
        if ($score > 37) {
            //$text = "ท่านเป็นผู้ลงทุนประเภทเสี่ยงสูงมาก หมายความว่า ท่านต้องการได้รับโอกาสที่จะได้รับผลตอบแทนสูง ความเสี่ยงสูงและยอมรับการขาดทุนเป็นจำนวนมากได้";
            $rsk = 8;
        } elseif ($score > 33) {
            //$text = "ท่านเป็นผู้ลงทุนประเภทเสี่ยงสูง หมายความว่า ท่านยอมรับความเสี่ยงได้สูง รับความผันผวนของตลาดได้ และสามารถยอมรับการขาดทุนได้ โดยมุ่งหวังการเติบโตของเงินทุนและผลตอบแทนในระยะยาว";
            $rks = 7;
        } elseif ($score > 30) {
            //$text = "ท่านเป็นผู้ลงทุนประเภทเสี่ยงสูง หมายความว่า ท่านยอมรับความเสี่ยงได้สูง รับความผันผวนของตลาดได้ และสามารถยอมรับการขาดทุนได้ โดยมุ่งหวังการเติบโตของเงินทุนและผลตอบแทนในระยะยาว";
            $rks = 6;
        } elseif ($score > 22) {
            //$text = "ท่านเป็นผู้ลงทุนประเภทเสี่ยงปานกลางค่อนข้างสูง หมายความว่า ท่านสามารถยอมรับมูลค่าการลงทุน ลดเป็นครั้งคราวได้";
            $rks = 5;
        } elseif ($score > 20) {
            //$text = "ท่านเป็นผู้ลงทุนประเภทเสี่ยงปานกลางค่อนข้างต่ำ หมายความว่า ท่านเป็นผู้ลงทุนที่รับความเสี่ยงได้น้อย เน้นปกป้องเงินลงทุน โดยมุ่งหวังรายได้สม่ำเสมอจากเงินลงทุน";
            $rks = 4;
        } elseif ($score > 17) {
            //$text = "ท่านเป็นผู้ลงทุนประเภทเสี่ยงปานกลางค่อนข้างต่ำ หมายความว่า ท่านเป็นผู้ลงทุนที่รับความเสี่ยงได้น้อย เน้นปกป้องเงินลงทุน โดยมุ่งหวังรายได้สม่ำเสมอจากเงินลงทุน";
            $rks = 3;
        } elseif ($score > 15) {
            //$text = "ท่านเป็นผู้ลงทุนประเภทเสี่ยงปานกลางค่อนข้างต่ำ หมายความว่า ท่านเป็นผู้ลงทุนที่รับความเสี่ยงได้น้อย เน้นปกป้องเงินลงทุน โดยมุ่งหวังรายได้สม่ำเสมอจากเงินลงทุน";
            $rks = 2;
        } else {
            //$text = "ท่านเป็นผู้ลงทุนประเภทเสี่ยงต่ำ หมายความว่า ท่านต้องการผลตอบแทนมากกว่าการฝากเงินธนาคารเล็กน้อย ไม่ต้องการความเสี่ยงและมีวัตถุประสงค์การลงทุนระยะสั้นๆ";
            $rks = 1;
        }
        return $rks;
    }

    public function getType($risks,$type) {
        if ($risks == 8) {
            $type[1] = "ท่านเป็นผู้ลงทุนประเภทเสี่ยงสูงมาก หมายความว่า ท่านต้องการได้รับโอกาสที่จะได้รับผลตอบแทนสูง ความเสี่ยงสูงและยอมรับการขาดทุนเป็นจำนวนมากได้";
            $type[2] = "ความเสี่ยงสูงมาก";
            $type[3] = "กองทุนที่มีการลงทุนในทรัพย์สินทางเลือก";
        } elseif ($risks == 7) {
            $type[1] = "ท่านเป็นผู้ลงทุนประเภทเสี่ยงสูง หมายความว่า ท่านยอมรับความเสี่ยงได้สูง รับความผันผวนของตลาดได้ และสามารถยอมรับการขาดทุนได้ โดยมุ่งหวังการเติบโตของเงินทุนและผลตอบแทนในระยะยาว";
            $type[2] = "ความเสี่ยงสูง";
            $type[3] = "กองทุนรวมหมวดอุตสาหกรรม";
        } elseif ($risks == 6) {
            $type[1] = "ท่านเป็นผู้ลงทุนประเภทเสี่ยงสูง หมายความว่า ท่านยอมรับความเสี่ยงได้สูง รับความผันผวนของตลาดได้ และสามารถยอมรับการขาดทุนได้ โดยมุ่งหวังการเติบโตของเงินทุนและผลตอบแทนในระยะยาว";
            $type[2] = "ความเสี่ยงสูง";
            $type[3] = "กองทุนรวมตราสารทุน";
        } elseif ($risks == 5) {
            $type[1] = "ท่านเป็นผู้ลงทุนประเภทเสี่ยงปานกลางค่อนข้างสูง หมายความว่า ท่านสามารถยอมรับมูลค่าการลงทุน ลดเป็นครั้งคราวได้";
            $type[2] = "ความเสี่ยงปานกลางค่อนข้างสูง";
            $type[3] = "กองทุนรวมผสม";
        } elseif ($risks == 4) {
            $type[1] = "ท่านเป็นผู้ลงทุนประเภทเสี่ยงปานกลางค่อนข้างต่ำ หมายความว่า ท่านเป็นผู้ลงทุนที่รับความเสี่ยงได้น้อย เน้นปกป้องเงินลงทุน โดยมุ่งหวังรายได้สม่ำเสมอจากเงินลงทุน";
            $type[2] = "ความเสี่ยงปานกลางค่อนข้างต่ำ";
            $type[3] = "กองทุนรวมตราสารหนี้";
        } elseif ($risks == 3) {
            $type[1] = "ท่านเป็นผู้ลงทุนประเภทเสี่ยงปานกลางค่อนข้างต่ำ หมายความว่า ท่านเป็นผู้ลงทุนที่รับความเสี่ยงได้น้อย เน้นปกป้องเงินลงทุน โดยมุ่งหวังรายได้สม่ำเสมอจากเงินลงทุน";
            $type[2] = "ความเสี่ยงปานกลางค่อนข้างต่ำ";
            $type[3] = "กองทุนรวมพันธบัตรรัฐบาล";
        } elseif ($risks == 2) {
            $type[1] = "ท่านเป็นผู้ลงทุนประเภทเสี่ยงปานกลางค่อนข้างต่ำ หมายความว่า ท่านเป็นผู้ลงทุนที่รับความเสี่ยงได้น้อย เน้นปกป้องเงินลงทุน โดยมุ่งหวังรายได้สม่ำเสมอจากเงินลงทุน";
            $type[2] = "ความเสี่ยงปานกลางค่อนข้างต่ำ";
            $type[3] = "กองทุนรวมตลาดเงิน";
        } else {
            $type[1] = "ท่านเป็นผู้ลงทุนประเภทเสี่ยงต่ำ หมายความว่า ท่านต้องการผลตอบแทนมากกว่าการฝากเงินธนาคารเล็กน้อย ไม่ต้องการความเสี่ยงและมีวัตถุประสงค์การลงทุนระยะสั้นๆ";
            $type[2] = "ความเสี่ยงต่ำ";
            $type[3] = "กองทุนรวมตลาดเงินที่ลงทุนเฉพาะในประเทศ";
        }
        return $type;
    }

    public function bubbleSort($data, $num) {

        for ($i = 0; $i < $num; $i++) {
            for ($j = 0; $j < $num - 1 - $i; $j++) {
                if ($data[$j + 1] < $data[$j]) {
                    $data = self::swappositions($data, $j, $j + 1);
                }
            }
        }
        return $data;
    }

    public function getNamesort($name_n, $sum, $sum_sort, $num) {
        for ($i = 0; $i < $num; $i++) {
            for ($j = 0; $j < $num; $j++) {
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

    public function getNavAll($id) {
        $qry = DB::table('nav')->where('foo', $id)->first();
        return $qry->Alltime;
    }

    public function getPay($rsk, $qry, $num, $score_pay) {
        for ($i = 0; $i < $num; $i++) {
            if ($qry[$i]->payment < 1.00) {
                $score_pay[$i] = round((9 * 1000) / 9) * 0.45;
            } elseif ($qry[$i]->payment < 2.00) {
                $score_pay[$i] = round((7 * 1000) / 9) * 0.45;
            } elseif ($qry[$i]->payment < 3.00) {
                $score_pay[$i] = round((3 * 1000) / 9) * 0.45;
            } else {
                $score_pay[$i] = round((1 * 1000) / 9) * 0.45;
            }
        }
        return $score_pay;
    }

    public function getNav($id) {
        $qry = DB::table('nav')->where('foo', $id)->first();

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
        return (($sum * 1000) / 50) * 0.22;
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
        return (($sum * 1000) / 50) * 0.32;
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

}
