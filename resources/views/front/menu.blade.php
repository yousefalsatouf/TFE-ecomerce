<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div>
        <a href="{{url('/')}}">
            <img src="{{asset('dist/img/ecom.png')}}" alt="here is logo">
        </a>
    </div>
    <div class="container">
        <a href="{{url('/')}}" class="navbar-brand">HOME</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a href="{{url('/shop')}}" class="nav-link">SHOP</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/login')}}" class="nav-link">LOGIN</a>
                </li>
                <form action='{{('/search')}}' class="form-inline ml-auto" method="post">
                    <div class="d-flex justify-content-between align-items-center">
                        <input type="text" name="site_search" class="form-control mr-2" type="text" placeholder="Search">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" class="form-control mr-2" placeholder="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </div>
                </form>
            </ul>
        </div>
    </div>
</nav>
