<?php


namespace App\Http\Controllers\Admin;
use Spatie\Activitylog\Models\Activity;
use App\Models\Menu;
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
use Carbon\Carbon;
use PhpParser\Node\Expr\FuncCall;
use \App\Http\Controllers\User\Main\InfoUserController;
use \App\Http\Controllers\User\Main\RegisterWishController;
use Exception;

class MenuController extends Controller
{
    function index(){
        return view('admin.menu.index',
        [
           
        ]);
    }
    function datalist_menu($menus, $id_cha = 0, $level = 0, $char = "", &$result)
    {
        $i = 1;
        foreach ($menus as $key => $menu) {
            if ($menu->id_cha === $id_cha) {
                $menu->tenmenu = $char . '&nbsp;&nbsp;<strong>' . $i . '</strong>.&nbsp;' . $menu->tenmenu;
                $result[] = $menu;
                unset($menus[$key]);
                $i++;
                self::datalist_menu($menus, $menu->id, 1 + $level, $char . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", $result);
            }
        }
    }
    function list_menu()
    {
        $sql_menu = "select * from menu where trangthai ='1'";
        $list_menu = DB::select($sql_menu);

        $result = []; 
        $this->datalist_menu($list_menu, 0, 0, "", $result);

        return response()->json($result); 
    }

    function load_list_menu()
    {
        $menu = DB::table('menu')
                ->select('id','tenmenu as text')
                ->where('trangthai', 1)
                ->get();
                $menu_0 = new Collection(
                [  
                    'id' => 0,
                    'text' => 'Chọn menu',
                    'selected' => "selected",
                ]
                );
                $menu[] =  $menu_0; 
                return $menu;
    }

    public function delete_menu(Request $request, $id)
    {   
        $id = $request->id;
        $menu = Menu::findOrFail($id);
        $oldMenuData = $menu->toArray(); // Lưu dữ liệu gốc trước khi sửa

        // Cập nhật "xóa mềm" và các trường khác nếu có
        $menu->update([
            'tenmenu' => $request->tenmenu ?? $menu->tenmenu,
            'id_cha' => $request->id_cha ?? $menu->id_cha,
            'id_cap' => $request->id_cap ?? $menu->id_cap,
            'loaimanhinh' => $request->loaimanhinh ?? $menu->loaimanhinh,
            'trangthai' => 0, // Xóa mềm
            'thutu' => $request->thutu ?? $menu->thutu,
            'uutien' => $request->uutien ?? $menu->uutien,
            'gioithieu' => $request->gioithieu ?? $menu->gioithieu,
        ]);

        // Ghi log hoạt động
        activity()
            ->useLog('menu')
            ->causedBy(auth()->user())
            ->on($menu)
            ->withProperties([
                'old' => $oldMenuData,
                'new' => $menu->toArray()
            ])
            ->log('Xóa menu');

        return response()->json(['success' => true]);
    }

    public function edit_menu($id)
    {
        $menu = DB::table('menu')->where('id', $id)->first();

        if (!$menu) {
            return response()->json(['success' => false, 'message' => 'Menu không tồn tại.'], 404);
        }

        return response()->json(['success' => true, 'data' => $menu]);
    }

    public function update_menu(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);
        $oldMenuData = $menu->toArray(); // Lưu lại dữ liệu cũ của menu trước khi cập nhật
        
        // Cập nhật menu
        $menu->update([
            'tenmenu' => $request->tenmenu,
            'id_cha' => $request->id_cha,
            'id_cap' => $request->id_cap,
            'loaimanhinh' => $request->loaimanhinh,
            'trangthai' => $request->trangthai,
            'thutu' => $request->thutu,
            'uutien' => $request->uutien,
            'gioithieu' => $request->gioithieu,
        ]);
        $menu->refresh(); 

        // try {
            // Ghi log vào bảng activity_log với log_name là 'menu'
            activity()
                ->useLog('menu') // Đảm bảo log_name là 'menu'
                ->causedBy(auth()->user()) // Người thực hiện hành động
                ->on($menu) // Gắn log với đối tượng menu
                ->withProperties(['old' => $oldMenuData, 'new' => $menu->toArray()]) // Các thay đổi
                ->log('Cập nhật menu'); // Nội dung log
        // } catch (\Exception $e) {
        //     return response()->json(['success' => false, 'message' => 'Lỗi khi ghi log: ' . $e->getMessage()]);
        // }

        return response()->json(['success' => true, 'message' => 'Cập nhật thành công!']);
    }

    public function logs(Request $request)
    {
        $logs = Activity::where('log_name', 'menu')
        ->latest('updated_at')  
        ->get()
        ->map(function ($log) {
            $props = is_array($log->properties)
                ? $log->properties
                : json_decode($log->properties, true);
            $changes = [];
            if (isset($props['old']) && is_array($props['old']) && isset($props['new']) && is_array($props['new'])) {
                // if (isset($props['old']) && isset($props['new'])) {
                foreach ($props['old'] as $key => $oldValue) {
                    $newValue = $props['new'][$key] ?? null;
                    if ($oldValue !== $newValue) {

                        switch ($key) {
                            case 'tenmenu':
                                $label = 'Tên menu';
                                break;
                            case 'updated_at':
                                $label = 'Cập nhật lúc';
                                $oldValue = Carbon::parse($oldValue)->setTimezone('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
                                $newValue = Carbon::parse($newValue)->setTimezone('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
                                break;
                            case 'trangthai':
                                $oldValue = $oldValue == 1 ? 'Hoạt động' : 'Đã xóa';
                                $newValue = $newValue == 1 ? 'Hoạt động' : 'Đã xóa';
                                $label = 'Trạng thái';
                                break;
                            case 'uutien':
                                $label = 'Ưu tiên';
                                break;
                            case 'id_cha':
                                $label = 'Menu cha';
                                break;
                            case 'gioithieu':
                                $label = 'Giới thiệu';
                                break;
                            case 'thutu':
                                $label = 'Thứ tự';
                                break;
                            case 'loaimanhinh':
                                $label = 'Loại màn hình';
                                break;
                            case 'id_cap':
                                $label = 'Cấp menu';
                                break;
                            case 'created_at':
                                $oldValue = Carbon::parse($oldValue)->setTimezone('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
                                $newValue = Carbon::parse($newValue)->setTimezone('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
                                $label = 'Thời gian thêm mới';
                                break;
                            default:
                                $label = ucfirst($key);  
                                break;
                        }
                        $changes[$label] = [
                            'old' => $oldValue,
                            'new' => $newValue
                        ];
                    }
                }
            }
            // $formattedTime = $log->updated_at;
            
            // $time= Carbon::parse($formattedTime)->setTimezone('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
            return [
                'time' =>Carbon::parse($log->updated_at)->setTimezone('Asia/Ho_Chi_Minh'),
                'causer' => $log->causer ? $log->causer->name : 'Hệ thống',
                'description' => $log->description,
                'changes' => $changes, 
            ];
        });

    return response()->json($logs);

    }

    public function add_menu(Request $request) {
        // Tạo menu mới
        $menu = Menu::create([
            'tenmenu' => $request->name_menu,
            'id_cha' => $request->root_menu,
            'id_cap' => $request->type_menu,
            'loaimanhinh' => $request->type_screen,
            'trangthai' => $request->rd_hienthi,
            'uutien' => $request->rd_uutien,
            'thutu' => $request->thuTu,
        'gioithieu' => $request->filled('gioithieu') ? $request->input('gioithieu') : '',


            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Xác định các thay đổi (old và new)
        // Ở đây, "old" là mảng rỗng vì không có dữ liệu cũ
        // "new" là mảng các giá trị menu mới vừa được tạo
        // $logData = [
        //     'old' => [], // Mảng rỗng vì đây là hành động thêm mới
        //     'new' => $menu->toArray(), // Toàn bộ dữ liệu của menu mới
        // ];

        // Ghi log hoạt động
        activity()
            ->useLog('menu')  // Sử dụng log 'menu'
            ->causedBy(auth()->check() ? auth()->user() : null) // nếu không có user, truyền null
            
            // ->withProperties($logData)  // Thêm các thay đổi vào log

            ->withProperties(['old' => ['tenmenu' => '',
            'id_cha' => '',
            'id_cap' => '',
            'loaimanhinh' => '',
            'trangthai' => '',
            'uutien' => '',
            'thutu' => '',
            'gioithieu' => '',
            'created_at' => '',
            'updated_at' => ''], 'new' => $menu->toArray()]) // Các thay đổi

            ->log('Thêm menu');  // Nội dung log

        return response()->json(['success' => true, 'data' => $menu]);



        

    }



















    
    
    
}


