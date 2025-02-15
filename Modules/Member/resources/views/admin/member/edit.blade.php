@extends('adminlte::page')


@section('title', 'Data Member')

@section('content_header')
    <h1 class="m-0 text-dark">Data Member</h1>
@stop
@section('content')
    <div class="card col-md-6">
        <div class="card-header">
            <h2 class="card-title fw-bold fs-4">Data Member</h2>
            <div class="card-tools">
                @can('admin.member.index')
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.member.index') }}">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali
                    </a>
                @endcan
            </div>
        </div>
        <div class="card-body">
            @include('member::admin.member.form-edit',['member'])
        </div>
    </div>

@endsection
