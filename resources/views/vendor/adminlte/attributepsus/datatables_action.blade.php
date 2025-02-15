<form action="{{ route('admin.attributepsu.destroy', $id) }}" method="post" id="form-delete-data">
	@csrf
	@method('delete')
    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
        <a href="{{ route('admin.attributepsu.show', $id) }}" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalLgId" data-modal-title="Lihat Data">
            <i class="fa fa-eye" aria-hidden="true"></i>
        </a>
        <a href="{{ route('admin.attributepsu.edit', $id) }}" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalLgId" data-modal-title="Edit Data">
            <i class="fa fa-edit" aria-hidden="true"></i>
        </a>
        <button type="button" class="btn btn-danger btn-sm btn-delete-data">
            <i class="fas fa-trash"></i>
        </button>
    </div>
</form>
