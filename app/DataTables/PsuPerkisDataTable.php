<?php

namespace App\DataTables;

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
use Auth;

class PsuPerkisDataTable extends DataTable
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
            ->addColumn('action', 'vendor.adminlte.psuperkis.datatables_action')
            ->addColumn('nama_perkim', function ($perumahan) {
                $jenis_perkim = $perumahan->jenis_perkim;
                if ($jenis_perkim == 'perumahan') {
                    $perumahan = PsuPerumahanModel::find($perumahan->id);
                    return '<strong>Perumahan</strong><br/> ' . $perumahan->getPerumahan?->nama_perumahan;
                } else {
                    return '<strong>Permukiman</strong><br/> ' . $perumahan->getPermukiman?->nama_permukiman;
                }
            })
            ->addColumn('id_jenis_psu', function (PsuPermukimanModel $perumahan) {
                return $perumahan->getJenisPsu?->title;
            })
            ->addColumn('id_kategori', function (PsuPermukimanModel $perumahan) {
                return $perumahan->getKategori?->title;
            })
            ->addColumn('id_psu', function (PsuPermukimanModel $perumahan) {
                return $perumahan->getPsu?->judul;
            })
            ->rawColumns(['action','id_permukiman', 'nama_perkim'])
            /* ->addColumn('getKategori', function (PsuPermukimanModel $perumahan) {
                return $perumahan->getKategori->title;
            }) */
            /* ->editColumn('kategori', function (PsuPermukimanModel $perumahan) {
                return $perumahan->getKategori()->first()?->title;
            }) */
            ->filterColumn('nama_perkim', function ($query, $keywords) use ($request) {
				$query->having('nama_perkim','like','%'.$keywords.'%');
            })
            ->filterColumn('jenis_perkim', function ($query, $keywords) use ($request) {
				$query->having('jenis_perkim','like','%'.$keywords.'%');
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PsuPermukimanModel $model, Request $request): QueryBuilder
    {
		$userUnit = \App\Models\User::where('id',Auth::user()->id)->with(['unit:user_units.id_kabkota,user_units.id_user'])->get()
		->flatMap(function($user) {
			return $user->unit->pluck('id_kabkota'); // Mengambil id dari relasi unit
		})->toArray();

        $psuPerumahan = PsuPerumahanModel
            ::select(
            DB::raw("('perumahan') as jenis_perkim"),
            DB::raw("(SELECT kabkota_id FROM perumahan WHERE perumahan.id = psu_perumahan.id_perumahan and perumahan.deleted_at is null) as kabkota_id"),
            DB::raw("(SELECT nama_perumahan FROM perumahan WHERE perumahan.id = psu_perumahan.id_perumahan and perumahan.deleted_at is null) as nama_perkim"),
            'id',
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
            'photo'
        );//->with('getPerumahan');

		if(is_array($userUnit) and count($userUnit) > 0)
		{
			$psuPerumahan->havingRaw('kabkota_id IN (' . implode(",",$userUnit). ') and kabkota_id is not null');
		}
		
        $columns = $request->columns ?? [];
        $search = $request->search ?? [];
		$search_value = (isset($search['value']) and !empty($search['value']))?$search['value']:'';

		if(!empty($search_value))
		{
			$psuPerumahan->having("jenis_perkim","like","%".$search_value."%");
			$psuPerumahan->orHaving("nama_perkim","like","%".$search_value."%");
		}
        if (count($columns) > 0) {
            foreach ($columns as $i => $c) {
                $data = $c['data'];

                if (isset($c['search']) and !empty($c['search']) and $data == 'no_bast') {
                    if ($c['search'] == 'Sudah BAST') {
                        $psuPerumahan->where(function ($query) use ($c) {
                            $query->whereNotNull('no_bast')->where('no_bast', '<>', '');
                        });
                    } elseif ($c['search'] == 'Belum BAST') {
                        $psuPerumahan->where(function ($query) use ($c) {
                            $query->where(function ($query1) {
                                $query1->whereNull('no_bast')->orWhere('no_bast', '=', '');
                            });
                        });
                    }
                } else if (isset($c['search']) and !empty($c['search']) and ($data == 'kabkota_id' or $data == 'kecamatan_id' or $data == 'tahun_siteplan')) {
                    $psuPerumahan->where(function ($query) use ($c) {
						if($c['search']['value'] == '-')
						{
							$query->where(function($qq) use ($c){
								$qq->whereNull($c['data']);
								$qq->orWhere($c['data'],'=','');
							});
						}else{
							$query->orWhere($c['data'], 'like', $c['search']['value']);
						}
                    });
                }
            }
        }


        $psuPermukiman = $model->newQuery();
        $psuPermukiman->select(
            DB::raw("('permukiman') as jenis_perkim"),
            DB::raw("(SELECT kabkota_id FROM permukiman WHERE permukiman.id = psu_permukiman.id_permukiman and permukiman.deleted_at is null) as kabkota_id"),
            DB::raw("(SELECT nama_permukiman FROM permukiman WHERE permukiman.id = psu_permukiman.id_permukiman and permukiman.deleted_at is null) as nama_perkim"),
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
            //'latitude',
            //'longitude',
            //'latlong',
            'photo'
        );
		
		if(is_array($userUnit) and count($userUnit) > 0)
		{
			$psuPermukiman->havingRaw('kabkota_id IN (' . implode(",",$userUnit). ') and kabkota_id is not null');
		}
		if(!empty($search_value))
		{
			$psuPermukiman->having("jenis_perkim","like","%".$search_value."%");
			$psuPermukiman->orHaving("nama_perkim","like","%".$search_value."%");
		}


        $finalQuery = $psuPermukiman->union($psuPerumahan);
		/* $unionSql = $q->toSql();
		$unionQuery =  DB::table(DB::raw("($unionSql) as subQuery"))->select("*");


		// Query utama yang menerapkan filter WHERE pada subquery
		$finalQuery = $psuPermukiman->select(DB::raw("({$unionQuery->toSql()}) as final_subquery"))
		->mergeBindings($unionQuery); */

        $columns = $request->columns ?? [];
		

        if (count($columns) > 0) {
            foreach ($columns as $i => $c) {
                $data = $c['data'];

                if (isset($c['search']) and !empty($c['search']) and $data == 'no_bast') {
                    if ($c['search'] == 'Sudah BAST') {
                        $finalQuery->where(function ($query) use ($c) {
                            $query->whereNotNull('no_bast')->where('no_bast', '<>', '');
                        });
                    } elseif ($c['search'] == 'Belum BAST') {
                        $finalQuery->where(function ($query) use ($c) {
                            $query->where(function ($query1) {
                                $query1->whereNull('no_bast')->orWhere('no_bast', '=', '');
                            });
                        });
                    }
                } else if (isset($c['search']) and !empty($c['search']) and ($data == 'kabkota_id' or $data == 'kecamatan_id' or $data == 'tahun_siteplan')) {
                    $finalQuery->where(function ($query) use ($c) {
						if($c['search']['value'] == '-')
						{
							$query->where(function($qq) use ($c){
								$qq->whereNull($c['data']);
								$qq->orWhere($c['data'],'=','');
							});
						}else{
							$query->orWhere($c['data'], 'like', $c['search']['value']);
						}
                    });
                }
            }
        }

		$finalQuery->whereNotNull('id_permukiman');
        return $finalQuery->orderBy('id', 'desc');
        //return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('perumahans-table')
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
                    /* window.LaravelDataTables["perumahans-table"].buttons().container()
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
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
            //Column::make('districts.id'),
            Column::make('row_number')
                ->title('#')
                ->render('meta.row + meta.settings._iDisplayStart + 1;')
                ->width(50)
                ->orderable(false)
                ->searchable(false),
            Column::make('jenis_perkim')->title('Jenis Perkim')->searchable(true)->visible(false),
            Column::make('nama_perkim')->title('Nama')->searchable(true)->visible(true),
            Column::make('id_kategori')->title('Kategori')->searchable(true)->visible(true),
            Column::make('id_jenis_psu')->title('Jenis Psu')->searchable(true)->visible(true),
            Column::make('id_psu')->title('Psu')->searchable(true)->visible(true),
            Column::make('nama_psu')->title('Nama Psu')->searchable(true)->visible(true),
            Column::make('deskripsi')->title('Deskripsi')->searchable(true)->visible(false),
            //Column::make('bast_status')->title('Bast Status')->searchable(true)->visible(true),
            //Column::make('bast_file')->title('Bast File')->searchable(true)->visible(false),
            //Column::make('bast_tanggal')->title('Bast Tanggal')->searchable(true)->visible(true),
            Column::make('kondisi')->title('Kondisi')->searchable(true)->visible(true),
            //Column::make('latitude')->title('Latitude')->searchable(true)->visible(true),
            //Column::make('longitude')->title('Longitude')->searchable(true)->visible(true),
            //Column::make('latlong')->title('Latlong')->searchable(true)->visible(true),
            //Column::make('photo')->title('Photo')->searchable(true)->visible(true),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Perumahans_' . date('YmdHis');
    }

}
