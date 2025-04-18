<?php

namespace App\Http\Controllers\User\Main;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use PhpOption\Option;
use PhpParser\Node\Expr\FuncCall;
use \App\Http\Controllers\User\Main\InfoUserController;
use \App\Http\Controllers\User\Main\RegisterWishController;

use \App\Http\Controllers\Admin\ExpensesAdminController;

use function PHPUnit\Framework\countOf;

class InstructController extends Controller

{
    public function index(){
        return view('user.main.instruct',
        [
            'title' => "CTUT|Hệ thống đăng ký xét tuyển",
        ]);
    }
     // Từ Controler ExpensesAdminController
    public function load_price($id){
        $price  = DB::table('l_expenses_user')
        ->where('id_user',$id)
        ->sum('price');

        $wish =  DB::table('l_expenses_admin')
        ->where('id_user',$id)
        ->get();

        $price2 =  $price - count($wish)*20000;
        $result = array(
            'price' => $price,
            'price2' => $price2,
            'count' => count($wish),
        );
        return $result;
    }

    public function load_active(){
        $expenses = $this ->load_price(Auth::guard('user')->user()->id);
        $active_reg = DB::table('l_block_wish')
        ->where('id_user',Auth::guard('user')->user()->id)
        ->where('id_batch',1)
        ->get();
        if(count($active_reg) == 1){
            if($active_reg[0]->id_block == 1){
                $active_reg = "Đã đăng ký xét tuyển";
            }else{
                $active_reg = "Chưa đăng ký xét tuyển";
            }
        }else{
            $active_reg = "Chưa đăng ký xét tuyển";
        }


        $check = DB::table('l_check_assuser')
        ->where('id_student',Auth::guard('user')->user()->id)
        ->get();
        if(count($check) == 1){
            if($check[0] ->check_user == 2){
                $check = "Cập nhật lại hồ sơ";
            }else{
                if($check[0] ->pass == 1){
                    $check = "Đã duyệt";
                }else{
                    $check = "Chưa duyệt";
                }
            }
        }else{
            $check = "Chưa duyệt";
        }

        $go_batch = DB::table('l_go')
        ->join('l_wish','l_wish.id','l_go.id_wish')
        ->where('id_user',Auth::guard('user')->user()->id)
        ->get();

        if(count($go_batch) == 1){
            $go = 1;
        }else{
            $go = 0;
        }
        $result = array(
            'ex' => $expenses,
            'reg' => $active_reg,
            'check' => $check,
            'go' => $go,
        );
        return  $result;
    }



    // function chekc_expenses(){
    //     $check = DB::table('l_block_expenses')
    //     ->where('id_user',Auth::guard('user')->user()->id)
    //     ->get();
    //     if(count($check)==1){
    //         return 1;
    //     }else{
    //         return 0;
    //     }
    // }


    // public function load_expenses_wish(){
    //     $check = RegisterWishController::check_reg();
    //     if($check == 0){
    //         return 'check_false';
    //     }else{
    //         $major = DB::table('l_wish')
    //         ->select('name_method','expenses','l_major.id_major as id_major','l_major.name_major as name_major','l_wish.id as id','l_wish.update_at as time','l_wish.number as number' )
    //         ->join('l_method_major','l_method_major.id','l_wish.id_major')
    //         ->join('l_major','l_method_major.id_major','l_major.id')
    //         ->join('l_method','l_method.id','l_method_major.id_method')
    //         ->leftJoin('l_expenses','l_expenses.id_wish','l_wish.id')
    //         ->where('l_wish.id_user',Auth::guard('user')->user()->id)
    //         ->orderBy('l_wish.number','asc')
    //         ->get();
    //         foreach ($major as $value) {
    //             $value -> wish_expenses =  $value->expenses."-".$value->id;

    //         }
    //         $json_data['data'] = $major;
    //         $data = json_encode($json_data);
    //         echo  $data;
    //     }
    // }




    // public function load_expenses_img(){
    //     $ins = DB::table('l_image_hocba')
    //     ->where('id_user',Auth::guard('user')->user()->id)
    //     ->where('type_img',3)
    //     ->get();
    //     echo $ins[0]->link_img;
    // }
    // //Lưu ảnh
    // function crop_ex(Request $request){
    //     $prefixfileName = Auth::guard('user')->user()->id.'.png';
    //     $fileName =InfoUserController::rand_string(30)."_".$prefixfileName;
    //     $path = '/images/hocba'.'/'.Auth::guard('user')->user()->id.'/expenses_3_1_'.$fileName;
    //     $data =  $request->input('img');
    //     list($type, $data) = explode(';', $data);
    //     list(, $data)      = explode(',', $data);
    //     $data = base64_decode($data);
    //     $storage = Storage::disk('local');
    //     $storage->put('/hocba'.'/'.Auth::guard('user')->user()->id.'/expenses_3_1_'.$fileName,$data, 'public');
    //     $ins = DB::table('l_image_hocba')
    //     ->updateOrInsert(
    //         [
    //             'id_user'   => Auth::guard('user')->user()->id,
    //             'type_img'  =>3,
    //             'id_img'    =>1,

    //         ],
    //         [
    //         'link_img'     => $path,
    //         'note_type'    => "Lệ phí xét tuyển",
    //         'block_img'    => 0,
    //         'number_img'   =>6,
    //         ]
    //     );
    //     $result = array(
    //         'ins' => $ins,
    //         'src' =>  $path,
    //     );
    //     return  $result;
    // }

    // public function save_expenses_wish(Request $request){
    //     $data = $request->input('data');
    //     $re = 0;
    //     foreach ($data as $value) {
    //         $major = DB::table('l_expenses')
    //         ->updateOrInsert(
    //             [
    //                 'id_user' => Auth::guard('user')->user()->id,
    //                 'id_wish' => $value[1]
    //             ],
    //             [
    //             'expenses' => $value[0],
    //             'block_expenses' => 1,
    //             ]
    //         );
    //         $re =  $re + $major;
    //     }
    //     if($re == 0){
    //         $check = DB::table('l_expenses')
    //         ->select('l_wish.number as number',)
    //         ->join('l_wish','l_wish.id','l_expenses.id_wish')
    //         ->where('block_expenses',1)
    //         ->get();
    //         $a = "Bạn đã xác nhận đóng lệ phí cho nguyên vọng ";
    //         foreach ($check as $key => $value) {
    //             $a .= $value->number.", ";
    //         }
    //         return $a;
    //     }else{
    //         return  $re;
    //     }
    // }




    // public function load_price(){
    //     $price =  DB::table('l_expenses')
    //     ->where('id_user',Auth::guard('user')->user()->id)
    //     ->get();
    //     if(count($price) > 0){
    //         $price =  count($price)*20000;
    //     }else{
    //         $price = 0;
    //     }

    //     $user =  DB::table('l_users')
    //     ->where('id',Auth::guard('user')->user()->id)
    //     ->get();

    //     $result = array(
    //         'price' => $price,
    //         'info_price' => $user[0]->phone_users." ID".Auth::guard('user')->user()->id,
    //     );
    //     return $result;
    // }


}//End Class
