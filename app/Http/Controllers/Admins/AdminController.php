<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller {

    public function getCreateF() {
        $show = false;
        $text = 'Create';
        return view('template.fundCreate', array('show' => $show, 'text' => $text));
    }
    public function getCreateN() {
        $show = false;
        $text = 'Create';
        return view('template.newCreate', array('show' => $show, 'text' => $text));
    }

    public function getCreateFund() {
        $qry = array();
        $id_bank = Input::get('idbank');
        $ref = Input::get('ref');
        $name = Input::get('name');
        $short_name = Input::get('name_short');
        $risk = Input::get('risk');
        $payment = Input::get('pay');
        $link = Input::get('url');
        
        DB::table('fund')->insert(
                ['idfund'=>'$ref','nobk' => $id_bank, 'namefund' => $name, 'shortfd' => $short_name, 'risk' => $risk, 'payment' => $payment,'link'=>$link]
        );
    }
    public function getCreateNews() {
        $qry = array();
        $topic = Input::get('name_topic');
        $descrip = Input::get('des_news');
        DB::table('news')->insert(
                ['topic_name'=>$topic,'description' => $descrip]
        );
        return view('template.newcreate');
    }
    public function getUsercompain() {
         
        $qry = DB::table('contact')->get();
        $num = count($qry);
        
        return view('template.usercompain', array("qry" => $qry, "num" => $num));
        
    }
    public function getUpdate() {
        $check = false;
        $id = Input::get('id');
        $ref = Input::get('ref');
        $name = Input::get('name');
        $name_short = Input::get('name_short');
        $risk = Input::get('risk');
        $pay = Input::get('pay');
        $url= Input::get('url');
        echo 's';
        if($ref!==null){
            DB::table('fund')
            ->where('id_album', $id)
            ->update(['idfund' => $ref]);
        }
        if($name!==null){
            DB::table('fund')
            ->where('id_album', $id)
            ->update(['namefund' => $name]);
        }
        if ($name_short!==null) {
         DB::table('album')
            ->where('id_album', $id)
            ->update(['cost' => $cost]);
        }
        if ($price!==null) {
         DB::table('album')
            ->where('id_album', $id)
            ->update(['price' => $price]);
        }
        if ($count!==null) {
         DB::table('album')
            ->where('id_album', $id)
            ->update(['count' => $count]);
        }
       
        return self::getSelect();
    }
    public function getSelect() {
        /* select  form database table fund */
        $check = true;
        $qry = "Select";
        $fund = DB::table('fund')->pluck('namefund', 'idfund')->toArray();
        return view('template.updatefund', compact('fund', $fund),array("qry" => $qry,"check"=>$check));
    }
   
   
    public function getEdit() {
        $id = Input::get('fund');
        $qry = "test";
        $fund = DB::table('fund')->where('idfund', $id)->first();
        $check = false;
        return view('template.updatefund',array("qry" => $qry,"check"=>$check,"fund"=>$fund));
    }
    
    

}

?>