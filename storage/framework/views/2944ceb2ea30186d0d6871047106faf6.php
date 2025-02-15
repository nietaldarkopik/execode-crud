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

<form action="<?php echo e(route('admin.halaman.store')); ?>" method="POST" enctype="multipart/form-data">
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
                <label class="mb-0" for="name">URL Halaman</label>
                <input type="text" required="required" class="form-control" name="slug" id="name"
                    aria-describedby="namaHelpId" placeholder="URL Halaman">
                <small class="form-text text-muted response-check-slug"></small>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mb-0">
                <label class="mb-0" for="description">Konten Halaman</label>
                <textarea name="description"
                    class="form-control text-italic rounded-0 form-control-sm summernote"
                    placeholder="Konten Halaman" rows="20"></textarea>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mb-0">
                <label class="mb-0" for="template">Template</label>
                <select class="form-control form-select form-control-sm select-custom" name="template">
                    <option value="beranda">Beranda</option>
                    <option value="page-detail">Page Detail</option>
                    <option value="form-registrasi">Form Registrasi</option>
                    <option value="image-gallery">Image Gallery</option>
                    <option value="jadwal-ujikom">Jadwal Ujikom</option>
                    <option value="download-form">Download Form</option>
                    <option value="ujikom-detail">Detail Ujikom</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mb-0">
                <label class="mb-0" for="meta_title">Meta Title</label>
                <input required="required" type="text" name="meta_title" value=""
                    class="form-control text-italic rounded-0 form-control-sm"
                    placeholder="Meta Title" />
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mb-0">
                <label class="mb-0" for="meta_keywords">Meta Keywords</label>
                <input required="required" type="text" name="meta_keywords" value=""
                    class="form-control text-italic rounded-0 form-control-sm"
                    placeholder="Meta Keywords" />
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mb-0">
                <label class="mb-0" for="meta_description">Meta Description</label>
                <textarea name="meta_description" class="form-control text-italic rounded-0 form-control-sm"
                    placeholder="Konten Halaman" rows="5"></textarea>
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
<?php /**PATH C:\wamp\www\basooki.com\resources\views/vendor/adminlte/halamans/form-create.blade.php ENDPATH**/ ?>