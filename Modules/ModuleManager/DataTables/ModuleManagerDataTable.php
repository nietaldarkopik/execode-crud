<?php

namespace Modules\ModuleManager\DataTables;

use Modules\ModuleManager\App\Models\ModuleManagerModel;
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

class ModuleManagerDataTable extends DataTable
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
            ->addColumn('action', 'module_manager::admin.module_manager.datatables_action')
            ->addColumn('created_at', function($content){
				return $content->created_at->format('d/m/Y H:i:s');
			})
            ->addColumn('updated_at', function($content){
				return $content->updated_at->format('d/m/Y H:i:s');
			})
            ->addColumn('slug', function($content){
				return '<a href="'.route('admin.module_manager.show',$content).'" target="_blank" title="Buka Ditab baru">'.$content->slug.' <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>';
			})
            ->addColumn('image', function($content){
				if(!empty($content->image)) // and file_exists($content->image))
				{
					return '<img class="img img-thumbnail" src="'.asset(Storage::url($content->image)).'" width="300"/>';
				}else{

				}
			})
            /* ->addColumn('getKategori', function (ModuleManagerModel $module-manager) {
                return $module-manager->getKategori->title;
            }) */
            /* ->editColumn('kategori', function (ModuleManagerModel $module-manager) {
                return $module-manager->getKategori()->first()?->title;
            }) 
            ->filterColumn('kategori', function ($query, $keywords) use ($request) {
                $query->where('kategori','like','%'.$keywords.'%');
            })*/
			->rawColumns(['action','slug','image'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ModuleManagerModel $model,Request $request): QueryBuilder
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
            ->setTableId('module-managers-table')
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
                    /* window.LaravelDataTables["module-managers-table"].buttons().container()
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
			Column::make('name')->title('Name')->searchable(true)->visible(true),
			Column::make('slug')->title('Slug')->searchable(true)->visible(true),
			Column::make('description')->title('Description')->searchable(true)->visible(false),
			Column::make('priority')->title('Priority')->searchable(true)->visible(true),
			Column::make('status')->title('Status')->searchable(true)->visible(true),
			//Column::make('description')->title('description')->searchable(true)->visible(true),
			//Column::make('meta_title')->title('meta_title')->searchable(true)->visible(true),
			//Column::make('meta_keywords')->title('meta_keywords')->searchable(true)->visible(true),
			//Column::make('meta_description')->title('meta_description')->searchable(true)->visible(true),
			#Column::make('created_at')->searchable(true)->visible(true),
			#Column::make('updated_at')->searchable(true)->visible(true),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ModuleManager_' . date('YmdHis');
    }

}
