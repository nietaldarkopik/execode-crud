@extends('adminlte::page')

@section('title', 'Data Jenis PSU')

@section('content_header')
    <h1 class="m-0 text-dark">Data Jenis PSU</h1>
@stop

@section('content')
    <div class="card col-md-6">
        <div class="card-header">
            <h2 class="card-title fw-bold fs-4">Detail Jenis PSU</h2>
            <div class="card-tools">
                @can('admin.kabupatenkotas.index')
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.kabupatenkotas.index') }}">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali
                    </a>
                @endcan
            </div>
        </div>
        <div class="card-body">
            @include('vendor.adminlte.jenispsus.form-show')
        </div>
    </div>
@endsection
