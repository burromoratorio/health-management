<!DOCTYPE html>
<html lang="es-ar">
<head>
@include('layouts.head')
</head>
<body class='login'>
    <div class='wrapper'>
		<a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>
      <div class='row'>
        <div class='col-lg-12'>
          <div class='brand text-center'>
            <h1>
              <div class='logo-icon'>
                <i class='icon-beer'></i>
              </div>
              Example dashboard 
            </h1>
          </div>
        </div>
      </div>
      <div class='row'>
        <div class='col-lg-12'>
           <form role="form" method="POST" action="{{ url('/login') }}">
           {{ csrf_field() }}
            <fieldset class='text-center'>
              <legend>Ingresar</legend>
				<div class='form-group'>
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
				<div class='form-group'>
				   <input id="password" type="password" class="form-control" placeholder="Password" name="password">
					@if ($errors->has('password'))
						<span class="help-block">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
					@endif
				</div>
             <div>
				<button type="submit" class="btn btn-default submit">
					<i class="fa fa-btn fa-sign-in"></i> Login
				</button>
			</div>

			<div class="clearfix"></div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
 

    @include('layouts.scripts')
    @yield('scripts')
</body>
</html>
