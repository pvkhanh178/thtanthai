@extends('master')
@section('content')
<div class="form-m" >
	<div class="form-m-main">
		<img class="form-m-img" height="120" src="/source/image/mono_cat.png" alt="">
		<div class="form-m-box">
			<div class="form-m-title">
				<div class="text-title text-center m-text-secondary"><b>ĐĂNG NHẬP</b></div>
			</div>
			<div class="form-m-content">
				@if(count($errors)>0)
					<div class="alert alert-danger">
						@foreach($errors->all() as $err)
						{{$err}} <br>
						@endforeach
					</div>
				@endif
				@if(Session::has('Message'))
					<div class="alert alert-danger">{{Session::get('Message')}}</div>	
				@endif
				<form action="{{route('login')}}" method="post">
					@csrf
					<ul>
						<li class="border-bottom">
							<i class="fa fa-user"></i>
							<input type="text" name="name" placeholder="Tên đăng nhập" value="{{ old('name') }}" required>
						</li>
						<li>
							<i class="fa fa-key"></i>
							<input type="password" name="password" placeholder="Mật khẩu" value="" required>
						</li>
					</ul>
					<br>
					
					<div class="text-center">
						<button type="submit" class="btn m-btn-primary">ĐĂNG NHẬP</button>
					</div>
					<br>
				</form>
			</div>
			<div class="form-m-footer m-bg-secondary">
				<p>Chưa có tài khoản <a href="dang-ky">Đăng ký</a> ngay!</p>
			</div>
		</div>
			
	</div>
</div>
@endsection
