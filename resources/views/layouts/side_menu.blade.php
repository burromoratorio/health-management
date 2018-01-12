<!-- Sidebar -->
<section id='sidebar'>
<i class='icon-align-justify icon-large' id='toggle'></i>
<ul id='dock'>
  <li class='active launcher'>
	<i class='icon-dashboard'></i>
	<a href="{{ url('/dashboard') }}">Dashboard</a>
  </li>
  @permission('crud-ver')
  <li class='launcher'>
		<a><i class="fa fa-cog"></i>Configuración<span class="fa fa-chevron-down"></span></a>
  </li>
  @endpermission
  <li class='launcher'>
	<i class='icon-file-text-alt'></i>
	<a href="/forms.html">Forms</a>
  </li>
  <li class='launcher'>
	<i class='icon-table'></i>
	<a href="/tables.html">Tables</a>
  </li>
  <li class='launcher dropdown hover'>
	<i class='icon-flag'></i>
	<a href='#'>Reports</a>
	<ul class='dropdown-menu'>
	  <li class='dropdown-header'>Launcher description</li>
	  <li>
		<a href='#'>Action</a>
	  </li>
	  <li>
		<a href='#'>Another action</a>
	  </li>
	  <li>
		<a href='#'>Something else here</a>
	  </li>
	</ul>
  </li>
  <li class='launcher'>
	<i class='icon-bookmark'></i>
	<a href='#'>Bookmarks</a>
  </li>
  <li class='launcher'>
	<i class='icon-cloud'></i>
	<a href='#'>Backup</a>
  </li>
  <li class='launcher'>
	<i class='icon-bug'></i>
	<a href='#'>Feedback</a>
  </li>
</ul>
<div data-toggle='tooltip' id='beaker' title='Made by lab2023'></div>
</section>
      
