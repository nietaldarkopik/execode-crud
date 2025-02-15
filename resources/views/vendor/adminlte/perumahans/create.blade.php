@extends('adminlte::page')

@section('title', 'Data Perumahan')

@section('content_header')
    <h1 class="m-0 text-dark">Data Perumahan</h1>
@stop
@section('content')
    <div class="card col-md-6">
        <div class="card-header">
            <h2 class="card-title fw-bold fs-4">Data Perumahan</h2>
            <div class="card-tools">
                @can('admin.perumahan.index')
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.perumahan.index') }}">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali
                    </a>
                @endcan
            </div>
        </div>
        <div class="card-body ajax-container">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @include('vendor.adminlte.perumahans.form-create')
        </div>
    </div>

@endsection
