    <div class="btn-group mt-1" role="group" aria-label="Basic checkbox toggle button group">
		<a href="{{ route('front.perumahan.detail', $id) }}" target="_blank" role="button" class="btn btn-primary btn-sm" data-tooltip="tooltip" data-toggle="modal" data-target="#modalLgId" data-backdrop="static" data-keyboard="false" data-modal-title="Detail PSU" data-title="Lihat Detail PSU" title="Lihat Detail Perumahan">
			<i class="fa fa-home" aria-hidden="true"></i>
		</a>
        <a href="{{ route('front.perumahan.peta', $id) }}" target="_blank" role="button" class="btn btn-primary btn-sm" data-tooltip="tooltip" data-toggle="modal" data-target="#modalLgId" data-modal-size="modal-xl" data-backdrop="static" data-keyboard="false" data-modal-title="Peta" data-title="Lihat Peta" title="Lihat Peta">
            <i class="fas fa-map-marker" aria-hidden="true"></i>
        </a>
        <a href="{{ route('front.perumahan.print', $id) }}" target="_blank" role="button" class="btn btn-primary btn-sm" data-tooltip="tooltip" data-modal-title="Print" data-title="Print" title="Print">
            <i class="fas fa-print" aria-hidden="true"></i>
        </a>
        <a href="{{ route('front.perumahan.pdf', $id) }}" target="_blank" role="button" class="btn btn-primary btn-sm" data-tooltip="tooltip" data-modal-title="PDF" data-title="PDF" title="PDF">
            <i class="fas fa-file-pdf" aria-hidden="true"></i>
        </a>
    </div>