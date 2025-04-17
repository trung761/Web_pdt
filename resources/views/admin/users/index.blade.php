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
                        <a class="nav-link active" data-toggle="tab" href="#tab-users-manage">Manage</a>
                        <a class="nav-link" data-toggle="tab" href="#tab-users-role">Roles</a>
                        <a class="nav-link" data-toggle="tab" href="#tab-users-authorization">Authorization</a>
                        <a class="nav-link" data-toggle="tab" href="#tab-users-log">Log</a>
                    </nav>
                    <nav class="nav">
                    </nav>
                </div>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-users-manage">CRUD người quản trị, tác giả, biên soạn</div>
                    <div class="tab-pane fade" id="tab-users-role">CRUD chức năng của hệ thống</div>
                    <div class="tab-pane fade" id="tab-users-authorization">Phân quyền cho người dùng</div>
                    <div class="tab-pane fade" id="tab-users-log">Hiện thị log lịch sử thao tác theo người dùng</div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.layout.footer')
  </body>
</html>
