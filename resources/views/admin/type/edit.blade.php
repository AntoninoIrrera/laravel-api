@extends('layouts.admin')

@section('content')

@include('admin.shared.formType', ["route" => 'admin.type.update', 'methodRoute' => 'PUT', "bottone" => 'edit'])

@endsection