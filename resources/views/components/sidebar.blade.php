<div class="main-sidebar sidebar-style-2">
    @if(Auth::user()->role == 1)
    @include('components.Menu.menuAdmin')
    @elseif(Auth::user()->role == 2)
    @include('components.Menu.menuStaff')
    @else(Auth::user()->role == 3)
    @include('components.Menu.menuUser')
    @endif
</div>
