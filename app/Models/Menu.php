<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Menu extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'menu'; // Đảm bảo tên bảng là đúng

    protected $fillable = [
        'tenmenu',
        'id_cha',
        'id_cap',
        'loaimanhinh',
        'trangthai',
        'thutu',
        'uutien',
        'gioithieu',
    ];

    protected static $logAttributes = ['tenmenu', 'id_cha', 'id_cap', 'loaimanhinh', 'trangthai', 'thutu', 'uutien', 'gioithieu'];

    protected static $logOnlyDirty = true;

    protected static $logName = 'menu';

    /**
     * Get the options for the activity log.
     *
     * @return \Spatie\Activitylog\LogOptions
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['tenmenu', 'id_cha', 'id_cap', 'loaimanhinh', 'trangthai', 'thutu', 'uutien', 'gioithieu']);
    }
}


