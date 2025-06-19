{{-- resources/views/products/hot_deals.blade.php --}}

@extends('layouts.main') {{-- Hoặc layout tương ứng của bạn --}}

@section('title', 'Deal hot tuần này')

@section('content')
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Sản phẩm Deal hot</h3>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    @forelse($hotDealsProducts as $product)
                        {{-- Sử dụng cấu trúc hiển thị sản phẩm tương tự như ở trang chủ --}}
                        <div class="col-md-3 col-xs-6"> {{-- Chia cột để hiển thị nhiều sản phẩm trên 1 hàng --}}
                            <a href="{{ route('products.show', $product->slug) }}" style="display:block;height:100%;text-decoration:none;color:inherit;position:relative;">
                                <div class="product" style="cursor:pointer;border-radius:18px;box-shadow:0 2px 16px #e3e3e3;transition:box-shadow .2s,transform .2s;background:#fff;overflow:hidden;position:relative;min-height:420px;display:flex;flex-direction:column;justify-content:space-between;height:100%;">
                                    <div class="product-img" style="padding:24px 24px 0 24px;text-align:center;">
                                        @php
                                        $imagePath = $product->image_path && file_exists(public_path('storage/' . $product->image_path)) ? asset('storage/' . $product->image_path) : asset('img/default-product.png');
                                        @endphp
                                        <img src="{{ $imagePath }}" alt="{{ $product->name }}" style="max-width:100%;max-height:180px;border-radius:12px;box-shadow:0 2px 8px #f0f0f0;object-fit:contain;background:#f8fafc;">
                                        @if($product->is_new)
                                        <div class="product-label" style="position:absolute;top:18px;left:18px;background:#43a047;color:#fff;font-weight:700;border-radius:8px 0 8px 0;padding:3px 14px;font-size:13px;">
                                            MỚI</div>
                                        @endif
                                        @if($product->discount_percentage > 0)
                                        <div class="product-label" style="position:absolute;top:18px;right:18px;background:#d10024;color:#fff;font-weight:700;border-radius:0 8px 0 8px;padding:3px 14px;font-size:13px;">
                                            -{{ $product->discount_percentage }}%</div>
                                        @endif
                                    </div>
                                    <div class="product-body" style="padding:18px 24px 0 24px;">
                                        <p class="product-category" style="font-size:13px;color:#888;font-weight:500;margin-bottom:4px;">
                                            {{ $product->category->name ?? 'N/A' }}
                                        </p>
                                        <h3 class="product-name" style="font-size:1.1rem;font-weight:700;line-height:1.3;margin-bottom:8px;">
                                            {{ $product->name }}
                                        </h3>
                                        @php
                                        $discountAmount = $product->price * ($product->discount_percentage / 100);
                                        $newPrice = $product->price - $discountAmount;
                                        @endphp
                                        <h4 class="product-price" style="font-size:1.2rem;color:#d10024;font-weight:800;margin-bottom:6px;">
                                            {{ number_format($newPrice) }} VNĐ @if($product->price > $newPrice) <del class="product-old-price" style="color:#aaa;font-size:1rem;font-weight:400;">{{ number_format($product->price) }} VNĐ</del>@endif
                                        </h4>
                                        <div class="product-rating" style="margin-bottom:8px;">
                                            @php $avgRating = $product->averageRating(); @endphp
                                            @for($i = 1; $i <= 5; $i++) <i class="fa fa-star{{ $i <= $avgRating ? '' : '-o' }}" style="color:#ffc107;"></i>
                                            @endfor
                                            <span style="color:#888;font-size:13px;margin-left:4px;">({{ number_format($product->averageRating(), 1) }})</span>
                                        </div>
                                        {{-- Các nút hành động như thêm vào wishlist, so sánh, xem nhanh --}}
                                        {{-- Cần truyền $wishlistIds nếu muốn hiển thị trạng thái wishlist --}}
                                        <div class="product-btns mb-2" style="display:flex;gap:8px;">
                                            {{-- Ví dụ nút wishlist, cần xử lý logic $isWished nếu muốn --}}
                                            <button class="add-to-wishlist wishlist-btn" data-product-id="{{ $product->id }}" style="background:transparent;border:none;outline:none;cursor:pointer;display:flex;align-items:center;justify-content:center;width:40px;height:40px;border-radius:50%;transition:box-shadow 0.2s,background 0.2s;box-shadow:0 2px 8px #f8bbd0;position:relative;z-index:3;" tabindex="0">
                                                <i class="fa fa-heart-o wishlist-icon" style="color:#d10024;font-size:1.5rem;transition:color 0.2s;"></i>
                                            </button>
                                            <button style="background:transparent;border:none;outline:none;cursor:pointer;display:flex;align-items:center;justify-content:center;width:40px;height:40px;border-radius:50%;transition:box-shadow 0.2s,background 0.2s;box-shadow:0 2px 8px #f8bbd0;position:relative;z-index:3;" class="add-to-compare"><i class="fa fa-exchange" style="color:#1976d2;"></i></button>
                                            <button style="background:transparent;border:none;outline:none;cursor:pointer;display:flex;align-items:center;justify-content:center;width:40px;height:40px;border-radius:50%;transition:box-shadow 0.2s,background 0.2s;box-shadow:0 2px 8px #f8bbd0;position:relative;z-index:3;" class="quick-view"><i class="fa fa-eye" style="color:#222;"></i></button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart" style="padding:0 24px 18px 24px;">
                                        <form class="add-to-cart-form" action="{{ route('cart.add') }}" method="POST" style="display:flex;align-items:center;gap:10px;">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="add-to-cart-btn" style="background:#d10024;color:#fff;border-radius:24px;padding:10px 24px;font-size:15px;font-weight:600;box-shadow:0 2px 8px #f8bbd0;transition:background 0.2s;">
                                                <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-md-12">
                            <p>Hiện chưa có sản phẩm nào đang giảm giá.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection