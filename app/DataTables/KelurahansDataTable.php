<?php

namespace App\DataTables;

use App\Models\KelurahanModel;
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

class KelurahansDataTable extends DataTable
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
            ->addColumn('action', 'vendor.adminlte.kelurahans.datatables_action')
            /* ->addColumn('district_id', function (KelurahanModel $kelurahan) {
                return $kelurahan->getKecamatan()->first()?->name;
            })
            ->addColumn('regency_id', function (KelurahanModel $kelurahan) {
                return $kelurahan->getKabupatenKota()->first()->name;
            }) */
            /* ->addColumn('district_id', function (KelurahanModel $kelurahan) {
                return $kelurahan->getKecamatan()->first()?->name;
            })
            ->addColumn('regency_id', function (KelurahanModel $kelurahan) {
                return $kelurahan->getKabupatenKota()->first()->name;
            }) */
            /* ->addColumn('district_id', function (KelurahanModel $kelurahan) {
                return $kelurahan->getKecamatan()->first()?->id;
            })
            ->addColumn('regency_id', function (KelurahanModel $kelurahan) {
                return $kelurahan->getKecamatan()->first()?->getKabupatenKota()->first()?->id;
            }) */
            /* ->addColumn('regency_name', function (KelurahanModel $kelurahan) {
                return $kelurahan->getKecamatan()->first()?->getKabupatenKota()->first()?->name;
            })
            ->addColumn('district_name', function (KelurahanModel $kelurahan) {
                return $kelurahan->getKecamatan()->first()?->name;
            }) */
            ->filterColumn('regency_id', function ($query, $keywords) use ($request) {
                $query->orWhere('regency_id', 'like', $keywords);
                /* $columns = $request->columns ?? [];
                $query->where(function($query1) use ($columns,$keywords){
                    if (count($columns) > 0) {
                        foreach ($columns as $i => $c) {
                            if (isset ($c['search'])) {
                                $query1->orWhere($c['data'], 'like', '%'.$keywords.'%');
                            }
                        }
                    }
                }); */
            })
            ->filterColumn('district_id', function ($query, $keywords) use ($request) {
                $query->orWhere('district_id', 'like', $keywords);
                /* 
                $columns = $request->columns ?? [];
                $query->where(function($query1) use ($columns,$keywords){
                    if (count($columns) > 0) {
                        foreach ($columns as $i => $c) {
                            if (isset ($c['search'])) {
                                $query1->orWhere($c['data'], 'like', '%'.$keywords.'%');
                            }
                        }
                    }
                }); */
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(KelurahanModel $model,Request $request): QueryBuilder
    {
        
        $q =  $model
            ->join("districts", "villages.district_id", "=", "districts.id")
            ->join("regencies", "districts.regency_id", "=", "regencies.id")
            ->join("provinces", "regencies.province_id", "=", "provinces.id")
            ->where("provinces.id", "=", 63)
            ->select(["regencies.province_id", "districts.regency_id", "regencies.name as regency_name", "districts.name as district_name", "villages.name as village_name","villages.*"]);

        //return $q;
        
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
            ->setTableId('kelurahans-table')
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
            Column::make('regency_id')->title('Kabupaten/Kota ID')->width(100),
            Column::make('regency_name','regencies.name')->title('Kabupaten/Kota'),
            Column::make('district_id')->title('Kecamatan ID')->width(100),
            Column::make('district_name','districts.name')->title('Kecamatan'),
            Column::make('name','villages.name')->title('Kelurahan'),
            //Column::make('name'),
            //Column::make('alt_name'),
            Column::make('latitude','villages.latitude'),
            Column::make('longitude','villages.longitude'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Kelurahans_' . date('YmdHis');
    }

}
