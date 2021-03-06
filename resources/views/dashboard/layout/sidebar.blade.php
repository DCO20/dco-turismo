<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light ml-5"><strong>Agência </strong>Turismo</span>
    </a>

    <p class="brand-link">
        <span class="brand-text font-weight-light ml-5">{{ auth::user()->name }}</span>
    </p>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard.index') }}" class="nav-link {{ Ekko::isActiveRoute('dashboard*') }}">
                        <i class="fas fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link {{ Ekko::isActiveRoute('user*') }}">
                        <i class="fas fa-users"></i>
                        <p>Clientes</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('bland.index') }}" class="nav-link {{ Ekko::isActiveRoute('bland*') }}">
                        <i class="fas fa-bookmark"></i>
                        <p>Marcas</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('plane.index') }}" class="nav-link {{ Ekko::isActiveRoute('plane*') }}">
                        <i class="fas fa-plane"></i>
                        <p>Aviões</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('airport.index') }}" class="nav-link {{ Ekko::isActiveRoute('airport*') }}">
                        <i class="fas fa-plane-departure"></i>
                        <p>Aeroportos</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('flight.index') }}" class="nav-link {{ Ekko::isActiveRoute('flight*') }}">
                        <i class="fas fa-business-time"></i>
                        <p>Voos</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('reserve.index') }}" class="nav-link {{ Ekko::isActiveRoute('reserve*') }}">
                        <i class="fas fa-money-check"></i>
                        <p>Reservas</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="fas fa-arrow-right"></i>
                        <p>Site</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

</aside>
