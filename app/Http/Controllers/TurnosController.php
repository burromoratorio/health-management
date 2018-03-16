<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use DB;
use Response;
use Session;
Use Log;
use Carbon\Carbon;

use App\User;


class TurnosController extends Controller
{
	public $module = 'turnos';
	
    public function index(Request $request) {
		$usuario	= Auth::user();
		//$auth = $request->session()->get('auth');
		if ( Auth::user()->hasRole('super-user') ) {
			return view("turnos.index");
		}else{
			return view('login');
		}
        /*if($usuario){
			dd($usuario);
			return view("index");
		}else{
			return view('login');
		}*/
        
    }
    public function AutenticateUser(){
		return view("turnos.index");
		//Session::flash('auth', 'si');
		//return redirect()->back();
	}
	public function entrar(){
		
		return view("welcome");
	}
}
