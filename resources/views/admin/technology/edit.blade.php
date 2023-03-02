@extends('layouts.admin')

@section('content')

@include('admin.shared.formTechnology', ["route" => 'admin.technology.update', 'methodRoute' => 'PUT', "bottone" => 'edit'])

@endsection