@extends('auth.app')
@section('content')
<div class="container">
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{Session::get('success')}} {{auth()->user()->name}}
    </div> 
    @endif
    <h1>Dashboard</h1>
    <b>Welcome, {{Auth::guard('user_info')->user()->name}}</b>
</div>
@endsection
