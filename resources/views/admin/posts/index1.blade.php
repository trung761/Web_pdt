<!DOCTYPE html>
<html lang="en">
  <head>
      <!--Header -->
      <!-- @include('admin.layout.header') -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
      <!-- <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">  -->
      
      
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
                        <a class="nav-link active" data-toggle="tab" href="#tab-post-smanage">Manage</a>
                        <a class="nav-link" data-toggle="tab" href="#tab-posts-category">Category</a>
                        <a class="nav-link" data-toggle="tab" href="#tab-posts-log">Log</a>
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
                    <div class="tab-pane fade show active" id="tab-post-smanage">Quản lý bài đăng
                    <form>
        <div class="form-group">
            <label>Nội dung:</label>
            <textarea id="summernote1" name="content"></textarea>
        </div>
    </form>



                        
                    </div>
                    <div class="tab-pane fade" id="tab-posts-category">"Post Category" (Danh mục bài viết) là một cách phân loại nội dung trên website</div>
                    <div class="tab-pane fade" id="tab-posts-log">Viết log lịch sử đăng bài ở đây</div>
                </div>
            </div>
        </div>
    </div>
   
  </body>
</html>
<!-- Bootstrap 4 JS Bundle -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script> -->

<!-- Summernote JS -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script> -->
<!-- @include('admin.layout.footer') -->
<script src="/template/admin/plugins/summernote/summernote-bs4.min.js"></script>
<script>
    // $(document).ready(function() {
        $('#summernote1').summernote({
            // tooltip:false,
        // });
    });

</script>