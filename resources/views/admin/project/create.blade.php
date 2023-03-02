@extends('layouts.admin')

@section('content')

@include('admin.shared.formProject', ["route" => 'admin.project.store', 'methodRoute' => 'POST', "bottone" => 'crea'])

@endsection