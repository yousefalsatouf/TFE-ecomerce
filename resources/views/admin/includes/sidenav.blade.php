<nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <p class="nav-link text-dark active"><b>Overview</b></p>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/')}}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/user')}}">Profile</a>
        </li>
        <li class="nav-item">
            <p class="nav-link text-dark active"><b>Manage</b></p>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">Users</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('product.index')}}">Products</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('admin/category')}}">Categories</a>
        </li>
    </ul>
</nav>
