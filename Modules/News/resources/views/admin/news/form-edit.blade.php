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

<form action="{{ route('admin.news.update', ['news' => $news]) }}" method="POST" enctype="multipart/form-data">
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
                    <input required="required" type="text" name="title" value="{{ $news->title }}"
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
                        <span>URL Berita</span>
                    </div>
                </div>
                <div class="col-sm-8 p-1">
                    <input required="required" type="text" name="slug" value="{{ $news->slug }}" 
                        class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm"
                        placeholder="URL Berita" data-id="{{ $news->id}}"/>
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
                        <span>Konten Berita</span>
                    </div>
                </div>
                <div class="col-sm-12 p-1">
                    <textarea name="description"
                        class="form-control border-warning border py-0 text-italic rounded-0 form-control-sm summernote"
                        placeholder="Konten Berita" rows="20">{{ $news->description }}</textarea>
                </div>
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
						<option value="active"  @selected($news->template == "active")>Active</option>
						<option value="not active"  @selected($news->template == "not active")>Not Active</option>
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
				<div class="col-sm-12 p-1">
					@if(!empty($news->image))
						<img src="{{ asset(Storage::url($news->image)) }}" class="img img-thumbnail"/>
					@endif
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
                    <input required="required" type="text" name="meta_title" value="{{ $news->meta_title }}"
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
                    <input required="required" type="text" name="meta_keywords" value="{{ $news->meta_keywords }}"
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
                        placeholder="Konten Berita" rows="5">{{ $news->meta_description }}</textarea>
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