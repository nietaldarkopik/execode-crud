

<?php $__env->startSection('plugins.Bootstrap4DualListbox', true); ?>
<?php $__env->startSection('plugins.BootstrapColorpicker', true); ?>
<?php $__env->startSection('plugins.BootstrapSlider', true); ?>
<?php $__env->startSection('plugins.BootstrapSwitch', true); ?>
<?php $__env->startSection('plugins.BsCustomFileInput', true); ?>
<?php $__env->startSection('plugins.ChartJs', true); ?>
<?php $__env->startSection('plugins.Datatables', true); ?>
<?php $__env->startSection('plugins.DatatablesPlugins', true); ?>
<?php $__env->startSection('plugins.Daterangepicker', true); ?>
<?php $__env->startSection('plugins.EkkoLightbox', true); ?>
<?php $__env->startSection('plugins.Fastclick', true); ?>
<?php $__env->startSection('plugins.Filterizr', true); ?>
<?php $__env->startSection('plugins.FlagIconCss', true); ?>
<?php $__env->startSection('plugins.Flot', true); ?>
<?php $__env->startSection('plugins.Fullcalendar', true); ?>
<?php $__env->startSection('plugins.IcheckBootstrap', true); ?>
<?php $__env->startSection('plugins.Inputmask', true); ?>
<?php $__env->startSection('plugins.IonRangslider', true); ?>
<?php $__env->startSection('plugins.JqueryKnob', true); ?>
<?php $__env->startSection('plugins.JqueryMapael', true); ?>
<?php $__env->startSection('plugins.JqueryUi', true); ?>
<?php $__env->startSection('plugins.JqueryValidation', true); ?>
<?php $__env->startSection('plugins.Jqvmap', true); ?>
<?php $__env->startSection('plugins.Jsgrid', true); ?>
<?php $__env->startSection('plugins.PaceProgress', true); ?>
<?php $__env->startSection('plugins.Select2', true); ?>
<?php $__env->startSection('plugins.Sparklines', true); ?>
<?php $__env->startSection('plugins.Summernote', false); ?>
<?php $__env->startSection('plugins.Sweetalert2', true); ?>
<?php $__env->startSection('plugins.TempusdominusBootstrap4', false); ?>
<?php $__env->startSection('plugins.Toastr', false); ?>

<?php $__env->startSection('title', 'Data Usulan'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1 class="m-0 text-dark">Data Usulan</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h2 class="card-title fw-bold fs-4">Data Usulan</h2>
            <div class="card-tools">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.pengajuan.import')): ?>
                    <a class="btn btn-sm btn-primary" href="<?php echo e(route('admin.pengajuan.import')); ?>" data-toggle="modal" data-target="#modalLgId" data-modal-title="Import Data">
                        <i class="fas fa-file-excel" aria-hidden="true"></i> Import
                    </a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.pengajuan.create')): ?>
                    <a class="btn btn-sm btn-primary" href="<?php echo e(route('admin.pengajuan.create')); ?>" data-toggle="modal" data-target="#modalLgId" data-modal-title="Tambah Data">
                        <i class="fas fa-plus-circle" aria-hidden="true"></i> Tambah
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="card-header py-1">
            <div class="form-row mb-0 d-flex justify-content-stretch">
                <div class="form-group mb-0 col-sm-1">
                    Filter Data :
                </div>
                <div class="form-group mb-0 col-sm-2">
                    
					<?php
					$userUnit = \App\Models\User::where('id',Auth::user()->id)->with(['unit:user_units.id_kabkota,user_units.id_user'])->get()
					->flatMap(function($user) {
						return $user->unit->pluck('id_kabkota'); // Mengambil id dari relasi unit
					})->toArray();
					?>
                    <select class="form-select form-select-sm custom-select custom-select-sm input-filter" name="filter[kabkota_id]" id="filter-kabkota_id">
                        <option value="">(Semua Kabupaten / Kota)</option>
						<?php if(is_array($userUnit) and count($userUnit) > 0): ?>
						<?php else: ?>
                        <option value="-">(Tidak Memiliki Kabupaten / Kota)</option>
						<?php endif; ?>
                        <?php $__currentLoopData = App\Models\KabupatenKotaModel::getUserAllowed()->where('province_id',63)->where(function($query) use ($userUnit){
							if(is_array($userUnit) and count($userUnit) > 0)
							{
								$query->whereIn('id',$userUnit);
							}
						})->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($d->id); ?>"><?php echo e($d->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                        
                    </select>
                </div>
                <div class="form-group mb-0 col-sm-2">
                    
                    <select class="form-select form-select-sm custom-select custom-select-sm input-filter" name="filter[kecamatan_id]" id="filter-kecamatan_id">
                        <option value="">(Semua Kecamatan)</option>
                        <?php $__currentLoopData = App\Models\KecamatanModel::with(['getKabupatenKota' => function($query) {$query->where('province_id',63);}])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($d->id); ?>"><?php echo e($d->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group mb-0 col-sm-2">
                    
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

            <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success my-2">
                    <p><?php echo e($message); ?></p>
                </div>
            <?php endif; ?>

            <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <div class="table-responsive">
                <?php echo e($dataTable->table()); ?>

            </div>
        </div>
    </div>

    <?php echo $__env->make('vendor.adminlte.partials.modal.modal-default',[
        'modalId' => 'modalLgId',
        'modalSize' => 'modal-lg',
        'modalTitle' => '',
        'modalContent' => '',
        'modalFooter' => '',
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('vendor.adminlte.partials.modal.modal-default',[
        'modalId' => 'modalFullId',
        'modalSize' => 'modal-fullscreen',
        'modalTitle' => '',
        'modalContent' => '',
        'modalFooter' => '',
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>


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
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>

<?php echo e($dataTable->scripts(attributes: ['type' => 'module'])); ?>


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
        var url = "<?php echo e(route('admin.services.getKabupatenKota')); ?>";

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
        var url = "<?php echo e(route('admin.services.getKecamatan',['kabupatenkota_id' => '--kabupatenkota_id--'])); ?>";
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
        var url = "<?php echo e(route('admin.services.getKelurahan',['kabupatenkota_id' => '--kabupatenkota_id--','kecamatan_id' => '--kecamatan_id--'])); ?>";

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
<script src="<?php echo e(asset('vendor/pdf.js/src/pdf.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\taebo\resources\views/vendor/adminlte/usulans/index.blade.php ENDPATH**/ ?>