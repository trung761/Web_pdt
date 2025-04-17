<ul class="nav">
  <li class="nav-item {{ request()->routeIs('dashboard') ? 'active show' : '' }}">
    <a href="{{route('dashboard')}}" class="nav-link"><i class="typcn typcn-chart-area-outline"></i> Dashboard</a>
  </li>
  {{-- <li class="nav-item {{ request()->routeIs('system') ? 'active show' : '' }}">
    <a href="" class="nav-link with-sub"><i class="typcn typcn-device-laptop"></i> System</a>
    <nav class="az-menu-sub">
      <a href="page-signin.html" class="nav-link">Người dùng</a>
      <a href="page-signup.html" class="nav-link">Phân quyền</a>
    </nav>
  </li> --}}
  <li class="nav-item {{ request()->routeIs('users') ? 'active show' : '' }}">
    <a href="{{route('users')}}" class="nav-link"><i class="typcn typcn-chart-bar-outline"></i>Users</a>
  </li>
  <li class="nav-item {{ request()->routeIs('homepage') ? 'active show' : '' }}">
    <a href="{{route('homepage')}}" class="nav-link"><i class="typcn typcn-chart-bar-outline"></i>Homepage</a>
  </li>
  <li class="nav-item {{ request()->routeIs('menu') ? 'active show' : '' }}">
    <a href="{{route('menu')}}" class="nav-link"><i class="typcn typcn-chart-bar-outline"></i>Menu</a>
  </li>
  <li class="nav-item {{ request()->routeIs('posts') ? 'active show' : '' }}">
    <a href="{{route('posts')}}" class="nav-link"><i class="typcn typcn-chart-bar-outline"></i>Posts</a>
  </li>
  
  {{-- <li class="nav-item">
    <a href="" class="nav-link with-sub"><i class="typcn typcn-book"></i>a </a>
    <div class="az-menu-sub">
      <div class="container">
        <div>
          <nav class="nav">
            <a href="elem-buttons.html" class="nav-link">Buttons</a>
            <a href="elem-dropdown.html" class="nav-link">Dropdown</a>
            <a href="elem-icons.html" class="nav-link">Icons</a>
            <a href="table-basic.html" class="nav-link">Table</a>
          </nav>
        </div>
      </div><!-- container -->
    </div>
  </li> --}}
</ul>