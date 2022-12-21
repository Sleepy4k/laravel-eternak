<?php
  
namespace App\Imports\Main;

use App\Traits\RandomNumber;
use App\Models\MedicalRecord;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
  
class MedicalRecordImport implements ToModel, WithHeadingRow
{
    use RandomNumber;

    private $livestock_id;

    public function  __construct($livestock_id)
    {
        $this->livestock_id= $livestock_id;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MedicalRecord([
            'company'                   => request()->user()->company,
            'livestock_id'              => $this->livestock_id,
            'age'                       => $row['umur'],
            'height'                    => $row['tinggi_badan'],
            'weight'                    => $row['berat_badan'],
            'status'                    => $row['status'],
            'note'                      => $row['catatan'],
            'date'                      => $row['tanggal_pencatatan']
        ]);
    }
}