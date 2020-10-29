@extends('giaovien.master')
@section('content')
<div class="container p-2">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <h3 class="text-center"><b class="text-primary ">DANH SÁCH HỌC SINH LỚP: {{ $lop_quan_ly->ten_lop }}</b></h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col pb-2">
              <a class="btn btn-info" href="/quan-ly-lop/lop-hoc/them-hoc-sinh/{{ $lop_quan_ly->id }}"><i class="fas fa-plus mr-2"></i>Thêm Học Sinh</a>
            </div>
          </div>
          <div class="row">
            <div class="col">
              @if(Session::has('Success'))
                <div class="alert alert-success">{{Session::get('Success')}}
                </div>
              @endif
              @if(Session::has('Failed'))
                <div class="alert alert-danger">{{Session::get('Failed')}}
                </div>
              @endif
            </div>
          </div>
          <table class="table table-bordered table-hover table-striped">
            <thead>
              <tr class="bg-info">
                <th>STT</th>
                <th>Tên Học Sinh</th>
                <th>Điểm</th>
                <th>Thao Tác</th>
              </tr>
            </thead>
            <tbody>
              @if($quan_ly_lop)
              <?php $i=1; ?>
                @foreach($quan_ly_lop as $hoc_sinh)
                  <tr>
                    <td>
                      {{$i++}}
                    </td>
                    <td>
                      {{ $hoc_sinh->hoc_sinh->ho_ten}}
                    </td>
                    <td>
                      {{ $hoc_sinh->diem}}
                    </td>
                    <td>
                      <a class="btn btn-sm btn-primary" href="/quan-ly-lop/lop-hoc/chi-tiet-hoc-sinh/{{ $lop_quan_ly->id }}/{{ $hoc_sinh->hoc_sinh->id }}">Xem Chi Tiết</a>
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#xoalop-{{ $hoc_sinh->hoc_sinh->id }}">
                        Xóa Khỏi Lớp
                      </button>
                      <div class="modal modal-dialog-centered modal-dialog-scrollable fade" id="xoalop-{{ $hoc_sinh->hoc_sinh->id }}" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Xác nhận xóa</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <p>Bạn có chắc chắn muốn xóa học sinh  <b class="text-primary">{{ $hoc_sinh->hoc_sinh->ho_ten }}</b> khỏi lớp học không?</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                              <a class="btn btn-sm btn-danger" href="/quan-ly-lop/lop-hoc/xoa-hoc-sinh/{{ $lop_quan_ly->id }}/{{ $hoc_sinh->hoc_sinh->id }}">Xác Nhận Xóa</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col">
    <div class="text-center mb-3">
      <a class="btn btn-primary" href="/quan-ly-lop/lop-hoc/danh-sach"><i class='fas fa-arrow-left mr-2'></i> Danh sách lớp</a>
    </div>
  </div>
</div>
@endsection
@section('script')

@endsection