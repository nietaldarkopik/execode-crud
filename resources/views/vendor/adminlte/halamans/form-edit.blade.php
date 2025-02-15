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

<form action="{{ route('admin.halaman.update', ['halaman' => $halaman]) }}" method="POST" enctype="multipart/form-data">
    @csrf
	@method('patch')
	
    <div class="row mb-1">
        <div class="col-xs-12 col-sm-12 border">
            <div class="row">
                <div class="col-sm-4 p-0 bg-secondary text-white px-1 d-flex justify-content-start align-items-center">
                    <div class="form-group mb-0">
                        <span>Judul</span>
                    </div>
                </div>
                <div class="col-sm-8 p-1">
                    <input required="required" type="text" name="title" value="{{ $halaman->title }}"
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
                        <span>URL Halaman</span>
                    </div>
                </div>
                <div class="col-sm-8 p-1">
                    <input required="required" type="text" name="slug" value="{{ $halaman->slug }}" 
                        class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                        placeholder="URL Halaman" data-id="{{ $halaman->id}}"/>
					<small class="form-text text-muted response-check-slug"></small>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-1">
        <div class="col-xs-12 col-sm-12 border">
            <div class="row">
                <div class="col-sm-12 p-0 bg-secondary text-white px-1 d-flex justify-content-start align-items-center">
                    <div class="form-group mb-0">
                        <span>Konten Halaman</span>
                    </div>
                </div>
                <div class="col-sm-12 p-1">
                    <textarea name="description"
                        class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm summernote"
                        placeholder="Konten Halaman" rows="20">{{ $halaman->description }}</textarea>
                </div>
            </div>
        </div>
    </div>
	
    <div class="row mb-1">
        <div class="col-xs-12 col-sm-12 border">
            <div class="row">
                <div class="col-sm-4 p-0 bg-secondary text-white px-1 d-flex justify-content-start align-items-center">
                    <div class="form-group mb-0">
                        <span>Template</span>
                    </div>
                </div>
                <div class="col-sm-8 p-1">
					  <select class="form-control form-select select-custom form-select-sm" name="template">						
						<option value="beranda"  @selected($halaman->template == "beranda")>Beranda</option>
						<option value="page-detail"  @selected($halaman->template == "page-detail")>Page Detail</option>
						<option value="form-registrasi"  @selected($halaman->template == "form-registrasi")>Form Registrasi</option>
						<option value="image-gallery"  @selected($halaman->template == "image-gallery")>Image Gallery</option>
						<option value="jadwal-ujikom"  @selected($halaman->template == "jadwal-ujikom")>Jadwal Ujikom</option>
						<option value="download-form"  @selected($halaman->template == "download-form")>Download Form</option>
						<option value="ujikom-detail"  @selected($halaman->template == "ujikom-detail")>Detail Ujikom</option>
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
                        <span>Meta Title</span>
                    </div>
                </div>
                <div class="col-sm-8 p-1">
                    <input required="required" type="text" name="meta_title" value="{{ $halaman->meta_title }}"
                        class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                        placeholder="Meta Title" />
                </div>
            </div>
        </div>
    </div>
	
    <div class="row mb-1">
        <div class="col-xs-12 col-sm-12 border">
            <div class="row">
                <div class="col-sm-4 p-0 bg-secondary text-white px-1 d-flex justify-content-start align-items-center">
                    <div class="form-group mb-0">
                        <span>Meta Keywords</span>
                    </div>
                </div>
                <div class="col-sm-8 p-1">
                    <input required="required" type="text" name="meta_keywords" value="{{ $halaman->meta_keywords }}"
                        class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                        placeholder="Meta Keywords" />
                </div>
            </div>
        </div>
    </div>
	
    <div class="row mb-1">
        <div class="col-xs-12 col-sm-12 border">
            <div class="row">
                <div class="col-sm-4 p-0 bg-secondary text-white px-1 d-flex justify-content-start align-items-center">
                    <div class="form-group mb-0">
                        <span>Meta Description</span>
                    </div>
                </div>
                <div class="col-sm-8 p-1">
                    <textarea name="meta_description"
                        class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                        placeholder="Konten Halaman" rows="5">{{ $halaman->meta_description }}</textarea>
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
	$(document).ready(function() {
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
</script>