<header>
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Đường Stonecoal</a></li>
            </ul>
            <ul class="header-links pull-right">
                <li><a href="#"><i class="fa fa-money"></i> VNĐ</a></li>
                <li><a href="{{ route('login') }}"><i class="fa fa-user-o"></i> Tài khoản của tôi</a></li>
            </ul>
        </div>
    </div>
    <div id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="{{ route('home') }}" class="logo">
                            <img src="{{ asset('img/logo.png') }}" alt="Logo Electro">
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="header-search">
                        <form action="#">
                            <select class="input-select">
                                <option value="0">Tất cả danh mục</option>
                                <option value="1">Máy tính xách tay</option>
                                <option value="2">Điện thoại thông minh</option>
                                <option value="3">Máy ảnh</option>
                                <option value="4">Phụ kiện</option>
                            </select>
                            <input class="input" placeholder="Tìm kiếm tại đây">
                            <button class="search-btn">Tìm kiếm</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <div>
                            <a href="#">
                                <i class="fa fa-heart-o"></i>
                                <span>Danh sách yêu thích</span>
                                <div class="qty">2</div>
                            </a>
                        </div>
                        <div class="dropdown">
                            <a href="{{ route('cart.index') }}" style="position:relative;">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Giỏ hàng của bạn</span>
                                @if(isset($cartCount) && $cartCount > 0)
                                    <div class="qty" style="position:absolute;top:-8px;right:-8px;background:#d10024;color:#fff;border-radius:50%;padding:2px 7px;font-size:13px;min-width:22px;text-align:center;">{{ $cartCount }}</div>
                                @endif
                            </a>
                        </div>
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<nav id="navigation">
    <div class="container">
        <div id="responsive-nav">
            <ul class="main-nav nav navbar-nav">
                <li><a href="{{ route('home') }}">Trang chủ</a></li>
                <li><a href="{{ route('danhmuc') }}">Danh mục</a></li>
                <li><a href="{{ route('laptop') }}">Máy tính xách tay</a></li>
                <li><a href="{{ route('telephone') }}">Điện thoại thông minh</a></li>
                <li><a href="{{ route('camera') }}">Máy ảnh</a></li>
                <li><a href="{{ route('accessories') }}">Phụ kiện</a></li>
            </ul>
        </div>
    </div>
</nav>