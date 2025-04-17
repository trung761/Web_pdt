    <!DOCTYPE html>
<html class="no-js" lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="description" content="{{ $tintuc->tieude ?? '' }}">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $tintuc->tieude ?? 'Chi tiết tin tức' }}</title>
    <meta property="og:locale" content="vi_VN"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{ $tintuc->tieude ?? 'Chi tiết tin tức' }}"/>
    <meta property="og:description" content="{{ Str::limit(strip_tags($tintuc->noidung ?? ''), 150) }}"/>
    <meta property="og:url" content="{{ url()->current() }}"/>
    <meta property="og:site_name" content="Đại học Quốc gia TP.HCM"/>
    <meta property="og:image" content="{{ $tintuc->image ?? 'https://static.vnuhcm.edu.vn/assets/img/defaultnews.jpg' }}"/>
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link href="/user/css/font_google.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/template/admin/plugins/fontawesome-free-6.4.2-web/css/all.min.css">
    <link rel="stylesheet" href="/user/css/font_roboto.css">
    <link rel="stylesheet" href="/user/css/font_roboto_consedend.css">
    <link rel="stylesheet" href="/user/css/vendor.css">
    <link rel="stylesheet" href="/user/css/main.css">
    <link rel="stylesheet" href="/user/css/custom.css">
    <script async src="/user/js/vendor2.js"></script>
</head>
<body>
    <div class="wrapper" id="wrapper">
        @include('user.trangchu.partials.header')

        <main id="main-content">
            <div class="container">
                <div class="row">
                    <!-- Phần chi tiết tin tức -->
                    <div class="col-lg-8 panel-item news-detail">
                        <article class="entry wow fadeInUp">
                            <span class="badge badge-primary">Tin tổng hợp</span>

                            <header class="pt-3 mb-3">
                                <h1 class="entry-title">{{ $tintuc->tieude ?? 'Không có tiêu đề' }}</h1>
                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                    <div class="meta">
                                        <li><i class="fa fa-clock-o"></i> {{ $tintuc->ngaydang ?? 'Không có ngày' }}</li>
                                    </div>
                                    <div class="social">
                                        <a href="#"
                                           onclick="window.open('http://www.facebook.com/sharer.php?u={{ urlencode(url()->current()) }}','','width=450,height=450')">
                                            <img src="/img/facebook.png" alt="Facebook">
                                        </a>
                                        <a href="#"
                                           onclick="window.open('http://twitter.com/share?text={{ urlencode($tintuc->tieude) }}&url={{ urlencode(url()->current()) }}&source=VNUHCM','','width=450,height=450')">
                                            <img src="/img/tiwtter.png" alt="Twitter">
                                        </a>
                                    </div>
                                </div>
                            </header>

                            <div class="entry-content">
                                @if($tintuc->image)
                                    <div style="text-align:center">
                                        <figure class="image" style="display:inline-block">
                                            <img alt="{{ $tintuc->tieude }}" src="{{ $tintuc->image }}" style="max-width: 100%; height: auto;" />
                                            <figcaption>{{ $tintuc->tieude }}</figcaption>
                                        </figure>
                                    </div>
                                @endif

                                {!! $tintuc->noidung ?? 'Không có nội dung' !!}

                                <div class="clearfix"></div>
                            </div>
                        </article>

                        <!-- Phần bình luận -->
                        <div class="comments wow fadeInUp">
                            <div class="header-comments d-flex align-items-center justify-content-between">
                                <div class="logo">
                                    <img src="/img/vnuhcm-logo-mini.png" alt="Đại học Quốc Gia Tp Hồ Chí Minh" width="160">
                                </div>
                                <div class="links" style="display: table">
                                    <button data-toggle="modal" data-target="#registerModal">Đăng ký</button>
                                    <span> / </span>
                                    <button data-toggle="modal" data-target="#loginModal">Đăng nhập</button>
                                </div>
                            </div>
                            <div class="comments-form">
                                <form action="" method="post" id="form_comment">
                                    @csrf
                                    <div class="form-group">
                                        <textarea class="form-control" name="cmdata" id="cmdata" placeholder="Nội dung bình luận"></textarea>
                                        <div id="cmdata_error" class="invalid-feedback">Vui lòng nhập nội dung</div>
                                    </div>
                                    <input value="{{ $tintuc->id }}" name="news" id="news_id" type="hidden">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input class="form-control" name="captcha" id="captcha" placeholder="Mã xác nhận"/>
                                                        <div id="captcha_error" class="invalid-feedback">Vui lòng nhập mã xác nhận</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <img class="imgcaptcha" src="/captcha?c=comment" style="height:40px"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="text-right">
                                                <button class="btn btn-blue text-uppercase" id="sendComment" type="button">Gửi</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="comments-list">
                                <div class="comments-item text-center">
                                    <p>Hãy là người bình luận đầu tiên</p>
                                </div>
                            </div>
                            <input type="hidden" id="news_id" value="{{ $tintuc->id }}">
                            <div class="view-more-comment"></div>
                        </div>
                        <!-- Kết thúc phần bình luận -->
                    </div>

                    <!-- Phần tin nổi bật -->
                    <div class="col-lg-4 panel-item">
                        <h3 class="title-box">Tin nổi bật</h3>
                        <div class="special-news video box--shadow effect-scale wow fadeInUp" data-delay="2.15">
                            <div class="figure-img">
                                <img class="scale-img lazyload"
                                     src="https://static.vnuhcm.edu.vn/images/20220505/77e6cfea347fad581131293bf2b57385.jpg"
                                     data-src="https://static.vnuhcm.edu.vn/images/20250120/d5bb022db6150f2be1272e22b3483491.jpg"
                                     alt="ĐHQG-HCM mở cổng đăng ký dự thi Đánh giá năng lực đợt 1 năm 2025">
                            </div>
                            <div class="special-news-info">
                                <h3>
                                    <a href="#" class="news-title crop-text-3">ĐHQG-HCM mở cổng đăng ký dự thi Đánh giá năng lực đợt 1 năm 2025</a>
                                </h3>
                                <ul class="meta">
                                    <li class="text-white"><i class="fa fa-clock-o"></i> 20/01/2025</li>
                                </ul>
                            </div>
                        </div>

                        <ul class="most-view-list big row">
                            <li>
                                <div class="view-item wow fadeInUp">
                                    <a class="thumb" href="#">
                                        <img class="scale-img lazyload"
                                             src="https://static.vnuhcm.edu.vn/images/20220505/77e6cfea347fad581131293bf2b57385.jpg"
                                             data-src="https://static.vnuhcm.edu.vn/images/20190118/b4ee58625623e9b0f23ebebe8e59971d.JPG"
                                             alt="ĐHQG-HCM mở cổng đăng ký thi Đánh giá năng lực 2019">
                                    </a>
                                    <div class="text">
                                        <a class="news-title-sm crop-text-2" href="#">ĐHQG-HCM mở cổng đăng ký thi Đánh giá năng lực 2019</a>
                                        <ul class="meta">
                                            <li><i class="fa fa-clock-o"></i> 18/01/2019</li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="view-item wow fadeInUp">
                                    <a class="thumb" href="#">
                                        <img class="scale-img lazyload"
                                             src="https://static.vnuhcm.edu.vn/images/20220505/77e6cfea347fad581131293bf2b57385.jpg"
                                             data-src="https://static.vnuhcm.edu.vn/images/20240111/612b9e35248110f2b20fd2ef8372136f.jpg"
                                             alt="ĐHQG-HCM mở cổng đăng ký thi ĐGNL đợt 1 từ ngày 22/1">
                                    </a>
                                    <div class="text">
                                        <a class="news-title-sm crop-text-2" href="#">ĐHQG-HCM mở cổng đăng ký thi ĐGNL đợt 1 từ ngày 22/1</a>
                                        <ul class="meta">
                                            <li><i class="fa fa-clock-o"></i> 11/01/2024</li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="view-item wow fadeInUp">
                                    <a class="thumb" href="#">
                                        <img class="scale-img lazyload"
                                             src="https://static.vnuhcm.edu.vn/images/20220505/77e6cfea347fad581131293bf2b57385.jpg"
                                             data-src="https://static.vnuhcm.edu.vn/images/20241112/946c9c802da84948eb10bcee82751d15.jpg"
                                             alt="ĐHQG-HCM công bố cấu trúc bài thi ĐGNL áp dụng từ năm 2025">
                                    </a>
                                    <div class="text">
                                        <a class="news-title-sm crop-text-2" href="#">ĐHQG-HCM công bố cấu trúc bài thi ĐGNL áp dụng từ năm 2025</a>
                                        <ul class="meta">
                                            <li><i class="fa fa-clock-o"></i> 12/11/2024</li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="view-item wow fadeInUp">
                                    <a class="thumb" href="#">
                                        <img class="scale-img lazyload"
                                             src="https://static.vnuhcm.edu.vn/images/20220505/77e6cfea347fad581131293bf2b57385.jpg"
                                             data-src="https://static.vnuhcm.edu.vn/images/20190118/4f52a89a6a810e11e895ec8d92c5e6c9.JPG"
                                             alt="Cấu trúc bài thi Đánh giá năng lực ĐHQG-HCM">
                                    </a>
                                    <div class="text">
                                        <a class="news-title-sm crop-text-2" href="#">Cấu trúc bài thi Đánh giá năng lực ĐHQG-HCM</a>
                                        <ul class="meta">
                                            <li><i class="fa fa-clock-o"></i> 18/01/2019</li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="view-item wow fadeInUp">
                                    <a class="thumb" href="#">
                                        <img class="scale-img lazyload"
                                             src="https://static.vnuhcm.edu.vn/images/20220505/77e6cfea347fad581131293bf2b57385.jpg"
                                             data-src="https://static.vnuhcm.edu.vn/images/20200103/3e4ec4a8c4ab8a00b0ea192765774250.jpg"
                                             alt="ĐHQG-HCM chính thức mở cổng đăng ký thi Đánh giá năng lực Đợt 1 - 2020">
                                    </a>
                                    <div class="text">
                                        <a class="news-title-sm crop-text-2" href="#">ĐHQG-HCM chính thức mở cổng đăng ký thi Đánh giá năng lực Đợt 1 - 2020</a>
                                        <ul class="meta">
                                            <li><i class="fa fa-clock-o"></i> 06/01/2020</li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="view-item wow fadeInUp">
                                    <a class="thumb" href="#">
                                        <img class="scale-img lazyload"
                                             src="https://static.vnuhcm.edu.vn/images/20220505/77e6cfea347fad581131293bf2b57385.jpg"
                                             data-src="https://static.vnuhcm.edu.vn/images/20230605/ad57cceb851a84e538c89292ab9e54b8.png"
                                             alt="Thi ĐGNL đợt 2: Thí sinh cao điểm nhất đạt 1.133 điểm">
                                    </a>
                                    <div class="text">
                                        <a class="news-title-sm crop-text-2" href="#">Thi ĐGNL đợt 2: Thí sinh cao điểm nhất đạt 1.133 điểm</a>
                                        <ul class="meta">
                                            <li><i class="fa fa-clock-o"></i> 05/06/2023</li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <!-- Quảng cáo -->
                        <!-- <div id="advertisement" style="margin-top: 15px">
                            <a href="https://vnuhcm.edu.vn/su-kien-sap-dien-ra/nganh-ky-thuat-dau-khi-cua-dhqg-hcm-dat-top-51-100-the-gioi/343334356864.html" target="_blank">
                                <img src="https://static.vnuhcm.edu.vn/images/20220505/09c332d9c4e9994d5fe4c6871b917ab0.jpg" style="width: 100%;" alt="">
                            </a>
                        </div>
                        <div id="advertisement" style="margin-top: 15px">
                            <a href="" target="_blank">
                                <img src="" style="width: 100%;" alt="">
                            </a>
                        </div> -->
                    </div>
                </div>
            </div>
        </main>

        @include('user.trangchu.partials.footer')
    </div>
    

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-87720639-4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-87720639-4');
    </script>
    <script src="/user/js/index/index.js"></script>
</body>
</html>