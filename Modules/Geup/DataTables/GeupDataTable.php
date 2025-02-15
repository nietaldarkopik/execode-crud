<?php

namespace Modules\Geup\DataTables;

use Modules\Geup\App\Models\GeupModel;
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

class GeupDataTable extends DataTable
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
            ->addColumn('action', 'geup::admin.geup.datatables_action')
			->rawColumns(['action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(GeupModel $model,Request $request): QueryBuilder
    {
        $q =  $model->newQuery();
        return $q;
        //return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('geups-table')
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

            ->orderBy(3, 'asc')
            ->selectStyleSingle()
            ->parameters([
                'drawCallback' => 'function() { $(\'[data-tooltip]\').tooltip({}); }',
                'initComplete' => 'function () {
                    /* window.LaravelDataTables["geups-table"].buttons().container()
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
			Column::make('title')->title('Judul')->searchable(true)->visible(true),
			Column::make('sort_order')->title('Urutan')->searchable(true)->visible(true),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Geup_' . date('YmdHis');
    }

}
