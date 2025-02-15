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

<form action="{{ route('admin.member.update', ['member' => $member]) }}" method="POST" enctype="multipart/form-data">
    @csrf
	@method('patch')	
	
    <div class="row mb-2">
        <div class="col-xs-6 col-sm-6 ">
            <div class="form-group">
                <label class="mb-0" for="nama">Nama</label>
                <input type="text" value="{{ $member->nama }}" required="required" class="form-control" name="nama" id="nama" aria-describedby="namaHelpId" placeholder="Nama">
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 ">
            <div class="form-group">
                <label class="mb-0" for="id_member_type">Jenis Member</label>
				<select class="form-control form-select select-custom form-select-sm" name="id_member_type">
				  <option value="0">Pilih Jenis Member ...</option>
				  @foreach(Modules\Member\App\Models\MemberTypeModel::all() as $i => $memberType)
				  <option value="{{ $memberType->id }}" @selected( $memberType->id == $member->id_member_type)>{{ $memberType->title }}</option>
				  @endforeach
				</select>
            </div>
        </div>
    </div>
	
    <div class="row mb-2">
        <div class="col-xs-6 col-sm-6 ">
            <div class="form-group">
                <label class="mb-0" for="tempat_lahir">Tempat Lahir</label>
                <input type="text" value="{{ $member->tempat_lahir }}" required="required" class="form-control" name="tempat_lahir" id="tempat_lahir" aria-describedby="namaHelpId" placeholder="Tempat Lahir">
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 ">
            <div class="form-group">
                <label class="mb-0" for="tanggal_lahir">Tanggal Lahir</label>
                <input type="text" value="{{ $member->tanggal_lahir }}" required="required" class="form-control input-datepicker" name="tanggal_lahir" id="tanggal_lahir" aria-describedby="namaHelpId" placeholder="Tanggal Lahir">
            </div>
        </div>
    </div>
	
    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12 ">
            <div class="form-group">
                <label class="mb-0" for="alamat">Alamat</label>
                <input type="text" value="{{ $member->alamat }}" required="required" class="form-control" name="alamat" id="alamat" aria-describedby="namaHelpId" placeholder="Alamat">
            </div>
        </div>
    </div>
	
    <div class="row mb-2">
        <div class="col-xs-6 col-sm-6 ">
            <div class="form-group">
                <label class="mb-0" for="id_geup">Geup</label>
				<select class="form-control form-select select-custom form-select-sm" name="id_geup">						
				  <option value="active">Pilih Geup ...</option>
				  @foreach(Modules\Member\App\Models\GeupModel::all() as $i => $geup)
				  <option value="{{ $geup->id }}" @selected( $geup->id == $member->id_geup)>{{ $geup->title }}</option>
				  @endforeach
				</select>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 ">
            <div class="form-group">
                <label class="mb-0" for="no_reg">No Reg</label>
                <input type="text" value="{{ $member->no_reg }}" required="required" class="form-control" name="no_reg" id="no_reg" aria-describedby="namaHelpId" placeholder="No Reg">
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
			@if(!empty($member->photo))
				<img src="{{ asset(Storage::url($member->photo)) }}" class="img img-thumbnail"/>
			@endif
		</div>
    </div>
	
    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12 ">
            <div class="form-group">
                <label class="mb-0" for="id_user">User</label>
				<select class="form-control form-select select-custom form-select-sm" name="id_user">						
				  <option value="0">Tanpa User ...</option>
				  <option value="--new--">Buat User ...</option>
				  @foreach(App\Models\User::all() as $i => $user)
				  <option value="{{ $user->id }}" @selected($user->id == $member->id_user)>{{ $user->name }}</option>
				  @endforeach
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
</script>