@extends('admin.master')
@section('content')

<div class="container p-2">
  <h3 class="text-center p-3 text-primary"><b>TỔNG QUAN</b></h3>
  <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{ $lop_hoc }}</h3>
          <p>Lớp Học</p>
        </div>
        <div class="icon">
          <i class="fas fa-graduation-cap"></i>
        </div>
        <a href="/admin/lop-hoc/danh-sach" class="small-box-footer">Chi tiết... <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{ $tai_khoan }}</h3>

          <p>Tài Khoản</p>
        </div>
        <div class="icon">
          <i class="fas fa-user"></i>
        </div>
        <a href="/admin/tai-khoan/danh-sach" class="small-box-footer">Chi tiết... <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
</div>
  
@endsection
@section('script')

@endsection