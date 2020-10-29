<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Auth;
use Hash;
use Session;
use App\User;
use Validator;

class Home extends Controller
{
    public function getIndex()
    {
		return view('home');
    }
    public function getTaiKhoan($id='')
    {
        if(User::where('name', $id)->exists()){
            $tai_khoan = User::where('name', $id)->first();
            return view('user.tai-khoan',['tai_khoan' => $tai_khoan]);
        }else{
            return redirect('index');
        }
    }
    public function getLogin()
    {
    	return view('user.dangnhap');
    }
    public function postLogin(Request $Request)
    {
    	$validator = Validator::make($Request->all(),
        [
            'name'=>'required|min:6|alpha_num|max:255',
            'password'=>'required|min:6|max:30'
        ]);
        if($validator->fails()){
            return redirect()->back()->with('Message','Tài khoản hoặc mật khẩu không hợp lệ!')->withInput($Request->input());
        }
        $login = array('name'=>$Request->name,'password'=> $Request->password);
        if(Auth::attempt($login)){
            return redirect('index');
        }else{
            return redirect()->back()->with('Message','Tài khoản hoặc mật khẩu không hợp lệ!')->withInput($Request->input());
        }
    }
    public function postDoiAnh(Request $Request)
    {
        $img="";
        if($Request->hasFile('img')){
            $file = $Request->img;
            $filename = Auth::user()->name.".".$file->getClientOriginalExtension();
            $file->move('source\img\tai-khoan', $filename);
            $img = "/source/img/tai-khoan/".$filename;
        }
        if($img!="")
            $rs = User::where('name', Auth::user()->name)->update(['anh_dai_dien'=>$img]);  
        if(isset($rs)&&$rs==true){
            return redirect()->back()->with('img_Success','Sửa thành công!');
        }else{
            return redirect()->back()->with('img_Failed','Sửa thất bại!');
        }
    }
    public function postDoiThongTin(Request $Request)
    {
        if($Request->email!=''){
            $this->validate($Request,
            [
                'ho_ten'=>'required|min:4',
                'email'=>'email',Rule::unique('users')->ignore(Auth::user()->name)
            ],
            [
                'ho_ten.min'=>'Tên đăng nhập phải từ 4 ký tự!',
                'email.unique'=>'Email này đã tồn tại!',
                'ho_ten.required'=>'Chưa nhập họ tên!'
            ]);
            $rs = User::where('name', Auth::user()->name)->update(['ho_ten'=>$Request->ho_ten, 'trang_thai'=>$Request->trang_thai, 'dia_chi'=>$Request->dia_chi, 'email'=>$Request->email]); 
        }else{
            $this->validate($Request,
            [
                'ho_ten'=>'required|min:4'
            ],
            [
                'ho_ten.min'=>'Tên đăng nhập phải từ 4 ký tự!',
                'ho_ten.required'=>'Chưa nhập họ tên!'
            ]);
            $rs = User::where('name', Auth::user()->name)->update(['ho_ten'=>$Request->ho_ten, 'trang_thai'=>$Request->trang_thai, 'dia_chi'=>$Request->dia_chi]); 
        }
        
         
        var_dump($rs);
        if($rs){
            return redirect()->back()->with('Success','Sửa thành công!');
        }else{
            return redirect()->back()->with('Failed','Sửa thất bại!');
        }
    }
    public function postLogout()
    {
        Auth::logout();
        return redirect('index');
    }
    public function getSearch()
    {
    	
    }
    public function getLienHe()
    {
    	
    }
    public function postTimKiem()
    {
    	
    }

}

