<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="{{url('/admin')}}">Overview</a>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/user')}}">Profile</a>
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
            </ul>
        </div>
    </nav>
</header>
