<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
Use Log;
use Storage;
Use File;
use PHPExcel; 
use PHPExcel_IOFactory;
use Response;
use Session;

class StartupController extends Controller
{
    public function index(Request $request) {
		$auth = $request->session()->get('auth');
        if($auth=="si"){
			return view("index");
		}else{
			return view('login');
		}
        
    }
    public function AutenticateUser(){
		Session::flash('auth', 'si');
		return redirect()->back();
	}
}
