<nav id="header-menu" class="navbar">
    <div class="logo">
        <h1>
            <a href="{{url('/')}}">SHOPClub</a>
        </h1>
    </div>
    @include('front/helpers/toggleMenu')
    <div class="container large-screen col-md-auto">
        <div id="navbarCollapse" class="content">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="{{url('/')}}" class="navbar-brand"><i class="fa fa-home"></i></a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/shop')}}" class="nav-link">Shop</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/contact')}}" class="nav-link">Contact</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a href="{{url('/login')}}" class="nav-link text-success">Login</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{url('/register')}}" class="nav-link text-success">Register</a>
                        </li>
                    @endif
                @else
                    @if(Auth::check() && (Auth::user()->isAdmin() || Auth::user()->isActor()))
                        <li class="nav-item">
                            <a href="{{url('/admin')}}" class="nav-link">
                                <i class="fas fa-user-cog"></i> Admin
                            </a>
                        </li>
                    @endif
                        <li class=" cart nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-success" role="button" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa fa-shopping-cart"></i> Cart
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-success" href="{{ url('/cart')}}">
                                    <b>
                                        <i class="fa fa-shopping-cart"></i> {{Cart::count()}} Item(s)
                                    </b>
                                </a>
                                <hr>
                                <a class="dropdown-item text-dark" href="{{ url('/orders') }}">Your Orders</a>
                            </div>
                        </li>
                    <li class="user nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-success" role="button" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            @if(Auth::check() && Auth::user()->isAdmin())
                                {{strtoupper(Auth::user()->name)}}
                            @else
                                {{strtoupper(Auth::user()->name)}}
                            @endif
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <b class="dropdown-item text-success">
                                {{Auth::user()->name}}<i class="fa fa-user" aria-hidden="true"></i>
                            </b>
                            <hr>
                            <a class="dropdown-item text-dark" href="{{ url('/user') }}">Your Profile</a>
                            <a class="dropdown-item text-dark" href="{{ url('/wishlist') }}">Wishlist <i class="fa fa-star"></i></a>
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}">
                                Logout
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/logout')}}" class="nav-link text-danger">Logout</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
    <div class="search">
        <form action='{{('/search')}}' class="form-inline ml-auto" method="post">
            <div class="d-flex justify-content-between align-items-center">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" class="form-control mr-2" placeholder="Search">
                <label for="search">
                    <input type="text" name="search" class="form-control mr-2" placeholder="Search">
                </label>
                <button class="btn btn-outline-success" type="submit">Search</button>
            </div>
        </form>
    </div>
</nav>
