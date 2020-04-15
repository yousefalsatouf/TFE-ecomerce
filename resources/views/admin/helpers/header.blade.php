<header id="admin-menu">
    <nav class="navbar navbar-expand-md fixed-top">
        <a class="navbar-brand" href="{{url('/admin')}}">Overview</a>
        <div class="menu" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/user')}}">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/admin/products')}}">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/admin/categories')}}">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-info" href="{{url('/user')}}">You <i class="fa fa-users"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>

