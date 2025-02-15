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

<form action="<?php echo e(route('admin.setting.update', ['setting' => $setting])); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
	<?php echo method_field('patch'); ?>
	

    <div class="row mb-1">
        <div class="col-xs-12 col-sm-12 border">
            <div class="row">
                <div class="col-sm-4 p-0 px-1 d-flex justify-content-start align-items-center">
                    <div class="form-group mb-0">
                        <label class="form-label">Setting Code</label>
                    </div>
                </div>
                <div class="col-sm-8">
                    <input required="required" type="text" name="code" value="<?php echo e($setting->code); ?>" 
                        class="form-control border-dark border rounded-0 mt-1 text-italic border-type-dotted" placeholder="Setting Code" data-id="<?php echo e($setting->id); ?>"/>
					<small class="form-text text-muted response-check-code"></small>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-1">
        <div class="col-xs-12 col-sm-12 border">
            <div class="row">
                <div class="col-sm-4 p-0 px-1 d-flex justify-content-start align-items-center">
                    <div class="form-group mb-0">
                        <label class="form-label">Title</label>
                    </div>
                </div>
                <div class="col-sm-8">
                    <input required="required" type="text" name="title" value="<?php echo e($setting->title); ?>"
                        class="form-control border-dark border rounded-0 mt-1 text-italic border-type-dotted"
                        placeholder="Title" />
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-1">
        <div class="col-xs-12 col-sm-12 border">
            <div class="row">
                <div class="col-sm-12 p-0 px-1 d-flex justify-content-start align-items-center">
                    <div class="form-group mb-0">
                        <label class="form-label">Description</label>
                    </div>
                </div>
                <div class="col-sm-12">
                    <textarea name="description"
                        class="form-control border-dark border rounded-0 summernote"
                        placeholder="Konten Setting" rows="20"><?php echo e($setting->description); ?></textarea>
                </div>
            </div>
        </div>
    </div>
	
    <div class="row mb-1">
        <div class="col-xs-12 col-sm-12 border">
            <div class="row">
                <div class="col-sm-4 p-0 px-1 d-flex justify-content-start align-items-center">
                    <div class="form-group mb-0">
                        <label class="form-label">Type</label>
                    </div>
                </div>
                <div class="col-sm-8">
					  <select class="form-control border-dark border rounded-0 mt-1 text-italic border-type-dotted form-select select-custom form-select-sm" name="type">						
						<option value="text" <?php if($setting->type == "text"): echo 'selected'; endif; ?>>Text</option>
						<option value="longtext" <?php if($setting->type == "longtext"): echo 'selected'; endif; ?>>Longtext</option>
						<option value="file" <?php if($setting->type == "file"): echo 'selected'; endif; ?>>File</option>
					  </select>
					</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-1">
        <div class="col-xs-12 col-sm-12 border">
            <div class="row input-value input-value-file d-none">
                <div class="col-sm-4 p-0 px-1 d-flex justify-content-start align-items-center">
                    <div class="form-group mb-0">
                        <label>Value</label>
                    </div>
                </div>
                <div class="col-sm-8">
					<input type="file" name="value" class="form-control border-dark border py-1 text-italic rounded-0 " placeholder="Upload File" />
                </div>
				<div class="col-sm-4">
					<?php if(!empty($setting->value) && $setting->type == 'file'): ?>
						<?php
							$ext = explode(".",$setting->value);
							$ext = $ext[count($ext) - 1];
						?>
						<?php if(in_array($ext,['jpg','jpeg','png','gif'])): ?>
							<img src="<?php echo e(asset(Storage::url($setting->value))); ?>" class="img img-thumbnail"/>
						<?php else: ?>
							<a href="<?php echo e(asset(Storage::url($setting->value))); ?>" target="_blank">View</a>
						<?php endif; ?>
					<?php else: ?>
						<?php echo e($setting->value); ?>

					<?php endif; ?>
				</div>
            </div>
            <div class="row input-value input-value-text d-none">
                <div class="col-sm-4 p-0 px-1 d-flex justify-content-start align-items-center">
                    <div class="form-group mb-0">
                        <label>Value</label>
                    </div>
                </div>
                <div class="col-sm-8">
					<input type="text" name="value" value="<?php echo e($setting->value); ?>" class="form-control border-dark border py-0 text-italic rounded-0 " placeholder="Input Value" />
                </div>
            </div>
            <div class="row input-value input-value-longtext d-none">
                <div class="col-sm-4 p-0 px-1 d-flex justify-content-start align-items-center">
                    <div class="form-group mb-0">
                        <label>Value</label>
                    </div>
                </div>
                <div class="col-sm-8">
					<textarea name="value" class="form-control border-dark border py-0 text-italic rounded-0 " rows="3" placeholder="Input Value"><?php echo e($setting->value); ?></textarea>
                </div>
            </div>
        </div>
    </div>
	
	
    <div class="row mb-1">
        <div class="col-xs-12 col-sm-12 border">
            <div class="row">
                <div class="col-sm-4 p-0 px-1 d-flex justify-content-start align-items-center">
                    <div class="form-group mb-0">
                        <label class="form-label">Status</label>
                    </div>
                </div>
                <div class="col-sm-8">
					  <select class="form-control border-dark border rounded-0 mt-0 text-italic border-type-dotted form-select select-custom form-select-sm" name="status">						
						<option value="dynamic" <?php if($setting->status == "dynamic"): echo 'selected'; endif; ?>>Dynamic</option>
						<option value="fixed" <?php if($setting->status == "fixed"): echo 'selected'; endif; ?>>Fixed</option>
					  </select>
					</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-xs-12 col-md-12 mb-3 text-right">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-save" aria-hidden="true"></i>
                Simpan
            </button>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
		setValueType()
    });
</script>
<?php /**PATH C:\wamp\www\basooki.com\Modules/Setting\resources/views/admin/setting/form-edit.blade.php ENDPATH**/ ?>