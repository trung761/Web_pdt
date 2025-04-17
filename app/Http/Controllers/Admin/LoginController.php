<?php


namespace App\Http\Controllers\Admin;


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



class LoginController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('admin.login.login'); // đường dẫn đúng
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        // $credentials = $request->only('user_name', 'pass_word');
        $data = DB::table('admin_login')
        ->get();
        // if (Auth::attempt($credentials)) {
        //     return redirect()->intended('/dashboard');
        // }
        
        // return back()->withErrors([
        //     'login' => 'Tài khoản hoặc mật khẩu không đúng.',
        // ]);
        // dd( $data);
        return $data;
    }
    // public function login()
    // {
    //     return view('admin.login.login'); // view tồn tại tại resources/views/admin/login/login.blade.php
    // }

    
}









