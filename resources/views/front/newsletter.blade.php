@extends('front.helpers.master')
@section('content')
    <section id="newsletter">
        <div class="container">
            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div><br />
            @endif
            @if (\Session::has('failure'))
                <div class="alert alert-danger">
                    <p>{{ \Session::get('failure') }}</p>
                </div><br />
            @endif
            <h2 class="mb-2 mt-2">@lang('email.subscribe')</h2>
            <form method="post" action="{{url('newsletter')}}">
                @csrf
                {{ method_field('PUT') }}
                <div class="row d-flex justify-content-around">
                    <div class="form-group">
                        <input type="text" id="email" class="form-control" name="email">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <button type="submit">@lang('email.subBtn')</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
