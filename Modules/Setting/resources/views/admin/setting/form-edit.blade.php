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

<form action="{{ route('admin.setting.update', ['setting' => $setting]) }}" method="POST" enctype="multipart/form-data">
    @csrf
	@method('patch')
	

    <div class="row mb-1">
        <div class="col-xs-12 col-sm-12 border">
            <div class="row">
                <div class="col-sm-4 p-0 px-1 d-flex justify-content-start align-items-center">
                    <div class="form-group mb-0">
                        <label class="form-label">Setting Code</label>
                    </div>
                </div>
                <div class="col-sm-8">
                    <input required="required" type="text" name="code" value="{{ $setting->code }}" 
                        class="form-control border-dark border rounded-0 mt-1 text-italic border-type-dotted" placeholder="Setting Code" data-id="{{ $setting->id }}"/>
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
                    <input required="required" type="text" name="title" value="{{ $setting->title }}"
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
                        placeholder="Konten Setting" rows="20">{{ $setting->description }}</textarea>
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
						<option value="text" @selected($setting->type == "text")>Text</option>
						<option value="longtext" @selected($setting->type == "longtext")>Longtext</option>
						<option value="file" @selected($setting->type == "file")>File</option>
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
					@if(!empty($setting->value) && $setting->type == 'file')
						@php
							$ext = explode(".",$setting->value);
							$ext = $ext[count($ext) - 1];
						@endphp
						@if(in_array($ext,['jpg','jpeg','png','gif']))
							<img src="{{ asset(Storage::url($setting->value)) }}" class="img img-thumbnail"/>
						@else
							<a href="{{ asset(Storage::url($setting->value)) }}" target="_blank">View</a>
						@endif
					@else
						{{$setting->value}}
					@endif
				</div>
            </div>
            <div class="row input-value input-value-text d-none">
                <div class="col-sm-4 p-0 px-1 d-flex justify-content-start align-items-center">
                    <div class="form-group mb-0">
                        <label>Value</label>
                    </div>
                </div>
                <div class="col-sm-8">
					<input type="text" name="value" value="{{ $setting->value }}" class="form-control border-dark border py-0 text-italic rounded-0 " placeholder="Input Value" />
                </div>
            </div>
            <div class="row input-value input-value-longtext d-none">
                <div class="col-sm-4 p-0 px-1 d-flex justify-content-start align-items-center">
                    <div class="form-group mb-0">
                        <label>Value</label>
                    </div>
                </div>
                <div class="col-sm-8">
					<textarea name="value" class="form-control border-dark border py-0 text-italic rounded-0 " rows="3" placeholder="Input Value">{{ $setting->value }}</textarea>
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
						<option value="dynamic" @selected($setting->status == "dynamic")>Dynamic</option>
						<option value="fixed" @selected($setting->status == "fixed")>Fixed</option>
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
