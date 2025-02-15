@extends('adminlte::page')


@section('title', 'Data Jenis Member')

@section('content_header')
    <h1 class="m-0 text-dark">Data Jenis Member</h1>
@stop
@section('content')
    <div class="card col-md-6">
        <div class="card-header">
            <h2 class="card-title fw-bold fs-4">Data Jenis Member</h2>
            <div class="card-tools">
                @can('admin.member_type.index')
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.member_type.index') }}">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali
                    </a>
                @endcan
            </div>
        </div>
        <div class="card-body">
            @include('member_type::admin.member_type.form-edit',['member_type'])
        </div>
    </div>

@endsection
