@extends('admin.master')
@section('content')
<div class="container p-2">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <h3 class="text-center"><b class="text-primary ">DANH SÁCH TÀI KHOẢN</b></h3>
        </div>
        <div class="card-body">

          <div class="row">
            <div class="col pb-2">
              <a class="btn btn-info" href="/admin/tai-khoan/them"><i class="fas fa-plus mr-2"></i>Thêm</a>
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
                <th>Tên Tài Khoản</th>
                <th>Họ Tên</th>
                <th>Email</th>
                <th>Mật Khẩu</th>
                <th>Thao Tác</th>
              </tr>
            </thead>
            <tbody>
              @if($danh_sach)
                <?php $i=1; ?>
                @foreach($danh_sach as $item)
                  <tr>
                    <td>
                      {{$i++}}
                    </td>
                    <td>
                      {{ $item->name }}
                    </td>
                    <td>
                      {{ $item->ho_ten }}
                    </td>
                    <td>
                      {{ $item->email }}
                    </td>
                    <td>******</td>
                    <td>
                      @if(Auth::user()->name != $item->name)
                      <a target = '_blank' class="btn btn-sm btn-primary" href="/tai-khoan/{{ $item->name }}">Xem</a>
                      <a class="btn btn-sm btn-success" href="/admin/tai-khoan/sua/{{ $item->name }}">Sửa</a>
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#xoa-{{ $item->id }}">
                        Xóa
                      </button>
                      <div class="modal modal-dialog-centered modal-dialog-scrollable fade" id="xoa-{{ $item->id }}" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Xác nhận xóa</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <p>Bạn có chắc chắn muốn xóa tài khoản: <b class="text-primary">{{ $item->name }}</b></p>
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                              <a class="btn btn-sm btn-danger" href="/admin/tai-khoan/xoa/{{ $item->name }}">Xác Nhận Xóa</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endif
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
@endsection
@section('script')
  
@endsection