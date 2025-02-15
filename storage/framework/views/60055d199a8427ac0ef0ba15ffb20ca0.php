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

<form action="<?php echo e(route('admin.championship.update', ['championship' => $championship])); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
	<?php echo method_field('patch'); ?>
	
    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12 ">
            <div class="form-group">
                <label class="mb-0" for="title">Judul</label>
                <input type="text" required="required" class="form-control" name="title" id="title" value="<?php echo e($championship->title); ?>"
                    aria-describedby="namaHelpId" placeholder="Judul">
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12 ">
            <div class="form-group">
                <label class="mb-0" for="slug">URL Kejuaraan</label>
                <input type="text" required="required" class="form-control" name="slug" id="slug" value="<?php echo e($championship->slug); ?>" aria-describedby="namaHelpId" placeholder="URL Kejuaraan">
                <small class="form-text text-muted response-check-slug"></small>
            </div>
        </div>
    </div>
	
    <div class="row mb-2">
        <div class="col-xs-6 col-sm-6">
            <div class="form-group mb-0">
                <label class="mb-0" for="organizer">Penyelenggara</label>
                <input required="required" type="text" name="organizer" value="<?php echo e($championship->organizer); ?>"
                    class="form-control"
                    placeholder="Penyelenggara" />
            </div>
        </div>
        <div class="col-xs-6 col-sm-6">
            <div class="form-group mb-0">
                <label class="mb-0" for="grade">Grade</label>
                <select required="required" type="text" name="grade" class="form-control">
					<option value="A" <?php if($championship->grade == "A"): echo 'selected'; endif; ?>>A</option>
					<option value="B" <?php if($championship->grade == "B"): echo 'selected'; endif; ?>>B</option>
					<option value="C" <?php if($championship->grade == "C"): echo 'selected'; endif; ?>>C</option>
				</select>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-xs-6 col-sm-6">
            <div class="form-group mb-0">
                <label class="mb-0" for="reg_open">Mulai Pendaftaran</label>
                <input required="required" type="text" name="reg_open" value="<?php echo e($championship->reg_open); ?>"
                    class="form-control input-datepicker"
                    placeholder="Mulai Pendaftaran" />
            </div>
        </div>
        <div class="col-xs-6 col-sm-6">
            <div class="form-group mb-0">
                <label class="mb-0" for="reg_close">Akhir Pendaftaran</label>
                <input required="required" type="text" name="reg_close" value="<?php echo e($championship->reg_close); ?>"
                    class="form-control input-datepicker"
                    placeholder="Akhir Pendaftaran" />
            </div>
        </div>
    </div>

	
    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mb-0">
                <label class="mb-0" for="place">Tempat</label>
                <input required="required" type="text" name="place" value="<?php echo e($championship->place); ?>"
                    class="form-control"
                    placeholder="Tempat" />
            </div>
        </div>
    </div>

	
    <div class="row mb-2">
        <div class="col-xs-6 col-sm-6">
            <div class="form-group mb-0">
                <label class="mb-0" for="event_start">Mulai Kejuaraan</label>
                <input required="required" type="text" name="event_start" value="<?php echo e($championship->event_start); ?>"
                    class="form-control input-datepicker"
                    placeholder="Mulai Kejuaraan" />
            </div>
		</div>
        <div class="col-xs-6 col-sm-6">
            <div class="form-group mb-0">
                <label class="mb-0" for="event_end">Akhir Kejuaraan</label>
                <input required="required" type="text" name="event_end" value="<?php echo e($championship->event_end); ?>"
                    class="form-control input-datepicker"
                    placeholder="Akhir Kejuaraan" />
            </div>
        </div>
    </div>

	
    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mb-0">
                <label class="mb-0" for="price">Biaya</label>
                <input required="required" type="number" name="price" value="<?php echo e($championship->price); ?>"
                    class="form-control"
                    placeholder="Biaya" />
            </div>
        </div>
    </div>

	
    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mb-0">
                <label class="mb-0" for="description">Deskripsi Kejuaraan</label>
                <textarea name="description"
                    class="form-control summernote"
                    placeholder="Konten Kejuaraan" rows="20"><?php echo e($championship->description); ?></textarea>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mb-0">
                <label class="mb-0" for="meta_title">Status</label>
				<select class="form-control form-select select-custom form-select-sm" name="status">						
				  <option value="active" <?php if($championship->status == "active"): echo 'selected'; endif; ?>>Active</option>
				  <option value="not active" <?php if($championship->status == "not active"): echo 'selected'; endif; ?>>Not Active</option>
				</select>
            </div>
        </div>
    </div>
	
    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12">
			<div class="form-group">
			  <label class="custom-file mb-0" for="input-file">Gambar</label>
			  <input type="file" id="input-file" name="image" class="form-control-file" placeholder="Upload Gambar" />
			  <small id="fileHelpId" class="form-text text-muted">Format File : .jpg , .png</small>
			</div>
        </div>
		<div class="col-sm-12 p-1">
			<?php if(!empty($championship->image)): ?>
				<img src="<?php echo e(asset(Storage::url($championship->image))); ?>" class="img img-thumbnail"/>
			<?php endif; ?>
		</div>
    </div>

    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mb-0">
                <label class="mb-0" for="meta_title">Meta Title</label>
                <input required="required" type="text" name="meta_title" value="<?php echo e($championship->meta_title); ?>"
                    class="form-control"
                    placeholder="Meta Title" />
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mb-0">
                <label class="mb-0" for="meta_keywords">Meta Keywords</label>
                <input required="required" type="text" name="meta_keywords" value="<?php echo e($championship->meta_keywords); ?>"
                    class="form-control"
                    placeholder="Meta Keywords" />
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mb-0">
                <label class="mb-0" for="meta_description">Meta Description</label>
                <textarea name="meta_description" class="form-control"
                    placeholder="Meta Description" rows="5"><?php echo e($championship->meta_description); ?></textarea>
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
</script><?php /**PATH C:\wamp\www\taebo\Modules/Championship\resources/views/admin/championship/form-edit.blade.php ENDPATH**/ ?>