

<?php $__env->startSection('plugins.Bootstrap4DualListbox',true); ?>
<?php $__env->startSection('plugins.BootstrapColorpicker',true); ?>
<?php $__env->startSection('plugins.BootstrapSlider',true); ?>
<?php $__env->startSection('plugins.BootstrapSwitch',true); ?>
<?php $__env->startSection('plugins.BsCustomFileInput',true); ?>
<?php $__env->startSection('plugins.ChartJs',true); ?>
<?php $__env->startSection('plugins.Datatables',true); ?>
<?php $__env->startSection('plugins.DatatablesPlugins',true); ?>
<?php $__env->startSection('plugins.Daterangepicker',true); ?>
<?php $__env->startSection('plugins.EkkoLightbox',true); ?>
<?php $__env->startSection('plugins.Fastclick',true); ?>
<?php $__env->startSection('plugins.Filterizr',true); ?>
<?php $__env->startSection('plugins.FlagIconCss',true); ?>
<?php $__env->startSection('plugins.Flot',true); ?>
<?php $__env->startSection('plugins.Fullcalendar',true); ?>
<?php $__env->startSection('plugins.IcheckBootstrap',true); ?>
<?php $__env->startSection('plugins.Inputmask',true); ?>
<?php $__env->startSection('plugins.IonRangslider',true); ?>
<?php $__env->startSection('plugins.JqueryKnob',true); ?>
<?php $__env->startSection('plugins.JqueryMapael',true); ?>
<?php $__env->startSection('plugins.JqueryUi',true); ?>
<?php $__env->startSection('plugins.JqueryValidation',true); ?>
<?php $__env->startSection('plugins.Jqvmap',true); ?>
<?php $__env->startSection('plugins.Jsgrid',true); ?>
<?php $__env->startSection('plugins.PaceProgress',true); ?>
<?php $__env->startSection('plugins.Select2',true); ?>
<?php $__env->startSection('plugins.Sparklines',true); ?>
<?php $__env->startSection('plugins.Summernote',true); ?>
<?php $__env->startSection('plugins.Sweetalert2',true); ?>
<?php $__env->startSection('plugins.TempusdominusBootstrap4',true); ?>
<?php $__env->startSection('plugins.Toastr',true); ?>


<?php $__env->startSection('title', 'Jadwal Kuliah'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1 class="m-0 text-dark">Jadwal Kuliah</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h2 class="card-title fw-bold fs-4">Data Jadwal Kuliah</h2>
            <div class="card-tools">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.users.create')): ?>
                    <a class="btn btn-sm btn-primary" href="<?php echo e(route('admin.users.create')); ?>">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="card-body">

            <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success my-2">
                    <p><?php echo e($message); ?></p>
                </div>
            <?php endif; ?>

			

	<div class="container">
		<div class="row">
			<div class="col-md-12 d-flex justify-content-center align-items-center pt-5">
				<form class="d-block w-100">
					<div class="row g-1">
						<div class="col-md-2 col-12">
							<div class="mb-3 form-floatingx">
								<label for="" class="form-label">Tahun Ajaran</label>
								<select class="w-100 form-control form-select2" id="input-tahun_ajaran" name="input[tahun_ajaran]">
									<?php
									for($i = date("Y"); $i >= date("Y")-8; $i--)
									{
									?>
										<option value="<?php echo $i;?>-<?php echo $i+1;?>"><?php echo $i;?>-<?php echo $i+1;?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-md-2 col-12">
							<div class="mb-3 form-floatingx">
								<label for="" class="form-label">Semester</label>
								<select class="w-100 form-control form-select2" id="input-semester" name="input[semester]">
									<option value="Ganjil">Ganjil</option>
									<option value="Genap">Genap</option>
								</select>
							</div>
						</div>
						<div class="col-md-2 col-12">
							<div class="mb-3 form-floatingx">
								<label for="" class="form-label">Program Studi</label>
								<select class="w-100 form-control form-select2-multiple" id="input-prodi" name="input[prodi][]" data-placeholder="Semua Prodi">
									
									<?php foreach($prodi as $i => $p) { ?>
									<option value="<?php echo $p->id_prodi;?>"><?php echo $p->prodi;?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-md-2 col-12">
							<div class="mb-3 form-floatingx">
							<label for="" class="form-label">Ruangan</label>
								<select class="w-100 form-control form-select2-multiple" id="input-ruangan" name="input[ruangan][]" data-placeholder="Semua Ruangan">
									
									<?php foreach($ruangan as $i => $r) { ?>
									<option value="<?php echo $r->id;?>"><?php echo $r->ruangan;?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-md-2 col-12">
							<div class="mb-3 form-floatingx">
							<label for="" class="form-label">Hari</label>
								<select class="w-100 form-control form-select2-multiple" id="input-hari" name="input[hari][]" data-placeholder="Semua Hari">
									
									<?php foreach($hari as $i => $r) { ?>
									<option value="<?php echo $i;?>"><?php echo $r;?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-md-2 mb-3">
							<button type="button" name="" id="" class="form-control btn btn-lg btn-primary h-100"
								placeholder="" aria-describedby="helpId">
								Cari
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 pb-5">
				<div class="table-responsive" style="max-height: 70vh;">
					<table
						class="table table-sm table-hover table-primary table-bordered table-stripedx table-striped-columns">
						<thead class="table-group-divider">
							<tr>
								<th class="bg-white position-sticky z-index-4 top-0 left-0">
									<div class="bg-white" style="width: 120px;">
										Hari
									</div>
								</th>
								<th class="bg-white position-sticky z-index-4 top-0 left-1">
									<div class="bg-white" style="width: 120px;">
										Mulai - Selesai
									</div>
								</th>
								<?php
								foreach ($ruangan as $i => $ruang) {
									?>
									<th class="bg-white position-sticky z-index-3 top-0"><?php echo $ruang->keterangan; ?></th>
									<?php
								}
								?>
							</tr>
						</thead>
						<tbody class="table-group-divider">
							<?php

							for ($i = 0; $i < count($hari); $i++) {
								$start_time = strtotime('06:00'); // Waktu awal
								$end_time = strtotime('20:40');   // Waktu akhir
							
								while ($start_time <= $end_time) {

									$end_time_current = strtotime('+10 minutes', $start_time); // Tambah 5 menit
									$sql = "SELECT * FROM jadwal JOIN jadwal_dosen on jadwal.id = jadwal_dosen.id_jadwal 
												WHERE 
													hari is not null and 
													mulai is not null and 
													selesai is not null and 
													hari = '" . ($i + 1) . "' and 
													(mulai >= '$start_time' and selesai <= '$end_time_current')";

													$row = DB::select($sql);

									?>
									<tr class="data-rows"
										data-tr="<?php echo $i + 1; ?>_<?php echo $start_time; ?>-<?php echo $end_time_current; ?>" style="background-color: <?php echo $warna_global[$i];?>;">
										<td scope="row" class="position-sticky z-index-3 left-0 bg-white" style="background-color: <?php echo $warna_global[$i];?>;">
											<?php echo $hari[$i]; ?>
										</td>
										<td scope="row" class="position-sticky z-index-3 left-1 bg-white" style="background-color: <?php echo $warna_global[$i];?>;">
											<?php
											echo date('H:i', $start_time) . "\n";
											?> -
											<?php
											echo date('H:i', $end_time_current) . "\n";
											?>
										</td>
										<?php
										foreach ($ruangan as $i_ruang => $ruang) {
											?>
											<td scope="row" data-td-hari="<?php echo $i + 1; ?>"
												data-td-start="<?php echo $start_time; ?>"
												data-td-end="<?php echo $end_time_current; ?>"
												data-td-waktu="<?php echo date('H:i:s',$start_time) . '-' . date('H:i:s',$end_time_current); ?>"
												data-td-ruangan="<?php echo $ruang->id; ?>" style="background-color: <?php echo $warna_global[$i];?>;">
												<div class="jadwal-container d-block position-relative" style="width: 200px;"></div>
											</td>
										<?php } ?>
									</tr>
									<?php
									$start_time = $end_time_current;
								}
							}
							?>
						</tbody>
					</table>
				</div>

			</div>
		</div>
	</div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
	<script>
		function getMinutesDifference(startTime, endTime) {
			// Mengonversi string waktu ke dalam objek Date
			var start = new Date("1970-01-01T" + startTime + "Z");
			console.log(startTime);
			var end = new Date("1970-01-01T" + endTime + "Z");
			console.log(endTime);

			// Hitung selisih waktu dalam milidetik
			var difference = (end - start) / 1000 / 60; // Konversi ke menit

			return difference;
		}
		//$jadwal_kuliah[$row['hari'].'_'.$row['ruangan'].'_'.$row['kode_matkul'].'_'.$row['mulai'].'-'.$row['selesai']]
		var jadwal_kuliah = <?php echo json_encode($jadwal_kuliah); ?>;
		var prodi_color = <?php echo json_encode($prodi_color); ?>;
		var prodi = <?php echo json_encode($prodi); ?>;

		$(document).ready(function () {
			$.each(jadwal_kuliah, function (i, v) {
				var v_arr = i.split("_");
				var hari = v_arr[0];
				var ruangan = v_arr[1];
				var kode_matkul = v_arr[2];
				var waktu = v_arr[3];
				var waktu_arr = waktu.split("-");
				var waktu_time = v.waktu;
				var waktu_time_arr = waktu_time.split("-");

				var minutes = getMinutesDifference(waktu_time_arr[0], waktu_time_arr[1]);
				var minutes10 = parseInt(minutes*2.7)+10;

				$('td[data-td-hari="' + hari + '"][data-td-ruangan="' + ruangan + '"]').filter(function () {
					var waktuMulai = $(this).attr('data-td-start');
					return waktuMulai >= waktu_arr[0]; // && waktuMulai < waktu_arr[1];
				}).eq(0).find(".jadwal-container").append(`
								<form method="post" action="">
									<div class="card text-start position-absolute z-index-1" style="width: 200px; height: `+minutes10+`px; background-color: `+prodi_color[v.id_prodi]+`">
										<div class="card-header py-1 text-center">
											<h6 class="card-title fw-bold text-center py-0 w-100">` + prodi[v.id_prodi].prodi + `</h6>
										</div>
										<div class="card-body text-center py-0 px-1">
											<h6 class="m-0 text-bold"><small>`+v.kode_matkul + ` - `+ v.matkul +`</small></h6>
											<p class="m-0 text-bold fw-bold"><small>` + v.nama_lengkap + `</small></p>
											<p class="m-0 text-bold fw-bold pt-1 text-italic"><small>`+ v.waktu + `</small></p>
										</div>
										<div class="card-footer text-center d-block p-1">
											<div class="row d-flex g-0">
												<div class="col-12">
													<select class="form-control form-control-sm" name="ruangan">
														<option value="0">Tidak Ditentukan<option>
													<?php
													foreach($ruangan as $i => $r)
													{
														echo '<option value="' . $r->id . '" `+(ruangan == '.($r->id).' ? "selected" : "")+`>'.$r->keterangan.'</option>';
													}
													?>
													</select>
												</div>
											</div>
											<div class="row d-flex g-0">
												<div class="col-12">
													<select class="form-control form-control-sm" name="hari">
														<option value="0">Tidak Ditentukan<option>
														<?php
														foreach($hari as $i => $h)
														{
															echo '<option value="' . $i+1 . '" `+(hari == '.($i+1).' ? "selected" : "")+`>'.$h.'</option>';
														}
														?>
													</select>
												</div>
											</div>
											<div class="row d-flex g-0">
												<div class="col-6">
													<input type="time" name="mulai" class="form-control form-control-sm" value="`+waktu_time_arr[0]+`"/>
												</div>
												<div class="col-6">
													<input type="time" name="selesai" class="form-control form-control-sm" value="`+waktu_time_arr[1]+`"/>
												</div>
											</div>
											<div class="row d-flex g-0">
												<div class="col-12">
													<input type="text" name="id_prodi" class="form-control form-control-sm" value="`+v.id_prodi+`"/>
													<input type="text" name="kode_matkul" class="form-control form-control-sm" value="`+v.kode_matkul+`"/>
													<input type="text" name="tahun" class="form-control form-control-sm" value="`+v.tahun+`"/>
													<input type="text" name="thn_semester" class="form-control form-control-sm" value="`+v.thn_semester+`"/>
													<input type="text" name="id_jadwal" class="form-control form-control-sm" value="`+v.id_jadwal+`"/>
													<button type="button" class="btn btn-primary btn-save-jadwal">Simpan</button>
												</div>
											</div>
										</div>
									</div>
								</form>
							`);
			});

			/* $('*[data-waktu-mulai]').filter(function() {
				var waktuMulai = $(this).attr('data-waktu-mulai');
				return waktuMulai > '10:00:00' && waktuMulai < '11:00:00';
			}).each(function() {
				// Lakukan sesuatu dengan elemen yang cocok
				console.log($(this));
			}); */
		});
		
		$(document).ready(function() {
			$('.form-select2').select2({
				allowClear: false,
				closeOnSelect: false,
				dropdownAutoWidth: true,
				dropdownCssClass: 'form-select',
				//dropdownParent: $(document.body),
				multiple: false
			});
			$('.form-select2-multiple').select2({
				allowClear: true,
				closeOnSelect: false,
				dropdownAutoWidth: true,
				dropdownCssClass: 'form-select',
				//dropdownParent: $(document.body),
				multiple: true
			});
			$('.form-select2-multiple').val(null).trigger('change'); // Reset nilai

		});
		$("body").on("click",".btn-save-jadwal",function(){
			var form = $(this).closest("form");
			var ruangan = $(form).find("[name='ruangan']").val();
			var hari = $(form).find("[name='hari']").val();
			var mulai = $(form).find("[name='mulai']").val();
			var selesai = $(form).find("[name='selesai']").val();
			var id_prodi = $(form).find("[name='id_prodi']").val();
			var kode_matkul = $(form).find("[name='kode_matkul']").val();
			var tahun = $(form).find("[name='tahun']").val();
			var thn_semester = $(form).find("[name='thn_semester']").val();
			var id_jadwal = $(form).find("[name='id_jadwal']").val();

			$.ajax({
				url: "<?php echo e(route('admin.jadwalKuliah.update')); ?>",
				type: "post",
				data: {
					id_jadwal : id_jadwal,
					ruangan : ruangan,
					hari : hari,
					mulai : mulai,
					selesai : selesai,
					id_prodi : id_prodi,
					kode_matkul : kode_matkul,
					tahun : tahun,
					thn_semester : thn_semester,
				},
				headers: {
					'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
				},
				success: function(msg){

					console.log({
						id_jadwal : id_jadwal,
						ruangan : ruangan,
						hari : hari,
						mulai : mulai,
						selesai : selesai,
						id_prodi : id_prodi,
						kode_matkul : kode_matkul,
						tahun : tahun,
						thn_semester : thn_semester,
					});
					toastr.option = {
						"closeButton": true,
						"progressBar": true,
						"positionClass": "toast-top-right",  // Posisi pesan
						"showDuration": "300",               // Durasi efek muncul (ms)
						"hideDuration": "1000",              // Durasi efek hilang (ms)
						"timeOut": "5000",                   // Lama notifikasi terlihat (ms)
						"extendedTimeOut": "1000",           // Perpanjangan waktu notifikasi (ms)
						"showEasing": "swing",               // Efek animasi saat muncul
						"hideEasing": "linear",              // Efek animasi saat menghilang
						"showMethod": "fadeIn",              // Efek saat muncul
						"hideMethod": "fadeOut"              // Efek saat menghilang
					};

					toastr.error("Gagal","Error");

					},
					error: function(){

						console.log({
						id_jadwal : id_jadwal,
						ruangan : ruangan,
						hari : hari,
						mulai : mulai,
						selesai : selesai,
						id_prodi : id_prodi,
						kode_matkul : kode_matkul,
						tahun : tahun,
						thn_semester : thn_semester,
					});
				toastr.option = {
					"closeButton": true,
					"progressBar": true,
					"positionClass": "toast-top-right",  // Posisi pesan
					"showDuration": "300",               // Durasi efek muncul (ms)
					"hideDuration": "1000",              // Durasi efek hilang (ms)
					"timeOut": "5000",                   // Lama notifikasi terlihat (ms)
					"extendedTimeOut": "1000",           // Perpanjangan waktu notifikasi (ms)
					"showEasing": "swing",               // Efek animasi saat muncul
					"hideEasing": "linear",              // Efek animasi saat menghilang
					"showMethod": "fadeIn",              // Efek saat muncul
					"hideMethod": "fadeOut"              // Efek saat menghilang
				};

				toastr.success("OK","Sukses");

				}
			});
		})
	</script>
	<style>
		.top-0 {
			top: 0px;
		}
		.left-0 {
			left: 1px;
		}

		.left-1 {
			left: 130px;
		}
		.select2-container .select2-selection--single {
			box-sizing: border-box;
			cursor: pointer;
			display: block;
			height: 38px;
			user-select: none;
			-webkit-user-select: none;
		}
		.select2-container--default .select2-selection--multiple .select2-selection__choice{
			background-color: #007bff;
			border-color: #006fe6;
			color: #fff;
			padding: 0 10px;
			margin-top: .31rem;
		}
	</style>
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip({})
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\laravel-scheduler\resources\views/vendor/adminlte/jadwal-kuliah/index.blade.php ENDPATH**/ ?>