<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiCauHoi extends Model
{
    protected $table = "loai_cau_hoi";
    public function bai_tap(){
    	return $this->hasMany('App\BaiTap','id_loai_cau_hoi','id');
    }
}
