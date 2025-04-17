<!DOCTYPE html>
<html lang="en">
  <head>
      <!--Header -->
      @include('admin.layout.header')
  </head>
  <body>

    <!--Menu -->
    <div class="az-header">
        <div class="container">
            <!--Menu trai cho man hinh lon -->
            @include('admin.layout.menu_left_lg')
            <div class="az-header-menu"> 
                <!--Menu trai cho di dong -->               
                @include('admin.layout.menu_left_xs')
                 <!--Menu chinh -->   
                @include('admin.layout.menu')
            </div>
        <!--Menu phai -->   
        @include('admin.layout.menu_right')
        </div>
    </div>
     <!--Content --> 
    <div class="az-content az-content-dashboard">
        <div class="container">
            <div class="az-content-body">
                <div class="az-dashboard-nav"> 
                    <nav class="nav nav-tabs">
                        <a class="nav-link active" data-toggle="tab" href="#tab-manage-homepage">Manage</a>
                        <a class="nav-link" data-toggle="tab" href="#tab-manage-slider">Silder</a>
                        <a class="nav-link" data-toggle="tab" href="#tab-manage-news">News</a>
                        <a class="nav-link" data-toggle="tab" href="#tab-manage-events">Events</a>
                        <a class="nav-link" data-toggle="tab" href="#tab-manage-announcements">Announcements</a>
                    </nav>
                    <nav class="nav">
                        {{-- <a class="nav-link" href="#"><i class="far fa-save"></i> Save Report</a>
                        <a class="nav-link" href="#"><i class="far fa-file-pdf"></i> Export to PDF</a>
                        <a class="nav-link" href="#"><i class="far fa-envelope"></i>Send to Email</a>
                        <a class="nav-link" href="#"><i class="fas fa-ellipsis-h"></i></a> --}}
                    </nav>
                </div>

                {{-- <div class="tab-pane fade show active" id="tab-manage">AAAAAAAAAAA</div>
                <div class="tab-pane fade" id="tab-log">BBBBBBBBBB</div> --}}
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-manage-homepage">Viết trang quản lý hiện thị các thành phần trên trang chủ</div>
                    <div class="tab-pane fade" id="tab-manage-slider">Cấu hình slider</div>
                    <div class="tab-pane fade" id="tab-manage-news">Cấu hình tin tức</div>
                    <div class="tab-pane fade" id="tab-manage-events">Cấu hình sự kiện</div>
                    <div class="tab-pane fade" id="tab-manage-announcements">Cấu hình thông báo</div>
                </div>


                
            </div>
        </div>
    </div>
    @include('admin.layout.footer')
  </body>
</html>
