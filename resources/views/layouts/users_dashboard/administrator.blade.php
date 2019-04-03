<ul class="pcoded-item pcoded-left-item">
    <li id="dashboard_li" class="">
        <a href="{{ route('dashboard') }}">
            <span class="pcoded-micon"><i class="fa fa-home"></i><b>D</b></span>
            <span class="pcoded-mtext" data-i18n="nav.chat.main">Inicio</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
    
  
    <li  id="students_li" class="pcoded-hasmenu {{ explode('.', $view_name)[0]=='users' ? 'active pcoded-trigger' : '' }}">
        <a href="javascript:void(0)">
            <span class="pcoded-micon"><i class="fas fa-user"></i><b>A</b></span>
            <span class="pcoded-mtext" data-i18n="nav.social.main">Usuarios</span>
            <span class="pcoded-mcaret"></span>
        </a>
        <ul class="pcoded-submenu">
            <li class="{{ Route::currentRouteNamed('users.list') ? 'active' : '' }}">
                <a href="{{ route('users.list')}}">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.social.fb-wall">Lista de Usuarios</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            
            <li class="{{ Route::currentRouteNamed('users.create') ? 'active' : '' }}">
                <a href="{{ route('users.create')}}">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.social.fb-wall">Añadir Usuario</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            
        </ul>
    </li>
    <li  id="students_li" class="pcoded-hasmenu {{ explode('.', $view_name)[0]=='programs' ? 'active pcoded-trigger' : '' }} {{ explode('.', $view_name)[0]=='components' ? 'active pcoded-trigger' : '' }} {{ explode('.', $view_name)[0]=='subcomponents' ? 'active pcoded-trigger' : '' }} {{ explode('.', $view_name)[0]=='concepts' ? 'active pcoded-trigger' : '' }}">
        <a href="javascript:void(0)">
            <span class="pcoded-micon"><i class="fas fa-th-list"></i><b>A</b></span>
            <span class="pcoded-mtext" data-i18n="nav.social.main">Programas</span>
            <span class="pcoded-mcaret"></span>
        </a>
        <ul class="pcoded-submenu">
            <li class="{{ Route::currentRouteNamed('programs.list') ? 'active' : '' }}">
                <a href="{{ route('programs.list') }}">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.social.fb-wall">Lista de Programas</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            
            <li class="{{ Route::currentRouteNamed('programs.create') ? 'active' : '' }}">
                <a href="{{ route('programs.create') }}">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.social.fb-wall">Añadir Programa</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="{{ Route::currentRouteNamed('components.list') ? 'active' : '' }}">
                <a href="{{ route('components.list') }}">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.social.fb-wall">Lista de Componentes</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
          <li class="{{ Route::currentRouteNamed('components.create') ? 'active' : '' }}">
                <a href="{{ route('components.create') }}">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.social.fb-wall">Añadir Componente</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
          <li class="{{ Route::currentRouteNamed('subcomponents.list') ? 'active' : '' }}">
                <a href="{{ route('subcomponents.list') }}">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.social.fb-wall">Lista de Subcomponentes</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
          <li class="{{ Route::currentRouteNamed('subcomponents.create') ? 'active' : '' }}">
                <a href="{{ route('subcomponents.create') }}">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.social.fb-wall">Añadir Subcomponente</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
          <li class="{{ Route::currentRouteNamed('concepts.list') ? 'active' : '' }}">
                <a href="{{ route('concepts.list') }}">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.social.fb-wall">Lista de Conceptos</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
          <li class="{{ Route::currentRouteNamed('concepts.create') ? 'active' : '' }}">
                <a href="{{ route('concepts.create') }}">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.social.fb-wall">Añadir Concepto</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
    </li>
  
    <li  id="students_li" class="pcoded-hasmenu {{ explode('.', $view_name)[0]=='applicants' ? 'active pcoded-trigger' : '' }}">
        <a href="javascript:void(0)">
            <span class="pcoded-micon"><i class="fas fa-users"></i><b>A</b></span>
            <span class="pcoded-mtext" data-i18n="nav.social.main">Solicitantes</span>
            <span class="pcoded-mcaret"></span>
        </a>
        <ul class="pcoded-submenu">
            <li class="{{ Route::currentRouteNamed('applicants.list') ? 'active' : '' }}">
                <a href="{{ route('applicants.list') }}">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.social.fb-wall">Lista de Solicitantes</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            
            <li class="{{ Route::currentRouteNamed('applicants.create') ? 'active' : '' }}">
                <a href="{{ route('applicants.create') }}">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.social.fb-wall">Añadir Solicitante</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            
        </ul>
    </li>
    
  
    <li  id="students_li" class="pcoded-hasmenu {{ explode('.', $view_name)[0]=='projects' ? 'active pcoded-trigger' : '' }}">
        <a href="javascript:void(0)">
            <span class="pcoded-micon"><i class="fas fa-project-diagram"></i><b>A</b></span>
            <span class="pcoded-mtext" data-i18n="nav.social.main">Proyectos</span>
            <span class="pcoded-mcaret"></span>
        </a>
        <ul class="pcoded-submenu">
            <li class="{{ Route::currentRouteNamed('projects.list') ? 'active' : '' }}">
                <a href="{{ route('projects.list') }}">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.social.fb-wall">Lista de Proyectos</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            
            <li class="{{ Route::currentRouteNamed('projects.create') ? 'active' : '' }}">
                <a href="{{ route('projects.create') }}">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.social.fb-wall">Añadir Proyecto</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            
        </ul>
    </li>
    
  
    <li  id="students_li" class="pcoded-hasmenu {{ explode('.', $view_name)[0]=='glosario' ? 'active pcoded-trigger' : '' }}">
        <a href="javascript:void(0)">
            <span class="pcoded-micon"><i class="fas fa-book"></i><b>A</b></span>
            <span class="pcoded-mtext" data-i18n="nav.social.main">Glosario</span>
            <span class="pcoded-mcaret"></span>
        </a>
        <ul class="pcoded-submenu">
            <li class="{{ Route::currentRouteNamed('glosario.list') ? 'active' : '' }}">
                <a href="{{ route('glosario.list') }}">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.social.fb-wall">Lista de Palabras</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="{{ Route::currentRouteNamed('glosario.create') ? 'active' : '' }}">
                <a href="{{ route('glosario.create') }}">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.social.fb-wall">Añadir Palabra</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
    </li>
    
   <!-- <li  id="students_li" class="pcoded-hasmenu {{ explode('.', $view_name)[0]=='reports' ? 'active pcoded-trigger' : '' }}">
        <a href="javascript:void(0)">
            <span class="pcoded-micon"><i class="fas fa-copy"></i><b>A</b></span>
            <span class="pcoded-mtext" data-i18n="nav.social.main">Reportes</span>
            <span class="pcoded-mcaret"></span>
        </a>
        <ul class="pcoded-submenu">
            <li class="{{ Route::currentRouteNamed('reports.createSin') ? 'active' : '' }}">
                <a href="">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.social.fb-wall">Sin reglas de operación</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            
            <li class="{{ Route::currentRouteNamed('reports.createCon') ? 'active' : '' }}">
                <a href="">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.social.fb-wall">Con reglas de operación</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            
        </ul>
    </li>-->
    <li class="{{ Route::currentRouteNamed('reports.createCon') ? 'active' : '' }}">
        <a href="{{ route('reports.createCon') }}">
            <span class="pcoded-micon" ><i class="fas fa-copy"></i><b>HS</b></span>
            <span class="pcoded-mtext" data-i18n="nav.job-search.main">Reportes</span>
            <!--<span class="pcoded-badge label label-danger">NEW</span style="background-color:#fc6100;">-->
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
    <li class="{{ Route::currentRouteNamed('log.sessionlist') ? 'active' : '' }}">
        <a href="{{ route('log.sessionlist') }}">
            <span class="pcoded-micon" ><i class="icofont icofont-sign-in"></i><b>HS</b></span>
            <span class="pcoded-mtext" data-i18n="nav.job-search.main">Historial de Sesiones</span>
            <!--<span class="pcoded-badge label label-danger">NEW</span style="background-color:#fc6100;">-->
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
    <li class="{{ Route::currentRouteNamed('log.movementslist') ? 'active' : '' }}">
        <a href="{{ route('log.movementslist') }}">
            <span class="pcoded-micon" ><i class="fa fa-history"></i><b>HM</b></span>
            <span class="pcoded-mtext" data-i18n="nav.job-search.main">Historial de Movimientos</span>
            <!--<span class="pcoded-badge label label-danger">NEW</spanstyle="background-color:#7f0000;">-->
           <span class="pcoded-mcaret"></span>
        </a>
    </li>
</ul>
</div>
</nav>
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                @yield('body')
            </div>
        </div>
    </div>
</div>
