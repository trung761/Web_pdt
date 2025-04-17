<?php
namespace App\Exports;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;



class Excel_positions implements FromCollection
{

    public function __construct()
    {
        
    }
    public function collection()
    {     
        $sql = DB::table(DB::raw('(SELECT *, ROW_NUMBER() OVER (ORDER BY id_position) AS thutu FROM position) AS subquery'))
        ->where('status', 1)
        ->get();

        // Khởi tạo Collection với tiêu đề
        $data_ex = new Collection([
            ['STT','Tên chức vụ', 'Mã chức vụ'],
        ]);

      
        foreach ($sql as $value) {
            
            $data_ex->push([
                $value-> thutu,
                $value->name_position,
                $value->id_position,
                
            ]);
        }

        return $data_ex;
    }
}