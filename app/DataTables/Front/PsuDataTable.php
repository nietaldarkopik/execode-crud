<?php

namespace App\DataTables\Front;

use App\Models\JenisPsuModel;
use App\Models\PerumahanModel;
use App\Models\PermukimanModel;
use App\Models\PsuModel;
use App\Models\PsuPermukimanModel;
use App\Models\PsuPerumahanModel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Http\Request;
use DB;
use Termwind\Components\Raw;

class PsuDataTable extends DataTable
{
    //protected $actions = ['print', 'excel'];

    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query, Request $request): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('aksi', 'front.datatables.psu_action')
            ->addColumn('number', 0)
            ->addColumn('id_jenis_psu', function ($psu) {
                return JenisPsuModel::find($psu->id_jenis_psu)->title ?? '';
            })
            ->addColumn('id_psu', function ($psu) {
                return PsuModel::find($psu->id_psu)->judul ?? '';
            })
            ->addColumn('id_permukiman', function ($psu) {
                if($psu->jenis_perkim == 'perumahan')
                {
                    return PerumahanModel::find($psu->id_permukiman)->nama_perumahan ?? $psu->id_permukiman;
                }else{
                    return PermukimanModel::find($psu->id_permukiman)->nama_permukiman ?? $psu->id_permukiman;
                }
            })
            ->filterColumn('jenis_perkim', function ($query, $keywords) use ($request) {
                $query->having('jenis_perkim','like','%'.$keywords.'%');
            })
            /* ->editColumn('kategori', function (PsuPermukimanModel $psu) {
                return $psu->getKategori()->first()?->title;
            }) 
            ->filterColumn('kategori', function ($query, $keywords) use ($request) {
                $query->where('kategori','like','%'.$keywords.'%');
                })
            */
			->rawColumns(['aksi','number'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PsuPermukimanModel $model,Request $request)
    {
        $psuPerumahan = PsuPerumahanModel
            ::select(
            DB::raw("('perumahan') as jenis_perkim"),
            'psu_perumahan.id',
            'id_perumahan as id_permukiman',
            'id_jenis_psu',
            'id_kategori',
            'id_psu',
            'nama_psu',
            'deskripsi',
            'bast_status',
            'bast_file',
            'bast_tanggal',
            'kondisi',
            //'latitude',
            //'longitude',
            //'latlong',
            'psu_perumahan.photo',
			DB::raw('perumahan.kabkota_id as kabkota_id'),
			DB::raw('perumahan.kecamatan_id as kecamatan_id'),
			DB::raw("perumahan.nama_perumahan as nama_perkim"),
        )->join('perumahan','id_perumahan','=','perumahan.id')->whereNull('perumahan.deleted_at');
		
		/* ->with('getPerumahan',function($query){
			$query->select('kabkota_id','kecamatan_id');
		})->whereHas('getPerumahan'); */

        $psuPermukiman = $model->newQuery();
        $psuPermukiman->select(
            DB::raw("('permukiman') as jenis_perkim"),
            'psu_permukiman.id',
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
            //'latitude',
            //'longitude',
            //'latlong',
            'psu_permukiman.photo',
			DB::raw('permukiman.kabkota_id as kabkota_id'),
			DB::raw('permukiman.kecamatan_id as kecamatan_id'),
			DB::raw("permukiman.nama_permukiman as nama_perkim"),
		)->join('permukiman','id_permukiman','=','permukiman.id')->whereNull('permukiman.deleted_at');
		
		/* ->with('getPermukiman',function($query){
			$query->select('kabkota_id','kecamatan_id');
		})->whereHas('getPermukiman'); */


        $columns = $request->columns ?? [];
        $search = $request->search ?? [];
		
		if ($request->has('kabkota_id') && $request->input("kabkota_id") != '') {
			$psuPerumahan->where('kabkota_id', '=', $request->input("kabkota_id"));
		  }

		if ($request->has('kecamatan_id') && $request->input("kecamatan_id") != '') {
			$psuPerumahan->where('kecamatan_id', '=', $request->input("kecamatan_id"));
		}

		if ($request->has('jenis_perkim') && $request->input("jenis_perkim") != '') {
			$psuPerumahan->having('jenis_perkim', 'like', $request->input("jenis_perkim"));
		}
		if ($request->has('id_kategori_psu') && $request->input("id_kategori_psu") != '') {
			$psuPerumahan->where('id_kategori', 'like', $request->input("id_kategori_psu"));
		}
		
		
		if ($request->has('id_jenis_psu') && $request->input("id_jenis_psu") != '') {
			$psuPerumahan->where('id_jenis_psu', 'like', $request->input("id_jenis_psu"));
		}
		
		
		if ($request->has('id_psu') && $request->input("id_psu") != '') {
			$psuPerumahan->where('id_psu', 'like', $request->input("id_psu"));
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

		if ($request->has('kabkota_id') && $request->input("kabkota_id") != '') {
			$psuPermukiman->where('kabkota_id', '=', $request->input("kabkota_id"));
		  }

		if ($request->has('kecamatan_id') && $request->input("kecamatan_id") != '') {
			$psuPermukiman->where('kecamatan_id', '=', $request->input("kecamatan_id"));
		}

		if ($request->has('jenis_perkim') && $request->input("jenis_perkim") != '') {
			$psuPermukiman->having('jenis_perkim', 'like', $request->input("jenis_perkim"));
		}
		
		
		if ($request->has('id_kategori_psu') && $request->input("id_kategori_psu") != '') {
			$psuPermukiman->where('id_kategori', 'like', $request->input("id_kategori_psu"));
		}
		
		
		if ($request->has('id_jenis_psu') && $request->input("id_jenis_psu") != '') {
			$psuPermukiman->where('id_jenis_psu', 'like', $request->input("id_jenis_psu"));
		}
		
		
		if ($request->has('id_psu') && $request->input("id_psu") != '') {
			$psuPermukiman->where('id_psu', 'like', $request->input("id_psu"));
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

		/* $psuPermukiman->where(function($q0) use ($columns,$request){
			
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

        //$psuPermukiman->unionAll($psuPerumahan);

		//$q = DB::table(DB:Raw("(".$psuPermukiman->union($psuPerumahan)->toSql().") as permukiman"));
		$sql = $psuPermukiman->unionAll($psuPerumahan);
		//$q = DB::table(DB::raw('(' . $sql . ') as permukiman'))->newQuery();
		
		$order = $request->input("order");
		if(is_array($order) and count($order) > 0)
		{
			foreach($order as $i => $o)
			{
				$sql->orderBy($o['name'] ?? 'id',$o['dir'] ?? 'asc');
			}
		}

        return $sql;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('psus-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->buttons([
                //Button::make('excel'),
                //Button::make('csv'),
                //Button::make('pdf'),
                //Button::make('print'),
                //Button::make('reset'),
                //Button::make('reload'),
                //Button::make('searchPanes'),
            ])
            //dom:'lBfrtip',
            ->dom('lBfrtip')
            
            //->destroy(true)
            //->fixedHeader(true)
            //->responsive(true)
            //->serverSide(true)
            //->stateSave(true)
            //->processing(true)
            //->pageLength(100)
            //->dom($this->domHtml)

            ->orderBy(2)
            ->selectStyleSingle()
            ->parameters([
                'drawCallback' => 'function() { $(\'[data-tooltip]\').tooltip({}); }',
                'initComplete' => 'function () {
                    /* window.LaravelDataTables["psus-table"].buttons().container()
                     .appendTo( ".justify-content-stretch") */
                 }',
                'responsive' => [
                    'details' => true
                ],
                'buttons' => [
                    //Button::make('excel'),
                    //Button::make('csv'),
                    //Button::make('pdf'),
                    //Button::make('print'),
                    //Button::make('reset'),
                    //Button::make('reload'),
                    //Button::make('searchPanes'),
                    
                    'excel',
                    'csv',
                    'pdf',
                    'print',
                    'reset',
                    'reload',
                    'searchPanes',
                ],
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('aksi')
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('text-center'),
            Column::computed('number')
            ->title('#')
            ->render('meta.row + meta.settings._iDisplayStart + 1;')
            ->width(50)
            ->orderable(false)
            ->searchable(false),
            //Column::make('kabkota_id')->title('Kabupaten/Kota')->searchable(true)->visible(false),
            //Column::make('kecamatan_id')->title('Kecamatan')->searchable(true)->visible(false),
            Column::make('jenis_perkim')->title('Jenis Perkim')->searchable(true),
            Column::make('id_permukiman')->title('Nama Perkim')->searchable(true),
            //Column::make('id_kategori')->title('Kategori')->searchable(true),
            Column::make('id_jenis_psu')->title('Jenis PSU')->searchable(true),
            Column::make('id_psu')->title('PSU')->searchable(true),
            Column::make('nama_psu')->title('Nama PSU')->searchable(true),
            //Column::make('deskripsi')->title('Deskripsi')->searchable(true),
            //Column::make('bast_status')->title('Bast Status')->searchable(true),
            //Column::make('bast_file')->title('Bast File')->searchable(true),
            //Column::make('bast_tanggal')->title('Bast Tanggal')->searchable(true),
            //Column::make('latitude')->title('Latitude')->searchable(true),
            //Column::make('longitude')->title('Longitude')->searchable(true),
            //Column::make('jenis_perumahan')->title('Jenis Perumahan')->searchable(true),
            //Column::make('photo')->title('Photo')->searchable(true),
            //Column::make('latlong')->title('Latlong')->searchable(true),
            Column::make('kondisi')->title('Kondisi')->searchable(true),
            //Column::make('created_at')->title('Created At')->searchable(true),
            //Column::make('updated_at')->title('Updated At')->searchable(true),
            //Column::make('deleted_at')->title('Deleted At')->searchable(true),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Psus_' . date('YmdHis');
    }

}
