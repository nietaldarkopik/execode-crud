<form action="{{ route('admin.psuperki.deletePerki', ['id' => $id, 'jenis_perkim' => $jenis_perkim]) }}" method="post">
	@csrf
	@method('delete')
    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
        <a href="{{ route('admin.psuperki.showPerki', ['id' => $id, 'jenis_perkim' => $jenis_perkim]) }}" role="button" class="btn btn-primary btn-sm" data-tooltip="tooltip" data-toggle="modal" data-target="#modalLgId" data-backdrop="static" data-keyboard="false" data-modal-title="Detail PSU" data-title="Lihat Detail PSU" title="Lihat Detail PSU">
            <i class="fa fa-search" aria-hidden="true"></i>
        </a>
        <a href="{{ route('admin.psuperki.editPerki', ['id' => $id, 'jenis_perkim' => $jenis_perkim]) }}" role="button" class="btn btn-warning btn-sm" data-tooltip="tooltip" data-toggle="modal" data-target="#modalLgId" data-backdrop="static" data-keyboard="false" data-modal-title="Edit Data" data-title="Edit Data" title="Edit Data">
            <i class="fas fa-edit" aria-hidden="true"></i>
        </a>
        {{-- <a href="{{ route('admin.psuperki.psu', $id) }}" role="button" class="btn btn-warning btn-sm" data-tooltip="tooltip" data-toggle="modal" data-target="#modalLgId" data-modal-size="modal-xl" data-backdrop="static" data-keyboard="false" data-modal-title="Data PSU" data-title="Input PSU" title="Input PSU">
            <i class="fas fa-building" aria-hidden="true"></i>
        </a>
        <a href="{{ route('admin.psuperki.document', $id) }}" role="button" class="btn btn-warning btn-sm" data-tooltip="tooltip" data-toggle="modal" data-target="#modalLgId" data-modal-size="modal-xl" data-backdrop="static" data-keyboard="false" data-modal-title="Peta" data-title="Upload Document" title="Upload Document">
            <i class="fas fa-file-archive" aria-hidden="true"></i>
        </a> --}}
        {{-- <a href="{{ route('admin.psuperki.formUploadPeta', $id) }}" role="button" class="btn btn-warning btn-sm" data-tooltip="tooltip" data-toggle="modal" data-target="#modalLgId" data-modal-size="modal-xl" data-backdrop="static" data-keyboard="false" data-modal-title="Peta" data-title="Upload Peta" title="Upload Peta">
            <i class="fa fa-map" aria-hidden="true"></i>
        </a> --}}
        <button type="submit" role="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');" data-tooltip="tooltip" data-modal-title="Hapus Data" data-title="Hapus Data" title="Hapus Data">
            <i class="fas fa-trash"></i>
        </button>
    </div>
    {{-- <div class="btn-group mt-1" role="group" aria-label="Basic checkbox toggle button group">
        <a href="{{ route('admin.psuperki.psuDetail', $id) }}" role="button" class="btn btn-primary btn-sm" data-tooltip="tooltip" data-toggle="modal" data-target="#modalLgId" data-backdrop="static" data-keyboard="false" data-modal-title="Detail PSU" data-title="Lihat Detail PSU" title="Lihat Detail PSU">
            <i class="fa fa-home" aria-hidden="true"></i>
        </a>
        <a href="{{ route('admin.psuperki.peta', $id) }}" role="button" class="btn btn-primary btn-sm" data-tooltip="tooltip" data-toggle="modal" data-target="#modalLgId" data-modal-size="modal-xl" data-backdrop="static" data-keyboard="false" data-modal-title="Peta" data-title="Lihat Peta" title="Lihat Peta">
            <i class="fas fa-map-marker" aria-hidden="true"></i>
        </a>
        <a href="{{ route('admin.psuperki.show', $id) }}" role="button" class="btn btn-primary btn-sm" data-tooltip="tooltip" data-toggle="modal" data-target="#modalLgId" data-backdrop="static" data-keyboard="false" data-modal-title="Lihat Data" data-title="Lihat Data" title="Lihat Data Permukiman">
            <i class="fas fa-eye" aria-hidden="true"></i>
        </a>
        <a href="{{ route('admin.psuperki.print', $id) }}" target="_blank" role="button" class="btn btn-primary btn-sm" data-tooltip="tooltip" data-modal-title="Print" data-title="Print" title="Print">
            <i class="fas fa-print" aria-hidden="true"></i>
        </a>
        <a href="{{ route('admin.psuperki.pdf', $id) }}" target="_blank" role="button" class="btn btn-primary btn-sm" data-tooltip="tooltip" data-modal-title="PDF" data-title="PDF" title="PDF">
            <i class="fas fa-file-pdf" aria-hidden="true"></i>
        </a>
    </div> --}}
</form>
