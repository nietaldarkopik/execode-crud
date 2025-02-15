<?php

namespace Modules\Member\DataTables;

use Modules\Member\App\Models\MemberModel;
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
use Carbon\Carbon;

class MemberDataTable extends DataTable
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
            ->addColumn('action', 'member::admin.member.datatables_action')
            ->addColumn('tanggal_lahir', function($content){
				return Carbon::parse($content->tanggal_lahir)->format('d/m/Y');
			})
            /* ->addColumn('slug', function($content){
				return '<a href="'.route('front.member.detail',['slug' => $content->slug]).'" target="_blank" title="Buka Ditab baru">'.$content->slug.' <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>';
			}) */
            ->addColumn('photo', function($content){
				if(!empty($content->photo)) // and file_exists($content->photo))
				{
					return '<img class="img img-thumbnail" src="'.asset(Storage::url($content->photo)).'" width="300"/>';
				}else{

				}
			})
            /* ->addColumn('getKategori', function (MemberModel $perumahan) {
                return $perumahan->getKategori->title;
            }) */
            /* ->editColumn('kategori', function (MemberModel $perumahan) {
                return $perumahan->getKategori()->first()?->title;
            }) 
            ->filterColumn('kategori', function ($query, $keywords) use ($request) {
                $query->where('kategori','like','%'.$keywords.'%');
            })*/
			->rawColumns(['action','title','photo'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(MemberModel $model,Request $request): QueryBuilder
    {
        $q =  $model->newQuery();
		$q->with(['member_type','geup']);
		return $q;
        //return $q->orderBy('id','desc');
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
			Column::make('photo')->title('Photo')->searchable(false)->visible(true)->width(200)->orderable(false),
			Column::make('nama')->title('Nama')->searchable(true)->visible(true)->orderable(true),
			Column::make('member_type.title')->title('Member Type')->searchable(true)->visible(true)->orderable(true),
			Column::make('tempat_lahir')->title('Tempat Lahir')->searchable(true)->visible(true)->orderable(true),
			Column::make('tanggal_lahir')->title('Tanggal Lahir')->searchable(true)->visible(true)->orderable(true),
			Column::make('alamat')->title('Alamat')->searchable(true)->visible(true)->orderable(true),
			Column::make('geup.title')->title('Geup')->searchable(true)->visible(true)->orderable(true),
			Column::make('no_reg')->title('No Reg')->searchable(true)->visible(true)->orderable(true),
			//Column::make('id_user')->title('User')->searchable(true)->visible(true),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Member_' . date('YmdHis');
    }

}
