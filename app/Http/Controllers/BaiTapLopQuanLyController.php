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
use App\LoaiCauHoi;

class BaiTapLopQuanLyController extends Controller
{
    public function getDanhSach()
    {
        $danh_sach = LopQuanLy::where("id_giao_vien", Auth::user()->id)->get();
        return view('giaovien.bai-tap.danh-sach', ['danh_sach'=>$danh_sach]);
    }
    public function getThem()
    {
        $loai_cau_hoi = LoaiCauHoi::all();
        $danh_sach = LopQuanLy::where("id_giao_vien", Auth::user()->id)->get();
        return view('giaovien.bai-tap.them', ['danh_sach'=>$danh_sach, 'loai_cau_hoi'=>$loai_cau_hoi]);
    }
    public function postThem(Request $Request)
    {
        $this->validate($Request,
        [
            'id_bai_hoc_lop_quan_ly'=>'required',
            'id_loai_cau_hoi'=>'required',
            'cau_hoi'=>'required',
            'noi_dung'=>'required',
            'dap_an_dung'=>'required'
        ],
        [
            'id_bai_hoc_lop_quan_ly.required'=>'Chưa chọn bài học!',
            'id_loai_cau_hoi.required'=>'Chưa chọn loại câu hỏi!',
            'cau_hoi.required'=>'Câu hỏi đang trống!',
            'noi_dung.required'=>'Nội dung đang trống!',
            'dap_an_dung.required'=>'Đáp án đúng đang trống!'
        ]);
        $data = new BaiTapLopQuanLy();
        $data->id_bai_hoc_lop_quan_ly = $Request->id_bai_hoc_lop_quan_ly;
        $data->id_loai_cau_hoi = $Request->id_loai_cau_hoi;
        $data->cau_hoi = $Request->cau_hoi;
        $data->noi_dung = $Request->noi_dung;
        $data->dap_an_dung = $Request->dap_an_dung;
        if(isset($Request->dap_an_1)){
            $data->dap_an_1 = $Request->dap_an_1;
        }
        if(isset($Request->dap_an_2)){
            $data->dap_an_2 = $Request->dap_an_2;
        }
        if(isset($Request->dap_an_3)){
            $data->dap_an_3 = $Request->dap_an_3;
        }
        if(isset($Request->dap_an_4)){
            $data->dap_an_4 = $Request->dap_an_4;
        }
        if(isset($Request->dap_an_dung1)){
            $data->dap_an_dung1 = $Request->dap_an_dung1;
        }
        $data->save();
        return redirect()->back()->with('Success','Thêm thành công!');
    }
    public function getSua($id='')
    {
        $loai_cau_hoi = LoaiCauHoi::all();
        $danh_sach = LopQuanLy::where("id_giao_vien", Auth::user()->id)->get();
        $bai_tap = BaiTapLopQuanLy::where("id", $id)->first();
        return view('giaovien.bai-tap.sua', ['danh_sach'=>$danh_sach, 'bai_tap'=>$bai_tap, 'loai_cau_hoi'=>$loai_cau_hoi]);
    }
    public function postSua(Request $Request)
    {
        $this->validate($Request,
        [
            'id_bai_hoc_lop_quan_ly'=>'required',
            'id_loai_cau_hoi'=>'required',
            'cau_hoi'=>'required',
            'noi_dung'=>'required',
            'dap_an_dung'=>'required'
        ],
        [
            'id_bai_hoc_lop_quan_ly.required'=>'Chưa chọn bài học!',
            'id_loai_cau_hoi.required'=>'Chưa chọn loại câu hỏi!',
            'cau_hoi.required'=>'Câu hỏi đang trống!',
            'noi_dung.required'=>'Nội dung đang trống!',
            'dap_an_dung.required'=>'Đáp án đúng đang trống!'
        ]);
        $rs = BaiTapLopQuanLy::where('id', $Request->id)->update(['id_bai_hoc_lop_quan_ly'=>$Request->id_bai_hoc_lop_quan_ly, 'id_loai_cau_hoi'=>$Request->id_loai_cau_hoi, 'cau_hoi'=>$Request->cau_hoi, 'noi_dung'=>$Request->noi_dung, 'dap_an_1'=>$Request->dap_an_1, 'dap_an_2'=>$Request->dap_an_2, 'dap_an_3'=>$Request->dap_an_3, 'dap_an_4'=>$Request->dap_an_4, 'dap_an_dung'=>$Request->dap_an_dung, 'dap_an_dung1'=>$Request->dap_an_dung1]);  
        if($rs){
            return redirect()->back()->with('Success','Sửa thành công!');
        }else{
            return redirect()->back()->with('Failed','Sửa thất bại!');
        }
    }
    public function getXoa($id='')
    {
        if(BaiTapLopQuanLy::where('id', $id)->exists()){
            $rs = BaiTapLopQuanLy::where('id', $id)->delete();
            if($rs){
                return redirect()->back()->with('Success','Xóa thành công!');
            }else{
                return redirect()->back()->with('Failed','Xóa thất bại!');
            }
        }else{
            return redirect('/quan-ly-lop/bai-tap');
        }
    }
}
