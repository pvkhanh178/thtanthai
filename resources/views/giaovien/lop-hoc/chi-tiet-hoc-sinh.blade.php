@extends('giaovien.master')
@section('content')
<div class="container p-2">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <h3 class="text-center"><b class="text-primary ">CHI TIẾT HỌC SINH</b></h3>
        </div>
        <div class="card-body">
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
                <th>Tên Câu Hỏi</th>
                <th>Số Lần Làm Bài</th>
                <th>Kết Quản Làm Bài</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1; ?>
              @foreach($chi_tiet_bai_tap as $bai_tap)
                @if($bai_tap->bai_tap_lop_quan_ly->bai_hoc->lop_quan_ly->id == $chi_tiet->id_lop_quan_ly)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>
                    {{ $bai_tap->bai_tap_lop_quan_ly->cau_hoi }}
                  </td>
                  <td>
                    {{ $bai_tap->so_lan_lam_bai }}
                  </td>
                  <td>
                    @if($bai_tap->tra_loi_dung == 1)
                    Đúng
                    @else
                    Sai
                    @endif
                  </td>
                </tr>
                @endif
              @endforeach
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
      <a class="btn btn-primary" href="/quan-ly-lop/lop-hoc/danh-sach-hoc-sinh/{{ $chi_tiet->id_lop_quan_ly }}"><i class='fas fa-arrow-left mr-2'></i> Danh sách học sinh</a>
    </div>
  </div>
</div>
@endsection
@section('script')

@endsection