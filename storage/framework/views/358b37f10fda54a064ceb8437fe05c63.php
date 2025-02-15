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

<form action="<?php echo e(route('admin.menu.update', ['menu' => $menu])); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field("patch"); ?>
    
    <div class="row mb-1">
        <div class="col-xs-12 col-sm-12 border">
            <div class="row">
                <div class="col-sm-4 p-0 bg-secondary text-white px-1 d-flex justify-content-start align-items-center">
                    <div class="form-group mb-0">
                        <span>Grup Menu</span>
                    </div>
                </div>
                <div class="col-sm-8 p-1">
                    <select class="form-select form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                        name="menu_group_id" required="required">
                        <option value="0">Pilih Menu Grup ... </option>
                        <?php $__currentLoopData = \App\Models\MenuGrupModel::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($d->id); ?>" <?php if($d->id == $menu->menu_group_id): echo 'selected'; endif; ?>><?php echo e($d->title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row mb-1">
        <div class="col-xs-12 col-sm-12 border">
            <div class="row">
                <div class="col-sm-4 p-0 bg-secondary text-white px-1 d-flex justify-content-start align-items-center">
                    <div class="form-group mb-0">
                        <span>Induk Menu</span>
                    </div>
                </div>
                <div class="col-sm-8 p-1">
                    <select class="form-select form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                        name="parent_id">
                        <option value="0">Utama ...</option>
                        <?php $__currentLoopData = \App\Models\MenuModel::where('menu_group_id',Session::get('filter_menu')['menu_group_id'])->where('id','!=',$menu?->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($d->id); ?>" <?php if($d->id == $menu->parent_id): echo 'selected'; endif; ?>><?php echo e($d->title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-1">
        <div class="col-xs-12 col-sm-12 border">
            <div class="row">
                <div class="col-sm-4 p-0 bg-secondary text-white px-1 d-flex justify-content-start align-items-center">
                    <div class="form-group mb-0">
                        <span>Judul</span>
                    </div>
                </div>
                <div class="col-sm-8 p-1">
                    <input required="required" type="text" name="title" value="<?php echo e($menu?->title); ?>"
                        class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                        placeholder="Judul" />
                </div>
            </div>
        </div>
    </div>
	
    <div class="row mb-1">
        <div class="col-xs-12 col-sm-12 border">
            <div class="row">
                <div class="col-sm-4 p-0 bg-secondary text-white px-1 d-flex justify-content-start align-items-center">
                    <div class="form-group mb-0">
                        <span>Jenis Konten</span>
                    </div>
                </div>
                <div class="col-sm-8 p-1">
					<select name="type_link" class="form-select form-control form-control-sm">
						<option value="external" <?php if($menu?->type_link == "external"): echo 'selected'; endif; ?>>Custom URL</option>
						<option value="route" <?php if($menu?->type_link == "route"): echo 'selected'; endif; ?>>Route</option>
						<option value="page" <?php if($menu?->type_link == "page"): echo 'selected'; endif; ?>>Halaman</option>
					</select>
                </div>
            </div>
        </div>
    </div>
	
    <div class="row mb-1 input-halaman" style="display: none;">
        <div class="col-xs-12 col-sm-12 border">
            <div class="row">
                <div class="col-sm-4 p-0 bg-secondary text-white px-1 d-flex justify-content-start align-items-center">
                    <div class="form-group mb-0">
                        <span>Halaman</span>
                    </div>
                </div>
                <div class="col-sm-8 p-1">
						<select class="form-select form-select-lg form-control" name="code" disabled>
							<option value="">Pilih Halaman ...</option>
							<?php $__currentLoopData = \App\Models\PageModel::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($h->slug); ?>" <?php if($h->slug == $menu?->code): echo 'selected'; endif; ?>><?php echo e($h->title); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div>
					
                </div>
            </div>
        </div>
    </div>
	
    <div class="row mb-1 input-url" style="display: none;">
        <div class="col-xs-12 col-sm-12 border">
            <div class="row">
                <div class="col-sm-4 p-0 bg-secondary text-white px-1 d-flex justify-content-start align-items-center">
                    <div class="form-group mb-0">
                        <span>URL</span>
                    </div>
                </div>
                <div class="col-sm-8 p-1">
                    <input type="text" name="code" value="<?php echo e($menu?->code); ?>"
                        class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                        placeholder="URL" disabled/>
                </div>
            </div>
        </div>
    </div>
	
    <div class="row mb-1">
        <div class="col-xs-12 col-sm-12 border">
            <div class="row">
                <div class="col-sm-4 p-0 bg-secondary text-white px-1 d-flex justify-content-start align-items-center">
                    <div class="form-group mb-0">
                        <span>Icon</span>
                    </div>
                </div>
                <div class="col-sm-8 p-1">
                    <input type="text" name="icon" value="<?php echo e($menu?->icon); ?>"
                        class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                        placeholder="Icon" />
                </div>
            </div>
        </div>
    </div>
	
    <div class="row mb-1">
        <div class="col-xs-12 col-sm-12 border">
            <div class="row">
                <div class="col-sm-4 p-0 bg-secondary text-white px-1 d-flex justify-content-start align-items-center">
                    <div class="form-group mb-0">
                        <span>Target</span>
                    </div>
                </div>
                <div class="col-sm-8 p-1">
					<select name="target" class="form-select form-control form-control-sm">
						<option value="_self" <?php if($menu?->target == "_self"): echo 'selected'; endif; ?>>Tab saat ini</option>
						<option value="_blank" <?php if($menu?->target == "_blank"): echo 'selected'; endif; ?>>Tab Baru</option>
					</select>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-1 g-1">
        <div class="col-xs-12 mb-3 text-center">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-save" aria-hidden="true"></i>
                Simpan
            </button>
        </div>
    </div>
</form>


<script>
	setUrl();
</script><?php /**PATH C:\wamp\www\taebo\resources\views/vendor/adminlte/menus/form-edit.blade.php ENDPATH**/ ?>