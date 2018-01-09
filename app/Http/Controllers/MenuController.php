<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Module;
use App\Menu;
use Session;
use Auth;
use DB;

class MenuController extends Controller
{
    public $module = 'menú';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = $this->module;

        $optModulos = Module::orderBy('display_name')
                            ->pluck('display_name', 'id' );

        $optMenu = Module::orderBy('display_name')
                         ->pluck('display_name', 'id' );

        $optMenu->prepend('Menú principal', 0);

        return view('menus.list', compact('title', 'description', 'optModulos', 'optMenu'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Busco el modulo que se quiere anidar en la tabla de menu
        $menu = Menu::where( "modulo_id", $request->optModulo )->first();

        // optModulo  -> el que se desea anidar
        // optMenu -> donde se anida
        if ( is_null($menu) ){
            $menu = new Menu;
        }

        if ( $request->optMenu != 0 ) {

            $parent = Menu::where("modulo_id", $request->optMenu )->first();

            $menu->parent_id = $request->optMenu;
            $menu->nivel     = ( is_null( $parent->nivel ) ? 1 : $parent->nivel + 1 );

        }

        $menu->save();

        $msg = 'El menu ha sido agregado satisfactoriamente!';

        return redirect()
             ->back()
             ->with('message', $msg )
             ->with('alert-class', 'alert-success' );

    }

}
