<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietLamBaiTapLopQuanLy extends Model
{
    protected $table = "chi_tiet_lam_bai_tap_lop_quan_ly";
    public function bai_tap_lop_quan_ly(){
    	return $this->belongsTo('App\BaiTapLopQuanLy','id_bai_tap_lop_quan_ly','id');
    }

    public function hoc_sinh(){
    	return $this->hasMany('App\User','id','id_hoc_sinh');
    }
}
