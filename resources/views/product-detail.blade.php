@extends('layouts.main')

@section('title', $product->name ?? 'Chi tiết sản phẩm') {{-- Hiển thị tên sản phẩm trên tiêu đề trang --}}

@section('content')
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                {{-- Hiển thị hình ảnh sản phẩm --}}
                <img src="{{ asset($product->image_path ?? './img/default-product.png') }}" alt="{{ $product->name }}" class="img-responsive">
            </div>
            <div class="col-md-6">
                <h2>{{ $product->name }}</h2>
                <p class="product-category">{{ $product->category->name ?? 'Không có danh mục' }}</p> {{-- Giả định category là mối quan hệ --}}
                <h3 class="product-price">{{ number_format($product->price) }} VNĐ
                    @if($product->old_price)
                        <del class="product-old-price">{{ number_format($product->old_price) }} VNĐ</del>
                    @endif
                </h3>
                <p>{{ $product->description }}</p>

                <div class="product-rating">
                    {{-- Ví dụ hiển thị rating --}}
                    @for ($i = 0; $i < $product->rating; $i++)
                        <i class="fa fa-star"></i>
                    @endfor
                    @for ($i = $product->rating; $i < 5; $i++)
                        <i class="fa fa-star-o"></i>
                    @endfor
                </div>

                <div class="add-to-cart">
                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                </div>

                <h4>Mô tả chi tiết</h4>
                <p>{{ $product->long_description }}</p>

                <h4>Thông số kỹ thuật</h4>
                <p>{{ $product->details }}</p>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <h3 class="text-center">Sản phẩm liên quan</h3>
            </div>
            @if($relatedProducts->count() > 0)
                @foreach($relatedProducts as $relatedProduct)
                    <div class="col-md-3 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <img src="{{ asset($relatedProduct->image_path) }}" alt="{{ $relatedProduct->name }}">
                                @if($relatedProduct->is_new)
                                    <div class="product-label">
                                        <span class="new">MỚI</span>
                                    </div>
                                @endif
                                @if($relatedProduct->discount_percentage > 0)
                                    <div class="product-label">
                                        <span class="sale">-{{ $relatedProduct->discount_percentage }}%</span>
                                    </div>
                                @endif
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{ $relatedProduct->category->name ?? 'N/A' }}</p>
                                <h3 class="product-name"><a href="{{ route('products.show', $relatedProduct->slug) }}">{{ $relatedProduct->name }}</a></h3>
                                <h4 class="product-price">{{ number_format($relatedProduct->price) }} VNĐ
                                    @if($relatedProduct->old_price)
                                        <del class="product-old-price">{{ number_format($relatedProduct->old_price) }} VNĐ</del>
                                    @endif
                                </h4>
                                <div class="product-rating">
                                    @for ($i = 0; $i < $relatedProduct->rating; $i++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                    @for ($i = $relatedProduct->rating; $i < 5; $i++)
                                        <i class="fa fa-star-o"></i>
                                    @endfor
                                </div>
                            </div>
                            <div class="add-to-cart">
                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> thêm vào giỏ hàng</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-12 text-center">
                    <p>Không có sản phẩm liên quan.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection