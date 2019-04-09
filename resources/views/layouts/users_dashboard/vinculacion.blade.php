<ul class="pcoded-item pcoded-left-item">
    <li id="dashboard_li" class="">
        <a href="{{ route('dashboard') }}">
            <span class="pcoded-micon"><i class="fa fa-home"></i><b>D</b></span>
            <span class="pcoded-mtext" data-i18n="nav.chat.main">Inicio</span>
            <span class="pcoded-mcaret"></span>
        </a>
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
    
</ul>
</div>
</nav>
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                @yield('bodyVinculacion')
            </div>
        </div>
    </div>
</div>