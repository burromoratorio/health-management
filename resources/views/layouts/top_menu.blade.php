<ul class='breadcrumb' id='breadcrumb'>
   <li class='title'>Dashboard</li>
   @permission('crud-ver')
	<li><a href="{{ url( 'roles' ) }}"><i class="fa fa-list-alt"></i>Roles</span></a></li>
	<li><a href="{{ url( 'modulos' ) }}"><i class="fa fa-cubes"></i>Modulos</span></a></li>
	<li><a href="{{ url( 'permisos' ) }}"><i class="fa fa-lock"></i>Permisos</span></a></li>
	<li><a href="{{ url( 'seguridad' ) }}"><i class="fa fa-shield"></i>Seguridad</span></a></li>
@endpermission
</ul>
        
 
