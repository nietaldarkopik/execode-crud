<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;


use proj4php\Proj4php;
use proj4php\Proj;
use proj4php\Point;
use Illuminate\Http\Request;
use App\Models\KelurahanModel;
use App\DataTables\KelurahansDataTable;
use App\Models\KabupatenKotaModel;
use App\Models\KecamatanModel;
use App\Models\KategoriPsuModel;
use App\Models\PerumahanModel;
use App\Models\PermukimanModel;
use App\Models\PsuPerumahanModel;
use App\Models\PsuPermukimanModel;
use Response;
use DB;
use Str;
use Storage;

class ServicesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware(['permission:role-list|role-create|role-edit|role-delete'], ['only' => ['index', 'store']]);
        //$this->middleware(['permission:role-create'], ['only' => ['create', 'store']]);
        //$this->middleware(['permission:role-edit'], ['only' => ['edit', 'update']]);
        //$this->middleware(['permission:role-delete'], ['only' => ['destroy']]);
        
        #$this->middleware('auth');
    }

    public function getKabupatenKota()
    {
        return KabupatenKotaModel::orderBy('name','asc')->get()->toJson();
    }

    public function getKecamatan($id_kabupatenkota)
    {
        return KecamatanModel::where('regency_id','=',$id_kabupatenkota)->select('districts.*')->orderBy('districts.name','asc')->get()->toJson();
    }

    public function getKelurahan($id_kabupatenkota,$id_kecamatan)
    {
        $q =  KelurahanModel::orderBy('villages.name','asc');
        if(!empty($id_kabupatenkota))
        {
            $q->join('regencies','regencies.id','=','districts.regency_id');
            $q->where('regencies.id','=',$id_kabupatenkota);
        }
        if(!empty($id_kecamatan))
        {
            $q->join('districts','districts.id','=','villages.district_id');
            $q->where('districts.id','=',$id_kecamatan);
        }

        return $q->select('villages.*')->get()->toJson();
    }

	function getLayer()
	{
		$wilayah = KabupatenKotaModel::where('province_id','=',63)->select(DB::raw("*, name as title, 'kabupatenkota' as input_name"))->orderBy('name','asc')->with(['getKecamatan' => function($query){
			$query->select(DB::raw("*, name as title, 'kecamatan' as input_name"));
			$query->orderBy('name','asc');
			/* $query->with(['getKelurahan' => function($query){
				$query->select(DB::raw("*, name as title, 'kelurahan' as input_name"));
				$query->orderBy('name','asc');
			}]); */
		}])->get();

		$wilayahRemap = $wilayah->map(function ($data) {
            $dataArray = $data->toArray();
            $dataArray['childs'] = (isset($dataArray['get_kecamatan']))?collect($dataArray['get_kecamatan'])->map(function ($d) {
				$d['title'] = Str::title($d['title']);
                $d['childs'] = (isset($d['get_kelurahan'])) ? collect($d['get_kelurahan'])->map(function ($kelurahan) {
					$kelurahan['title'] = Str::title($kelurahan['title']);
					return $kelurahan;
				}) : [];

				if(isset($d['get_kelurahan'])){ unset($d['get_kelurahan']); }

				return $d;
            }) : [];
			if(isset($dataArray['get_kecamatan'])){ unset($dataArray['get_kecamatan']); }
			$dataArray['title'] = Str::title($dataArray['title']);
            return $dataArray;
        });

		$psu = KategoriPsuModel::select(DB::raw("*, 'kategori_psu' as input_name"))->with(['getJenisPsu' => function($query){
			$query->select(DB::raw("*, 'jenis_psu' as input_name"))->with(['getPsu' => function($query){
				$query->select(DB::raw("*, judul as title, 'psu' as input_name"));
			}]);
		}])->get();

		$psuRemap = $psu->map(function ($data) {
            $dataArray = $data->toArray();
            $dataArray['childs'] = (isset($dataArray['get_jenis_psu']))? collect($dataArray['get_jenis_psu'])->map(function ($d) {
				$d['title'] = Str::title($d['title']);
                $d['childs'] = (isset($d['get_psu']))? collect($d['get_psu'])->map(function ($d2) {
					$d2['title'] = Str::title($d2['title']);
					return $d2;
				}) : [];

				if(isset($d['get_psu'])){ unset($d['get_psu']);}

				return $d;
            }) : [];

			if(isset($dataArray['get_jenis_psu'])){ unset($dataArray['get_jenis_psu']); }
			$dataArray['title'] = Str::title($dataArray['title']);
            return $dataArray;
        });
		$output = [
					['id' => '*','input_name' => 'wilayah', 'title' => 'Wilayah', 'childs' => $wilayahRemap],
					['id' => '*','input_name' => 'line', 'title' => 'Garis Batas Wilayah'],
					['id' => '*','input_name' => 'area', 'title' => 'Area Batas Wilayah'],
					['id' => '*','input_name' => 'point', 'title' => 'Titik Wilayah'],
					['id' => '*','input_name' => 'perumahan', 'title' => 'Perumahan'],
					['id' => '*','input_name' => 'permukiman', 'title' => 'Permukiman'],
					['id' => '*','input_name' => 'psu', 'title' => 'PSU', 'childs' => $psuRemap],
				];
		return $output;
	}
	

	function getKabupatenKotaLayers(Request $request)
	{
		$filter = $request->all();
		$post_wilayah = $request->wilayah ?? ['*'];
		$post_kabupatenkota = $request->kabupatenkota ?? ['*'];
		$post_line = $request->line ?? ['*'];
		$post_area = $request->area ?? ['*'];
		$post_point = $request->point ?? ['*'];
		$post_perumahan = $request->perumahan ?? ['*'];
		$post_permukiman = $request->permukiman ?? ['*'];
		$post_kecamatan = $request->kecamatan ?? ['*'];
		$post_kelurahan = $request->kelurahan ?? ['*'];
		$post_kategori_psu = $request->kategori_psu ?? ['*'];
		$post_jenis_psu = $request->jenis_psu ?? ['*'];
		$post_psu = $request->psu ?? ['*'];

		$kabupatenkota = KabupatenKotaModel::where('province_id','=',63);
		if(is_array($post_kabupatenkota) and count($post_kabupatenkota) > 0 and $post_kabupatenkota != ['*'] and is_array($post_point) and count($post_point) > 0){
			$kabupatenkota->whereIn('id',$post_kabupatenkota);
		}
		$kabupatenkota = $kabupatenkota->get();
		$kabupatenkota_layer = $kabupatenkota->map(function($data){
			$properties = $data->toArray();
			$properties['epsg'] = 'EPSG:4326';
			$properties['minZoom'] = 5;
			$properties['maxZoom'] = 12;
			$properties['style'] = [
				'strokeColor' => 'red',
				'fillColor' => 'white',
				'color' => 'white',
				//'iconUrl' => asset('listeo/images/marker-icon.png'),
				'iconSize' => [64,64],
				'scale' => 0.5,
				'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" stroke="red" class="bi bi-houses-fill" viewBox="0 0 16 16">
					<path d="M7.207 1a1 1 0 0 0-1.414 0L.146 6.646a.5.5 0 0 0 .708.708L1 7.207V12.5A1.5 1.5 0 0 0 2.5 14h.55a2.5 2.5 0 0 1-.05-.5V9.415a1.5 1.5 0 0 1-.56-2.475l5.353-5.354z"/>
					<path d="M8.793 2a1 1 0 0 1 1.414 0L12 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l1.854 1.853a.5.5 0 0 1-.708.708L15 8.207V13.5a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 4 13.5V8.207l-.146.147a.5.5 0 1 1-.708-.708z"/>
				</svg>',	
			];

			// Inisialisasi Proj4
			$proj4 = new Proj4php();

			// Definisikan proyeksi sumber dan target
			$projSource = new Proj('EPSG:32750', $proj4); // UTM Zone 50S
			$projDest = new Proj('EPSG:4326', $proj4); // WGS 84

			$pointSource = new Point((float) str_replace(',','.',$data->latitude), (float) str_replace(',','.',$data->longitude), $projSource);

			// Konversi ke proyeksi target
			$pointDest = $proj4->transform($projDest, $pointSource);
			
			$longitude = $pointDest->x;
			$latitude = $pointDest->y;

			return [
					'type' => 'Feature',
					'geometry' => [
						'type' => 'Point',
						'coordinates' => [(float) str_replace(',','.',$data->latitude), (float) str_replace(',','.',$data->longitude)],
					],
					'properties' => $properties
				];
			});



		//return response()->json(['layers' => $layers, 'styles' => $styles]);
		return response()->json(
			[
				"type" => "FeatureCollection",
				"name" => "kabupatenkota_layers",/* 
				"crs" => 
				[
					"type" => "name",
					"properties" => [
						"name" => "urn:ogc:def:crs:OGC:1.3:CRS84"
					]
				], */
				"features" => $kabupatenkota_layer
			]);
	}

	function getKecamatanLayers(Request $request)
	{
		$filter = $request->all();
		$post_wilayah = $request->wilayah ?? ['*'];
		$post_kabupatenkota = $request->kabupatenkota ?? ['*'];
		$post_line = $request->line ?? ['*'];
		$post_area = $request->area ?? ['*'];
		$post_point = $request->point ?? ['*'];
		$post_perumahan = $request->perumahan ?? ['*'];
		$post_permukiman = $request->permukiman ?? ['*'];
		$post_kecamatan = $request->kecamatan ?? ['*'];
		$post_kelurahan = $request->kelurahan ?? ['*'];
		$post_kategori_psu = $request->kategori_psu ?? ['*'];
		$post_jenis_psu = $request->jenis_psu ?? ['*'];
		$post_psu = $request->psu ?? ['*'];

		$kabupatenkota = KabupatenKotaModel::where('province_id','=',63);
		$kecamatan = KecamatanModel::whereIn('regency_id',$kabupatenkota->pluck('id'))->where(function($query) use ($post_kecamatan){
			if(is_array($post_kecamatan) and count($post_kecamatan) > 0 and implode('',$post_kecamatan) != '*')
			{
				$query->whereIn('id',$post_kecamatan);
			}
		})->get();
		$kecamatan_layer = $kecamatan->map(function($data){
			$properties = $data->toArray();
			$properties['iconUrl'] = asset('listeo/images/marker-icon.png');
			//$properties['iconUnicode'] = '\f0da';
			//$properties['iconClass'] = 'fas fa-map-marker-alt';
			$properties['iconSize'] = [64,64];
			$properties['scale'] = 0.4;
			$properties['epsg'] = 'EPSG:4326';
			$properties['style'] = [
				'strokeColor' => 'green',
				'fillColor' => 'white',
				'color' => 'white',
				//'iconUrl' => asset('listeo/images/marker-icon.png'),
				'iconSize' => [64,64],
				'scale' => 0.5,
				'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" stroke="green" class="bi bi-houses-fill" viewBox="0 0 16 16">
					<path d="M7.207 1a1 1 0 0 0-1.414 0L.146 6.646a.5.5 0 0 0 .708.708L1 7.207V12.5A1.5 1.5 0 0 0 2.5 14h.55a2.5 2.5 0 0 1-.05-.5V9.415a1.5 1.5 0 0 1-.56-2.475l5.353-5.354z"/>
					<path d="M8.793 2a1 1 0 0 1 1.414 0L12 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l1.854 1.853a.5.5 0 0 1-.708.708L15 8.207V13.5a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 4 13.5V8.207l-.146.147a.5.5 0 1 1-.708-.708z"/>
				</svg>',	
			];
			return [
					'type' => 'Feature',
					'geometry' => [
						'type' => 'Point',
						'coordinates' => [(float) str_replace(',','.',$data->latitude),(float) str_replace(',','.',$data->longitude)],
					],
					'properties' => $properties
				];
			});
		
		//return response()->json(['layers' => $layers, 'styles' => $styles]);
		return response()->json(
			[
				"type" => "FeatureCollection",
				"name" => "kecamatan_layers",
				"crs" => 
				[
					"type" => "name",
					"properties" => [
						"name" => "urn:ogc:def:crs:OGC:1.3:CRS84"
					]
				],
				"features" => $kecamatan_layer
			]);
	}

	function getKelurahanLayers(Request $request)
	{

	}

	function getPerumahanLayers(Request $request)
	{
		
		$post_wilayah = $request->wilayah ?? ['*'];
		$post_kabupatenkota = $request->kabupatenkota ?? ['*'];
		$post_line = $request->line ?? ['*'];
		$post_area = $request->area ?? ['*'];
		$post_point = $request->point ?? 1;
		$post_perumahan = $request->perumahan ?? ['*'];
		$post_permukiman = $request->permukiman ?? ['*'];
		$post_kecamatan = $request->kecamatan ?? ['*'];
		$post_kelurahan = $request->kelurahan ?? ['*'];
		$post_kategori_psu = $request->kategori_psu ?? ['*'];
		$post_jenis_psu = $request->jenis_psu ?? ['*'];
		$post_psu = $request->psu ?? ['*'];
		$kabupatenkota = KabupatenKotaModel::where('province_id','=',63);
		
		$perumahan = PerumahanModel::with([
			'getKabkota',
			'getKecamatan',
			'getKelurahan'
		])->select(
			'id',
			'provinsi_id',
			'kabkota_id',
			'kecamatan_id',
			'kelurahan_id',
			'nama_perumahan',
			'nama_pengembang',
			'alamat',
			'luas',
			'tahun_siteplan',
			'latitude',
			'longitude',
			'latlong',
			'total_unit',
			'jumlah_mbr',
			'photo'
		)->whereIn('kabkota_id',$kabupatenkota->pluck('id'));

		
		if(is_array($post_kabupatenkota) and count($post_kabupatenkota) > 0 and $post_kabupatenkota != ['*'] and is_array($post_point) and count($post_point) > 0){
			$perumahan->whereIn('kabkota_id',$post_kabupatenkota);
		}
		if(is_array($post_kecamatan) and count($post_kecamatan) > 0 and $post_kecamatan != ['*'] and is_array($post_point) and count($post_point) > 0){
			$perumahan->whereIn('kecamatan_id',$post_kecamatan);
		}
		if(is_array($post_perumahan) and count($post_perumahan) > 0 and $post_perumahan != ['*']){
			$perumahan->whereIn('id',$post_perumahan);
		}

		$perumahan = $perumahan->get();
		$perumahan_layer = $perumahan->map(function($data){
			$properties = [];
			$get_kabkota = (!empty($data->get_kabkota))?$data->get_kabkota:false;
			$get_kecamatan = (!empty($data->get_kecamatan))?$data->get_kecamatan:false;
			$get_kelurahan = (!empty($data->get_kelurahan))?$data->get_kelurahan:false;
			$properties['kabkota'] = $get_kabkota?->name ?? '';
			$properties['kecamatan'] = $get_kecamatan?->name ?? '';
			$properties['kelurahan'] = $get_kelurahan?->name ?? '';

			$properties = array_merge($properties,$data->toArray());
			unset($properties['provinsi_id']);
			unset($properties['kabkota_id']);
			unset($properties['kecamatan_id']);
			unset($properties['kelurahan_id']);
			unset($properties['get_kabkota']);
			unset($properties['get_kecamatan']);
			unset($properties['get_kelurahan']);
			
			$properties['epsg'] = 'EPSG:32750';
			$properties['latitude'] = str_replace(',','.',$properties['latitude']);
			$properties['longitude'] = str_replace(',','.',$properties['longitude']);
			
			$photo = (isset($properties['photo']) and !empty($properties['photo']) and file_exists(public_path($properties['photo'])))?asset(Storage::url($properties['photo'])):'';
			if(!empty($photo))
			{
				$properties['photo'] = '<img src="'.$photo.'" class="img img-fluid w-100"/>';
			}else{
				unset($properties['photo']);
			}
			unset($properties['geometry']);

			$properties['url_detail'] = route('front.perumahan.detail',['id' => $properties['id']]);
			$properties['minZoom'] = 5;
			$properties['maxZoom'] = 12;
			$properties['style'] = [
				'strokeColor' => 'blue',
				'fillColor' => 'white',
				'color' => 'white',
				//'iconUrl' => asset('listeo/images/marker-icon.png'),
				'iconSize' => [64,64],
				'scale' => 0.3,
				'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" stroke="blue" class="bi bi-houses-fill" viewBox="0 0 16 16">
					<path d="M7.207 1a1 1 0 0 0-1.414 0L.146 6.646a.5.5 0 0 0 .708.708L1 7.207V12.5A1.5 1.5 0 0 0 2.5 14h.55a2.5 2.5 0 0 1-.05-.5V9.415a1.5 1.5 0 0 1-.56-2.475l5.353-5.354z"/>
					<path d="M8.793 2a1 1 0 0 1 1.414 0L12 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l1.854 1.853a.5.5 0 0 1-.708.708L15 8.207V13.5a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 4 13.5V8.207l-.146.147a.5.5 0 1 1-.708-.708z"/>
				</svg>',	
			];

			return [
					'type' => 'Feature',
					'geometry' => [
						'type' => 'Point',
						'coordinates' => [(float) $data->longitude, (float) $data->latitude],
					],
					'properties' => $properties
				];
			});

	
		//return response()->json(['layers' => ['point' => $perumahan_layer] ]);
		return response()->json(
			[
				"type" => "FeatureCollection",
				"name" => "perumahan_layers",
				"crs" => 
				[
					"type" => "name",
					"properties" => [
						"name" => "urn:ogc:def:crs:OGC:1.3:CRS84"
					]
				],
				"features" => $perumahan_layer
			]);
	}

	function getPermukimanLayers(Request $request)
	{
		
		$post_wilayah = $request->wilayah ?? ['*'];
		$post_kabupatenkota = $request->kabupatenkota ?? ['*'];
		$post_line = $request->line ?? ['*'];
		$post_area = $request->area ?? ['*'];
		$post_point = $request->point ?? 1;
		$post_perumahan = $request->perumahan ?? ['*'];
		$post_permukiman = $request->permukiman ?? ['*'];
		$post_kecamatan = $request->kecamatan ?? ['*'];
		$post_kelurahan = $request->kelurahan ?? ['*'];
		$post_kategori_psu = $request->kategori_psu ?? ['*'];
		$post_jenis_psu = $request->jenis_psu ?? ['*'];
		$post_psu = $request->psu ?? ['*'];
		$kabupatenkota = KabupatenKotaModel::where('province_id','=',63);
		$permukiman = PermukimanModel::with([
			'getKabkota',
			'getKecamatan',
			'getKelurahan'
		])->select(
			'id',
			'provinsi_id',
			'kabkota_id',
			'kecamatan_id',
			'kelurahan_id',
			'nama_permukiman',
			'alamat',
			'luas',
			'tahun_siteplan',
			'latitude',
			'longitude',
			'latlong',
			'total_unit',
			//'jumlah_mbr',
			'photo'
		)->whereIn('kabkota_id',$kabupatenkota->pluck('id'));

		
		if(is_array($post_kabupatenkota) and count($post_kabupatenkota) > 0 and $post_kabupatenkota != ['*'] and is_array($post_point) and count($post_point) > 0){
			$permukiman->whereIn('kabkota_id',$post_kabupatenkota);
		}
		if(is_array($post_kecamatan) and count($post_kecamatan) > 0 and $post_kecamatan != ['*'] and is_array($post_point) and count($post_point) > 0){
			$permukiman->whereIn('kecamatan_id',$post_kecamatan);
		}
		if(is_array($post_permukiman) and count($post_permukiman) > 0 and $post_permukiman != ['*']){
			$permukiman->whereIn('id',$post_permukiman);
		}

		$permukiman = $permukiman->get();
		$permukiman_layer = $permukiman->map(function($data){
			$properties = [];
			$get_kabkota = (!empty($data->get_kabkota))?$data->get_kabkota:false;
			$get_kecamatan = (!empty($data->get_kecamatan))?$data->get_kecamatan:false;
			$get_kelurahan = (!empty($data->get_kelurahan))?$data->get_kelurahan:false;
			$properties['kabkota'] = $get_kabkota?->name ?? '';
			$properties['kecamatan'] = $get_kecamatan?->name ?? '';
			$properties['kelurahan'] = $get_kelurahan?->name ?? '';

			$properties = array_merge($properties,$data->toArray());
			unset($properties['provinsi_id']);
			unset($properties['kabkota_id']);
			unset($properties['kecamatan_id']);
			unset($properties['kelurahan_id']);
			unset($properties['get_kabkota']);
			unset($properties['get_kecamatan']);
			unset($properties['get_kelurahan']);
			
			$properties['epsg'] = 'EPSG:32750';
			$properties['latitude'] = str_replace(',','.',$properties['latitude']);
			$properties['longitude'] = str_replace(',','.',$properties['longitude']);
			
			$photo = (isset($properties['photo']) and !empty($properties['photo']) and file_exists(public_path($properties['photo'])))?asset(Storage::url($properties['photo'])):'';
			if(!empty($photo))
			{
				$properties['photo'] = '<img src="'.$photo.'" class="img img-fluid"/>';
			}else{
				unset($properties['photo']);
			}
			unset($properties['geometry']);

			$properties['url_detail'] = route('front.permukiman.detail',['id' => $properties['id']]);
			$properties['minZoom'] = 5;
			$properties['maxZoom'] = 12;
			$properties['style'] = [
				'strokeColor' => 'green',
				'fillColor' => 'white',
				'color' => 'white',
				//'iconUrl' => asset('listeo/images/marker-icon.png'),
				'iconSize' => [64,64],
				'scale' => 0.3,
				'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" stroke="green" class="bi bi-houses-fill" viewBox="0 0 16 16">
					<path d="M7.207 1a1 1 0 0 0-1.414 0L.146 6.646a.5.5 0 0 0 .708.708L1 7.207V12.5A1.5 1.5 0 0 0 2.5 14h.55a2.5 2.5 0 0 1-.05-.5V9.415a1.5 1.5 0 0 1-.56-2.475l5.353-5.354z"/>
					<path d="M8.793 2a1 1 0 0 1 1.414 0L12 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l1.854 1.853a.5.5 0 0 1-.708.708L15 8.207V13.5a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 4 13.5V8.207l-.146.147a.5.5 0 1 1-.708-.708z"/>
				</svg>',	
			];


			return [
					'type' => 'Feature',
					'geometry' => [
						'type' => 'Point',
						'coordinates' => [(float) $data->longitude, (float) $data->latitude],
					],
					'properties' => $properties
				];
			});

	
		//return response()->json(['layers' => ['point' => $permukiman_layer] ]);
		return response()->json(
			[
				"type" => "FeatureCollection",
				"name" => "permukiman_layers",
				"crs" => 
				[
					"type" => "name",
					"properties" => [
						"name" => "urn:ogc:def:crs:OGC:1.3:CRS84"
					]
				],
				"features" => $permukiman_layer
			]);
	}

	function getPsuLayers(Request $request)
	{
		
		$post_wilayah = $request->wilayah ?? ['*'];
		$post_kabupatenkota = $request->kabupatenkota ?? ['*'];
		$post_line = $request->line ?? ['*'];
		$post_area = $request->area ?? ['*'];
		$post_point = $request->point ?? 1;
		$post_perumahan = $request->perumahan ?? ['*'];
		$post_permukiman = $request->permukiman ?? ['*'];
		$post_kecamatan = $request->kecamatan ?? ['*'];
		$post_kelurahan = $request->kelurahan ?? ['*'];
		$post_kategori_psu = $request->kategori_psu ?? ['*'];
		$post_jenis_psu = $request->jenis_psu ?? ['*'];
		$post_psu = $request->psu ?? ['*'];
		$kabupatenkota = KabupatenKotaModel::where('province_id','=',63);
		
		
        $psuPerumahan = PsuPerumahanModel
            ::select(
            DB::raw("('perumahan') as jenis_perkim"),
            'id',
            DB::raw("id_perumahan as id_permukiman"),
            'id_jenis_psu',
            'id_kategori',
            'id_psu',
            'nama_psu',
            'deskripsi',
            'bast_status',
            'bast_file',
            'bast_tanggal',
            'kondisi',
            'latitude',
            'longitude',
            //'latlong',
            'photo'
        )->with('getPerkim');;

        $psu = PsuPermukimanModel::select(
            DB::raw("('permukiman') as jenis_perkim"),
            'id',
            'id_permukiman',
            'id_jenis_psu',
            'id_kategori',
            'id_psu',
            'nama_psu',
            'deskripsi',
            'bast_status',
            'bast_file',
            'bast_tanggal',
            'kondisi',
            'latitude',
            'longitude',
            //'latlong',
            'photo'
		);
        $psu->union($psuPerumahan);
		$psu = $psu->with(['getKategori','getJenisPsu','getPsu'])->get(); // /* ->with(['getPerkim' => function($query){	$query->with(['getKabkota','getKecamatan','getKelurahan']);}]) */ ->get();

		$psu_layer = $psu->map(function($data){
			$properties = [];
			$get_kategori = (!empty($data->getKategori))?$data->getKategori:false;
			$get_jenis_psu = (!empty($data->getJenisPsu))?$data->getJenisPsu:false;
			$get_psu = (!empty($data->getPsu))?$data->getPsu:false;
			$get_perkim = (!empty($data->getPerkim))?$data->getPerkim:false;

			$get_perkim = ($data->jenis_perkim == 'permukiman')?PermukimanModel::with([
				'getKabkota' => function($query){
					$query->select('name');
				},
				'getKecamatan' => function($query){
					$query->select('name');
				},
				'getKelurahan' => function($query){
					$query->select('name');
				},
			])->select(DB::raw('id, kabkota_id, kecamatan_id, kelurahan_id, nama_permukiman as nama_perkim'))->find($data->id_permukiman):PerumahanModel::with([
				'getKabkota' => function($query){
					$query->select('name');
				},
				'getKecamatan' => function($query){
					$query->select('name');
				},
				'getKelurahan' => function($query){
					$query->select('name');
				},
			])->select(DB::raw('id, kabkota_id, kecamatan_id, kelurahan_id, nama_perumahan as nama_perkim'))->find($data->id_permukiman);

			$get_kabkota = (!empty($get_perkim->getKabkota))?$get_perkim->getKabkota:false;
			$get_kecamatan = (!empty($get_perkim->getKecamatan))?$get_perkim->getKecamatan:false;
			$get_kelurahan = (!empty($get_perkim->getKelurahan))?$get_perkim->getKelurahan:false;

			//$properties['nama_perkim'] = $get_perkim?->nama_permukiman ?? $get_perkim?->nama_perumahan ?? '';
			$properties['nama_perkim'] = $get_perkim->nama_perkim ?? '';
			$properties['kabkota'] = $get_kabkota?->name ?? '';
			$properties['kecamatan'] = $get_kecamatan?->name ?? '';
			$properties['kelurahan'] = $get_kelurahan?->name ?? '';
			$properties['kategori'] = $get_kategori->title ?? '';
			$properties['jenis_psu'] = $get_jenis_psu->title ?? '';
			$properties['psu'] = $get_psu->judul ?? '';

			$properties = array_merge($properties,$data->toArray());
			unset($properties['provinsi_id']);
			unset($properties['kabkota_id']);
			unset($properties['kecamatan_id']);
			unset($properties['kelurahan_id']);
			unset($properties['get_kabkota']);
			unset($properties['get_kecamatan']);
			unset($properties['get_kelurahan']);
			
			$properties['epsg'] = 'EPSG:32750';
			$properties['latitude'] = str_replace(',','.',$properties['latitude']);
			$properties['longitude'] = str_replace(',','.',$properties['longitude']);
			
			$photo = (isset($properties['photo']) and !empty($properties['photo']) and file_exists(public_path($properties['photo'])))?asset(Storage::url($properties['photo'])):'';
			if(!empty($photo))
			{
				$properties['photo'] = '<img src="'.$photo.'" class="img img-fluid w-100"/>';
			}else{
				unset($properties['photo']);
			}
			unset($properties['geometry']);

			$properties['url_detail'] = route('front.'.$properties['jenis_perkim'].'.detail',['id' => $properties['id_permukiman']]);

			$properties['minZoom'] = 10;
			$properties['maxZoom'] = 40;
			$properties['style'] = [
				'strokeColor' => 'grey',
				'fillColor' => 'white',
				'color' => 'white',
				//'iconUrl' => asset('listeo/images/marker-icon.png'),
				'iconSize' => [64,64],
				'scale' => 0.3,
				'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" stroke="grey" class="bi bi-image-fill" viewBox="0 0 16 16">
					<path d="M.002 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-12a2 2 0 0 1-2-2zm1 9v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V9.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062zm5-6.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>
				</svg>',	
			];


			return [
					'type' => 'Feature',
					'geometry' => [
						'type' => 'Point',
						'coordinates' => [(float) $data->longitude, (float) $data->latitude],
					],
					'properties' => $properties
				];
			});

			//return response()->json(['layers' => ['point' => $psu_layer] ]);
			return response()->json(
				[
					"type" => "FeatureCollection",
					"name" => "psu_layers",
					"crs" => 
					[
						"type" => "name",
						"properties" => [
							"name" => "urn:ogc:def:crs:OGC:1.3:CRS84"
						]
					],
					"features" => $psu_layer
				]);
		
	}
}
