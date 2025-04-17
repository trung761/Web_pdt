<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            min-height: 100vh; /* Cho phép nội dung mở rộng thay vì cố định 100% chiều cao màn hình */

        }
        .container-custom {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0 , 0, 0, 0.1);
            max-width: 800px;
            width: 100%;
            margin-bottom: 30px;
        }
        .post{
            padding-top: 20px;
            border-top: 5px solid black;
        }
        .btn-custom {
            min-width: 120px;
            height: 45px;
            font-size: 16px;
            font-weight: bold;
            color: #0F467F;
            border-color: red;
            border-radius: 8px;
        }
        .btn-custom:hover {
            background-color: red;
            color: white !important;
        }
        .form-select {
            height: 45px;
            font-size: 16px;
            font-weight: bold;
        }
        .input-group input {
            height: 45px;
        }
        .post-card {
            background: white;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            min-height: 150px;
        }
        .post-card img {
            width: 150px;
            height: 120px;
            margin-right: 15px;
            border-radius: 8px;
            object-fit: cover;
        }
        .post-content {
            flex: 1;
        }
        @media (max-width: 768px) {
            .container-custom {
                max-width: 100%;
                padding: 15px;
            }
            .btn-custom {
                min-width: 100px;
                height: 40px;
                font-size: 14px;
            }
            .form-select, .input-group input {
                height: 40px;
                font-size: 14px;
            }
            .post-card {
                flex-direction: column;
                align-items: flex-start;
                text-align: center;
            }
            .post-card img {
                margin-bottom: 10px;
                width: 100%;
                height: auto;
            }
        }
        @media (max-width: 480px) {
            .btn-custom {
                min-width: 90px;
                height: 35px;
                font-size: 12px;
            }
            .form-select, .input-group input {
                height: 35px;
                font-size: 12px;
            }
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center flex-column">
    <div class="container container-custom">
        <!-- Thanh Menu -->
        <div class="d-flex justify-content-center mb-3 flex-wrap gap-2">
            <button class="btn btn-danger btn-custom" style="color: white">Home</button>
            <button class="btn btn-outline-danger btn-custom">Phòng</button>
            <button class="btn btn-outline-danger btn-custom">Khoa</button>
            <button class="btn btn-outline-danger btn-custom">Trung tâm</button>
            <button class="btn btn-outline-danger btn-custom">Đoàn thể</button>
        </div>
        <!-- Dropdown "Thông báo chung" -->
        <div class="mb-3">
            <select class="form-select">
                <option selected>THÔNG BÁO CHUNG</option>
                <option value="1">Thông báo 1</option>
                <option value="2">Thông báo 2</option>
            </select>
        </div>
        <!-- Ô tìm kiếm -->
        <div class="input-group mb-4">
            <input type="text" class="form-control" placeholder="Nhập từ khóa tìm kiếm">
            <button class="btn btn-outline-secondary" type="button"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-5">
                    <label for="startDate" class="form-label">Ngày bắt đầu</label>
                    <input type="date" class="form-control" id="startDate">
                </div>
                <div class="col-md-5">
                    <label for="endDate" class="form-label">Ngày kết thúc</label>
                    <input type="date" class="form-control" id="endDate">
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-1 d-flex align-items-end">
                    <button class="btn btn-primary" onclick="filterPosts()"><i class="fa-solid fa-filter"></i></button>
                </div>
            </div>
        </div>
    </div>


    


    
        



    <div id="post-list" class="container mt-5">
        <!-- Các bài đăng sẽ được hiển thị ở đây -->
    </div>
    
    <!-- Phân trang -->

    <div class="d-flex justify-content-center mt-4">
        
        <ul class="pagination d-flex">
            <li class="page-item"><button class="page-link" onclick="prevPage()">«</button></li>
            <li id="page-numbers" class="d-flex"></li>
            <li class="page-item"><button class="page-link" onclick="nextPage()">»</button></li>
        </ul>
    
</div>
    
    
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- js phân trang -->
    <script>
        const posts = [
            { title: "Thông báo tuyển dụng", date: "06/03/2025", content: "Trường ĐH Nam Cần Thơ tuyển dụng..." },
            { title: "Hội thảo AI", date: "03/03/2025", content: "Thư mời tham gia hội thảo AI..." },
            { title: "Cuộc thi sáng tạo", date: "28/02/2025", content: "Tham gia cuộc thi sáng tạo năm 2025..." },
            { title: "Học bổng sinh viên", date: "20/02/2025", content: "Chương trình học bổng dành cho SV xuất sắc..." },
            { title: "Chương trình thực tập", date: "15/02/2025", content: "Cơ hội thực tập tại các công ty hàng đầu..." },
            { title: "Hội thảo khoa học", date: "10/02/2025", content: "Sự kiện hội thảo khoa học tại trường..." },
            { title: "Hội thao sinh viên", date: "05/02/2025", content: "Giải thể thao dành cho sinh viên..." },
            { title: "Cập nhật thời khóa biểu", date: "02/02/2025", content: "Thông báo cập nhật thời khóa biểu học kỳ mới..." },
        ];
        
        const postsPerPage = 5; // Cập nhật số bài trên mỗi trang thành 5
        let currentPage = 1;
        
        function renderPosts() {
            const postList = document.getElementById("post-list");
            postList.innerHTML = "";
        
            let start = (currentPage - 1) * postsPerPage;
            let end = start + postsPerPage;
            let paginatedPosts = posts.slice(start, end);
        
            paginatedPosts.forEach(post => {
                let postCard = `
                    <div class="post-card">
                        <img src="https://bvdkht.vn/images/images/1710815815.png" alt="Bài đăng">
                        <div class="post-content">
                            <h5>${post.title}</h5>
                            <p>Ngày đăng: ${post.date}</p>
                            <p>${post.content}</p>
                        </div>
                    </div>
                    <div class="border-bottom border-2 my-4"></div>
                `;
                postList.innerHTML += postCard;
            });
        
            renderPagination();
        }
        
        function renderPagination() {
            const pageNumbers = document.getElementById("page-numbers");
            pageNumbers.innerHTML = "";
        
            let totalPages = Math.ceil(posts.length / postsPerPage);
            for (let i = 1; i <= totalPages; i++) {
                let pageItem = `<li class="page-item ${i === currentPage ? 'active' : ''}">
                                    <button class="page-link" onclick="changePage(${i})">${i}</button>
                                </li>`;
                pageNumbers.innerHTML += pageItem;
            }
        }
        
        function changePage(page) {
            currentPage = page;
            renderPosts();
        }
        
        function prevPage() {
            if (currentPage > 1) {
                currentPage--;
                renderPosts();
            }
        }
        
        function nextPage() {
            let totalPages = Math.ceil(posts.length / postsPerPage);
            if (currentPage < totalPages) {
                currentPage++;
                renderPosts();
            }
        }
        
        // Gọi hàm hiển thị lần đầu
        renderPosts();
        </script>
        
    

</body>
</html>
