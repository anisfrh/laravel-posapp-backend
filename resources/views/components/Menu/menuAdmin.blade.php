<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{route('index.home')}}">Jaehyun</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{route('index.home')}}">J</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard Admin</li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>User</span></a>
            <ul class="dropdown-menu">
                <li class=''>
                    <a class="nav-link" href="{{ route('index.dataUser') }}">Data User</a>
                </li>
            </ul>
        </li>
    </ul>
    <ul class="sidebar-menu">
        <li class="menu-header">Data Produk</li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-file"></i><span>Produk</span></a>
            <ul class="dropdown-menu">
                <li class=''>
                    <a class="nav-link" href="{{ route('index.produk') }}">Data Produk</a>
                </li>
            </ul>
            <ul class="dropdown-menu">
                <li class=''>
                    <a class="nav-link" href="{{ route('order.index') }}">Data Order Produk</a>
                </li>
            </ul>
        </li>
    </ul>
</aside>