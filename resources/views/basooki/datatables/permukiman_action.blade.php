    <div class="btn-group mt-1" role="group" aria-label="Basic checkbox toggle button group">
        <a href="{{ route('front.permukiman.detail', $id) }}" role="button" class="button border btn btn-primary btn-circle btn-icon btn-sm" 
		data-tooltip="tooltip" 
		data-toggle="modal" 
		data-target="#modalLgId" 
		data-backdrop="static" 
		data-keyboard="false" 
		data-modal-title="Detail PSU" 
		data-title="Lihat Detail PSU" title="Lihat Detail Permukiman">
            <i class="fa fa-home" aria-hidden="true"></i>
        </a>
        <a href="{{ route('front.permukiman.peta', $id) }}" role="button" class="button border btn btn-primary btn-circle btn-icon btn-sm" 
		data-tooltip="tooltip" 
		data-toggle="modal" 
		data-target="#modalLgId" 
		data-modal-size="modal-xl" 
		data-backdrop="static" 
		data-keyboard="false" 
		data-modal-title="Peta" 
		data-title="Lihat Peta" title="Lihat Peta">
            <i class="fa fa-map-marker" aria-hidden="true"></i>
        </a>
        <a href="{{ route('front.permukiman.psuDetail', $id) }}" role="button" class="button border btn btn-primary btn-circle btn-icon btn-sm" 
		data-tooltip="tooltip" 
		data-toggle="modal"
		data-target="#modalPsuDetail" 
		data-backdrop="static" 
		data-keyboard="false" 
		data-modal-title="Detail PSU" 
		data-title="Lihat Detail PSU" title="Lihat Detail PSU">
			<i class="fa fa-photo" aria-hidden="true"></i>
        </a>
		<a href="{{ route('front.permukiman.pdf', $id) }}" role="button" class="button border btn btn-primary btn-circle btn-icon btn-sm" 
		data-tooltip="tooltip" 
		data-modal-title="PDF" 
		data-title="PDF" title="PDF">
			<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
		</a>
        {{-- <a href="{{ route('front.permukiman.print', $id) }}" role="button" class="button border btn btn-primary btn-circle btn-icon btn-sm" 
		data-tooltip="tooltip" 
		data-modal-title="Print" 
		data-title="Print" title="Print">
            <i class="fa fa-print" aria-hidden="true"></i>
        </a> --}}
    </div>