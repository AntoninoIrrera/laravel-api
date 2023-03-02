@extends('layouts.admin')

@section('content')

@include('admin.shared.formProject', ["route" => 'admin.project.update', 'methodRoute' => 'PUT', "bottone" => 'edit'])

@endsection