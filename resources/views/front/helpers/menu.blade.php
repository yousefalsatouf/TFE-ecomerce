<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div>
        <a href="{{url('/')}}">
            <img src="{{asset('dist/img/ecom.png')}}" alt="here is logo">
        </a>
    </div>
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="{{url('/')}}" class="navbar-brand">HOME</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <?php  $cats = DB::table('categories')->get(); ?>
                        @foreach($cats as $cat)
                            <a class="dropdown-item" href="{{url('/')}}/products/{{$cat->name}}">{{ucwords($cat->name)}}</a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{url('/shop')}}" class="nav-link">Shop</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/contact')}}" class="nav-link">Contact</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/admin')}}" class="nav-link">Dashboard</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a href="{{url('/login')}}" class="nav-link text-primary">Login</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{url('/register')}}" class="nav-link">Register</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-success" role="button" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{Auth::user()->name}}
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-dark" href="{{ url('/user')}}">
                                {{Auth::user()->name}}
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </a>
                            <a class="dropdown-item text-dark" href="{{ url('/orders') }}">Your Orders</a>
                            <a class="dropdown-item text-dark" href="{{ url('/address') }}">Your Address</a>
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}">
                                Logout
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/cart')}}" class="nav-link text-info">
                            <i class="fa fa-shopping-cart"> ({{Cart::count()}}) Items</i>
                        </a>
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
