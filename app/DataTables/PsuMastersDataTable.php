<?php

namespace App\DataTables;

use App\Models\PsuModel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Http\Request;

class PsuMastersDataTable extends DataTable
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
            ->addColumn('action', 'vendor.adminlte.psu-masters.datatables_action')
            /* ->editColumn('regency_id', function (PsuModel $psu) {
                return $psu->getKabupatenKota()->first()->id;
            }) */
            ->filterColumn('regency_id', function ($query, $keywords) use ($request) {
                $query->where('regency_id','like','%'.$keywords.'%');
                /* 
                $columns = $request->columns ?? [];
                if (count($columns) > 0) {
                    foreach ($columns as $i => $c) {
                        if (isset ($c['search'])) {
                            $query->where($c['data'], '=', $c['search']['value']);
                        }
                    }
                } */
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PsuModel $model): QueryBuilder
    {
        return $model->join("kategori_psu",  "psu.kategori", "=", "kategori_psu.id")
					->join("jenis_psu", "psu.jenis", "=", "jenis_psu.id")
					->select(["kategori_psu.title as kategori_title","jenis_psu.title as jenis_title","psu.*"]);
        //return $model->newQuery();
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
            //->dom('Bfrtip')
            ->orderBy(1)
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
			Column::make('kategori_title','kategori_title')->title('Kategori'),
			Column::make('jenis_title','jenis_title')->title('Jenis'),
			Column::make('judul')->title('PSU'),
			Column::make('deskripsi'),
            //Column::make('regency_id','regencies.id')->title('Kabupaten/Kota ID')->width(100),
            //Column::make('regency_name','regencies.name')->title('Kabupaten/Kota'),
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
