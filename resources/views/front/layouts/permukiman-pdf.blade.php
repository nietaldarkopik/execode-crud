<style>
    {{ $css }}
</style>
<div class="container-fluid">
    <strong>Data Permukiman</strong>
    <table class="table table-sm table-bordered table-stripped">
        <tr>
            <td>
                Nama Permukiman
            </td>
            <td>
                : {{ $permukiman?->nama_permukiman }}
            </td>
        </tr>
        <tr>
            <td>
                Kabupaten / Kota
            </td>
            <td>
                :
                {{ App\Models\KabupatenKotaModel::where('province_id', 63)->where('id', '=', $permukiman->kabkota_id)->get()->first()?->name }}
            </td>
        </tr>
        <tr>
            <td>
                Kecamatan
            </td>
            <td>
                :
                {{ App\Models\KecamatanModel::whereHas('getKabupatenKota', function ($query) {$query->where('province_id', 63);})->where('id', '=', $permukiman->kecamatan_id)->get()->first()?->name }}
            </td>
        </tr>
        <tr>
            <td>
                Kelurahan
            </td>
            <td>
                : {{ App\Models\KelurahanModel::where('id', '=', $permukiman->kelurahan_id)->get()->first()?->name }}
            </td>
        </tr>
        <tr>
            <td>
                Alamat
            </td>
            <td>
                : {{ $permukiman?->alamat }}
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
                : {{ $permukiman?->nama_pengembang }}
            </td>
        </tr>
        <tr>
            <td>
                Telepon Pengembang
            </td>
            <td>
                : {{ $permukiman?->telepon_pengembang }}
            </td>
        </tr>
        <tr>
            <td>
                Email Pengembang
            </td>
            <td>
                : {{ $permukiman?->email_pengembang }}
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <strong>Detail Permukiman</strong>
            </td>
        </tr>
        <tr>
            <td>
                Luas
            </td>
            <td>
                : {{ $permukiman?->luas }}
            </td>
        </tr>
        <tr>
            <td>
                Tahun Siteplan
            </td>
            <td>
                : {{ $permukiman?->tahun_siteplan }}
            </td>
        </tr>
        <tr>
            <td>
                Latitude
            </td>
            <td>
                : {{ $permukiman?->latitude }}
            </td>
        </tr>
        <tr>
            <td>
                Longitude
            </td>
            <td>
                : {{ $permukiman?->longitude }}
            </td>
        </tr>
        <tr>
            <td>
                No Bast
            </td>
            <td>
                : {{ $permukiman?->no_bast }}
            </td>
        </tr>
        <tr>
            <td>
                File Bast
            </td>
            <td>
                @php
                    if (
                        !empty($permukiman->file_bast) &&
                        file_exists(storage_path('app/public/' . $permukiman->file_bast))
                    ) {
                        $imageInfo = getimagesize(storage_path('app/public/' . $permukiman->file_bast));
                        if ($imageInfo !== false) {
                            echo '<img src="' . asset(Storage::url($permukiman->file_bast)) . '" class="img-fluid">';
                        } else {
                            echo '<a href="' .
                                asset(Storage::url($permukiman->file_bast)) .
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
                    if (!empty($permukiman->photo) && file_exists(storage_path('app/public/' . $permukiman->photo))) {
                        $imageInfo = getimagesize(storage_path('app/public/' . $permukiman->photo));
                        if ($imageInfo !== false) {
                            echo '<img src="' . asset(Storage::url($permukiman->photo)) . '" class="img-fluid">';
                        } else {
                            echo '<a href="' .
                                asset(Storage::url($permukiman->photo)) .
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
                        !empty($permukiman->siteplan) &&
                        file_exists(storage_path('app/public/' . $permukiman->siteplan))
                    ) {
                        $imageInfo = getimagesize(storage_path('app/public/' . $permukiman->siteplan));
                        if ($imageInfo !== false) {
                            echo '<img src="' . asset(Storage::url($permukiman->siteplan)) . '" class="img-fluid">';
                        } else {
                            echo '<a href="' .
                                asset(Storage::url($permukiman->siteplan)) .
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
                : {{ $permukiman?->jumlah_mbr }}
            </td>
        </tr>
        <tr>
            <td>
                Jumlah Non MBR
            </td>
            <td>
                : {{ $permukiman?->jumlah_nonmbr }}
            </td>
        </tr>
        <tr>
            <td>
                Total Unit
            </td>
            <td>
                : {{ $permukiman?->total_unit }}
            </td>
        </tr>
        <tr>
            <td>
                Sedang Proses
            </td>
            <td>
                : {{ $permukiman?->jumlah_proses }}
            </td>
        </tr>
        <tr>
            <td>
                Ditempati
            </td>
            <td>
                : {{ $permukiman?->jumlah_ditempati }}
            </td>
        </tr>
        <tr>
            <td>
                Kosong
            </td>
            <td>
                : {{ $permukiman?->jumlah_kosong }}
            </td>
        </tr>
        <tr>
            <td>
                Total Unit
            </td>
            <td>
                : {{ $permukiman?->total_unit }}
            </td>
        </tr>
    </table>
    <strong>Data PSU</strong>

    <table class="table table-sm table-borderless">
        @foreach (App\Models\JenisPsuModel::get() as $i => $jenis_psu)
            @if (App\Models\PsuPermukimanModel::where('id_jenis_psu', $jenis_psu->id)->where('id_permukiman', $permukiman->id)->get()->count() == 0)
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
                        @foreach (App\Models\PsuPermukimanModel::where('id_jenis_psu', $jenis_psu->id)->where('id_permukiman', $permukiman->id)->get() as $ipsu => $psuPermukiman)
                            <tr><td colspan="2">{{ $jenis_psu->title }}</td></tr>
                            <tr>
                                <td width="30%">
                                    @if (!empty($psuPermukiman->photo))
                                        <img src="{{ asset(Storage::url($psuPermukiman->photo)) }}"
                                            class="img-fluid card-img-top object-fit-cover"
                                            style="width: 100%; height: 100%; object-fit: cover;"
                                            alt="{{ $psuPermukiman->nama_psu }}"
                                            title="{{ $psuPermukiman->nama_psu }}" />
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
                                                {{ $psuPermukiman->nama_psu ?? '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>PSU </td>
                                            <td>
                                                @foreach (App\Models\PsuModel::where('jenis', $jenis_psu->id)->get() as $ijp => $p)
                                                    @if ($p->id == ($psuPermukiman->id_psu ?? ''))
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
                                                {{ $psuPermukiman->kondisi }}

                                            </td>
                                        </tr>
                                        @php
                                            $attributes = \App\Models\PsuAttributeModel::where(function ($query) use (
                                                $psuPermukiman,
                                            ) {
                                                $query->where('id_psu', '=', $psuPermukiman->id_psu);
                                            })->get();
                                            $output = '';
                                            foreach ($attributes as $i => $a) {
                                                #DB::enableQueryLog();
                                                $value = \App\Models\PsuAttributePermukimanModel::where(function (
                                                    $query,
                                                ) use ($a, $psuPermukiman) {
                                                    $query->where('id_permukiman', '=', $psuPermukiman->id_permukiman);
                                                    $query->where('id_jenis_psu', '=', $psuPermukiman->id_jenis_psu);
                                                    $query->where('id_psu', '=', $psuPermukiman->id_psu);
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
                                                {{ $psuPermukiman->deskripsi }}
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
