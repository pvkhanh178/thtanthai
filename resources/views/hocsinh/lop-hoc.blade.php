@extends('master')
@section('content')
	<div class="container-fluid bg-breadcrumb" >
	    <div class="row">
	        <div class="container">
	            <div class="row">
	                <ol class="breadcrumb">
	                    <li><a href="/"><i class="fa fa-home"></i>Trang chủ</a></li>
	                    <li><a href="/lop-cua-toi">Lớp Của Tôi</a></li>
	                    <li class="li-active"><span>{{ $danh_sach->ten_lop }}</span></li>
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
	                    <h3 class="title m-text-primary"><b>{{ $danh_sach->ten_lop }}</b></h3>
	               		<hr>                        
	                </div>
	                <div class="muc-mon-hoc">
			            <ul> 
			                <li>
		                        <ul>
		                            @foreach($danh_sach->bai_hoc as $bai_hoc)
			                            <li>
			                            	<a href="/lop-cua-toi/bai-hoc/{{$bai_hoc->id}}">
			                            		<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>&nbsp;{{$bai_hoc->ten_bai_hoc}}
			                            	</a>
			                            </li>
		                            @endforeach
		                        </ul>
			                </li>
			            </ul>
			        </div>
		        </div>
	           	<div class="col-md-4 col-12">
	                <div class="news-box">
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
	</div>
@endsection
@section('script')
@endsection