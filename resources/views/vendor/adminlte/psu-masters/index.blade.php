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

@section('title', 'Data PSU')

@section('content_header')
    <h1 class="m-0 text-dark">Data PSU</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title fw-bold fs-4">Data PSU</h2>
            <div class="card-tools">
                @can('admin.psu-master.create')
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.psu-master.create') }}" data-toggle="modal" data-target="#modalLgId" data-modal-title="Tambah Data">
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

@push('js')

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip({})
        })
                
        //The search button event listener
        $('#search').on('click', function(e) {
            e.preventDefault();
            var params = {};
            var kategori_id = $("#filter-kategori").val();
            if(!kategori_id){
                window.LaravelDataTables["psu-masters-table"].column(2).search('', false, false);
            }else{
                window.LaravelDataTables["psu-masters-table"].column(2).search(kategori_id ? kategori_id : '', false, false);
            }
            
            window.LaravelDataTables["psu-masters-table"].table().draw();
        });
    </script>

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

	<script>
		$("body").on("change","#input-create-kategori",function(){
			var id_kategori = $(this).val();
			$("#input-create-jenis option").hide();
			if(id_kategori == ""){
				$("#input-create-jenis option").show();
			}else{
				$("[data-parent-kategori='"+id_kategori+"']").show();
			}
		});
	</script>
    
@endpush
