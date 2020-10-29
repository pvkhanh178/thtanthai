<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\LopQuanLy;
use App\ChiTietLopQuanLy;
use App\BaiTapLopQuanLy;
use App\ChiTietLamBaiTapLopQuanLy;
use App\BaiHocLopQuanLy;

class GiaoVienController extends Controller
{
    public function getIndex()
    {
    	$lop = LopQuanLy::all()->count();
    	$bai_hoc = BaiHocLopQuanLy::all()->count();
    	$bai_tap = BaiTapLopQuanLy::all()->count();
		return view('giaovien.home', ['lop'=>$lop, 'bai_hoc'=>$bai_hoc, 'bai_tap'=>$bai_tap]);
    }

}
