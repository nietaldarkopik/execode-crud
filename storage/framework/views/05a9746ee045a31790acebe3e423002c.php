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

<form action="<?php echo e(route('admin.member.update', ['member' => $member])); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
	<?php echo method_field('patch'); ?>	
	
    <div class="row mb-2">
        <div class="col-xs-6 col-sm-6 ">
            <div class="form-group">
                <label class="mb-0" for="nama">Nama</label>
                <input type="text" value="<?php echo e($member->nama); ?>" required="required" class="form-control" name="nama" id="nama" aria-describedby="namaHelpId" placeholder="Nama">
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 ">
            <div class="form-group">
                <label class="mb-0" for="id_member_type">Jenis Member</label>
				<select class="form-control form-select select-custom form-select-sm" name="id_member_type">
				  <option value="0">Pilih Jenis Member ...</option>
				  <?php $__currentLoopData = Modules\Member\App\Models\MemberTypeModel::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $memberType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				  <option value="<?php echo e($memberType->id); ?>" <?php if( $memberType->id == $member->id_member_type): echo 'selected'; endif; ?>><?php echo e($memberType->title); ?></option>
				  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>
            </div>
        </div>
    </div>
	
    <div class="row mb-2">
        <div class="col-xs-6 col-sm-6 ">
            <div class="form-group">
                <label class="mb-0" for="tempat_lahir">Tempat Lahir</label>
                <input type="text" value="<?php echo e($member->tempat_lahir); ?>" required="required" class="form-control" name="tempat_lahir" id="tempat_lahir" aria-describedby="namaHelpId" placeholder="Tempat Lahir">
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 ">
            <div class="form-group">
                <label class="mb-0" for="tanggal_lahir">Tanggal Lahir</label>
                <input type="text" value="<?php echo e($member-> name); ?>" required="required" class="form-control input-datepicker" name="tanggal_lahir" id="tanggal_lahir" aria-describedby="namaHelpId" placeholder="Tanggal Lahir">
            </div>
        </div>
    </div>
	
    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12 ">
            <div class="form-group">
                <label class="mb-0" for="alamat">Alamat</label>
                <input type="text" value="<?php echo e($member->alamat); ?>" required="required" class="form-control" name="alamat" id="alamat" aria-describedby="namaHelpId" placeholder="Alamat">
            </div>
        </div>
    </div>
	
    <div class="row mb-2">
        <div class="col-xs-6 col-sm-6 ">
            <div class="form-group">
                <label class="mb-0" for="id_geup">Geup</label>
				<select class="form-control form-select select-custom form-select-sm" name="id_geup">						
				  <option value="active">Pilih Geup ...</option>
				  <?php $__currentLoopData = Modules\Member\App\Models\GeupModel::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $geup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				  <option value="<?php echo e($geup->id); ?>" <?php if( $geup->id == $member->id_geup): echo 'selected'; endif; ?>><?php echo e($geup->title); ?></option>
				  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 ">
            <div class="form-group">
                <label class="mb-0" for="no_reg">No Reg</label>
                <input type="text" value="<?php echo e($member->no_reg); ?>" required="required" class="form-control" name="no_reg" id="no_reg" aria-describedby="namaHelpId" placeholder="No Reg">
            </div>
        </div>
    </div>
	
    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12 ">
			<div class="form-group">
			  <label class="custom-file mb-0" for="input-file">Photo</label>
			  <input type="file" id="input-file" name="photo" class="form-control-file" placeholder="Upload Gambar" />
			  <small id="fileHelpId" class="form-text text-muted">Format File : .jpg , .png</small>
			</div>
        </div>
		<div class="col-sm-12 p-1">
			<?php if(!empty($member->photo)): ?>
				<img src="<?php echo e(asset(Storage::url($member->photo))); ?>" class="img img-thumbnail"/>
			<?php endif; ?>
		</div>
    </div>
	
    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12 ">
            <div class="form-group">
                <label class="mb-0" for="id_user">User</label>
				<select class="form-control form-select select-custom form-select-sm" name="id_user">						
				  <option value="0">Tanpa User ...</option>
				  <option value="--new--">Buat User ...</option>
				  <?php $__currentLoopData = App\Models\User::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				  <option value="<?php echo e($user->id); ?>" <?php if($user->id == $member->id_user): echo 'selected'; endif; ?>><?php echo e($user->name); ?></option>
				  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>
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
		$('.input-datepicker').daterangepicker ({
			singleDatePicker: true,
			locale: {
				format: 'YYYY-MM-DD' // Format tanggal
			}
		});
		
		$('.summernote').summernote({
				height: 500,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear', 'strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph', 'height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video', 'hr']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                    ['misc', ['undo', 'redo']]
                ],
				fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica', 'Impact', 'Tahoma', 'Times New Roman', 'Verdana', 'Calibri', 'Gabriela','Roboto Condensed','Poppins','Montserrat','Lato','Poppins Regular','Nunito'],
				fontNamesIgnoreCheck: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica', 'Impact', 'Tahoma', 'Times New Roman', 'Verdana', 'Calibri', 'Gabriela','Roboto Condensed','Poppins','Montserrat','Lato','Poppins Regular','Nunito'],
				callbacks: {
					onChange: function(contents, $editable) {
						$('#summernote').summernote('pasteHTML', contents);
						// Tidak menghapus kelas ketika konten diubah
					},
					onPaste: function(e) {
						var clipboardData = e.originalEvent.clipboardData || window.clipboardData;
						var pastedData = clipboardData.getData('Text');

						// Parse HTML dan tambahkan konten ke editor
						var el = $('<div>').html(pastedData);
						$('#summernote').summernote('pasteHTML', el.html());
					}
				},/* 
				styleTags: [
					{
						tag : 'table',
						title : 'Table Style',
						style : 'table table-bordered',
						className : 'table table-bordered',
						value : 'table table-bordered'
					}
				], */
                fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '20', '22', '24', '28', '30', '36', '48', '64', '82', '150'],
                height: 300,
                minHeight: null,
                maxHeight: null,
                focus: true,
                placeholder: 'Start typing here...',
                dialogsInBody: true,
                dialogsFade: true,
				codeviewFilter: false, // Disable code filtering in codeview
            	codeviewIframeFilter: false, // Disable iframe filtering
				cleaner: {
					notTime: 2400, // Time to display notifications.
					action: 'both', // Default action for button
					newline: '<br>', // Default break line
					notStyle: 'position:absolute;bottom:0;left:0;right:0;width:100%;height:40px;line-height:40px;color:#444;text-align:center;background-color:#d4edda;', // Style of the notification
					icon: '<i class="note-icon">[Cleaner]</i>', // HTML to insert before notification
				},
				keepHtml: true, // Keep all HTML
				//keepOnlyTags: ['<b>', '<i>', '<u>', '<strike>', '<span>'], // Use this to keep only these tags
				keepClasses: true // Keep classes
			});
	});
</script><?php /**PATH C:\wamp\www\taebo\Modules/Member\resources/views/admin/member/form-edit.blade.php ENDPATH**/ ?>