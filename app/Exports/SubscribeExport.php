<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class SubscribeExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function  headings():array
    {
        return [
            'id',
            'email'
        ];
    }

     /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $exports = DB::table('subscribes')->select('id','email')->get();

        return $exports;
    }
}
