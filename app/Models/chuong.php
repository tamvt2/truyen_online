<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chuong extends Model
{
    use HasFactory;

    protected $fillable = [
        'truyen_id',
        'chuong_so',
        'ten_chuong',
        'noi_dung'
    ];

    public $timestamps = false;
}
