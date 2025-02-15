@extends('adminlte::page')

@section('title', 'Data Pengguna')

@section('content_header')
    <h1 class="m-0 text-dark">Data Pengguna</h1>
@stop

@section('content')
    <div class="card col-md-6">
        <div class="card-header">
            <h2 class="card-title fw-bold fs-4">Detail Pengguna</h2>
            <div class="card-tools">
                @can('admin.users.index')
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.users.index') }}">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali
                    </a>
                @endcan
            </div>
        </div>
        <div class="card-body">


            <div class="row">
                <div class="col-md-12 mb-2 border-bottom-1 border">
                    <div class="form-group p-2 mb-0 row">
                        <strong class="col-md-3">Name:</strong>
                        <span class="col-md-9 xform-control-text">{{ $user->name }}</span>
                    </div>
                </div>
                <div class="col-md-12 mb-2 border-bottom-1 border">
                    <div class="form-group p-2 mb-0 row">
                        <strong class="col-md-3">Email:</strong>
                        <span class="col-md-9 xform-control-text">{{ $user->email }}</span>
                    </div>
                </div>
                <div class="col-md-12 mb-2 border-bottom-1 border">
                    <div class="form-group p-2 mb-0 row">
                        <strong class="col-md-3">Roles:</strong>
						<span class="col-md-9">
                        @if (!empty($user->getRoleNames()))
                            @foreach ($user->getRoleNames() as $v)
                                <label class="badge badge-secondary text-dark">{{ $v }}</label>
                            @endforeach
                        @endif
						</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
