@extends('auth.app')
@section('content')
<div class="container">
    @if(session('success'))
    <h1>{{session('success')}}</h1>
    @endif
    <h1>Dashboard</h1>
    <b>Welcome, {{auth()->user()->name}}</b>
</div>
@endsection
