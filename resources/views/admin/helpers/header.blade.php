<header id="admin-menu">
    <nav class="navbar navbar-expand-md fixed-top">
        <a class="navbar-brand" href="{{url('/')}}"><i class="fa fa-home"></i></a>
        <div class="menu" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/admin')}}"><i class="fa fa-eye"></i></a>
                </li>
                @if(Auth::check() && (Auth::user()->isAdmin()))
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('admin/inbox')}}"><i class="fa fa-inbox"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('admin/users')}}"><i class="fa fa-users"></i></a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/admin/products')}}"><i class="fa fa-shopping-cart"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/admin/categories')}}"><i class="fa fa-bars"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{url('/admin/ads')}}"><i class="fa fa-adn"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-info" href="{{url('/user')}}"> <i class="fa fa-user"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>

