@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.module_manager.store') }}" method="POST" enctype="multipart/form-data">
    @csrf


    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12 ">
            <div class="form-group">
                <label class="mb-0" for="name">{{-- <i class="fas fa-user fa-sm fa-fw"></i> --}}Judul</label>
                <input type="text" required="required" class="form-control" name="title" id="name"
                    aria-describedby="namaHelpId" placeholder="Judul">
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12 ">
            <div class="form-group">
                <label class="mb-0" for="name">{{-- <i class="fas fa-user fa-sm fa-fw"></i> --}}URL Module</label>
                <input type="text" required="required" class="form-control" name="slug" id="name"
                    aria-describedby="namaHelpId" placeholder="URL Module">
                <small class="form-text text-muted response-check-slug"></small>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mb-0">
                <label class="mb-0" for="description">Konten Module</label>
                <textarea name="description"
                    class="form-control text-italic rounded-0 form-control-sm summernote"
                    placeholder="Konten Module" rows="20"></textarea>
            </div>
        </div>
    </div>

    <div class="row mb-1">
        <div class="col-xs-12 col-sm-12 border">
            <div class="row">
                <div class="col-sm-4 p-0 bg-secondary text-white px-1 d-flex justify-content-start align-items-center">
                    <div class="form-group mb-0">
                        <span>Status</span>
                    </div>
                </div>
                <div class="col-sm-8 p-1">
					  <select class="form-control form-select select-custom form-select-sm" name="status">						
						<option value="active">Active</option>
						<option value="not active">Not Active</option>
					  </select>
					</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-1">
        <div class="col-xs-12 col-sm-12 border">
            <div class="row">
                <div class="col-sm-4 p-0 bg-secondary text-white px-1 d-flex justify-content-start align-items-center">
                    <div class="form-group mb-0">
                        <span>Gambar</span>
                    </div>
                </div>
                <div class="col-sm-8 p-1">
					<input type="file" name="image" class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm" placeholder="Upload Gambar" />
                </div>
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
                    placeholder="Konten Module" rows="5"></textarea>
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
