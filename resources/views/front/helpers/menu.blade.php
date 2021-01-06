<nav class="navbar header-menu">
    <div class="top-menu">
        <div class="logo">
            <h1>
                <a href="{{url('/')}}">SPORTClub</a>
            </h1>
        </div>
        @include('front/helpers/toggleMenu')
        <div class="container large-screen col-md-auto">
            <div class="content">
                <ul class="">
                    @guest
                        <li class="nav-item">
                            <a href="{{url('/login')}}" class="nav-link">{{ __('header.login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{url('/register')}}" class="nav-link">{{ __('header.register') }}</a>
                            </li>
                        @endif
                    @else
                    <li class="cart" style="margin: 8px 20px;">
                        <a  href="{{ url('/cart')}}" class="text-success">
                            <strong>
                                <i class="fa fa-shopping-cart" style="font-size: 25px;"></i>    
                                @if(Cart::count() > 0)
                                {{Cart::count()}}
                                @endif
                            </strong>
                        </a>
                    </li>
                    <li class="user nav-item" id="show-profile">
                        <a class="nav-link dropdown-toggle text-success" role="button" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            @if(Auth::user()->image)
                                <img class="card-img-top img-fluid" src="{{url('images',Auth::user()->image)}}" style="width:40px; border-radius: 50%" alt="Card image cap">
                            @else
                                <i class="fa fa-user" aria-hidden="true"></i>
                            @endif
                        </a>
                        
                        <div class="profile-box">
                            <strong class="text-success">
                                {{Auth::user()->name}}
                            </strong>
                            <hr>
                            <a class="dropdown-item text-dark" href="{{ url('/user') }}">Profile</a>
                            <a class="dropdown-item text-dark" href="{{ url('/wishlist') }}">Wishlist <i class="fa fa-star"></i></a>
                            <a class="dropdown-item text-dark" href="{{ url('/orders') }}">{{ __('header.orders') }}</a>
                            @if(!Auth::user()->subscribed_newsletter)
                                <a class="dropdown-item text-dark" href="{{ url('/create-newsletter') }}">@lang('email.newsletter')</a>
                            @endif
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}">
                                {{ __('header.logout') }}
                            </a>
                        </div>
                    </li>
                    @endguest
                    @if(Auth::check() && (Auth::user()->isAdmin() || Auth::user()->isActor()))
                        <li class="nav-item">
                            <a href="{{url('/admin')}}" class="nav-link">
                                <i class="fas fa-user-cog"></i> Admin
                            </a>
                        </li>
                    @endif
                    <li>
                        <div class="row">
                            <div class="col-md-4">
                                <form>
                                    @csrf
                                    <label >
                                        <select class="form-control changeLang"  data-url="{{route('changeLang')}}">
                                            <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>EN</option>
                                            <option value="fr" {{ session()->get('locale') == 'fr' ? 'selected' : '' }}>FR</option>
                                        </select>
                                    </label>
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="bottom-menu">
        <ul class="mr-auto">
            <li class="nav-item">
                <a href="{{url('/')}}" class="navbar-brand"><i class="fa fa-home"></i></a>
            </li>
            <li class="nav-item">
                <a href="{{url('/shop')}}" class="nav-link">Shop</a>
            </li>
            <li class="nav-item">
                <a href="{{url('/contact')}}" class="nav-link">Contact</a>
            </li>
        </ul>
    </div>
</nav>

