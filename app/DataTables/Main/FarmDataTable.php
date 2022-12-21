<?php

namespace App\DataTables\Main;

use App\Models\FarmData;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class FarmDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->addColumn('medical_records', function($query){
                return '<a href="'.route("medical.show", $query->register_number).'"><i class="fa-solid fa-up-right-from-square"></i></a>';
            })
            ->addColumn('action', function($query){
                return '<a href="'.route("livestock.show", $query->register_number).'"><i class="fa-solid fa-eye"></i></a> | <a href="'.route('livestock.edit', $query->id).'"><i class="fa-solid fa-pen-to-square"></i></a>';
            })
            ->editColumn('birthday', function($query){
                return Date::stringToExcel($query->created_at);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Farm $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(FarmData $model)
    {
        return $model->where('company', request()->user()->company)->latest();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('farm-table')
                    ->columns($this->getColumns())
                    ->language($this->getLanguage())
                    ->minifiedAjax()
                    ->dom('lBfrtip')
                    ->orderBy(0, 'ASC')
                    ->lengthChange(true)
                    ->lengthMenu()
                    ->pageLength(10)
                    ->responsive(true)
                    ->autoWidth(true)
                    ->buttons(
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('copy'),
                        Button::make('reload')
                    )
                    ->ajax([]);
    }

    /**
     * Get language.
     *
     * @return array
     */
    protected function getLanguage()
    {
        return trans('datatable.translate');
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id')
                    ->data('DT_RowIndex')
                    ->title(trans('table.farm.id'))
                    ->addClass('text-center'),
            Column::make('register_number')
                    ->title(trans('table.farm.register_number'))
                    ->addClass('text-center'),
            Column::make('livestock_name')
                    ->title(trans('table.farm.livestock_name'))
                    ->addClass('text-center'),
            Column::make('gender')
                    ->title(trans('table.farm.gender'))
                    ->addClass('text-center'),
            Column::make('birthday')
                    ->hidden(),
            Column::make('weight')
                    ->hidden(),
            Column::make('height')
                    ->hidden(),
            Column::make('lenght')
                    ->hidden(),
            Column::make('racial')
                    ->title(trans('table.farm.racial'))
                    ->addClass('text-center'),
            Column::make('register_number_father')
                    ->hidden(),
            Column::make('register_number_mother')
                    ->hidden(),
            Column::make('status')
                    ->title(trans('table.farm.status'))
                    ->addClass('text-center'),
            Column::computed('medical_records')
                    ->title(trans('table.farm.medical_records'))
                    ->exportable(false)
                    ->printable(false)
                    ->addClass('text-center'),
            Column::computed('action')
                    ->title(trans('table.farm.action'))
                    ->exportable(false)
                    ->printable(false)
                    ->addClass('text-center')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Farm_' . date('YmdHis');
    }
}