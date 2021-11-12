<?php

namespace App\Exports;

use App\Models\Country;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use PHPUnit\Framework\Constraint\Count;


class CountriesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Country::all();
    }
}
