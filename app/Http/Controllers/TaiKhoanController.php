<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Hash;
use Auth;
use App\ChiTietLopQuanLy;
use App\ChiTietLamBaiTapLopQuanLy;

class TaiKhoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danh_sach = User::all();
        return view('admin.tai-khoan.danh-sach', ['danh_sach'=>$danh_sach]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getThem()
    {
        return view('admin.tai-khoan.them');
    }
    public function getSua($name='')
    {
        if(User::where('name', $name)->exists()&& Auth::user()->quyen ==2){
            $tai_khoan = User::where('name', $name)->first();
            return view('admin.tai-khoan.sua',['tai_khoan'=>$tai_khoan]);
        }
        return redirect('/tai-khoan/danh-sach');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postThem(Request $Request)
    {
        $validator = Validator::make($Request->all(),
        [
            'name'=>'required|min:6|alpha_num|max:255',
            'password'=>'required|min:6|max:30',
            'dia_chi'=>'required|min:6|max:255',
            'ho_ten'=>'required|min:6|max:255',
            'quyen'=>'required'
        ],[
            'name.min'=>'Tên đăng nhập phải từ 6-255 ký tự!',
            'name.max'=>'Tên đăng nhập phải từ 6-255 ký tự!',
            'name.alpha_num'=>'Tên đăng nhập chỉ được chứa chữ và số!',
            'password.min'=>'Mật khẩu phải từ 6-30 ký tự!',
            'password.max'=>'Mật khẩu phải từ 6-30 ký tự!',
            'dia_chi.min'=>'Địa chỉ phải từ 6-255 ký tự!',
            'dia_chi.max'=>'Địa chỉ phải từ 6-255 ký tự!',
            'ho_ten.min'=>'Họ tên phải từ 6-255 ký tự!',
            'ho_ten.max'=>'Họ tên phải từ 6-255 ký tự!',
            // 'ho_ten.alpha'=>'Họ tên chỉ được chứa chữ!',
        ]);
        if($validator->fails()){
            return redirect()->back()->with(['errors'=> $validator->errors()])->withInput($Request->input());
        }
        $data = new User();
        $data->name = $Request->name;
        $data->password = Hash::make($Request->password);
        $data->ho_ten = $Request->ho_ten;
        $data->dia_chi = $Request->dia_chi;
        $data->quyen = $Request->quyen;
        $data->save();
        return redirect()->back()->with('Success','Thêm thành công!');
    }

    public function postSua(Request $Request)
    {
        if($Request->password==null){
            $validator = Validator::make($Request->all(),
            [
                'dia_chi'=>'required|min:6|max:255',
                'ho_ten'=>'required|min:6|max:255',
                'quyen'=>'required'
            ],[
                'dia_chi.min'=>'Địa chỉ phải từ 6-255 ký tự!',
                'dia_chi.max'=>'Địa chỉ phải từ 6-255 ký tự!',
                'ho_ten.min'=>'Họ tên phải từ 6-255 ký tự!',
                'ho_ten.max'=>'Họ tên phải từ 6-255 ký tự!',
                // 'ho_ten.alpha'=>'Họ tên chỉ được chứa chữ!',
            ]);
            if($validator->fails()){
                return redirect()->back()->with(['errors'=> $validator->errors()])->withInput($Request->input());
            }
            $rs = User::where('name', $Request->name)->update(['dia_chi'=>$Request->dia_chi, 'ho_ten'=>$Request->ho_ten, 'quyen'=>$Request->quyen]);
        }else{
            $validator = Validator::make($Request->all(),
            [
                'password'=>'required|min:6|max:30',
                'dia_chi'=>'required|min:6|max:255',
                'ho_ten'=>'required|min:6|max:255',
                'quyen'=>'required'
            ],[
                'password.min'=>'Mật khẩu phải từ 6-30 ký tự!',
                'password.max'=>'Mật khẩu phải từ 6-30 ký tự!',
                'dia_chi.min'=>'Địa chỉ phải từ 6-255 ký tự!',
                'dia_chi.max'=>'Địa chỉ phải từ 6-255 ký tự!',
                'ho_ten.min'=>'Họ tên phải từ 6-255 ký tự!',
                'ho_ten.max'=>'Họ tên phải từ 6-255 ký tự!',
                // 'ho_ten.alpha'=>'Họ tên chỉ được chứa chữ!',
            ]);
            if($validator->fails()){
                return redirect()->back()->with(['errors'=> $validator->errors()])->withInput($Request->input());
            }
            $rs = User::where('name', $Request->name)->update(['dia_chi'=>$Request->dia_chi, 'ho_ten'=>$Request->ho_ten, 'quyen'=>$Request->quyen, 'password'=>Hash::make($Request->password)]);
        }
        if($rs)
            return redirect()->back()->with('Success','Sửa thành công!');
        return redirect()->back()->with('Failed','Sửa thất bại!');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Xoa($name)
    {
        if(User::where('name', $name)->exists()&& Auth::user()->quyen ==2){
            $tmp = User::where('name', $name)->first();
             $str = $tmp->ho_ten;
            if($tmp->name != Auth::user()->name){
                $rs = ChiTietLopQuanLy::where('id_hoc_sinh', $tmp->id)->delete();
                $rs = ChiTietLamBaiTapLopQuanLy::where('id_hoc_sinh', $tmp->id)->delete();
                $rs = User::where('name', $tmp->name)->delete();
                if($rs){
                    return redirect()->back()->with('Success','Xóa thành công tài khoản '.$str.' !');
                }else{
                    return redirect()->back()->with('Failed','Xóa tài khoản '.$str.' không thành công!');
                }
            }
            return redirect()->back()->with('Failed','Xóa tài khoản '.$str.' không thành công!');
        }else{
            return redirect()->back()->with('Failed','Tài khoản không tồn tại hoặc bạn không đủ có quyền xóa!');
        }
    }
}
