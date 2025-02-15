@extends('adminlte::page')

@section('title', 'Buat Article')

@section('content_header')
    <h1 class="m-0 text-dark">Buat Article</h1>
@stop
@section('content')
    <div class="card col-md-8 mx-auto">
        <div class="card-header">
            <h2 class="card-title fw-bold fs-4">Buat Article</h2>
            <div class="card-tools">
                {{-- @can('admin.article.index')
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.article.index') }}">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali
                    </a>
                @endcan --}}
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

            @include('article::admin.article.form-create')
        </div>
    </div>

@endsection
