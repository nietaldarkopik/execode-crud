@extends('adminlte::page')

@section('plugins.Bootstrap4DualListbox', false)
@section('plugins.BootstrapColorpicker', false)
@section('plugins.BootstrapMemberType', false)
@section('plugins.BootstrapSwitch', false)
@section('plugins.BsCustomFileInput', false)
@section('plugins.ChartJs', false)
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true)
@section('plugins.Daterangepicker', true)
@section('plugins.EkkoLightbox', false)
@section('plugins.Fastclick', false)
@section('plugins.Filterizr', false)
@section('plugins.FlagIconCss', false)
@section('plugins.Flot', false)
@section('plugins.Fullcalendar', false)
@section('plugins.IcheckBootstrap', false)
@section('plugins.Inputmask', false)
@section('plugins.IonRangmember_type', false)
@section('plugins.JqueryKnob', false)
@section('plugins.JqueryMapael', false)
@section('plugins.JqueryUi', false)
@section('plugins.JqueryValidation', false)
@section('plugins.Jqvmap', false)
@section('plugins.Jsgrid', false)
@section('plugins.PaceProgress', false)
@section('plugins.Select2', false)
@section('plugins.Sparklines', false)
@section('plugins.Summernote', true)
@section('plugins.Sweetalert2', false)
{{-- @section('plugins.TempusdominusBootstrap4', false) --}}
@section('plugins.Toastr', true)

@section('title', 'Data Jenis Member')

@section('content_header')
    <h1 class="m-0 text-dark">Data Jenis Member</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title fw-bold fs-4">Data Jenis Member</h2>
            <div class="card-tools">
                @can('admin.member_type.create')
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.member_type.create') }}" data-toggle="modal" data-target="#modalLgId" data-backdrop="static" data-keyboard="false" data-modal-title="Tambah Data">
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

    @include('vendor.adminlte.partials.modal.modal-default',[
        'modalId' => 'modalLgId',
        'modalSize' => 'modal-lg',
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jquery-treetable/css/jquery.treetable.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jquery-treetable/css/jquery.treetable.theme.default.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<style>
    .indented { padding-left: 20px; }
</style>
@endpush

@push('js')

{{ $dataTable->scripts(attributes: ['type' => 'module']) }}

<script src="https://cdn.jsdelivr.net/npm/jquery-treetable/jquery.treetable.js"></script>
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
            window.LaravelDataTables["perumahans-table"].column(2).search('', false, false);
        }else{
            window.LaravelDataTables["perumahans-table"].column(2).search(kabkota_id ? kabkota_id : '', false, false);
        }
        if(!kecamatan_id){
            window.LaravelDataTables["perumahans-table"].column(3).search('', false, false);
        }else{
            window.LaravelDataTables["perumahans-table"].column(3).search(kecamatan_id ? kecamatan_id : '', false, false);
        }
        if(!status_bast){
            window.LaravelDataTables["perumahans-table"].column(12).search('', false, false);
        }else{
            window.LaravelDataTables["perumahans-table"].column(12).search(status_bast ? status_bast : '', false, false);
        }
        if(!tahun_siteplan){
            window.LaravelDataTables["perumahans-table"].column(8).search('', false, false);
        }else{
            window.LaravelDataTables["perumahans-table"].column(8).search(tahun_siteplan ? tahun_siteplan : '', false, false);
        }
        
        window.LaravelDataTables["perumahans-table"].table().draw();
    });
    
	$("body").on("blur",'[name="slug"]',function(){
        var id = $(this).data("id");
        var slug = $(this).val();
        var url = "{{ route('admin.member_type.checkSlug')}}";

        $.ajax({
            url: url,
            type: 'post',
			data: {
				id : id,
				slug : slug,
			},
			dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success:function(msg){
                $(".response-check-slug").html('<div class="text-success">'+msg.message+'</div>');
            },
			error: function(msg,xhr,c){
				var responseJSON = msg.responseJSON;
				$(".response-check-slug").html('<div class="text-danger">'+responseJSON.message+'</div>');

			}
        })
	});
	
</script>
@endpush
