<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ContactDataExport implements FromCollection,WithHeadings
{

    /**
     * Heading Name
     *
     * @return \Illuminate\Http\Response
     */
    public function headings():array{
        return [
            'sl',
            'Full Name',
            'Company Name',
            'Email',
            'Phone',
            'Are you looking to buy calls (Advertiser) or Sell Calls (Publisher)?',
            'Preferred Industry Verticals',
            'How did you find us',
            'Country',
            'Description'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $exports = DB::table('contact_forms')->select('id','full_name','company_name','email','phone_number','buy_sell','preferred_verticals','how_did_find_us','country','description')->get();

        return $exports;
    }
}
