@extends('adminlte::page')

@section('plugins.Bootstrap4DualListbox', true)
@section('plugins.BootstrapColorpicker', true)
@section('plugins.BootstrapSlider', true)
@section('plugins.BootstrapSwitch', true)
@section('plugins.BsCustomFileInput', true)
@section('plugins.ChartJs', true)
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true)
@section('plugins.Daterangepicker', true)
@section('plugins.EkkoLightbox', true)
@section('plugins.Fastclick', true)
@section('plugins.Filterizr', true)
@section('plugins.FlagIconCss', true)
@section('plugins.Flot', true)
@section('plugins.Fullcalendar', true)
@section('plugins.IcheckBootstrap', true)
@section('plugins.Inputmask', true)
@section('plugins.IonRangslider', true)
@section('plugins.JqueryKnob', true)
@section('plugins.JqueryMapael', true)
@section('plugins.JqueryUi', true)
@section('plugins.JqueryValidation', true)
@section('plugins.Jqvmap', true)
@section('plugins.Jsgrid', true)
@section('plugins.PaceProgress', true)
@section('plugins.Select2', true)
@section('plugins.Sparklines', true)
@section('plugins.Summernote', true)
@section('plugins.Sweetalert2', true)
@section('plugins.TempusdominusBootstrap4', true)
@section('plugins.Toastr', true)

@section('title', 'Data Kategori PSU')

@section('content_header')
    <h1 class="m-0 text-dark">Data Kategori PSU</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title fw-bold fs-4">Data Kategori PSU</h2>
            <div class="card-tools">
                @can('admin.kategoripsu.create')
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.kategoripsu.create') }}" data-toggle="modal"
                        data-target="#modalLgId" data-modal-title="Tambah Data">
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


            {{ $dataTable->table() }}
        </div>
    </div>

    @include('vendor.adminlte.partials.modal.modal-default', [
        'modalId' => 'modalLgId',
        'modalSize' => 'modal-lg',
        'modalTitle' => '',
        'modalContent' => '',
        'modalFooter' => '',
    ])
@endsection

@push('js')
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip({})
        })

        //The search button event listener
        $('#search').on('click', function(e) {
            e.preventDefault();
            var params = {};
            var kabupatenkota_id = $("#filter-regency_id").val();
            if (!kabupatenkota_id) {
                window.LaravelDataTables["kategoripsus-table"].column(1).search('', false, false);
            } else {
                window.LaravelDataTables["kategoripsus-table"].column(1).search(kabupatenkota_id ?
                    kabupatenkota_id : '', false, false);
            }

            window.LaravelDataTables["kategoripsus-table"].table().draw();
        });
    </script>

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
