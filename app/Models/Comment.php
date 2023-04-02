<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'truyen_id',
        'user_id',
        'noi_dung',
        'ngay_dang'
    ];

    public $timestamps = false;
}
