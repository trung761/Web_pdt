<!DOCTYPE html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Đại học Quốc gia TP.HCM</title>
        <meta property="og:locale" content="vi_VN"/>
        <meta property="og:type" content="website"/>
        <meta property="og:title" content="Đại học Quốc gia TP.HCM"/>
        <meta property="og:description" content="Đại học quốc gia TP Hồ Chí Minh"/>
        <meta property="og:url" content="https://vnuhcm.edu.vn/"/>
        <meta property="og:site_name" content="Đại học Quốc gia TP.HCM"/>
        <meta property="og:image" content="https://static.vnuhcm.edu.vn/assets/img/defaultnews.jpg"/>
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
            
            <main id="main-content" class="del-main">
                <div class="sub-banner" style="background-image:url('/user/image/subbanner-event-research.jpg')">
                    <div class="text text-center">
                        <h2 class="gioithieu_title page-title"></h2>
                        <p class="gioithieu_content sub-title"></p>
                    </div>
                </div>
                <div class="container del_menu2">
                    <div class="tabcontrols students">
                        <ul id="menu2" class="nav nav-pills nav-fill d-sm-flex align-items-end flex-wrap justify-content-center" role="tablist" style="max-width: 1005px">
                        </ul>
                        <div class="tab-content pt-0">
                            <div class="tab-pane fade show active" role="tabpanel" style="">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <aside class="side-category wow fadeInUp">
                                            <ul id="menu3" class="list-unstyled list-group">
                                            </ul>
                                        </aside>
                                    </div>
                                    <div class="col-lg-8">
                                        <h3 class="tieude_menu3 title-box no-border wow fadeInUp pt-3 pt-lg-0" style="visibility: visible;"></h3>
                                        <div id="load_content11"></div>
                                        <div class="paging wow fadeInUp mt-2" id="paging"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            @include('user.trangchu.partials.footer')
        </div>
        
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-87720639-4"></script>
        <script src="/template/admin/plugins/jquery/jquery.min.js"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-87720639-4');

            function preventBack() {
                history.pushState(null, null, location.href);
                window.addEventListener('popstate', function () {
                    history.pushState(null, null, location.href);
                });
            }
            preventBack();
        </script>
        <script src="/user/js/index/index.js"></script>
    </body>
</html>