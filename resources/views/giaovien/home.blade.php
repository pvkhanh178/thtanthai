@extends('giaovien.master')
@section('content')

<div class="container p-2">
  <h3 class="text-center p-3 text-primary"><b>TỔNG QUAN</b></h3>
  <div class="row">
    <div class="col-lg col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{ $lop }}</h3>
          <p>Lớp Học</p>
        </div>
        <div class="icon">
          <i class="fas fa-graduation-cap"></i>
        </div>
        <a href="/quan-ly-lop/lop-hoc/danh-sach" class="small-box-footer">Chi tiết... <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{$bai_hoc}}</h3>

          <p>Bài Học</p>
        </div>
        <div class="icon">
          <i class="fa fa-book-open"></i>
        </div>
        <a href="/quan-ly-lop/bai-hoc/danh-sach" class="small-box-footer">Chi tiết... <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{$bai_tap}}</h3>

          <p>Bài Tập</p>
        </div>
        <div class="icon">
          <i class="fas fas fa-book"></i>
        </div>
        <a href="/quan-ly-lop/bai-tap/danh-sach" class="small-box-footer">Chi tiết... <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
</div>
  
@endsection
@section('script')

@endsection