<!-- Navbar -->
<div class='navbar navbar-default' id='navbar'>
  <a class='navbar-brand' href='#'>
	<i class='icon-beer'></i>
	Hierapolis
  </a>
  <ul class='nav navbar-nav pull-right'>
	<li class='dropdown'>
	  <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
		<i class='icon-envelope'></i>
		Messages
		<span class='badge'>5</span>
		<b class='caret'></b>
	  </a>
	  <ul class='dropdown-menu'>
		<li>
		  <a href='#'>New message</a>
		</li>
		<li>
		  <a href='#'>Inbox</a>
		</li>
		<li>
		  <a href='#'>Outbox</a>
		</li>
		<li>
		  <a href='#'>Trash</a>
		</li>
	  </ul>
	</li>
	<li>
	  <a href='#'>
		<i class='icon-cog'></i>
		Settings
	  </a>
	</li>
	
	<li class='dropdown user'>
	  <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
		<i class='icon-user'></i>
		<strong>{{ $currentUser['name'] }}</strong>
		<img class="img-rounded" src="http://placehold.it/20x20/ccc/777" />
		<b class='caret'></b>
	  </a>
	  <ul class='dropdown-menu'>
		<li><a href="{{ route('perfiles.index', $currentUser['username'] ) }}"> Perfil</a></li>
		<li class='divider'></li>
		<li>
		  <a href="{{ url('/logout') }}"><i class="fa fa-sign-out pull-right"></i>Logout</a>
		</li>
	  </ul>
	</li>
	
  </ul>
</div>


