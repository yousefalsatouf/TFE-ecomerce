<nav id="header-menu" class="navbar">
    <div class="logo">
        <h1>
            <a href="{{url('/')}}">SHOPClub</a>
        </h1>
    </div>
    @include('front/helpers/toggleMenu')
    <div class="container large-screen col-md-auto">
        <div id="navbarCollapse" class="content">
            @guest
                <div class="alert alert-warning" role="alert"><a href="{{url('/register')}}" class="text-danger">Register</a> OR <a href="{{url('/login')}}" class="text-danger">Login</a> to get more benefits</div>
            @else
                @php
                    $verify = DB::table('users')->where('id', Auth::id())->pluck('email_verified_at');
                    //dd($verify)
                @endphp
                @if(Auth::check() && !$verify[0])
                    <div class="alert alert-warning" role="alert">
                        Please check your email to confirm registration!
                    </div>
                @endif
            @endguest
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
                        <li class="nav-item">
                            <a href="{{url('/logout')}}" class="nav-link text-danger">Logout</a>
                        </li>
                        <li class=" cart nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-success" role="button" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa fa-shopping-cart"></i> Cart
                            </a>
                            <div class="dropdown-menu dropdown-menu-right over" aria-labelledby="navbarDropdown">
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
                            @if(Auth::user()->image)
                                <img class="card-img-top img-fluid" src="{{url('images',Auth::user()->image)}}" style="width:40px; border-radius: 50%" alt="Card image cap">
                            @else
                                <i class="fa fa-user" aria-hidden="true"></i>
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right over" aria-labelledby="navbarDropdown">
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

