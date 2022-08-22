<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class truyen extends Model
{
    use HasFactory;

    protected $fillable = [
        'the_loai_id',
        'ten_truyen',
        'thumb',
        'tac_gia',
        'mota_ngan',
        'ngay_dang'
    ];

    public $timestamps = false;
}
