@extends('layouts.admin')

@section('content')

@include('admin.shared.formTechnology', ["route" => 'admin.technology.store', 'methodRoute' => 'POST', "bottone" => 'crea'])

@endsection