<?php
namespace App\Exports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;

class Excel_statistical implements FromCollection
{
    use Exportable;

    private $data;
 

    public function __construct($data)
    {
        $this->data = $data;
      
    }

    public function collection()
    {
        $data_ex = new Collection([
            ['STT', 'Năm',  'Doanh thu']
        ]);
        $data = $this->data;
        $stt = 1; 
        foreach ($data as $row) {
            
            $data_ex->push([
                $stt++,
                $row->Year,
                $row->total_revenue
            ]);
        }
        return $data_ex;
    }
}
