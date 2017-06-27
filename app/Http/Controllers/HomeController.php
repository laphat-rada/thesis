<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; //เรียกใช้ Controller หลักของ Laravel 5.0
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {           
        $new = DB::table('news')->get();
        $num = count($new);
        return view('template.webpage',array('new' => $new,'num' => $num));
        
    }
}
