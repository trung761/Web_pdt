<header>
    <div class="header-top">
        <div class="container">
            <ul class="navbar-top d-flex justify-content-end">
                <li class="dropdown">
                    <button class="btn btn-link" type="button" id="dropdownSearch" data-toggle="dropdown" style="line-height: 2;" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-search"></i>
                    </button>
                    <div class="dropdown-menu dropdown-search" aria-labelledby="dropdownSearch">
                        <form action="/tim-kiem" method="get">
                            <input class="form-control" type="text" name="search" placeholder="Tìm kiếm">
                            <button class="btn-link btn" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </li>
                <li class="dropdown">
                    <div>
                        <a class="btn btn-link" style="padding: 5px; text-decoration: none; color: white" href="/lang/en">English</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="/user/image/logo/CTUT_logo.png" alt="Trường Đại học Quốc Gia Tp Hồ Chí Minh" width="50">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    @foreach ($menu1 ?? [] as $menu)
                        <li class="nav-item menu1" id="check_active_{{ $menu->id }}">
                            <span onclick="load_menu2({{ $menu->id ?? 0 }})" id_menu="{{ $menu->id ?? 0 }}" trang_thai="{{ $menu->trangthai }}" class="nav-link crop-text-1">{{ $menu->tenmenu ?? 'Không có tiêu đề' }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
</header>