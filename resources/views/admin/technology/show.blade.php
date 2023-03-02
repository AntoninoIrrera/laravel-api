@extends('layouts.admin')

@section('content')

<div class="container">
    @if (session('message'))
    <div class="alert alert-info mt-3">
        {{session('message')}}
    </div>
    @endif
    <div class="card mt-3">
        <div class="card-header text-center" style="color: {{ $technology['color'] }}">
            <h1>{{$technology['name']}} vs: {{$technology->versione}}</h1>
            <img src="{{$technology['image']}}" class="img-fluid w-25" alt="">
        </div>
        <div class="card-body text-center">
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>

</div>

@endsection