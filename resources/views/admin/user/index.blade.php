@extends('layouts.admin')

@section('script')
@vite(['resources/js/popupDelete.js'])
@endsection

@section('content')

<div class="container">
    <div class="row my-3">
        <div class="col-6">
            @if (session('message'))
            <div class="alert alert-info mt-3 d-inline-block">
                {{session('message')}}
            </div>
            @endif
        </div>
        <div class="col-6 d-flex justify-content-end align-items-center">

        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">role</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{$user['id']}}</th>
                <td>{{$user['name']}}</td>
                <td>{{$user['email']}}</td>
                <td>{{$user->role->name}}</td>
                <td>
                
                
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</div>

@endsection