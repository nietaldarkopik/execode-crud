<?php
if (auth()->user()->hasRole('Admin')) {
	config(['adminlte.layout_topnav' => false]);
}else{
	config(['adminlte.layout_topnav' => false]);
	//config(['adminlte.classes_topnav_container' => 'container']);
}
?>

<?php $layoutHelper = app('JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper'); ?>
<?php $preloaderHelper = app('JeroenNoten\LaravelAdminLte\Helpers\PreloaderHelper'); ?>

<?php $__env->startSection('adminlte_css'); ?>
    <?php echo $__env->yieldPushContent('css'); ?>
    <?php echo $__env->yieldContent('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('classes_body', $layoutHelper->makeBodyClasses()); ?>

<?php $__env->startSection('body_data', $layoutHelper->makeBodyData()); ?>



<?php $__env->startSection('content_top_nav_left'); ?> 
	
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content_top_nav_right'); ?> 

	
	
	

	<li class="nav-item dropdown">
		<a class="nav-link fs-5 lh-1 oswald-regular dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
			aria-expanded="false">
			Data Profile
		</a>
		<ul class="dropdown-menu">
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Pimpinan
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Dosen
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Tendik
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Mahasiswa
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Alumni
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Camaba
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Asesor
				</a>
			</li>
		</ul>
	</li>
	<li class="nav-item dropdown">
		<a class="nav-link fs-5 lh-1 oswald-regular dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
			aria-expanded="false">
			Akademik
		</a>
		<ul class="dropdown-menu">
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Kalender Akademik
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Kurikulum
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Jadwal Kuliah
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					KRS
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					KHS
				</a>
			</li>
		</ul>
	</li>
	<li class="nav-item dropdown">
		<a class="nav-link fs-5 lh-1 oswald-regular dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
			aria-expanded="false">
			Non Akademik
		</a>
		<ul class="dropdown-menu">
	
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Pengajuan SK Dosen
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Pengajuan Kegiatan
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Pengajuan Dosen Baru
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Pengajuan Surat Keterangan
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Kehadiran Dosen
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Kehadiran Tendik
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Pengajuan Cuti
				</a>
			</li>
		</ul>
	</li>
	<li class="nav-item dropdown">
		<a class="nav-link fs-5 lh-1 oswald-regular dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
			aria-expanded="false">
			Penugasan Dosen
		</a>
		<ul class="dropdown-menu">
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Dosen Wali
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Dosen Pembimbing
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Dosen Penguji
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Dosen Pengampu MK
				</a>
			</li>
		</ul>
	</li>
	<li class="nav-item dropdown">
		<a class="nav-link fs-5 lh-1 oswald-regular dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
			aria-expanded="false">
			Keuangan
		</a>
		<ul class="dropdown-menu">
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Biaya Perkuliahan
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Tagihan
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Pembayaran
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Dispensisasi
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Honor Dosen
				</a>
			</li>
		</ul>
	</li>
	<li class="nav-item dropdown">
		<a class="nav-link fs-5 lh-1 oswald-regular dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
			aria-expanded="false">
			Data Master
		</a>
		<ul class="dropdown-menu">
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Agama
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Alat Transportasi
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Bentuk Pendidikan
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Fakultas
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Ikatan Kerja Sdm
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Jabfung
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Jalur Masuk
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Jenis Aktivitas Mahasiswa
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Jenis Evaluasi
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Jenis Keluar
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Jenis Pendaftaran
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Jenis Prestasi
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Jenis Sertifikasi
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Jenis Sms
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Jenis Substansi
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Jenis Tinggal
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Jenjang Pendidikan
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Kategori Kegiatan
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Kebutuhan Khusus
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Lembaga Pengangkat
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Level Wilayah
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Mata Kuliah
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Pangkat Golongan
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Pekerjaan
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Pembiayaan
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Penghasilan
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Periode
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Periode Lampau
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Prodi
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Profil Pt
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Semester
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Status Keaktifan Pegawai
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Status Kepegawaian
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Status Mahasiswa
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Tahun Ajaran
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Tingkat Prestasi
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Transkrip Mahasiswa
				</a>
			</li>
	
			<li>
				<a class="dropdown-item fs-5 lh-1 oswald-regular" href="">
					Wilayah
				</a>
			</li>
		</ul>
	</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    <div class="wrapper">

        
        <?php if($preloaderHelper->isPreloaderEnabled()): ?>
            <?php echo $__env->make('adminlte::partials.common.preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        
        <?php if($layoutHelper->isLayoutTopnavEnabled()): ?>
            <?php echo $__env->make('adminlte::partials.navbar.navbar-layout-topnav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
            <?php echo $__env->make('adminlte::partials.navbar.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        
        <?php if(!$layoutHelper->isLayoutTopnavEnabled()): ?>
            <?php echo $__env->make('adminlte::partials.sidebar.left-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        
        <?php if(empty($iFrameEnabled)): ?>
            <?php echo $__env->make('adminlte::partials.cwrapper.cwrapper-default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
            <?php echo $__env->make('adminlte::partials.cwrapper.cwrapper-iframe', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        
        <?php if (! empty(trim($__env->yieldContent('footer')))): ?>
            <?php echo $__env->make('adminlte::partials.footer.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        
        <?php if(config('adminlte.right_sidebar')): ?>
            <?php echo $__env->make('adminlte::partials.sidebar.right-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('adminlte_js'); ?>
    <?php echo $__env->yieldPushContent('js'); ?>
    <?php echo $__env->yieldContent('js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\laravel-feeder-siakad\resources\views/vendor/adminlte/page.blade.php ENDPATH**/ ?>