<?php
namespace App\Http\Controllers\Admin;
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

class Controller_1 extends Controller
{
    public function index(){
        return view('user.index');

    }
    public function test(){
        return view('user.test');
    }
}