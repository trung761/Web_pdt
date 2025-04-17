<?php
namespace App\Exports;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;



class Excel_service_group implements FromCollection
{

    public function __construct()
    {
        
    }
    public function collection()
    {     $sql = DB::table(DB::raw('(SELECT *, ROW_NUMBER() OVER (ORDER BY category_test.id) AS thutu FROM category_test) AS subquery'))
        ->where('status', 1)
        ->get();

        // Khởi tạo Collection với tiêu đề
        $data_ex = new Collection([
            ['STT','Tên nhóm xét nghiệm', 'Mã nhóm xét nghiệm'],
        ]);

      
        foreach ($sql as $value) {
            
            $data_ex->push([
                $value-> thutu,
                $value->name_category,
                $value->id_category_test,
                
            ]);
        }

        return $data_ex;
    }
}