<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <span class="brand-text font-weight-light">SGCESEI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item{{ Request::is('instituicoes*') ? 'active' : '' }}">
                    <a href="{{ route('instituicoes.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-building"></i>
                        <p>Instituições</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('proprietarios.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Proprietários</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('vistorias.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-check-circle"></i>
                        <p>Vistorias</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('relatorios.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Relatórios</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('documentos.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>Documentos</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('utilizadores.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Utilizadores</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('inspetores.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Inspetores</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logs.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>Logs</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
