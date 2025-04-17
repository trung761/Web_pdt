<?php
namespace App\Exports;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;



class Excel_staffs implements FromCollection
{

    public function __construct()
    {
        
    }
    public function collection()
    {     
        $sql = DB::table('24_accountsadmin')
        ->select(
            'staff.*', 
            'position.name_position', 
            'category_test.name_category', 
            '24_accountsadmin.user_name',
            '24_accountsadmin.id as id_nv',
            '24_accountsadmin.email_account'
        )
        ->Join('staff', 'staff.id_staff', '=', '24_accountsadmin.id')
        ->leftjoin('category_test', 'staff.id_category', '=', 'category_test.id')
        ->leftjoin('position', 'staff.id_position', '=', 'position.id')
      
        ->get();

        // Khởi tạo Collection với tiêu đề
        $data_ex = new Collection([
            ['STT','Mã nhân viên', 'Tên nhân viên','Gmail', 'Chức vụ', 'Nhóm xét nghiệm','CCCD', 'Số điện thoại','Ngày sinh', 'Giới tính','Địa chỉ'],
        ]);

        // Lặp qua từng bệnh nhân và thêm dữ liệu vào Collection
        foreach ($sql as $index => $value) {
            $gender = $value->sex == 0 ? 'Nam' : 'Nữ';
            $data_ex->push([
                $index + 1,
                $value->id_show,
                $value->name_staff,
                $value->email_account, 
                $value->name_position,
                $value->name_category,
                $value->ID_card_staff,
                $value->phone,
               
                $value->dateOfBirth,
                $gender,
               
                $value->address,
            ]);
        }

        return $data_ex;
    }
}