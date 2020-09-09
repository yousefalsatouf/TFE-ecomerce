<nav class="nav flex-column quick-menu">
    <h4>Manage Profile</h4>
    <hr>
    <a class="nav-link" href="{{url('/user')}}">Profile</a>
    <a class="nav-link" href="{{url('/orders')}}">@lang('cart.order')</a>
    <a class="nav-link" href="{{url('/infos')}}">Infos</a>
    <a class="nav-link" href="{{url('/password')}}">@lang('cart.chPass')</a>
    <a class="nav-link text-danger" href="{{url('/logout')}}">@lang('header.logout')</a>
</nav>

