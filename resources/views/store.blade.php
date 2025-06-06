@extends('layouts.main')

@section('title', 'Cửa hàng')
@section('content')
<div id="breadcrumb" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="active">Cửa hàng</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div id="aside" class="col-md-3">
                <div class="aside">
                    <h3 class="aside-title">Danh mục</h3>
                    <div class="checkbox-filter">
                        {{-- Để hiển thị danh mục động, bạn cần truyền biến $categories từ controller --}}
                        @foreach($categories as $category)
                        <div class="input-checkbox">
                            <input type="checkbox" id="category-{{ $category->id }}"
                                {{ request('category') == $category->slug ? 'checked' : '' }}
                                onchange="window.location.href = '{{ route('store.index', ['category' => $category->slug]) }}'">
                            <label for="category-{{ $category->id }}">
                                <span></span>
                                {{ $category->name }}
                                <small>({{ $category->products_count }})</small>
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="aside">
                    <h3 class="aside-title">Giá</h3>
                    <div class="price-filter">
                        <div id="price-slider"></div>
                        <div class="input-number price-min">
                            <input id="price-min" type="number" name="price_min">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                        <div class="input-number price-max">
                            <input id="price-max" type="number" name="price_max">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                        <button type="button" class="primary-btn" id="apply-price-filter">Lọc</button>
                    </div>
                </div>
                <div class="aside">
                    <h3 class="aside-title">Sản phẩm bán chạy nhất</h3>
                    @if($bestSellingProducts->count() > 0)
                        @foreach($bestSellingProducts as $product)
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
                    @else
                        <p>Không có sản phẩm bán chạy để hiển thị.</p>
                    @endif
                </div>
            </div>
            <div id="store" class="col-md-9">
                <div class="store-filter clearfix">
                    <div class="store-sort">
                        <label>
                            Sắp xếp theo:
                            <select class="input-select" onchange="window.location.href = this.value;">
                                <option value="{{ route('store.index', array_merge(request()->except('sort'), ['sort' => 'new'])) }}" {{ request('sort') == 'new' ? 'selected' : '' }}>Mới nhất</option>
                                <option value="{{ route('store.index', array_merge(request()->except('sort'), ['sort' => 'popularity'])) }}" {{ request('sort') == 'popularity' ? 'selected' : '' }}>Phổ biến</option>
                                <option value="{{ route('store.index', array_merge(request()->except('sort'), ['sort' => 'price_asc'])) }}" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Giá: Thấp đến Cao</option>
                                <option value="{{ route('store.index', array_merge(request()->except('sort'), ['sort' => 'price_desc'])) }}" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Giá: Cao đến Thấp</option>
                                <option value="{{ route('store.index', array_merge(request()->except('sort'), ['sort' => 'name_asc'])) }}" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Tên: A-Z</option>
                                <option value="{{ route('store.index', array_merge(request()->except('sort'), ['sort' => 'name_desc'])) }}" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Tên: Z-A</option>
                            </select>
                        </label>
                        <label>
                            Hiển thị:
                            <select class="input-select" onchange="window.location.href = this.value;">
                                <option value="{{ route('store.index', array_merge(request()->except('per_page'), ['per_page' => 9])) }}" {{ request('per_page', 9) == 9 ? 'selected' : '' }}>9</option>
                                <option value="{{ route('store.index', array_merge(request()->except('per_page'), ['per_page' => 18])) }}" {{ request('per_page') == 18 ? 'selected' : '' }}>18</option>
                                <option value="{{ route('store.index', array_merge(request()->except('per_page'), ['per_page' => 27])) }}" {{ request('per_page') == 27 ? 'selected' : '' }}>27</option>
                            </select>
                        </label>
                    </div>
                    <ul class="store-grid">
                        <li class="active"><i class="fa fa-th"></i></li>
                        <li><a href="#"><i class="fa fa-list"></i></a></li>
                    </ul>
                </div>
                <div class="row">
                    @forelse($products as $product)
                    <div class="col-md-4 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}">
                                @if($product->is_new)
                                <div class="product-label">
                                    <span class="new">MỚI</span>
                                </div>
                                @endif
                                @if($product->discount_percentage > 0)
                                <div class="product-label">
                                    <span class="sale">-{{ $product->discount_percentage }}%</span>
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
                    </div>
                    @empty
                    <div class="col-md-12 text-center">
                        <p>Không tìm thấy sản phẩm nào.</p>
                    </div>
                    @endforelse
                </div>
                <div class="store-filter clearfix">
                    <span class="store-qty">Hiển thị {{ $products->firstItem() }} - {{ $products->lastItem() }} của {{ $products->total() }} sản phẩm</span>
                    {{ $products->links('vendor.pagination.default') }} {{-- Sử dụng phân trang mặc định của Laravel --}}
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

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.0/nouislider.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.0/nouislider.min.css" rel="stylesheet">

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        let priceMin = parseFloat(urlParams.get('price_min')) || 1; // Mặc định 1 VNĐ
        let priceMax = parseFloat(urlParams.get('price_max')) || 999000000; // Mặc định 999 triệu VNĐ

        const priceSlider = document.getElementById('price-slider');
        const priceMinInput = document.getElementById('price-min');
        const priceMaxInput = document.getElementById('price-max');
        const applyPriceFilterBtn = document.getElementById('apply-price-filter');

        if (priceSlider) {
            noUiSlider.create(priceSlider, {
                start: [priceMin, priceMax],
                connect: true,
                step: 100000, // Bước nhảy 100,000 VNĐ
                range: {
                    'min': 1,
                    'max': 1000000000 // Giả sử giá tối đa là 1 tỷ VNĐ
                },
                format: {
                    to: function (value) {
                        return Math.round(value);
                    },
                    from: function (value) {
                        return Number(value);
                    }
                }
            });

            priceSlider.noUiSlider.on('update', function(values, handle) {
                const value = values[handle];
                if (handle) {
                    priceMaxInput.value = Math.round(value);
                } else {
                    priceMinInput.value = Math.round(value);
                }
            });

            applyPriceFilterBtn.addEventListener('click', function() {
                let currentUrl = new URL(window.location.href);
                currentUrl.searchParams.set('price_min', priceMinInput.value);
                currentUrl.searchParams.set('price_max', priceMaxInput.value);
                window.location.href = currentUrl.toString();
            });

            priceMinInput.addEventListener('change', function() {
                priceSlider.noUiSlider.set([this.value, null]);
            });

            priceMaxInput.addEventListener('change', function() {
                priceSlider.noUiSlider.set([null, this.value]);
            });
        }
    });

    // Hàm cập nhật query string parameter (có thể không cần nếu dùng cách trên)
    // function updateQueryStringParameter(uri, key, value) {
    //     var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
    //     var separator = uri.indexOf('?') !== -1 ? "&" : "?";
    //     if (uri.match(re)) {
    //         return uri.replace(re, '$1' + key + "=" + value + '$2');
    //     } else {
    //         return uri + separator + key + "=" + value;
    //     }
    // }
</script>
@endsection