<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'description',
        'category',
        'p_rack',
        'p_neto',
        'p_comssion',
        'path_src',
        'includes',
        'is_special',
        'status',
        'created_by'
    ];
}
