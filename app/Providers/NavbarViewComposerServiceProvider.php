<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Menu;
use Auth;

class NavbarViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot( )
    {
        view()->composer('layouts.side_menu', function($view){

            $menu        = [];
            $arrPermisos = [];
            $str         = '';
            $icon        = 'fa-caret-right';

            $user = Auth::user();

            $mnu_ppal = Menu::join('modules', 'modules.id', '=', 'modulo_id')
                            ->orderBy('modules.display_name')
                            ->get();

            foreach ( $mnu_ppal as $key => $value ) {

                if ( !is_null($value) ) {
                    $permiso = $value->module->name.'-ver';

                    if ( $user->can( $permiso ) ) {

                        if ( is_null( $value->parent_id ) ) {

                            $firstLevel = $mnu_ppal->where( "nivel", 1 )
                                                   ->where( "parent_id", $value->modulo_id );

                            $firstLevel = $firstLevel->sortBy("display_name");

                            $firstSon = count($firstLevel);

                            if ( $firstSon > 0 ) {

                                $str .= '<li><a><i class="fa ';
                                $str .= ( is_null( $value->module->icon ) ? $icon : $value->module->icon );
                                $str .= '"></i>';
                                $str .= $value->module->display_name;
                                $str .= '<span class="fa fa-chevron-down"></span></a>';
                                $str .= '<ul class="nav child_menu">';

                                foreach ( $firstLevel as $key => $firstChild ) {

                                    $frstChildPermission = $firstChild->module->name.'-ver';

                                    if ( $user->can( $frstChildPermission ) ) {

                                        $secondLevel = $mnu_ppal->where( "nivel", 2 )
                                                                ->where( "parent_id", $firstChild->modulo_id );

                                        $secondSon = count($secondLevel);

                                        if ( $secondSon > 0 ) {

                                            $str .= '<li><a><i class="fa ';
                                            $str .= ( is_null( $firstChild->module->icon ) ? $icon : $firstChild->module->icon );
                                            $str .= '"></i>';
                                            $str .= $firstChild->module->display_name;
                                            $str .= '<span class="fa fa-chevron-down"></span></a>';
                                            $str .= '<ul class="nav child_menu">';

                                            foreach ( $secondLevel as $key => $secondChild ) {

                                                $scndChildPermissin = $secondChild->module->name.'-ver';

                                                if ( $user->can($scndChildPermissin) ) {

                                                    $str .= '<li class="sub_menu">';
                                                    $str .= '<a href="' .url( $secondChild->module->name ). '"><i class="fa ';
                                                    $str .= ( is_null( $secondChild->module->icon ) ? $icon : $secondChild->module->icon );
                                                    $str .= '"></i>';
                                                    $str .= $secondChild->module->display_name;
                                                    $str .= '</a></li>';
                                                }
                                            }

                                            $str .= '</ul></li>';

                                        } else {

                                            $str .= '<li><a href="' .url( $firstChild->module->name ). '"><i class="fa ';
                                            $str .= ( is_null( $firstChild->module->icon ) ? $icon : $firstChild->module->icon );
                                            $str .= '"></i>';
                                            $str .= $firstChild->module->display_name;
                                            $str .= '</a></li>';

                                        }
                                    }
                                }

                                $str .= '</ul></li>';

                            } else {

                                $str .= '<li><a href="' .url( $value->module->name ). '">';
                                $str .= '<i class="fa ';
                                $str .= ( is_null( $value->module->icon ) ? $icon : $value->module->icon );
                                $str .= '"></i> ';
                                $str .= $value->module->display_name;
                                $str .= '</span></a></li>';

                            }
                        }
                    }
                }
            }

            $view->with('menu', $str);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
