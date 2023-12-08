<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>General</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('dashboard-general-dashboard') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ url('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="{{ Request::is('dashboard-ecommerce-dashboard') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('dashboard/create') }}">Create New Post</a>
                    </li>
                    <li class="{{ Request::is('dashboard-ecommerce-dashboard') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('dashboard/create') }}">Data Shelter</a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="sidebar-menu">
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fa-light fa-file"></i><span>Data</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('dashboard-ecommerce-dashboard') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('shelter/create') }}">Add Shelter</a>
                    </li>
                    <li class="{{ Request::is('dashboard-ecommerce-dashboard') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('tikum/create') }}">Add Gathering Point</a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="sidebar-menu">
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fa-light fa-file"></i><span>Peta GIS</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('dashboard-ecommerce-dashboard') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/draw/create') }}">Buat Peta Ancaman</a>
                    </li>
                    <li class="{{ Request::is('dashboard-ecommerce-dashboard') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('tikum/create') }}">Peta Ancaman Tsunami</a>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>
</div>