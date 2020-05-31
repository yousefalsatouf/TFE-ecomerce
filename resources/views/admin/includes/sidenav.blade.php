<nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <p class="nav-link active"><b>Overview</b></p>
        </li>
        <li class="nav-item">
            <a class="nav-link" style="font-size: 40px" href="{{url('/')}}"><i class="fa fa-home"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/admin')}}"><i class="fa fa-eye"></i> Admin</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/user')}}"><i class="fa fa-user"></i> Profile</a>
        </li>
        @if(Auth::check() && (Auth::user()->isAdmin()))
            <li class="nav-item">
                <a class="nav-link" href="{{url('/admin/inbox')}}">
                    <i class="fa fa-inbox"></i> Inbox
                    @php
                        $countUnreadMessages = DB::table('inbox')->whereNull('is_read')->count();
                    @endphp
                    <b class="text-danger">{{$countUnreadMessages > 0? '( '.$countUnreadMessages.' )': ''}} </b></a>
            </li>
        @endif
        <li class="nav-item">
            <p class="nav-link active"><b>Manage</b></p>
        </li>
        @if(Auth::check() && (Auth::user()->isAdmin()))
            <li class="nav-item">
                <a class="nav-link" href="{{url('/admin/users')}}"><i class="fa fa-users"></i> Users Management</a>
            </li>
        @endif
        <li class="nav-item">
            <a class="nav-link" href="{{url('/admin/products')}}"><i class="fa fa-shopping-cart"></i> Products Management</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('admin/categories')}}"><i class="fa fa-bars"></i> Categories Management</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/admin/ads')}}"><i class="fa fa-adn"></i> Ads Management</a>
        </li>
    </ul>
</nav>
