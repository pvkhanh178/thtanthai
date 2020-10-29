<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	 ['name' => "admin",
            'email' => Str::random(10)."@email.com",
            'password' => bcrypt("123456"),
            'ho_ten' =>"Admin",
        	'quyen' => 2],
        	 ['name' => "giaovien",
            'email' => Str::random(10)."@email.com",
            'password' => bcrypt("123456"),
            'ho_ten' =>"Nguyễn Trung Hiếu",
        	'quyen' => 1],
        	 ['name' => "hocsinh",
            'email' => Str::random(10)."@email.com",
            'password' => bcrypt("123456"),
            'ho_ten' =>"Nguyễn Hải Đăng",
        	'quyen' => 0],
        	['name' => "hocsinh1",
            'email' => Str::random(10)."@email.com",
            'password' => bcrypt("123456"),
            'ho_ten' =>"Phùng Khải Nguyên",
            'quyen' => 0],
            ['name' => "hocsinh2",
            'email' => Str::random(10)."@email.com",
            'password' => bcrypt("123456"),
            'ho_ten' =>"Lương Việt Hoàng",
            'quyen' => 0],
            ['name' => "hocsinh3",
            'email' => Str::random(10)."@email.com",
            'password' => bcrypt("123456"),
            'ho_ten' =>"Nguyễn Gia Thái",
            'quyen' => 0],
            ['name' => "hocsinh4",
            'email' => Str::random(10)."@email.com",
            'ho_ten' =>"Phạm Thế Vinh",
            'password' => bcrypt("123456"),
            'quyen' => 0],
            ['name' => "hocsinh5",
            'email' => Str::random(10)."@email.com",
            'ho_ten' =>"Nguyễn Quốc Hoàng",
            'password' => bcrypt("123456"),
            'quyen' => 0],
        ]);
        DB::table('lop_hoc')->insert([
            ['ten_lop' => "1",
            'ghi_chu' =>"Lớp 1"],
            ['ten_lop' => "2",
            'ghi_chu' =>"Lớp 2"],
            ['ten_lop' => "3",
            'ghi_chu' =>"Lớp 3"],
            ['ten_lop' => "4",
            'ghi_chu' =>"Lớp 4"],
            ['ten_lop' => "5",
            'ghi_chu' =>"Lớp 5"]
        ]);
        DB::table('loai_cau_hoi')->insert([
            ['ten_loai' => "Chọn đáp án đúng nhất",
            'mo_ta' =>"Chọn đáp án đúng nhất"],
            ['ten_loai' => "Chọn những đáp án đúng",
            'mo_ta' =>"Chọn những đáp án đúng"],
            ['ten_loai' => "Chọn đáp án đúng",
            'mo_ta' =>"Chọn đáp án đúng"],
            ['ten_loai' => "Điền đáp án đúng",
            'mo_ta' =>"Điền đáp án đúng"]
        ]);
        DB::table('mon_hoc')->insert([
            ['id_lop' => 1,
            'ten_mon' => "Toán 1",
            'ghi_chu' =>"Toán Lớp 1",
            'img' => "toan1.jpg"],
            ['id_lop' => 1,
            'ten_mon' => "Tiếng Việt 1",
            'ghi_chu' =>"Tiếng Việt 1",
            'img' => "tiengviet1.jpg"],
            ['id_lop' => 2,
            'ten_mon' => "Toán 2",
            'ghi_chu' =>"Toán Lớp 2",
            'img' => "toan2.jpg"],
            ['id_lop' => 2,
            'ten_mon' => "Tiếng Việt 2",
            'ghi_chu' =>"Tiếng Việt 2",
            'img' => "tiengviet2.jpg"],
            ['id_lop' => 3,
            'ten_mon' => "Toán 3",
            'ghi_chu' =>"Toán Lớp 3",
            'img' => "toan3.jpg"],
            ['id_lop' => 3,
            'ten_mon' => "Tiếng Việt 3",
            'ghi_chu' =>"Tiếng Việt 3",
            'img' => "tiengviet2.jpg"],
            ['id_lop' => 4,
            'ten_mon' => "Toán 4",
            'ghi_chu' =>"Toán Lớp 4",
            'img' => "toan4.jpg"],
            ['id_lop' => 4,
            'ten_mon' => "Tiếng Việt 4",
            'ghi_chu' =>"Tiếng Việt 4",
            'img' => "tiengviet4.jpg"],
            ['id_lop' => 5,
            'ten_mon' => "Toán 5",
            'ghi_chu' =>"Toán Lớp 5",
            'img' => "toan5.jpg"],
            ['id_lop' => 5,
            'ten_mon' => "Tiếng Việt 5",
            'ghi_chu' =>"Tiếng Việt 5",
            'img' => "tiengviet5.jpg"]
        ]);
    }
}
