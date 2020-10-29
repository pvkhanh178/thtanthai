<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietLopQuanLy extends Model
{
    protected $table = "chi_tiet_lop_quan_ly";
    public function lop_quan_ly(){
    	return $this->belongsTo('App\LopQuanLy','id_lop_quan_ly','id');
    }

    public function hoc_sinh(){
    	return $this->hasOne('App\User','id','id_hoc_sinh');
    }
}
