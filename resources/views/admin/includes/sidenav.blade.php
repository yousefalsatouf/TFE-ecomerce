<nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <p class="nav-link active"><b>Overview</b></p>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/admin')}}">Admin</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/user')}}">Profile</a>
        </li>
        <li class="nav-item">
            <p class="nav-link active"><b>Manage</b></p>
        </li>
        @if(Auth::check() && (Auth::user()->isAdmin()))
            <li class="nav-item">
                <a class="nav-link" href="{{url('/admin/users')}}">Users Management</a>
            </li>
        @endif
        <li class="nav-item">
            <a class="nav-link" href="{{url('/admin/products')}}">Products Management</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('admin/categories')}}">Categories Management</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/admin/ads')}}">Ads Management</a>
        </li>
    </ul>
</nav>
