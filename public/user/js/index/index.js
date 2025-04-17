
function data_load_menu(id) {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: "load_menu2",
            type: "GET",
            data: {
                id: id
            },
            success: function(data) {
                const result = [];
                const levelMap = new Map();
                data.sort((a, b) => a.thutu - b.thutu);
                const setLevel = (item) => {
                    if (item.id_cha === 0) {
                        item.level = 1;
                    } else {
                        const parentItem = result.find(parent => parent.id === item.id_cha);
                        item.level = parentItem ? parentItem.level + 1 : 1;
                    }
                    result.push(item);
                };
                data.forEach(item => setLevel({ ...item }));
                console
                resolve(result);
            }
        });
    });
}

function data_load(id) {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: "load_data",
            type: "GET",
            data: {
                id: id
            },
            success: function(data) {
                resolve(data);
            }
        });
    });
}
function data_tintuc(id) {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: "data_tintuc",
            type: "GET",
            data: {
                id: id
            },
            success: function(data) {
                resolve(data);
            }
        });
    });
}
function load_data_menu1(id) {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: "load_data_menu1",
            type: "GET",
            data: {
                id: id
            },
            success: function(data) {
                resolve(data);
            }
        });
    });
}

function load_menucap2(data, id) {
    return new Promise((resolve, reject) => {
        var hmtl = data
            .filter(item => item.level === 1)
            .filter((value, index, self) =>
                index === self.findIndex(t => t.tenmenu === value.tenmenu)
            )
            .map((item, index) =>
                `<li class="nav-item" style="max-width: 180px">
                    <a onclick='click_menu2(${item.id}, ${id})' id="menu2_${item.id}" id_menu="${item.id}" class="menu2 nav-link ${index === 0 ? 'active' : ''}">${item.tenmenu}</a>
                </li>`
            ).join('');
        $('#menu2').html(hmtl);
        resolve(true);
    });
}

function load_menucap3(data, id) {
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
        var current = data
            .filter(item => item.level === 2)
            .filter(item => item.id_cha === id)
            .flat()
            .filter((value, index, self) =>
                index === self.findIndex(t => t.tenmenu === value.tenmenu)
            )
            .find(item => item.uutien === 1);
        $('.tieude_menu3').text(current?.tenmenu ?? 'Không có tiêu đề');
        resolve(true);
    });
}

function load_content(data, id) {
    return new Promise((resolve, reject) => {
        $('#content').empty();
        var id_data = data.find(item => item.id === id);
        var id_loaimanhinh = id_data?.loaimanhinh ?? 0;

        let html_data = '';
        if (id_loaimanhinh == 1) {
            html_data = `
                <ul id="content" class="latest-list"></ul>
            `;
        } else if (id_loaimanhinh == 2) {
            html_data = `
                <div class="container">
                    <div class="group-event-top panel">
                        <div id="content" class="row"></div>
                    </div>
                </div>
            `;
        } else if (id_loaimanhinh == 3) {
            html_data = `
                <div class="container">
                    <div class="slide-news-educate">
                        <div class="activities">
                            <div id="content" class="row"></div>
                        </div>
                    </div>
                </div>
            `;
        } else if (id_loaimanhinh == 4) {
            html_data = `
                <div class="container">
                    <div class="slide-news-educate">
                        <div class="activities">
                            <div id="content"></div>
                        </div>
                    </div>
                </div>
            `;
        } else {
            html_data = `<div id="content">Không có dữ liệu</div>`;
        }
        $('#load_content11').html(html_data);

        function createNewsItemHTML(item) {
            if (item.loaimanhinh == 1) {
                return `
                    <li> 
                        <div class="latest-item wow fadeInUp">
                            <div class="latest-item-image">
                                <a class="effect-scale" onclick="load_tintuc(${item.tintuc_id})">
                                    <img class="scale-img lazyload" 
                                        src="${item.tintuc_image ? item.tintuc_image : 'https://placehold.co/800x600?text=800x600'}" 
                                        data-src="${item.tintuc_image ? item.tintuc_image : 'https://placehold.co/800x600?text=800x600'}" 
                                        width="400" height="300" style="object-fit: cover;">
                                </a>
                            </div>
                            <div class="latest-item-content">
                                <div class="latest-item-info">
                                    <h3 class="mb-0">
                                        <a onclick="load_tintuc(${item.tintuc_id})" class="news-title crop-text-3">${item.tintuc_title}</a>
                                    </h3>
                                    <div class="desc dotdotdot crop-text-4">${item.tintuc_content}</div>
                                    <ul class="meta">
                                        <li><i class="fa fa-clock-o"></i> ${item.ngaydang ? item.ngaydang : 'Không có ngày'}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>`;
            } else if (item.loaimanhinh == 2) {
                return `
                    <div class="col-lg-4 panel-item">
                        <div class="box-news-thumnail box--shadow wow fadeInUp">
                            <div class="row align-items-center">
                                <div class="col-lg-12 col-md-4 col-sm-5">
                                    <a class="effect-scale" onclick="load_tintuc(${item.tintuc_id})"">
                                        <img class="scale-img lazyload"
                                            src="${item.tintuc_image ? item.tintuc_image : 'https://placehold.co/800x600?text=800x600'}"
                                            data-src="${item.tintuc_image ? item.tintuc_image : 'https://placehold.co/800x600?text=800x600'}" 
                                            width="370" height="200"
                                            alt="${item.tintuc_title}">
                                        <span class="badge badge-primary">Tin tổng hợp</span>
                                    </a>
                                </div>
                                <div class="col-lg-12 col-md-8 col-sm-7">
                                    <div class="box-news">
                                        <h3 class="mb-0">
                                            <a onclick="load_tintuc(${item.tintuc_id})" class="news-title crop-text-2">${item.tintuc_title}</a>
                                        </h3>
                                        <ul class="meta">
                                            <li><i class="fa fa-clock-o"></i> ${item.ngaydang ? item.ngaydang : 'Không có ngày'}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`;
            } else if (item.loaimanhinh == 3) {
                return `
                    <div class="item activitie-item box--shadow">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="activitie-info">
                                    <div class="inner">
                                        <h3 class="mb-0">
                                            <a class="news-title" onclick="load_tintuc(${item.tintuc_id})"">${item.tintuc_title}</a>
                                        </h3>
                                        <div class="desc-short dotdotdot crop-text-4">${item.tintuc_content}</div>
                                        <ul class="meta">
                                            <li><i class="fa fa-clock-o"></i> ${item.ngaydang ? item.ngaydang : 'Không có ngày'}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="activitie-image"
                                    style="background-image:url('${item.tintuc_image ? item.tintuc_image : 'https://placehold.co/800x600?text=800x600'}')"
                                    data-height="394">
                                </div>
                            </div>
                        </div>
                    </div>`;
            } else if (item.loaimanhinh == 4) {
                return `
                    <div class="item" style="margin-top:10px">
                        <p class="title" style="border-bottom: 2px solid #007bff; padding-bottom: 8px; margin-bottom: 12px;">
                            <a href="/chitiettintuc/${item.tintuc_id}" title="${item.tintuc_title}">${item.tintuc_title}</a>
                            <br />
                            <span class="date">Ngày đăng: ${item.ngaydang ? item.ngaydang : 'Không có ngày'}</span>
                        </p>
                    </div>`;
            } else {
                return `<div>Không hỗ trợ loại màn hình này</div>`;
            }
        }

        var html = data
            .filter(item => item.id === id)
            .filter(item => item.tintuc_title !== null)
            .flat()
            .map(item => createNewsItemHTML(item)).join('');
        $('#content').html(html);
        resolve(true);
    });
}

async function load_menu2(id) {
    $('.menu1').removeClass('active');

    $('#check_active_' + id).addClass('active');
    $('.del-main').empty();
    $('.tieude_menu3').empty();
    $('#content').empty();
    var data_goc = await data_load(id);
  
    html_main = `
    <div class="sub-banner" style="background-image:url('/user/image/subbanner-event-research.jpg')">
        <div class="text text-center">
            <h2 class="gioithieu_title page-title"></h2>
            <p class="gioithieu_content sub-title"></p>
        </div>
    </div>
    <div class="container del_menu2">
       
    </div>`
  
    $('.del-main').html(html_main);
    $('.gioithieu_title').text(data_goc.tenmenu);
    $('.gioithieu_content').text(data_goc.gioithieu);
    var data = await data_load_menu(id);
    if (data_goc.id_cap == 1) {
        
        var data_menu1 = await load_data_menu1(id);
        var testhtml = `<div id="load_content11"></div>`;
        $(".del_menu2").html(testhtml);
        await load_content(data_menu1, id);
    } else if (data_goc.id_cap == 2) {
        var testhtml = `
            <div class="tabcontrols students">
                <ul id="menu2" class="nav nav-pills nav-fill d-sm-flex align-items-end flex-wrap justify-content-center" role="tablist" style="max-width: 1005px"></ul>
                <div id="load_content11"></div>
            </div>`;
        $(".del_menu2").html(testhtml);
        await load_menucap2(data, id);
        const activeElement = document.querySelector('.menu2.active');
        if (activeElement) {
            var activeId = activeElement.id;
            activeIdInt = parseInt(activeId.split('_')[1]);
        }
        await load_content(data, activeIdInt);
    } else if (data_goc.id_cap == 3) {
        var testhtml = `
            <div class="tabcontrols students">
                <ul id="menu2" class="nav nav-pills nav-fill d-sm-flex align-items-end flex-wrap justify-content-center" role="tablist" style="max-width: 1005px"></ul>
                <div class="tab-content pt-0">
                    <div class="tab-pane fade show active" role="tabpanel" style="">
                        <div class="row">
                            <div class="col-lg-4">
                                <aside class="side-category wow fadeInUp">
                                    <ul id="menu3" class="list-unstyled list-group"></ul>
                                </aside>
                            </div>
                            <div class="col-lg-8">
                                <h3 class="tieude_menu3 title-box no-border wow fadeInUp pt-3 pt-lg-0" style="visibility: visible;"></h3>
                                <div id="load_content11" style="margin-top:55px"></div>
                                <div class="paging wow fadeInUp mt-2" id="paging"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;
        $(".del_menu2").html(testhtml);
        await load_menucap2(data, id);
        const activeElement = document.querySelector('.menu2.active');
        if (activeElement) {
            var activeId = activeElement.id;
            activeIdInt = parseInt(activeId.split('_')[1]);
        }
        await load_menucap3(data, activeIdInt);
        const currentItem = document.querySelector('.menu3.is-current');
        let currentId = null;
        if (currentItem) {
            const liId = currentItem.id;
            currentId = parseInt(liId.split('_')[1]);
        }
        await load_content(data, currentId);
    }
}

async function click_menu2(id_con, id_cha) {
    $('.menu2').removeClass('active');
    $('#menu2_' + id_con).addClass('active');
    $('.tieude_menu3').empty();
    $('#content').empty();
    var data = await data_load_menu(id_cha);
    const activeElement = document.querySelector('.menu2.active');
    if (activeElement) {
        var activeId = activeElement.id;
        activeIdInt = parseInt(activeId.split('_')[1]);
    }
    await load_menucap3(data, activeIdInt);
    const currentItem = document.querySelector('.menu3.is-current');
    let currentId = null;
    if (currentItem) {
        const liId = currentItem.id;
        currentId = parseInt(liId.split('_')[1]);
    }
    await load_content(data, currentId);
}

async function click_menu3(id_con, id_chachaba) {
    $('.menu3').removeClass('is-current');
    $('#menu3_' + id_con).addClass('is-current');
    var data = await data_load_menu(id_chachaba);
    const activeElement = document.querySelector('.menu2.active');
    if (activeElement) {
        var activeId = activeElement.id;
        activeIdInt = parseInt(activeId.split('_')[1]);
    }
    const currentItem = document.querySelector('.menu3.is-current');
    let currentId = null;
    if (currentItem) {
        const liId = currentItem.id;
        currentId = parseInt(liId.split('_')[1]);
    }
    var tenmenu = data.find(item => item.id === currentId)?.tenmenu;
    $('.tieude_menu3').text(tenmenu ?? 'Không có tiêu đề');
    await load_content(data, currentId);
}

async function load_tintuc(id){
   
    await load_html();
    data = await data_tintuc(id)
    await load_data(data)
  

        
}


function load_html(){
    return new Promise((resolve, reject) => {
        $('.del-main').empty();
        html = ` <main id="main-content">
        <div class="container">
            <div class="row">
                <!-- Phần chi tiết tin tức -->
                <div class="col-lg-8 panel-item news-detail">
                    <article class="entry wow fadeInUp">
                        <span class="badge badge-primary">Tin tổng hợp</span>

                        <header class="pt-3 mb-3">
                            <h1 class="entry-title " id="load_tieude"> </h1>
                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                <div class="meta">
                                    <li ><i class="fa fa-clock-o" id="load_ngaydang"></i> </li>
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

                    
                </div>
            </div>
        </div>
        </main>`
        $('.del-main').html(html);
        resolve(true)
    })
}


function load_data(data){
    return new Promise((resolve, reject) => {
        console.log(data)
        $('#load_tieude').text(data.tieude)
        
        $('#load_ngaydang').html(' ' + data.ngaydang)
        $('.entry-content').html(data.noidung)

        
        resolve(true)
    })
}