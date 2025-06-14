@extends('layouts.main')
@section('title', 'Danh sách yêu thích')
@section('content')
<div class="container" style="min-height:400px;">
    <h2 class="my-4" style="font-weight:800;font-size:2.2rem;text-align:center;letter-spacing:-1px;">Danh sách sản phẩm
        yêu thích</h2>
    @if($products->isEmpty())
    <div class="alert alert-info"
        style="max-width:480px;margin:40px auto 0 auto;text-align:center;font-size:1.1rem;border-radius:16px;box-shadow:0 2px 12px #f3f3f3;">
        Bạn chưa có sản phẩm nào trong danh sách yêu thích.</div>
    @else
    <div class="row" style="gap:32px;justify-content:center;">
        @foreach($products as $product)
        <div class="col-lg-3 col-md-4 col-10 mb-4 wishlist-item"
            style="max-width:320px;min-width:260px;flex:1 1 260px;">
            <div class="product"
                style="position:relative;border-radius:20px;box-shadow:0 4px 24px #e3e3e3;background:#fff;overflow:hidden;min-height:410px;display:flex;flex-direction:column;justify-content:space-between;height:100%;transition:box-shadow .2s;">
                <div class="wishlist-product-link-area" style="display:block;cursor:pointer;position:relative;"
                    onclick="window.location='{{ route('products.show', $product->slug) }}'">
                    <div class="product-img"
                        style="padding:28px 28px 0 28px;text-align:center;background:#f8fafc;min-height:180px;display:flex;align-items:center;justify-content:center;">
                        <img src="{{ $product->image_path ? asset('storage/'.$product->image_path) : asset('img/default-product.png') }}"
                            alt="{{ $product->name }}"
                            style="max-width:100%;max-height:170px;border-radius:14px;box-shadow:0 2px 8px #f0f0f0;object-fit:contain;background:#f8fafc;">
                    </div>
                    <div class="product-body" style="padding:20px 28px 0 28px;">
                        <p class="product-category"
                            style="font-size:14px;color:#888;font-weight:600;margin-bottom:6px;text-transform:uppercase;letter-spacing:1px;">
                            {{ $product->category->name ?? 'N/A' }}
                        </p>
                        <h3 class="product-name"
                            style="font-size:1.15rem;font-weight:800;line-height:1.3;margin-bottom:10px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                            {{ $product->name }}
                        </h3>
                        <h4 class="product-price"
                            style="font-size:1.25rem;color:#d10024;font-weight:900;margin-bottom:8px;">
                            {{ number_format($product->price) }} VNĐ
                        </h4>
                    </div>
                    <button class="remove-from-wishlist-btn" data-product-id="{{ $product->id }}" title="Xoá khỏi yêu thích"
                        style="position:absolute;top:10px;right:10px;background:#fff;border:2px solid #d10024;color:#d10024;border-radius:50%;width:36px;height:36px;display:flex;align-items:center;justify-content:center;font-size:1.2rem;cursor:pointer;z-index:10;transition:background .2s, color .2s;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $(document).on('click', '.remove-from-wishlist-btn', function(e) {
            e.preventDefault();
            e.stopPropagation();
            var $btn = $(this);
            var productId = $btn.data('product-id');
            if (!productId) return;
            $btn.prop('disabled', true);
            $.ajax({
                url: '/wishlist/remove',
                type: 'POST',
                data: {
                    product_id: productId
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(res) {
                    if (res.success) {
                        $btn.closest('.wishlist-item').fadeOut(300, function() {
                            $(this).remove();
                        });
                    }
                },
                complete: function() {
                    $btn.prop('disabled', false);
                }
            });
        });
    });
</script>
@endsection