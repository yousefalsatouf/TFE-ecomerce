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
                    <a href="{{url('/products')}}" class="nav-link">PRODUCTS</a>
                </li>
                <li class="nav-item active">
                    <a href="{{url('/contact')}}" class="nav-link">CONTACT</a>
                </li>
                <li class="nav-item active">
                    <a href="{{url('/admin')}}" class="nav-link">ADMIN</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a href="{{url('/login')}}" class="nav-link text-primary">LOGIN</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{url('/register')}}" class="nav-link">REGISTER</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a href="{{url('/cart')}}" class="nav-link text-danger">
                            <i class="fa fa-shopping-cart"> ({{Cart::count()}}) Items</i>
                            <i class="">({{Cart::total()}}$)</i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{Auth::user()->name}}
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ '/home'}}">
                                {{Auth::user()->name}}
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}">
                                Logout
                            </a>
                        </div>
                    </li>
                @endguest

            </ul>
            <form action='{{('/search')}}' class="form-inline ml-auto" method="post">
                <div class="d-flex justify-content-between align-items-center">
                    <input type="text" name="site_search" class="form-control mr-2" type="text" placeholder="Search">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" class="form-control mr-2" placeholder="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
</nav>
