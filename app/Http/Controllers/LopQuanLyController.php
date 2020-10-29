<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\LopQuanLy;
use App\User;
use App\ChiTietLopQuanLy;
use App\BaiTapLopQuanLy;
use App\ChiTietLamBaiTapLopQuanLy;

class LopQuanLyController extends Controller
{
    public function getDanhSachLop()
    {
    	$danh_sach = LopQuanLy::where("id_giao_vien", Auth::user()->id)->get();
		return view('giaovien.lop-hoc.danh-sach', ['danh_sach'=>$danh_sach]);
    }
    public function getDanhSachHocSinh($id='')
    {
    	if($id!=''){
    		$quan_ly_lop = ChiTietLopQuanLy::where('id_lop_quan_ly', $id)->get();
    		$lop_quan_ly = LopQuanLy::where("id", $id)->first();
			return view('giaovien.lop-hoc.danh-sach-hoc-sinh', ['quan_ly_lop'=>$quan_ly_lop, 'lop_quan_ly'=>$lop_quan_ly]);
    	}else{
    		$danh_sach = LopQuanLy::where("id_giao_vien", Auth::user()->id)->get();
			return view('giaovien.lop-hoc.danh-sach', ['danh_sach'=>$danh_sach]);
    	}
    	
    }
    public function getChiTietHocSinh($lop='', $id='')
    {
        if($id!=''){
            $chi_tiet = ChiTietLopQuanLy::where('id_hoc_sinh', $id)->where('id_lop_quan_ly', $lop)->first();
            $chi_tiet_bai_tap = ChiTietLamBaiTapLopQuanLy::where('id_hoc_sinh', $id)->get();
            return view('giaovien.lop-hoc.chi-tiet-hoc-sinh', ['chi_tiet'=>$chi_tiet, 'chi_tiet_bai_tap'=>$chi_tiet_bai_tap]);
        }else{
            $danh_sach = LopQuanLy::where("id_giao_vien", Auth::user()->id)->get();
            return view('giaovien.lop-hoc.danh-sach', ['danh_sach'=>$danh_sach]);
        }
        
    }
    public function getThemLop()
    {
		return view('giaovien.lop-hoc.them');
    }
    public function postThemLop(Request $Request)
    {
        $this->validate($Request,
        [
            'ten_lop'=>'unique:lop_hoc|required|min:1'
        ],
        [
            'ten_lop.min'=>'Tên lớp đang trống!',
            'ten_lop.unique'=>'Tên lớp đã tồn tại!'
        ]);
        $lop_hoc = new LopQuanLy();
        $lop_hoc->ten_lop = $Request->ten_lop;
        $lop_hoc->id_giao_vien = Auth::user()->id;
        $lop_hoc->save();
        return redirect()->back()->with('Success','Thêm thành công!');
    }
    public function getSuaLop($id='')
    {
        $lop = LopQuanLy::where('id', $id)->first();
        return view('giaovien.lop-hoc.sua', ['lop'=>$lop]);
    }
    public function postSuaLop(Request $Request)
    {
        $this->validate($Request,
        [
            'ten_lop'=>'unique:lop_hoc|required|min:1'
        ],
        [
            'ten_lop.min'=>'Tên lớp đang trống!',
            'ten_lop.unique'=>'Tên lớp đã tồn tại!'
        ]);
        $rs = LopQuanLy::where('id', $Request->id)->update(['ten_lop'=>$Request->ten_lop]);
        if($rs){
            return redirect()->back()->with('Success','Sửa thành công!');
        }else{
            return redirect()->back()->with('Failed','Sửa thất bại!');
        }
    }
    public function getXoaLop($id='')
    {
        if(LopQuanLy::where('id', $id)->exists()){
            $lop = LopQuanLy::where('id', $id)->first();
            $str = $lop->ten_lop;
            BaiTapLopQuanLy::where('id_lop_quan_ly', $id)->delete();
            ChiTietLopQuanLy::where('id_lop_quan_ly', $id)->delete();
            $rs = LopQuanLy::where('id', $id)->delete();
            if($rs){
                return redirect()->back()->with('Success','Xóa thành công lớp '.$str.' !');
            }else{
                return redirect()->back()->with('Failed','Xóa lớp '.$str.' không thành công!');
            }
        }else{
            return redirect('/quan-ly-lop/lop-hoc');
        }
    }

    public function getThemHocSinh($id='')
    {
        if($id!=''){
            $danh_sach_lop = LopQuanLy::where('id_giao_vien', Auth::user()->id)->get();
            $lop = LopQuanLy::where('id', $id)->first();
            return view('giaovien.lop-hoc.them-hoc-sinh', ['danh_sach_lop' => $danh_sach_lop, 'lop'=>$lop]);
        }else{
            $danh_sach_lop = LopQuanLy::where('id_giao_vien', Auth::user()->id)->get();
            return view('giaovien.lop-hoc.them-hoc-sinh', ['danh_sach_lop' => $danh_sach_lop]);
        }
        
    }

    public function postThemHocSinh(Request $Request)
    {
        $this->validate($Request,
        [
            'id_lop_quan_ly'=>'required',
            'id_hoc_sinh'=>'required|exists:users,id',
        ],
        [
            'id_lop_quan_ly.required'=>'Bạn chưa chọn lớp!',
            'id_hoc_sinh.required'=>'Bạn chưa nhập ID học sinh!',
            'id_hoc_sinh.exists'=>'ID học sinh này không tồn tại!'
        ]);
        if(ChiTietLopQuanLy::where('id_hoc_sinh', $Request->id_hoc_sinh)->where('id_lop_quan_ly', $Request->id_lop_quan_ly)->exists()){
            return redirect()->back()->with('Failed','Học sinh đã ở trong lớp rồi!');
        }else{
            $hoc_sinh = User::where('id', $Request->id_hoc_sinh)->first();
            if($hoc_sinh->quyen >0){
                return redirect()->back()->with('Failed','ID này không hợp lệ!');
            }
            $lop_hoc = new ChiTietLopQuanLy();
            $lop_hoc->id_hoc_sinh = $Request->id_hoc_sinh;
            $lop_hoc->id_lop_quan_ly = $Request->id_lop_quan_ly;
            $lop_hoc->save();
            return redirect()->back()->with('Success','Thêm thành công!');
        }
        
    }
    public function getXoaHocSinh($id='', $hs='')
    {
        if(ChiTietLopQuanLy::where('id_hoc_sinh', $hs)->where('id_lop_quan_ly', $id)->exists()){
            $tmp = User::where('id', $hs)->first();
            $str = $tmp->ho_ten;
            $rs = ChiTietLopQuanLy::where('id_hoc_sinh', $hs)->where('id_lop_quan_ly', $id)->delete();
            if($rs){
                return redirect()->back()->with('Success','Xóa thành công học sinh '.$str.' !');
            }else{
                return redirect()->back()->with('Failed','Xóa học sinh '.$str.' không thành công!');
            }
        }else{
            return redirect('/quan-ly-lop/lop-hoc');
        }
        
    }
}
