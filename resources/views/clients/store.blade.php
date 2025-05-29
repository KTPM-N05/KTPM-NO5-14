@extends('layouts.main')

@section('title', 'store')
@section('content')
<div id="breadcrumb" class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="index.html">Trang chủ</a></li>
							<li><a href="store.html">Tất cả danh mục</a></li>
							<li><a href="#">Phụ kiện</a></li>
							<li class="active">Tai nghe (227 sản phẩm)</li>
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

								<div class="input-checkbox">
									<input type="checkbox" id="category-1">
									<label for="category-1">
										<span></span>
										Máy tính xách tay
										<small>(120)</small>
									</label>
								</div>

								<div class="input-checkbox">
									<input type="checkbox" id="category-2">
									<label for="category-2">
										<span></span>
										Điện thoại thông minh
										<small>(740)</small>
									</label>
								</div>

								<div class="input-checkbox">
									<input type="checkbox" id="category-3">
									<label for="category-3">
										<span></span>
										Máy ảnh
										<small>(145)</small>
									</label>
								</div>

								<div class="input-checkbox">
									<input type="checkbox" id="category-4" checked>
									<label for="category-4">
										<span></span>
										Phụ kiện
										<small>(578)</small>
									</label>
								</div>

								<div class="input-checkbox">
									<input type="checkbox" id="category-5">
									<label for="category-5">
										<span></span>
										Tai nghe
										<small>(227)</small>
									</label>
								</div>

								<div class="input-checkbox">
									<input type="checkbox" id="category-6">
									<label for="category-6">
										<span></span>
										Chuột & Bàn phím
										<small>(85)</small>
									</label>
								</div>
							</div>
						</div>
						<div class="aside">
							<h3 class="aside-title">Giá</h3>
							<div class="price-filter">
								<div id="price-slider"></div>
								<div class="input-number price-min">
									<input id="price-min" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
								<span>-</span>
								<div class="input-number price-max">
									<input id="price-max" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
						</div>
						<div class="aside">
							<h3 class="aside-title">Thương hiệu</h3>
							<div class="checkbox-filter">
								<div class="input-checkbox">
									<input type="checkbox" id="brand-1">
									<label for="brand-1">
										<span></span>
										SAMSUNG
										<small>(57)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-2">
									<label for="brand-2">
										<span></span>
										LG
										<small>(12)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-3">
									<label for="brand-3">
										<span></span>
										SONY
										<small>(75)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-4">
									<label for="brand-4">
										<span></span>
										APPLE
										<small>(60)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-5">
									<label for="brand-5">
										<span></span>
										LOGITECH
										<small>(45)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-6">
									<label for="brand-6">
										<span></span>
										DELL
										<small>(30)</small>
									</label>
								</div>
							</div>
						</div>
						<div class="aside">
							<h3 class="aside-title">Sản phẩm bán chạy</h3>
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product01.png" alt="Laptop UltraBook ZenMax">
								</div>
								<div class="product-body">
									<p class="product-category">Laptop</p>
									<h3 class="product-name"><a href="product.html">Laptop UltraBook ZenMax</a></h3>
									<h4 class="product-price">24.500.000 VNĐ <del class="product-old-price">27.000.000 VNĐ</del></h4>
								</div>
							</div>

							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product02.png" alt="Smartphone Galaxy Pro">
								</div>
								<div class="product-body">
									<p class="product-category">Điện thoại</p>
									<h3 class="product-name"><a href="product.html">Smartphone Galaxy Pro</a></h3>
									<h4 class="product-price">21.750.000 VNĐ <del class="product-old-price">22.500.000 VNĐ</del></h4>
								</div>
							</div>

							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product03.png" alt="Máy ảnh Mirrorless Alpha">
								</div>
								<div class="product-body">
									<p class="product-category">Máy ảnh</p>
									<h3 class="product-name"><a href="product.html">Máy ảnh Mirrorless Alpha</a></h3>
									<h4 class="product-price">35.000.000 VNĐ <del class="product-old-price">46.500.000 VNĐ</del></h4>
								</div>
							</div>
						</div>
						</div>
					<div id="store" class="col-md-9">
						<div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									Sắp xếp theo:
									<select class="input-select">
										<option value="0">Phổ biến</option>
										<option value="1">Giá thấp đến cao</option>
										<option value="2">Giá cao đến thấp</option>
                                        <option value="3">Mới nhất</option>
									</select>
								</label>

								<label>
									Hiển thị:
									<select class="input-select">
										<option value="0">12</option>
										<option value="1">24</option>
                                        <option value="2">48</option>
									</select>
								</label>
							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>
						</div>
						<div class="row">
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img src="./img/product01.png" alt="Laptop UltraBook ZenMax">
										<div class="product-label">
											<span class="sale">-10%</span>
											<span class="new">MỚI</span>
										</div>
									</div>
									<div class="product-body">
										<p class="product-category">Laptop</p>
										<h3 class="product-name"><a href="product.html">Laptop UltraBook ZenMax</a></h3>
										<h4 class="product-price">24.500.000 VNĐ <del class="product-old-price">27.000.000 VNĐ</del></h4>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>
										</div>
										<div class="product-btns">
											<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">thêm vào danh sách yêu thích</span></button>
											<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">thêm vào so sánh</span></button>
											<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">xem nhanh</span></button>
										</div>
									</div>
									<div class="add-to-cart">
										<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> thêm vào giỏ hàng</button>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img src="./img/product02.png" alt="Smartphone Galaxy Pro">
										<div class="product-label">
											<span class="new">MỚI</span>
										</div>
									</div>
									<div class="product-body">
										<p class="product-category">Điện thoại</p>
										<h3 class="product-name"><a href="product.html">Smartphone Galaxy Pro</a></h3>
										<h4 class="product-price">21.750.000 VNĐ <del class="product-old-price">22.500.000 VNĐ</del></h4>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										<div class="product-btns">
											<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">thêm vào danh sách yêu thích</span></button>
											<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">thêm vào so sánh</span></button>
											<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">xem nhanh</span></button>
										</div>
									</div>
									<div class="add-to-cart">
										<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> thêm vào giỏ hàng</button>
									</div>
								</div>
							</div>
							<div class="clearfix visible-sm visible-xs"></div>

							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img src="./img/product03.png" alt="Máy ảnh Mirrorless Alpha">
                                        <div class="product-label">
											<span class="sale">-25%</span>
										</div>
									</div>
									<div class="product-body">
										<p class="product-category">Máy ảnh</p>
										<h3 class="product-name"><a href="product.html">Máy ảnh Mirrorless Alpha</a></h3>
										<h4 class="product-price">35.000.000 VNĐ <del class="product-old-price">46.500.000 VNĐ</del></h4>
										<div class="product-rating">
                                            <i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
										</div>
										<div class="product-btns">
											<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">thêm vào danh sách yêu thích</span></button>
											<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">thêm vào so sánh</span></button>
											<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">xem nhanh</span></button>
										</div>
									</div>
									<div class="add-to-cart">
										<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> thêm vào giỏ hàng</button>
									</div>
								</div>
							</div>
							<div class="clearfix visible-lg visible-md"></div>

							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img src="./img/product04.png" alt="Tai nghe Không dây BassMax">
									</div>
									<div class="product-body">
										<p class="product-category">Phụ kiện</p>
										<h3 class="product-name"><a href="product.html">Tai nghe Không dây BassMax</a></h3>
										<h4 class="product-price">3.200.000 VNĐ <del class="product-old-price">3.500.000 VNĐ</del></h4>
										<div class="product-rating">
                                            <i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										<div class="product-btns">
											<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">thêm vào danh sách yêu thích</span></button>
											<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">thêm vào so sánh</span></button>
											<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">xem nhanh</span></button>
										</div>
									</div>
									<div class="add-to-cart">
										<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> thêm vào giỏ hàng</button>
									</div>
								</div>
							</div>
							<div class="clearfix visible-sm visible-xs"></div>

							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img src="./img/product05.png" alt="Đồng hồ Thông minh FitLife">
									</div>
									<div class="product-body">
										<p class="product-category">Phụ kiện</p>
										<h3 class="product-name"><a href="product.html">Đồng hồ Thông minh FitLife</a></h3>
										<h4 class="product-price">7.800.000 VNĐ <del class="product-old-price">8.200.000 VNĐ</del></h4>
										<div class="product-rating">
                                            <i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-half-o"></i>
											<i class="fa fa-star-o"></i>
										</div>
										<div class="product-btns">
											<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">thêm vào danh sách yêu thích</span></button>
											<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">thêm vào so sánh</span></button>
											<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">xem nhanh</span></button>
										</div>
									</div>
									<div class="add-to-cart">
										<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> thêm vào giỏ hàng</button>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img src="./img/product06.png" alt="Laptop Gaming Predator">
                                        <div class="product-label">
											<span class="sale">-15%</span>
											<span class="new">HOT</span>
										</div>
									</div>
									<div class="product-body">
										<p class="product-category">Laptop</p>
										<h3 class="product-name"><a href="product.html">Laptop Gaming Predator</a></h3>
										<h4 class="product-price">32.300.000 VNĐ <del class="product-old-price">38.000.000 VNĐ</del></h4>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-half-o"></i>
										</div>
										<div class="product-btns">
											<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">thêm vào danh sách yêu thích</span></button>
											<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">thêm vào so sánh</span></button>
											<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">xem nhanh</span></button>
										</div>
									</div>
									<div class="add-to-cart">
										<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> thêm vào giỏ hàng</button>
									</div>
								</div>
							</div>
							<div class="clearfix visible-lg visible-md visible-sm visible-xs"></div>

							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img src="./img/product07.png" alt="Smartphone PixelMaster">
                                        <div class="product-label">
											<span class="new">MỚI</span>
										</div>
									</div>
									<div class="product-body">
										<p class="product-category">Điện thoại</p>
										<h3 class="product-name"><a href="product.html">Smartphone PixelMaster</a></h3>
										<h4 class="product-price">18.500.000 VNĐ <del class="product-old-price">19.000.000 VNĐ</del></h4>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>
										</div>
										<div class="product-btns">
											<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">thêm vào danh sách yêu thích</span></button>
											<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">thêm vào so sánh</span></button>
											<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">xem nhanh</span></button>
										</div>
									</div>
									<div class="add-to-cart">
										<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> thêm vào giỏ hàng</button>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img src="./img/product08.png" alt="Máy ảnh DSLR ProShot">
                                        <div class="product-label">
											<span class="sale">-20%</span>
										</div>
									</div>
									<div class="product-body">
										<p class="product-category">Máy ảnh</p>
										<h3 class="product-name"><a href="product.html">Máy ảnh DSLR ProShot</a></h3>
										<h4 class="product-price">28.000.000 VNĐ <del class="product-old-price">35.000.000 VNĐ</del></h4>
										<div class="product-rating">
                                            <i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										<div class="product-btns">
											<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">thêm vào danh sách yêu thích</span></button>
											<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">thêm vào so sánh</span></button>
											<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">xem nhanh</span></button>
										</div>
									</div>
									<div class="add-to-cart">
										<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> thêm vào giỏ hàng</button>
									</div>
								</div>
							</div>
							<div class="clearfix visible-sm visible-xs"></div>

							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img src="./img/product09.png" alt="Loa Bluetooth SoundWave">
									</div>
									<div class="product-body">
										<p class="product-category">Phụ kiện</p>
										<h3 class="product-name"><a href="product.html">Loa Bluetooth SoundWave</a></h3>
										<h4 class="product-price">2.100.000 VNĐ <del class="product-old-price">2.500.000 VNĐ</del></h4>
										<div class="product-rating">
                                            <i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
										</div>
										<div class="product-btns">
											<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">thêm vào danh sách yêu thích</span></button>
											<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">thêm vào so sánh</span></button>
											<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">xem nhanh</span></button>
										</div>
									</div>
									<div class="add-to-cart">
										<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> thêm vào giỏ hàng</button>
									</div>
								</div>
							</div>
							</div>
						<div class="store-filter clearfix">
							<span class="store-qty">Hiển thị 1-12 / 150 sản phẩm</span>
							<ul class="store-pagination">
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">...</a></li>
                                <li><a href="#">10</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
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
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				</div>
			</div>
@endsection
