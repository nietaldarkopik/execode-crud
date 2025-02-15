<?php

namespace App\DataTables;

use App\Models\JenisPsuModel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Http\Request;

class JenisPsusDataTable extends DataTable
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
            ->addColumn('action', 'vendor.adminlte.jenispsus.datatables_action')
            /* ->addColumn('getKategori', function (JenisPsuModel $jenispsu) {
                return $jenispsu->getKategori->title;
            }) */
            /* ->editColumn('kategori', function (JenisPsuModel $jenispsu) {
                return $jenispsu->getKategori()->first()?->title;
            }) */
            ->filterColumn('kategori', function ($query, $keywords) use ($request) {
                $query->where('kategori','like','%'.$keywords.'%');
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(JenisPsuModel $model,Request $request): QueryBuilder
    {
        $q =  $model->join("kategori_psu", "jenis_psu.kategori", "=", "kategori_psu.id")->select(['kategori_psu.title as kategori_name','jenis_psu.*']);

        
        $columns = $request->columns ?? [];
        $q->where(function($query) use ($columns) {
            if (count($columns) > 0) {
                foreach ($columns as $i => $c) {
                    if (isset ($c['search'])) {
                        $query->orWhere($c['data'], 'like', '%'.$c['search']['value'].'%');
                    }
                }
            }
        });

        return $q;
        //return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('jenispsus-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(2)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload'),
                Button::make('searchPanes'),
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
            Column::make('kategori','kategori')->title('Kategori PSU ID')->width(130),
            Column::make('kategori_name','kategori_psu.title')->title('Kategori PSU')->searchable(true),
            Column::make('title','jenis_psu.title')->searchable(true),
            Column::make('deskripsi','jenis_psu.deskripsi')->searchable(true),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'JenisPsus_' . date('YmdHis');
    }

}
