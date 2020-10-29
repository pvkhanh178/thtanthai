@extends('admin.master')
@section('content')

<div class="container p-2">
	<div class="row">
	    <div class="col pb-2">
	      	<a class="btn btn-info" href="/admin/tai-khoan/danh-sach"><i class="fas fa-angle-left mr-2"></i>Danh Sách Tài Khoản</a>
	    </div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title"><b>SỬA TÀI KHOẢN</b></h3>
				</div>
				<form role="form" action="{{route('sua-tai-khoan')}}" method="post" enctype="multipart/form-data">
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
							<label for="">Tên Đăng Nhập</label>
							<input type="text" value="{{ $tai_khoan->name }}" class="form-control" disabled="">
							<input type="text" onkeypress="return /[a-z0-9]/i.test(event.key)" name="name" value="{{ $tai_khoan->name }}" style="display:none;">
						</div>
						<div class="form-group">
							<label for="">Mật Khẩu</label>
							<input type="password" name="password"  class="form-control" placeholder="Nhập...">
						</div>
						<div class="form-group">
							<label for="">Họ Tên</label>
							<input type="text" name="ho_ten" onkeypress="return /[AĂÂÁẮẤÀẰẦẢẲẨÃẴẪẠẶẬĐEÊÉẾÈỀẺỂẼỄẸỆIÍÌỈĨỊOÔƠÓỐỚÒỒỜỎỔỞÕỖỠỌỘỢUƯÚỨÙỪỦỬŨỮỤỰYÝỲỶỸỴAĂÂÁẮẤÀẰẦẢẲẨÃẴẪẠẶẬĐEÊÉẾÈỀẺỂẼỄẸỆIÍÌỈĨỊOÔƠÓỐỚÒỒỜỎỔỞÕỖỠỌỘỢUƯÚỨÙỪỦỬŨỮỤỰYÝỲỶỸỴAĂÂÁẮẤÀẰẦẢẲẨÃẴẪẠẶẬĐEÊÉẾÈỀẺỂẼỄẸỆIÍÌỈĨỊOÔƠÓỐỚÒỒỜỎỔỞÕỖỠỌỘỢUƯÚỨÙỪỦỬŨỮỤỰYÝỲỶỸỴAĂÂÁẮẤÀẰẦẢẲẨÃẴẪẠẶẬĐEÊÉẾÈỀẺỂẼỄẸỆIÍÌỈĨỊOÔƠÓỐỚÒỒỜỎỔỞÕỖỠỌỘỢUƯÚỨÙỪỦỬŨỮỤỰYÝỲỶỸỴAĂÂÁẮẤÀẰẦẢẲẨÃẴẪẠẶẬĐEÊÉẾÈỀẺỂẼỄẸỆIÍÌỈĨỊOÔƠÓỐỚÒỒỜỎỔỞÕỖỠỌỘỢUƯÚỨÙỪỦỬŨỮỤỰYÝỲỶỸỴAĂÂÁẮẤÀẰẦẢẲẨÃẴẪẠẶẬĐEÊÉẾÈỀẺỂẼỄẸỆIÍÌỈĨỊOÔƠÓỐỚÒỒỜỎỔỞÕỖỠỌỘỢUƯÚỨÙỪỦỬŨỮỤỰYÝỲỶỸỴA-Z ]/i.test(event.key)" value="{{ $tai_khoan->ho_ten }}" class="form-control" placeholder="Nhập..." required>
						</div>
						<div class="form-group">
							<label for="">Địa Chỉ</label>
							<input type="text" name="dia_chi" onkeypress="return /[AĂÂÁẮẤÀẰẦẢẲẨÃẴẪẠẶẬĐEÊÉẾÈỀẺỂẼỄẸỆIÍÌỈĨỊOÔƠÓỐỚÒỒỜỎỔỞÕỖỠỌỘỢUƯÚỨÙỪỦỬŨỮỤỰYÝỲỶỸỴAĂÂÁẮẤÀẰẦẢẲẨÃẴẪẠẶẬĐEÊÉẾÈỀẺỂẼỄẸỆIÍÌỈĨỊOÔƠÓỐỚÒỒỜỎỔỞÕỖỠỌỘỢUƯÚỨÙỪỦỬŨỮỤỰYÝỲỶỸỴAĂÂÁẮẤÀẰẦẢẲẨÃẴẪẠẶẬĐEÊÉẾÈỀẺỂẼỄẸỆIÍÌỈĨỊOÔƠÓỐỚÒỒỜỎỔỞÕỖỠỌỘỢUƯÚỨÙỪỦỬŨỮỤỰYÝỲỶỸỴAĂÂÁẮẤÀẰẦẢẲẨÃẴẪẠẶẬĐEÊÉẾÈỀẺỂẼỄẸỆIÍÌỈĨỊOÔƠÓỐỚÒỒỜỎỔỞÕỖỠỌỘỢUƯÚỨÙỪỦỬŨỮỤỰYÝỲỶỸỴAĂÂÁẮẤÀẰẦẢẲẨÃẴẪẠẶẬĐEÊÉẾÈỀẺỂẼỄẸỆIÍÌỈĨỊOÔƠÓỐỚÒỒỜỎỔỞÕỖỠỌỘỢUƯÚỨÙỪỦỬŨỮỤỰYÝỲỶỸỴAĂÂÁẮẤÀẰẦẢẲẨÃẴẪẠẶẬĐEÊÉẾÈỀẺỂẼỄẸỆIÍÌỈĨỊOÔƠÓỐỚÒỒỜỎỔỞÕỖỠỌỘỢUƯÚỨÙỪỦỬŨỮỤỰYÝỲỶỸỴA-Z 0-9,.-]/i.test(event.key)" value="{{ $tai_khoan->dia_chi }}" class="form-control" placeholder="Nhập..." required>
						</div>
						<div class="form-group">
							<label for="MaLop">Quyền</label>
							<select name="quyen" class="form-control" value="{{ $tai_khoan->quyen }}" required>
								<option value="0" @if($tai_khoan->quyen ==0) selected @endif>Học Sinh</option>
								<option value="1" @if($tai_khoan->quyen ==1) selected @endif>Giáo Viên</option>
								<option value="2" @if($tai_khoan->quyen ==2) selected @endif>Quản Trị Viên</option>
							</select>
						</div>
					</div>
					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Thêm</button>
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-6">
		</div>
	</div>
	
</div>
@endsection
@section('script')
	<script type="text/javascript">
	    $('document').ready(function(){
	      	$('#MaLop').change(function(){
		        var id = $(this).val();
		        if(id==''){
		        	$('#TenMon').html('');
		        	$('#MucMonHoc').html('');
		        }
		        else
		        $.get('../../ajax/mon-hoc/' + id,function(data){
		          	$('#TenMon').html(data);
		          	$('#MucMonHoc').html('');
		        });
	      	});
	      	$('#TenMon').change(function(){
		        var id = $(this).val();
		        if(id=='')
		        	$('#MucMonHoc').html('');
		        else
		        $.get('../../ajax/muc-mon-hoc/' + id,function(data){
		          	$('#MucMonHoc').html(data);
		        });
	      	});
	    });
  	</script>
@endsection