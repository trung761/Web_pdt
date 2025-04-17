<?php
namespace App\Exports;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;



class Excel_patient_management implements FromCollection
{

    public function __construct()
    {
        
    }
    public function collection()
    {     
        $sql = DB::table(DB::raw('(SELECT *, ROW_NUMBER() OVER (ORDER BY PID) AS thutu FROM patient) AS subquery'))
        ->where('status', 1)
        ->get();

        $data_ex = new Collection([
            ['STT','Họ tên bệnh nhân', 'PID','Ngày sinh', 'CCCD', 'Số điện thoại', 'Giới tính', 'Địa chỉ'],
        ]);

        foreach ($sql as $value) {
            $gender = $value->sex == 0 ? 'Nam' : 'Nữ';
            $data_ex->push([
                $value-> thutu,
                $value->name_patient,
                $value->PID,

                $value->birthday,
                $value->ID_card_patient,
                $value->phone,
                $gender,
                $value->address,
            ]);
        }

        return $data_ex;
    }
}