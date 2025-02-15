@extends('front.master-front')

@section('content')
  <section class="fluid-container main-content">
      <div id="section3" class="container py-5">
		<div id="titlebar" class="gradient margin-bottom-10">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2>Data Prasarana, Sarana dan Utilitas</h2>
						<!-- Breadcrumbs -->
						<nav id="breadcrumbs">
							<ul>
								<li><a href="{{ url('/') }}">Beranda</a></li>
								<li>Data Prasarana, Sarana dan Utilitas</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<form id="filter-form" action="#" style="display: none;">
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<select id="filter-jenis_perkim" name="jenis_perkim" class="form-control">
								<option value="">Semua Jenis Perkim</option>
								<option value="perumahan">Perumahan</option>
								<option value="permukiman">Permukiman</option>
							</select>
							{{-- <label for="filter-jenis_perkim">Jenis Perkim</label> --}}
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<select id="filter-kabkota_id" name="kabkota_id" class="form-control">
								<option value="">Semua Kabupaten/Kota</option>
								@foreach (App\Models\KabupatenKotaModel::where('province_id', 63)->orderBy('name', 'asc')->get() as $i => $d)
									<option value="{{ $d->id }}">{{ $d->name }}</option>
								@endforeach
							</select>
							{{-- <label for="filter-kabkota_id">Kabupaten/Kota</label> --}}
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<select id="filter-kecamatan_id" name="kecamatan_id" class="form-control">
								<option value="">Semua Kecamatan</option>
							</select>
							{{-- <label for="filter-kecamatan_id">Kecamatan</label> --}}
						</div>
					</div>
					{{-- <!-- <div class="col-md-2">
						<div class="form-group">
						<select id="filter-kelurahan" name="kelurahan" class="form-control">
							<option value="">Semua Kelurahan/Desa</option>
						</select>
						<label for="floatingSelect">Kelurahan/Desa</label>
						</div>
					</div> --> --}}
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<select id="filter-id_kategori_psu" name="id_kategori" class="form-control">
								<option value="">Semua Kategori PSU</option>
								@foreach (App\Models\KategoriPsuModel::get() as $i => $d)
									<option value="{{ $d->id }}">{{ $d->title }}</option>
								@endforeach
							</select>
							{{-- <label for="filter-jenis_perkim">Jenis Perkim</label> --}}
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<select id="filter-id_jenis_psu" name="id_jenis" class="form-control">
								<option value="">Semua Jenis PSU</option>
								@foreach (App\Models\JenisPsuModel::orderBy('title', 'asc')->get() as $i => $d)
									<option value="{{ $d->id }}" data-parent-kategori="{{ $d->kategori}}">{{ $d->title }}</option>
								@endforeach
							</select>
							{{-- <label for="filter-kabkota_id">Kabupaten/Kota</label> --}}
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<select id="filter-id_psu" name="id_psu" class="form-control">
								<option value="">Semua PSU</option>
								@foreach (App\Models\PsuModel::orderBy('judul', 'asc')->get() as $i => $d)
									<option value="{{ $d->id }}" data-parent-jenis="{{ $d->jenis}}" data-parent-kategori="{{ $d->kategori}}">{{ $d->judul }}</option>
								@endforeach
							</select>
							{{-- <label for="filter-kecamatan_id">Kecamatan</label> --}}
						</div>
					</div>
					{{-- <!-- <div class="col-md-2">
						<div class="form-group">
						<select id="filter-kelurahan" name="kelurahan" class="form-control">
							<option value="">Semua Kelurahan/Desa</option>
						</select>
						<label for="floatingSelect">Kelurahan/Desa</label>
						</div>
					</div> --> --}}
					<div class="col-md-auto">
						<button type="button" class="button margin-top-3 btn btn-primary mt-1 btn-lg btn-filter"><i class="fa fa-search"></i> Cari</button>
						<button type="button" class="button margin-top-3 btn btn-warning mt-1 btn-lg btn-reset"><i class="fa fa-sync"></i> Reset</button>
					</div>
				</div>
				<hr>
			</form>
			<div class="margin-bottom-20">
				<button type="button" class="button" onclick="$('#filter-form').toggle();"><i class="sl sl-icon-magnifier margin-right-5"></i>Filter</button>
				<a href="javascript:void(0);" id="downloadExcel" class="button" style="overflow: visible"><i class="sl sl-icon-cloud-download margin-right-5"></i>Download XLSX</a>
			</div>
			<hr/>
			<div class="table-responsive">

				{{ $dataTable->table() }}

			</div>
        </div>
    </div>
  </section>

	
  <!-- Modal -->
  <div
	  class="modal fade"
	  id="modalPsuDetail"
	  tabindex="-1"
	  role="dialog"
	  aria-labelledby="modalTitleId"
	  aria-hidden="true"
  >
	  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
		  <div class="modal-content">
			  <div class="modal-header">
				  <h3 class="modal-title fs-3" id="modalTitleId">
					  Detail PSU
				  </h3>
				  <button
					  type="button"
					  class="btn-close"
					  data-bs-dismiss="modal"
					  aria-label="Close"
				  ></button>
			  </div>
			  <div class="modal-body">
				  <div class="container-fluid psu-detail-container">
					  
				  </div>
			  </div>
		  </div>
	  </div>
  </div>
@endsection

@section('footer-content')
    @include('front.partials.footer-content')
@endsection

@section('css')
    {{-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
<link rel="stylesheet" href="{{ asset('vendor/datatables-plugins/scroller/css/scroller.bootstrap4.min.css') }}"/> --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css"/> --}}
    {{-- https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap5.css" />
@endsection

@section('js')
    {{-- <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> --}}
    {{-- <script src="//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js'"></script> --}}
    {{-- <script src="//cdn.datatables.net/2.0.8/js/dataTables.js"></script> --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="//cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
    <script src="//cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
    <script src="//cdn.datatables.net/responsive/3.0.2/js/responsive.bootstrap5.js"></script>
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

	
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });

            $("#filter-kabkota_id").on("change", function() {
                var kabkota_id = $(this).val();
                var url = "{{ route('front.services.getKecamatan', ['kabupatenkota_id' => 'xx']) }}";
                var url = url.replace('xx', kabkota_id);

                $.ajax({
                    url: url,
                    type: "get",
                    dataType: "json",
                    success: function(msg) {
                        $("#filter-kecamatan_id").html(
                            '<option value="">Pilih Kecamatan ...</option>');
                        if (msg.length > 0) {
                            $.each(msg, function(i, v) {
                                $("#filter-kecamatan_id").append('<option value="' + v
                                    .id + '">' + v.name + '</option>');
                            })
                        }
                    }
                })
            });


            $('.btn-filter').on('click', function(e) {
                e.preventDefault();
                //console.log(window.LaravelDataTables["psus-table"]);

                e.preventDefault();

                // Override parameter Ajax dengan nilai baru dari form
                window.LaravelDataTables["psus-table"].ajax.url('{{ route('front.psu') }}?' + $
                    .param({
						kabkota_id : $('#filter-kabkota_id').val(),
						kecamatan_id : $('#filter-kecamatan_id').val(),
						kelurahan : $("#filter-kelurahan").val(),
						jenis_perkim : $('#filter-jenis_perkim').val(),
						id_kategori_psu : $("#filter-id_kategori_psu").val(),
						id_jenis_psu : $("#filter-id_jenis_psu").val(),
						id_psu : $("#filter-id_psu").val()
                    })).load();

                //console.log(window.LaravelDataTables["psus-table"].table());
                //window.LaravelDataTables["psus-table"].table().draw();
            });

            $('.btn-reset').on('click', function() {
                $('#filter-form')[0].reset();
                // Override parameter Ajax dengan nilai baru dari form
                window.LaravelDataTables["psus-table"].ajax.url('{{ route('front.psu') }}')
                    .load();
            });
			$('#downloadExcel').on('click', function() {
				var params = window.LaravelDataTables["psus-table"].ajax.params();
				params.kabkota_id = $('#filter-kabkota_id').val();
				params.kecamatan_id = $('#filter-kecamatan_id').val();
				params.kelurahan = $("#filter-kelurahan").val();
				params.jenis_perkim = $('#filter-jenis_perkim').val();
				params.id_kategori_psu = $("#filter-id_kategori_psu").val();
				params.id_jenis_psu = $("#filter-id_jenis_psu").val();
				params.id_psu = $("#filter-id_psu").val();
				var url = '{{ route("front.psu.exportXls") }}?' + $.param(params);
				window.location = url;
			});
        })
    </script>
	<script>
		$(document).ready(function(){
			var modalPsuDetail = $('#modalPsuDetail');
			$("body").on("click",".btn-show-psu,.btn-show-peta",function(e){
				e.preventDefault();
				var url = $(this).attr("href");
				var title = $(this).data("title");

				$.get(url,function(msg){
					$(modalPsuDetail).find(".modal-title").html(title);
					$(modalPsuDetail).find(".psu-detail-container").html(msg);
					$(modalPsuDetail).modal('show');
				})
				return false;
			});

			/* $(modalPsuDetail).on('show.bs.modal', function (event) {
				var button = event.relatedTarget;
				var url = $(button).attr("href");
				$.get(url,function(msg){
					$(modalPsuDetail).find(".psu-detail-container").html(msg);
				})
			}); */
		});

		$("body").on("change","#filter-id_kategori_psu",function(){
			var id_kategori_psu = $(this).val();
			$("[data-parent-kategori]").hide();
			if(!id_kategori_psu)
			{
				$("[data-parent-kategori]").show();				
			}else{
				$("[data-parent-kategori='"+id_kategori_psu+"']").show();
			}

			$("#filter-id_jenis_psu").trigger("change");
		})

		$("body").on("change","#filter-id_jenis_psu",function(){
			var id_jenis_psu = $(this).val();
			$("[data-parent-jenis]").hide();
			if(!id_jenis_psu)
			{
				$("[data-parent-jenis]").show();				
			}else{
				$("[data-parent-jenis='"+id_jenis_psu+"']").show();
			}
		})

	</script>
@endsection
