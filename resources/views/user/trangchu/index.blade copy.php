
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
        <!-- <script src="/scripts/client_apis_google.js" gapi_processed="true"></script> -->
        <link rel="stylesheet" href="/template/admin/plugins/fontawesome-free-6.4.2-web/css/all.min.css">
        <!-- Place favicon.ico in the root directory-->
        <link rel="stylesheet" href="/user/css/font_roboto.css">
        <link rel="stylesheet" href="/user/css/font_roboto_consedend.css">
        <!--    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">-->
        <!--    <script src="https://apis.google.com/js/api:client.js"></script>-->
        <!---->

        <!--    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;amp;subset=vietnamese">-->
        <!--    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=vietnamese">-->
        <link rel="stylesheet" href="/user/css/vendor.css">
        <link rel="stylesheet" href="/user/css/main.css">
        <link rel="stylesheet" href="/user/css/custom.css">
        <script async src="/user/js/vendor2.js"></script>
        
    </head>

    <body>
        <div class="wrapper" id="wrapper">
            <header>
                <div class="header-top">
                    <div class="container">
                        <ul class="navbar-top d-flex justify-content-end">
                            <li class="dropdown">
                                <button class="btn btn-link" type="button" id="dropdownSearch" data-toggle="dropdown" style="line-height: 2;"
                                    aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"></i>
                                </button>
                                <div class="dropdown-menu dropdown-search" aria-labelledby="dropdownSearch">
                                    <form action="/tim-kiem" method="get">
                                        <input class="form-control" type="text" name="search" placeholder="Tìm kiếm">
                                        <button class="btn-link btn" type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </li>

                            <li class="dropdown">
                                <div class="">
                                    <a class="btn btn-link" style="padding: 5px; text-decoration: none; color: white" href="/lang/en">English</a> 
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <nav class="navbar navbar-expand-lg navbar-light bg-white">
                    <div class="container"><a class="navbar-brand" href="/">
                        <img src="/user/image/logo/CTUT_logo.png" alt="Trường Đại học Quốc Gia Tp Hồ Chí Minh" width="50"></a>
                            
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ml-auto"> 
                                <li  class="nav-item ">

                                    @foreach ($menu1 as $menu)
                                        <span onclick="load_menu2({{ $menu->id }})" id_menu="{{ $menu->id }}" class="nav-link crop-text-1" href="">{{$menu->tenmenu }}</span></li> <li  class="nav-item ">
                                    @endforeach
                                        <!-- <a class="nav-link crop-text-1" href="/tin-tuc/32343364">Tin tức</a></li> <li  class="nav-item ">
                                        <a class="nav-link crop-text-1" href="/su-kien/33353364">Sự kiện</a></li> <li  class="nav-item ">
                                        <a class="nav-link crop-text-1" href="https://research.vnuhcm.edu.vn/">Nghiên cứu</a></li> <li  class="nav-item active">
                                        <a class="nav-link crop-text-1" href="/dao-tao/33373364">Đào tạo</a></li> <li  class="nav-item ">
                                        <a class="nav-link crop-text-1" href="/doi-ngoai/34303364">Đối ngoại</a></li> <li  class="nav-item ">
                                        <a class="nav-link crop-text-1" href="/sinh-vien/33383364">Sinh viên</a></li> <li  class="nav-item ">
                                        <a class="nav-link crop-text-1" href="/ve-dhqg-hcm/33393364">Về ĐHQG-HCM</a></li> <li  class="nav-item ">
                                        <a class="nav-link crop-text-1" href="https://megastory.vnuhcm.edu.vn">Megastory</a></li> -->
                                </li>
                            </ul>            
                        </div>
                    </div>
                </nav>
            </header>    
        
        
        
        <main id="main-content">
                    <div class="sub-banner" style="background-image:url('/user/image/subbanner-event-research.jpg')">
                <div class="text text-center">
                    <h2 class="gioithieu_title page-title"></h2>
                    <p class="gioithieu_content sub-title">
        </p>
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
                                            <!-- <li class="list-group-item  is-current ">
                                                    <a href="/dao-tao/33373364/303364/303364" target="?= $catSub['id'] == 251 ? '_blank' : '' ?>">Giới thiệu</a>
                                            </li>                -->
                                        </ul>
                                    </aside>
                                </div>
                                <div class="col-lg-8">
                                    <h3 class="tieude_menu3 title-box no-border wow fadeInUp pt-3 pt-lg-0" style="visibility: visible;">
                                        
                                    </h3>
                                    <ul id="content"class="latest-list">
                                                                                        
                                    </ul>
                                    <div class="paging wow fadeInUp mt-2" id="paging">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- e: tab-content -->
                </div>
                <!-- e: tabcontrols -->
            </div>
            </main>
            <footer class="footer wow fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col col-ft-1 mb-3 mb-lg-0">
                        <div class="footer-link">
                            <h3 style="text-align: left">Đại học Quốc gia TP. HỒ CHÍ MINH <i class="fa fa-angle-down d-md-none"></i></h3>
                            <ul class="list-unstyled" style="list-style: none; margin-left: 35px; display: block !important;">
                                <li><i class="fa fa-map-marker"></i>P. Linh Trung, TP. Thủ Đức, TP. HCM</li>
                                <li><i class="fa fa-phone"></i>(+84-28) 37 242 181 (ext: 1651/1652)</li>
                                <li><i class="fa fa-envelope"></i><a href="mailto:info@vnuhcm.edu.vn">info@vnuhcm.edu.vn</a></li>
                                <li><i class="fa fa-facebook-square"></i><a href="https://www.facebook.com/vnuhcm.info/" target="_blank">Facebook</a></li>
                                <li style="margin-left: -35px">Phát triển bởi HPT</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col col-ft-3 mb-3 mb-lg-0">
                        <div class="footer-link">
                            <h3>Các đơn vị thành viên<i class="fa fa-angle-down d-md-none"></i></h3>
                            <ul class="list-unstyled">
                                <li><a target="_blank" href="http://www.hcmut.edu.vn/">Trường Đại học Bách Khoa </a></li>
                                <li><a target="_blank" href="https://www.hcmus.edu.vn/">Trường Đại học Khoa học Tự nhiên</a></li>
                                <li><a target="_blank" href="http://hcmussh.edu.vn/">Trường Đại học KHXH và Nhân văn</a></li>
                                <li><a target="_blank" href="https://www.hcmiu.edu.vn/">Trường Đại học Quốc tế </a></li>
                                <li><a target="_blank" href="https://www.uit.edu.vn/">Trường Đại học Công nghệ Thông tin</a></li>
                                <li><a target="_blank" href="http://www.uel.edu.vn/">Trường Đại học Kinh tế - Luật</a></li>
                                <li><a target="_blank" href="https://www.agu.edu.vn/">Trường Đại học An Giang</a></li>
                                <li><a target="_blank" href="https://medvnu.edu.vn/">Trường Đại học Khoa học Sức khỏe</a></li>
                                <li><a target="_blank" href="http://www.hcmier.edu.vn">Viện Môi trường và Tài nguyên</a></li>
                                <li><a target="_blank" href="/ve-dhqg-hcm/33396864/316864/376864">Các đơn vị khác</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col col-ft-2 mb-3 mb-lg-0">
                        <div class="footer-link">
                            <h3>Danh mục <i class="fa fa-angle-down d-md-none"></i></h3>
                            <ul class="list-unstyled"> <li>
                                    <a  href="/tin-tuc/32343364">Tin tức</a></li> <li>
                                    <a  href="/su-kien/33353364">Sự kiện</a></li> <li>
                                    <a  href="https://research.vnuhcm.edu.vn/">Nghiên cứu</a></li> <li>
                                    <a  href="/dao-tao/33373364">Đào tạo</a></li> <li>
                                    <a  href="/doi-ngoai/34303364">Đối ngoại</a></li> <li>
                                    <a  href="/sinh-vien/33383364">Sinh viên</a></li> <li>
                                    <a  href="/ve-dhqg-hcm/33393364">Về ĐHQG-HCM</a></li> <li>
                                    <a  href="https://megastory.vnuhcm.edu.vn">Megastory</a></li></ul>                </div>
                    </div>

                    <div class="col col-ft-4 mb-3 mb-lg-0">
                        <div class="footer-link">
                            <h3>Liên hệ<i class="fa fa-angle-down d-md-none"></i></h3>
                            <ul class="list-unstyled">
                                <li><a href="https://accounts.google.com/signin/v2/identifier?hd=vnuhcm.edu.vn&sacu=1&flowName=GlifWebSignIn&flowEntry=AddSession" target="_blank">Thư điện tử</a></li>
                                <li><a href="/lien-he">Hỗ trợ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </footer>
        </div>

        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-87720639-4"></script>
        <!-- jQuery -->
        <script src="/template/admin/plugins/jquery/jquery.min.js"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-87720639-4');

            //Lấy data

            function data_load_menu(id){
                return new Promise((resolve, reject) => {
                    $.ajax({
                        url: "load_menu2", // Địa chỉ URL mà bạn muốn gửi yêu cầu tới
                        type: "GET", // Phương thức HTTP (GET, POST, PUT, DELETE...)
                        data : {
                            id: id
                        },
                        success: function(data) {
                            const result = [];
                            const levelMap = new Map();

        
                            data.sort((a, b) => a.thutu - b.thutu);

            
                            const setLevel = (item) => {
                                if (item.id_cha === 0) {
                                    item.level = 1; // Cấp 1 cho phần tử gốc
                                } else {
                                    const parentItem = result.find(parent => parent.id === item.id_cha);
                                    item.level = parentItem ? parentItem.level + 1 : 1; // Tính level dựa trên phần tử cha
                                }
                                result.push(item);
                            };

                
                            data.forEach(item => setLevel({ ...item }));
                            resolve(result)
                        }

                    })
                })
            }
            function data_load(id){
                return new Promise((resolve, reject) => {
                    $.ajax({
                        url: "load_data", // Địa chỉ URL mà bạn muốn gửi yêu cầu tới
                        type: "GET", // Phương thức HTTP (GET, POST, PUT, DELETE...)
                        data : {
                            id: id
                        },
                        success: function(data) {
                            resolve(data)
                        }

                    })
                })
            }
            // <ul class="nav-categories d-sm-flex align-items-end flex-wrap justify-content-center" style="margin: -85px -15px 0;">
            //                                 <li class=" active  "><a href="/doi-ngoai/34303364 ">Đối tác học thuật</a></li>
            //                                 <li class=" "><a href="/doi-ngoai/34303364/313364 ">Đối tác doanh nghiệp</a></li>
            //                                 <li class=" "><a href="/doi-ngoai/34303364/323364 ">Địa phương</a></li>
            //                         </ul>

            function load_menucap2(data, id){ 
                return new Promise((resolve, reject) => {
                    var hmtl = data
                        .filter(item => item.level === 1)
                        .map((item, index) => 
                            `<li class="nav-item" style="max-width: 180px">
                                <a onclick='click_menu2(${item.id}, ${id})' id="menu2_${item.id}" id_menu="${item.id}"class="menu2 nav-link ${index === 0 ? 'active' : ''}">${item.tenmenu}</a>
                            </li>`
                        ).join('')
                        $('#menu2').html(hmtl);
                    resolve(true)
                })
            }


            function load_menucap3(data, id){
                return new Promise((resolve, reject) => {
                    
                    var html = data
                    .filter(item => item.level === 2)
                    .filter(item => item.id_cha === id)
                    .flat()
                    .filter((value, index, self) =>
                        index === self.findIndex(t => t.tenmenu === value.tenmenu)
                    )
                    .map((item, index) => 
                        `<li id="menu3_${item.id}" class="menu3 list-group-item ${index === 0 ? 'is-current' : ''}">
                            <a onclick="click_menu3(${item.id}, ${id})">${item.tenmenu}</a>
                        </li>`
                    ).join('');
                    $('#menu3').html(html);
                    var currentItem = data
                        .filter(item => item.level === 2)
                        .filter(item => item.id_cha === id)
                        .flat()
                        .filter((value, index, self) =>
                            index === self.findIndex(t => t.tenmenu === value.tenmenu)
                        )
                        .find(item => item.uutien === 1);

                    var current = currentItem ? currentItem.tenmenu : 'Không có tiêu đề';
                    $('.tieude_menu3').text(current);

                    resolve(true)
                })
            }

            

        
            async function load_content(data, id_cha, id_cap, id_menu) {
                $('#content').empty();

                if (id_cap == 3) {
                    await load_content_thongtin(data, id_cha, id_menu);
                } else if (id_cap == 1) {
                    await load_content_tintuc(data, id_cha, id_menu);
                } else {
                    $('#content').html('<p>Không có nội dung phù hợp</p>');
                }
            }
            console.log("load_content >>", { id_cha, id_cap, id_menu }) 


            async function load_content_tintuc(data, id_cha, id) {
            const html = data
                .filter(item => item.idmenu === id)
                .filter(item => item.tieude !== null) // ✅ dùng đúng tên trường
                .map(item => `
                    <div class="tintuc-item">
                        <h3 class="news-title">${item.tieude}</h3>
                        <div class="desc">${item.noidung}</div>
                        ${item.image ? `<img src="${item.image}" style="max-width: 200px;">` : ''}
                        <hr>
                    </div>
                `).join('');

            $('#content').html(html || '<p>Không có bài viết nào</p>'); 
            }





                









            async function load_menu2(id){
                $('.tieude_menu3').empty()
                $('#content').empty()
                
                
                var data_goc = await data_load(id)
                console.log('data', data_goc)
                $('.gioithieu_title').text(data_goc['tenmenu'])
                
                $('.gioithieu_content').text(data_goc['gioithieu'])
                var data = await data_load_menu(id)
                console.log('Góc', data)
                console.log(id)

                if (data_goc.id_cap == 1){
                    $('.del_menu2').empty()
                    var testhtml = `<div class="container">
        <div class="group-event-top panel">
            <div class="row">
                
                        <div class="col-lg-4 panel-item">
                            <div class="box-news-thumnail box--shadow wow fadeInUp">
                                <div class="row align-items-center">
                                    <div class="col-lg-12 col-md-4 col-sm-5">
                                        <a class="effect-scale" href="https://vnuhcm.edu.vn/tin-tuc_32343364/dhqg-hcm-ky-ket-hop-tac-toan-dien-voi-pvcombank-mo-rong-co-hoi-hoc-tap-viec-lam-cho-sinh-vien/363632383364.html">
                                            <img class="scale-img lazyload"
                                                 src="https://static.vnuhcm.edu.vn/images/20220505/77e6cfea347fad581131293bf2b57385.jpg"
                                                 data-src="https://static.vnuhcm.edu.vn/images/20250409/121725e70bc190abb2edf454dac02678.jpg" width="370"
                                                 height="200"
                                                 alt="ĐHQG-HCM ký kết hợp tác toàn diện với PVcomBank: Mở rộng cơ hội học tập, việc làm cho sinh viên">
                                            <span class="badge badge-primary"> Tin tổng hợp</span></a>
                                    </div>
                                    <div class="col-lg-12 col-md-8 col-sm-7">
                                        <div class="box-news">
                                            <h3 class="mb-0 "><a href="https://vnuhcm.edu.vn/tin-tuc_32343364/dhqg-hcm-ky-ket-hop-tac-toan-dien-voi-pvcombank-mo-rong-co-hoi-hoc-tap-viec-lam-cho-sinh-vien/363632383364.html"
                                                                class="news-title crop-text-2">ĐHQG-HCM ký kết hợp tác toàn diện với PVcomBank: Mở rộng cơ hội học tập, việc làm cho sinh viên</a></h3>
                                            <ul class="meta">
                                                <li>
                                                    <i class="fa fa-clock-o"></i> 09/04/2025                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        
        </div>
        </div>`
                    console.log("Djt me T FAT")
                    $('.del_menu2').html(testhtml)
                }
                else if (data_goc.id_cap == 3){
                    await load_menucap2(data , id)

                    const activeElement = document.querySelector('.menu2.active');
                    if (activeElement) {
                        var activeId = activeElement.id; // ví dụ: "menu2_3"
                        console.log('ID của thằng có active là:', activeId);

                        // Tách chuỗi và lấy phần số
                        activeIdInt = parseInt(activeId.split('_')[1]);
                        console.log('Số INT lấy ra là:', activeIdInt);
                    }
                    

                    await load_menucap3(data, activeIdInt)
                    console.log("bala ",data)
                    console.log(activeIdInt)
                    const currentItem = document.querySelector('.menu3.is-current');
                    let currentId = null;

                    if (currentItem) {
                        const liId = currentItem.id; // ví dụ: "menu3_5"
                        console.log('ID đầy đủ của li:', liId);

                        // Lấy số từ ID
                        currentId = parseInt(liId.split('_')[1]);
                        console.log('Số INT lấy ra từ ID:', currentId);
                    }
                    console.log("bandau", data)
                    // var currentItem = data.find(item => item.id === currentId);
                    // console.log(currentItem);x
                    
                    await load_content(data, activeIdInt, currentId)
                }
            
                




            
            }


            async function click_menu2(id_con, id_cha){
                $('.menu2').removeClass('active')
                $('#menu2_'+id_con).addClass('active')
                $('.tieude_menu3').empty()
                $('#content').empty()
                var data = await data_load_menu(id_cha)
                const activeElement = document.querySelector('.menu2.active');
                if (activeElement) {
                    var activeId = activeElement.id; // ví dụ: "menu2_3"
                    console.log('ID của thằng có active là:', activeId);

                    // Tách chuỗi và lấy phần số
                    activeIdInt = parseInt(activeId.split('_')[1]);
                    console.log('Số INT lấy ra là:', activeIdInt);
                }
                console.log("Menu data ", data)
                await load_menucap3(data, activeIdInt)
                
                const currentItem = document.querySelector('.menu3.is-current');
                let currentId = null;

                if (currentItem) {
                    const liId = currentItem.id; // ví dụ: "menu3_5"
                    console.log('ID đầy đủ của li:', liId);

                    // Lấy số từ ID
                    currentId = parseInt(liId.split('_')[1]);
                    console.log('Số INT lấy ra từ ID:', currentId);
                }
                await load_content(data, activeIdInt, currentId)
                
            }


            async function click_menu3(id_con, id_chachaba){
                $('.menu3').removeClass('is-current')
                $('#menu3_'+id_con).addClass('is-current')
                var data = await data_load_menu(id_chachaba)
                console.log("sau", data)
                const activeElement = document.querySelector('.menu2.active');
                if (activeElement) {
                    var activeId = activeElement.id; // ví dụ: "menu2_3"
                    console.log('ID của thằng có active là:', activeId);

                    // Tách chuỗi và lấy phần số
                    activeIdInt = parseInt(activeId.split('_')[1]);
                    console.log('Số INT lấy ra là:', activeIdInt);
                }
                const currentItem = document.querySelector('.menu3.is-current');
                let currentId = null;
                if (currentItem) {
                    const liId = currentItem.id; // ví dụ: "menu3_5"
                    console.log('ID đầy đủ của li:', liId);

                    // Lấy số từ ID
                    currentId = parseInt(liId.split('_')[1]);
                    console.log('Số INT lấy ra từ ID:', currentId);
                }
                var tenmenu = data.find(item => item.id === currentId).tenmenu

                $('.tieude_menu3').text(tenmenu ?? 'Không có tiêu đề');
                await load_content(data, activeIdInt, currentId)
            }

            
        </script>

    </body>
</html>
