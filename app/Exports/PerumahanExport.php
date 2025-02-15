<?php
namespace App\Exports;

use App\Models\PerumahanModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Http\Request;
use DB;

class PerumahanExport implements FromCollection, WithHeadings
{
    protected $filters;

    public function __construct($filters)
    {
        $this->filters = $filters;
    }

    public function collection()
    {
        $q = PerumahanModel::query();

		$q->select([
			DB::raw('(SELECT name FROM regencies WHERE perumahan.kabkota_id = regencies.id) as kabkota_id'),
			DB::raw('(SELECT name FROM districts WHERE perumahan.kecamatan_id = districts.id) as kecamatan_id'),
			DB::raw('(SELECT name FROM villages WHERE perumahan.kelurahan_id = villages.id) as kelurahan_id'),
			'Nama_Perumahan',
			'Nama_Pengembang',
			'Telepon_Pengembang',
			'Email_Pengembang',
			'Luas',
			'Tahun_Siteplan',
			'Latitude',
			'Longitude',
			//'Latlong',
			'Total_Unit',
			'Jumlah_Mbr',
			'Jumlah_Nonmbr',
			'Tahun_Bast',
			'No_Bast',
			//'File_Bast',
			//'Created_At',
			//'Updated_At',
			//'Photo',
			//'Siteplan',
			'Alamat',
			//'User_Id_Create',
			//'Status_Data',
			//'User_Id_Update',
			'Jumlah_Proses',
			'Jumlah_Ditempati',
			'Jumlah_Kosong',
			//'Geometry',
			//'Geometry_File',
			//'File_Survey',
			//'Keterangan'
		]);
        // Apply filters
        if (!empty($this->filters['search']['value'])) {
            $searchValue = $this->filters['search']['value'];
            $q->where(function($q) use ($searchValue) {
                $q->where('nama_perumahan', 'like', "%{$searchValue}%")
				->orWhere('nama_pengembang', 'like', "%{$searchValue}%")
				->orWhere('no_bast', 'like', "%{$searchValue}%")
				->orWhere('tahun_bast', 'like', "%{$searchValue}%");
            });
        }
        
        if (isset($this->filters['kabkota_id']) && $this->filters["kabkota_id"] != '') {
            $q->where('kabkota_id', '=', $this->filters["kabkota_id"]);
      	}

        if (isset($this->filters['kecamatan_id']) && $this->filters["kecamatan_id"] != '') {
            $q->where('kecamatan_id', '=', $this->filters["kecamatan_id"]);
        }

        if (isset($this->filters['status_bast']) && $this->filters["status_bast"] != '') {
			if($this->filters['status_bast'] == 'sudah bast')
			{
				$q->where('no_bast', '!=', '0');
				$q->where('no_bast', '!=', '00');
				$q->where('no_bast', '!=', '');
				$q->where('no_bast', '!=', '-');
				$q->whereNotNull('no_bast');
			}else if($this->filters['status_bast'] == 'belum bast'){
				$q->where('no_bast', '=', '0');
				$q->orWhere('no_bast', '=', '00');
				$q->orwhere('no_bast', '=', '-');
				$q->orwhereNull('no_bast');
			}
        }

        $columns = $this->filters->columns ?? [];
        if (count($columns) > 0) {
            foreach ($columns as $i => $c) {
                $data = $c['data'];
                
                    if(isset ($c['search']) and !empty($c['search']) and $data == 'no_bast')
                    {
                        if($c['search'] == 'Sudah BAST')
                        {
                            $q->where(function($query) use ($c) {
                                $query->whereNotNull('no_bast')->where('no_bast','<>','');
                            });
                        }elseif($c['search'] == 'Belum BAST'){
                            $q->where(function($query) use ($c) {
                                $query->where(function($query1) {
                                    $query1->whereNull('no_bast')->orWhere('no_bast','=','');
                                });
                            });
                        }
                    }else if(isset ($c['search']) and !empty($c['search']) and ($data == 'kabkota_id' or $data == 'kecamatan_id' or $data == 'tahun_siteplan'))
                    {
                        $q->where(function($query) use ($c) {
                            $query->orWhere($c['data'], 'like', $c['search']['value']);
                        });
                    }
                }
        }

		$order = (isset($this->filters["order"]))?$this->filters["order"]:[];
		if(is_array($order) and count($order) > 0)
		{
			foreach($order as $i => $o)
			{
				$q->orderBy($o['name'] ?? 'id',$o['dir'] ?? 'asc');
			}
		}
        // Apply sorting
        if (!empty($this->filters['order']) && !empty($this->filters['columns'])) {
            $orderColumn = $this->filters['columns'][$this->filters['order'][0]['column']]['data'];
            $orderDir = $this->filters['order'][0]['dir'];
            $q->orderBy($orderColumn, $orderDir);
        }

        return $q->get();
    }

    public function headings(): array
    {
        return [
			
			'Kabkota',
			'Kecamatan',
			'Kelurahan',
			'Nama_Perumahan',
			'Nama_Pengembang',
			'Telepon_Pengembang',
			'Email_Pengembang',
			'Luas',
			'Tahun_Siteplan',
			'Latitude',
			'Longitude',
			//'Latlong',
			'Total_Unit',
			'Jumlah_Mbr',
			'Jumlah_Nonmbr',
			'Tahun_Bast',
			'No_Bast',
			//'File_Bast',
			//'Created_At',
			//'Updated_At',
			//'Photo',
			//'Siteplan',
			'Alamat',
			//'User_Id_Create',
			//'Status_Data',
			//'User_Id_Update',
			'Jumlah_Proses',
			'Jumlah_Ditempati',
			'Jumlah_Kosong',
			//'Geometry',
			//'Geometry_File',
			//'File_Survey',
			//'Keterangan'
        ];
    }
}
