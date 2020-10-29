<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\LopHoc;
use App\MonHoc;
use App\MucMonHoc;
use App\BaiHoc;
use App\BaiHocLopQuanLy;
use App\BaiTapLopQuanLy;
use App\ChiTietLopQuanLy;
use App\ChiTietLamBaiTapLopQuanLy;

class AjaxController extends Controller
{
    public function getMonHoc($id)
    {
    	$mon_hoc = MonHoc::where('id_lop', $id)->get();
    	echo "<option value='' selected>Chọn môn</option>";
    	foreach($mon_hoc as $mon)
        {
            echo "<option value='" . $mon->id . "'>" . $mon->ten_mon . "</option>";
        }
    }
    public function getMucMonHoc($id)
    {
    	$muc_mon_hoc = MucMonHoc::where('id_mon', $id)->get();
    	echo "<option value='' selected>Chọn mục</option>";
    	foreach($muc_mon_hoc as $muc)
        {
            echo "<option value='" . $muc->id . "'>" . $muc->ten_muc . "</option>";
        }
    }
    public function getBaiHoc($id)
    {
        $bai_hoc = BaiHoc::where('id_muc', $id)->get();
        echo "<option value='' selected>Chọn bài học</option>";
        foreach($bai_hoc as $bai)
        {
            echo "<option value='" . $bai->id . "'>" . $bai->ten_bai_hoc . "</option>";
        }
    }
    public function getBaiHocLopQuanLy($id)
    {
        $bai_hoc = BaiHocLopQuanLy::where('id_lop_quan_ly', $id)->get();
        echo "<option value='' selected>Chọn bài học</option>";
        foreach($bai_hoc as $bai)
        {
            echo "<option value='" . $bai->id . "'>" . $bai->ten_bai_hoc . "</option>";
        }
    }
    public function setTraLoi($id='', $dapan='')
    {
        $bai_tap = BaiTapLopQuanLy::where('id', $id)->first();
        $tra_loi = ChiTietLamBaiTapLopQuanLy::where('id_hoc_sinh', Auth::user()->id)->where('id_bai_tap_lop_quan_ly', $id)->first();
        if($tra_loi!=null){
            ChiTietLamBaiTapLopQuanLy::where('id_hoc_sinh', Auth::user()->id)->where('id_bai_tap_lop_quan_ly', $id)->update(['so_lan_lam_bai'=>($tra_loi->so_lan_lam_bai+1)]);
            if($tra_loi->tra_loi_dung==0){
                ChiTietLamBaiTapLopQuanLy::where('id_hoc_sinh', Auth::user()->id)->where('id_bai_tap_lop_quan_ly', $id)->update(['tra_loi_dung'=>1]);
                $ct = ChiTietLopQuanLy::where('id_hoc_sinh', Auth::user()->id)->where('id_lop_quan_ly', $bai_tap->bai_hoc->lop_quan_ly->id)->first();
                echo "string:".($ct->diem+10);
                ChiTietLopQuanLy::where('id_hoc_sinh', Auth::user()->id)->where('id_lop_quan_ly', $bai_tap->bai_hoc->lop_quan_ly->id)->update(['diem'=>($ct->diem+10)]);
            }
        }else{
            if($dapan==1){
                $ct = ChiTietLopQuanLy::where('id_hoc_sinh', Auth::user()->id)->where('id_lop_quan_ly', $bai_tap->bai_hoc->lop_quan_ly->id)->first();
                ChiTietLopQuanLy::where('id_hoc_sinh', Auth::user()->id)->where('id_lop_quan_ly', $bai_tap->bai_hoc->lop_quan_ly->id)->update(['diem'=>($ct->diem+10)]);
            }
            $data = new ChiTietLamBaiTapLopQuanLy();
            $data->id_hoc_sinh = Auth::user()->id;
            $data->id_bai_tap_lop_quan_ly = $id;
            $data->so_lan_lam_bai = 1;
            $data->tra_loi_dung = $dapan;
            $data->save();
        }
    }
}
