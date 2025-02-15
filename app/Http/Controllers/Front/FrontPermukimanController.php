<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;

use proj4php\Proj4php;
use proj4php\Proj;
use proj4php\Point;
use Illuminate\Http\Request;
use App\Models\PermukimanModel;
use App\DataTables\Front\PermukimanDataTable;
use App\Models\KategoriPsuModel;
use App\Models\JenisPsuModel;
use App\Models\PsuModel;
use App\Models\PermukimanDokumenModel;
use App\Models\PsuPermukimanModel;
//use MatanYadaev\EloquentSpatial\Objects\Point;
use MatanYadaev\EloquentSpatial\Enums\Srid;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use DB;
use Auth;
use Str;
use PDF;
use App\Exports\PermukimanExport;
use Maatwebsite\Excel\Facades\Excel;

class FrontPermukimanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function index(PermukimanDataTable $dataTable)
    {
        return $dataTable->render('front.layouts.permukiman');
    }

    public function indexxx(Request $request)
    {
        $permukimans = PermukimanModel::orderBy('id', 'DESC')->paginate(20);
        return view(env('THEME_PATH','front').'.layouts.permukiman', compact('permukimans'));
    }

    public function getData(Request $request)
    {
        $permukimans = PermukimanModel::orderBy('id', 'DESC')->paginate(20);
        return view(env('THEME_PATH','front').'.layouts.permukiman', compact('permukimans'));
    }

    public function create(Request $request)
    {
        $kategoriPsus = KategoriPsuModel::get();
        if($request->ajax()){
            return view(env('THEME_PATH','front').'.layouts.permukiman-create', compact('kategoriPsus'));
        }else{
            return view(env('THEME_PATH','front').'.layouts.permukiman', compact('kategoriPsus'));
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            //'provinsi_id' => 'required',
            'kabkota_id' => 'required',
            'kecamatan_id' => 'required',
            'kelurahan_id' => 'required',
            //'pengembang_id' => 'required',
            'nama_permukiman' => 'required',
            'luas' => '',
            'tahun_siteplan' => '',
            'latitude' => '',
            'longitude' => '',
            //'latlong' => '',
            'total_unit' => '',
            'jumlah_mbr' => '',
            'jumlah_nonmbr' => '',
            'no_bast' => '',
            'file_bast' => 'file|mimes:jpg,jpeg,png,pdf',
            'photo' => 'file|mimes:jpg,jpeg,png',
            'siteplan' => 'file|mimes:jpg,jpeg,png',
            'alamat' => 'required',
            'status_data' => 'required',
            'nama_pengembang' => 'required',
            'telepon_pengembang' => '',
            'email_pengembang' => '',
            'jumlah_proses' => '',
            'jumlah_ditempati' => '',
            'jumlah_kosong' => '',
            //'user_id_create' => 'required',
            //'user_id_update' => 'required',
            //'created_at' => 'required',
            //'updated_at' => 'required',
        ]);

        $file_bast = '';
        $photo = '';
        $siteplan = '';
        
        if ($request->file('file_bast')) {
            $file = $request->file('file_bast');
            $path = $file->store('uploads/permukiman/file_bast', 'public');
            //$file_bast = $file->getClientOriginalName();
            //$file_bast = basename($path);
            $file_bast = $path;
        }
        
        if ($request->file('photo')) {
            $file = $request->file('photo');
            $path = $file->store('uploads/permukiman/photo', 'public');
            //$photo = $file->getClientOriginalName();
            //$photo = basename($path);
            $photo = $path;
        }
        
        if ($request->file('siteplan')) {
            $file = $request->file('siteplan');
            $path = $file->store('uploads/permukiman/siteplan', 'public');
            //$siteplan = $file->getClientOriginalName();
            //$siteplan = basename($path);
            $siteplan = $path;
        }
        

        //$fileModel = new File;
        //$fileModel->name = $file->getClientOriginalName();
        //$fileModel->path = $path;
        //$fileModel->save();

        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $latlong = (empty($latitude.$longitude))?null:new Point($latitude,$longitude, Srid::WGS84->value);

        $user_id = Auth::user()->id;
        $dt = [
            'provinsi_id' => 63,
            'kabkota_id' => $request->input('kabkota_id'),
            'kecamatan_id' => $request->input('kecamatan_id'),
            'kelurahan_id' => $request->input('kelurahan_id'),
            //'pengembang_id' => $request->input('pengembang_id'),
            'nama_permukiman' => $request->input('nama_permukiman'),
            'luas' => $request->input('luas'),
            'tahun_siteplan' => $request->input('tahun_siteplan'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'latlong' => $latlong,
            'total_unit' => $request->input('total_unit'),
            'jumlah_mbr' => $request->input('jumlah_mbr'),
            'jumlah_nonmbr' => $request->input('jumlah_nonmbr'),
            'no_bast' => $request->input('no_bast'),
            //'file_bast' => $request->input('file_bast'),
            //'photo' => $request->input('photo'),
            //'siteplan' => $request->input('siteplan'),
            'alamat' => $request->input('alamat'),
            'status_data' => $request->input('status_data'),
            'nama_pengembang' => $request->input('nama_pengembang'),
            'telepon_pengembang' => $request->input('telepon_pengembang'),
            'email_pengembang' => $request->input('email_pengembang'),
            'jumlah_proses' => $request->input('jumlah_proses'),
            'jumlah_ditempati' => $request->input('jumlah_ditempati'),
            'jumlah_kosong' => $request->input('jumlah_kosong'),
            'user_id_create' => $user_id,
            'user_id_update' => $user_id,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        if(!empty($file_bast))
        {
            $dt['file_bast'] = $file_bast;
        }
        if(!empty($photo))
        {
            $dt['photo'] = $photo;
        }
        if(!empty($siteplan))
        {
            $dt['siteplan'] = $siteplan;
        }

        $permukiman = PermukimanModel::create($dt);

        return redirect()->route('admin.permukiman.index')
            ->with('success', 'Permukiman berhasil disimpan');
    }

    public function show($id,Request $request)
    {
        $permukiman = PermukimanModel::find($id);
        $kategoriPsus = KategoriPsuModel::get();


		$psuPermukiman = $permukiman->getPsuPermukiman()->get();

		$features = [];
		foreach($psuPermukiman as $i => $psu)
		{
			/* 
			'jenis_permukiman',
			'id_permukiman',
			'id_jenis_psu',
			'id_kategori',
			'id_psu',
			'nama_psu',
			'deskripsi',
			'bast_status',
			'bast_no',
			'bast_file',
			'bast_tanggal',
			'kondisi',
			'latitude',
			'longitude',
			'latlong',
			'photo' 
			*/

			// Inisialisasi Proj4
			$proj4 = new Proj4php();

			// Definisikan proyeksi sumber dan target
			$projSource = new Proj('EPSG:32750', $proj4); // UTM Zone 50S
			$projDest = new Proj('EPSG:4326', $proj4); // WGS 84

			$pointSource = new Point($psu->latitude, $psu->longitude, $projSource);

			// Konversi ke proyeksi target
			$pointDest = $proj4->transform($projDest, $pointSource);
			
			$longitude = $pointDest->x;
			$latitude = $pointDest->y;

			$dt_array = [];
			if(!empty($psu->photo))
			{
				$dt_array['Photo'] = '<img src="'.asset(Storage::url($psu->photo)).'" class="w-100 photo-psu"/>';
			}

			$dt_array['Kategori'] = KategoriPsuModel::find($psu->id_kategori)?->title ?? '';
			$dt_array['Jenis Psu'] = JenisPsuModel::find($psu->id_jenis_psu)?->title ?? '';
			$dt_array['Psu'] = PsuModel::find($psu->id_psu)?->judul ?? '';
			
			$dt_array['Nama Psu'] = $psu->nama_psu;
			$dt_array['Jenis Perkim'] = $psu->jenis_permukiman;
			$dt_array['Kondisi'] = $psu->kondisi;

			$features[] = 
					[
						"type" => "Feature",
						"properties" => $dt_array,
						"geometry" => [
							"type" => "Point",
							"coordinates" => [
								$longitude, $latitude
							]
						]
					];
		}

		$psuGeometry = [
			"type" => "FeatureCollection",
			"crs" => [
				"type" => "name",
				"properties" => [
					"name" => "urn:ogc:def:crs:OGC:1.3:CRS84"
				]
			],
			"features" => $features
		];


		return view(env('THEME_PATH','front').'.layouts.permukiman-detail', compact('permukiman', 'kategoriPsus','psuGeometry'));
    }

    
    public function peta($id,Request $request)
    {
        $permukiman = PermukimanModel::find($id);
        $kategoriPsus = KategoriPsuModel::get();

		return view(env('THEME_PATH','front').'.layouts.peta', compact('permukiman', 'kategoriPsus'));
    }
    
    public function psu($id,Request $request)
    {
        $permukiman = PermukimanModel::find($id);
        $kategoriPsus = KategoriPsuModel::get();

		return view(env('THEME_PATH','front').'.layouts.permukiman-psu', compact('permukiman', 'kategoriPsus'));
    }
    
    public function print($id,Request $request)
    {
        $permukiman = PermukimanModel::find($id);
        $kategoriPsus = KategoriPsuModel::get();

        
		return view(env('THEME_PATH','front').'.layouts.permukiman-print', compact('permukiman', 'kategoriPsus'));
    }
    
    public function document($id,Request $request)
    {
        $permukiman = PermukimanModel::find($id);
        $kategoriPsus = KategoriPsuModel::get();

		return view(env('THEME_PATH','front').'.layouts.permukiman-document', compact('permukiman', 'kategoriPsus'));
    }
    
    public function pdf($id,Request $request)
    {
        $perumahan = PermukimanModel::find($id);
        $kategoriPsus = KategoriPsuModel::get();
		//$bootstrap5 = file_get_contents(public_path() . '/build/assets/app-gUA5Mw-f.css');
		$bootstrap5 = file_get_contents(public_path() . '/front/vendor/bootstrap/css/bootstrap.css');
		$bootstrap5 .= file_get_contents(public_path() . '/vendor/adminlte/dist/css/adminlte.min.css');
		$css = $bootstrap5;
		//return view('vendor.adminlte.perumahans.pdf', compact('perumahan', 'kategoriPsus','css'));
        $pdf = PDF::loadView('vendor.adminlte.perumahans.pdf', compact('perumahan', 'kategoriPsus','css'))->setOptions(['dpi' => 450, 
			'defaultFont' => 'Nunito, sans-serif', 'isHtml5ParserEnabled' => true, 
			'isRemoteEnabled' => true, 'isJavascriptEnabled' => false]
		);

        return $pdf->download(Str::kebab($perumahan->nama_permukiman) . '.pdf');
    }

    public function edit($id,Request $request)
    {
        $this->middleware('auth');

        $permukiman = PermukimanModel::find($id);
        $kategoriPsus = KategoriPsuModel::get();

        if($request->ajax()){
            return view(env('THEME_PATH','front').'.layouts.permukiman-edit', compact('permukiman', 'kategoriPsus'));
        }else{
            return view(env('THEME_PATH','front').'.layouts.permukiman', compact('permukiman', 'kategoriPsus'));
        }
    }

    public function psuDetail($id,Request $request)
    {

        $psuPermukiman = PsuPermukimanModel::find($id);
		if(empty($psuPermukiman)){
			abort(404);
		}
        $permukiman = PermukimanModel::find($id);
        $kategoriPsus = KategoriPsuModel::get();

        if($request->ajax()){
            return view(env('THEME_PATH','front').'.layouts.permukiman-psu-detail-form', compact('permukiman', 'kategoriPsus', 'psuPermukiman'));
        }else{
            return view(env('THEME_PATH','front').'.layouts.permukiman-psu-detail', compact('permukiman', 'kategoriPsus', 'psuPermukiman'));
        }
		
    }
    
    public function formUploadPeta($id,Request $request)
    {
        $this->middleware('auth');
		
        $permukiman = PermukimanModel::find($id);
        $kategoriPsus = KategoriPsuModel::get();

        if($request->ajax()){
            return view(env('THEME_PATH','front').'.layouts.permukiman-upload-peta', compact('permukiman', 'kategoriPsus'));
        }else{
            return view(env('THEME_PATH','front').'.layouts.permukiman-peta', compact('permukiman', 'kategoriPsus'));
        }
    }

    public function formUploadDokumen($id,Request $request)
    {
        $this->middleware('auth');
		
        $permukiman = PermukimanModel::find($id);
        $kategoriPsus = KategoriPsuModel::get();

        if($request->ajax()){
            return view(env('THEME_PATH','front').'.layouts.permukiman-upload-dokumen', compact('permukiman', 'kategoriPsus'));
        }else{
            return view(env('THEME_PATH','front').'.layouts.permukiman-dokumen', compact('permukiman', 'kategoriPsus'));
        }
    }

    public function saveGeojson($id,Request $request)
    {
        $this->middleware('auth');
		
        $this->validate($request, [
            'geometry_file' => 'required', //|mimes:zip,sbx,shp,shp.xml,shx,cpg,dbf,prj,sbn,geojson,json',
        ]);
        
        $user_id = Auth::user()->id;

        $geojson = json_decode(file_get_contents($request->input('geometry_file')),true);

        $permukiman = PermukimanModel::find($id);
        $permukiman->user_id_update = $user_id;
        $permukiman->geometry_file =$request->input('geometry_file');
        $permukiman->geometry = $geojson;
        $permukiman->save();

        return $permukiman->toJson();
    }

    public function uploadPeta($id,Request $request)
    {
        $this->middleware('auth');
		
        $this->validate($request, [
            'file' => 'file', //|mimes:zip,sbx,shp,shp.xml,shx,cpg,dbf,prj,sbn,geojson,json',
        ]);

        $path = '';
        $uploadPath = '';
        
        if ($request->file('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $name = $file->getClientOriginalName();
            $uploadPath = 'public/uploads/permukiman/peta/'.$id ; //.'/'.$name.'.'.$extension;
            //$path = $file->storeAs($uploadPath, 'public');
            $path = $file->storeAs($uploadPath, $file->getClientOriginalName());
            return $path;
            //$file_bast = $file->getClientOriginalName();
            //$file_bast = basename($path);
        }
        
        $permukiman = PermukimanModel::find($id);
        $kategoriPsus = KategoriPsuModel::get();

        $opath = 'uploads/permukiman/peta/'.$id.'/geojson/'.$id.'.geojson';
        $inputPath = storage_path($path);
        $outputPath = storage_path($opath);

        // Jalankan command Artisan untuk konversi
        /* $artistanO = Artisan::call('convert:shapefile', [
            'input' => $inputPath,
            'output' => $outputPath
        ]); */

        return asset(Storage::url($opath)); //[Storage::url($opath),$outputPath,$artistanO];
    }

    public function uploadDokumen($id,Request $request)
    {
        $this->middleware('auth');
		
        $this->validate($request, [
            'file' => 'file|mimes:zip,jpg,jpeg,png,doc,docx,xls,xlxs,pdf',
            'id_permukiman' => 'required',
            'nama_file' => '',
            'judul_file' => '',
        ]);

        $path = '';
        $uploadPath = '';
        
        if ($request->file('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $name = $file->getClientOriginalName();
            $uploadPath = 'public/uploads/permukiman/dokumen/'.$id ; //.'/'.$name.'.'.$extension;
            $path = $file->storeAs($uploadPath, $file->getClientOriginalName());
        }
        
        $dt = [
            'nama_file' => $path,
            'id_permukiman' => $id,
            'judul_file' => basename($path),
        ];

        $dokumen = PermukimanDokumenModel::create($dt);

        return $dokumen->toJson(); //[Storage::url($opath),$outputPath,$artistanO];
    }

    public function generateShp($id,Request $request){
        $this->middleware('auth');
		
        $files = $request->input('files');

        $shp = false;
        $shx = false;
        $geojson = false;

        if(!empty($files) and is_array($files) and count($files) > 0)
        {
            foreach($files as $i => $f)
            {
                $f_arr = explode(".",$f);
                $ext = $f_arr[count($f_arr) - 1];
                if($ext == 'shp'){
                    $shp = $f;
                }
                if($ext == 'shx'){
                    $shx = $f;
                }
            }
        }

        //exec("C:/OSGeo4W/bin/ogr2ogr.exe -f GeoJSON C:\wamp\www\si-psu-new\storage\public/uploads/permukiman/peta/6/6.geojson C:\wamp\www\si-psu-new\storage\public/uploads/permukiman/peta/6/Pondok_Indah_V.shp",$output,$result_code);
        //dd($output,$result_code);

        if($shp && $shx)
        {
            $uploadPath = 'app/public/uploads/permukiman/peta/'.$id.'/'.$shp;
            Artisan::call('convert:shapefile', [
                'input' => storage_path($uploadPath),
                'output' => storage_path('app/public/uploads/permukiman/peta/'.$id.'/'.$id.'.geojson')
            ]);

            return asset(Storage::url('public/uploads/permukiman/peta/'.$id.'/'.$id.'.geojson'));

        }else{
            return [$shp,$shx];
        }

    }

    public function update(Request $request, $id)
    {
        $this->middleware('auth');
		
        $this->validate($request, [
            #'provinsi_id' => 'required',
            'kabkota_id' => 'required',
            'kecamatan_id' => 'required',
            'kelurahan_id' => 'required',
            //'pengembang_id' => '',
            'nama_permukiman' => 'required',
            'luas' => '',
            'tahun_siteplan' => '',
            'latitude' => '',
            'longitude' => '',
            //'latlong' => 'required',
            'total_unit' => '',
            'jumlah_mbr' => '',
            'jumlah_nonmbr' => '',
            'no_bast' => '',
            'file_bast' => 'file|mimes:jpg,jpeg,png,pdf',
            'photo' => 'file|mimes:jpg,jpeg,png',
            'siteplan' => 'file|mimes:jpg,jpeg,png',
            'alamat' => 'required',
            'status_data' => 'required',
            'nama_pengembang' => 'required',
            'telepon_pengembang' => '',
            'email_pengembang' => '',
            'jumlah_proses' => '',
            'jumlah_ditempati' => '',
            'jumlah_kosong' => '',
            //'user_id_create' => 'required',
            //'user_id_update' => 'required',
            //'created_at' => 'required',
            //'updated_at' => 'required',
        ]);

        $user_id = Auth::user()->id;

        $file_bast = '';
        $photo = '';
        $siteplan = '';
        
        if ($request->file('file_bast')) {
            $file = $request->file('file_bast');
            $path = $file->store('uploads/permukiman/file_bast', 'public');
            //$file_bast = $file->getClientOriginalName();
            //$file_bast = basename($path);
            $file_bast = $path;
        }
        
        if ($request->file('photo')) {
            $file = $request->file('photo');
            $path = $file->store('uploads/permukiman/photo', 'public');
            //$photo = $file->getClientOriginalName();
            //$photo = basename($path);
            $photo = $path;
        }
        
        if ($request->file('siteplan')) {
            $file = $request->file('siteplan');
            $path = $file->store('uploads/permukiman/siteplan', 'public');
            //$siteplan = $file->getClientOriginalName();
            //$siteplan = basename($path);
            $siteplan = $path;
        }
        
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $latlong = (empty($latitude.$longitude))?null:new Point($latitude,$longitude, Srid::WGS84->value);
        $permukiman = PermukimanModel::find($id);
        $permukiman->provinsi_id = 63;
        $permukiman->kabkota_id = $request->input('kabkota_id');
        $permukiman->kecamatan_id = $request->input('kecamatan_id');
        $permukiman->kelurahan_id = $request->input('kelurahan_id');
        //$permukiman->pengembang_id = $request->input('pengembang_id');
        $permukiman->nama_permukiman = $request->input('nama_permukiman');
        $permukiman->luas = $request->input('luas');
        $permukiman->tahun_siteplan = $request->input('tahun_siteplan');
        $permukiman->latitude = $request->input('latitude');
        $permukiman->longitude = $request->input('longitude');
        $permukiman->latlong = $latlong;
        $permukiman->total_unit = $request->input('total_unit');
        $permukiman->jumlah_mbr = $request->input('jumlah_mbr');
        $permukiman->jumlah_nonmbr = $request->input('jumlah_nonmbr');
        $permukiman->no_bast = $request->input('no_bast');
        //$permukiman->file_bast = $request->input('file_bast');
        //$permukiman->photo = $request->input('photo');
        //$permukiman->siteplan = $request->input('siteplan');
        $permukiman->alamat = $request->input('alamat');
        $permukiman->nama_pengembang = $request->input('nama_pengembang');
        $permukiman->telepon_pengembang = $request->input('telepon_pengembang');
        $permukiman->email_pengembang = $request->input('email_pengembang');
        $permukiman->jumlah_proses = $request->input('jumlah_proses');
        $permukiman->jumlah_ditempati = $request->input('jumlah_ditempati');
        $permukiman->jumlah_kosong = $request->input('jumlah_kosong');
        //$permukiman->user_id_create = $request->input('user_id_create');
        $permukiman->user_id_update = $user_id;
        //$permukiman->created_at = $request->input('created_at');
        $permukiman->updated_at = date("Y-m-d H:i:s");
        
        if(!empty($file_bast))
        {
            $permukiman->file_bast = $file_bast;
        }
        if(!empty($photo))
        {
            $permukiman->photo = $photo;
        }
        if(!empty($siteplan))
        {
            $permukiman->siteplan = $siteplan;
        }


        $permukiman->save();


        return redirect()->route('admin.permukiman.index')
            ->with('success', 'Permukiman berhasil diubah');
    }

    public function destroy(PermukimanModel $permukiman, Request $request)
    {
        $this->middleware('auth');
		
        $permukiman->delete();
        return redirect()->route('admin.permukiman.index')
            ->with('success', 'Permukiman telah dihapus');
    }

	
    public function exportXls(Request $request)
    {
        $filters = $request->all();
        return Excel::download(new PermukimanExport($filters), 'data-perumahan-'.date('Ymdhis').'.xlsx');
    }
}
