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

<form action="{{ route('admin.member_type.update', ['member_type' => $member_type]) }}" method="POST" enctype="multipart/form-data">
    @csrf
	@method('patch')
	
    <div class="row mb-2">
        <div class="col-xs-12 col-sm-12 ">
            <div class="form-group">
                <label class="mb-0" for="title">{{-- <i class="fas fa-user fa-sm fa-fw"></i> --}}Judul</label>
                <input type="text" required="required" class="form-control" name="title" id="title" value="{{ $member_type->title }}"
                    aria-describedby="namaHelpId" placeholder="Judul">
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