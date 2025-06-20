@extends('layouts.main')
@section('title', 'Giỏ hàng')
@section('content')
<div class="container mt-5">
    <h2 style="font-weight:700;font-size:2rem;margin-bottom:24px;">🛒 Giỏ hàng của bạn</h2>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @php
    $cartItemsByCategory = $cartItems->groupBy(function($item) {
    return $item->product->category->name ?? 'Khác';
    });
    $categoryOrder = ['Laptop', 'Điện thoại', 'Máy ảnh', 'Phụ kiện', 'Khác'];
    // Sắp xếp lại các category theo thứ tự ưu tiên, phần còn lại giữ nguyên
    $orderedCartItemsByCategory = collect($categoryOrder)
    ->filter(function($cat) use ($cartItemsByCategory) { return isset($cartItemsByCategory[$cat]); })
    ->mapWithKeys(function($cat) use ($cartItemsByCategory) { return [$cat => $cartItemsByCategory[$cat]]; })
    ->union($cartItemsByCategory->filter(function($v, $k) use ($categoryOrder) { return !in_array($k, $categoryOrder);
    }));
    @endphp
    @if($cartItems->count() == 0)
    <div class="text-center" style="padding:48px 0;">
        <img src="https://cdn-icons-png.flaticon.com/512/2038/2038854.png" width="120" style="opacity:0.7">
        <p style="font-size:1.2rem;margin-top:16px;">Bạn chưa có sản phẩm nào trong giỏ hàng.</p>
    </div>
    @else
    <div class="row g-4">
        @foreach($orderedCartItemsByCategory as $categoryName => $items)
        <div class="col-12 mb-4">
            <div class="card shadow-lg"
                style="border-radius:22px;overflow:hidden;background:linear-gradient(90deg,#f8fafc 60%,#e3f0ff 100%);border:0;">
                <div class="card-header d-flex align-items-center"
                    style="background:rgba(25,118,210,0.08);border-bottom:0;padding:22px 32px 12px 32px;">
                    <div style="font-size:2rem;margin-right:16px;">
                        @if(str_contains(strtolower($categoryName), 'laptop'))
                        <i class="fa fa-laptop" style="color:#1976d2;"></i>
                        @elseif(str_contains(strtolower($categoryName), 'điện thoại'))
                        <i class="fa fa-mobile" style="color:#43a047;"></i>
                        @elseif(str_contains(strtolower($categoryName), 'máy ảnh'))
                        <i class="fa fa-camera" style="color:#d10024;"></i>
                        @elseif(str_contains(strtolower($categoryName), 'phụ kiện'))
                        <i class="fa fa-headphones" style="color:#ff9800;"></i>
                        @else
                        <i class="fa fa-folder-open" style="color:#607d8b;"></i>
                        @endif
                    </div>
                    <div
                        style="font-weight:800;font-size:1.35rem;color:#1976d2;letter-spacing:0.5px;text-shadow:0 1px 0 #fff;">
                        {{ $categoryName }}
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0" style="min-width:600px;background:transparent;">
                            <thead style="background:#f7f7f7;">
                                <tr>
                                    <th style="width:40px;"><input type="checkbox" class="select-all"></th>
                                    <th style="min-width:220px;">Sản phẩm</th>
                                    <th style="min-width:160px;">Tùy chọn</th>
                                    <th>Giá</th>
                                    <th style="width:120px;">Số lượng</th>
                                    <th>Thành tiền</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                <tr
                                    style="vertical-align:middle;background:rgba(255,255,255,0.95);border-radius:12px;box-shadow:0 2px 8px #f0f0f0;">
                                    <td><input type="checkbox" class="select-item" data-id="{{ $item->id }}"
                                            data-price="{{ $item->product->price * $item->quantity }}" checked></td>
                                    <td>
                                        <a href="{{ route('products.show', $item->product->slug) }}"
                                            style="display:flex;align-items:center;gap:18px;text-decoration:none;color:inherit;">
                                            <img src="{{ asset('storage/' . $item->product->image_path) }}" width="74"
                                                height="74"
                                                style="object-fit:cover;border-radius:16px;border:2px solid #e3f0ff;box-shadow:0 2px 12px #e3f0ff;">
                                            <div>
                                                <div
                                                    style="font-weight:800;font-size:1.15rem;line-height:1.2;color:#222;margin-bottom:2px;">
                                                    {{ $item->product->name }}
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <div style="display:flex;flex-direction:column;gap:8px;width:220px;">
                                            <span
                                                style="display:flex;align-items:center;gap:6px;font-size:15px;font-weight:600;color:#d10024;background:#fff0f4;border-radius:10px;padding:4px 14px;min-width:200px;min-height:36px;">
                                                <i class="fa fa-cogs" style="font-size:15px;"></i> Cấu hình:
                                                <span
                                                    style="font-weight:700;color:#d10024;margin-left:4px;">{{ $item->configuration ?? '-' }}</span>
                                            </span>
                                            <span
                                                style="display:flex;align-items:center;gap:6px;font-size:15px;font-weight:600;color:#1976d2;background:#e3f0ff;border-radius:10px;padding:4px 14px;min-width:200px;min-height:36px;">
                                                <i class="fa fa-paint-brush" style="font-size:15px;"></i> Màu:
                                                <span
                                                    style="font-weight:700;color:#1976d2;margin-left:4px;">{{ $item->color ?? '-' }}</span>
                                            </span>
                                            <span
                                                style="display:flex;align-items:center;gap:6px;font-size:15px;font-weight:600;color:#0097a7;background:#e0f7fa;border-radius:10px;padding:4px 14px;min-width:200px;min-height:36px;">
                                                <i class="fa fa-arrows-h" style="font-size:15px;"></i> Kích thước:
                                                <span
                                                    style="font-weight:700;color:#0097a7;margin-left:4px;">{{ $item->size ?? '-' }}</span>
                                            </span>
                                            <span
                                                style="display:flex;align-items:center;gap:6px;font-size:15px;font-weight:600;color:#f57c00;background:#fff3e0;border-radius:10px;padding:4px 14px;min-width:200px;min-height:36px;">
                                                <i class="fa fa-hdd-o" style="font-size:15px;"></i> Dung lượng:
                                                <span
                                                    style="font-weight:700;color:#f57c00;margin-left:4px;">{{ $item->storage ?? '-' }}</span>
                                            </span>
                                        </div>
                                    </td>
                                    <td style="font-weight:800;color:#d10024;font-size:1.1rem;">
                                        {{ number_format($item->product->price) }} VNĐ
                                    </td>
                                    <td>
                                        <form class="cart-update-form d-flex align-items-center"
                                            action="{{ route('cart.update', $item->id) }}" method="post"
                                            style="gap:6px;">
                                            @csrf
                                            @method('PUT')
                                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1"
                                                style="width:56px;border-radius:10px;border:1.5px solid #e3f0ff;padding:6px 10px;font-size:15px;">
                                            <button type="submit" class="btn btn-sm btn-primary"
                                                style="border-radius:10px;font-size:14px;font-weight:600;padding:6px 16px;background:linear-gradient(90deg,#1976d2 60%,#43a047 100%);color:#fff;border:none;box-shadow:0 2px 8px #e3f0ff;">Cập
                                                nhật</button>
                                        </form>
                                    </td>
                                    <td style="font-weight:800;font-size:1.1rem;">
                                        {{ number_format($item->product->price * $item->quantity) }} VNĐ
                                    </td>
                                    <td>
                                        <form class="cart-remove-form" action="{{ route('cart.remove', $item->id) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                style="border-radius:10px;font-size:14px;font-weight:600;padding:6px 16px;background:linear-gradient(90deg,#d10024 60%,#ff9800 100%);color:#fff;border:none;box-shadow:0 2px 8px #ffe0b2;">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @if($cartItems->count() > 0)
    <div class="row mt-4 justify-content-end">
        <div class="col-md-6 col-lg-5">
            <div class="card p-4 shadow-lg" style="border-radius:18px;">
                <h5 class="mb-3" style="font-weight:700;">Thông tin thanh toán</h5>
                <div class="d-flex justify-content-between mb-2">
                    <span>Tạm tính:</span>
                    <span id="selected-subtotal" style="font-weight:600;">0 VNĐ</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Phí vận chuyển:</span>
                    <span style="color:#43a047;font-weight:600;">Miễn phí</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between mb-3">
                    <strong style="font-size:1.2rem;">Tổng cộng:</strong>
                    <strong style="color:#d10024;font-size:1.3rem;" id="selected-total">0 VNĐ</strong>
                </div>
                <form id="checkout-form" action="{{ route('checkout') }}" method="get"
                    onsubmit="return submitCheckoutForm();">
                    @csrf
                    <input type="hidden" name="cart_items" id="cart_items_input">
                    <input type="hidden" name="total_amount" id="total_input">
                    <button type="submit" class="btn btn-danger w-100"
                        style="border-radius:24px;font-size:1.1rem;font-weight:600;padding:12px 0;">Tiến hành đặt
                        hàng</button>
                </form>
                <input type="hidden" id="selected-total-value" value="0">
            </div>
        </div>
    </div>
    @endif
    @endif
</div>
<script>
function formatVND(num) {
    return num.toLocaleString('vi-VN') + ' VNĐ';
}

function updateSelectedTotal() {
    let total = 0;
    document.querySelectorAll('.select-item:checked').forEach(function(el) {
        let price = parseInt(el.getAttribute('data-price'));
        if (!isNaN(price)) total += price;
    });
    document.getElementById('selected-subtotal').textContent = formatVND(total);
    document.getElementById('selected-total').textContent = formatVND(total);
    document.getElementById('selected-total-value').value = total;
}

function submitCheckoutForm() {
    // Lấy id các sản phẩm đã tick
    let ids = Array.from(document.querySelectorAll('.select-item:checked')).map(el => el.getAttribute('data-id'));
    let total = document.getElementById('selected-total-value').value;
    if (ids.length === 0) {
        alert('Vui lòng chọn ít nhất một sản phẩm để thanh toán!');
        return false;
    }
    document.getElementById('cart_items_input').value = ids.join(',');
    document.getElementById('total_input').value = total;
    return true;
}
// Sử dụng DOMContentLoaded để đảm bảo script luôn chạy
window.addEventListener('DOMContentLoaded', function() {
    // Chọn tất cả trong từng bảng
    document.querySelectorAll('.select-all').forEach(function(selectAll) {
        selectAll.addEventListener('change', function() {
            let table = selectAll.closest('table');
            table.querySelectorAll('.select-item').forEach(function(item) {
                item.checked = selectAll.checked;
            });
            updateSelectedTotal();
        });
    });
    // Tick chọn từng sản phẩm
    document.querySelectorAll('.select-item').forEach(function(item) {
        item.addEventListener('change', function() {
            updateSelectedTotal();
            let table = item.closest('table');
            let all = table.querySelectorAll('.select-item').length === table.querySelectorAll(
                '.select-item:checked').length;
            table.querySelector('.select-all').checked = all;
        });
    });
    updateSelectedTotal();
});
</script>
@endsection