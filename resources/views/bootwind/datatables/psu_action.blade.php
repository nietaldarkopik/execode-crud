    <div class="btn-group mt-1" role="group" aria-label="Basic checkbox toggle button group">
		<a href="{{ route('front.psu.detail', [$id, $jenis_perkim ?? 'perumahan']) }}" role="button" class="button border btn btn-primary btn-circle btn-icon btn-sm btn-show-psu" 
			data-tooltip="tooltip" 
			data-toggle="modal"
			data-target="#modalPsuDetail" 
			data-backdrop="static" 
			data-keyboard="false" 
			data-modal-title="Detail PSU" 
			data-title="Lihat Detail PSU">
			<i class="fa fa-home" aria-hidden="true"></i>
        </a>
		<a href="{{ route('front.psu.peta', [$id, $jenis_perkim ?? 'perumahan']) }}" role="button" class="button border btn btn-primary btn-circle btn-icon btn-sm btn-show-peta" 
			data-tooltip="tooltip" 
			data-toggle="modal" 
			data-target="#modalPsuDetail" 
			data-modal-size="modal-xl" 
			data-backdrop="static" 
			data-keyboard="false" 
			data-modal-title="Peta" 
			data-title="Lihat Peta" title="Lihat Peta">
			<i class="fa fa-map-marker" aria-hidden="true"></i>
		</a>
		<a href="{{ route('front.psu.pdf', [$id, $jenis_perkim ?? 'perumahan']) }}" role="button" class="button border btn btn-primary btn-circle btn-icon btn-sm" 
			data-tooltip="tooltip" 
			data-modal-title="PDF" 
			data-title="PDF" title="PDF">
			<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
		</a>
		
        {{-- <a href="{{ route('front.psu.print', [$id, $jenis_perkim ?? 'perumahan']) }}" role="button" class="button border btn btn-primary btn-circle btn-icon btn-sm" data-tooltip="tooltip" data-modal-title="Print" data-title="Print" title="Print">
            <i class="fas fa-print" aria-hidden="true"></i>
        </a> --}}
    </div>