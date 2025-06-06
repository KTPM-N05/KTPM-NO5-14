@extends('layouts.main')

@section('title', 'home')

@section('content')
<div class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop01.png" alt="Bộ sưu tập máy tính xách tay">
							</div>
							<div class="shop-body">
								<h3>Bộ sưu tập<br>Máy tính xách tay</h3>
<<<<<<< HEAD
								<a href="#" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
=======
								<a href="{{route('laptop')}}" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
>>>>>>> 3f0c0263bbe65bf7560769edd502045988e2964c
							</div>
						</div>
					</div>
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop03.png" alt="Bộ sưu tập phụ kiện">
							</div>
							<div class="shop-body">
								<h3>Bộ sưu tập<br>Phụ kiện</h3>
<<<<<<< HEAD
								<a href="#" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
=======
								<a href="{{route('product')}}" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
>>>>>>> 3f0c0263bbe65bf7560769edd502045988e2964c
							</div>
						</div>
					</div>
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop02.png" alt="Bộ sưu tập máy ảnh">
							</div>
							<div class="shop-body">
								<h3>Bộ sưu tập<br>Máy ảnh</h3>
<<<<<<< HEAD
								<a href="#" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
=======
								<a href="{{route('camera')}}" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
>>>>>>> 3f0c0263bbe65bf7560769edd502045988e2964c
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
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab1">Máy tính xách tay</a></li>
									<li><a data-toggle="tab" href="#tab1">Điện thoại thông minh</a></li>
									<li><a data-toggle="tab" href="#tab1">Máy ảnh</a></li>
									<li><a data-toggle="tab" href="#tab1">Phụ kiện</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<div class="product">
											<div class="product-img">
												<img src="./img/product01.png" alt="Tên sản phẩm">
												<div class="product-label">
													<span class="sale">-30%</span>
													<span class="new">MỚI</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Danh mục</p>
												<h3 class="product-name"><a href="{{ route('product') }}">tên sản phẩm ở đây</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
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
										<div class="product">
											<div class="product-img">
												<img src="./img/product02.png" alt="Tên sản phẩm">
												<div class="product-label">
													<span class="new">MỚI</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Danh mục</p>
												<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
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
										<div class="product">
											<div class="product-img">
												<img src="./img/product03.png" alt="Tên sản phẩm">
												<div class="product-label">
													<span class="sale">-30%</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Danh mục</p>
												<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
												<div class="product-rating">
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
										<div class="product">
											<div class="product-img">
												<img src="./img/product04.png" alt="Tên sản phẩm">
											</div>
											<div class="product-body">
												<p class="product-category">Danh mục</p>
												<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
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
										<div class="product">
											<div class="product-img">
												<img src="./img/product05.png" alt="Tên sản phẩm">
											</div>
											<div class="product-body">
												<p class="product-category">Danh mục</p>
												<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
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
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								</div>
						</div>
					</div>
					</div>
				</div>
			</div>
		<div id="hot-deal" class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>02</h3>
										<span>Ngày</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Giờ</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Phút</span>
									</div>
								</li>
								<li>
									<div>
										<h3>60</h3>
										<span>Giây</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">ưu đãi hấp dẫn tuần này</h2>
							<p>Bộ sưu tập mới Giảm giá đến 50%</p>
							<a class="primary-btn cta-btn" href="#">Mua ngay</a>
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
							<h3 class="title">Sản phẩm bán chạy</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab2">Máy tính xách tay</a></li>
									<li><a data-toggle="tab" href="#tab2">Điện thoại thông minh</a></li>
									<li><a data-toggle="tab" href="#tab2">Máy ảnh</a></li>
									<li><a data-toggle="tab" href="#tab2">Phụ kiện</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
										<div class="product">
											<div class="product-img">
												<img src="./img/product06.png" alt="Tên sản phẩm">
												<div class="product-label">
													<span class="sale">-30%</span>
													<span class="new">MỚI</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Danh mục</p>
												<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
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
										<div class="product">
											<div class="product-img">
												<img src="./img/product07.png" alt="Tên sản phẩm">
												<div class="product-label">
													<span class="new">MỚI</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Danh mục</p>
												<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
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
										<div class="product">
											<div class="product-img">
												<img src="./img/product08.png" alt="Tên sản phẩm">
												<div class="product-label">
													<span class="sale">-30%</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Danh mục</p>
												<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
												<div class="product-rating">
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
										<div class="product">
											<div class="product-img">
												<img src="./img/product09.png" alt="Tên sản phẩm">
											</div>
											<div class="product-body">
												<p class="product-category">Danh mục</p>
												<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
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
										<div class="product">
											<div class="product-img">
												<img src="./img/product01.png" alt="Tên sản phẩm">
											</div>
											<div class="product-body">
												<p class="product-category">Danh mục</p>
												<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
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
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
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

						<div class="products-widget-slick" data-nav="#slick-nav-3">
							<div>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product07.png" alt="Tên sản phẩm">
									</div>
									<div class="product-body">
										<p class="product-category">Danh mục</p>
										<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product08.png" alt="Tên sản phẩm">
									</div>
									<div class="product-body">
										<p class="product-category">Danh mục</p>
										<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product09.png" alt="Tên sản phẩm">
									</div>
									<div class="product-body">
										<p class="product-category">Danh mục</p>
										<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								</div>

							<div>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product01.png" alt="Tên sản phẩm">
									</div>
									<div class="product-body">
										<p class="product-category">Danh mục</p>
										<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product02.png" alt="Tên sản phẩm">
									</div>
									<div class="product-body">
										<p class="product-category">Danh mục</p>
										<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product03.png" alt="Tên sản phẩm">
									</div>
									<div class="product-body">
										<p class="product-category">Danh mục</p>
										<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								</div>
						</div>
					</div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Sản phẩm bán chạy</h4>
							<div class="section-nav">
								<div id="slick-nav-4" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-4">
							<div>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product04.png" alt="Tên sản phẩm">
									</div>
									<div class="product-body">
										<p class="product-category">Danh mục</p>
										<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product05.png" alt="Tên sản phẩm">
									</div>
									<div class="product-body">
										<p class="product-category">Danh mục</p>
										<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product06.png" alt="Tên sản phẩm">
									</div>
									<div class="product-body">
										<p class="product-category">Danh mục</p>
										<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								</div>

							<div>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product07.png" alt="Tên sản phẩm">
									</div>
									<div class="product-body">
										<p class="product-category">Danh mục</p>
										<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product08.png" alt="Tên sản phẩm">
									</div>
									<div class="product-body">
										<p class="product-category">Danh mục</p>
										<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product09.png" alt="Tên sản phẩm">
									</div>
									<div class="product-body">
										<p class="product-category">Danh mục</p>
										<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								</div>
						</div>
					</div>

					<div class="clearfix visible-sm visible-xs"></div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Sản phẩm bán chạy</h4>
							<div class="section-nav">
								<div id="slick-nav-5" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-5">
							<div>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product01.png" alt="Tên sản phẩm">
									</div>
									<div class="product-body">
										<p class="product-category">Danh mục</p>
										<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product02.png" alt="Tên sản phẩm">
									</div>
									<div class="product-body">
										<p class="product-category">Danh mục</p>
										<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
							</div>
                        </div>
                    </div>
             </div>
         </div> 
        </div>
</div>
									
@endsection
