<?php

namespace App\DataTables;

use App\Models\KecamatanModel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Http\Request;

class KecamatansDataTable extends DataTable
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
            ->addColumn('action', 'vendor.adminlte.kecamatans.datatables_action')
            /* ->editColumn('regency_id', function (KecamatanModel $kecamatan) {
                return $kecamatan->getKabupatenKota()->first()->id;
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
    public function query(KecamatanModel $model): QueryBuilder
    {
        return $model->join("regencies", "districts.regency_id", "=", "regencies.id")->join("provinces", "regencies.province_id", "=", "provinces.id")->where("provinces.id", "=", 63)->select(["districts.*","regencies.province_id","regencies.name as regency_name","regencies.id as regency_id"]);
        //return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('kecamatans-table')
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
            //Column::make('districts.id'),
            Column::make('regency_id','regencies.id')->title('Kabupaten/Kota ID')->width(100),
            Column::make('regency_name','regencies.name')->title('Kabupaten/Kota'),
            Column::make('name'),
            Column::make('alt_name'),
            Column::make('latitude'),
            Column::make('longitude'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Kecamatans_' . date('YmdHis');
    }

}
