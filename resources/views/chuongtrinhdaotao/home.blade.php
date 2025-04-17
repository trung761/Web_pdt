<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Menu Bootstrap Div Col</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @include('chuongtrinhdaotao.header')
    <style>
        /* Định dạng chung */
        .menu-container {
            background: #f8f9fa;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            padding: 10px 0;
            position: relative; /* Đảm bảo menu mobile hiển thị đúng */
            z-index: 1000;
        }

        /* Logo */
        .logo img {
            max-height: 50px; /* Điều chỉnh kích thước tối đa */
            width: auto;
        }

        /* Menu chính (Desktop) */
        .menu {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px; /* Thêm khoảng cách giữa các mục */
            flex-wrap: nowrap;
            white-space: nowrap;
        }

        .menu a {
            text-decoration: none;
            color: #333;
            font-weight: 600;
            padding: 8px 12px; /* Giảm padding để tránh tràn */
            display: inline-block;
            transition: 0.3s;
        }

        .menu a:hover {
            color: #3559dc;
        }

        /* Menu trên Mobile */
        .mobile-menu {
            display: none;
            background: white;
            padding: 10px;
            position: absolute;
            width: 100%;
            left: 0;
            top: 100%;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .mobile-menu a {
            display: block;
            color: #333;
            text-decoration: none;
            font-weight: 600;
            padding: 12px;
        }

        .mobile-menu a:hover {
            background: #f1f1f1;
            color: #3559dc;
        }

        /* Nút mở menu trên Mobile */
        .menu-toggle {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            padding: 5px 10px;
        }

        /* Mục menu đang chọn (Active) */
        .menu .active {
            color: #3559dc;
            font-weight: bold;
        }

        /* Câu hỏi thường gặp (FAQ) */
        .faq-header {
            background-color: #3559dc;
            color: white;
            padding: 15px 0;
            text-align: center;
        }

        .faq-header h2 {
            font-size: 30px;
            font-weight: bold;
            margin: 0;
        }

        /* Ô tìm kiếm (Search box) */
        .search-box {
            background: white;
            border-radius: 8px;
            display: flex;
            align-items: center;
            padding: 10px 15px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            width: 100%;
        }

        .search-box input {
            border: none;
            outline: none;
            font-size: 16px;
            width: 100%;
            background: transparent;
        }

        .search-box svg {
            width: 20px;
            height: 20px;
            opacity: 0.5;
            margin-right: 8px;
        }

        /* Responsive tối ưu */
        @media (max-width: 1024px) {
            /* Thu nhỏ menu khi màn hình bé hơn 1024px */
            .menu a {
                font-size: 14px;
                padding: 6px 10px;
            }
            .logo img {
                max-height: 45px;
            }
            .menu-toggle {
                font-size: 22px;
            }
        }

        @media (max-width: 768px) {
            /* Ẩn menu chính, chỉ hiển thị nút ☰ */
            .menu {
                display: none;
            }
            .logo img {
                max-height: 40px;
            }
        }
        @media (max-width: 768px) {
            .col-md-3, .col-md-7 {
                width: 100%;
            }
        }

        
    </style>
</head>
<body class="sidebar-mini sidebar-collapse">
    <div class="content-wrapper">
        <!-- Câu hỏi thường gặp -->
        <div class="col-md-12">
            <div class="faq-header">
                <div class="container">
                    <h2>Chương trình đào tạo</h2>
                    <h6>Thông tin đầy đủ về các chương trình đào tạo tại trường</h6>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="row" style="margin-top: 1.5rem">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="filter-container card p-3">
                                <div class="row">
                                    <div class="col-md-3 mb-2">
                                        <select class="form-select" id="bac-dao-tao">
                                            <option>Tất cả bậc đào tạo</option>
                                            <option>Đại học</option>
                                            <option>Cao đẳng</option>
                                            <option>Thạc sĩ</option>
                                            <option>Tiến sĩ</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <select class="form-select" id="khoa-vien">
                                            <option>Tất cả khoa/viện</option>
                                            <option>Công nghệ thông tin</option>
                                            <option>Kinh tế</option>
                                            <option>Điện - Điện tử</option>
                                            <option>Cơ khí</option>
                                            <option>Xây dựng</option>
                                            <option>Ngoại ngữ</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <select class="form-select" id="hinh-thuc">
                                            <option>Tất cả hình thức</option>
                                            <option>Chính quy</option>
                                            <option>Liên thông</option>
                                            <option>Văn bằng 2</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <div class="search-box">
                                            <input type="text" placeholder="Tìm kiếm chương trình...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row" style="margin-top: 1.5rem">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            {{-- Navigation tabs --}}
                            <ul class="nav nav-tabs" id="programTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="dai-hoc-tab" data-bs-toggle="tab" data-bs-target="#dai-hoc" type="button" role="tab">Đại học</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="cao-dang-tab" data-bs-toggle="tab" data-bs-target="#cao-dang" type="button" role="tab">Cao đẳng</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="sau-dai-hoc-tab" data-bs-toggle="tab" data-bs-target="#sau-dai-hoc" type="button" role="tab">Sau đại học</button>
                                </li>
                            </ul>

                            <!-- Tab content -->
                            <div class="tab-content" id="programTabContent">
                                <!-- Đại học -->
                                <div class="tab-pane fade show active" id="dai-hoc" role="tabpanel">
                                    <div class="accordion" id="daiHocAccordion">
                                        <!-- Chương trình Công nghệ thông tin -->
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#cntt-collapse">
                                                    Công nghệ thông tin
                                                </button>
                                            </h2>
                                            <div id="cntt-collapse" class="accordion-collapse collapse show" data-bs-parent="#daiHocAccordion">
                                                <div class="accordion-body">
                                                    <!-- Tabs cho mỗi chương trình -->
                                                    <ul class="nav nav-pills mb-3" role="tablist">
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#cntt-overview">Tổng quan</button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#cntt-structure">Cấu trúc chương trình</button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#cntt-subjects">Danh sách học phần</button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#cntt-career">Cơ hội nghề nghiệp</button>
                                                        </li>
                                                    </ul>
                                                    
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade show active" id="cntt-overview">
                                                            <h4>Giới thiệu chung</h4>
                                                            <p>Chương trình đào tạo ngành Công nghệ thông tin cung cấp cho sinh viên kiến thức nền tảng vững chắc và kỹ năng thực hành về khoa học máy tính, công nghệ phần mềm, hệ thống thông tin, trí tuệ nhân tạo và các công nghệ hiện đại. Sinh viên được đào tạo để trở thành những kỹ sư CNTT có khả năng phân tích, thiết kế, phát triển và vận hành các hệ thống phần mềm, ứng dụng web/mobile, và hệ thống thông tin trong môi trường kinh doanh hiện đại.</p>
                                                            <div class="row mt-3">
                                                                <div class="col-md-4 mb-3">
                                                                    <div class="card text-center p-3">
                                                                        <h5>4 năm</h5>
                                                                        <p>Thời gian đào tạo</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 mb-3">
                                                                    <div class="card text-center p-3">
                                                                        <h5>145 tín chỉ</h5>
                                                                        <p>Khối lượng kiến thức</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 mb-3">
                                                                    <div class="card text-center p-3">
                                                                        <h5>Kỹ sư</h5>
                                                                        <p>Văn bằng tốt nghiệp</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <h5 class="mt-4">Mục tiêu đào tạo</h5>
                                                            <ul>
                                                                <li>Đào tạo kỹ sư công nghệ thông tin có kiến thức chuyên môn vững chắc</li>
                                                                <li>Phát triển kỹ năng thực hành, giải quyết vấn đề và làm việc nhóm</li>
                                                                <li>Trang bị khả năng học tập suốt đời và thích ứng với công nghệ mới</li>
                                                                <li>Đào tạo kỹ năng giao tiếp và làm việc trong môi trường quốc tế</li>
                                                            </ul>
                                                        </div>
                                                        
                                                        <div class="tab-pane fade" id="cntt-structure">
                                                            <h4>Cấu trúc chương trình</h4>
                                                            <div class="table-responsive mt-3">
                                                                <table class="table table-bordered">
                                                                    <thead class="table-primary">
                                                                        <tr>
                                                                            <th>Khối kiến thức</th>
                                                                            <th>Số tín chỉ</th>
                                                                            <th>Tỷ lệ %</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>Giáo dục đại cương</td>
                                                                            <td>45</td>
                                                                            <td>31%</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Cơ sở ngành</td>
                                                                            <td>35</td>
                                                                            <td>24%</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Chuyên ngành</td>
                                                                            <td>50</td>
                                                                            <td>34%</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Thực tập và khóa luận</td>
                                                                            <td>15</td>
                                                                            <td>11%</td>
                                                                        </tr>
                                                                        <tr class="table-primary">
                                                                            <td><strong>Tổng</strong></td>
                                                                            <td><strong>145</strong></td>
                                                                            <td><strong>100%</strong></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            
                                                            <h5 class="mt-4">Các chuyên ngành</h5>
                                                            <div class="row mt-3">
                                                                <div class="col-md-4 mb-3">
                                                                    <div class="card h-100 p-3">
                                                                        <h5>Công nghệ phần mềm</h5>
                                                                        <p>Tập trung vào phát triển, thiết kế và kiểm thử phần mềm chuyên nghiệp.</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 mb-3">
                                                                    <div class="card h-100 p-3">
                                                                        <h5>Khoa học dữ liệu</h5>
                                                                        <p>Khai thác, phân tích và trực quan hóa dữ liệu lớn.</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 mb-3">
                                                                    <div class="card h-100 p-3">
                                                                        <h5>An toàn thông tin</h5>
                                                                        <p>Bảo mật và đảm bảo an toàn cho hệ thống thông tin.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="tab-pane fade" id="cntt-subjects">
                                                            <h4>Danh sách học phần</h4>
                                                            <div class="table-responsive mt-3">
                                                                <table class="table table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Mã học phần</th>
                                                                            <th>Tên học phần</th>
                                                                            <th>Số tín chỉ</th>
                                                                            <th>Loại</th>
                                                                            <th>Học kỳ</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>CNTT101</td>
                                                                            <td>Nhập môn lập trình</td>
                                                                            <td>3</td>
                                                                            <td>Bắt buộc</td>
                                                                            <td>1</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>CNTT102</td>
                                                                            <td>Cấu trúc dữ liệu và giải thuật</td>
                                                                            <td>4</td>
                                                                            <td>Bắt buộc</td>
                                                                            <td>2</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>CNTT203</td>
                                                                            <td>Cơ sở dữ liệu</td>
                                                                            <td>3</td>
                                                                            <td>Bắt buộc</td>
                                                                            <td>3</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>CNTT204</td>
                                                                            <td>Lập trình hướng đối tượng</td>
                                                                            <td>3</td>
                                                                            <td>Bắt buộc</td>
                                                                            <td>3</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>CNTT305</td>
                                                                            <td>Phát triển ứng dụng web</td>
                                                                            <td>3</td>
                                                                            <td>Bắt buộc</td>
                                                                            <td>4</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>CNTT306</td>
                                                                            <td>Trí tuệ nhân tạo</td>
                                                                            <td>3</td>
                                                                            <td>Tự chọn</td>
                                                                            <td>5</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>CNTT407</td>
                                                                            <td>Học máy</td>
                                                                            <td>3</td>
                                                                            <td>Tự chọn</td>
                                                                            <td>6</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>CNTT408</td>
                                                                            <td>Phát triển ứng dụng di động</td>
                                                                            <td>3</td>
                                                                            <td>Tự chọn</td>
                                                                            <td>6</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="tab-pane fade" id="cntt-career">
                                                            <h4>Cơ hội nghề nghiệp</h4>
                                                            <p>Sinh viên tốt nghiệp ngành Công nghệ thông tin có thể làm việc ở nhiều vị trí khác nhau trong ngành công nghiệp IT đang phát triển nhanh chóng.</p>
                                                            
                                                            <h5 class="mt-4">Vị trí việc làm sau tốt nghiệp</h5>
                                                            <div class="row mt-3">
                                                                <div class="col-md-6 mb-3">
                                                                    <div class="card h-100 p-3">
                                                                        <h6>Lập trình viên (Developer/Programmer)</h6>
                                                                        <p>Phát triển phần mềm, ứng dụng web/mobile theo yêu cầu của doanh nghiệp.</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <div class="card h-100 p-3">
                                                                        <h6>Kỹ sư phát triển phần mềm (Software Engineer)</h6>
                                                                        <p>Thiết kế, phát triển và bảo trì các hệ thống phần mềm phức tạp.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6 mb-3">
                                                                    <div class="card h-100 p-3">
                                                                        <h6>Chuyên viên phân tích dữ liệu (Data Analyst)</h6>
                                                                        <p>Phân tích dữ liệu, xây dựng báo cáo và đưa ra những thông tin hữu ích cho doanh nghiệp.</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <div class="card h-100 p-3">
                                                                        <h6>Kỹ sư QA/QC (Quality Assurance Engineer)</h6>
                                                                        <p>Đảm bảo chất lượng phần mềm thông qua việc kiểm thử và phát hiện lỗi.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6 mb-3">
                                                                    <div class="card h-100 p-3">
                                                                        <h6>Kỹ sư DevOps</h6>
                                                                        <p>Triển khai và vận hành hệ thống, tự động hóa quy trình phát triển phần mềm.</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <div class="card h-100 p-3">
                                                                        <h6>Chuyên gia an ninh mạng (Cybersecurity Specialist)</h6>
                                                                        <p>Bảo vệ hệ thống thông tin và dữ liệu khỏi các mối đe dọa và tấn công mạng.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Chương trình Kinh tế -->
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kinhte-collapse">
                                                    Kinh tế
                                                </button>
                                            </h2>
                                            <div id="kinhte-collapse" class="accordion-collapse collapse" data-bs-parent="#daiHocAccordion">
                                                <div class="accordion-body">
                                                    <h4>Nội dung chương trình Kinh tế đang được cập nhật...</h4>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Chương trình Điện-Điện tử -->
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dien-collapse">
                                                    Điện - Điện tử
                                                </button>
                                            </h2>
                                            <div id="dien-collapse" class="accordion-collapse collapse" data-bs-parent="#daiHocAccordion">
                                                <div class="accordion-body">
                                                    <h4>Nội dung chương trình Điện - Điện tử đang được cập nhật...</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Cao đẳng -->
                                <div class="tab-pane fade" id="cao-dang" role="tabpanel">
                                    <div class="p-4 text-center">
                                        <h4>Thông tin chương trình Cao đẳng đang được cập nhật...</h4>
                                        <p>Vui lòng quay lại sau.</p>
                                    </div>
                                </div>
                                
                                <!-- Sau đại học -->
                                <div class="tab-pane fade" id="sau-dai-hoc" role="tabpanel">
                                    <div class="p-4 text-center">
                                        <h4>Thông tin chương trình Sau đại học đang được cập nhật...</h4>
                                        <p>Vui lòng quay lại sau.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
            </div>
        </section>
    </div>
  
    
    

    
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>




</body>
</html>
