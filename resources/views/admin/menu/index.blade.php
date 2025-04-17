<!DOCTYPE html>
<html lang="en">
  <head>
      <!--Header -->
      
      <!-- <link href="/template/admin/plugins/select2/css/select2.min.css" rel="stylesheet" /> -->

    <meta name="csrf-token" content="{{ csrf_token() }}">


      @include('admin.layout.header')
    <!-- DataTables CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="/template/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    <!-- DataTables JS -->
    <!-- Bootstrap CSS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

    <!-- menu CSS -->
    <link href="resources/css/menu.css" rel="stylesheet">

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
                        <a class="nav-link active" data-toggle="tab" href="#tab-manage">Manage</a>
                        <!-- <a class="nav-link" data-toggle="tab" href="#tab-add">Add</a> -->
                        <!-- <a class="nav-link" data-toggle="tab" href="#tab-edit">Edit</a>
                        <a class="nav-link" data-toggle="tab" href="#tab-delete">Delete</a> -->
                        <a class="nav-link" data-toggle="tab" href="#tab-log">Log</a>

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
                    <div class="tab-pane fade show active" id="tab-manage">
                        <div class="row">
                            {{-- Nhập thông tin --}}
                            <div class="col-3" style="height: 100%; max-height: 400px; ">
                                <div class="row">
                                    {{-- Nhập menu --}}
                                    <div class="col-12 mb-3" style="margin-top:8px">
                                        <label class="form-label">Tên menu</label>
                                        <input class="form-control form-control-sm" id="name_menu" placeholder="Nhập tên menu" type="text" style="border-radius:4px">
                                    </div>
                                    {{-- chọn menu --}}
                                    <div class="col-12 mb-3">
                                        <label class="form-label">Chọn menu gốc</label>
                                        <select class="form-control " id="root_menu" name="root_menu" style="height:28px">
                                            <!-- <option value="">-- Chọn --</option> -->
                                        </select>
                                    </div>
                                    {{-- loại menu & loại man hình --}}
                                    <div class="col-12" >
                                        <div class="row" style="display:flex;">
                                            <div class="col-6 mb-3">
                                                <label class="form-label">Loại menu</label>
                                                <select class="form-control " id="type_menu" name="type_menu" style="height:28px">
                                                    <!-- <option value="">-- Chọn --</option> -->
                                                </select>
                                            </div>
        
                                            <div class="col-6 mb-3">
                                                <label class="form-label">Loại màn hình</label>
                                                <select class="form-control " id="type_screen" name="type_screen" style="height:28px">
                                                    <!-- <option value="">-- Chọn --</option> -->
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                  
                                    {{-- Hiển thị & ưu tiên & thứ tự --}}
                                    <div class="col-12 mb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="rdioo" value="hienthi" id="rd_hienthi" checked>
                                                <label class="form-check-label" for="rd_hienthi">Hiển thị</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="rdio" value="uutien" id="rd_uutien">
                                                <label class="form-check-label" for="rd_uutien">Ưu tiên</label>
                                            </div>
                                            
                                            <div class="d-flex align-items-center">
                                                <label for="thuTu" class="mb-0 mr-2">Thứ tự:</label>
                                                <input type="number" name="thuTu" id="thuTu"
                                                    class="form-control form-control-sm"
                                                    placeholder="0" min="0"
                                                    style="width: 40px;height:100%;border-radius:4px">
                                            </div>

                                        </div>
                                    </div>
                                   
                                    {{-- giới thiệu --}}
                                    <div class="col-12 mb-3">
                                        <label class="form-label">Giới thiệu</label>
                                        <input class="form-control form-control-sm"id="gioithieu" placeholder="Nhập mô tả" type="text" style="border-radius:4px">
                                    </div>

                                    {{-- nút thêm --}}
                                    <div class="col-12 text-right " >
                                        <button class="btn btn-primary btn-sm" onclick="add_menu()"style="border-radius:4px">Thêm</button>
                                    </div>

                                </div>
                            </div>

                            {{-- Bảng thông tin --}}
                            <div class="col-9"style="height: 100%; max-height: 400px; " >
                                <div>
                                    <div class="table-responsive" 
                                        style="padding-bottom: 0px; padding-top: 3px;" 
                                        id="list_menu">
                                        <table id="table_list_menu"
                                            class="table table-bordered table-hover table-striped dataTable no-footer dtr-inline"
                                            style="width: 100%; font-size: 14px;">
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="tab-log">
                        <table id="log-table" class="table table-bordered table-hover" >
                            <thead>
                                <tr>
                                    <th>Thời gian</th>
                                    <th>Người thao tác</th>
                                    <th>Hành động</th>
                                    <th>Thay đổi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
    <!-- EDIT MENU -->

                    <div class="modal fade" id="edit_menu" tabindex="-1" role="dialog" aria-labelledby="editMenuModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document"  >
                            <div class="modal-content" >
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editMenuModalLabel">Sửa thông tin menu</h5>
                                    <button type="button" class="close" data-dismiss="modal" onclick="closePopup()" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="editPatientForm">
                                        <div class="row">

                                            {{-- tên menu --}}
                                            <div class="col-12 mb-3">
                                                <label class="form-label">Tên menu</label>
                                                <input class="form-control form-control-sm" id="edit_name_menu" placeholder="Nhập tên menu" type="text"  style="border-radius:4px">
                                            </div>

                                            {{-- chọn menu & loại menu & loại man hình --}}

                                            <div class="col-12 mb-3">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label class="form-label">Chọn menu gốc</label>
                                                        <select class="form-control " id="edit_root_menu" name="edit_root_menu" style="height:28px;width:100%">
                                                            
                                                        </select>
                                                    </div>
                                                    <div class="col-3">
                                                        <label class="form-label">Loại menu</label>
                                                        <select class="form-control " id="edit_type_menu" name="edit_type_menu" style="height:28px;width:100%">
                                                        
                                                        </select>
                                                    </div>
                                                    <div class="col-3">
                                                        <label class="form-label">Loại màn hình</label>
                                                        <select class="form-control " id="edit_type_screen" name="edit_type_screen" style="height:28px;width:100%">
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Hiển thị & ưu tiên & thứ tự --}}
                                            <div class="col-12 mb-3">
                                                
                                                <div class="row">
                                                    <div class="col-6" style="display:flex;justify-content:space-between;">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" name="rdioo" value="hienthi" id="edit_rd_hienthi" checked>
                                                            <label class="form-check-label" for="rd_hienthi">Hiển thị</label>
                                                        </div>
    
                                                    
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" name="rdio" value="uutien" id="edit_rd_uutien">
                                                            <label class="form-check-label" for="rd_uutien">Ưu tiên</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-3">
                                                        <div class="d-flex align-items-center">
                                                            <label for="thuTu" class="mb-0 mr-2">Thứ tự:</label>
                                                            <input type="number" name="thuTu" id="edit_thuTu"
                                                                class="form-control form-control-sm"
                                                                placeholder="0" min="0"
                                                                style="width: 40px;height:100%;border-radius:4px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <label class="form-label">Giới thiệu</label>
                                                <input class="form-control form-control-sm" placeholder="Nhập mô tả" type="text"id="edit_intro" style="border-radius:4px">
                                            </div>
                                        </div>
                                        <input type="hidden" id="edit_id">
                                    </form>
                                </div>   
                                <div class="col-12">
                                    <div class="row" style="margin-bottom:16px">                                  
                                        <div class="col-6 col-md-6 col-lg-6 col-xl-6 col-sm-6 ">
                                            <button type="button" class="btn btn-block btn-primary btn-xs" onclick="closePopup()"data-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i>&nbsp;&nbsp;&nbsp;Đóng</button></div> 
                                        <div class="col-6 col-md-6 col-lg-6 col-xl-6 col-sm-6 ">
                                            <button type="button" class="btn btn-block btn-primary btn-xs"  onclick="update_menu()"><i class="fa-solid fa-download"></i>&nbsp;&nbsp;&nbsp;Lưu thay đổi</button>
                                        </div>                                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.layout.footer')
  </body>
</html>
<script src="/admin/js/menu.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
