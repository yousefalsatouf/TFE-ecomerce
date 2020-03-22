@extends('admin.master')
@section('content')
    <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
        <h1>Hello {{strtoupper(Auth::user()->name)}}</h1>
        <p><b>Something you wanna do ...</b></p>
        <section class="row text-center placeholders">
            <div class="col-6 col-sm-3 placeholder">
                <img src="data:image/gif;base64,R0lGODlhAQABAIABAAJ12AAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
                <h4>Users</h4>
                <div class="text-muted">
                    <p>See users status, Make user an admin or not, and delete him</p>
                </div>
            </div>
            <div class="col-6 col-sm-3 placeholder">
                <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
                <h4>Products</h4>
                <span class="text-muted">See, Edit, Add, and Delete products</span>
            </div>
            <div class="col-6 col-sm-3 placeholder">
                <img src="data:image/gif;base64,R0lGODlhAQABAIABAAJ12AAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
                <h4>Categories</h4>
                <span class="text-muted">every product belongs to category, so in this section you can add and delete categories</span>
            </div>
            <div class="col-6 col-sm-3 placeholder">
                <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
                <h4>Any thing else</h4>
                <span class="text-muted">Any ideas about what admin can do ?</span>
            </div>
        </section>
    </main>
@endsection
