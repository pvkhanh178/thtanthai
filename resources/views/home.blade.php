@extends('master')
@section('content')
	<div class="container-fluid p-0" style="clear: both;">
		<div id="Slide" class="carousel slide position-relative" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="/source/img/templates/banner-event-03.jpg" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item">
					<img src="/source/img/templates/banner-event-04.jpg" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item">
					<img src="/source/img/templates/banner-event-03.jpg" class="d-block w-100" alt="...">
				</div>
			</div>
			<a class="carousel-control-prev" href="#Slide" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#Slide" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
			<div class="carousel-bg"></div>
		</div>
	</div>

@endsection
@section('script')
  <script type="text/javascript">
    $('document').ready(function(){
      	$('#lop_hoc').click(function(){
      		$('#load_mon_hoc').val("");
      		if($('#lop_hoc').val()!=''){
      			var id_lop = $(this).val();
	        	$.get('ajax/mon-hoc/' + id_lop,function(data){
	          		$('#mon_hoc').html(data);
	        	});
      		}else{
      			$('#mon_hoc').html("<option value='' selected>Chọn môn</option>");
      		}
        	
      	});
      	$('#mon_hoc').change(function(){
      		$('#load_mon_hoc').val("");
        	var id = $(this).val();
        	$('#load_mon_hoc').val(id);
      	});
      	$('#load_mon_hoc').click(function(){
      		if($('#load_mon_hoc').val()==""){
				Swal.fire(
					'Bạn chưa chọn lớp học hoặc môn học!',
					'',
					'error'
				); 
      		}else{
      			var id = $('#load_mon_hoc').val();
      			$(location).attr('href', '/chi-tiet-mon-hoc/'+id);
      		}
      	});
      	$('.bt b p input').attr('id','txt');

		$('.bt b p input').attr('name','dap_an');

		$('#txt').click(function(){
		    $('.keyboard').css('visibility','visible');
		 });

		$('.row .col-md-12 .btn').click(function(){
		    var btnvalue = $(this).text();
		    $("#txt").val(function() {
        		return this.value + btnvalue;
   		 	});
		});

		 $('.tv').click(function(){
		  	var btnvalue = $(this).text();
		  	$("#txt").val(btnvalue);
		});
		    
		$('.xoa').click(function(){
		    $('#txt').val(function(){
		      var string = $(this).val();
		      return string.substring(0, string.length - 1);
		    });  
		});

		// var count=0;
		// var phut=0;
		// var counter=setInterval(timer, 1000); //1000 will  run it every 1 second
		// function timer()
		// {
		//   	count=count+1;
		//   	if (count <= 0)
		//   	{
		//      	clearInterval(counter);
		//      	return;
		//   	}
		//   	else if(count == 60){
		//   		count -= 60;
		//   		phut += 1;
		//   	}

		// 	document.getElementById("timer").innerHTML= phut + "<span class='time1'>:</span>" + count + "<p></p>"; // watch for spelling
		// }
    });
  </script>
@endsection