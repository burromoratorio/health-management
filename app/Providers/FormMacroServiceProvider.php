<?php

namespace App\Providers;

use Form;
use Illuminate\Support\ServiceProvider;

class FormMacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Create an input type text with gentelella style
        Form::macro('InputTextGentelella', function($showName, $name, $required = true, $value = null, $disabled="",$length = null )
        {
            $html = '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="'.$name.'">';
            $html .= $showName;

            if ( $required ) $html .= ' <span class="required">*</span>';

            $html .= '</label><div class="col-md-6 col-sm-6 col-xs-12">';
            $options = ['class' => 'form-control col-md-7 col-xs-12',
                        'autocomplete' => 'off',
                        'id' => $name,
                        $disabled ];

            if ( $required ) $options['required'] = 'required';
            if ( $length && is_int($length) )  $options['maxlength'] = $length;

            $html .= Form::text($name, $value, $options );

            $html .= '</div>';
            return $html;
        });

        // Create an input type password with gentelella style
        Form::macro('InputPassGentelella', function($showName, $name, $value = null )
        {
            $html = '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="'.$name.'">';
            $html .= $showName;

            $html .= '</label><div class="col-md-6 col-sm-6 col-xs-12">';
            $options = ['class' => 'form-control col-md-7 col-xs-12',
                        'autocomplete' => 'off',
                        'id' => $name ];

            $html .= Form::password($name, $options );

            $html .= '</div>';
            return $html;
        });

        // Create an input type select with gentelella style
        Form::macro('InputSelectGentelella', function($showName, $name, $arrayValues, $selected = null, $placeholder = '', $required = true )
        {
            $html = '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="'.$name.'">';
            $html .= $showName;

            if ( $required ) $html .= ' <span class="required">*</span>';

            $html .= '</label><div class="col-md-6 col-sm-6 col-xs-12">';
            $options = ['class' => 'form-control col-md-7 col-xs-12', 'id' => $name ];

            if ( $required ) $options['required'] = 'required';
            if ( $placeholder ) $options['placeholder'] = $placeholder;

            $html .= Form::select($name, $arrayValues, $selected, $options);

            $html .= '</div>';
            return $html;
        });

        // Create an input type textArea with gentelella style
        Form::macro('TextAreaGentelella', function($showName, $name, $value = null, $required = true )
        {
            $html = '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="'.$name.'">';
            $html .= $showName;

            if ( $required ) $html .= ' <span class="required">*</span>';

            $html .= '<br><small>(Max. 255 caracteres)</small></label>';
            $html .= '<div class="col-md-6 col-sm-6 col-xs-12">';

            $options = [
                'class' => 'form-control',
                'data-parsley-trigger' => 'keyup',
                'data-parsley-minlength' => '20',
                'data-parsley-maxlength' => '255',
                'data-parsley-minlength-message' => 'Ingrese al menos 20 caracteres',
                'data-parsley-validation-threshold' => '10',
                'rows' => 'auto',
                'id'   => $name
            ];

            if ( $required ) $options['required'] = 'required';

            $html .= Form::textArea($name, $value, $options );
            $html .= '</div>';
            return $html;
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
