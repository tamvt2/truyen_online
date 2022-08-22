<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class the_loai extends Model
{
    use HasFactory;

    protected $fillable = [
        'ten_loai'
    ];

    public $timestamps = false;
}