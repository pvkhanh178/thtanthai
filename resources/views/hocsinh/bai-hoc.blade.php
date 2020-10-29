@extends('master')
@section('content')
	<div class="container-fluid bg-breadcrumb" >
	    <div class="row">
	        <div class="container">
	            <div class="row">
	                <ol class="breadcrumb">
	                    <li><a href="/"><i class="fa fa-home"></i>Trang chủ</a></li>
	                    <li><a href="/lop-cua-toi">Lớp Của Tôi</a></li>
	                    <li><a href="/lop-cua-toi/{{ $data->lop_quan_ly->id }}">{{ $data->lop_quan_ly->ten_lop }}</a></li>
	                    <li class="li-active"><span>Bài Học</span></li>
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
	                    <h3 class="title m-text-primary"><b>{{ $data->ten_bai_hoc }}</b></h3>
	               		<hr>                        
	                </div>
	                <div class="body-content img-fluid">
               			{!! $data->noi_dung !!}
               		</div>
		        </div>
	           	<div class="col-md-4 col-12">
	                <div class="news-box">
	                	<h3 class="title m-text-primary"><b>Bài tập</b></h3>
	               		<hr>
	                    <div class="tab-content">
	                    	<div class="news-list">
	                            <ul>
	                            	@if($data->bai_tap != null)
		                                @foreach($data->bai_tap as $bai_tap)
		                                <?php $c=0 ?>
			                                <li class="article-title" style="list-style-position: inside;">
			                                    <a href="/lop-cua-toi/bai-tap/{{$bai_tap->id}}">
			                                    	<b class="m-text-secondary">
			                                    	<i class="fas fa-pencil-alt mr-3"></i>{{ $bai_tap->cau_hoi }}</b>
			                                    </a>
			                                    @foreach($bai_tap->chi_tiet as $chi_tiet)
													@if($chi_tiet->id_hoc_sinh==Auth::user()->id && $chi_tiet->tra_loi_dung == 1)
													{{ $c=1 }}
														<i class='far fa-check-circle text-success'></i>
													@endif
		                                    	@endforeach
		                                    	@if($c==0)
		                                    		<i class='far fa-times-circle text-danger'></i>
		                                    	@endif
			                                </li>
		                                @endforeach
	                                @endif
	                            </ul>
	                        </div>
	                    </div>
	                    <br>
	                    <h3 class="title m-text-primary"><b>Danh sách bài học</b></h3>
						<div class="muc-mon-hoc">
				            <ul> 
				                <li>
			                        <ul>
			                            @foreach($data->lop_quan_ly->bai_hoc as $bai_hoc)
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
	            </div>
	        </div>
		</div>
	</div>
@endsection
@section('script')

@endsection