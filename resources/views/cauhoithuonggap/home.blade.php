<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Menu Bootstrap Div Col</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @include('cauhoithuonggap.header')
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
        /* Css phần Các câu hỏi thường gặp */
        /* Danh sách bên trái */
        .faq-danhmuc {
            /* border-left: 3px solid #3559dc; */
            padding-left: 0;
        }
        
        .faq-danhmuc h3 {
            color: #3559dc;
            font-weight: bold;
            font-size: 20px;
            margin-bottom: 20px;
            padding-left: 15px;
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
        }
        
        .faq-danhmuc ul {
            list-style: none;
            padding-left: 0;
        }
        
        .faq-danhmuc li {
            margin-bottom: 15px;
        }
        
        .faq-danhmuc a {
            text-decoration: none;
            color: #333;
            display: block;
            padding: 8px 15px;
            border-left: 3px solid transparent;
            margin-left: -3px;
        }
        
        .faq-danhmuc a.active {
            color: #3559dc;
            border-left: 3px solid #3559dc;
            font-weight: bold;
        }
        
        .faq-danhmuc a:hover {
            background-color: #f5f5f5;
        }
        
        /* Câu hỏi bên phải */
        .faq-noidung {
            padding: 0 15px;
        }
        
        .faq-chimuc {
            margin-bottom: 20px;
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
        }
        
        .faq-cauhoi {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
        }
        
        .faq-cauhoi .toggle-icon {
            color: #3559dc;
            font-size: 24px;
        }
        
        .faq-cautraloi {
            color: #666;
            line-height: 1.6;
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
                    <h2>Câu hỏi thường gặp</h2>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="row" style="margin-top: 1.5rem">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="search-box">
                                <input type="text" placeholder="Tìm kiếm câu hỏi..." style="width: 100%">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="col-md-12">
                    <div class="row" style="margin-top: 1.5rem">
                        <div class="col-md-1"></div>
                
                        <!-- Danh mục bên trái -->
                        <div class="col-md-3">
                            <fieldset class="card">
                                <div class="card-body faq-danhmuc">
                                    <h3>Câu hỏi thường gặp</h3>
                                    <ul>
                                        <li><a href="#" class="active">Tất cả câu hỏi</a></li>
                                        <li><a href="#">Tải phiếu đăng ký và lý lịch sinh viên</a></li>
                                        <li><a href="#">Hướng dẫn đăng ký nguyện vọng</a></li>
                                        <li><a href="#">Hướng dẫn thanh toán nguyện vọng</a></li>
                                        <li><a href="#">Hồ sơ xét tuyển</a></li>
                                        <li><a href="#">Học phí & Học bổng</a></li>
                                        <li><a href="#">Thực tập & Tốt nghiệp</a></li>
                                    </ul>
                                </div>
                            </fieldset>
                        </div>
                        
                        <!-- Nội dung bên phải -->
                        <div class="col-md-7">
                            <fieldset class="card">
                                <div class="card-body faq-noidung">
                                    <div class="faq-chimuc">
                                        <div class="faq-cauhoi">
                                            Tải phiếu đăng ký xét tuyển và lý lịch sinh viên?
                                            <span class="toggle-icon">▼</span>
                                        </div>
                                        <div class="faq-cautraloi">
                                            Nội dung câu trả lời cho câu hỏi "Tải phiếu đăng ký xét tuyển và lý lịch sinh viên?" sẽ được hiển thị ở đây.
                                        </div>
                                    </div>
                                    
                                    <div class="faq-chimuc">
                                        <div class="faq-cauhoi">
                                            Hồ sơ xét tuyển đại học Chính quy gồm những gì?
                                            <span class="toggle-icon">▼</span>
                                        </div>
                                        <div class="faq-cautraloi">
                                            Nội dung câu trả lời cho câu hỏi "Hồ sơ xét tuyển đại học Chính quy gồm những gì?" sẽ được hiển thị ở đây.
                                        </div>
                                    </div>
                                    
                                    <div class="faq-chimuc">
                                        <div class="faq-cauhoi">
                                            Hướng dẫn đăng ký nguyện vọng xét tuyển?
                                            <span class="toggle-icon">▼</span>
                                        </div>
                                        <div class="faq-cautraloi">
                                            Nội dung câu trả lời cho câu hỏi "Hướng dẫn đăng ký nguyện vọng xét tuyển?" sẽ được hiển thị ở đây.
                                        </div>
                                    </div>
                                    
                                    <div class="faq-chimuc">
                                        <div class="faq-cauhoi">
                                            Hướng dẫn thanh toán nguyện vọng xét tuyển?
                                            <span class="toggle-icon">▼</span>
                                        </div>
                                        <div class="faq-cautraloi">
                                            Nội dung câu trả lời cho câu hỏi "Hướng dẫn thanh toán nguyện vọng xét tuyển?" sẽ được hiển thị ở đây.
                                        </div>
                                    </div>
                                    
                                    <div class="faq-chimuc">
                                        <div class="faq-cauhoi">
                                            Làm thế nào để tra cứu kết quả xét tuyển?
                                            <span class="toggle-icon">▼</span>
                                        </div>
                                        <div class="faq-cautraloi">
                                            Nội dung câu trả lời cho câu hỏi "Làm thế nào để tra cứu kết quả xét tuyển?" sẽ được hiển thị ở đây.
                                        </div>
                                    </div>
                                    
                                    <div class="faq-chimuc">
                                        <div class="faq-cauhoi">
                                            Thông tin về học phí và học bổng?
                                            <span class="toggle-icon">▼</span>
                                        </div>
                                        <div class="faq-cautraloi">
                                            Nội dung câu trả lời cho câu hỏi "Thông tin về học phí và học bổng?" sẽ được hiển thị ở đây.
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
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
