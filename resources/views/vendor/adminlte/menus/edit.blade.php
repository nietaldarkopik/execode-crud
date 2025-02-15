@extends('adminlte::page')

@section('plugins.Bootstrap4DualListbox', false)
@section('plugins.BootstrapColorpicker', false)
@section('plugins.BootstrapSlider', false)
@section('plugins.BootstrapSwitch', false)
@section('plugins.BsCustomFileInput', false)
@section('plugins.ChartJs', false)
@section('plugins.Datatables', false)
@section('plugins.DatatablesPlugins', false)
@section('plugins.Daterangepicker', false)
@section('plugins.EkkoLightbox', false)
@section('plugins.Fastclick', false)
@section('plugins.Filterizr', false)
@section('plugins.FlagIconCss', false)
@section('plugins.Flot', false)
@section('plugins.Fullcalendar', false)
@section('plugins.IcheckBootstrap', false)
@section('plugins.Inputmask', false)
@section('plugins.IonRangslider', false)
@section('plugins.JqueryKnob', false)
@section('plugins.JqueryMapael', false)
@section('plugins.JqueryUi', true)
@section('plugins.JqueryValidation', false)
@section('plugins.Jqvmap', false)
@section('plugins.Jsgrid', false)
@section('plugins.PaceProgress', false)
@section('plugins.Select2', false)
@section('plugins.Sparklines', false)
@section('plugins.Sweetalert2', false)
@section('plugins.Toastr', true)

@section('title', 'Data Menu')

@section('content_header')
    <h1 class="m-0 text-dark">Data Menu</h1>
@stop
@section('content')
    <div class="card col-md-6">
        <div class="card-header">
            <h2 class="card-title fw-bold fs-4">Data Menu</h2>
            <div class="card-tools">
                @can('admin.menu.index')
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.menu.index') }}">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali
                    </a>
                @endcan
            </div>
        </div>
        <div class="card-body">
            @include('vendor.adminlte.menus.form-edit',['menu'])
        </div>
    </div>

@endsection
