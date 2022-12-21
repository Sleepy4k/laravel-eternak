<?php

namespace App\Imports\System;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class MenuImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
    }
}
