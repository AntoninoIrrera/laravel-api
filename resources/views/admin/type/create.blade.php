@extends('layouts.admin')

@section('content')

@include('admin.shared.formType', ["route" => 'admin.type.store', 'methodRoute' => 'POST', "bottone" => 'crea'])

@endsection