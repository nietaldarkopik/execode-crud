<?php
namespace App\Exports;

use App\Models\PsuPerumahanModel;
use App\Models\PsuPermukimanModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Http\Request;
use DB;
use Storage;

class PsuExport implements FromCollection, WithHeadings
{
    protected $filters;

    public function __construct($filters)
    {
        $this->filters = $filters;
    }

    public function collection()
    {
		$path = asset(Storage::url('/'));
        $psuPerumahan = PsuPerumahanModel
            ::select(
            DB::raw("('perumahan') as jenis_perkim"),
			//DB::raw('perumahan.kabkota_id as kabkota_id'),
			//DB::raw('perumahan.kecamatan_id as kecamatan_id'),
			DB::raw("perumahan.nama_perumahan as nama_perkim"),
			DB::raw("regencies.name as nama_kabkota"),
			DB::raw("districts.name as nama_kecamatan"),
			DB::raw("villages.name as nama_kelurahan"),
			DB::raw("kategori_psu.title as nama_kategori_psu"),
			DB::raw("jenis_psu.title as nama_jenis_psu"),
			DB::raw("psu.judul as nama_kelompok_psu"),
            //'psu_perumahan.id',
            //'id_perumahan as id_permukiman',
            //'id_jenis_psu',
            //'id_kategori',
            //'id_psu',
            'nama_psu',
            'psu_perumahan.deskripsi',
            //'bast_status',
            //'bast_file',
            //'bast_tanggal',
			'perumahan.no_bast',
            'kondisi',
            'psu_perumahan.latitude',
            'psu_perumahan.longitude',
            //'latlong',
            DB::raw('concat("'.$path.'","/",psu_perumahan.photo) as photo_perkim'),
		)
		->join('perumahan','id_perumahan','=','perumahan.id')
		->join('regencies','kabkota_id','=','regencies.id')
		->join('districts','kecamatan_id','=','districts.id')
		->join('villages','kelurahan_id','=','villages.id')
		->join('jenis_psu','id_jenis_psu','=','jenis_psu.id')
		->join('kategori_psu','id_kategori','=','kategori_psu.id')
		->join('psu','id_psu','=','psu.id')
		->whereNull('perumahan.deleted_at');
		
		/* ->with('getPerumahan',function($query){
			$query->select('kabkota_id','kecamatan_id');
		})->whereHas('getPerumahan'); */

        $psuPermukiman = PsuPermukimanModel::select(
            DB::raw("('permukiman') as jenis_perkim"),
			//DB::raw('permukiman.kabkota_id as kabkota_id'),
			//DB::raw('permukiman.kecamatan_id as kecamatan_id'),
			DB::raw("permukiman.nama_permukiman as nama_perkim"),
			DB::raw("regencies.name as nama_kabkota"),
			DB::raw("districts.name as nama_kecamatan"),
			DB::raw("villages.name as nama_kelurahan"),
			DB::raw("kategori_psu.title as nama_kategori_psu"),
			DB::raw("jenis_psu.title as nama_jenis_psu"),
			DB::raw("psu.judul as nama_kelompok_psu"),
            //'psu_permukiman.id',
            //'id_permukiman',
            //'id_jenis_psu',
            //'id_kategori',
            //'id_psu',
            'nama_psu',
            'psu_permukiman.deskripsi',
            //'bast_status',
            //'bast_file',
            //'bast_tanggal',
			'permukiman.no_bast',
            'kondisi',
            'psu_permukiman.latitude',
            'psu_permukiman.longitude',
            //'latlong',
            DB::raw('concat("'.$path.'","/",psu_permukiman.photo) as photo_perkim'),
		)
		->join('permukiman','id_permukiman','=','permukiman.id')
		->join('regencies','kabkota_id','=','regencies.id')
		->join('districts','kecamatan_id','=','districts.id')
		->join('villages','kelurahan_id','=','villages.id')
		->join('jenis_psu','id_jenis_psu','=','jenis_psu.id')
		->join('kategori_psu','id_kategori','=','kategori_psu.id')
		->join('psu','id_psu','=','psu.id')
		->whereNull('permukiman.deleted_at');
		
		/* ->with('getPermukiman',function($query){
			$query->select('kabkota_id','kecamatan_id');
		})->whereHas('getPermukiman'); */


        $columns = $request->columns ?? [];
        $search = $request->search ?? [];
		
		if (isset($this->filters['kabkota_id'])) {
			$psuPerumahan->where('kabkota_id', '=', $this->filters['kabkota_id']);
		  }

		if (isset($this->filters['kecamatan_id'])) {
			$psuPerumahan->where('kecamatan_id', '=', $this->filters['kecamatan_id']);
		}

		if (isset($this->filters['jenis_perkim'])) {
			$psuPerumahan->having('jenis_perkim', 'like', $this->filters['jenis_perkim']);
		}

		/* $psuPerumahan->where(function($q0) use ($columns,$request){
			
			
			if (count($columns) > 0) {
				foreach ($columns as $i => $c) {
					$data = $c['data'];
					if (isset($c['search']) and !empty($c['search'])) {
						$q0->where(function ($query) use ($c) {
							$query->orWhere($c['data'], 'like', '%'.$c['search']['value'].'%');
						});
					}
				}
			}

		}); */

		if (isset($this->filters['kabkota_id'])) {
			$psuPermukiman->where('kabkota_id', '=', $this->filters["kabkota_id"]);
		  }

		if (isset($this->filters['kecamatan_id'])) {
			$psuPermukiman->where('kecamatan_id', '=', $this->filters["kecamatan_id"]);
		}

		if (isset($this->filters['jenis_perkim'])) {
			$psuPermukiman->having('jenis_perkim', 'like', $this->filters["jenis_perkim"]);
		}

		if (is_array($search) and count($search) > 0 and isset($search['value'])) {
			$psuPermukiman->where(function($q0) use ($search){
				$q0->orWhere('nama_psu','like','%'.(str_replace(' ','%',$search['value']).'%'));
				$q0->orWhere('permukiman.nama_permukiman','like','%'.(str_replace(' ','%',$search['value']).'%'));
				$q0->orWhere(DB::raw("'permukiman'"),'like','%'.(str_replace(' ','%',$search['value']).'%'));
			});
		}

		if (is_array($search) and count($search) > 0 and isset($search['value'])) {
			$psuPerumahan->where(function($q0) use ($search){
				$q0->orWhere('nama_psu','like','%'.(str_replace(' ','%',$search['value']).'%'));
				$q0->orWhere('perumahan.nama_perumahan','like','%'.(str_replace(' ','%',$search['value']).'%'));
				$q0->orWhere(DB::raw("'perumahan'"),'like','%'.(str_replace(' ','%',$search['value']).'%'));
			});
		}
		
		$sql = $psuPermukiman->unionAll($psuPerumahan);

		/* $output = $sql->toRawSql();
		$dt = DB::select($output);
		$data = collect($dt)->map(function($rawData) {
			if($rawData->jenis_perkim == 'permukiman')
			{
				return (new \App\Models\PsuPermukimanModel)->newInstance((array) $rawData, true)->with('getPermukiman');
			}else{
				return (new \App\Models\PsuPerumahanModel)->newInstance((array) $rawData, true)->with('getPerumahan');
			}
		}); */

        return $sql->get();
    }

    public function headings(): array
    {
        return [
			'Jenis Perkim',
			'Nama Perkim',
			'Kabkota',
			'Kecamatan',
			'Kelurahan',
			'Kategori PSU',
			'Jenis PSU',
			'Kelompok PSU',
			'Nama PSU',
			'Deskripsi',
			'No Bast',
			'Kondisi',
			'Latitude',
			'Longitude',
			'Photo',
		];
    }
}
