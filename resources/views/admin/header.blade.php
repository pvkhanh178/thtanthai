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
          Thoát Trang Quản Trị Viên <i class="fas fa-sign-out-alt ml-2"></i> 
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
          <img src="{{ Auth::user()->anh_dai_dien }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/tai-khoan/{{Auth::user()->name}}" class="d-block">{{Auth::user()->ho_ten}}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="/admin" class="nav-link @if(Request()->is('admin')) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Tổng Quan
              </p>
            </a>
          </li>
         <!--  <li class="nav-item has-treeview @if(Request()->is('admin/lop-hoc/*')) menu-open @endif">
            <a href="#" class="nav-link  @if(Request()->is('admin/lop-hoc/*')) active @endif">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
                Lớp Học
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/lop-hoc/danh-sach" class="nav-link @if(Request()->is('admin/lop-hoc/danh-sach')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách Lớp</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/lop-hoc/them" class="nav-link @if(Request()->is('admin/lop-hoc/them')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm Lớp</p>
                </a>
              </li>
            </ul>
          </li> -->
<!--           <li class="nav-item has-treeview @if(Request()->is('admin/mon-hoc/*')) menu-open @endif">
            <a href="#" class="nav-link @if(Request()->is('admin/mon-hoc/*')) active @endif">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Môn Học
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/mon-hoc/danh-sach" class="nav-link @if(Request()->is('admin/mon-hoc/danh-sach')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách Môn Học</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/mon-hoc/them" class="nav-link @if(Request()->is('admin/mon-hoc/them')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm Môn Học</p>
                </a>
              </li>
            </ul>
          </li> -->
<!--           <li class="nav-item has-treeview @if(Request()->is('admin/muc-mon-hoc/*')) menu-open @endif">
            <a href="#" class="nav-link @if(Request()->is('admin/muc-mon-hoc/*')) active @endif">
              <i class="nav-icon fas fa-book-reader"></i>
              <p>
                Mục Môn Học
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/muc-mon-hoc/danh-sach" class="nav-link @if(Request()->is('admin/muc-mon-hoc/danh-sach')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách Mục</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/muc-mon-hoc/them" class="nav-link @if(Request()->is('admin/muc-mon-hoc/them')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm Mục</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview @if(Request()->is('admin/bai-hoc/*')) menu-open @endif">
            <a href="#" class="nav-link @if(Request()->is('admin/bai-hoc/*')) active @endif">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
                Bài Học
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/bai-hoc/danh-sach" class="nav-link @if(Request()->is('admin/bai-hoc/danh-sach')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách Bài Học</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/bai-hoc/them" class="nav-link @if(Request()->is('admin/bai-hoc/them')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm Bài Học</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview @if(Request()->is('admin/bai-tap/*')) menu-open @endif">
            <a href="#" class="nav-link @if(Request()->is('admin/bai-tap/*')) active @endif">
              <i class="nav-icon fas fa-shapes"></i>
              <p>
                Bài Tập
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/bai-tap/danh-sach" class="nav-link  @if(Request()->is('admin/bai-tap/danh-sach')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách Bài Tập</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/bai-tap/them" class="nav-link  @if(Request()->is('admin/bai-tap/them')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm Bài Tập</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview @if(Request()->is('admin/loai-cau-hoi/*')) menu-open @endif">
            <a href="#" class="nav-link @if(Request()->is('admin/loai-cau-hoi/*')) active @endif">
              <i class="nav-icon fas fa-question-circle"></i>
              <p>
                Loại Câu Hỏi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/loai-cau-hoi/danh-sach" class="nav-link @if(Request()->is('admin/loai-cau-hoi/danh-sach')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách Loại</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/loai-cau-hoi/them" class="nav-link @if(Request()->is('admin/loai-cau-hoi/them')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm Loại</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview @if(Request()->is('admin/do-vui/*')) menu-open @endif">
            <a href="#" class="nav-link @if(Request()->is('admin/do-vui/*')) active @endif">
              <i class="nav-icon fas fa-theater-masks"></i>
              <p>
                Đố Vui
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/do-vui/danh-sach" class="nav-link @if(Request()->is('admin/do-vui/danh-sach')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách Đố Vui</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/do-vui/them" class="nav-link @if(Request()->is('admin/do-vui/them')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm Đố Vui</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview @if(Request()->is('admin/goc-hoc-tap/*')) menu-open @endif">
            <a href="#" class="nav-link @if(Request()->is('admin/goc-hoc-tap/*')) active @endif">
              <i class="nav-icon fas fa-microscope"></i>
              <p>
                Góc Học Tập
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/goc-hoc-tap/danh-sach" class="nav-link @if(Request()->is('admin/goc-hoc-tap/danh-sach')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách Bài Viết</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/goc-hoc-tap/them" class="nav-link @if(Request()->is('admin/goc-hoc-tap/them')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm Bài Viết</p>
                </a>
              </li>
            </ul>
          </li> -->
          <li class="nav-item has-treeview @if(Request()->is('admin/tai-khoan/*')) menu-open @endif">
            <a href="#" class="nav-link @if(Request()->is('admin/tai-khoan/*')) active @endif">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Tài Khoản
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/tai-khoan/danh-sach" class="nav-link @if(Request()->is('admin/tai-khoan/danh-sach')) active @endif">
                  <i class="fas fa-bars nav-icon"></i>
                  <p>Danh Sách Tài Khoản</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/tai-khoan/them" class="nav-link @if(Request()->is('admin/tai-khoan/them')) active @endif">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Thêm Tài Khoản</p>
                </a>
              </li>
            </ul>
          </li><li class="nav-item has-treeview">
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