

<?php $__env->startSection('content'); ?>
    <section class="container-fluid vh-50">
        <div class="row">
            <div class="col-xl-12 px-0">
                <div class="card bg-warning mb-3">
                    <div class="card-header bg-warning">
                        <h4 class="m-0 fs-6 text-end">
                            <span class="oswald-regular" id="date"></span>
                            <span class="oswald-regular" id="clock"></span>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 px-0">
                <div class="container-fluid  h-100 px-0">
                    <div class="card rounded-4 card-primary px-0">
                        <div class="card-body" style="min-height: 75vh;">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="oswald-semibold fs-4 text-center">Matrix Jadwal Kuliah</h1>
                                    <h1 class="oswald-semibold fs-4 text-center">Fakultas Teknik, Perencanaan dan Arsitektur</h1>
                                    <h1 class="oswald-semibold fs-4 text-center">Universitas Winaya Mukti</h1>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center align-items-center">
                                <div class="col-md-12">
									<div class="table-responsive" style="max-height: 70vh;">
										<table
											class="table table-sm table-hover table-primary table-bordered table-stripedx table-striped-columns">
											<thead class="table-group-divider">
												<tr>
													<th class="bg-white position-sticky z-4 top-0 left-0">
														<div class="bg-white" style="width: 120px;">
															Hari
														</div>
													</th>
													<th class="bg-white position-sticky z-4 top-0 left-1">
														<div class="bg-white" style="width: 120px;">
															Mulai - Selesai
														</div>
													</th>
													<?php
													foreach ($ruangan as $i => $ruang) {
														?>
														<th class="bg-white position-sticky z-3 top-0"><?php echo $ruang->keterangan; ?></th>
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
															<td scope="row" class="position-sticky z-3 left-0 bg-white" style="background-color: <?php echo $warna_global[$i];?>;">
																<?php echo $hari[$i]; ?>
															</td>
															<td scope="row" class="position-sticky z-3 left-1 bg-white" style="background-color: <?php echo $warna_global[$i];?>;">
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

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('css'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" preload />
    <link rel="stylesheet" href="<?php echo e(asset('css/slider.css')); ?>" />
    <style>
        #date,
        #clock {
            font-family: 'Arial', sans-serif;
            text-align: center;
            margin-top: 20%;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('js'); ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="<?php echo e(asset('js/slider.js')); ?>"></script>
    <script>
        function updateClock() {
            // Dapatkan waktu saat ini
            const now = new Date();

            // Mendapatkan komponen waktu
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const seconds = now.getSeconds().toString().padStart(2, '0');

            // Mendapatkan hari dan tanggal
            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            const formattedDate = now.toLocaleDateString('id-ID', options);

            // Memformat waktu
            const formattedTime = `${hours}:${minutes}:${seconds}`;

            // Menampilkan waktu dan tanggal ke dalam elemen HTML
            document.getElementById('date').textContent = formattedDate;
            document.getElementById('clock').textContent = formattedTime;
        }

        // Memperbarui waktu setiap detik
        setInterval(updateClock, 1000);

        // Panggil fungsi sekali untuk memulai jam sebelum interval berikutnya
        updateClock();
    </script>
	
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
									<div class="card text-start position-absolute z-1" style="width: 200px; height: `+minutes10+`px; background-color: `+prodi_color[v.id_prodi]+`">
										<div class="card-header py-1 text-center">
											<h6 class="card-title fw-bold text-center py-0 w-100">` + prodi[v.id_prodi].prodi + `</h6>
										</div>
										<div class="card-body text-center py-0 px-1">
											<h6 class="m-0 text-bold"><small>`+v.kode_matkul + ` - `+ v.matkul +`</small></h6>
											<p class="m-0 text-bold fw-bold"><small>` + v.nama_lengkap + `</small></p>
											<p class="m-0 text-bold fw-bold pt-1 text-italic"><small>`+ v.waktu + `</small></p>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.master-front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\laravel-scheduler\resources\views/front/layouts/beranda.blade.php ENDPATH**/ ?>