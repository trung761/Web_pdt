<?php
namespace App\Http\Controllers\User;
use Google\Service\AnalyticsData\OrderBy;
use Illuminate\Queue\InteractsWithQueue;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

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
use Illuminate\Support\Arr;
use PhpParser\Node\Stmt\Return_;

use function PHPUnit\Framework\countOf;

use Jenssegers\Agent\Agent;
use Symfony\Component\HttpFoundation\StreamedResponse;
//PDF
use Illuminate\Support\Str;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use Mpdf\Mpdf;
// use Barryvdh\DomPDF\Facade\Pdf;
//DataTables
use Yajra\DataTables\Facades\DataTables;


//excel
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Exports\Excel_examine_patient;
use App\Exports\Excel_patient_management;
use App\Exports\Excel_staffs;
use App\Exports\Excel_positions;
use App\Exports\Excel_service_group;
use App\Exports\Excel_statistical;
use App\Exports\Excel_service_detail;
use App\Exports\excel_search_full;
//Artisan
use Illuminate\Support\Facades\Artisan;

class TrangchuController extends Controller
{
    // public function index()
    // {
    //     $data = DB::table('menu')
    //         ->orderBy('thutu')
    //         ->get();
    //     $data = $this->buildMenuTree($data, 0);
    //     return view('user.trangchu.index', ['menu1' => $data]);
    // }
    public function index()
{
    $data = DB::table('menu')
        ->orderBy('thutu')
        ->where('trangthai', 1)
        ->get();
    $data = $this->buildMenuTree($data, 0);
    return view('user.trangchu.index', [
        'menu1' => $data,
        'menuCap1Id' => null // Truyền mặc định là null cho trang chủ
    ]);
}

    private function buildMenuTree($menus, $parentId)
    {
        $tree = [];
        foreach ($menus as $menu) {
            if ($menu->id_cha == $parentId) {
                $children = $this->buildMenuTree($menus, $menu->id);
                if (!empty($children)) {
                    $menu->children = $children;
                }
                $tree[] = $menu;
            }
        }
        return $tree;
    }

    public function load_menu2(Request $request)
    {
        $id = $request->input('id');
        $query = "
            WITH RECURSIVE menu_tree AS (
                SELECT id, tenmenu, id_cha, trangthai, uutien, id_cap, loaimanhinh
                FROM menu
                WHERE id_cha = :id AND trangthai = 1
                UNION ALL
                SELECT m.id, m.tenmenu, m.id_cha, m.trangthai, m.uutien, m.id_cap, m.loaimanhinh
                FROM menu m
                INNER JOIN menu_tree mt ON mt.id = m.id_cha
                WHERE m.trangthai = 1
            )
            SELECT mt.*, t.id AS tintuc_id, t.tieude AS tintuc_title, t.noidung AS tintuc_content, t.image AS tintuc_image
            FROM menu_tree mt
            LEFT JOIN tintuc t ON t.idmenu = mt.id;
        ";
        $data = DB::select(DB::raw($query), ['id' => $id]);
        return response()->json($data);
    }

    public function load_data_menu1(Request $request)
    {
        $id = $request->input('id');
        $query = "
            SELECT 
                t.id AS tintuc_id,
                t.image AS tintuc_image,
                t.tieude AS tintuc_title,
                t.noidung AS tintuc_content,
                t.idmenu,
                t.ngaydang,
                m.id,
                m.tenmenu,
                m.id_cha,
                m.trangthai,
                m.thutu,
                m.uutien,
                m.id_cap,
                m.loaimanhinh
            FROM tintuc AS t
            LEFT JOIN menu AS m ON t.idmenu = m.id
            WHERE t.idmenu = :id
        ";
        $data = DB::select($query, ['id' => $id]);
        return response()->json($data);
    }
    
    public function load_data(Request $request)
    {
        $id = $request->input('id');
        $data = DB::table('menu')
            ->where('id', $id)
            ->first();
        return response()->json($data);
    }
    public function data_tintuc(Request $request)
    {
        $id = $request->input('id');

        $data = DB::table('tintuc')
            ->where('id', $id)
            ->first();
        return response()->json($data);
    }
    public function load_chitiettintuc($id)
    {
        // Lấy tin tức
        $tintuc = DB::table('tintuc')
            ->where('id', $id)
            ->first();
        if (!$tintuc) {
            abort(404);
        }

        // Lấy menu cấp 1 tương ứng với tin tức
        $menuCap1Id = $this->findMenuCap1($tintuc->idmenu);

        // Lấy danh sách menu cấp 1 để hiển thị trong header
        $menu1 = DB::table('menu')
            ->where('id_cha', 0)
            ->where('trangthai', 1)
            ->orderBy('thutu')
            ->get();

        // // Lấy tin nổi bật (giữ nguyên như bạn yêu cầu)
        // $tinNoiBat = DB::table('tintuc')
        //     ->where('trangthai', 1)
        //     ->orderBy('uutien', 'desc')
        //     ->orderBy('ngaydang', 'desc')
        //     ->take(6)
        //     ->get();

        return view('user.tintuc.chitiettintuc', [
            'tintuc' => $tintuc,
            'menu1' => $menu1, // Truyền menu cấp 1 để hiển thị trong header
            'menuCap1Id' => $menuCap1Id, // Truyền ID của menu cấp 1 để highlight
            // 'tinNoiBat' => $tinNoiBat
        ]);
    }

    private function findMenuCap1($menuId)
    {
        $menu = DB::table('menu')->where('id', $menuId)->first();
        if (!$menu) {
            return null;
        }

        // Đệ quy ngược lên để tìm menu cấp 1 (id_cha = 0)
        while ($menu && $menu->id_cha != 0) {
            $menu = DB::table('menu')->where('id', $menu->id_cha)->first();
        }

        return $menu ? $menu->id : null;
    }
}