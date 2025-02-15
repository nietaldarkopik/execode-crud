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
@section('plugins.Summernote', false)
@section('plugins.Sweetalert2', true)
@section('plugins.TempusdominusBootstrap4', false)
@section('plugins.Toastr', false)

@section('title', 'Data Usulan')

@section('content_header')
    <h1 class="m-0 text-dark">Data Usulan</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title fw-bold fs-4">Data Usulan</h2>
            <div class="card-tools">
                @can('admin.pengajuan.import')
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.pengajuan.import') }}" data-toggle="modal" data-target="#modalLgId" data-modal-title="Import Data">
                        <i class="fas fa-file-excel" aria-hidden="true"></i> Import
                    </a>
                @endcan
                @can('admin.pengajuan.create')
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.pengajuan.create') }}" data-toggle="modal" data-target="#modalLgId" data-modal-title="Tambah Data">
                        <i class="fas fa-plus-circle" aria-hidden="true"></i> Tambah
                    </a>
                @endcan
            </div>
        </div>
        <div class="card-header py-1">
            <div class="form-row mb-0 d-flex justify-content-stretch">
                <div class="form-group mb-0 col-sm-1">
                    Filter Data :
                </div>
                <div class="form-group mb-0 col-sm-2">
                    {{-- <label for="" class="form-label">Usulan</label> --}}
					@php
					$userUnit = \App\Models\User::where('id',Auth::user()->id)->with(['unit:user_units.id_kabkota,user_units.id_user'])->get()
					->flatMap(function($user) {
						return $user->unit->pluck('id_kabkota'); // Mengambil id dari relasi unit
					})->toArray();
					@endphp
                    <select class="form-select form-select-sm custom-select custom-select-sm input-filter" name="filter[kabkota_id]" id="filter-kabkota_id">
                        <option value="">(Semua Kabupaten / Kota)</option>
						@if(is_array($userUnit) and count($userUnit) > 0)
						@else
                        <option value="-">(Tidak Memiliki Kabupaten / Kota)</option>
						@endif
                        @foreach(App\Models\KabupatenKotaModel::getUserAllowed()->where('province_id',63)->where(function($query) use ($userUnit){
							if(is_array($userUnit) and count($userUnit) > 0)
							{
								$query->whereIn('id',$userUnit);
							}
						})->get() as $d)
                        <option value="{{$d->id}}">{{ $d->name }}</option>
                        @endforeach                        
                    </select>
                </div>
                <div class="form-group mb-0 col-sm-2">
                    {{-- <label for="" class="form-label">Usulan</label> --}}
                    <select class="form-select form-select-sm custom-select custom-select-sm input-filter" name="filter[kecamatan_id]" id="filter-kecamatan_id">
                        <option value="">(Semua Kecamatan)</option>
                        @foreach(App\Models\KecamatanModel::with(['getKabupatenKota' => function($query) {$query->where('province_id',63);}])->get() as $d)
                        <option value="{{$d->id}}">{{ $d->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-0 col-sm-2">
                    {{-- <label for="" class="form-label">Usulan</label> --}}
                    <select class="form-select form-select-sm custom-select custom-select-sm input-filter" name="filter[kelurahan_id]" id="filter-kelurahan_id">
                        <option value="">(Semua Kelurahan)</option>              
                    </select>
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-sm btn-primary" id="search">
                        <i class="fa fa-search" aria-hidden="true"></i> Cari
                    </button>
                </div>
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

            <div class="table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>

    @include('vendor.adminlte.partials.modal.modal-default',[
        'modalId' => 'modalLgId',
        'modalSize' => 'modal-lg',
        'modalTitle' => '',
        'modalContent' => '',
        'modalFooter' => '',
    ])

    @include('vendor.adminlte.partials.modal.modal-default',[
        'modalId' => 'modalFullId',
        'modalSize' => 'modal-fullscreen',
        'modalTitle' => '',
        'modalContent' => '',
        'modalFooter' => '',
    ])
@endsection

@push('css')
{{-- <style>
    .file-drop-area {
        border: 2px dashed #007bff;
        border-radius: 5px;
        padding: 30px;
        text-align: center;
        cursor: pointer;
        color: #007bff;
        transition: background-color 0.3s;
    }
    .file-drop-area.drag-over {
        background-color: #e9ecef;
    }
</style> --}}

<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

<style>
.preview {
	display: flex;
	flex-direction: column;
	align-items: center;
	margin-top: 20px;
}
.preview img {
	max-width: 100%;
	max-height: 300px;
}
</style>

<style>
	#pdf-container {
		width: 100%;
		height: 100vh;
		border: 1px solid #000;
	}
	#pdf-viewer {
		width: 100%;
		height: 100%;
		overflow: auto;
	}
</style>
@endpush

@push('js')

{{ $dataTable->scripts(attributes: ['type' => 'module']) }}

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.ajax/2.1.0/leaflet.ajax.min.js"></script>
<script>
    $(function() {
        $('[data-tooltip]').tooltip({})
    });
    
    //The search button event listener
    $('#search').on('click', function(e) {
        e.preventDefault();
        var params = {};
        var kabkota_id = $("#filter-kabkota_id").val();
        var kecamatan_id = $("#filter-kecamatan_id").val();
        var status_bast = $("#filter-status_bast").val();
        var tahun_siteplan = $("#filter-tahun_siteplan").val();

        if(!kabkota_id){
            window.LaravelDataTables["pengajuans-table"].column(2).search('', false, false);
        }else{
            window.LaravelDataTables["pengajuans-table"].column(2).search(kabkota_id ? kabkota_id : '', false, false);
        }
        if(!kecamatan_id){
            window.LaravelDataTables["pengajuans-table"].column(3).search('', false, false);
        }else{
            window.LaravelDataTables["pengajuans-table"].column(3).search(kecamatan_id ? kecamatan_id : '', false, false);
        }
        
        window.LaravelDataTables["pengajuans-table"].table().draw();
    });

    function getKabupatenKotaOptions(callback){
        var url = "{{ route('admin.services.getKabupatenKota')}}";

        return $.ajax({
            url: url,
            type: "get",
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {},
            success: callback
        })
    }

    function getKecamatanOptions(kabupatenkota_id,callback){
        var url = "{{ route('admin.services.getKecamatan',['kabupatenkota_id' => '--kabupatenkota_id--'])}}";
        url = url.replace('--kabupatenkota_id--',kabupatenkota_id);

        return $.ajax({
            url: url,
            type: "get",
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: callback
        })
    }
    
    function getKelurahanOptions(kabupatenkota_id,kecamatan_id,callback){
        var url = "{{ route('admin.services.getKelurahan',['kabupatenkota_id' => '--kabupatenkota_id--','kecamatan_id' => '--kecamatan_id--'])}}";

        url = url.replace('--kabupatenkota_id--',kabupatenkota_id);
        url = url.replace('--kecamatan_id--',kecamatan_id);

        return $.ajax({
            url: url,
            type: "get",
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: callback
        })
    }

    $("body").on("change","#filter-kabkota_id",function(){
        $("#filter-kecamatan_id").html("<option value=''>Memuat Data ...</option>");
        var val = $(this).val();
        var data = getKecamatanOptions(val,function(d){

            $("#filter-kecamatan_id").html("<option value=''>(Semua Kecamatan)</option>");
            if(d.length > 0)
            {
                d.forEach(e => {
                    $("#filter-kecamatan_id").append("<option value='"+e.id+"'>"+e.name+"</option>");
                });
            }
        });
    });

    $("body").on("change","#filter-kecamatan_id",function(){
        $("#filter-kelurahan_id").html("<option value=''>Memuat Data ...</option>");
        var val = $(this).val();
        var kabkota_id = $("#filter-kabkota_id").val();
        var data = getKelurahanOptions(kabkota_id,val,function(d){

            $("#filter-kelurahan_id").html("<option value=''>(Semua Kelurahan)</option>");
            if(d.length > 0)
            {
                d.forEach(e => {
                    $("#filter-kelurahan_id").append("<option value='"+e.id+"'>"+e.name+"</option>");
                });
            }
        });
    });
    
    $("body").on("change","#input-kabkota_id",function(){
        $("#input-kecamatan_id").html("<option value=''>Memuat Data ...</option>");
        var val = $(this).val();
        var data = getKecamatanOptions(val,function(d){

            $("#input-kecamatan_id").html("<option value=''>(Semua Kecamatan)</option>");
            if(d.length > 0)
            {
                d.forEach(e => {
                    $("#input-kecamatan_id").append("<option value='"+e.id+"'>"+e.name+"</option>");
                });
            }
        });
    });
    
    $("body").on("change","#input-kecamatan_id",function(){
        $("#input-kelurahan_id").html("<option value=''>Memuat Data ...</option>");
        var kecamatan_id = $(this).val();
        var kabupatenkota_id = 0;
        var data = getKelurahanOptions(kabupatenkota_id,kecamatan_id,function(d){

            $("#input-kelurahan_id").html("<option value=''>Pilih Kelurahan ...</option>");
            if(d.length > 0)
            {
                d.forEach(e => {
                    $("#input-kelurahan_id").append("<option value='"+e.id+"'>"+e.name+"</option>");
                });
            }
        });
    });
    
</script>
<script src="{{ asset('vendor/pdf.js/src/pdf.js') }}"></script>
@endpush
