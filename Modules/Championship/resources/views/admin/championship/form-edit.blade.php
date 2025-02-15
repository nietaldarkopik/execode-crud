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

<form action="{{ route('admin.championship.update', ['championship' => $championship]) }}" method="POST" enctype="multipart/form-data">
    @csrf
	@method('patch')
	
    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12 ">
            <div class="form-group">
                <label class="mb-0" for="title">{{-- <i class="fas fa-user fa-sm fa-fw"></i> --}}Judul</label>
                <input type="text" required="required" class="form-control" name="title" id="title" value="{{ $championship->title }}"
                    aria-describedby="namaHelpId" placeholder="Judul">
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12 ">
            <div class="form-group">
                <label class="mb-0" for="slug">{{-- <i class="fas fa-user fa-sm fa-fw"></i> --}}URL Kejuaraan</label>
                <input type="text" required="required" class="form-control" name="slug" id="slug" value="{{ $championship->slug }}" aria-describedby="namaHelpId" placeholder="URL Kejuaraan">
                <small class="form-text text-muted response-check-slug"></small>
            </div>
        </div>
    </div>
	
    <div class="row mb-2">
        <div class="col-xs-6 col-sm-6">
            <div class="form-group mb-0">
                <label class="mb-0" for="organizer">Penyelenggara</label>
                <input required="required" type="text" name="organizer" value="{{ $championship->organizer }}"
                    class="form-control"
                    placeholder="Penyelenggara" />
            </div>
        </div>
        <div class="col-xs-6 col-sm-6">
            <div class="form-group mb-0">
                <label class="mb-0" for="grade">Grade</label>
                <select required="required" type="text" name="grade" class="form-control">
					<option value="A" @selected($championship->grade == "A")>A</option>
					<option value="B" @selected($championship->grade == "B")>B</option>
					<option value="C" @selected($championship->grade == "C")>C</option>
				</select>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-xs-6 col-sm-6">
            <div class="form-group mb-0">
                <label class="mb-0" for="reg_open">Mulai Pendaftaran</label>
                <input required="required" type="text" name="reg_open" value="{{ $championship->reg_open }}"
                    class="form-control input-datepicker"
                    placeholder="Mulai Pendaftaran" />
            </div>
        </div>
        <div class="col-xs-6 col-sm-6">
            <div class="form-group mb-0">
                <label class="mb-0" for="reg_close">Akhir Pendaftaran</label>
                <input required="required" type="text" name="reg_close" value="{{ $championship->reg_close }}"
                    class="form-control input-datepicker"
                    placeholder="Akhir Pendaftaran" />
            </div>
        </div>
    </div>

	
    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mb-0">
                <label class="mb-0" for="place">Tempat</label>
                <input required="required" type="text" name="place" value="{{ $championship->place }}"
                    class="form-control"
                    placeholder="Tempat" />
            </div>
        </div>
    </div>

	
    <div class="row mb-2">
        <div class="col-xs-6 col-sm-6">
            <div class="form-group mb-0">
                <label class="mb-0" for="event_start">Mulai Kejuaraan</label>
                <input required="required" type="text" name="event_start" value="{{ $championship->event_start }}"
                    class="form-control input-datepicker"
                    placeholder="Mulai Kejuaraan" />
            </div>
		</div>
        <div class="col-xs-6 col-sm-6">
            <div class="form-group mb-0">
                <label class="mb-0" for="event_end">Akhir Kejuaraan</label>
                <input required="required" type="text" name="event_end" value="{{ $championship->event_end }}"
                    class="form-control input-datepicker"
                    placeholder="Akhir Kejuaraan" />
            </div>
        </div>
    </div>

	
    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mb-0">
                <label class="mb-0" for="price">Biaya</label>
                <input required="required" type="number" name="price" value="{{ $championship->price }}"
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
                    placeholder="Konten Kejuaraan" rows="20">{{ $championship->description }}</textarea>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mb-0">
                <label class="mb-0" for="meta_title">Status</label>
				<select class="form-control form-select select-custom form-select-sm" name="status">						
				  <option value="active" @selected($championship->status == "active")>Active</option>
				  <option value="not active" @selected($championship->status == "not active")>Not Active</option>
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
			@if(!empty($championship->image))
				<img src="{{ asset(Storage::url($championship->image)) }}" class="img img-thumbnail"/>
			@endif
		</div>
    </div>

    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mb-0">
                <label class="mb-0" for="meta_title">Meta Title</label>
                <input required="required" type="text" name="meta_title" value="{{ $championship->meta_title }}"
                    class="form-control"
                    placeholder="Meta Title" />
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group mb-0">
                <label class="mb-0" for="meta_keywords">Meta Keywords</label>
                <input required="required" type="text" name="meta_keywords" value="{{ $championship->meta_keywords }}"
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
                    placeholder="Meta Description" rows="5">{{ $championship->meta_description }}</textarea>
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
</script>