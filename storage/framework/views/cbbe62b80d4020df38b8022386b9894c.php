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

<form action="<?php echo e(route('admin.championship.store')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>


    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12 ">
            <div class="form-group">
                <label class="mb-0" for="name">Judul</label>
                <input type="text" required="required" class="form-control" name="title" id="name"
                    aria-describedby="namaHelpId" placeholder="Judul">
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12 ">
            <div class="form-group">
                <label class="mb-0" for="name">URL Kejuaraan</label>
                <input type="text" required="required" class="form-control" name="slug" id="name"
                    aria-describedby="namaHelpId" placeholder="URL Kejuaraan">
                <small class="form-text text-muted response-check-slug"></small>
            </div>
        </div>
    </div>
	
    <div class="row mb-2">
        <div class="col-xs-6 col-sm-6">
            <div class="form-group mb-0">
                <label class="mb-0" for="organizer">Penyelenggara</label>
                <input required="required" type="text" name="organizer" value=""
                    class="form-control"
                    placeholder="Penyelenggara" />
            </div>
        </div>
        <div class="col-xs-6 col-sm-6">
            <div class="form-group mb-0">
                <label class="mb-0" for="grade">Grade</label>
                <select required="required" type="text" name="grade" class="form-control">
					<option value="A">A</option>
					<option value="B">B</option>
					<option value="C">C</option>
				</select>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-xs-6 col-sm-6">
            <div class="form-group mb-0">
                <label class="mb-0" for="reg_open">Mulai Pendaftaran</label>
                <input required="required" type="text" name="reg_open" value=""
                    class="form-control input-datepicker"
                    placeholder="Mulai Pendaftaran" />
            </div>
        </div>
        <div class="col-xs-6 col-sm-6">
            <div class="form-group mb-0">
                <label class="mb-0" for="reg_close">Akhir Pendaftaran</label>
                <input required="required" type="text" name="reg_close" value=""
                    class="form-control input-datepicker"
                    placeholder="Akhir Pendaftaran" />
            </div>
        </div>
    </div>

	
    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mb-0">
                <label class="mb-0" for="place">Tempat</label>
                <input required="required" type="text" name="place" value=""
                    class="form-control"
                    placeholder="Tempat" />
            </div>
        </div>
    </div>

	
    <div class="row mb-2">
        <div class="col-xs-6 col-sm-6">
            <div class="form-group mb-0">
                <label class="mb-0" for="event_start">Mulai Kejuaraan</label>
                <input required="required" type="text" name="event_start" value=""
                    class="form-control input-datepicker"
                    placeholder="Mulai Kejuaraan" />
            </div>
		</div>
        <div class="col-xs-6 col-sm-6">
            <div class="form-group mb-0">
                <label class="mb-0" for="event_end">Akhir Kejuaraan</label>
                <input required="required" type="text" name="event_end" value=""
                    class="form-control input-datepicker"
                    placeholder="Akhir Kejuaraan" />
            </div>
        </div>
    </div>

	
    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mb-0">
                <label class="mb-0" for="price">Biaya</label>
                <input required="required" type="number" name="price" value=""
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
                    placeholder="Konten Kejuaraan" rows="20"></textarea>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mb-0">
                <label class="mb-0" for="meta_title">Status</label>
				<select class="form-control form-select select-custom form-select-sm" name="status">						
				  <option value="active">Active</option>
				  <option value="not active">Not Active</option>
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
    </div>

    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mb-0">
                <label class="mb-0" for="meta_title">Meta Title</label>
                <input required="required" type="text" name="meta_title" value=""
                    class="form-control"
                    placeholder="Meta Title" />
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mb-0">
                <label class="mb-0" for="meta_keywords">Meta Keywords</label>
                <input required="required" type="text" name="meta_keywords" value=""
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
                    placeholder="Meta Description" rows="5"></textarea>
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
                ['font', ['bold', 'italic', 'underline', 'clear', 'strikethrough', 'superscript',
                    'subscript'
                ]],
                ['fontsize', ['fontsize']],
                ['fontName', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph', 'height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video', 'hr']],
                ['view', ['fullscreen', 'codeview', 'help']],
                ['misc', ['undo', 'redo']]
            ],
            fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica', 'Impact',
                'Tahoma', 'Times New Roman', 'Verdana', 'Calibri', 'Gabriela', 'Roboto Condensed',
                'Poppins', 'Montserrat', 'Lato', 'Poppins Regular', 'Nunito'
            ],
            fontNamesIgnoreCheck: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica',
                'Impact', 'Tahoma', 'Times New Roman', 'Verdana', 'Calibri', 'Gabriela',
                'Roboto Condensed', 'Poppins', 'Montserrat', 'Lato', 'Poppins Regular', 'Nunito'
            ],
            fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '20', '22', '24', '28', '30',
                '36', '48', '64', '82', '150'
            ],
            height: 300,
            minHeight: null,
            maxHeight: null,
            focus: true,
            placeholder: 'Start typing here...',
            dialogsInBody: true,
            dialogsFade: true,
            codeviewFilter: false, // Disable code filtering in codeview
            codeviewIframeFilter: false // Disable iframe filtering
        });
    });
</script>
<?php /**PATH C:\wamp\www\taebo\Modules/Championship\resources/views/admin/championship/form-create.blade.php ENDPATH**/ ?>