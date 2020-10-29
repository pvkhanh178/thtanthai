<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//HOME
	Route::get('/', 'Home@getIndex');
	Route::get('index','Home@getIndex');

	Route::get('dang-nhap',[
		'as'=>'login',
		'uses'=>'Home@getLogin'
	]);
	Route::post('dang-nhap',[
		'as'=>'login',
		'uses'=>'Home@postLogin'
	]);

	Route::get('dang-xuat',[
		'as'=>'logout',
		'uses'=>'Home@postLogout'
	]);
	Route::group(['prefix'=>'tai-khoan'],function(){
		Route::get('/','Home@getIndex');
		Route::get('/{id}', 'Home@getTaiKhoan');
		Route::post('/doi-anh', [
				'as'=>'doi-anh',
				'uses'=>'Home@postDoiAnh'
			]);
		Route::post('/doi-thong-tin', [
				'as'=>'doi-thong-tin',
				'uses'=>'Home@postDoiThongTin'
			]);
	});
//END HOME

//AJAX
	Route::group(['prefix'=>'ajax'],function(){
		Route::get('/','Home@getIndex');
		Route::get('mon-hoc/{id}','AjaxController@getMonHoc');
		Route::get('muc-mon-hoc/{id}','AjaxController@getMucMonHoc');
		Route::get('bai-hoc/{id}','AjaxController@getBaiHoc');
		Route::get('bai-hoc-lop-quan-ly/{id}','AjaxController@getBaiHocLopQuanLy');
		Route::get('tra-loi-bai-tap/{id}/{dapan}','AjaxController@setTraLoi');
	});

//HOC SINH
	Route::group(['prefix'=>'lop-cua-toi', 'middleware'=>'hocsinh'],function(){
		Route::get('/','HocSinhController@getIndex');
		Route::get('/{id}','HocSinhController@getLopHoc');
		Route::get('/bai-hoc/{id}','HocSinhController@getBaiHoc');
		Route::get('/bai-tap/{id}','HocSinhController@getBaiTap');
	});

//GIAO VIEN
	Route::group(['prefix'=>'quan-ly-lop', 'middleware'=>'giaovien'],function(){
		Route::get('/','GiaoVienController@getIndex');
	//LOP HOC - DS
		Route::get('lop-hoc/','LopQuanLyController@getDanhSachLop');
		Route::get('lop-hoc/danh-sach','LopQuanLyController@getDanhSachLop');
		Route::get('lop-hoc/danh-sach-hoc-sinh/{id}','LopQuanLyController@getDanhSachHocSinh');
		Route::get('lop-hoc/danh-sach-hoc-sinh',function(){
			return redirect('/quan-ly-lop/lop-hoc');
		});
		Route::get('lop-hoc/chi-tiet-hoc-sinh/{lop}/{id}','LopQuanLyController@getChiTietHocSinh');
		Route::get('lop-hoc/chi-tiet-hoc-sinh',function(){
			return redirect('/quan-ly-lop/lop-hoc');
		});
	//LOP HOC - THEM
		Route::get('lop-hoc/them','LopQuanLyController@getThemLop');
		Route::post('them-lop',[
				'as'=>'them-lop-quan-ly',
				'uses'=>'LopQuanLyController@postThemLop'
			]);
	//LOP HOC - SUA
		Route::get('lop-hoc/sua',function(){
			return redirect('/quan-ly-lop/lop-hoc');
		});
		Route::get('lop-hoc/sua/{id}','LopQuanLyController@getSuaLop');
		Route::post('sua-lop',[
				'as'=>'sua-lop-quan-ly',
				'uses'=>'LopQuanLyController@postSuaLop'
			]);
	//LOP HOC - SUA
		Route::get('lop-hoc/xoa',function(){
			return redirect('/quan-ly-lop/lop-hoc');
		});
		Route::get('lop-hoc/xoa/{id}','LopQuanLyController@getXoaLop');
	//LOP HOC - HS
		Route::get('lop-hoc/them-hoc-sinh/{id?}','LopQuanLyController@getThemHocSinh');
		Route::post('lop-hoc/them-hoc-sinh',[
				'as'=>'them-hoc-sinh',
				'uses'=>'LopQuanLyController@postThemHocSinh'
			]);	
		Route::get('lop-hoc/xoa-hoc-sinh/{lop?}',function(){
			return redirect('/quan-ly-lop/lop-hoc');
		});
		Route::get('lop-hoc/xoa-hoc-sinh/{lop}/{hocsinh}','LopQuanLyController@getXoaHocSinh');
	//BAI HOC
		Route::get('bai-hoc/',function(){
			return redirect('/quan-ly-lop/bai-hoc/danh-sach');
		});
		Route::get('bai-hoc/danh-sach','BaiHocLopQuanLyController@getDanhSach');
		Route::get('bai-hoc/them','BaiHocLopQuanLyController@getThem');
		Route::post('bai-hoc/them',[
				'as'=>'them-bai-hoc-lop-quan-ly',
				'uses'=>'BaiHocLopQuanLyController@postThem'
			]);
		Route::get('bai-hoc/sua/',function(){
			return redirect('/quan-ly-lop/bai-hoc');
		});
		Route::get('bai-hoc/sua/{id}','BaiHocLopQuanLyController@getSua');

		Route::post('bai-hoc/sua',[
				'as'=>'sua-bai-hoc-lop-quan-ly',
				'uses'=>'BaiHocLopQuanLyController@postSua'
			]);
		Route::get('bai-hoc/xoa/',function(){
			return redirect('/quan-ly-lop/bai-hoc');
		});
		Route::get('bai-hoc/xoa/{id}','BaiHocLopQuanLyController@getXoa');
	//Bai Tap
		//Danh Sach
		Route::get('bai-tap/',function(){
			return redirect('/quan-ly-lop/bai-tap/danh-sach');
		});
		Route::get('bai-tap/danh-sach','BaiTapLopQuanLyController@getDanhSach');

		//Them
		Route::get('bai-tap/them','BaiTapLopQuanLyController@getThem');
		Route::post('bai-tap/them',[
				'as'=>'them-bai-tap-lop-quan-ly',
				'uses'=>'BaiTapLopQuanLyController@postThem'
			]);
		//Sua
		Route::get('bai-tap/sua/',function(){
			return redirect('/quan-ly-lop/bai-tap');
		});
		Route::get('bai-tap/sua/{id}','BaiTapLopQuanLyController@getSua');
		Route::post('bai-tap/sua',[
				'as'=>'sua-bai-tap-lop-quan-ly',
				'uses'=>'BaiTapLopQuanLyController@postSua'
			]);
		//Xoa
		Route::get('bai-tap/xoa/',function(){
			return redirect('/quan-ly-lop/bai-tap');
		});
		Route::get('bai-tap/xoa/{id}','BaiTapLopQuanLyController@getXoa');

	});

//ADMIN
	Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){
		Route::get('/','AdminController@Home');

		Route::group(['prefix'=>'tai-khoan'],function(){
			Route::get('/','TaiKhoanController@index');
			Route::get('danh-sach','TaiKhoanController@index');
			Route::get('them','TaiKhoanController@getThem');
			Route::post('them',[
				'as'=>'them-tai-khoan',
				'uses'=>'TaiKhoanController@postThem'
			]);
			Route::get('sua/{id}','TaiKhoanController@getSua');
			Route::post('sua',[
				'as'=>'sua-tai-khoan',
				'uses'=>'TaiKhoanController@postSua'
			]);
			Route::get('sua/', function(){
				return redirect('admin/tai-khoan/danh-sach');
			});
			Route::get('xoa/{id}','TaiKhoanController@Xoa');
			Route::get('xoa/', function(){
				return redirect('admin/tai-khoan/danh-sach');
			});
		});
	});
//END ADMIN
