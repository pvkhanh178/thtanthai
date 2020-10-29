<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // public function getDanhsach()
    // {
    // 	$user = User::all();
    // 	return view('admin.user.danhsach',['user'=>$user]);
    // }

    //  public function getAdd()
    // {
    // 	return view('admin.user.add');
    // }
    // public function postAdd(Request $req)
    // {

    // 	$this->validate($req,
    // 	[
    // 		'full_name'=>'required|min:2',
    //         'email'=>'required|email|unique:user,email',
    //         'password'=>'required|min:6|max:32',
    //         're_password'=>'required|same:password',
    //         'dien_thoai'=>'required',
    //         'dia_chi'=>'required'
    // 	],
    // 	[
    // 		'full_name.required'=>'bạn chưa nhập họ tên',
    //         'full_name.min'=>'tên người dùng ít nhất 2 ký tự',
    //         'email.required'=>'bạn chưa nhập email',
    //         'email.email'=>'email không đúng định dạng',
    //         'email.unique'=>'email đã tồn tại',
    //         'password.required'=>'bạn chưa nhập mật khẩu',
    //         'password.min'=>'mật khẩu ít nhất 6 ký tự và tối đa 32 ký tự',
    //         'password.max'=>'mật khẩu ít nhất 6 ký tự và tối đa 32 ký tự',
    //         're_password.required'=>'bạn chưa nhập lại mật khẩu',
    //         're_password.same'=>'nhập lại mật khẩu không trùng với mật khẩu',
    //         'dien_thoai.required'=>'bạn chưa nhập số điện thoại',
    //         'dia_chi.required'=>'bạn chưa nhập địa chỉ'
    // 	]);
    // 	$user = new User;
    //     $user->full_name = $req->full_name;
    //     $user->email = $req->email;
    //     $user->password = bcrypt($req->password);
    //     $user->dien_thoai = $req->dien_thoai;
    //     $user->dia_chi = $req->dia_chi;
    //     $user->quyen = $req->quyen;
    //     $user->save();

    // 	return redirect('admin/user/add')->with('thongbao','Thêm thành công!!');
    // }

    //  public function getEdit($id)
    // {
    // 	$user = User::find($id);
    //     return view('admin.user.edit',['user'=>$user]);
    // }
    // public function postEdit(Request $req,$id)
    // {	
    // 	$this->validate($req,
    //         [
    //             'full_name'=>'required|min:2',
    //             'dien_thoai'=>'required|numeric',
    //             'dia_chi'=>'required'
    //         ],
    //         [
    //             'full_name.required'=>'bạn chưa nhập họ tên',
    //             'full_name.min'=>'tên người dùng ít nhất 2 ký tự',
    //             'dien_thoai.required'=>'bạn chưa nhập số điện thoại',
    //             'dien_thoai.numeric'=>'nhập số điện thoại không đúng',
    //             'dia_chi.required'=>'bạn chưa nhập địa chỉ'
    //         ]);
    // 	$user = User::find($id);
    //     $user->full_name = $req->full_name;
    //     if($req->password == "on")
    //     {
          
    //       $this->validate($req,
    //         [
    //             'password'=>'required|min:6|max:32',
    //             're_password'=>'required|same:password'
    //         ],
    //         [
    //             'password.required'=>'bạn chưa nhập mật khẩu',
    //             'password.min'=>'mật khẩu ít nhất 6 ký tự và tối đa 32 ký tự',
    //             'password.max'=>'mật khẩu ít nhất 6 ký tự và tối đa 32 ký tự',
    //             're_password.required'=>'bạn chưa nhập lại mật khẩu',
    //             're_password.same'=>'nhập lại mật khẩu không trùng với mật khẩu'
    //         ]);  
    //       $user->password = bcrypt($req->password);
    //     }
        
    //     $user->dien_thoai = $req->dien_thoai;
    //     $user->dia_chi = $req->dia_chi;
    //     $user->quyen = $req->quyen;
    //     $user->save();
    //     return redirect('admin/user/edit/'.$id)->with('thongbao','Sửa người dùng thành công!!');
    // }

    // public function getDelete($id)
    // {
    // 	$user = User::find($id);
    // 	$user->delete();
    // 	return redirect('admin/user/danhsach')->with('thongbao','bạn đã xóa thành công!!');
    // }
    
    // public function getLoginAdmin()
    // {
    //     return view('admin.login');
    // }
}
