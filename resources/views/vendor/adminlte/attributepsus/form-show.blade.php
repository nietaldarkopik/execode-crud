	<div class="row">
        <div class="col-sm-12 mb-3">
            <div class="row">
                <strong class="col-sm-4">Kategori PSU:</strong>
				<div class="col-sm-8">{{ App\Models\KategoriPsuModel::where('id',$attributepsu->id_kategori)->first()?->title ?? ''}}</div>
            </div>
        </div>

        <div class="col-sm-12 mb-3">
            <div class="row">
                <strong class="col-sm-4">Jenis PSU:</strong>
				<div class="col-sm-8">{{ App\Models\JenisPsuModel::where('id',$attributepsu->id_jenis_psu)->first()?->title ?? ''}}</div>
            </div>
        </div>

        <div class="col-sm-12 mb-3">
            <div class="row">
                <strong class="col-sm-4">PSU:</strong>
				<div class="col-sm-8">{{ App\Models\PsuModel::where('id',$attributepsu->id_psu)->first()?->judul ?? ''}}</div>
            </div>
        </div>

        <div class="col-sm-12 mb-3">
            <div class="row">
                <strong class="col-sm-4">Nama Attribut:</strong>
                <div class="col-sm-8">{{ $attributepsu->attribute }}</div>
            </div>
        </div>

        <div class="col-sm-12 mb-3">
            <div class="row">
                <strong class="col-sm-4">Opsi Pilihan:</strong>
				<div class="col-sm-8">{{ $attributepsu->options }}</div>
            </div>
        </div>

        <div class="col-sm-12 mb-3">
            <div class="row">
                <strong class="col-sm-4">Keterangan:</strong>
                <div class="col-sm-8">{{ $attributepsu->keterangan }}</div>
            </div>
        </div>
    </div>
