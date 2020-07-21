<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('Painel.index') }}" class="brand-link">
        <img src="{{asset('adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Cron Ariel</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('adminlte/dist/img/ariel.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->User()->name }}
                    <br>
                    <small>Membro {{auth()->User()->created_at->diffForHumans() }}</small>
                </a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: block;">
                        <li class="nav-item">
                            <a href="{{ route('Painel.index') }}" class="nav-link">
                                <i class="fas fa-home nav-icon"></i>
                                <p>Página Principal</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('servidores.index')}}" class="nav-link">
                                <i class="fas fa-server nav-icon"></i>
                                <p>Servidores</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Painel.Alertas.index')}}" class="nav-link">
                                <i class="far fas fa-exclamation-triangle"></i>
                                <p>Alertas</p>
                            </a>
                        </li>
                    </ul>
                </li>




                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Configurações
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>



                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ route('Painel.Usuarios.index') }}" class="nav-link"><i
                                    class="fas fa-users nav-icon"></i>
                                <p>Lista de Usuários</p></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('servidores.lista')}}" class="nav-link">
                                <i class="fas fa-server nav-icon"></i>
                                <p>Lista de Servidores</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                            class="nav-icon fas fa-power-off"></i>Sair</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>
