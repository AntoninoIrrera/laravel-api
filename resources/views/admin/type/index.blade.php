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
            <a href="{{route('admin.type.create')}}" class="btn btn-secondary"><i class="fa-solid fa-plus"></i></a>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">color</th>
                <th scope="col">number of project</th>
                <th scope="col">operations</th>
            </tr>
        </thead>
        <tbody>
            @foreach($types as $type)
            <tr>
                <th scope="row">{{$type['id']}}</th>
                <td>{{$type['name']}}</td>
                <td>{{$type['color']}}</td>
                <td>{{count($type->projects)}}</td>
                <td>
                    <a href="{{route('admin.type.show',$type['id'])}}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                    <a href="{{route('admin.type.edit',$type['id'])}}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>

                    <form class="d-inline-block double-confirm" action="{{route('admin.type.destroy',$type->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $types->links() }}
</div>

@endsection