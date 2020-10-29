@extends('giaovien.master')
@section('content')
<div class="container p-2">
	<div class="row">
		<div class="col-md-12">
			<div class="card card-primary">
				<div class="card-header">
					<h5 class="text-center m-1"><b>THÊM BÀI HỌC</b></h5>
				</div>
				<form role="form" action="{{route('them-bai-hoc-lop-quan-ly')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="card-body">
						@if(Session::has('Success'))
							<div class="alert alert-success">{{Session::get('Success')}}</div>
						@endif
						@if(count($errors)>0)
							<div class="alert alert-danger">
								@foreach($errors->all() as $err)
								{{$err}} <br>
								@endforeach
							</div>
						@endif
						<div class="form-group">
							<label for="MaLop">Chọn Lớp</label>
							<select name="id_lop_quan_ly" id="MaLop" class="form-control" required>
								<option value=""></option>

								@if($danh_sach)
									@foreach($danh_sach as $lop)
										<option value="{{ $lop->id }}">{{ $lop->ten_lop }}</option>
									@endforeach
								@endif
							</select>
						</div>
						<div class="form-group">
							<label for="TenBaiHoc">Tên Bài Học</label>
							<input type="text" name="ten_bai_hoc" class="form-control" id="TenBaiHoc" placeholder="Nhập tên mục" required>
						</div>
						<div class="form-group">
							<label for="tinyEditer">Nội Dung</label>
							<textarea class="form-control" name="noi_dung" id="tinyEditer" cols="30" rows="20"></textarea>
							
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
	<div class="row">
	  <div class="col">
	    <div class="text-center mb-3">
	      <a class="btn btn-primary" href="/quan-ly-lop/bai-hoc/danh-sach"><i class='fas fa-arrow-left mr-2'></i> Danh Sách Bài Học</a>
	    </div>
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