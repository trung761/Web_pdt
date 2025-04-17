<!DOCTYPE html>
<html lang="en">
  <head>
      <!--Header -->
      @include('admin.layout.header')
      <style>
        .chart_view {
    margin: 0 auto;
    padding: 5px;
    width: 90%;
    height: 350px;
    max-height: 350px;
    /* position: relative; */
}



      </style>
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
                    <a class="nav-link active" data-toggle="tab" href="#dashboar-traffic-metrics"> Traffic Metrics</a>
                    <a class="nav-link" data-toggle="tab" href="#dashboard-user-behavior">User Behavior</a>
                    <a class="nav-link" data-toggle="tab" href="#dashboard-content-performance">Content Performance </a>
                    <a class="nav-link" data-toggle="tab" href="#dashboard-acquisition-device"> Acquisition & Device</a>
                </nav>
                <nav class="nav">
                    <a class="nav-link" href="#"><i class="far fa-save"></i> Save Report</a>
                    <a class="nav-link" href="#"><i class="far fa-file-pdf"></i> Export to PDF</a>
                    <a class="nav-link" href="#"><i class="far fa-envelope"></i>Send to Email</a>
                    <a class="nav-link" href="#"><i class="fas fa-ellipsis-h"></i></a>
                </nav>
            </div>

            <div class="tab-content">
                <!-- Viết dữ liệu thống kê, phân tích truy cập ở đây -->
                <div class="tab-pane fade show active" id="dashboar-traffic-metrics">
                    <div class="az-dashboard-one-title">
                        <div>
                            <h2 class="az-dashboard-title">Hi, welcome back!</h2>
                            <p class="az-dashboard-text">Your web analytics dashboard template.</p>
                        </div>
                        <div class="az-content-header-right">
                            <div class="media">
                                <div class="media-body">
                                    <label>Start Date</label>
                                    <h6>Oct 10, 2018</h6>
                                </div><!-- media-body -->
                            </div><!-- media -->
                            <div class="media">
                                <div class="media-body">
                                <label>End Date</label>
                                <h6>Oct 23, 2018</h6>
                                </div><!-- media-body -->
                            </div><!-- media -->
                            <div class="media">
                                <div class="media-body">
                                <label>Event Category</label>
                                <h6>All Categories</h6>
                                </div><!-- media-body -->
                            </div><!-- media -->
                            <a href="" class="btn btn-purple">Export</a>
                        </div>
                    </div>
                    <div class="row row-sm mg-b-20">
                        <!-- Thống kê tổng quan -->
                        <div class="col-lg-7" style="height:400px; ">
                            <div class="card card-dashboard-one " style="height:400px; ">
                                <div class="card-header">
                                    <div>
                                        <h6 class="card-title">General statistics </h6>
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn active">Day</button>
                                        <button class="btn">Week</button>
                                        <button class="btn">Month</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="card-body-top">
                                        nfkl
                                    </div>
                                    <div class="chart_view">
                                        <canvas id="Pageviews" ></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Thống kê chi tiết -->
                        <div class="col-lg-5 " style="height:400px;">
                            <div class="row row-sm" style="height:400px;">
                                <!-- Người dùng mới -->
                                <div class="col-sm-6">
                                    <div class="card card-dashboard-two">
                                        <div class="card-header">
                                            <h6>33.50% <i class="icon ion-md-trending-up tx-success"></i> <small>+18.02%</small></h6>
                                            <p>Người dùng mới</p>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart-wrapper">
                                                <div id="flotChart1" class="flot-chart">
                                                    <canvas class="flot-base" width="253" height="125" style="width: 100%; height: 100px;"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Phiên truy cập -->
                                <div class="col-sm-6 mg-t-20 mg-sm-t-0">
                                    <div class="card card-dashboard-two">
                                        <div class="card-header">
                                            <h6>86k <i class="icon ion-md-trending-down tx-danger"></i> <small>-0.86%</small></h6>
                                            <p>Phiên truy cập</p>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart-wrapper">
                                                <div id="flotChart2" class="flot-chart">
                                                    <canvas class="flot-overlay" width="253" height="125" style="width: 100%; height: 100px;"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Lượt xem trang -->
                                <div class="col-sm-6 mg-t-20">
                                    <div class="card card-dashboard-two">
                                        <div class="card-header">
                                            <h6>120k <i class="icon ion-md-trending-up tx-success"></i> <small>+4.25%</small></h6>
                                            <p>Lượt xem trang</p>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart-wrapper">
                                                <div id="flotChart3" class="flot-chart">
                                                    <canvas class="flot-overlay" width="253" height="125" style="display: block; height: 100px; width: 240px;"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Lượt xem trang duy nhất -->
                                <div class="col-sm-6 mg-t-20">
                                    <div class="card card-dashboard-two">
                                        <div class="card-header">
                                            <h6>52k <i class="icon ion-md-trending-down tx-warning"></i> <small>-2.14%</small></h6>
                                            <p>Lượt xem trang duy nhất</p>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart-wrapper">
                                                <div id="flotChart4" class="flot-chart">
                                                    <canvas id="chartBar6" width="253" height="125" style="display: block; height: 100px; width: 240px;"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- row -->
                        </div>
                    </div>

                </div>

                <div class="tab-pane fade" id="dashboard-user-behavior">Viết dữ liệu phân tích người dùng</div>
                <div class="tab-pane fade" id="dashboard-content-performance">Viết hiệu suất nội dung — chỉ mức độ hiệu quả của một nội dung (bài viết, video, bài đăng mạng xã hội, v.v.)</div>
                <div class="tab-pane fade" id="dashboard-acquisition-device">Viết phân tích giúp hiểu rõ người dùng truy cập website từ đâu (Acquisition) và họ sử dụng thiết bị gì (Device). Acquisition cho biết các nguồn truy cập như trực tiếp (Direct), tìm kiếm tự nhiên (Organic Search), mạng xã hội (Social), giới thiệu từ website khác (Referral), email hoặc quảng cáo. Device thống kê loại thiết bị người dùng sử dụng.</div>
            </div>
        </div>
      </div>
    </div>

    


      @include('admin.layout.footer')
  </body>
</html>
<script src="/admin/js/dashboard.js"></script>
