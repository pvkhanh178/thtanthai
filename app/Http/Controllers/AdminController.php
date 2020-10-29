<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\LopQuanLy;

class AdminController extends Controller
{
    public function Home(Request $Request)
    {
    	$tai_khoan = User::all()->count();
        $lop_hoc = LopQuanLy::all()->count();
    	return view('admin.home',['tai_khoan'=>$tai_khoan, 'lop_hoc'=>$lop_hoc]);
    }
    
}
