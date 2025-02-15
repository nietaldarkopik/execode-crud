@extends('adminlte::page')


@section('title', 'Data Permukiman')

@section('content_header')
    <h1 class="m-0 text-dark">Data Permukiman</h1>
@stop
@section('content')
    <div class="card col-md-6">
        <div class="card-header">
            <h2 class="card-title fw-bold fs-4">Data Permukiman</h2>
            <div class="card-tools">
                @can('admin.permukiman.index')
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.permukiman.index') }}">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali
                    </a>
                @endcan
            </div>
        </div>
        <div class="card-body">
            @include('vendor.adminlte.permukimans.form-psu-detail',['permukimans','kabupatenkotas'])
        </div>
    </div>

@endsection
