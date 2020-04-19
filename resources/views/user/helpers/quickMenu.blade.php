    <nav class="nav flex-column quick-menu">
        <h4>Manage Profile</h4>
        <hr>
        <a class="nav-link" href="{{url('/user')}}">My Profile</a>
        <a class="nav-link" href="{{url('/orders')}}">My Orders</a>
        <a class="nav-link" href="{{url('/infos')}}">Edit Infos</a>
        <a class="nav-link" href="{{url('/password')}}">Change Password</a>
        <a class="nav-link text-danger" href="{{url('/logout')}}">Logout</a>
    </nav>

