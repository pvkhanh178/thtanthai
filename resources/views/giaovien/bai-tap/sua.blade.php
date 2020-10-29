@extends('giaovien.master')
@section('content')
<div class="container p-2">
	<div class="row">
		<div class="col-md-12">
			<div class="card card-primary">
				<div class="card-header text-center">
					<h5 class="text-center m-1"><b>SỬA BÀI TẬP</b></h5>
				</div>
				<form role="form" action="{{route('sua-bai-tap-lop-quan-ly')}}" method="post" enctype="multipart/form-data">
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
										<option value="{{ $lop->id }}" @if($lop->id == $bai_tap->bai_hoc->lop_quan_ly->id) selected @endif>{{ $lop->ten_lop }}</option>
									@endforeach
								@endif
							</select>
						</div>
						<div class="form-group">
							<label for="TenBaiHoc">Tên Bài Học</label>
							<select name="id_bai_hoc_lop_quan_ly" id="TenBaiHoc" class="form-control" required>

								<option value=""></option>
								@if($bai_tap)
									@foreach($bai_tap->bai_hoc->lop_quan_ly->bai_hoc as $bai_hoc)
										<option value="{{ $bai_hoc->id }}" @if($bai_hoc->id == $bai_tap->bai_hoc->id) selected @endif>{{ $bai_hoc->ten_bai_hoc }}</option>
									@endforeach
								@endif
							</select>
						</div>
						<div class="form-group">
							<label for="LoaiCauHoi">Loại Câu Hỏi</label>
							<select name="id_loai_cau_hoi" id="LoaiCauHoi" class="form-control" required>
								<option value=""></option>
								@if($loai_cau_hoi)
									@foreach($loai_cau_hoi as $loai)
										<option value="{{ $loai->id }}" @if($bai_tap->id_loai_cau_hoi == $loai->id) selected @endif>{{ $loai->ten_loai }}</option>
									@endforeach
								@endif
							</select>
						</div>
						<div class="form-group">
							<label for="CauHoi">Tên Câu Hỏi</label>
							<input type="text" name="cau_hoi" class="form-control" id="CauHoi" required value="{{ $bai_tap->cau_hoi }}">
						</div>
						<div class="form-group">
							<label for="NoiDung">Nội Dung Câu Hỏi</label>
							<textarea class="form-control tinyEditer" name="noi_dung" id="NoiDung" rows="10">{{ $bai_tap->noi_dung }}</textarea>
						</div>
						<div class="form-group" id="D1">
							<label for="DapAn1">Đáp Án 1</label>
							<textarea class="form-control tinyEditer" name="dap_an_1" id="DapAn1" rows="10">{{ $bai_tap->dap_an_1 }}</textarea>
						</div>
						<div class="form-group" id="D2">
							<label for="DapAn2">Đáp Án 2</label>
							<textarea class="form-control tinyEditer" name="dap_an_2" id="DapAn2" rows="10">{{ $bai_tap->dap_an_2 }}</textarea>
						</div>
						<div class="form-group" id="D3">
							<label for="DapAn3">Đáp Án 3</label>
							<textarea class="form-control tinyEditer" name="dap_an_3" id="DapAn3" rows="10">{{ $bai_tap->dap_an_3 }}</textarea>
						</div>
						<div class="form-group" id="D4">
							<label for="DapAn2">Đáp Án 4</label>
							<textarea class="form-control tinyEditer" name="dap_an_4" id="DapAn4" rows="10">{{ $bai_tap->dap_an_4 }}</textarea>
						</div>
						<div class="form-group">
							<label for="DapAnDung">Đáp Án Đúng</label>
							<input type="text" name="dap_an_dung" class="form-control" id="DapAnDung" required value="{{ $bai_tap->dap_an_dung }}">
						</div>
						<div class="form-group" id="DA2">
							<label for="DapAnDung2">Đáp Án Đúng 2</label>
							<input type="text" name="dap_an_dung1" class="form-control" id="DapAnDung2" value="{{ $bai_tap->dap_an_dung1 }}">
						</div>
					</div>
					<div class="card-footer">
						<button type="submit" class="btn btn-primary" name="id" value="{{ $bai_tap->id }}">Sửa</button>
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
	      <a class="btn btn-primary" href="/quan-ly-lop/bai-tap"><i class='fas fa-arrow-left mr-2'></i> Danh Sách Bài Tập</a>
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
	    	var id = $('#LoaiCauHoi').val();
	    	if(id==2){
		        	$('#DA2').show();
	        }else{
	        	$('#DA2').hide();
	        }
	        if(id==1||id==2||id==4){
		    	$('#D3').show();
		    	$('#D4').show();
	        }else{
	        	$('#D3').hide();
    			$('#D4').hide();
	        }
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
		        if(id==1||id==2||id==4){
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