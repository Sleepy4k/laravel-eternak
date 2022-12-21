<?php
  
namespace App\Imports\Main;
  
use App\Models\FarmData;
use App\Traits\RandomNumber;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
  
class FarmDataImport implements ToModel, WithHeadingRow
{
    use RandomNumber;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new FarmData([
            'company'                   => request()->user()->company,
            'register_number'           => $this->generateUniqueId('kambing'),
            'livestock_name'            => $row['nama_ternak'],
            'gender'                    => $row['jenis_kelamin'],
            'racial'                    => $row['ras'],
            'birthday'                  => $row['tanggal_lahir'],
            'weight'                    => $row['berat_badan'],
            'length'                    => $row['panjang_badan'],
            'height'                    => $row['tinggi_badan'],
            'register_number_father'    => $row['nomor_induk_pejantan'],
            'register_number_mother'    => $row['nomor_induk_betina'],
            'status'                    => $row['status']
        ]);
    }
}