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
    @foreach ($projects as $project)
    <div class="card mt-3 mb-3">
        <div class="card-header" style="color: {{$project->type->color}}">
            <h1>
                {{$project->type->name}}
                @foreach ($project->technologies as $technology)
                <span class="fs-3" style="color: {{$technology->color}}">{{$technology->name}} vs: {{$technology->versione}}</span>
                @endforeach
            </h1>

        </div>
        <div class="card-body">
            <h5 class="card-title">{{$project['title']}}</h5>
            <p class="card-text">{{$project['description']}}</p>
            <p class="card-text">{{$project['relase_date']}}</p>
            <a href="{{route('guest.show',$project->id)}}" class="btn btn-primary">Show</a>
        </div>
    </div>
    @endforeach
    {{$projects->links()}}
</div>

@endsection