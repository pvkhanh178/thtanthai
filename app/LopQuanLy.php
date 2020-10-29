<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LopQuanLy extends Model
{
    protected $table = "lop_quan_ly";

    public function giao_vien(){
    	return $this->belongsTo('App\User','id_giao_vien','id');
    }
    public function bai_hoc(){
        return $this->hasMany('App\BaiHocLopQuanLy','id_lop_quan_ly','id');
    }
    public function bai_tap(){
    	return $this->hasMany('App\BaiTapLopQuanLy','id_lop_quan_ly','id');
    }
    public function chi_tiet_lop(){
    	return $this->hasMany('App\ChiTietLopQuanLy', 'id_lop_quan_ly', 'id');
    }
}
