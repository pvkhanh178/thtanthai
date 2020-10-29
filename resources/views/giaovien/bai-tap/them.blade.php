@extends('giaovien.master')
@section('content')
<div class="container p-2">
	<div class="row">
		<div class="col-md-12">
			<div class="card card-primary">
				<div class="card-header">
					<h5 class="text-center m-1"><b>THÊM BÀI TẬP</b></h5>
				</div>
				<form role="form" action="{{route('them-bai-tap-lop-quan-ly')}}" method="post" enctype="multipart/form-data">
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
						<div class="form-group lazy">
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
						<div class="form-group lazy">
							<label for="TenBaiHoc">Tên Bài Học</label>
							<select name="id_bai_hoc_lop_quan_ly" id="TenBaiHoc" class="form-control" required>
								<option value=""></option>
							</select>
						</div>
						<div class="form-group lazy">
							<label for="LoaiCauHoi">Loại Câu Hỏi</label>
							<select name="id_loai_cau_hoi" id="LoaiCauHoi" class="form-control" required>
								<option value=""></option>
								@if($loai_cau_hoi)
									@foreach($loai_cau_hoi as $loai)
										<option value="{{ $loai->id }}">{{ $loai->ten_loai }}</option>
									@endforeach
								@endif
							</select>
						</div>
						<div class="form-group lazy">
							<label for="CauHoi">Tên Câu Hỏi</label>
							<input type="text" name="cau_hoi" class="form-control" id="CauHoi" required>
						</div>
						<div class="form-group lazy">
							<label for="NoiDung">Nội Dung Câu Hỏi</label>
							<textarea class="form-control tinyEditer" name="noi_dung" id="NoiDung" rows="10"></textarea>
						</div>
						<div class="form-group lazy" id="D1">
							<label for="DapAn1">Đáp Án 1</label>
							<textarea class="form-control tinyEditer" name="dap_an_1" id="DapAn1" rows="10"></textarea>
						</div>
						<div class="form-group lazy" id="D2">
							<label for="DapAn2">Đáp Án 2</label>
							<textarea class="form-control tinyEditer" name="dap_an_2" id="DapAn2" rows="10"></textarea>
						</div>
						<div class="form-group lazy" id="D3">
							<label for="DapAn3">Đáp Án 3</label>
							<textarea class="form-control tinyEditer" name="dap_an_3" id="DapAn3" rows="10"></textarea>
						</div>
						<div class="form-group lazy" id="D4">
							<label for="DapAn2">Đáp Án 4</label>
							<textarea class="form-control tinyEditer" name="dap_an_4" id="DapAn4" rows="10"></textarea>
						</div>
						<div class="form-group lazy">
							<label for="DapAnDung">Đáp Án Đúng</label>
							<input type="text" name="dap_an_dung" class="form-control" id="DapAnDung" required>
						</div>
						<div class="form-group lazy" id="DA2">
							<label for="DapAnDung2">Đáp Án Đúng 2</label>
							<input type="text" name="dap_an_dung1" class="form-control" id="DapAnDung2">
						</div>
					</div>
					<div class="card-footer lazy">
						<button type="submit" class="btn btn-primary">Thêm</button>
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-6">
		</div>
	</div>
	<div class="row lazy">
	  <div class="col lazy">
	    <div class="text-center mb-3 lazy">
	      <a class="btn btn-primary lazy" href="/quan-ly-lop/bai-tap"><i class='fas fa-arrow-left mr-2'></i> Danh Sách Bài Tập</a>
	    </div>
	  </div>
	</div>
</div>
@endsection
@section('script')

	<script type="text/javascript">
	    $('document').ready(function(){
	    	$('#D3').hide();
	    	$('#D4').hide();
	    	$('#DA2').hide();
            tinymce.init({
              selector: '.tinyEditer'
            });
            $('#LoaiCauHoi').change(function(){
		        var id = $(this).val();
		        if(id==2){
		        	$('#DA2').show();
		        }else{
		        	$('#DA2').hide();
		        }
		        if(id==4){
		        	$('#D1').hide();
		        	$('#D2').hide();
		        	$('#D3').hide();
			    	$('#D4').hide();
			    	$('#DA2').hide();
		        }
		        if(id==1||id==2){
			    	$('#D3').show();
			    	$('#D4').show();
		        }else{
		        	$('#D3').hide();
	    			$('#D4').hide();
		        }
	      	});
	      	$('#MaLop').change(function(){
		        var id = $(this).val();
		        if(id==''){
		        	$('#TenBaiHoc').html(data);
		        }
		        else
		        $.get('../../ajax/bai-hoc-lop-quan-ly/' + id,function(data){
		          	$('#TenBaiHoc').html(data);
		        });
	      	});
	    });
  	</script>
@endsection