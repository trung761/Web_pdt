<?php
namespace App\Exports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
class excel_search_full implements FromCollection
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
            ['STT', 'PID',  'Họ và tên','Ngày sinh','Phiên khám','Giới tính','Danh mục','Chi tiết danh mục','Giá','Thời gian khám']
        ]);
        $data = $this->data;
        $stt = 1; 
        foreach ($data as $row) {
            $sex = ($row->sex == 1) ? 'Nữ' : (($row->sex == 0) ? 'Nam' : ''); 
            $PID = "'".$row->PID;
            $data_ex->push([
                $stt++,
                $PID,
                $row->name_patient,
                $row->birthday,
                $row->id_session,
                $sex,
                $row->name_category,
                $row->name_details_test,
                $row->price,
                $row->created_at,

            ]);
        }
        return $data_ex;
    }
    
}
