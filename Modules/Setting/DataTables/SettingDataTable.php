<?php

namespace Modules\Setting\DataTables;

use Modules\Setting\App\Models\SettingModel;
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

class SettingDataTable extends DataTable
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
            ->addColumn('action', 'setting::admin.setting.datatables_action')
            ->addColumn('value', function($content){
				if(!empty($content->value) && $content->type == 'file') // and file_exists($content->value))
				{
					$ext = explode(".",$content->value);
					$ext = $ext[count($ext) - 1];
					if(in_array($ext,['jpg','jpeg','png','gif']))
					{
						return '<img class="img img-thumbnail" src="'.asset(Storage::url($content->value)).'" width="100"/>';
					}else{
						return '<a href="'.asset(Storage::url($content->value)).'" target="_blank">View</a>';
					}
				}else{
					return $content->value;
				}
			})
            /* ->addColumn('getKategori', function (SettingModel $perumahan) {
                return $perumahan->getKategori->title;
            }) */
            /* ->editColumn('kategori', function (SettingModel $perumahan) {
                return $perumahan->getKategori()->first()?->title;
            }) 
            ->filterColumn('kategori', function ($query, $keywords) use ($request) {
                $query->where('kategori','like','%'.$keywords.'%');
            })*/
			->rawColumns(['action','keterangan','value'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(SettingModel $model,Request $request): QueryBuilder
    {
        $q =  $model->newQuery();
        return $q->orderBy('id','desc');
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
			Column::make('code')->title('Code')->searchable(true)->visible(true),
			Column::make('title')->title('Title')->searchable(true)->visible(true),
			Column::make('description')->title('Description')->searchable(true)->visible(true),
			Column::make('value')->title('Value')->searchable(false)->visible(true)->width(300),
			Column::make('type')->title('Type')->searchable(true)->visible(false),
			Column::make('status')->title('Status')->searchable(true)->visible(false),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Setting_' . date('YmdHis');
    }

}
