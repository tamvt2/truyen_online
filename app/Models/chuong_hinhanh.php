<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chuong_hinhanh extends Model
{
    use HasFactory;

    protected $fillable = [
        'chuong_id',
        'thumb'
    ];

    public $timestamps = false;
}