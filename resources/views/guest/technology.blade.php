@extends('layouts.app')

@section('content')

<div class="container">

    @foreach($technology->projects as $project)
    <div class="card">
        <div class="card-header" style="color: {{$project->type->color}}">
            @foreach ($project->technologies as $technology)
            <span class="fs-3" style="color: {{$technology->color}}">{{$technology->name}} vs: {{$technology->versione}}</span>
            @endforeach
            <h1>{{$project->type->name}}</h1>
            <img src="{{$project->type->image}}" class="img-fluid w-25" alt="">

        </div>
        <div class="card-body">
            <h5 class="card-title">{{$project['title']}}</h5>
            @if (isset($project->image))
            <img src="{{asset('storage/' . $project->image)}}" class="w-25 mt-3" alt="immagine">
            @endif
            <p class="card-text">{{$project['description']}}</p>
            <p class="card-text">{{$project['relase_date']}}</p>
            <a href="{{route('guest.show',$project['id'])}}" class="btn btn-primary">Show</a>
        </div>
    </div>
    @endforeach
</div>

@endsection