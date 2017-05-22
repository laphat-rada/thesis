<?php

namespace App\Http\Controllers\News; // กำหนดที่อยู่ของ Controller

use App\Http\Controllers\Controller; //เรียกใช้ Controller หลักของ Laravel 5.0
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class WebpageController extends Controller {

    public function getNewshow(){
        $new = DB::table('news')->get();
        $num = count($new);
        return view('template.webpage',array('new' => $new,'num' => $num));
    }

        public function getContract() {
        return view('template.contract');
    }

    public function getIndex() {
        return view('template.webpage');
    }

    public function getNews() {
        $id = Input::get('id');
        $new = DB::table('news')->where('id_news',$id)->first();
        $num = count($new);
        return view('template.news',array('new' => $new,'num' => $num,'id'=>$id));
    }

    public function getNews2() {
        return view('template.news2');
    }

    public function getNews3() {
        return view('template.news3');
    }

    public function getNews4() {
        return view('template.news4');
    }

    public function getFund() {
        $show = false;
        return view('template.fundinfo', array('show' => $show));
    }

    public function getBank() {
        $bank = Input::get('bnk');
        $qry = DB::table('fund')->where('nobk', $bank)->get();
        $num = count($qry);
        $namebank = self::getNbank($bank);
        $show = true;

        return view('template.fundinfo', array("qry" => $qry, "num" => $num, "namebank" => $namebank, "show" => $show));
    }

    public function getNbank($bank) {
        $qry = DB::table('bank')->where('idBank', $bank)->first();
        $nbank = $qry->nameBank;
        return $nbank;
    }

    public function getProfile() {
        $id = Auth::user()->id;
        $qry = DB::table('save')->where('nouser', $id)->get();
        $num = count($qry);
        return view('template.showSave', array("qry" => $qry, "num" => $num));
    }

}
