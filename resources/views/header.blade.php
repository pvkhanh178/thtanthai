
<div class="container-fluid m-bg-primary sticky-top p-0">
    <div class="container-fluid m-bg-secondary">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    
                </div>
                <div class="col-md-4 col-12">
                    <div class="d-flex justify-content-end">
                        
                        
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <a class="navbar-brand" href="/">
                <img src="/source/img/logo-light.png" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu-main" aria-controls="menu-main" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu-main">
                <ul class="navbar-nav ml-auto">
                    @if(Auth::check())
                            @if(Auth::user()->quyen==2)
                                <li class="nav-item link-menu-main ml-2">
                                    <a class="nav-link" href="/admin">
                                        <i class="fa fa-users-cog"></i> <b class="d-none d-md-inline-block">Trang Quản trị</b>
                                    </a>
                                </li>
                            @endif
                            @if(Auth::user()->quyen==1)
                                <li class="nav-item link-menu-main ml-2">
                                    <a class="nav-link" href="/quan-ly-lop">
                                        <i class="fa fa-users-cog"></i>
                                        <b class="d-none d-md-inline-block">Quản Lý Lớp Học</b>
                                    </a>
                                </li>
                            @endif 
                            @if(Auth::user()->quyen==0)
                                <li class="nav-item link-menu-main ml-2">
                                    <a class="nav-link" href="/lop-cua-toi">
                                        <i class="  fas fa-chalkboard-teacher"></i>
                                        <b class="d-none d-md-inline-block">Lớp Học Của Tôi</b>
                                    </a>
                                </li>
                            @endif  
                                <li class="nav-item link-menu-main ml-2">
                                    <a class="nav-link" href="/tai-khoan/{{Auth::user()->name}}">
                                        <i class="fa fa-user"></i>
                                        <b class="d-none d-md-inline-block">Tài Khoản</b>
                                    </a>
                                </li>
                                <li class="nav-item link-menu-main ml-2">
                                    <a class="nav-link" href="{{route('logout')}}">
                                        <i class="fa fa-power-off"></i>
                                        <b class="d-none d-md-inline-block">Đăng xuất</b>
                                    </a>
                                </li>
                        @else
                            <li class="nav-item link-menu-main ml-2">
                                <a href="{{ route('login') }}" class="nav-link">Đăng Nhập</a>
                            </li>
                        @endif
                    <!-- <li class="nav-item link-menu-main dropdown ml-2">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <b><i class="fa fa-graduation-cap pr-2"></i>LỚP HỌC</b>
                        </a>
                        <div class="dropdown-menu sub-menu-main p-0" aria-labelledby="navbarDropdown">
                            
                        </div>
                    </li> -->
                </ul>
            </div>
        </nav>
    </div>
</div>
