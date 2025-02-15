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
{{-- @section('plugins.Summernote', true) --}}
@section('plugins.Sweetalert2', true)
{{-- @section('plugins.TempusdominusBootstrap4', true)
@section('plugins.Toastr', true) --}}

@section('title', 'Data PSU Perumahan dan Permukiman')

@section('content_header')
    <h1 class="m-0 text-dark">Data PSU Perumahan dan Permukiman</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title fw-bold fs-4">Data PSU Perumahan dan Permukiman</h2>
            <div class="card-tools">
                @can('admin.psuperki.create')
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.psuperki.create') }}" data-toggle="modal" data-target="#modalLgId" data-modal-title="Tambah Data">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah
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
                    {{-- <label for="" class="form-label">PSU Perumahan dan Permukiman</label> --}}
                    <select class="form-select form-select-sm custom-select custom-select-sm input-filter" name="filter[kabkota_id]" id="filter-kabkota_id">
                        <option value="" selected>Jenis Perkim ...</option>
                        <option value="perumahan">Perumahan</option>
                        <option value="permukiman">Permukiman</option>
                    </select>
                </div>
                <div class="form-group mb-0 col-sm-2">
                    {{-- <label for="" class="form-label">PSU Perumahan dan Permukiman</label> --}}
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
                    {{-- <label for="" class="form-label">PSU Perumahan dan Permukiman</label> --}}
                    <select class="form-select form-select-sm custom-select custom-select-sm input-filter" name="filter[kecamatan_id]" id="filter-kecamatan_id">
                        <option value="">(Semua Kecamatan)</option>
                        <option value="-">(Tidak Memiliki Kecamatan)</option>
                        @foreach(App\Models\KecamatanModel::with(['getKabupatenKota' => function($query) {$query->where('province_id',63);}])->get() as $d)
                        <option value="{{$d->id}}">{{ $d->name }}</option>
                        @endforeach                        
                    </select>
                </div>
                <div class="form-group mb-0 col-sm-2">
                    {{-- <label for="" class="form-label">PSU Perumahan dan Permukiman</label> --}}
                    <select class="form-select form-select-sm custom-select custom-select-sm input-filter" name="filter[status_bast]" id="filter-status_bast">
                        <option value="">Status BAST ...</option>
                        <option value="Sudah BAST">Sudah BAST</option>
                        <option value="Belum BAST">Belum BAST</option>
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

<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
@endpush

@push('js')

{{ $dataTable->scripts(attributes: ['type' => 'module']) }}

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.11.0/proj4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/proj4leaflet/1.0.2/proj4leaflet.min.js"></script>
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
            window.LaravelDataTables["perkis-table"].column(2).search('', false, false);
        }else{
            window.LaravelDataTables["perkis-table"].column(2).search(kabkota_id ? kabkota_id : '', false, false);
        }
        if(!kecamatan_id){
            window.LaravelDataTables["perkis-table"].column(3).search('', false, false);
        }else{
            window.LaravelDataTables["perkis-table"].column(3).search(kecamatan_id ? kecamatan_id : '', false, false);
        }
        if(!status_bast){
            window.LaravelDataTables["perkis-table"].column(12).search('', false, false);
        }else{
            window.LaravelDataTables["perkis-table"].column(12).search(status_bast ? status_bast : '', false, false);
        }
        if(!tahun_siteplan){
            window.LaravelDataTables["perkis-table"].column(8).search('', false, false);
        }else{
            window.LaravelDataTables["perkis-table"].column(8).search(tahun_siteplan ? tahun_siteplan : '', false, false);
        }
        
        window.LaravelDataTables["perkis-table"].table().draw();
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

    function getPerkim(kabupatenkota_id,jenis_perkim,callback){
        var url = "{{ route('admin.services.getPerkim',['kabupatenkota_id' => '--kabupatenkota_id--','jenis_perkim' => '--jenis_perkim--'])}}";
        url = url.replace('--kabupatenkota_id--',kabupatenkota_id);
        url = url.replace('--jenis_perkim--',jenis_perkim);

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
    
    function getJenisPsu(kategori_id,callback){
        var url = "{{ route('admin.services.getJenisPsu',['kategori_id' => '--kategori_id--'])}}";

        url = url.replace('--kategori_id--',kategori_id);

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
    
    function getPsu(jenis_psu_id,callback){
        var url = "{{ route('admin.services.getPsu',['jenis_psu_id' => '--jenis_psu_id--'])}}";

        url = url.replace('--jenis_psu_id--',jenis_psu_id);

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
            $("#filter-kelurahan_id").append("<option value='-'>(Tidak Memiliki Kelurahan)</option>");
            if(d.length > 0)
            {
                d.forEach(e => {
                    $("#filter-kecamatan_id").append("<option value='"+e.id+"'>"+e.name+"</option>");
                });
            }
        });
    });

    
    // Fungsi untuk menambahkan file ke daftar
    function addFileToList(file,clickableElements,response) {
        response = JSON.parse(response);
        if(!response.id){
            return false;
        }
        var url = "{{ route('admin.psuperki.getPsuItem',['PsuPerki' => 'xx'])}}";
        var fileListUl = $(clickableElements).closest('.card-psu-list').find('.file-list-psu');
        url = url.replace('xx',response.id);

        $.ajax({
            url: url,
            type: "get",
            dataType: "html",
            success:function(msg){
                $(fileListUl).prepend(msg);
            }
        })
    }

    function savePsuDetail(form,id,callback) {
        var url = "{{ route('admin.psuperki.updatePsuItem',['PsuPerki' => 'xx'])}}";
        url = url.replace('xx',id);

        form.append('_method','patch');

        $.ajax({
            url: url,
            processData: false,
            contentType: false,
            type: 'POST',
            data: form,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: callback
        })
    }

    function addFileToListDokumen(path,clickableElements,response){
        // Load GeoJSON data
        //var geojsonLayer = new L.GeoJSON.AJAX(path); // Ganti path dengan path GeoJSON Anda
        //geojsonLayer.addTo(map);
        response = JSON.parse(response);
        var url = "{{ asset(Storage::url('xxx'))}}";
        url = url.replace('xxx',response.nama_file);
        $(".file-list-dokumen").prepend('<li class="list-group-item row d-flex">' +
                                        '    <div class="col-sm-5">' +
                                                response.judul_file +
                                        '    </div>' +
                                        '    <div class="col-sm-5">' +
                                                response.judul_file +
                                        '    </div>' +
                                        '    <div class="col-sm-2">' +
                                        '        <a href="' + url + '" target="_blank" class="btn btn-primary btn-sm">' +
                                        '            <i class="fa fa-eye" aria-hidden="true"></i>' +
                                        '        </a>' +
                                        '        <button type="button" class="btn btn-danger btn-sm">' +
                                        '            <i class="fa fa-trash" aria-hidden="true"></i>' +
                                        '        </button>' +
                                        '    </div>' +
                                        '</li>');
    }

    function addFileToMap(path,clickableElements,response){
        // Load GeoJSON data
        //var geojsonLayer = new L.GeoJSON.AJAX(path); // Ganti path dengan path GeoJSON Anda
        //geojsonLayer.addTo(map);
        $(".file-list-map").prepend('<li class="list-group-item">'+path.name+'</li>');
    }

    function addFileToListMap(path,clickableElements,response){
        // Load GeoJSON data
        //var geojsonLayer = new L.GeoJSON.AJAX(path); // Ganti path dengan path GeoJSON Anda
        //geojsonLayer.addTo(map);
        $(".file-list-map").prepend('<li class="list-group-item">'+path.name+'</li>');
    }

    $("body").on("change",".card-psu-item :input",function(){
        if($(this).closest(".card-psu-item").length > 0)
        {
            $(this).closest(".card-psu-item").find(".btn-save-psu-container").removeClass("d-none").addClass("d-flex");
        }
    });

    $("body").on("click",".btn-cancel-psu",function(){
        if($(this).closest(".card-psu-item").length > 0)
        {
            $(this).closest(".card-psu-item").find(".btn-save-psu-container").removeClass("d-flex").addClass("d-none");
        }
    })

    $("body").on("click",".btn-save-psu",function(){
        var form = $(this).closest('form')[0];
        var id = $(this).data('id');
        var card = $(this).closest(".card-psu-item");
        formData = new FormData();
        var input = $(this).closest(".card-psu-item").find(":input");
        $.each(input,function(i,v){
            formData.append($(v).attr("name"),$(v).val());
        });
        savePsuDetail(formData,id,function(){
            if($(card).length > 0)
            {
                $(card).find(".btn-save-psu-container").removeClass("d-flex").addClass("d-none");
            }
            alert("Data Berhasil disimpan");
        });
    });
    
    $("body").on("click","[name='id_psu']",function(){
        var id = $(this).data('id');
        var id_psu = $(this).val();
        var card = $(this).closest(".card-psu-item");
        var url = "{{ route('admin.psuperki.getPsuAttributeForm',['PsuPerki' => 'xx','PSU' => 'yy'])}}";
        url = url.replace('xx',id);
        url = url.replace('yy',id_psu);

        $.ajax({
            url: url,
            type: 'get',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            dataType: 'html',
            success:function(msg){
                $(card).find(".attribute-psu-container").html(msg);
            }
        })
    });

    $("body").on("change","#input-kabkota_id",function(){
        $("#input-id_perumahan").html("<option value=''>Memuat Data ...</option>");
        var val = $(this).val();
        var jenis_perkim = $("#input-jenis_perkim").val();
        var data = getPerkim(val,jenis_perkim,function(d){

            $("#input-id_perumahan").html("<option value=''>Pilih Perumahan/Permukiman ...</option>");
            if(d.length > 0)
            {
                d.forEach(e => {
                    $("#input-id_perumahan").append("<option value='"+e.id+"'>"+e.nama_perumahan+"</option>");
                });
            }

			if ($("#input-id_perumahan").hasClass('select2-hidden-accessible')) {
				$("#input-id_perumahan").select2('destroy');
			}
			$("#input-id_perumahan").select2({
				tags: true
			});
		
        });
    });
    
    $("body").on("change","#input-id_kategori",function(){
        $("#input-id_jenis_psu").html("<option value=''>Memuat Data ...</option>");
        var id_kategori = $(this).val();
        var data = getJenisPsu(id_kategori,function(d){

            $("#input-id_jenis_psu").html("<option value=''>Pilih Jenis PSU ...</option>");
            if(d.length > 0)
            {
                d.forEach(e => {
                    $("#input-id_jenis_psu").append("<option value='"+e.id+"'>"+e.title+"</option>");
                });
            }
        });
    });
    
    $("body").on("change","#input-id_jenis_psu",function(){
        $("#input-id_psu").html("<option value=''>Memuat Data ...</option>");
        var id_jenis_psu = $(this).val();
        var data = getPsu(id_jenis_psu,function(d){

            $("#input-id_psu").html("<option value=''>Pilih PSU ...</option>");
            if(d.length > 0)
            {
                d.forEach(e => {
                    $("#input-id_psu").append("<option value='"+e.id+"'>"+e.judul+"</option>");
                });
            }
        });
    });

</script>
@endpush
