@extends('layouts.app')

@section('content')

<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm border-top">
    <div class="container">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
                @foreach($types as $type)
                <li class="nav-item">
                    <a class="nav-link" href="{{route('guest.type',$type->id) }}">{{ $type->name }}</a>
                </li>
                @endforeach
                @foreach($technologies as $technology)
                <li class="nav-item">
                    <a class="nav-link" href="{{route('guest.technology',$technology->id) }}">{{ $technology->name }}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>

<div class="container">

    <div class="card">
        <div class="card-header d-flex" style="color: {{$project->type->color}}">
            <div>
                <h1>{{$project->type->name}}</h1>
                <img src="{{$project->type->image}}" class="img-fluid w-50" alt="">
            </div>
            <div>
                @foreach($project->technologies as $technology)
                <p> {{$technology->name}} vs: {{$technology->versione}} </p>
                <img src="{{$technology->image}}" alt="" class="w-25">
                @endforeach

            </div>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$project['title']}}</h5>
            @if (isset($project->image))
            <img src="{{asset('storage/' . $project->image)}}" class="w-25 mt-3" alt="immagine">
            @endif
            <p class="card-text">{{$project['description']}}</p>
            <p class="card-text">{{$project['relase_date']}}</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>

</div>

@endsection