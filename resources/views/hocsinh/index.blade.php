@extends('master')
@section('content')
	<div class="container-fluid bg-breadcrumb" >
	    <div class="row">
	        <div class="container">
	            <div class="row">
	                <ol class="breadcrumb">
	                    <li><a href="/"><i class="fa fa-home"></i>Trang chủ</a></li>
	                    <li class="li-active"><span>Lớp Của Tôi</span></li>
	                 </ol>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="container-fluid m-container">
		<div class="container content-box">
	        <div class="row content-sheet">
	            <div class="col-md-8 col-12">
	                <div class="article">
	                    <h5 class="title m-text-primary"><b>DANH SÁCH LỚP HỌC ĐANG THAM GIA</b></h5>
	               		<hr>
	                    <div id="blogPostContainer" class="blog_post_container">
	                        <div class="row">
	                        	<div class="col">
		                        	@foreach($danh_sach as $lop_hoc)
							        	<div class="title">
							        		<h5>
							        			
							        			<a href="/lop-cua-toi/{{ $lop_hoc->lop_quan_ly->id }}">
								        			<div class="d-flex justify-content-between">
								        				<h5><i class='m-text-secondary fas fa-chalkboard-teacher mr-2'></i>{{ $lop_hoc->lop_quan_ly->ten_lop }}</h5>
								        				<h6>{{ $lop_hoc->diem }} điểm</h6>
								        			</div>
							        			</a>
							        		</h5>
							        		<hr>
							        	</div>
									@endforeach
		    						<div class="clearfix"></div> 
	    						</div>
							</div>
						</div>                            
	                </div>
	            </div>
	           	<div class="col-md-4 col-12">
	                <h5 class="title m-text-primary"><b>HOẠT ĐỘNG</b></h5>
	                <div class="news-list">
                        <ul>
			               	@foreach(Auth::user()->chi_tiet_lam_bai as $chi_tiet)
			               		<li>Làm bài tập lúc {{ Date("h:m d/m/Y", strtotime($chi_tiet->created_at)) }}</li>
			               	@endforeach
		               </ul>
		           </div>

	            </div>
	        </div>
		</div>
	</div>
@endsection
@section('script')
@endsection