var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */
elixir(function(mix) {
    mix.scripts([
        //'../../../node_modules/jquery/dist/jquery.js',
       // '../../../node_modules/bootstrap-sass/assets/javascripts/bootstrap.js',
        '../../../resources/assets/bower_components/jquery/jquery.min.js',
        '../../../resources/assets/js/jquery.cookie.js',
        '../../../resources/assets/js/jquery.dataTables.min.js',
        '../../../resources/assets/js/jquery.noty.js',
        '../../../resources/assets/js/jquery.raty.min.js',
        '../../../resources/assets/js/jquery.iphone.toggle.js',
        '../../../resources/assets/js/jquery.autogrow-textarea.js',
        '../../../resources/assets/js/jquery.uploadify-3.1.min.js',
        '../../../resources/assets/js/jquery.history.js',
        '../../../resources/assets/js/charisma.js',
        '../../../resources/assets/bower_components/bootstrap/dist/js/bootstrap.min.js',
        '../../../resources/assets/bower_components/moment/min/moment.min.js',
        '../../../resources/assets/bower_components/fullcalendar/dist/fullcalendar.min.js',
        '../../../resources/assets/bower_components/chosen/chosen.jquery.min.js',
        '../../../resources/assets/bower_components/colorbox/jquery.colorbox-min.js',
        '../../../resources/assets/bower_components/responsive-tables/responsive-tables.js',
        '../../../resources/assets/bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js'
        
	]);
    mix.sass(['app.scss'], 'resources/assets/css/');
    mix.styles([
		'../../../resources/assets/css/bootstrap-cerulean.min.css',
		'../../../resources/assets/css/charisma-app.css',
        '../../../resources/assets/bower_components/fullcalendar/dist/fullcalendar.css',
        '../../../resources/assets/bower_components/fullcalendar/dist/fullcalendar.print.css',
        '../../../resources/assets/bower_components/chosen/chosen.min.css',
        '../../../resources/assets/bower_components/colorbox/example3/colorbox.css',
        '../../../resources/assets/bower_components/responsive-tables/responsive-tables.css',
        '../../../resources/assets/bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css',
        '../../../resources/assets/css/jquery.noty.css', 
        '../../../resources/assets/css/noty_theme_default.css',
        '../../../resources/assets/css/elfinder.min.css',
        '../../../resources/assets/css/elfinder.theme.css',
        '../../../resources/assets/css/jquery.iphone.toggle.css',
        '../../../resources/assets/css/uploadify.css',
        '../../../resources/assets/css/animate.min.css'
        
     ]);
    mix.copy([
        'resources/assets/fonts/',
    ], 'public/fonts/');
});
