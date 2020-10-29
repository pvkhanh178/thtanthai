@extends('master')
@section('content')
<div class="container-fluid bg-breadcrumb">
      <div class="row">
          <div class="container">
              <div class="row">
                  <ol class="breadcrumb">
                      <li><a href="/"><i class="fa fa-home"></i>Trang chủ</a></li>
                      <li class="li-active"><span>Tài khoản</span></li>
                   </ol>
              </div>
          </div>
      </div>
  </div>
<div class="container">
<br>
@if(Auth::User()->name == $tai_khoan->name)
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline m-bg-secondary text-light mb-2 shadow">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img"
                     src="{{$tai_khoan->anh_dai_dien}}"
                     alt="User profile picture"
                     width="120"
                     height="120">
              </div>

              <h5 class="profile-username text-center p-2"><b>{{$tai_khoan->ho_ten}}</b></h5>
              <h5 class="profile-username text-center p-2">ID: <b>{{$tai_khoan->id}}</b></h5>
              <p class="text-light text-center"><i><small>"{{$tai_khoan->trang_thai}} "</small></i></p>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- About Me Box -->
          <div class="card card-primary bg-info text-light shadow">
            <div class="card-header">
              <h5 class="card-title">Thông tin</h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <strong><i class="fa fa-info mr-1"></i> Quyền</strong>

              <p class="text text-light">
                @if($tai_khoan->quyen==2)
                  Quản trị viên
                @elseif($tai_khoan->quyen==1)
                  Giáo viên
                @elseif($tai_khoan->quyen==0)
                  Học sinh
                @endif
              </p>

              <hr>
              <strong><i class="far fa-envelope mr-1"></i> E-mail</strong>

              <p class="text text-light">
                {{$tai_khoan->email}}
              </p>

              <hr>

              <strong><i class="fas fa-map-marker-alt mr-1"></i> Địa chỉ</strong>

              <p class="text text-light">{{$tai_khoan->dia_chi}}</p>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card shadow">
            <div class="card-header p-2 m-bg-secondary">
              <h5 class="text-light"><b>Chỉnh sửa thông tin</b></h5>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="row">
              
              <div class="col-md-6">
                <div class="card card-primary">
                  <div class="card-header">
                    <h5 class="card-title">Thông tin chung</h5>
                  </div>
                  
                    <form role="form" action="{{route('doi-thong-tin')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="card-body">
                        @if(Session::has('Success'))
                          <div class="alert alert-success">{{Session::get('Success')}}</div>
                        @endif
                        @if(Session::has('Failed'))
                          <div class="alert alert-danger">{{Session::get('Failed')}}</div>
                          @endif
                        @if(count($errors)>0)
                          <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                            {{$err}} <br>
                            @endforeach
                          </div>
                        @endif
                        <div class="form-group">
                          <label for="inputHoTen">Họ Tên</label>
                          <input type="text" id="inputHoTen" name="ho_ten" class="form-control" value="{{$tai_khoan->ho_ten}}">
                        </div>
                        <div class="form-group">
                          <label for="inputTrangThai">Trạng Thái</label>
                          <textarea id="inputTrangThai" name="trang_thai" class="form-control" rows="4">{{$tai_khoan->trang_thai}}</textarea>
                        </div>
                        <div class="form-group">
                          <label for="inputDiaChi">Địa chỉ</label>
                          <input type="text" id="inputDiaChi" name="dia_chi" class="form-control" value="{{$tai_khoan->dia_chi}}">
                        </div>
                        <div class="form-group">
                          <label for="inputEmail">Email</label>
                          <input type="text" id="inputEmail" name="email" class="form-control" value="{{$tai_khoan->email}}">
                        </div>
                        <div class="form-group">
                          <input type="submit" class="btn btn-primary" value="Lưu">
                        </div>
                      </div>
                    </form>
                 
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <div class="col-md-6">
                <div class="card card-primary">
                  <div class="card-header">
                    <h5 class="card-title">Ảnh đại diện</h5>
                  </div>
                  <form role="form" action="{{route('doi-anh')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        @if(Session::has('img_Success'))
                          <div class="alert alert-success">{{Session::get('img_Success')}}</div>
                        @endif
                        @if(Session::has('img_Failed'))
                          <div class="alert alert-danger">{{Session::get('img_Failed')}}</div>
                        @endif
                        <label for="uploadImage">Ảnh</label>
                        <input type="file" id="uploadImage" name="img" class="form-control-file">
                      </div>
                      <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Lưu">
                      </div>
                    </div>
                  </form>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              
            </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@else
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <div class=" mb-2">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img"
                     src="{{$tai_khoan->anh_dai_dien}}"
                     alt="User profile picture"
                     width="200"
                     height="200">
              </div>
              <h5 class="profile-username text-center p-2"><b>{{$tai_khoan->ho_ten}}</b></h5>
              <h5 class="profile-username text-center p-2">ID: <b>{{$tai_khoan->id}}</b></h5>
              <p class="text-light text-center"><i><small>"{{$tai_khoan->trang_thai}} "</small></i></p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card card-primary bg-info text-light shadow">
            <div class="card-header">
              <h5 class="card-title">Thông tin</h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <strong><i class="fa fa-info mr-1"></i> Quyền</strong>

              <p class="text text-light">
                @if($tai_khoan->quyen==2)
                  Quản trị viên
                @elseif($tai_khoan->quyen==1)
                  Giáo viên
                @elseif($tai_khoan->quyen==0)
                  Học sinh
                @endif
              </p>

              <hr>
              <strong><i class="far fa-envelope mr-1"></i> E-mail</strong>

              <p class="text text-light">
                {{$tai_khoan->email}}
              </p>

              <hr>

              <strong><i class="fas fa-map-marker-alt mr-1"></i> Địa chỉ</strong>

              <p class="text text-light">{{$tai_khoan->dia_chi}}</p>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endif
</div>
  
@endsection