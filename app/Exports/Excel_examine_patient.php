<?php
namespace App\Exports;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;



class Excel_examine_patient implements FromCollection
{

    public function __construct()
    {
        
    }
    public function collection()
    {     
        $sql = DB::table('regis_session')
                ->join('patient', 'regis_session.id_patient', '=', 'patient.id') 
                ->join('staff', 'regis_session.id_staff', '=', 'staff.id') 
                ->select(
                    DB::raw('ROW_NUMBER() OVER (ORDER BY regis_session.id) AS stt'),
                    'regis_session.id',
                    'regis_session.create_at',
                    'regis_session.id_session',
                    'regis_session.status',
                    'patient.name_patient as name_patient',
                    'staff.name_staff as name_staff',
                    'patient.PID as PID'
                )
                ->whereIn('regis_session.status', [1, 2])
                ->get()
                ->map(function ($item) {
                    if ($item->status == 1) {
                        $item->status_text = 'Đã đăng ký';
                    } elseif ($item->status == 2) {
                        $item->status_text = 'Đang xử lí';
                    }
                    elseif ($item->status == 3) {
                        $item->status_text = 'Hoàn thành ';
                    }
                    elseif ($item->status == 4) {
                        $item->status_text = 'Có kết quả';
                    }
                    return $item;
                });

    
                $data_ex = new Collection([
                    ['STT', 'Họ tên bệnh nhân', 'Bác sĩ đăng ký', 'Phiên đăng ký', 'Thời gian đăng ký', 'Trạng thái hồ sơ'],
                ]);
                
                foreach ($sql as $value) { 
                    $data_ex->push([
                        $value->stt,
                        $value->name_patient, 
                        $value->name_staff, 
                        $value->id_session,
                        $value->create_at, 
                        $value->status_text 
                    ]);
                }
        
            return $data_ex;
    }
}