@extends('giaovien.master')
@section('content')
<div class="container p-2">
	<div class="row">
		<div class="col-md-12">
			<div class="card card-primary">
				<div class="card-header">
					<h5 class="text-center m-1"><b>SỬA LỚP HỌC</b></h5>
				</div>
				<form role="form" action="{{route('sua-lop-quan-ly')}}" method="post">
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
							<label for="TenLop">Tên Lớp</label>
							<input type="text" name="ten_lop" value="{{ $lop->ten_lop }}" class="form-control" id="TenLop" placeholder="Nhập tên lớp" required>
						</div>
					</div>
					<div class="card-footer">
						<button type="submit" name="id" value="{{ $lop->id }}" class="btn btn-primary">Sửa</button>
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-6">
		</div>
	</div>
	<div class="row">
	    <div class="col pb-2">
	      	<a class="btn btn-info" href="/quan-ly-lop/lop-hoc/danh-sach"><i class='fas fa-arrow-left mr-2'></i>Danh Sách Lớp</a>
	    </div>
	</div>
</div>
@endsection
@section('script')

@endsection