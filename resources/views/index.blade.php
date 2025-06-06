@extends('layouts.main')

@section('title', 'Trang chủ')

@section('content')
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{ asset('img/shop01.png') }}" alt="Bộ sưu tập máy tính xách tay">
                    </div>
                    <div class="shop-body">
                        <h3>Bộ sưu tập<br>Máy tính xách tay</h3>
                        <a href="{{ route('laptop') }}" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{ asset('img/shop03.png') }}" alt="Bộ sưu tập phụ kiện">
                    </div>
                    <div class="shop-body">
                        <h3>Bộ sưu tập<br>Phụ kiện</h3>
                        <a href="{{ route('accessories') }}" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{ asset('img/shop02.png') }}" alt="Bộ sưu tập máy ảnh">
                    </div>
                    <div class="shop-body">
                        <h3>Bộ sưu tập<br>Máy ảnh</h3>
                        <a href="{{ route('camera') }}" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Sản phẩm mới</h3>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="products-slick slick-initialized slick-slider">
                        <div class="slick-list draggable">
                            <div class="slick-track" style="opacity: 1; width: 1470px; transform: translate3d(0px, 0px, 0px);">
                                @foreach($newProducts as $product)
                                <div class="product slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="0" style="width: 270px;">
                                    <div class="product-img">
                                        <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}">
                                        @if($product->is_new)
                                        <div class="product-label">
                                            <span class="new">Mới</span>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">{{ $product->category->name ?? 'N/A' }}</p>
                                        <h3 class="product-name"><a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a></h3>
                                        <h4 class="product-price">{{ number_format($product->price) }} VNĐ
                                            @if($product->old_price)
                                                <del class="product-old-price">{{ number_format($product->old_price) }} VNĐ</del>
                                            @endif
                                        </h4>
                                        <div class="product-rating">
                                            @for ($i = 0; $i < $product->rating; $i++)
                                                <i class="fa fa-star"></i>
                                            @endfor
                                            @for ($i = $product->rating; $i < 5; $i++)
                                                <i class="fa fa-star-o"></i>
                                            @endfor
                                        </div>
                                        <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">thêm yêu thích</span></button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">thêm so sánh</span></button>
                                            <button class="quick-view" onclick="window.location.href = '{{ route('products.show', $product->slug) }}'"><i class="fa fa-eye"></i><span class="tooltipp">xem nhanh</span></button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> thêm vào giỏ hàng</button>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <button class="slick-prev slick-arrow" aria-label="Previous" type="button" style="display: block;"></button><button class="slick-next slick-arrow" aria-label="Next" type="button" style="display: block;"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-6">
                <div class="section-title">
                    <h4 class="title">Sản phẩm bán chạy</h4>
                    <div class="section-nav">
                        <div id="slick-nav-3" class="products-slick-nav"></div>
                    </div>
                </div>
                <div class="products-widget-slick slick-initialized slick-slider">
                    <div class="slick-list draggable">
                        <div class="slick-track" style="opacity: 1; width: 540px; transform: translate3d(0px, 0px, 0px);">
                            <div class="product-widget slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="0" style="width: 270px;">
                                <div class="product-body">
                                    @foreach($topSellingProducts->take(3) as $product)
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{ $product->category->name ?? 'N/A' }}</p>
                                            <h3 class="product-name"><a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a></h3>
                                            <h4 class="product-price">{{ number_format($product->price) }} VNĐ
                                                @if($product->old_price)
                                                    <del class="product-old-price">{{ number_format($product->old_price) }} VNĐ</del>
                                                @endif
                                            </h4>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-6">
                <div class="section-title">
                    <h4 class="title">Sản phẩm hàng đầu</h4>
                    <div class="section-nav">
                        <div id="slick-nav-4" class="products-slick-nav"></div>
                    </div>
                </div>
                <div class="products-widget-slick slick-initialized slick-slider">
                    <div class="slick-list draggable">
                        <div class="slick-track" style="opacity: 1; width: 540px; transform: translate3d(0px, 0px, 0px);">
                            <div class="product-widget slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="0" style="width: 270px;">
                                <div class="product-body">
                                    @foreach($widgetProducts1 as $product)
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{ $product->category->name ?? 'N/A' }}</p>
                                            <h3 class="product-name"><a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a></h3>
                                            <h4 class="product-price">{{ number_format($product->price) }} VNĐ
                                                @if($product->old_price)
                                                    <del class="product-old-price">{{ number_format($product->old_price) }} VNĐ</del>
                                                @endif
                                            </h4>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-6">
                <div class="section-title">
                    <h4 class="title">Sản phẩm được xem nhiều nhất</h4>
                    <div class="section-nav">
                        <div id="slick-nav-5" class="products-slick-nav"></div>
                    </div>
                </div>
                <div class="products-widget-slick slick-initialized slick-slider">
                    <div class="slick-list draggable">
                        <div class="slick-track" style="opacity: 1; width: 540px; transform: translate3d(0px, 0px, 0px);">
                            <div class="product-widget slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="0" style="width: 270px;">
                                <div class="product-body">
                                    @foreach($widgetProducts2 as $product)
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{ $product->category->name ?? 'N/A' }}</p>
                                            <h3 class="product-name"><a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a></h3>
                                            <h4 class="product-price">{{ number_format($product->price) }} VNĐ
                                                @if($product->old_price)
                                                    <del class="product-old-price">{{ number_format($product->old_price) }} VNĐ</del>
                                                @endif
                                            </h4>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="newsletter" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="newsletter">
                    <p>Đăng ký nhận <strong>BẢN TIN</strong></p>
                    <form>
                        <input class="input" type="email" placeholder="Nhập Email của bạn">
                        <button class="newsletter-btn"><i class="fa fa-envelope"></i> Đăng ký</button>
                    </form>
                    <ul class="newsletter-follow">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection