<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaiTapLopQuanLy extends Model
{
    protected $table = "bai_tap_lop_quan_ly";
    public function bai_hoc(){
    	return $this->belongsTo('App\BaiHocLopQuanLy','id_bai_hoc_lop_quan_ly','id');
    }
    public function loai_cau_hoi(){
    	return $this->belongsTo('App\LoaiCauHoi','id_loai_cau_hoi','id');
    }
    public function chi_tiet(){
        return $this->hasMany('App\ChiTietLamBaiTapLopQuanLy','id_bai_tap_lop_quan_ly','id');
    }
   
}
