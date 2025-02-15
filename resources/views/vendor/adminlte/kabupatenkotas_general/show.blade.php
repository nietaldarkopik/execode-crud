@extends('adminlte::page')

@section('title', 'Data Kabupaten/Kota')

@section('content_header')
    <h1 class="m-0 text-dark">Data Kabupaten/Kota</h1>
@stop

@section('content')
    <div class="card col-md-6">
        <div class="card-header">
            <h2 class="card-title fw-bold fs-4">Detail Kabupaten/Kota</h2>
            <div class="card-tools">
                @can('admin.kabupatenkotas.index')
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.kabupatenkotas.index') }}">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali
                    </a>
                @endcan
            </div>
        </div>
        <div class="card-body">


            <div class="row">
                <div class="col-xs-12 mb-3">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $user->name }}
                    </div>
                </div>
                <div class="col-xs-12 mb-3">
                    <div class="form-group">
                        <strong>Email:</strong>
                        {{ $user->email }}
                    </div>
                </div>
                <div class="col-xs-12 mb-3">
                    <div class="form-group">
                        <strong>Roles:</strong>
                        @if (!empty($user->getRoleNames()))
                            @foreach ($user->getRoleNames() as $v)
                                <label class="badge badge-secondary text-dark">{{ $v }}</label>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
