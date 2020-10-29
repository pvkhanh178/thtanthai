<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaiHocLopQuanLy extends Model
{
    protected $table = "bai_hoc_lop_quan_ly";

    public function lop_quan_ly(){
    	return $this->belongsTo('App\LopQuanLy','id_lop_quan_ly','id');
    }
    public function bai_tap(){
    	return $this->hasMany('App\BaiTapLopQuanLy','id_bai_hoc_lop_quan_ly','id');
    }
}
