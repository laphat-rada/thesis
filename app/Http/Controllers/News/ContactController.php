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

class ContactController extends Controller {
    

    public function getComment() {
        $text = Input::get('comment');
        DB::table('contact')->insert([
                ['iduser' => Auth::user()->id,'name' => Auth::user()->name, 'text' => $text]
        ]);
        return self::getShowCm();
    }
    public function getShowCm() {       
        $qry = DB::table('contact')->get();
        $num = count($qry);
        return view('template.Contact', array("qry" => $qry, "num" => $num));
    }

}
