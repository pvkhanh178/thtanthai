<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\LopQuanLy;
use App\ChiTietLopQuanLy;
use App\BaiHocLopQuanLy;
use App\BaiTapLopQuanLy;
use App\ChiTietLamBaiTapLopQuanLy;

class HocSinhController extends Controller
{
    public function getIndex()
    {
        $danh_sach = ChiTietLopQuanLy::where('id_hoc_sinh', Auth::user()->id)->get();
        return view('hocsinh.index', ['danh_sach'=>$danh_sach]);
    }
    public function getLopHoc($id='')
    {
        $danh_sach = LopQuanLy::where('id', $id)->first();
        return view('hocsinh.lop-hoc', ['danh_sach'=>$danh_sach]);
    }
    public function getBaiHoc($id='')
    {
        $data = BaiHocLopQuanLy::where('id', $id)->first();
        return view('hocsinh.bai-hoc', ['data'=>$data]);
    }
    public function getBaiTap($id='')
    {
        $data = BaiTapLopQuanLy::where('id', $id)->first();
        return view('hocsinh.bai-tap', ['bai_tap'=>$data]);
    }
}
