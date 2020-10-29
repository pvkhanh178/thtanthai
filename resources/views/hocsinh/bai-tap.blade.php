@extends('master')
@section('content')
    <div class="container-fluid bg-breadcrumb" >
        <div class="row">
            <div class="container">
                <div class="row">
                    <ol class="breadcrumb">
                        <li><a href="/"><i class="fa fa-home"></i>Trang chủ</a></li>
                        <li><a href="/lop-cua-toi">Lớp Của Tôi</a></li>
                        <li><a href="/lop-cua-toi/{{$bai_tap->bai_hoc->lop_quan_ly->id}}">Lớp Học</a></li>
                        <li><a href="/lop-cua-toi/bai-hoc/{{$bai_tap->bai_hoc->id}}">Bài Học</a></li>
                        <li class="li-active"><span>Bài Tập</span></li>
                     </ol>
                </div>
            </div>
        </div>
    </div>
    {{ $id="" }}
    <div id="canh_bao">
        <audio controls class="d-none">
            <source src="/source/audio/alert.mp3" type="audio/mpeg">
        </audio>
    </div>
    <div class="container-fluid bg-breadcrumb" >
        <div class="container">
            <div class="row">
               
            </div>
        </div>
    </div>
    <div class="container-fluid mb-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="text-center p-3"><b class="m-text-primary">{{ $bai_tap->bai_hoc->ten_bai_hoc }}</b></h2>
                    <div class="note-cover">
                        <div class="question-area">
                            <div class="left-tray">

                                <?php $tong=0; $stt = 1; $check=0;?>
                                @foreach($bai_tap->bai_hoc->bai_tap as $dsbt)    <?php $tong++; ?>    
                                    @if($dsbt->id==$bai_tap->id)
                                        <?php $check = 1; ?>
                                        <div class="link active">
                                            {{ $stt++ }}
                                        </div>
                                    @else
                                        <?php if($check==1){ $id = $dsbt->id; $check=2;}?>
                                        <a class="link" href="/lop-cua-toi/bai-tap/{{$dsbt->id}}">
                                           {{ $stt++ }}
                                        </a>
                                    @endif
                                @endforeach

                            </div>       
                            <div class="baitap">
                                <p class="loaicauhoi">({{$bai_tap->loai_cau_hoi->ten_loai}})</p>
                                <h2 class="cauhoi"><b>{!! $bai_tap->cau_hoi !!}</b></h2>
                                <div class="noidung">{!! $bai_tap->noi_dung !!}</div>
                                <br>
                                @if($bai_tap->id_loai_cau_hoi == 1)
                                    <div id="chon_dap_an">
                                        <b>
                                            <input class="cau_hoi_1" id="t1ans1" type="radio" name="dap_an" value="1">
                                            <label for="t1ans1">&nbsp;{!! $bai_tap->dap_an_1 !!}</label>
                                        </b>
                                        <b>
                                            <input class="cau_hoi_1" id="t1ans2" type="radio" name="dap_an" value="2">
                                            <label for="t1ans2">&nbsp;{!! $bai_tap->dap_an_2 !!}</label>
                                        </b> 
                                        @if($bai_tap->dap_an_3 != "")
                                            <b>
                                                <input class="cau_hoi_1" id="t1ans3" type="radio" name="dap_an" value="3">
                                                <label for="t1ans3">&nbsp;{!! $bai_tap->dap_an_3 !!}</label>
                                            </b>
                                        @endif
                                        @if($bai_tap->dap_an_4 != "")
                                            <b>
                                                <input class="cau_hoi_1" id="t1ans4" type="radio" name="dap_an" value="4">
                                                <label for="t1ans4">&nbsp;{!! $bai_tap->dap_an_4 !!}</label>
                                            </b>
                                        @endif
                                        <br>
                                        <div class="text-center">
                                            <button type="submit" onclick="CauHoi1({{ $bai_tap->dap_an_dung }})" class="btn m-btn-primary">Gửi câu trả lời <i class="fa fa-paper-plane"></i></button>
                                        </div>
                                    </div>
                                    <div id="dap_an_dung" style="display: none;">
                                        <h2 class="text-success text-center font-weight-bold">Bạn đã trả lời đúng!</h2>
                                        <br>
                                        <audio controls class="d-none">
                                            <source src="/source/audio/dung.mp3" type="audio/mpeg">
                                        </audio>
                                        <audio controls class="d-none">
                                            <source src="/source/audio/translate_tts1.mp3" type="audio/mpeg">
                                        </audio>
                                    </div>
                                    <div id="dap_an_sai" style="display: none;">
                                        <h2 class="text-danger text-center font-weight-bold">Bạn đã trả sai!</h2>
                                        <br>
                                        <audio controls class="d-none">
                                            <source src="/source/audio/sai.mp3" type="audio/mpeg">
                                        </audio>
                                        <audio controls class="d-none">
                                            <source src="/source/audio/translate_tts.mp3" type="audio/mpeg">
                                        </audio>
                                    </div>
                                    <div id="dap_an" style="display: none;">
                                        <h4 class="text-center m-text-primary font-weight-bold ">Đáp Án Đúng</h4>
                                        @if($bai_tap->dap_an_dung == 1)
                                            <b>{!! $bai_tap->dap_an_1 !!}</b>
                                        @elseif($bai_tap->dap_an_dung == 2)
                                            <b>{!! $bai_tap->dap_an_2 !!}</b>
                                        @elseif($bai_tap->dap_an_dung == 3)
                                            <b>{!! $bai_tap->dap_an_3 !!}</b>
                                        @elseif($bai_tap->dap_an_dung == 4)
                                            <b>{!! $bai_tap->dap_an_4 !!}</b>
                                        @endif
                                        <hr>
                                        <h4 class="text-center m-text-primary font-weight-bold">Lời Giải</h4>
                                        {!! $bai_tap->loi_giai !!}
                                        <br>
                                        <div class="row">
                                            <div class="col text-center">
                                                @if($id!="")
                                                    <a href="/lop-cua-toi/bai-tap/{{$id}}" class="btn m-btn-primary">Bài tiếp theo <i class="fa fa-paper-plane"></i></a>
                                                @else
                                                    <a href="/lop-cua-toi/bai-hoc/{{ $bai_tap->bai_hoc->id }}" class="btn m-btn-primary">Về bài học</a>
                                                @endif
                                            </div>
                                        </div>    
                                        <br>     
                                    </div>         
                                @elseif($bai_tap->id_loai_cau_hoi == 2)
                                    <div id="chon_dap_an">
                                        <b>
                                            <input type="checkbox" id="t2ans1" name="dap_an[]" value="1">
                                            <label for="t2ans1">&nbsp;{!! $bai_tap->dap_an_1 !!}</label>
                                        </b>
                                        <b>
                                            <input type="checkbox" id="t2ans2" name="dap_an[]" value="2">
                                            <label for="t2ans2">&nbsp;{!! $bai_tap->dap_an_2 !!}</label>
                                        </b>
                                        <b>
                                            <input type="checkbox" id="t2ans3" name="dap_an[]" value="3">
                                            <label for="t2ans3">&nbsp;{!! $bai_tap->dap_an_3 !!}</label>
                                        </b>
                                        @if($bai_tap->dap_an_4 != "")
                                            <b>
                                                <input type="checkbox" id="t2ans4" name="dap_an[]" value="4">
                                                <label for="t2ans4">&nbsp;{!! $bai_tap->dap_an_4 !!}</label>
                                            </b>                          
                                        @endif
                                        <br>
                                        <div class="text-center">
                                            <button type="submit" onclick="CauHoi2({{ $bai_tap->dap_an_dung }}, {{ $bai_tap->dap_an_dung1 }})" class="btn m-btn-primary">Gửi câu trả lời <i class="fa fa-paper-plane"></i></button>
                                        </div>
                                    </div>
                                    <div id="dap_an_dung" style="display: none;">
                                        <h2 class="text-success text-center font-weight-bold">Bạn đã trả lời đúng!</h2>
                                        <br>
                                        <audio controls class="d-none">
                                            <source src="/source/audio/dung.mp3" type="audio/mpeg">
                                        </audio>
                                        <audio controls class="d-none">
                                            <source src="/source/audio/translate_tts1.mp3" type="audio/mpeg">
                                        </audio>
                                    </div>
                                    <div id="dap_an_sai" style="display: none;">
                                        <h2 class="text-danger text-center font-weight-bold">Bạn đã trả sai!</h2>
                                        <br>
                                        <audio controls class="d-none">
                                            <source src="/source/audio/sai.mp3" type="audio/mpeg">
                                        </audio>
                                        <audio controls class="d-none">
                                            <source src="/source/audio/translate_tts.mp3" type="audio/mpeg">
                                        </audio>
                                    </div>
                                    <div id="dap_an" style="display: none;">
                                        <h4 class="text-center m-text-primary font-weight-bold ">Đáp Án Đúng</h4>
                                        @if($bai_tap->dap_an_dung == 1)
                                            <b>{!! $bai_tap->dap_an_1 !!}</b>
                                        @elseif($bai_tap->dap_an_dung == 2)
                                            <b>{!! $bai_tap->dap_an_2 !!}</b>
                                        @elseif($bai_tap->dap_an_dung == 3)
                                            <b>{!! $bai_tap->dap_an_3 !!}</b>
                                        @elseif($bai_tap->dap_an_dung == 4)
                                            <b>{!! $bai_tap->dap_an_4 !!}</b>
                                        @endif
                                        @if($bai_tap->dap_an_dung1 == 1)
                                            <b>{!! $bai_tap->dap_an_1 !!}</b>
                                        @elseif($bai_tap->dap_an_dung1 == 2)
                                            <b>{!! $bai_tap->dap_an_2 !!}</b>
                                        @elseif($bai_tap->dap_an_dung1 == 3)
                                            <b>{!! $bai_tap->dap_an_3 !!}</b>
                                        @elseif($bai_tap->dap_an_dung1 == 4)
                                            <b>{!! $bai_tap->dap_an_4 !!}</b>
                                        @endif
                                        <hr>
                                        <h4 class="text-center m-text-primary font-weight-bold">Lời Giải</h4>
                                        {!! $bai_tap->loi_giai !!}
                                        <br>
                                        <div class="row">
                                            <div class="col text-center">
                                                @if($id!="")
                                                    <a href="/lop-cua-toi/bai-tap/{{$id}}" class="btn m-btn-primary">Bài tiếp theo <i class="fa fa-paper-plane"></i></a>
                                                @else
                                                    <a href="/lop-cua-toi/bai-hoc/{{ $bai_tap->bai_hoc->id }}" class="btn m-btn-primary">Về bài học</a>
                                                @endif
                                            </div>
                                        </div>  
                                        <br>
                                    </div> 
                                @elseif($bai_tap->id_loai_cau_hoi == 3)
                                    <div id="chon_dap_an">
                                        <b>
                                            <input type="radio" id="t3ans1" name="dap_an" value="1">
                                            <label for="t3ans1">&nbsp;{!! $bai_tap->dap_an_1 !!}</label>
                                        </b>
                                        <b>
                                            <input type="radio" id="t3ans2" name="dap_an" value="2">
                                            <label for="t3ans2">&nbsp;{!! $bai_tap->dap_an_2 !!}</label>
                                        </b>
                                        <br>
                                        <div class="text-center">
                                            <button type="submit" onclick="CauHoi3({{ $bai_tap->dap_an_dung }})" class="btn m-btn-primary">Gửi câu trả lời <i class="fa fa-paper-plane"></i></button>
                                        </div>
                                    </div>
                                    <div id="dap_an_dung" style="display: none;">
                                        <h2 class="text-success text-center font-weight-bold">Bạn đã trả lời đúng!</h2>
                                        <br>
                                        <audio controls class="d-none">
                                            <source src="/source/audio/dung.mp3" type="audio/mpeg">
                                        </audio>
                                        <audio controls class="d-none">
                                            <source src="/source/audio/translate_tts1.mp3" type="audio/mpeg">
                                        </audio>
                                        <hr>
                                    </div>
                                    <div id="dap_an_sai" style="display: none;">
                                        <h2 class="text-danger text-center font-weight-bold">Bạn đã trả sai!</h2>
                                        <br>
                                        <audio controls class="d-none">
                                            <source src="/source/audio/sai.mp3" type="audio/mpeg">
                                        </audio>
                                        <audio controls class="d-none">
                                            <source src="/source/audio/translate_tts.mp3" type="audio/mpeg">
                                        </audio>
                                        <hr>
                                    </div>
                                    <div id="dap_an" style="display: none;">
                                        <h4 class="text-center m-text-primary font-weight-bold ">Đáp Án Đúng</h4>
                                        @if($bai_tap->dap_an_dung == 1)
                                            <b>{!! $bai_tap->dap_an_1 !!}</b>
                                        @elseif($bai_tap->dap_an_dung == 2)
                                            <b>{!! $bai_tap->dap_an_2 !!}</b>
                                        @elseif($bai_tap->dap_an_dung == 3)
                                            <b>{!! $bai_tap->dap_an_3 !!}</b>
                                        @elseif($bai_tap->dap_an_dung == 4)
                                            <b>{!! $bai_tap->dap_an_4 !!}</b>
                                        @endif
                                        @if($bai_tap->dap_an_dung1 == 1)
                                            <b>{!! $bai_tap->dap_an_1 !!}</b>
                                        @elseif($bai_tap->dap_an_dung1 == 2)
                                            <b>{!! $bai_tap->dap_an_2 !!}</b>
                                        @elseif($bai_tap->dap_an_dung1 == 3)
                                            <b>{!! $bai_tap->dap_an_3 !!}</b>
                                        @elseif($bai_tap->dap_an_dung1 == 4)
                                            <b>{!! $bai_tap->dap_an_4 !!}</b>
                                        @endif
                                        <hr>
                                        <h4 class="text-center m-text-primary font-weight-bold">Lời Giải</h4>
                                        {!! $bai_tap->loi_giai !!}
                                        <br>
                                        <div class="row">
                                            <div class="col text-center">
                                                @if($id!="")
                                                    <a href="/lop-cua-toi/bai-tap/{{$id}}" class="btn m-btn-primary">Bài tiếp theo <i class="fa fa-paper-plane"></i></a>
                                                @else
                                                    <a href="/lop-cua-toi/bai-hoc/{{ $bai_tap->bai_hoc->id }}" class="btn m-btn-primary">Về bài học</a>
                                                @endif
                                            </div>
                                        </div>   
                                        <br>
                                    </div>
                                @elseif($bai_tap->id_loai_cau_hoi == 4)
                                    <div id="chon_dap_an">
                                        <div class="diendapan">
                                            <b class="mr-2">Đáp Án:</b>
                                            <input class="m-text-primary" id="DapAn" type="text" value="">
                                        </div>
                                        <br>
                                        <div class="text-center">
                                            <button type="submit" onclick="CauHoi4('{{ $bai_tap->dap_an_dung }}')" class="btn m-btn-primary">Gửi câu trả lời <i class="fa fa-paper-plane"></i></button>
                                        </div>
                                    </div>
                                    <div id="dap_an_dung" style="display: none;">
                                        <h2 class="text-success text-center font-weight-bold">Bạn đã trả lời đúng!</h2>
                                        <br>
                                        <audio controls class="d-none">
                                            <source src="/source/audio/dung.mp3" type="audio/mpeg">
                                        </audio>
                                        <audio controls class="d-none">
                                            <source src="/source/audio/translate_tts1.mp3" type="audio/mpeg">
                                        </audio>
                                        <hr>
                                    </div>
                                    <div id="dap_an_sai" style="display: none;">
                                        <h2 class="text-danger text-center font-weight-bold">Bạn đã trả sai!</h2>
                                        <br>
                                        <audio controls class="d-none">
                                            <source src="/source/audio/sai.mp3" type="audio/mpeg">
                                        </audio>
                                        <audio controls class="d-none">
                                            <source src="/source/audio/translate_tts.mp3" type="audio/mpeg">
                                        </audio>
                                        <hr>
                                    </div>
                                    <div id="dap_an" style="display: none;">
                                        <h4 class="text-center m-text-primary font-weight-bold ">Đáp Án Đúng</h4>
                                        @if($bai_tap->dap_an_dung == 1)
                                            <b>{!! $bai_tap->dap_an_1 !!}</b>
                                        @elseif($bai_tap->dap_an_dung == 2)
                                            <b>{!! $bai_tap->dap_an_2 !!}</b>
                                        @elseif($bai_tap->dap_an_dung == 3)
                                            <b>{!! $bai_tap->dap_an_3 !!}</b>
                                        @elseif($bai_tap->dap_an_dung == 4)
                                            <b>{!! $bai_tap->dap_an_4 !!}</b>
                                        @endif
                                        @if($bai_tap->dap_an_dung1 == 1)
                                            <b>{!! $bai_tap->dap_an_1 !!}</b>
                                        @elseif($bai_tap->dap_an_dung1 == 2)
                                            <b>{!! $bai_tap->dap_an_2 !!}</b>
                                        @elseif($bai_tap->dap_an_dung1 == 3)
                                            <b>{!! $bai_tap->dap_an_3 !!}</b>
                                        @elseif($bai_tap->dap_an_dung1 == 4)
                                            <b>{!! $bai_tap->dap_an_4 !!}</b>
                                        @endif
                                        <hr>
                                        <h4 class="text-center m-text-primary font-weight-bold">Lời Giải</h4>
                                        {!! $bai_tap->loi_giai !!}
                                        <br>
                                        <div class="row">
                                            <div class="col text-center">
                                                @if($id!="")
                                                    <a href="/lop-cua-toi/bai-tap/{{$id}}" class="btn m-btn-primary">Bài tiếp theo <i class="fa fa-paper-plane"></i></a>
                                                @else
                                                    <a href="/lop-cua-toi/bai-hoc/{{ $bai_tap->bai_hoc->id }}" class="btn m-btn-primary">Về bài học</a>
                                                @endif
                                            </div>
                                        </div>    
                                        <br>
                                    </div>
                                @endif   
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $('document').ready(function(){
        });
        function CauHoi1(dapandung){
            var dapan = $('#chon_dap_an').find('input:checked').val();
            if(dapan==null){
                $('#canh_bao').find('audio')[0].play();
                Swal.fire(
                    'Bạn chưa chọn đáp án!',
                    '',
                    'error'
                ); 
            }else{
                if(dapan==dapandung){
                    $.get('../../ajax/tra-loi-bai-tap/{{$bai_tap->id}}/1',function(data){
                        console.log("dung");
                    });
                    $('#chon_dap_an').hide();
                    $('#dap_an_dung').show();
                    $('#dap_an').show();
                    $('#dap_an_dung').find('audio')[0].play();
                    // $('#dap_an_dung').find('audio')[1].play();
                }else{
                    $('#chon_dap_an').hide();
                    $('#dap_an_sai').show();
                    $('#dap_an').show();
                    $('#dap_an_sai').find('audio')[0].play();
                    // $('#dap_an_sai').find('audio')[1].play();
                    $.get('../../ajax/tra-loi-bai-tap/{{$bai_tap->id}}/0',function(data){
                        console.log("sai");
                    });
                }
            }
        }
        function CauHoi2(dapandung, dapandung1){
            var dapan = $('#chon_dap_an').find('input:checked').get();
            if(dapan.length == 0){
                $('#canh_bao').find('audio')[0].play();
                Swal.fire(
                    'Bạn chưa chọn đáp án!',
                    '',
                    'error'
                ); 
            }else{
                if(dapan.length > 2){
                    $('#chon_dap_an').hide();
                    $('#dap_an_sai').show();
                    $('#dap_an').show();
                    $('#dap_an_sai').find('audio')[0].play();
                    $.get('../../ajax/tra-loi-bai-tap/{{$bai_tap->id}}/0',function(data){
                        console.log("sai");
                    });
                }
                if(dapan.length <=2){
                    var da1 = dapan[0].value;
                    if(dapan.length >1){
                        var da2 = dapan[1].value;
                    }
                    console.log(da1);
                    console.log(da2);
                    if(dapandung1!=""){
                        if(dapandung==da1&&dapandung1==da2){
                            $.get('../../ajax/tra-loi-bai-tap/{{$bai_tap->id}}/1',function(data){
                                console.log("dung");
                            });
                            $('#chon_dap_an').hide();
                            $('#dap_an_dung').show();
                            $('#dap_an').show();
                            $('#dap_an_dung').find('audio')[0].play();
                        }else{
                            $.get('../../ajax/tra-loi-bai-tap/{{$bai_tap->id}}/0',function(data){
                                console.log("sai");
                            });
                            $('#chon_dap_an').hide();
                            $('#dap_an_sai').show();
                            $('#dap_an').show();
                            $('#dap_an_sai').find('audio')[0].play();
                        }
                    }else{
                        if(dapandung==da1){
                            $.get('../../ajax/tra-loi-bai-tap/{{$bai_tap->id}}/1',function(data){
                                console.log("dung");
                            });
                            $('#chon_dap_an').hide();
                            $('#dap_an_dung').show();
                            $('#dap_an').show();
                            $('#dap_an_dung').find('audio')[0].play();
                        }else{
                            $.get('../../ajax/tra-loi-bai-tap/{{$bai_tap->id}}/0',function(data){
                                console.log("sai");
                            });
                            $('#chon_dap_an').hide();
                            $('#dap_an_sai').show();
                            $('#dap_an').show();
                            $('#dap_an_sai').find('audio')[0].play();
                        }
                    }
                }else{
                    $.get('../../ajax/tra-loi-bai-tap/{{$bai_tap->id}}/0',function(data){
                        console.log("sai");
                    });
                    $('#chon_dap_an').hide();
                    $('#dap_an_sai').show();
                    $('#dap_an').show();
                    $('#dap_an_sai').find('audio')[0].play();
                }
            }
        }
        function CauHoi3(dapandung){
            var dapan = $('#chon_dap_an').find('input:checked').val();
            if(dapan==null){
                $('#canh_bao').find('audio')[0].play();
                Swal.fire(
                    'Bạn chưa chọn đáp án!',
                    '',
                    'error'
                ); 
            }else{
                if(dapan==dapandung){
                    $.get('../../ajax/tra-loi-bai-tap/{{$bai_tap->id}}/1',function(data){
                        console.log("dung");
                    });
                    $('#chon_dap_an').hide();
                    $('#dap_an_dung').show();
                    $('#dap_an').show();
                    $('#dap_an_dung').find('audio')[0].play();
                    // $('#dap_an_dung').find('audio')[1].play();
                }else{
                    $.get('../../ajax/tra-loi-bai-tap/{{$bai_tap->id}}/0',function(data){
                        console.log("sai");
                    });
                    $('#chon_dap_an').hide();
                    $('#dap_an_sai').show();
                    $('#dap_an').show();
                    $('#dap_an_sai').find('audio')[0].play();
                    // $('#dap_an_sai').find('audio')[1].play();
                }
            }
        }
        function CauHoi4(dapandung){
            var dapan = $('#DapAn').val();
            if(dapan==""){
                $('#canh_bao').find('audio')[0].play();
                Swal.fire(
                    'Bạn chưa chọn đáp án!',
                    '',
                    'error'
                ); 
            }else{
                if(dapan==dapandung){
                    $.get('../../ajax/tra-loi-bai-tap/{{$bai_tap->id}}/1',function(data){
                        console.log("dung");
                    });
                    $('#chon_dap_an').hide();
                    $('#dap_an_dung').show();
                    $('#dap_an').show();
                    $('#dap_an_dung').find('audio')[0].play();
                    // $('#dap_an_dung').find('audio')[1].play();
                }else{
                    $.get('../../ajax/tra-loi-bai-tap/{{$bai_tap->id}}/0',function(data){
                        console.log("sai");
                    });
                    $('#chon_dap_an').hide();
                    $('#dap_an_sai').show();
                    $('#dap_an').show();
                    $('#dap_an_sai').find('audio')[0].play();
                    // $('#dap_an_sai').find('audio')[1].play();
                }
            }
        }
    </script>
@endsection