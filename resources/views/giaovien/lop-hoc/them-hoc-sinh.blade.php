@extends('giaovien.master')
@section('content')
<div class="container p-2">
	<div class="row">
		<div class="col-md-12">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title"><b>THÊM HỌC SINH</b></h3>
				</div>
				<form role="form" action="{{route('them-hoc-sinh')}}" method="post">
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
							<label for="chonlop">Chọn Lớp</label>
							<select class="form-control" name="id_lop_quan_ly" id="chonlop" required>
								<option value=""></option>
								@if($danh_sach_lop)
									@foreach($danh_sach_lop as $dsl)
										<option value="{{ $dsl->id }}" @if(isset($lop) && $lop->id == $dsl->id)selected @endif>{{ $dsl->ten_lop }}</option>
									@endforeach
								@endif
							</select>
						</div>
						<div class="form-group">
							<label for="TenLop">ID Học Sinh</label>
							<input type="text" name="id_hoc_sinh" class="form-control" id="TenLop" placeholder="Nhập ID của học sinh" required>
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
	    <div class="col pb-2">
	      	<a class="btn btn-info" href="/quan-ly-lop/lop-hoc/danh-sach-hoc-sinh/{{$lop->id}}"><i class='fas fa-arrow-left mr-2'></i>Danh Sách Học Sinh</a>
	    </div>
	</div>
</div>
@endsection
@section('script')

@endsection