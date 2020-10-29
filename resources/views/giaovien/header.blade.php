<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
    <!-- <li class="nav-item d-none d-sm-inline-block">
      <a href="index3.html" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li> -->
  </ul>
  <!-- SEARCH FORM -->
  {{-- <form class="form-inline ml-3">
    <div class="input-group input-group-sm">
      <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>
  </form> --}}
  <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link text-primary" href="/index">
          Thoát Trang Quản Lý <i class="fas fa-sign-out-alt ml-2"></i> 
        </a>
      </li>
    </ul>
</nav>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
      <img src="/admin_source/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><b>TH Tân Thái</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{Auth::user()->anh_dai_dien}}" class="img-circle elevation-2" width="100px" height="100px" alt="User Image">
        </div>
        <div class="info">
          <a href="/tai-khoan/{{Auth::user()->name}}" class="d-block">{{Auth::user()->ho_ten}}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="/quan-ly-lop" class="nav-link @if(Request()->is('quan-ly-lop')) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Tổng Quan
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview @if(Request()->is('quan-ly-lop/lop-hoc/*')) menu-open @endif">
            <a href="#" class="nav-link  @if(Request()->is('quan-ly-lop/lop-hoc/*')) active @endif">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
                Lớp Học
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/quan-ly-lop/lop-hoc/danh-sach" class="nav-link @if(Request()->is('quan-ly-lop/lop-hoc/danh-sach')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách Lớp</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/quan-ly-lop/lop-hoc/them" class="nav-link @if(Request()->is('quan-ly-lop/lop-hoc/them')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm Lớp</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview @if(Request()->is('quan-ly-lop/bai-hoc/*')) menu-open @endif">
            <a href="#" class="nav-link @if(Request()->is('quan-ly-lop/bai-hoc/*')) active @endif">
              <i class="nav-icon fa fa-book-open"></i>
              <p>
                Bài Học
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/quan-ly-lop/bai-hoc/danh-sach" class="nav-link @if(Request()->is('quan-ly-lop/bai-hoc/danh-sach')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách Bài Học</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/quan-ly-lop/bai-hoc/them" class="nav-link @if(Request()->is('quan-ly-lop/bai-hoc/them')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm Bài Học</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview @if(Request()->is('quan-ly-lop/bai-tap/*')) menu-open @endif">
            <a href="#" class="nav-link @if(Request()->is('quan-ly-lop/bai-tap/*')) active @endif">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Bài Tập
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/quan-ly-lop/bai-tap/danh-sach" class="nav-link @if(Request()->is('quan-ly-lop/bai-tap/danh-sach')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách Bài Tập</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/quan-ly-lop/bai-tap/them" class="nav-link @if(Request()->is('quan-ly-lop/bai-tap/them')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm Bài Tập</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="/dang-xuat" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Đăng Xuất
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>