<style>
    {{ $css }}
</style>
<div class="container-fluid">
    <strong>Data Perumahan</strong>
    <table class="table table-sm table-bordered table-stripped">
        <tr>
            <td>
                Nama Perumahan
            </td>
            <td>
                : {{ $perumahan?->nama_perumahan }}
            </td>
        </tr>
        <tr>
            <td>
                Kabupaten / Kota
            </td>
            <td>
                :
                {{ App\Models\KabupatenKotaModel::where('province_id', 63)->where('id', '=', $perumahan->kabkota_id)->get()->first()?->name }}
            </td>
        </tr>
        <tr>
            <td>
                Kecamatan
            </td>
            <td>
                :
                {{ App\Models\KecamatanModel::whereHas('getKabupatenKota', function ($query) {$query->where('province_id', 63);})->where('id', '=', $perumahan->kecamatan_id)->get()->first()?->name }}
            </td>
        </tr>
        <tr>
            <td>
                Kelurahan
            </td>
            <td>
                : {{ App\Models\KelurahanModel::where('id', '=', $perumahan->kelurahan_id)->get()->first()?->name }}
            </td>
        </tr>
        <tr>
            <td>
                Alamat
            </td>
            <td>
                : {{ $perumahan?->alamat }}
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <strong>Data Pengembang</strong>
            </td>
        </tr>
        <tr>
            <td>
                Nama Pengembang
            </td>
            <td>
                : {{ $perumahan?->nama_pengembang }}
            </td>
        </tr>
        <tr>
            <td>
                Telepon Pengembang
            </td>
            <td>
                : {{ $perumahan?->telepon_pengembang }}
            </td>
        </tr>
        <tr>
            <td>
                Email Pengembang
            </td>
            <td>
                : {{ $perumahan?->email_pengembang }}
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <strong>Detail Perumahan</strong>
            </td>
        </tr>
        <tr>
            <td>
                Luas
            </td>
            <td>
                : {{ $perumahan?->luas }}
            </td>
        </tr>
        <tr>
            <td>
                Tahun Siteplan
            </td>
            <td>
                : {{ $perumahan?->tahun_siteplan }}
            </td>
        </tr>
        <tr>
            <td>
                Latitude
            </td>
            <td>
                : {{ $perumahan?->latitude }}
            </td>
        </tr>
        <tr>
            <td>
                Longitude
            </td>
            <td>
                : {{ $perumahan?->longitude }}
            </td>
        </tr>
        <tr>
            <td>
                No Bast
            </td>
            <td>
                : {{ $perumahan?->no_bast }}
            </td>
        </tr>
        <tr>
            <td>
                File Bast
            </td>
            <td>
                @php
                    if (
                        !empty($perumahan->file_bast) &&
                        file_exists(storage_path('app/public/' . $perumahan->file_bast))
                    ) {
                        $imageInfo = getimagesize(storage_path('app/public/' . $perumahan->file_bast));
                        if ($imageInfo !== false) {
                            echo '<img src="' . asset(Storage::url($perumahan->file_bast)) . '" class="img-fluid">';
                        } else {
                            echo '<a href="' .
                                asset(Storage::url($perumahan->file_bast)) .
                                '" class="btn btn-sm btn-primary"><i class="fa fa-download" aria-hidden="true"></i> Lihat File</a>';
                        }
                    } else {
                        echo '<span class="alert alert-warning alert-sm m-0 d-block py-1 px-2">File tidak tersedia';
                    }
                @endphp
            </td>
        </tr>
        <tr>
            <td>
                Photo
            </td>
            <td>
                @php
                    if (!empty($perumahan->photo) && file_exists(storage_path('app/public/' . $perumahan->photo))) {
                        $imageInfo = getimagesize(storage_path('app/public/' . $perumahan->photo));
                        if ($imageInfo !== false) {
                            echo '<img src="' . asset(Storage::url($perumahan->photo)) . '" class="img-fluid">';
                        } else {
                            echo '<a href="' .
                                asset(Storage::url($perumahan->photo)) .
                                '" class="btn btn-sm btn-primary"><i class="fa fa-download" aria-hidden="true"></i> Lihat File</a>';
                        }
                    } else {
                        echo '<span class="alert alert-warning alert-sm m-0 d-block py-1 px-2">File tidak tersedia';
                    }
                @endphp
            </td>
        </tr>
        <tr>
            <td>
                Siteplan
            </td>
            <td>
                @php
                    if (
                        !empty($perumahan->siteplan) &&
                        file_exists(storage_path('app/public/' . $perumahan->siteplan))
                    ) {
                        $imageInfo = getimagesize(storage_path('app/public/' . $perumahan->siteplan));
                        if ($imageInfo !== false) {
                            echo '<img src="' . asset(Storage::url($perumahan->siteplan)) . '" class="img-fluid">';
                        } else {
                            echo '<a href="' .
                                asset(Storage::url($perumahan->siteplan)) .
                                '" class="btn btn-sm btn-primary"><i class="fa fa-download" aria-hidden="true"></i> Lihat File</a>';
                        }
                    } else {
                        echo '<span class="alert alert-warning alert-sm m-0 d-block py-1 px-2">File tidak tersedia';
                    }
                @endphp
            </td>
        </tr>
        <tr>
            <td>
                Jumlah MBR
            </td>
            <td>
                : {{ $perumahan?->jumlah_mbr }}
            </td>
        </tr>
        <tr>
            <td>
                Jumlah Non MBR
            </td>
            <td>
                : {{ $perumahan?->jumlah_nonmbr }}
            </td>
        </tr>
        <tr>
            <td>
                Total Unit
            </td>
            <td>
                : {{ $perumahan?->total_unit }}
            </td>
        </tr>
        <tr>
            <td>
                Sedang Proses
            </td>
            <td>
                : {{ $perumahan?->jumlah_proses }}
            </td>
        </tr>
        <tr>
            <td>
                Ditempati
            </td>
            <td>
                : {{ $perumahan?->jumlah_ditempati }}
            </td>
        </tr>
        <tr>
            <td>
                Kosong
            </td>
            <td>
                : {{ $perumahan?->jumlah_kosong }}
            </td>
        </tr>
        <tr>
            <td>
                Total Unit
            </td>
            <td>
                : {{ $perumahan?->total_unit }}
            </td>
        </tr>
    </table>
    <strong>Data PSU</strong>

    <table class="table table-sm table-borderless">
        @foreach (App\Models\JenisPsuModel::get() as $i => $jenis_psu)
            @if (App\Models\PsuPerumahanModel::where('id_jenis_psu', $jenis_psu->id)->where('id_perumahan', $perumahan->id)->get()->count() == 0)
                @continue
            @endif
            {{-- <tr>
                <td>
                    <strong>{{ $jenis_psu->title }}</strong>
                </td>
            </tr> --}}
            <tr>
                <td>
                    <table class="table table-sm table-bordered table-striped">
                        @foreach (App\Models\PsuPerumahanModel::where('id_jenis_psu', $jenis_psu->id)->where('id_perumahan', $perumahan->id)->get() as $ipsu => $psuPerumahan)
                            <tr><td colspan="2">{{ $jenis_psu->title }}</td></tr>
                            <tr>
                                <td width="30%">
                                    @if (!empty($psuPerumahan->photo))
                                        <img src="{{ asset(Storage::url($psuPerumahan->photo)) }}"
                                            class="img-fluid card-img-top object-fit-cover"
                                            style="width: 100%; height: 100%; object-fit: cover;"
                                            alt="{{ $psuPerumahan->nama_psu }}"
                                            title="{{ $psuPerumahan->nama_psu }}" />
                                    @else
                                        <span class="p-2 m-3 bg-warning d-block">Gambar Tidak Tersedia</span>
                                    @endif
                                </td>
                                <td>
                                    <table class="table table-sm table-bordered">
                                        <tr>
                                            <td>Nama PSU</td>
                                            <td>
                                                :
                                                {{ $psuPerumahan->nama_psu ?? '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>PSU </td>
                                            <td>
                                                @foreach (App\Models\PsuModel::where('jenis', $jenis_psu->id)->get() as $ijp => $p)
                                                    @if ($p->id == ($psuPerumahan->id_psu ?? ''))
                                                        :
                                                        {{ $p->judul }}
                                                    @endif
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Kondisi
                                            </td>
                                            <td>
                                                :
                                                {{ $psuPerumahan->kondisi }}

                                            </td>
                                        </tr>
                                        @php
                                            $attributes = \App\Models\PsuAttributeModel::where(function ($query) use (
                                                $psuPerumahan,
                                            ) {
                                                $query->where('id_psu', '=', $psuPerumahan->id_psu);
                                            })->get();
                                            $output = '';
                                            foreach ($attributes as $i => $a) {
                                                #DB::enableQueryLog();
                                                $value = \App\Models\PsuAttributePerumahanModel::where(function (
                                                    $query,
                                                ) use ($a, $psuPerumahan) {
                                                    $query->where('id_perumahan', '=', $psuPerumahan->id_perumahan);
                                                    $query->where('id_jenis_psu', '=', $psuPerumahan->id_jenis_psu);
                                                    $query->where('id_psu', '=', $psuPerumahan->id_psu);
                                                    $query->where('id_psu_attribute', '=', $a->id);
                                                })
                                                    ->get()
                                                    ->first();
                                                #$queries = DB::getQueryLog();
                                                #print_r($queries);
                                                $value = $value?->value ?? '';
                                                $output .=
                                                    '
																	<tr>
																		<td>' .
                                                    $a->attribute .
                                                    '</td>
																		<td>:' .
                                                    $value .
                                                    ' ' .
                                                    $a->keterangan .
                                                    '</td>
																	</tr>';
                                            }
                                            echo $output;
                                        @endphp
                                        <tr>
                                            <td>Keterangan Lainnya</td>
                                            <td>
                                                :
                                                {{ $psuPerumahan->deskripsi }}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </td>
            </tr>
        @endforeach
    </table>
</div>
