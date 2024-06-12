<aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('index.home')}}">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{route('index.home')}}">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard Staff</li>
            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class=''>
                        <a class="nav-link"
                            href="{{ route('index.dataUser') }}">Data User</a>
                    </li>
                    <li class="">
                        <a class="nav-link"
                            href="{{ url('dashboard-ecommerce-dashboard') }}">Ecommerce Dashboard</a>
                    </li>
                </ul>
            </li>
            
    </aside>