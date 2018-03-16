<!DOCTYPE html>
<html lang="es-ar">
<head>
@include('layouts.head')
</head>
<!--inicio template-->
<body>
    <!-- topbar starts -->
     @include('layouts.top_bar')
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
        @include('layouts.left_menu')
        <!--/span-->
        <!-- left menu ends -->
		<noscript>
            <div class="alert alert-block col-md-12">
                <h4 class="alert-heading">Warning!</h4>

                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                    enabled to use this site.</p>
            </div>
        </noscript>
	<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
                <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Calendar</a>
            </li>
        </ul>
    </div>

    <div class="row">
    <!--dropdown-->
    <div class="control-group">
<label class="control-label" for="selectError2">Group Select</label>
<div class="controls">
<select data-placeholder="Your Favorite Football Team" id="selectError2" data-rel="chosen" style="display: none;">
<option value=""></option>
<optgroup label="NFC EAST">
<option>Dallas Cowboys</option>
<option>New York Giants</option>
<option>Philadelphia Eagles</option>
<option>Washington Redskins</option>
</optgroup>
<optgroup label="NFC NORTH">
<option>Chicago Bears</option>
<option>Detroit Lions</option>
<option>Green Bay Packers</option>
<option>Minnesota Vikings</option>
</optgroup>
<optgroup label="NFC SOUTH">
<option>Atlanta Falcons</option>
<option>Carolina Panthers</option>
<option>New Orleans Saints</option>
<option>Tampa Bay Buccaneers</option>
</optgroup>
<optgroup label="NFC WEST">
<option>Arizona Cardinals</option>
<option>St. Louis Rams</option>
<option>San Francisco 49ers</option>
<option>Seattle Seahawks</option>
</optgroup>
<optgroup label="AFC EAST">
<option>Buffalo Bills</option>
<option>Miami Dolphins</option>
<option>New England Patriots</option>
<option>New York Jets</option>
</optgroup>
<optgroup label="AFC NORTH">
<option>Baltimore Ravens</option>
<option>Cincinnati Bengals</option>
<option>Cleveland Browns</option>
<option>Pittsburgh Steelers</option>
</optgroup>
<optgroup label="AFC SOUTH">
<option>Houston Texans</option>
<option>Indianapolis Colts</option>
<option>Jacksonville Jaguars</option>
<option>Tennessee Titans</option>
</optgroup>
<optgroup label="AFC WEST">
<option>Denver Broncos</option>
<option>Kansas City Chiefs</option>
<option>Oakland Raiders</option>
<option>San Diego Chargers</option>
</optgroup>
</select><div class="chosen-container chosen-container-single" style="width: 189px;" title="" id="selectError2_chosen"><a class="chosen-single chosen-default" tabindex="-1"><span>Your Favorite Football Team</span><div><b></b></div></a><div class="chosen-drop"><div class="chosen-search"><input autocomplete="off" type="text"></div><ul class="chosen-results"><li class="group-result">NFC EAST</li><li class="active-result group-option" style="" data-option-array-index="2">Dallas Cowboys</li><li class="active-result group-option" style="" data-option-array-index="3">New York Giants</li><li class="active-result group-option" style="" data-option-array-index="4">Philadelphia Eagles</li><li class="active-result group-option" style="" data-option-array-index="5">Washington Redskins</li><li class="group-result">NFC NORTH</li><li class="active-result group-option" style="" data-option-array-index="7">Chicago Bears</li><li class="active-result group-option" style="" data-option-array-index="8">Detroit Lions</li><li class="active-result group-option" style="" data-option-array-index="9">Green Bay Packers</li><li class="active-result group-option" style="" data-option-array-index="10">Minnesota Vikings</li><li class="group-result">NFC SOUTH</li><li class="active-result group-option" style="" data-option-array-index="12">Atlanta Falcons</li><li class="active-result group-option" style="" data-option-array-index="13">Carolina Panthers</li><li class="active-result group-option" style="" data-option-array-index="14">New Orleans Saints</li><li class="active-result group-option" style="" data-option-array-index="15">Tampa Bay Buccaneers</li><li class="group-result">NFC WEST</li><li class="active-result group-option" style="" data-option-array-index="17">Arizona Cardinals</li><li class="active-result group-option" style="" data-option-array-index="18">St. Louis Rams</li><li class="active-result group-option" style="" data-option-array-index="19">San Francisco 49ers</li><li class="active-result group-option" style="" data-option-array-index="20">Seattle Seahawks</li><li class="group-result">AFC EAST</li><li class="active-result group-option" style="" data-option-array-index="22">Buffalo Bills</li><li class="active-result group-option" style="" data-option-array-index="23">Miami Dolphins</li><li class="active-result group-option" style="" data-option-array-index="24">New England Patriots</li><li class="active-result group-option" style="" data-option-array-index="25">New York Jets</li><li class="group-result">AFC NORTH</li><li class="active-result group-option" style="" data-option-array-index="27">Baltimore Ravens</li><li class="active-result group-option" style="" data-option-array-index="28">Cincinnati Bengals</li><li class="active-result group-option" style="" data-option-array-index="29">Cleveland Browns</li><li class="active-result group-option" style="" data-option-array-index="30">Pittsburgh Steelers</li><li class="group-result">AFC SOUTH</li><li class="active-result group-option" style="" data-option-array-index="32">Houston Texans</li><li class="active-result group-option" style="" data-option-array-index="33">Indianapolis Colts</li><li class="active-result group-option" style="" data-option-array-index="34">Jacksonville Jaguars</li><li class="active-result group-option" style="" data-option-array-index="35">Tennessee Titans</li><li class="group-result">AFC WEST</li><li class="active-result group-option" style="" data-option-array-index="37">Denver Broncos</li><li class="active-result group-option" style="" data-option-array-index="38">Kansas City Chiefs</li><li class="active-result group-option" style="" data-option-array-index="39">Oakland Raiders</li><li class="active-result group-option" style="" data-option-array-index="40">San Diego Chargers</li></ul></div></div>
</div>
</div>
    <!--dropdown-->
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-calendar"></i> Calendar</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-setting btn-round btn-default"><i
                                class="glyphicon glyphicon-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">


                    <div id="calendar"></div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div><!--/row-->
    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    <hr>

    
	@include('layouts.modal_settings')
    @include('layouts.footer')

</div><!--/.fluid-container-->
<!--fin template-->


 @include('layouts.scripts')
    @yield('scripts')
  </body>
</html>
