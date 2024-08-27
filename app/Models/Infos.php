<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Infos extends Model
{
    use HasFactory;
    
    protected $fillable = ['use_mem', 'exec_time'];

   

}
