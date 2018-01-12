<!DOCTYPE html>
<html lang="es-ar">
<head>
@include('layouts.head')
</head>


<body>
<div class="ch-container">
    <div class="row">
        
    <div class="row">
        <div class="col-md-12 center login-header">
            <h2>Bienvenido</h2>
        </div>
        <!--/span-->
    </div><!--/row-->

    <div class="row">
        <div class="well col-md-5 center login-box">
            <div class="alert alert-info">
                Please login with your Username and Password.
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
           {{ csrf_field() }}
            
                <fieldset>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input id="username" type="text" class="form-control" placeholder="Usuario" name="username" value="{{ old('username') }}">
						@if ($errors->has('username'))
						<span class="help-block">
							<strong>{{ $errors->first('username') }}</strong>
						</span>
						<ul id="parsley-id-20" class="parsley-errors-list filled">
							<li class="parsley-required">Campo requerido.</li>
						</ul>
						@endif
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input id="password" type="password" class="form-control" placeholder="Password" name="password">
						@if ($errors->has('password'))
							<span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
						@endif
                    </div>
                    <div class="clearfix"></div>

                    <div class="input-prepend">
                        <label class="remember" for="remember"><input type="checkbox" id="remember"> Remember me</label>
                    </div>
                    <div class="clearfix"></div>

                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </p>
                </fieldset>
            </form>
        </div>
        <!--/span-->
    </div><!--/row-->
</div><!--/fluid-row-->

</div><!--/.fluid-container-->

 

    @include('layouts.scripts')
    @yield('scripts')
</body>
</html>
