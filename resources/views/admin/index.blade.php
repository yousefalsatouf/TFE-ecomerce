@extends('admin.master')
@section('content')
    <section id="admin-content" class="col-sm-9 ml-sm-auto col-md-10">
        <div class="row">
            <div>
                @include('admin.includes.sidenav')
            </div>
            <div class="col-sm-9 ml-sm-auto col-md-10">
                <h1 class="text-info">What's on your mind</h1>
                <h2 class="text-success">Hello {{strtoupper(Auth::user()->name)}}</h2>
                <p><b>Something you wanna do ...</b></p>
                <div class="row text-center placeholders">
                    <div class="col-lg-3 col-sm-6 placeholder">
                        <a href="">
                            <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
                        </a>
                        <h4>Users</h4>
                        <div class="text-muted">
                            <p>See users status, Make user an admin or not, and delete him</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 placeholder">
                        <a href="{{url('admin/products')}}">
                            <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
                        </a>                <h4>Products</h4>
                        <span class="text-muted">See, Edit, Add, and Delete products</span>
                    </div>
                    <div class="col-lg-3 col-sm-6 placeholder">
                        <a href="{{url('admin/categories')}}">
                            <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
                        </a>
                        <h4>Categories</h4>
                        <span class="text-muted">every product belongs to category, so in this section you can add and delete categories</span>
                    </div>
                    <div class="col-lg-3 col-sm-6 placeholder">
                        <a href="">
                            <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
                        </a>                <h4>Any thing else</h4>
                        <span class="text-muted">Any ideas about what admin can do ?</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
