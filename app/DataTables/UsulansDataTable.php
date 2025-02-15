<?php

namespace App\DataTables;

use App\Models\UsulanModel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Http\Request;
use Storage;

class UsulansDataTable extends DataTable
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
            ->addColumn('action', 'vendor.adminlte.usulans.datatables_action')
			->addColumn('kabkota_id', function (UsulanModel $data) {
				return $data->getKabkota()->first()->name;
			})
			->addColumn('kecamatan_id', function (UsulanModel $data) {
				return $data->getKecamatan()->first()->name;
			})
			->addColumn('kelurahan_id', function (UsulanModel $data) {
				return $data->getKelurahan()->first()->name;
			})
			->addColumn('permukiman_id', function (UsulanModel $data) {
				return $data->getPerumahan()->first()->nama_perumahan;
			})
            ->addColumn('file', function (UsulanModel $data) {
                return '<a href="'.asset(Storage::url($data->file)).'" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Lihat File</a>';
            })
            ->rawColumns(['action','file'])
            /* ->editColumn('kategori', function (UsulanModel $perumahan) {
                return $perumahan->getKategori()->first()?->title;
            }) */
            /* ->filterColumn('kategori', function ($query, $keywords) use ($request) {
                $query->where('kategori','like','%'.$keywords.'%');
            }) */
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(UsulanModel $model,Request $request): QueryBuilder
    {
        $q =  $model->newQuery();

        $columns = $request->columns ?? [];
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

        return $q->orderBy('id','desc');
        //return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('usulans-table')
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
                    /* window.LaravelDataTables["usulans-table"].buttons().container()
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
            Column::make('file')->title('file')->searchable(true)->visible(true),
            Column::make('kabkota_id')->title('Kabkota')->searchable(true)->visible(true),
            Column::make('kecamatan_id')->title('Kecamatan')->searchable(true)->visible(true),
            Column::make('kelurahan_id')->title('Kelurahan')->searchable(true)->visible(true),
            Column::make('permukiman_id')->title('Perumahan')->searchable(true)->visible(true),
            Column::make('judul')->title('Judul')->searchable(true)->visible(true),
            Column::make('keterangan')->title('Keterangan')->searchable(true)->visible(false),
            Column::make('tanggal_usulan')->title('Tanggal_Usulan')->searchable(true)->visible(true),
            Column::make('status')->title('Status')->searchable(true)->visible(true),
            Column::make('user_id_create')->title('Pembuat')->searchable(true)->visible(false),
            Column::make('user_id_update')->title('Pengedit')->searchable(true)->visible(false),
            Column::make('created_at')->title('Tgl Buat')->searchable(true)->visible(false),
            Column::make('updated_at')->title('Tgl Update')->searchable(true)->visible(false),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Usulans_' . date('YmdHis');
    }

}
