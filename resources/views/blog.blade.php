@extends('layouts.app')

@section('title', 'Blog')

@section('content')

	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-01.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								White Shirt Pleat
							</a>

							<span class="header-cart-item-info">
								1 x $19.00
							</span>
						</div>
					</li>

					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-02.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								Converse All Star
							</a>

							<span class="header-cart-item-info">
								1 x $39.00
							</span>
						</div>
					</li>

					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-03.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								Nixon Porter Leather
							</a>

							<span class="header-cart-item-info">
								1 x $17.00
							</span>
						</div>
					</li>
				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: $75.00
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-02.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Uygulamalar
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-62 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12 p-b-80">
					<div class="p-r-45 p-r-0-lg row">
						<!-- item blog -->
						<div class="p-b-63 col-12 col-md-4" >
							<a href="/blog-detail" class="hov-img0 how-pos5-parent">
								<img src="images/mutfakdolabi.jpg" alt="IMG-BLOG" style="height:350px">
							</a>

							<div class="p-t-32">
								<h4 class="p-b-15">
									<a href="/blog-detail" class="ltext-108 cl2 hov-cl1 trans-04">
										Mutfak Dolabı Uygulamaları
									</a>
								</h4>

								<p class="stext-117 cl6">
									Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eget dictum tortor. Donec dictum vitae sapien eu varius
								</p>

								<div class="flex-w flex-sb-m p-t-18">
									<a href="blog-detail.html" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10">
										İncele

										<i class="fa fa-long-arrow-right m-l-9"></i>
									</a>
								</div>
							</div>
						</div>

						<!-- item blog -->
						<div class="p-b-63 col-12 col-md-4">
							<a href="blog-detail.html" class="hov-img0 how-pos5-parent">
								<img src="images/banyodolabi.jpg" alt="IMG-BLOG" style="height:350px">
							</a>

							<div class="p-t-32">
								<h4 class="p-b-15">
									<a href="blog-detail.html" class="ltext-108 cl2 hov-cl1 trans-04">
										Banyo Dolabı Uygulamaları
									</a>
								</h4>

								<p class="stext-117 cl6">
									Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eget dictum tortor. Donec dictum vitae sapien eu varius
								</p>

								<div class="flex-w flex-sb-m p-t-18">
									<a href="blog-detail.html" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10">
										İncele

										<i class="fa fa-long-arrow-right m-l-9"></i>
									</a>
								</div>
							</div>
						</div>

						<!-- item blog -->
						<div class="p-b-63 col-12 col-md-4">
							<a href="blog-detail.html" class="hov-img0 how-pos5-parent">
								<img src="images/banyodolabi.jpg" alt="IMG-BLOG" style="height:350px">
							</a>

							<div class="p-t-32">
								<h4 class="p-b-15">
									<a href="blog-detail.html" class="ltext-108 cl2 hov-cl1 trans-04">
										Banyo Dolabı Uygulamaları
									</a>
								</h4>

								<p class="stext-117 cl6">
									Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eget dictum tortor. Donec dictum vitae sapien eu varius
								</p>

								<div class="flex-w flex-sb-m p-t-18">
									<a href="blog-detail.html" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10">
										İncele

										<i class="fa fa-long-arrow-right m-l-9"></i>
									</a>
								</div>
							</div>
						</div>
						<!-- item blog -->
						<div class="p-b-63 col-12 col-md-4">
							<a href="blog-detail.html" class="hov-img0 how-pos5-parent">
								<img src="images/banyodolabi.jpg" alt="IMG-BLOG" style="height:350px">
							</a>

							<div class="p-t-32">
								<h4 class="p-b-15">
									<a href="blog-detail.html" class="ltext-108 cl2 hov-cl1 trans-04">
										Banyo Dolabı Uygulamaları
									</a>
								</h4>

								<p class="stext-117 cl6">
									Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eget dictum tortor. Donec dictum vitae sapien eu varius
								</p>

								<div class="flex-w flex-sb-m p-t-18">
									<a href="blog-detail.html" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10">
										İncele

										<i class="fa fa-long-arrow-right m-l-9"></i>
									</a>
								</div>
							</div>
						</div>

						<!-- Pagination -->
						<div class="flex-l-m flex-w w-full p-t-10 m-lr--7">
							<a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1">
								1
							</a>

							<a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7">
								2
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
	
		
@endsection


