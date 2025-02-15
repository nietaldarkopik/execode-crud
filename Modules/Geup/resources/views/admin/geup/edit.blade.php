@extends('adminlte::page')


@section('title', 'Data Geup')

@section('content_header')
    <h1 class="m-0 text-dark">Data Geup</h1>
@stop
@section('content')
    <div class="card col-md-6">
        <div class="card-header">
            <h2 class="card-title fw-bold fs-4">Data Geup</h2>
            <div class="card-tools">
                @can('admin.geup.index')
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.geup.index') }}">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali
                    </a>
                @endcan
            </div>
        </div>
        <div class="card-body">
            @include('geup::admin.geup.form-edit',['geup'])
        </div>
    </div>

@endsection
