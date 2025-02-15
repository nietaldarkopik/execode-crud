@extends('adminlte::page')


@section('title', 'Data ModuleManager')

@section('content_header')
    <h1 class="m-0 text-dark">Data ModuleManager</h1>
@stop
@section('content')
    <div class="card col-md-6">
        <div class="card-header">
            <h2 class="card-title fw-bold fs-4">Data ModuleManager</h2>
            <div class="card-tools">
                @can('admin.module_manager.index')
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.module_manager.index') }}">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali
                    </a>
                @endcan
            </div>
        </div>
        <div class="card-body">
            @include('module_manager::admin.module_manager.form-edit',['module_manager'])
        </div>
    </div>

@endsection
