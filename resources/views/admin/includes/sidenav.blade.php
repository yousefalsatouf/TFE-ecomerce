<div class="sidebar-container">
    <nav class="col-sm-3 col-md-2 bg-light sidebar">
        <ul class="nav nav-pills flex-column">
            <li class="nav-item">
                <p class="nav-link active">Overview</p>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/admin')}}"><i class="fa fa-home"> Admin</i></a>
            </li>
            @if(Auth::check() && (Auth::user()->isAdmin()))
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/admin/inbox')}}">
                        <i class="fa fa-inbox"> @lang('admin.inbox')</i>
                        @php
                            $countUnreadMessages = DB::table('inbox')->whereNull('is_read')->count();
                        @endphp
                        <b class="text-danger">{{$countUnreadMessages > 0? '( '.$countUnreadMessages.' )': ''}} </b></a>
                </li>
            @endif
            <li class="nav-item">
                <p class="nav-link active">Manage</p>
            </li>
            @if(Auth::check() && (Auth::user()->isAdmin()))
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/admin/users')}}"><i class="fa fa-users"></i> @lang('admin.users')</a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="{{url('/admin/products')}}"><i class="fa fa-shopping-cart"></i> @lang('admin.prods')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('admin/categories')}}"><i class="fa fa-bars"></i> @lang('admin.cats')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/admin/ads')}}"><i class="fa fa-times"></i> @lang('admin.orders')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/admin/ads')}}"><i class="fa fa-adn"></i> @lang('admin.ads')</a>
            </li>
        </ul>
    </nav>
</div>
