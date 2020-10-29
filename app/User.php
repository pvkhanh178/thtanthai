<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $table = "users";
    public function lop_quan_ly(){
        return $this->hasMany('App\LopQuanLy','id_giao_vien','id');
    }
    public function chi_tiet_lop_quan_ly(){
        return $this->hasMany('App\ChiTietLopQuanLy','id_hoc_sinh','id');
    }
    public function chi_tiet_lam_bai(){
        return $this->hasMany('App\ChiTietLamBaiTapLopQuanLy','id_hoc_sinh','id');
    }
}
