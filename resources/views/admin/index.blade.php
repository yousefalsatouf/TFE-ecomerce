@extends('admin.master')
@section('content')       
    <div id="app-admin">
        <App 
        auth= "{{Auth::user()}}"
        users= "" 
        />
    </div>
@endsection
