@extends('adminlte::page')

@section('title', 'Data Kabupaten/Kota')

@section('content_header')
    <h1 class="m-0 text-dark">Data Kabupaten/Kota</h1>
@stop
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title fw-bold fs-4">Data Kabupaten/Kota</h2>
            <div class="card-tools">
                @can('admin.kabupaten-kota.create')
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.kabupaten-kota.create') }}">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah
                    </a>
                @endcan
            </div>
        </div>
        <div class="card-body">

            @if ($message = Session::get('success'))
                <div class="alert alert-success my-2">
                    <p>{{ $message }}</p>
                </div>
            @endif


            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th width="150px">Action</th>
                            <th width="30">No</th>
                            <th>Nama</th>
                            <th>Nama Alt</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = ($kabupatenkotas->currentPage() - 1) * $kabupatenkotas->perPage() + 1;
                        @endphp
                        @foreach ($kabupatenkotas as $key => $kabupatenkota)
                            <tr>
                                <td>
                                    <a class="btn btn-sm btn-info" href="{{ route('admin.kabupaten-kota.show', $kabupatenkota->id) }}"
                                        data-toggle="tooltip" data-placement="bottom" data-html="false"
                                        data-title="Tampilkan Detail">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </a>
                                    <a class="btn btn-sm btn-primary" href="{{ route('admin.kabupaten-kota.edit', $kabupatenkota->id) }}"
                                        data-toggle="tooltip" data-placement="bottom" data-html="false"
                                        data-title="Edit Data">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <a class="btn btn-sm btn-danger" href="{{ route('admin.kabupaten-kota.destroy', $kabupatenkota->id) }}"
                                        data-toggle="tooltip" data-placement="bottom" data-html="false"
                                        data-title="Hapus Data">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </td>
                                <td>{{ $no++ }}</td>
                                <td>{{ $kabupatenkota->name}}</td>
                                <td>{{ $kabupatenkota->alt_name}}</td>
                                <td>{{ $kabupatenkota->latitude}}</td>
                                <td>{{ $kabupatenkota->longitude}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $kabupatenkotas->links() }}
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip({})
        })
    </script>
@endpush
