

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
<?php $__env->startSection('plugins.Toastr', true); ?>

<?php $__env->startSection('title', 'Data Perumahan'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1 class="m-0 text-dark">Data Perumahan</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h2 class="card-title fw-bold fs-4">Data Perumahan</h2>
            <div class="card-tools">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.perumahan.import')): ?>
                    <a class="btn btn-sm btn-primary" href="<?php echo e(route('admin.perumahan.import')); ?>" data-toggle="modal" data-target="#modalLgId" data-modal-title="Import Data">
                        <i class="fas fa-file-excel" aria-hidden="true"></i> Import
                    </a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.perumahan.create')): ?>
                    <a class="btn btn-sm btn-primary" href="<?php echo e(route('admin.perumahan.create')); ?>" data-toggle="modal" data-target="#modalLgId" data-modal-title="Tambah Data">
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
                        <option value="">Kecamatan ...</option>
                        <option value="-">(Tidak Memiliki Kecamatan)</option>
                        <?php $__currentLoopData = App\Models\KecamatanModel::with(['getKabupatenKota' => function($query) {$query->where('province_id',63);}])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($d->id); ?>"><?php echo e($d->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                        
                    </select>
                </div>
                <div class="form-group mb-0 col-sm-2">
                    
                    <select class="form-select form-select-sm custom-select custom-select-sm input-filter" name="filter[status_bast]" id="filter-status_bast">
                        <option value="">Status BAST ...</option>
                        <option value="Sudah BAST">Sudah BAST</option>
                        <option value="Belum BAST">Belum BAST</option>
                    </select>
                </div>
                <div class="form-group mb-0 col-sm-2">
                    
                    <select class="form-select form-select-sm custom-select custom-select-sm input-filter" name="filter[tahun_siteplan]" id="filter-tahun_siteplan">
                        <option value="">Tahun Siteplan ...</option>
                        <?php for($i = 2000; $i <= date("Y"); $i++): ?>
                        <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                        <?php endfor; ?>
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

            $("#filter-kecamatan_id").html("<option value=''>Kecamatan ...</option>");
            if(d.length > 0)
            {
                d.forEach(e => {
                    $("#filter-kecamatan_id").append("<option value='"+e.id+"'>"+e.name+"</option>");
                });
            }
        });
    });

    
    $("body").on("change","#input-kabkota_id",function(){
        $("#input-kecamatan_id").html("<option value=''>Memuat Data ...</option>");
        var val = $(this).val();
        var data = getKecamatanOptions(val,function(d){

            $("#input-kecamatan_id").html("<option value=''>(Semua Kecamatan)</option>");
            $("#input-kecamatan_id").append("<option value='-'>(Tidak Memiliki Kecamatan)</option>");
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

            $("#input-kelurahan_id").html("<option value=''>(Semua Kelurahan)</option>");
            $("#input-kelurahan_id").append("<option value='-'>(Tidak Memiliki Kelurahan)</option>");
            if(d.length > 0)
            {
                d.forEach(e => {
                    $("#input-kelurahan_id").append("<option value='"+e.id+"'>"+e.name+"</option>");
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
        var url = "<?php echo e(route('admin.psuperumahan.getPsuItem',['PsuPerumahan' => 'xx'])); ?>";
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
        var url = "<?php echo e(route('admin.psuperumahan.updatePsuItem',['id' => 'xx'])); ?>";
        url = url.replace('xx',id);

        form.append('_method','patch');

        $.ajax({
            url: url,
            processData: false,
            contentType: false,
            type: 'POST',
            data: form,
            headers: {
                'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
            },
            success: callback
        })
    }

    function addFileToListDokumen(path,clickableElements,response,id_perumahan,id_dokumen){
        // Load GeoJSON data
        //var geojsonLayer = new L.GeoJSON.AJAX(path); // Ganti path dengan path GeoJSON Anda
        //geojsonLayer.addTo(map);
        response = JSON.parse(response);
        var url = "<?php echo e(asset(Storage::url('../../xxx'))); ?>";
        url = url.replace('xxx',response.nama_file);
        $(".file-list-dokumen").prepend('<li class="list-group-item row d-flex">' +
                                        '    <div class="col-sm-10">' +
                                                response.judul_file +
                                        '    </div>' +
                                        /* '    <div class="col-sm-5">' +
                                                response.judul_file +
                                        '    </div>' + */
                                        '    <div class="col-sm-2">' +
                                        '        <a href="' + url + '" target="_blank" class="btn btn-primary btn-sm">' +
                                        '            <i class="fa fa-eye" aria-hidden="true"></i>' +
                                        '        </a>' +
                                        '        <button type="button" class="btn btn-danger btn-sm btn-remove-file-document" data-id="'+id_perumahan+'" data-id_dokumen="'+response.id+'" data-file="'+response.nama_file+'">' +
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

    function addFileToListMap(path,clickableElements,response,id_perumahan){
        // Load GeoJSON data
        //var geojsonLayer = new L.GeoJSON.AJAX(path); // Ganti path dengan path GeoJSON Anda
        //geojsonLayer.addTo(map);
        $(".file-list-map").prepend('<li class="list-group-item d-flex justify-content-between"><a href="<?php echo e(asset('/')); ?>'+path.name+'" target="_blank">'+path.name+'</a><button type="button" class="btn btn-danger btn-sm btn-remove-file" data-id="'+id_perumahan+'" data-file="'+path.name+'"><i class="fa fa-trash"></i></button></li>');
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
        formData = new FormData(form);
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
        var url = "<?php echo e(route('admin.psuperumahan.getPsuAttributeForm',['PsuPerumahan' => 'xx','PSU' => 'yy'])); ?>";
        url = url.replace('xx',id);
        url = url.replace('yy',id_psu);

        $.ajax({
            url: url,
            type: 'get',
            headers: {
                'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
            },
            dataType: 'html',
            success:function(msg){
                $(card).find(".attribute-psu-container").html(msg);
            }
        })
    })

	$("body").on('change',".input-file-psuperumahan", function(event) {
		var idPsuPerumahan = $(this).attr("id");
		idPsuPerumahan = idPsuPerumahan.replace("imageInput-",""); 
		var previewContainer = $("#preview-"+idPsuPerumahan);
		console.log("#preview-"+idPsuPerumahan);
		var file = event.target.files[0];

		// Clear previous preview
		$(previewContainer).html("");

		if (file) {
			var reader = new FileReader();

			reader.onload = function(e) {
				var img = document.createElement('img');
				img.src = e.target.result;
				$(previewContainer).append(img);
			};

			reader.onerror = function(e) {
				console.error("Ada kesalahan dalam membaca file", e);
			};

			reader.readAsDataURL(file);
		} else {
			var message = document.createElement('p');
			message.textContent = "Tidak ada file yang dipilih";
			previewContainer.appendChild(message);
		}
	});

	$("body").on("click",".btn-remove-file",function(){
		if(confirm("Apakah yakin ingin menghapus file ini?"))
		{
			var id = $(this).data('id');
			var file = $(this).data('file');
			var url = "<?php echo e(route('admin.perumahan.removeFilePeta',['perumahan' => 'xx'])); ?>";
			url = url.replace('xx',id);
			var li = $(this).closest('li');

			$.ajax({
				url: url,
				type: 'post',
				data: {id: id, file: file},
				headers: {
					'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
				},
				dataType: 'html',
				success:function(msg){
					$(li).remove();
				}
			})
		}
	})

	$("body").on("click",".btn-remove-file-document",function(){
		if(confirm("Apakah yakin ingin menghapus file ini?"))
		{
			var id = $(this).data('id');
			var id_dokumen = $(this).data('id_dokumen');
			var file = $(this).data('file');
			var url = "<?php echo e(route('admin.perumahan.removeFileDocument',['perumahan' => 'xx'])); ?>";
			url = url.replace('xx',id);
			var li = $(this).closest('li');

			$.ajax({
				url: url,
				type: 'post',
				data: {id: id, file: file, id_dokumen: id_dokumen},
				headers: {
					'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
				},
				dataType: 'html',
				success:function(msg){
					msg = JSON.parse(msg);
					$(li).remove();
					toastr.success(msg.message, 'Success');
				},
				error: function(xhr, status, error) {
					var responseText = JSON.parse(xhr.responseText);
					console.log(xhr, status, error);
					toastr.error(responseText.message, 'Error');
				}
			})
		}
	})

	$("body").on("click",".btn-remove-psu",function(){
		if(confirm("Apakah yakin ingin menghapus data ini?"))
		{
			var id = $(this).data('id');
			var id_psu = $(this).data('id_psu');
			var url = "<?php echo e(route('admin.perumahan.removePsu',['perumahan' => 'xx','id_psu' => 'yy'])); ?>";
			url = url.replace('xx',id);
			url = url.replace('yy',id_psu);
			var li = $(this).closest('.card.card-psu-item');

			$.ajax({
				url: url,
				type: 'post',
				data: {id: id, id_psu: id_psu},
				headers: {
					'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
				},
				dataType: 'html',
				success:function(msg){
					msg = JSON.parse(msg);
					$(li).remove();
					toastr.success(msg.message, 'Success');
				},
				error: function(xhr, status, error) {
					var responseText = JSON.parse(xhr.responseText);
					console.log(xhr, status, error);
					toastr.error(responseText.message, 'Error');
				}
			})
		}
	})
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\taebo\resources\views/vendor/adminlte/perumahans/index.blade.php ENDPATH**/ ?>