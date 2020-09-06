<div class="container toggle-menu">
    <div class="row">
        <div>
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <button type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="fa fa-bars">  Menu</i>
                    </button>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <ul class="navbar-nav">
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
                                        <a href="{{url('/login')}}" class="nav-link text-success">{{ __('header.login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a href="{{url('/register')}}" class="nav-link text-success">{{ __('header.register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    @if(Auth::check() && Auth::user()->isAdmin())
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
                                            <a class="dropdown-item text-success" href="{{ url('/user')}}">
                                                <b>
                                                    <i class="fa fa-shopping-cart"></i> {{Cart::count()}} {{ __('header.item') }}(s)
                                                </b>
                                            </a>
                                            <hr>
                                            <a class="dropdown-item text-dark" href="{{ url('/orders') }}">{{ __('header.orders') }}</a>
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
                                            <a class="dropdown-item text-dark" href="{{ url('/user') }}">Profile</a>
                                            <a class="dropdown-item text-dark" href="{{ url('/wishlist') }}">Wishlist <i class="fa fa-star"></i></a>
                                            <a class="dropdown-item text-danger" href="{{ route('logout') }}">
                                                Logout
                                            </a>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('/logout')}}" class="nav-link text-danger">{{ __('header.logout') }}</a>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <ul>
                <li>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="lang">
                                <select class="form-control changeLang" id="lang">
                                    <option disabled>Lang</option>
                                    <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>EN</option>
                                    <option value="fr" {{ session()->get('locale') == 'fr' ? 'selected' : '' }}>FR</option>
                                </select>
                            </label>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
