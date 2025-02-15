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
@section('plugins.Toastr', true)

@section('title', 'Data Attribut PSU')

@section('content_header')
    <h1 class="m-0 text-dark">Data Attribut PSU</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title fw-bold fs-4">Data Attribut PSU</h2>
            <div class="card-tools">
                @can('admin.attribute-psu.create')
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.attribute-psu.create') }}" data-toggle="modal" data-target="#modalLgId" data-modal-title="Tambah Data">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah
                    </a>
                @endcan
            </div>
        </div>
        <div class="card-header py-1">
            <div class="form-row mb-0">
                <div class="form-group mb-0 col-auto">
                    Filter Data :
                </div>
                <div class="form-group mb-0 col-sm-3">
                    {{-- <label for="" class="form-label">Attribut PSU</label> --}}
                    <select class="form-select form-select-sm custom-select custom-select-sm input-filter" name="filter[id_kategori]" id="filter-id_kategori">
                        <option value="" selected>Kategori PSU ...</option>
                        @foreach(App\Models\KategoriPsuModel::get() as $d)
                        <option value="{{$d->id}}">{{ $d->title }}</option>
                        @endforeach                        
                    </select>
                </div>
                <div class="form-group mb-0 col-sm-3">
					
					<select class="form-select form-select-sm custom-select custom-select-sm input-filter" name="filter[id_jenis_psu]" id="filter-id_jenis_psu">
						<option value="" selected>Jenis PSU ...</option>
						@foreach(App\Models\JenisPsuModel::get() as $d)
						<option value="{{$d->id}}" data-kategori="{{ $d->kategori }}">{{ $d->title }}</option>
						@endforeach                        
					</select>
				</div>
				<div class="form-group mb-0 col-sm-3">
					<select class="form-select form-select-sm custom-select custom-select-sm input-filter" name="filter[id_psu]" id="filter-id_psu">
						<option value="" selected>PSU ...</option>
						@foreach(App\Models\PsuModel::get() as $d)
						<option value="{{$d->id}}" data-kategori="{{ $d->kategori }}" data-jenis="{{ $d->jenis }}">{{ $d->judul }}</option>
						@endforeach                        
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

@push('js')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}


    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip({})
        })
		
        //The search button event listener
        $('#search').on('click', function(e) {
            e.preventDefault();
            var params = {};
			var id_kategori = $("#filter-id_kategori").val();
			var id_jenis_psu = $("#filter-id_jenis_psu").val();
			var id_psu = $("#filter-id_psu").val();
			
            if(!id_kategori){
                window.LaravelDataTables["attributepsus-table"].column(2).search('', false, false);
            }else{
                window.LaravelDataTables["attributepsus-table"].column(2).search(id_kategori ? id_kategori : '', false, false);
            }
			
            if(!id_jenis_psu){
                window.LaravelDataTables["attributepsus-table"].column(3).search('', false, false);
            }else{
                window.LaravelDataTables["attributepsus-table"].column(3).search(id_jenis_psu ? id_jenis_psu : '', false, false);
            }
			
            if(!id_psu){
                window.LaravelDataTables["attributepsus-table"].column(4).search('', false, false);
            }else{
                window.LaravelDataTables["attributepsus-table"].column(4).search(id_psu ? id_psu : '', false, false);
            }
            
            window.LaravelDataTables["attributepsus-table"].table().draw();
        });

		$('[name="filter[id_kategori]"]').on("change",function(){
			var id_kategori = $(this).val();
			$('[name="filter[id_jenis_psu]"]').find("option").hide();
			$('[name="filter[id_jenis_psu]"]').find("option:eq(0)").show();
			$('[name="filter[id_jenis_psu]"]').find("option[data-kategori='"+id_kategori+"']").show();
			
			$('[name="filter[id_psu]"]').find("option").hide();
			$('[name="filter[id_psu]"]').find("option:eq(0)").show();
			$('[name="filter[id_psu]"]').find("option[data-kategori='"+id_kategori+"']").show();
			
			if(!id_kategori){
				$('[name="filter[id_jenis_psu]"]').find("option").show();
				$('[name="filter[id_psu]"]').find("option").show();
			}else{
				$('[name="filter[id_psu]"]').val("");
				$('[name="filter[id_jenis_psu]"]').val("");
			}
		});

		$('[name="filter[id_jenis_psu]"]').on("change",function(){
			var id_jenis = $(this).val();
			$('[name="filter[id_psu]"]').find("option").hide();
			$('[name="filter[id_psu]"]').val("");
			$('[name="filter[id_psu]"]').find("option:eq(0)").show();
			$('[name="filter[id_psu]"]').find("option[data-jenis='"+id_jenis+"']").show();

			if(!id_jenis){
				$('[name="filter[id_psu]"]').find("option[data-jenis='"+id_jenis+"']").show();
			}else{
				$('[name="filter[id_psu]"]').val("");
			}
		});

		$('body').on('change','#input-id_kategori',function(){
			var id_kategori = $(this).val();
			$('#input-id_jenis_psu').find("option").hide();
			$('#input-id_jenis_psu').val("");
			$('#input-id_jenis_psu').find("option:eq(0)").show();
			$('#input-id_jenis_psu').find("option[data-kategori='"+id_kategori+"']").show();

			$('#input-id_psu').find("option").hide();
			$('#input-id_psu').val("");
			$('#input-id_psu').find("option:eq(0)").show();
			$('#input-id_psu').find("option[data-kategori='"+id_kategori+"']").show();

			
			if(!id_kategori){
				$('#input-id_jenis_psu').find("option").show();
				$('#input-id_psu').find("option").show();
			}else{
				$('#input-id_psu').val("");
				$('#input-id_jenis_psu').val("");
			}
		});

		$('body').on('change','#input-id_jenis_psu',function(){
			var id_jenis = $(this).val();
			$('#input-id_psu').find("option").hide();
			$('#input-id_psu').val("");
			$('#input-id_psu').find("option:eq(0)").show();
			$('#input-id_psu').find("option[data-jenis='"+id_jenis+"']").show();

			if(!id_jenis){
				$('#inputid_psu').find("option[data-jenis='"+id_jenis+"']").show();
			}else{
				$('#inputid_psu').val("");
			}
		});

		$('body').on('click','.btn-delete-data',function(e){
			e.preventDefault();

			if(confirm('Apakah Anda yakin ingin menghapus data ini?'))
			{
				var url = $(this).closest('form').attr("action");

				$.ajax({
					url: url,
					type: "post",
					method: "delete",
					data: $(this).serializeArray(),
					headers: {
						'X-CSRF-TOKEN': "{{ csrf_token() }}"
					},
					success: function(msg){
						window.LaravelDataTables["attributepsus-table"].ajax.reload();
					}
				})
			}

			return false;
		})
    </script>

@endpush
