<?php

namespace App\DataTables;

use App\Models\PsuAttributeModel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Http\Request;

class AttributePsusDataTable extends DataTable
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
            ->addColumn('action', 'vendor.adminlte.attributepsus.datatables_action')
            /* ->addColumn('getKategori', function (PsuAttributeModel $attributepsu) {
                return $attributepsu->getKategori->title;
            }) */
            /* ->editColumn('id_kategori', function (PsuAttributeModel $attributepsu) {
                return $attributepsu->getKategoriPsu()->first()?->title;
            })
            ->editColumn('id_jenis_psu', function (PsuAttributeModel $attributepsu) {
                return $attributepsu->getJenisPsu()->first()?->title;
            })
            ->editColumn('id_psu', function (PsuAttributeModel $attributepsu) {
                return $attributepsu->getPsu()->first()?->judul;
            }) */
            ->filterColumn('id_kategori', function ($query, $keywords) use ($request) {
				$query->whereHas('getKategoriPsu', function ($query) use ($keywords) {
					$query->where('title', 'like', "%{$keywords}%");
					$query->orWhere('id', '=', "{$keywords}");
				});
            })
            ->filterColumn('id_jenis_psu', function ($query, $keywords) use ($request) {
				$query->whereHas('getJenisPsu', function ($query) use ($keywords) {
					$query->where('title', 'like', "%{$keywords}%");
					$query->orWhere('id', '=', "{$keywords}");
				});
            })
            ->filterColumn('id_psu', function ($query, $keywords) use ($request) {
				$query->whereHas('getPsu', function ($query) use ($keywords) {
					$query->where('judul', 'like', "%{$keywords}%");
					$query->orWhere('id', '=', "{$keywords}");
				});
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PsuAttributeModel $model,Request $request): QueryBuilder
    {
        //$q =  $model->join("kategori_psu", "jenis_psu.kategori", "=", "kategori_psu.id")->select(['kategori_psu.title as kategori_name','jenis_psu.*']);
        $q =  $model->join("kategori_psu", "psu_attributes.id_kategori", "=", "kategori_psu.id");
        $q->join("jenis_psu", function($join){
			$join->on("psu_attributes.id_jenis_psu", "=", "jenis_psu.id");
			$join->on("kategori_psu.id", "=", "jenis_psu.kategori");
		});
        $q->join("psu",function($join){
			$join->on("kategori_psu.id", "=", "psu.kategori");
			$join->on("jenis_psu.id", "=", "psu.jenis");
			$join->on("psu_attributes.id_psu", "=", "psu.id");
			$join->on("psu_attributes.id_kategori", "=", "kategori_psu.id");
			$join->on("psu_attributes.id_jenis_psu", "=", "jenis_psu.id");
		})->select(['kategori_psu.title as kategori_name','jenis_psu.title as jenis_name','psu.judul as psu_name','psu_attributes.*']);

		
        $columns = $request->columns ?? [];
        $search = $request->search ?? '';
		
		if (count($columns) > 0) {
				$q->where(function($query) use ($columns) {
                foreach ($columns as $i => $c) {
					if(isset($c['name']) && in_array($c['name'],['id_kategori','id_jenis','id_psu']) && isset($c['search']) && isset($c['search']['value']) and !empty($c['search']['value']))
					{
						$query->where($c['name'], '=', $c['search']['value']);
					}
                }
			});
		}
		
		
		if(!empty($search) and isset($search['value']) and !empty($search['value']))
		{
			$fillable = (new PsuAttributeModel())->getFillable();
			//$fillable = array_merge($fillable,['kategori_psu.title','jenis_psu.title','psu.judul']);
			$fillable = ['kategori_psu.title','jenis_psu.title','psu.judul','psu_attributes.attribute','psu_attributes.keterangan','psu_attributes.options'];
			
			$q->where(function($query) use ($fillable, $search) {
				foreach($fillable as $i => $f)
				{
					$query->orWhere($f,'like','%'.(str_replace(' ','%',$search['value'])).'%');
				}
			});
		}

        return $q;
        //return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('attributepsus-table')
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
			Column::make('kategori_name','id_kategori')->title('Kategori')->searchable(false),
			Column::make('jenis_name','id_jenis_psu')->title('Jenis Psu')->searchable(false),
			Column::make('psu_name','id_psu')->title('Psu')->searchable(false),
			Column::make('attribute')->title('Attribute')->width(130)->searchable(false),
			Column::make('keterangan')->title('Keterangan')->visible(false)->searchable(false),
			Column::make('options')->title('Options')->visible(false)->searchable(false),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'AttributePsus_' . date('YmdHis');
    }

}
