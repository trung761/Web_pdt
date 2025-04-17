<header class="menu-container">
    <div class="container">
        <div class="row align-items-center">
            <!-- Logo -->
            <div class="col-6 col-sm-3 col-md-2 logo">
                <a href="#">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="img-fluid">
                </a>
            </div>

            <!-- Menu trên màn hình lớn -->
            <div class="col-md-8 col-sm-6 d-none d-md-flex justify-content-center">
                <nav class="menu d-flex flex-wrap justify-content-center">
                    <a href="#">Giới thiệu</a>
                    <a href="#">Tuyển sinh</a>
                    <a class="active" href="#">Đào tạo</a>
                    <a href="#">Đời sống sinh viên</a>
                    <a href="#">Nghiên cứu khoa học</a>
                    <a href="#">Tin tức & Tuyển dụng</a>
                </nav>
            </div>

            <!-- Nút mở menu trên mobile -->
            <div class="col-6 col-sm-3 col-md-2 d-md-none d-flex justify-content-end">
                <button class="menu-toggle">☰</button>
            </div>
        </div>

        <!-- Menu trên mobile -->
        <div class="mobile-menu d-md-none">
            <a href="#">Giới thiệu</a>
            <a href="#">Tuyển sinh</a>
            <a class="active" href="#">Đào tạo</a>
            <a href="#">Đời sống sinh viên</a>
            <a href="#">Nghiên cứu khoa học</a>
            <a href="#">Tin tức & Tuyển dụng</a>
            <a href="#">VSTEP</a>
        </div>
    </div>
</header>
