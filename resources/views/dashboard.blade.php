@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <div class="d-flex justify-content-between align-items-center my-5">
                        <h1 class="card-text">Benvenuto/a {{ Auth::user()->name }}</h1>
                        <img src="{{Auth::user()->userDetail->image}}" class="w-25" alt="">
                    </div>
                    <h3 class="card-text"> {{ Auth::user()->userDetail->stato }} </h3>
                    <p class="card-text"> {{Auth::user()->userDetail->bio}} </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection