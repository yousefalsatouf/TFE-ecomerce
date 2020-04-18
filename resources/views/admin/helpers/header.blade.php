<header id="admin-menu">
    <nav class="navbar navbar-expand-md fixed-top">
        <a class="navbar-brand" href="{{url('/admin')}}">Admin</a>
        <div class="menu" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                @if(Auth::check() && (Auth::user()->isAdmin()))
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('admin/users')}}">Users Management</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/admin/products')}}">Products  Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/admin/categories')}}">Categories  Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-info" href="{{url('/user')}}">You <i class="fa fa-users"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>

