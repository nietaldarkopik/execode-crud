@extends('front.master-front')

@section('content')
    <section class="fluid-container main-content">
        <div id="section3" class="container py-5">
			<div id="titlebar" class="gradient margin-bottom-10">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h2>Data Perumahan</h2>
							<!-- Breadcrumbs -->
							<nav id="breadcrumbs">
								<ul>
									<li><a href="{{ url('/') }}">Beranda</a></li>
									<li>Data Perumahan</li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<form id="filter-form" class="row pb-3 d-flexx justify-content-center" action="#" style="display: none;">
					<div class="col-md-3">
						<div class="form-group">
							{{-- <label for="filter-kabkota_id">Kabupaten/Kota</label> --}}
							<select id="filter-kabkota_id" name="kabkota_id" class="form-control">
								<option value="">Semua Kabupaten/Kota</option>
								@foreach (App\Models\KabupatenKotaModel::where('province_id', 63)->orderBy('name', 'asc')->get() as $i => $d)
									<option value="{{ $d->id }}">{{ $d->name }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							{{-- <label for="filter-kecamatan_id">Kecamatan</label> --}}
							<select id="filter-kecamatan_id" name="kecamatan_id" class="form-control">
								<option value="">Semua Kecamatan</option>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							{{-- <label for="filter-status_bast">Status BAST</label> --}}
							<select id="filter-status_bast" name="status_bast" class="form-control">
								<option value="">Semua ...</option>
								<option value="sudah bast">Sudah BAST</option>
								<option value="belum bast">Belum BAST</option>
							</select>
						</div>
					</div>
					<div class="col-md-auto">
						<button type="button" class="button margin-top-3 btn btn-primary mt-1 btn-lg btn-filter"><i class="fa fa-search"></i> Cari</button>
						<button type="button" class="button margin-top-3 btn btn-warning mt-1 btn-lg btn-reset"><i class="fa fa-sync"></i> Reset</button>
					</div>
				</form>
				<div class="margin-bottom-20">
					<button type="button" class="button" onclick="$('#filter-form').toggle();"><i class="sl sl-icon-magnifier margin-right-5"></i>Filter</button>
					<a href="javascript:void(0);" id="downloadExcel" class="button" style="overflow: visible"><i class="sl sl-icon-cloud-download margin-right-5"></i>Download XLSX</a>
				</div>
				<hr>
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
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"/> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap5.css" />
	{{-- <link href="{{ asset('front/vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet"> --}}
@endsection

@section('js')
	{{-- <script src="{{ asset('front/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
    {{-- <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> --}}
    {{-- <script src="//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js'"></script> --}}
    {{-- <script src="//cdn.datatables.net/2.0.8/js/dataTables.js"></script> --}}
    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> --}}
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


            /* 
            	var table = $('#perumahans-table').DataTable({
            		processing: true,
            		serverSide: true,
            		ajax: {
            			headers: {
            				'X-CSRF-TOKEN': "{{ csrf_token() }}"
            			},
            			url: '{{ route('front.perumahan') }}',
            			data: function (d) {
            				console.log(d);
            				//d.keywords = $('#filter-keywords').val();
            				//d.kabkota_id = $('#filter-kabkota_id').val();
            				//d.kecamatan_id = $('#filter-kecamatan_id').val();
            			}
            		},
            		columns: [
            			{data: 'action', name: 'action'},
            			{data: 'number', name: 'number'},
            			{data: 'nama_perumahan', name: 'nama_perumahan'},
            			{data: 'nama_pengembang', name: 'nama_pengembang'},
            			{data: 'alamat', name: 'alamat'},
            			{data: 'luas', name: 'luas'},
            			{data: 'tahun_siteplan', name: 'tahun_siteplan'},
            		]
            	}); */

            $('.btn-filter').on('click', function(e) {
                e.preventDefault();
                //console.log(window.LaravelDataTables["perumahans-table"]);

                e.preventDefault();

                // Override parameter Ajax dengan nilai baru dari form
                window.LaravelDataTables["perumahans-table"].ajax.url('{{ route('front.perumahan') }}?' + $
                    .param({
                        kabkota_id: $('#filter-kabkota_id').val(),
                        kecamatan_id: $('#filter-kecamatan_id').val(),
                        status_bast: $('#filter-status_bast').val(),
                    })).load();

                //console.log(window.LaravelDataTables["perumahans-table"].table());
                //window.LaravelDataTables["perumahans-table"].table().draw();
            });

            $('.btn-reset').on('click', function() {
                $('#filter-form')[0].reset();
                // Override parameter Ajax dengan nilai baru dari form
                window.LaravelDataTables["perumahans-table"].ajax.url('{{ route('front.perumahan') }}')
                    .load();
            });
			$('#downloadExcel').on('click', function() {
				var params = window.LaravelDataTables["perumahans-table"].ajax.params();
				params.kabkota_id = $('#filter-kabkota_id').val();
				params.kecamatan_id = $('#filter-kecamatan_id').val();
				params.status_bast = $('#filter-status_bast').val();
				var url = '{{ route("front.perumahan.exportXls") }}?' + $.param(params);
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
		})

	</script>
@endsection
