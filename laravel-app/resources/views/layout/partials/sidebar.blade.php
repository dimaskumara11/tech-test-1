<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url("/dashboard") }}" class="brand-link">
        <img src="{{ url('/assets/template-admin/') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">APP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ url('/assets/template-admin/') }}/dist/img/user2-160x160.jpg"
                    class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ session('fullname') ?? 'Admin' }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @php
                    $getMenus = \App\Models\Menu::orderBy("sort")->get();
                @endphp
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                @foreach ($getMenus as $item => $value)
                    <li class="nav-item">
                        <a href="/{{ $value->route }}"
                            class="nav-link {{ request()->segment(1) == $value->route ? 'active' : '' }}">
                            <i class="nav-icon {{$value->icon}}"></i>
                            <p>{{$value->name}}</p>
                        </a>
                    </li>
                @endforeach
                <li class="nav-item">
                    <a href="{{ url('logout') }}" class="nav-link" onclick="return confirm(`Are You Sure?`)">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
