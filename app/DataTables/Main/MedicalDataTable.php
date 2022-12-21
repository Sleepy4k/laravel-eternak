<?php

namespace App\DataTables\Main;

use App\Models\MedicalRecord;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class MedicalDataTable extends DataTable
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
            ->addColumn('action', function($query){
                return '<a href="'.route("medical.edit", $query->id).'"><i class="fa-solid fa-pen-to-square"></i></a> | <form action="'.route("medical.destroy", $query->id).'" method="post" style="display: inline-block">'.csrf_field().method_field("DELETE").'<a href="" class="confirm-delete"><i class="fa-solid fa-trash"></i></a></form>';
            })
            ->editColumn('note', function($query){
                if (empty($query->note)) {
                    return '-';
                } else {
                    return $query->note;
                }
            })
            ->editColumn('date', function($query){
                return $query->date->format('d - m - Y');
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\MedicalRecord $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(MedicalRecord $model)
    {
        return $model->where('livestock_id', request()->segment(4))->latest();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('medicaldatatable-table')
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
                    ->title(trans('table.medical.id'))
                    ->addClass('text-center'),
            Column::make('age')
                    ->title(trans('table.medical.age'))
                    ->addClass('text-center'),
            Column::make('weight')
                    ->title(trans('table.medical.weight'))
                    ->addClass('text-center'),
            Column::make('height')
                    ->title(trans('table.medical.height'))
                    ->addClass('text-center'),
            Column::make('status')
                    ->title(trans('table.medical.status'))
                    ->addClass('text-center'),
            Column::make('note')
                    ->title(trans('table.medical.note'))
                    ->addClass('text-center'),
            Column::make('date')
                    ->title(trans('table.medical.date'))
                    ->addClass('text-center'),
            Column::computed('action')
                    ->title(trans('table.medical.action'))
                    ->exportable(false)
                    ->printable(false)
                    ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Medical_' . date('YmdHis');
    }
}