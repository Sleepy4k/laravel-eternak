<?php

namespace App\Imports\Setting;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AccountImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'username'                      => $row['username'],
            'email'                         => $row['email'],
            'whatsapp_number'               => $row['whatsapp_number'],
            'password'                      => $row['password']
        ]);
    }
}
