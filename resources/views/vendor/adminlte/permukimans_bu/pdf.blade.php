@extends('adminlte::blank')

@section('title', 'Data Permukiman')

@section('content_header')
    <h1 class="m-0 text-dark">Data Permukiman</h1>
@stop

@section('css')
    <style>
        body{
            background-color: unset !important;
        }
    </style>
@endsection
@section('content')
    @include('vendor.adminlte.permukimans.form-pdf')
@endsection
