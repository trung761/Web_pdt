<?php
namespace App\Exports;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;



class Excel_service_detail implements FromCollection
{

    public function __construct()
    {
        
    }
    public function collection()
    {     
        $sql = DB::table('details_test')
        ->join('category_test', 'details_test.id_category_test', '=', 'category_test.id')
        ->select('details_test.*', 'category_test.name_category')
        ->where('details_test.status', 1)
        ->get();

        $data_ex = new Collection([
            ['STT','Tên xét nghiệm', 'Tên nhóm xét nghiệm', 'Trị số bình thường', 'Đơn vị', 'Giá'],
        ]);
        foreach ($sql as $value) {
            $stt = 1;
            $symbol = ''; 
            switch ($value->normal_value_start) {
                case -100: $symbol = "> "; break;
                case -110: $symbol = "< "; break;
                case -120: $symbol = "= "; break;
                case -130: $symbol = "≥ "; break;
                case -140: $symbol = "≤ "; break;
                default: $symbol = "{$value->normal_value_start} - ";
            }

            $formattedValue = "{$symbol}{$value->normal_value_end}";
            $data_ex->push([
                $stt++,
                $value->name_details_test,
                $value->name_category,
                $formattedValue,
                $value->unit,
                $value->price,
            ]);
        }

        return $data_ex;
    }
}