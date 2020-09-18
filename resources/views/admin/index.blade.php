@extends('admin.master')
@section('content')
    <section id="admin" class="col-sm-9 ml-sm-auto col-md-10">
        @include('admin.includes.sidenav')
        <div class="row">
            <div class="ml-sm-auto col-md-10 admin-home">
                <h2 class="text-success">@lang('commun.greeting') {{strtoupper(Auth::user()->name)}}</h2>
                <h2 class="text-info">@lang('admin.manage')</h2>
                <div class="row text-center placeholders">
                    @if(Auth::check() && (Auth::user()->isAdmin()))
                        <div class="col-lg-3 col-sm-6 placeholder">
                            <a href="{{url('/admin/users')}}">
                                <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
                            </a>
                            <h4>@lang('admin.users')</h4>
                            <div class="text-muted">
                                <p>@lang('admin.usersDes')</p>
                            </div>
                        </div>
                    @endif
                    <div class="col-lg-3 col-sm-6 placeholder">
                        <a href="{{url('admin/products')}}">
                            <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
                        </a>
                        <h4>@lang('admin.prods')</h4>
                        <div class="text-muted">
                            <p>@lang('admin.prodsDes')</p>
                        </div>
                    </div>
                        <div class="col-lg-3 col-sm-6 placeholder">
                            <a href="{{url('admin/orders')}}">
                                <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
                            </a>
                            <h4>@lang('admin.orders')</h4>
                            <div class="text-muted">
                                <p>@lang('admin.ordersDes')</p>
                            </div>
                        </div>
                    <div class="col-lg-3 col-sm-6 placeholder">
                        <a href="{{url('admin/categories')}}">
                            <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
                        </a>
                        <h4>@lang('admin.cats')</h4>
                        <div class="text-muted">
                            <p>@lang('admin.catsDes')</p>
                        </div>
                    </div>
                        <div class="col-lg-3 col-sm-6 placeholder">
                            <a href="{{url('admin/ads')}}">
                                <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
                            </a>
                            <h4>@lang('admin.ads')</h4>
                            <div class="text-muted">
                                <p>@lang('admin.adsDes')</p>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
@endsection
