@extends('adminlte::page')


@section('title', 'Data Championship')

@section('content_header')
    <h1 class="m-0 text-dark">Data Championship</h1>
@stop
@section('content')
    <div class="card col-md-6">
        <div class="card-header">
            <h2 class="card-title fw-bold fs-4">Data Championship</h2>
            <div class="card-tools">
                @can('admin.championship.index')
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.championship.index') }}">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali
                    </a>
                @endcan
            </div>
        </div>
        <div class="card-body">
            @include('championship::admin.championship.form-edit',['championship'])
        </div>
    </div>

@endsection
