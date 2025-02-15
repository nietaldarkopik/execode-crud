<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\KelurahanModel;
use App\DataTables\KelurahansDataTable;
use App\Models\JenisPsuModel;
use App\Models\KabupatenKotaModel;
use App\Models\KecamatanModel;
use App\Models\PerumahanModel;
use App\Models\PermukimanModel;
use App\Models\PsuModel;
use DB;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

	protected $user_unit_ids = [];
	protected $user;

    public function __construct()
    {
        //$this->middleware(['permission:role-list|role-create|role-edit|role-delete'], ['only' => ['index', 'store']]);
        //$this->middleware(['permission:role-create'], ['only' => ['create', 'store']]);
        //$this->middleware(['permission:role-edit'], ['only' => ['edit', 'update']]);
        //$this->middleware(['permission:role-delete'], ['only' => ['destroy']]);

        $this->middleware('auth');

    }

    public function getKabupatenKota()
    {
        $data = KabupatenKotaModel::getUserAllowed()->orderBy('name','asc');
        return $data->get()->toJson();
    }

    public function getKecamatan($id_kabupatenkota = '')
    {
        $kecamatan =  KecamatanModel::getUserAllowed()->select('districts.*')->orderBy('districts.name','asc');
		$kecamatan->whereHas('getKabupatenKota',
			function($query){ 
				$query->where('province_id',63); 
			});
		if(!empty($id_kabupatenkota) and $id_kabupatenkota != '-'){
			$kecamatan->where('regency_id','=',$id_kabupatenkota);
		}

        return $kecamatan->get()->toJson();
    }

    public function getKelurahan($id_kabupatenkota='',$id_kecamatan='')
    {
        $q =  KelurahanModel::getUserAllowed()->orderBy('villages.name','asc');
		$q->whereHas('getKecamatan', function($query0) { 
			$query0->whereHas('getKabupatenKota',
				function($query){ 
					$query->where('province_id',63); 
				});
			});
        /* if(!empty($id_kabupatenkota) and $id_kabupatenkota != '-')
        {
            $q->join('regencies','regencies.id','=','districts.regency_id');
            $q->where('regencies.id','=',$id_kabupatenkota);
        } */
        if(!empty($id_kecamatan) and $id_kecamatan != '-')
        {
            $q->join('districts','districts.id','=','villages.district_id');
            $q->where('districts.id','=',$id_kecamatan);
        }

        return $q->select('villages.*')->get()->toJson();
    }

    public function getPerkim($id_kabupatenkota='',$jenis_perkim='')
    {
		if($jenis_perkim == "perumahan")
		{
			return PerumahanModel::select(DB::raw('*, nama_perumahan as nama_perumahan'))->where('kabkota_id',$id_kabupatenkota)->orderBy('nama_perumahan')->get()->toJson();
		}else{
			return PermukimanModel::select(DB::raw('*, nama_permukiman as nama_perumahan'))->where('kabkota_id',$id_kabupatenkota)->orderBy('nama_permukiman')->get()->toJson();
		}
    }

    public function getJenisPsu($kategori_id)
    {
		return JenisPsuModel::where('kategori',$kategori_id)->orderBy('title')->get()->toJson();
    }

    public function getPsu($jenis_id)
    {
		return PsuModel::where('jenis',$jenis_id)->orderBy('judul')->get()->toJson();
    }

}
