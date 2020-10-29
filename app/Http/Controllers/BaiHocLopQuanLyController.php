<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\LopQuanLy;
use App\User;
use App\ChiTietLopQuanLy;
use App\BaiHocLopQuanLy;
use App\BaiTapLopQuanLy;
use App\ChiTietLamBaiTapLopQuanLy;

class BaiHocLopQuanLyController extends Controller
{
    public function getDanhSach()
    {
    	$danh_sach = LopQuanLy::where("id_giao_vien", Auth::user()->id)->get();
		return view('giaovien.bai-hoc.danh-sach', ['danh_sach'=>$danh_sach]);
    }
    public function getThem()
    {
    	$danh_sach = LopQuanLy::where("id_giao_vien", Auth::user()->id)->get();
		return view('giaovien.bai-hoc.them', ['danh_sach'=>$danh_sach]);
    }
    public function postThem(Request $Request)
    {
    	$this->validate($Request,
        [
            'id_lop_quan_ly'=>'required',
            'ten_bai_hoc'=>'required|min:1',
            'noi_dung'=>'required|min:1'
        ],
        [
            'id_lop_quan_ly.required'=>'Chưa chọn lớp!',
            'ten_bai_hoc.required'=>'Tên lớp đang trống!',
            'noi_dung.required'=>'Nội dung đang trống!'
        ]);
        $data = new BaiHocLopQuanLy();
        $data->id_lop_quan_ly = $Request->id_lop_quan_ly;
        $data->ten_bai_hoc = $Request->ten_bai_hoc;
        $data->noi_dung = $Request->noi_dung;
        $data->save();
        return redirect()->back()->with('Success','Thêm thành công!');
    }
    public function getSua($id='')
    {
    	$danh_sach = LopQuanLy::where("id_giao_vien", Auth::user()->id)->get();
    	$bai_hoc = BaiHocLopQuanLy::where("id", $id)->first();
		return view('giaovien.bai-hoc.sua', ['danh_sach'=>$danh_sach, 'bai_hoc'=>$bai_hoc]);
    }
    public function postSua(Request $Request)
    {
    	$this->validate($Request,
        [
            'id_lop_quan_ly'=>'required',
            'ten_bai_hoc'=>'required|min:1',
            'noi_dung'=>'required|min:1'
        ],
        [
            'id_lop_quan_ly.required'=>'Chưa chọn lớp!',
            'ten_bai_hoc.required'=>'Tên lớp đang trống!',
            'noi_dung.required'=>'Nội dung đang trống!'
        ]);
        $rs = BaiHocLopQuanLy::where('id', $Request->id)->update(['id_lop_quan_ly'=>$Request->id_lop_quan_ly, 'ten_bai_hoc'=>$Request->ten_bai_hoc, 'noi_dung'=>$Request->noi_dung]);  
        if($rs){
        	return redirect()->back()->with('Success','Sửa thành công!');
        }else{
        	return redirect()->back()->with('Failed','Sửa thất bại!');
        }
    }
    public function getXoa($id='')
    {
    	if(BaiHocLopQuanLy::where('id', $id)->exists()){
	    	$rs = BaiHocLopQuanLy::where('id', $id)->delete();
	    	if($rs){
	        	return redirect()->back()->with('Success','Xóa thành công!');
	        }else{
	        	return redirect()->back()->with('Failed','Xóa thất bại!');
	        }
	    }else{
	    	return redirect('/quan-ly-lop/bai-hoc');
	    }
    }
}
