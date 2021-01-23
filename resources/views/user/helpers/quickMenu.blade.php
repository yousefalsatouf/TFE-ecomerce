<nav class=" flex-column quick-menu">
    <h4>Profile</h4>
    <hr>
    <a class="nav-link" href="{{url('/user')}}">Profile</a>
    <a class="nav-link" href="{{url('/orders')}}">@lang('cart.order')</a>
    <a class="nav-link" href="{{url('/infos')}}">@lang('cart.infos')</a>
    <a class="nav-link" href="{{url('/password')}}">@lang('cart.chPass')</a>
    <a class="nav-link text-danger" href="{{url('/logout')}}">@lang('header.logout')</a>
</nav>

