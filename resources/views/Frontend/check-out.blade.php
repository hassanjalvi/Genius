<!doctype html>
<html lang="en">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .error-message {
            margin-top: 5px;
        }
        </style>

<style>
    @keyframes fadeout {
        to { opacity: 0; transform: translateY(-20px); visibility: hidden; }
    }
    .toast-message {
        animation: fadeout 1s ease-in-out 9s forwards;
    }
    </style>
<head>
	<meta charset="UTF-8">
	<title>Check Out Page</title>


	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/fontawesome-all.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/meanmenu.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/video.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/lightbox.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/progess.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">

	<link rel="stylesheet"  href="{{asset('assets/css/colors/switch.css')}}">
	<link href="{{asset('assets/css/colors/color-2.css')}}" rel="alternate stylesheet" type="text/css" title="color-2">
	<link href="{{asset('assets/css/colors/color-3.css')}}" rel="alternate stylesheet" type="text/css" title="color-3">
	<link href="{{asset('assets/css/colors/color-4.css')}}" rel="alternate stylesheet" type="text/css" title="color-4">
	<link href="{{asset('assets/css/colors/color-5.css')}}" rel="alternate stylesheet" type="text/css" title="color-5">
	<link href="{{asset('assets/css/colors/color-6.css')}}" rel="alternate stylesheet" type="text/css" title="color-6">
	<link href="{{asset('assets/css/colors/color-7.css')}}" rel="alternate stylesheet" type="text/css" title="color-7">
	<link href="{{asset('assets/css/colors/color-8.css')}}" rel="alternate stylesheet" type="text/css" title="color-8">
	<link href="{{asset('assets/css/colors/color-9.css')}}" rel="alternate stylesheet" type="text/css" title="color-9">

</head>

<body>

	<div id="preloader"></div>

			<div id="switch-color" class="color-switcher">
		<div class="open"><i class="fas fa-cog fa-spin"></i></div>
		<h4>COLOR OPTION</h4>
		<ul>
			<li><a class="color-2" onclick="setActiveStyleSheet('color-2'); return true;" href="#!"><i class="fas fa-circle"></i></a> </li>
			<li><a class="color-3" onclick="setActiveStyleSheet('color-3'); return true;" href="#!"><i class="fas fa-circle"></i></a> </li>
			<li><a class="color-4" onclick="setActiveStyleSheet('color-4'); return true;" href="#!"><i class="fas fa-circle"></i></a> </li>
			<li><a class="color-5" onclick="setActiveStyleSheet('color-5'); return true;" href="#!"><i class="fas fa-circle"></i></a> </li>
			<li><a class="color-6" onclick="setActiveStyleSheet('color-6'); return true;" href="#!"><i class="fas fa-circle"></i></a> </li>
			<li><a class="color-7" onclick="setActiveStyleSheet('color-7'); return true;" href="#!"><i class="fas fa-circle"></i></a> </li>
			<li><a class="color-8" onclick="setActiveStyleSheet('color-8'); return true;" href="#!"><i class="fas fa-circle"></i></a> </li>
			<li><a class="color-9" onclick="setActiveStyleSheet('color-9'); return true;" href="#!"><i class="fas fa-circle"></i></a> </li>
		</ul>
		<button class="switcher-light">WIDE </button>
		<button class="switcher-dark">BOX </button>
		<a class="rtl-v" href="RTL_Genius/index.html">RTL </a>
	</div>



	<!-- Start of Header section
		============================================= -->
		<header>
			<div id="main-menu"  class="main-menu-container">
				<div  class="main-menu">
					<div class="container">
						<div class="navbar-default">
							<div class="navbar-header float-left">
								<a class="navbar-brand text-uppercase" href="#"><img src="assets/img/logo/logo.png" alt="logo"></a>
							</div><!-- /.navbar-header -->

							<div class="select-lang">
								<select>
									<option value="9" selected="">ENG</option>
									<option value="10">BAN</option>
									<option value="11">ARB</option>
									<option value="12">FRN</option>
								</select>
							</div>
							<div class="cart-search float-right ul-li">
								<ul>
									<li><a href="#"><i class="fas fa-shopping-bag"></i></a></li>
									<li>
										<button type="button" class="toggle-overlay search-btn">
											<i class="fas fa-search"></i>
										</button>
										<div class="search-body">
											<div class="search-form">
												<form action="#">
													<input class="search-input" type="search" placeholder="Search Here">
													<div class="outer-close toggle-overlay">
														<button type="button" class="search-close">
															<i class="fas fa-times"></i>
														</button>
													</div>
												</form>
											</div>
										</div>
									</li>
								</ul>
							</div>
							<div class="log-in float-right">
								<a  data-toggle="modal" data-target="#myModal" href="#">log in</a>
								<!-- The Modal -->
								<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">

											<!-- Modal Header -->
											<div class="modal-header backgroud-style">
												<div class="gradient-bg"></div>
												<div class="popup-logo">
													<img src="assets/img/logo/p-logo.jpg" alt="">
												</div>
												<div class="popup-text text-center">
													<h2> <span>Login</span> Your Account.</h2>
													<p>Login to our website, or <span>REGISTER</span></p>
												</div>
											</div>

											<!-- Modal body -->
											<div class="modal-body">
												<div class="facebook-login">
													<a href="#">
														<div class="log-in-icon">
															<i class="fab fa-facebook-f"></i>
														</div>
														<div class="log-in-text text-center">
															Login with Facebook
														</div>
													</a>
												</div>
												<div class="alt-text text-center"><a href="#">OR SIGN IN</a> </div>
												<form class="contact_form" action="#" method="POST" enctype="multipart/form-data">
													<div class="contact-info">
														<input class="name" name="Email" type="email" placeholder="Your@email.com*">
													</div>
													<div class="contact-info">
														<input class="pass" name="name" type="password" placeholder="Your password*">
													</div>
													<div class="nws-button text-center white text-capitalize">
														<button type="submit" value="Submit">LOg in Now</button>
													</div>
												</form>
												<div class="log-in-footer text-center">
													<p>* Denotes mandatory field.</p>
													<p>** At least one telephone number is required.</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Collect the nav links, forms, and other content for toggling -->
							<nav class="navbar-menu float-right">
								<div class="nav-menu ul-li">
									<ul>
										<li class="menu-item-has-children ul-li-block">
											<a href="#">Home</a>
											<ul class="sub-menu">
												<li><a href="index-1.html">Home 1</a></li>
												<li><a href="index-2.html">Home 2</a></li>
												<li><a href="index-3.html">Home 3</a></li>
												<li><a href="index-4.html">Home 4</a></li>
											</ul>
										</li>
										<li><a href="about.html">About Us</a></li>
										<li><a href="shop.html">shop</a></li>
										<li><a href="contact.html">Contact Us</a></li>
										<li class="menu-item-has-children ul-li-block">
											<a href="#!">Pages</a>
											<ul class="sub-menu">
												<li><a href="teacher.html">Teacher</a></li>
												<li><a href="teacher-details.html">Teacher Details</a></li>
												<li><a href="blog.html">Blog</a></li>
												<li><a href="blog-single.html">Blog Single</a></li>
												<li><a href="course.html">Course</a></li>
												<li><a href="course-details.html">Course Details</a></li>
												<li><a href="faq.html">FAQ</a></li>
												<li><a href="check-out.html">Check Out</a></li>
											</ul>
										</li>
									</ul>
								</div>
							</nav>

							<div class="mobile-menu">
								<div class="logo"><a href="index-1.html"><img src="assets/img/logo/logo.png" alt="Logo"></a></div>
								<nav>
									<ul>
										<li><a href="index-1.html">Home</a>
										</li>
										<li><a href="about.html">About</a></li>
										<li><a href="blog.html">Blog</a>
											<ul>
												<li><a href="blog.html">Blog</a></li>
												<li><a href="blog-single.html">Blog sinlge</a></li>
											</ul>
										</li>
										<li><a href="shop.html">Shop</a>
										</li>
										<li><a href="contact.html">Contact</a></li>
										<li><a href="#">Pages</a>
											<ul>
												<li><a href="course.html">Course</a></li>
												<li><a href="course-details.html">course sinlge</a></li>
												<li><a href="teacher.html">teacher</a></li>
												<li><a href="teacher-details.html">teacher details</a></li>
												<li><a href="faq.html">FAQ</a></li>
												<li><a href="check-out.html">Check Out</a></li>
											</ul>
										</li>
									</ul>
								</nav>

							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
 	<!-- Start of Header section
 		============================================= -->


	<!-- Start of breadcrumb section
		============================================= -->
		{{-- <section id="breadcrumb" class="breadcrumb-section relative-position backgroud-style">
			<div class="blakish-overlay"></div>
			<div class="container">
				<div class="page-breadcrumb-content text-center">
					<div class="page-breadcrumb-title">
						<h2 class="breadcrumb-head black bold">Your <span>Payment Method.</span></h2>
					</div>
					<div class="page-breadcrumb-item ul-li">
						<ul class="breadcrumb text-uppercase black">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Payment</li>
						</ul>
					</div>
				</div>
			</div>
		</section> --}}
	<!-- End of breadcrumb section
		============================================= -->


	<!-- Start of Checkout content
		============================================= -->
		<section id="checkout" class="checkout-section">
			<div class="container">
				<div class="section-title mb45 headline text-center">
					<span class="subtitle text-uppercase">YOUR SHOPPING CART</span>
					<h2>Complete<span> Your Purchases.</span></h2>
				</div>
				<div class="checkout-content">
					<div class="row">
						<div class="col-md-9">
							<div class="order-item mb65 course-page-section">
								<div class="section-title-2  headline text-left">
									<h2>Order <span>Item.</span></h2>
								</div>

								<div class="course-list-view table-responsive">
									<table class="table">

										<thead>
											<tr class="list-head">
												<th>COURSE NAME</th>
												<th>COURSE Duration</th>
												<th>Payment Plan</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<div class="course-list-img-text">
														<div class="course-list-img">
															<img src="assets/img/course/cl-1.jpg" alt="">
														</div>
														<div class="course-list-text">
															<h3><a href="#">{{$course->name ?? ""}}</a></h3>
															<div class="course-meta">
																<span class="course-category bold-font"><a href="#">${{$course->courseFee->price}}</a></span>

																{{-- <div class="course-rate ul-li">
																	<ul>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																	</ul>
																</div> --}}
															</div>
														</div>
													</div>
												</td>
                                                <td>{{$course->courseFee->course_duration ?? ""}}</td>
                                                <td>{{$course->courseFee->payment_plan ?? ""}}</td>


												{{-- <td>
													<div class="course-type-list">
														<span>Graphic Design &amp; 3D</span>
													</div>
												</td>
												<td>6-06-2018</td>
												<td class="dlt-price relative-position">
													3 Months
													<div class="check-dlt">
														<a href="#"><i class="fas fa-times"></i></a>
													</div>
												</td> --}}
											</tr>

										</tbody>
									</table>
								</div>
							</div>

							<div class="order-payment">
								<div class="section-title-2  headline text-left">
									<h2>Order <span>Payment.</span></h2>
								</div>
								<div class="payment-method">
									<div class="payment-method-header">
										<div class="row">
											<div class="col-md-6">
												<div class="method-header-text">
													<div class="checkbox">
														<label>
															{{-- <input type="checkbox" value="" > --}}
															<span class="cr"><i class="cr-icon fa fa-check"></i></span>
															Credit or Debit Card
														</label>
													</div>
												</div>
											</div>

											<div class="col-md-6">
												<div class="payment-img float-right">
													<img src="assets/img/banner/p-1.jpg" alt="">
												</div>
											</div>
										</div>
									</div>

									<div class="check-out-form">


										{{-- <form action="{{ route('payment',$course->id) }}" method="post"> --}}
                                            <form
                                            role="form"
                                            action="{{route('stripe.post')}}"
                                            method="post"
                                            class="require-validation"
                                            data-cc-on-file="false"
                                            data-stripe-publishable-key="{{ config('services.stripe.public') }}"
                                            id="payment-form"
                                          >
                                            @csrf
                                            @if ($errors->any())
                                            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-lg">
                                              <ul class="list-disc pl-5">
                                                @foreach ($errors->all() as $error)
                                                  <li>{{ $error }}</li>
                                                @endforeach
                                              </ul>
                                            </div>
                                          @endif

                                          @if (session('success'))
                                            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-lg">
                                              {{ session('success') }}
                                            </div>
                                          @endif
											<div class="payment-info">
												<label for="card_number" for="card_number"  class=" control-label">Name On Card :</label>
												<input type="text" class="form-control" name="firstname_booking" id="name_on_card"    placeholder="Enter the name of your card" required>
											</div>
											<div class="payment-info">
												<label class=" control-label">Card Number :</label>
												<input type="text" class="form-control"    name="card_number"  id="card_number" placeholder="Enter Your Number" >
											</div>
											<div class="payment-info input-2">
												<label for="expiration_month" class=" control-label">Expired Date :</label>
												<input type="text" class="form-control"     name="expire_month" id="expiration_month" placeholder="MM" >
												<input type="text" class="form-control"  name="expire_year" id="expiration_year" placeholder="YY" >
											</div>
											<div class="payment-info input-2">
												<label for="cvc" class=" control-label">CVV :</label>
												<input type="text" class="form-control"  name="ccv"  id="cvc" placeholder="CVV" >
											</div>
                                            <input type="hidden" class="form-control"  name="price" placeholder="Enter Your Number" value="{{ $course->courseFee->price }}">
                                            <input type="hidden" class="form-control"  name="course_id" placeholder="Enter Your Number" value="{{ $course->id }}">

											{{-- <div class="payment-info">
												<label class=" control-label">Country :</label>
												<input type="text" class="form-control"  name="name" placeholder="Select Your Country" value="">
											</div> --}}

										<div class="method-header-text">
											{{-- <div class="checkbox save-credit">
												<label>
													<input type="checkbox" value="" >
													<span class="cr text-uppercase bold-font"><i class="cr-icon fa fa-check"></i></span>
													SAVE YOUR CREDIT CARD FOR FUTURE PURCHASES
													<span class="sub-text">Your payment information is stored securely. <b>Learn More</b></span>
												</label>
											</div> --}}
										</div>
									</div>
								</div>

								{{-- <div class="payment-method-header">
									<div class="row">
										<div class="col-md-6">
											<div class="method-header-text">
												<div class="checkbox">
													<label>
														<input type="checkbox" value="" >
														<span class="cr"><i class="cr-icon fa fa-check"></i></span>
														Paypal
													</label>
												</div>
											</div>
										</div> --}}

										<div class="col-md-6">
											<div class="payment-img float-right">
												<img src="assets/img/banner/p-2.jpg" alt="">
											</div>
										</div>
									</div>
								</div>

								<div class="genius-btn mt25 gradient-bg text-center text-uppercase bold-font">
                                    <button type="submit" class="w-100 text-white border-0 bg-transparent">
                                        Pay Now <i class="fas fa-caret-right"></i>
                                    </button>
                                </div>
                            </form>


								<div class="terms-text pb45 mt25">
									<p>By confirming this purchase, I agree to the <b>Term of Use, Refund Policy</b>  and <b>Privacy Policy</b></p>
								</div>
							</div>
						</div>

						{{-- <div class="col-md-3">
							<div class="side-bar-widget first-widget">
								<h2 class="widget-title text-capitalize">Order <span>Detail.</span></h2>
								<div class="sub-total-item">
									<span class="sub-total-title">SUBTOTAL</span>
									<div class="purchase-list mt15 ul-li-block">
										<ul>
											<li>No Discount <span>$59.99</span></li>
											<li>No Discount <span>$59.99</span></li>
											<li>Discount 15% <span>$59.99</span></li>
											<li>No Discount <span>$59.99</span></li>
										</ul>
										<div class="in-total">TOTAL <span>$759.99</span></div>
									</div>
								</div>
							</div>
							<div class="side-bar-widget">
								<h2 class="widget-title text-capitalize"><span>Featured</span> Course.</h2>
								<div class="featured-course">
									<div class="best-course-pic-text relative-position">
										<div class="best-course-pic relative-position">
											<img src="assets/img/blog/fb-1.jpg" alt="">
											<div class="trend-badge-2 text-center text-uppercase">
												<i class="fas fa-bolt"></i>
												<span>Trending</span>
											</div>
										</div>


										<div class="best-course-text">
											<div class="course-title mb20 headline relative-position">
												<h3><a href="#">Fully Responsive Web Design &amp; Development.</a></h3>
											</div>
											<div class="course-meta">
												<span class="course-category"><a href="#">Web Design</a></span>
												<span class="course-author"><a href="#">250 Students</a></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> --}}
					</div>
				</div>
			</div>
		</section>
	<!-- End  of Checkout content
		============================================= -->



	<!-- Start of footer section
		============================================= -->
		<footer>
			<section id="footer-area" class="footer-area-section">
				<div class="container">
					<div class="footer-content pb10">
						<div class="row">
							<div class="col-md-3">
								<div class="footer-widget">
									<div class="footer-logo mb35">
										<img src="assets/img/logo/f-logo.png" alt="">
									</div>
									<div class="footer-about-text">
										<p>We take our mission of increasing global access to quality education seriously. We connect learners to the best universities and institutions from around the world.</p>
										<p>Lorem ipsum dolor sit amet we take our mission of increasing global access to quality education seriously. </p>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="footer-widget">
									<div class="footer-menu ul-li-block">
										<h2 class="widget-title">Useful Links</h2>
										<ul>
											<li><a href="#"><i class="fas fa-caret-right"></i>About Us</a></li>
											<li><a href="#"><i class="fas fa-caret-right"></i>Graphic Design</a></li>
											<li><a href="#"><i class="fas fa-caret-right"></i>Mobile Apps</a></li>
											<li><a href="#"><i class="fas fa-caret-right"></i>Responsive Website</a></li>
											<li><a href="#"><i class="fas fa-caret-right"></i>Graphic Design</a></li>
											<li><a href="#"><i class="fas fa-caret-right"></i>Mobile Apps</a></li>
										</ul>
									</div>
								</div>
								<div class="footer-menu ul-li-block">
									<h2 class="widget-title">Account Info</h2>
									<ul>
										<li><a href="#"><i class="fas fa-caret-right"></i>Setting Account</a></li>
										<li><a href="#"><i class="fas fa-caret-right"></i>Login & Register</a></li>
										<li><a href="#"><i class="fas fa-caret-right"></i>Contact Us</a></li>
										<li><a href="#"><i class="fas fa-caret-right"></i>Graphic Design</a></li>
										<li><a href="#"><i class="fas fa-caret-right"></i>Mobile Apps</a></li>
										<li><a href="#"><i class="fas fa-caret-right"></i>Responsive Website</a></li>
									</ul>
								</div>
							</div>
							<div class="col-md-3">
								<div class="footer-widget">
									<h2 class="widget-title">Photo Gallery</h2>
									<div class="photo-list ul-li">
										<ul>
											<li>
												<img src="assets/img/gallery/g-1.jpg" alt="">
												<div class="blakish-overlay"></div>
												<div class="pop-up-icon">
													<a href="assets/img/gallery/g-1.jpg" data-lightbox="roadtrip">
														<i class="fas fa-search"></i>
													</a>
												</div>
											</li>
											<li>
												<img src="assets/img/gallery/g-2.jpg" alt="">
												<div class="blakish-overlay"></div>
												<div class="pop-up-icon">
													<a href="assets/img/gallery/g-2.jpg" data-lightbox="roadtrip">
														<i class="fas fa-search"></i>
													</a>
												</div>
											</li>
											<li>
												<img src="assets/img/gallery/g-3.jpg" alt="">
												<div class="blakish-overlay"></div>
												<div class="pop-up-icon">
													<a href="assets/img/gallery/g-3.jpg" data-lightbox="roadtrip">	<i class="fas fa-search"></i></a>
												</div>
											</li>
											<li>
												<img src="assets/img/gallery/g-4.jpg" alt="">
												<div class="blakish-overlay"></div>
												<div class="pop-up-icon">
													<a href="assets/img/gallery/g-4.jpg" data-lightbox="roadtrip">	<i class="fas fa-search"></i></a>
												</div>
											</li>
											<li>
												<img src="assets/img/gallery/g-5.jpg" alt="">
												<div class="blakish-overlay"></div>
												<div class="pop-up-icon">
													<a href="assets/img/gallery/g-5.jpg" data-lightbox="roadtrip">	<i class="fas fa-search"></i></a>
												</div>
											</li>
											<li>
												<img src="assets/img/gallery/g-6.jpg" alt="">
												<div class="blakish-overlay"></div>
												<div class="pop-up-icon">
													<a href="assets/img/gallery/g-6.jpg" data-lightbox="roadtrip">	<i class="fas fa-search"></i></a>
												</div>

											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /footer-widget-content -->
					<div class="footer-social-subscribe mb65">
						<div class="row">
							<div class="col-md-3">
								<div class="footer-social ul-li">
									<h2 class="widget-title">Social Network</h2>
									<ul>
										<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
										<li><a href="#"><i class="fab fa-twitter"></i></a></li>
										<li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="col-md-9">
								<div class="subscribe-form">
									<h2 class="widget-title">Subscribe Newsletter</h2>

									<div class="subs-form relative-position">
										<form action="#" method="post">
											<input class="course" name="course" type="email" placeholder="Email Address.">
											<div class="nws-button text-center  gradient-bg text-uppercase">
												<button type="submit" value="Submit">Subscribe now</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="copy-right-menu">
						<div class="row">
							<div class="col-md-6">
								<div class="copy-right-text">
									<p>© 2018 - Designed & Developed by <a href="https://jthemes.com/" title="Best Premium WordPress, HTML Template Store"> Jthemes Studio</a>. All rights reserved</p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="copy-right-menu-item float-right ul-li">
									<ul>
										<li><a href="#">License</a></li>
										<li><a href="#">Privacy & Policy</a></li>
										<li><a href="#">Term Of Service</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</footer>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const form = document.getElementById('payment-form'); // Now targeting the form correctly
                const cardNumberInput = document.getElementById('card_number');
                const expirationMonthInput = document.getElementById('expiration_month');
                const expirationYearInput = document.getElementById('expiration_year');
                const cvcInput = document.getElementById('cvc');

                // Card Number Formatting
                cardNumberInput.addEventListener('input', function(e) {
                    let value = e.target.value.replace(/\D/g, '');
                    if (value.length > 16) {
                        value = value.slice(0, 16);
                    }
                    value = value.replace(/(\d{4})(?=\d)/g, '$1 ');
                    e.target.value = value;
                });

                // Expiration Month Input
                expirationMonthInput.addEventListener('input', function(e) {
                    let value = e.target.value.replace(/\D/g, '');
                    if (value.length > 2) {
                        value = value.slice(0, 2);
                    }
                    e.target.value = value;
                });

                // Expiration Year Input
                expirationYearInput.addEventListener('input', function(e) {
                    let value = e.target.value.replace(/\D/g, '');
                    if (value.length > 4) {
                        value = value.slice(0, 4);
                    }
                    e.target.value = value;
                });

                // CVC Input
                cvcInput.addEventListener('input', function(e) {
                    let value = e.target.value.replace(/\D/g, '');
                    if (value.length > 3) {
                        value = value.slice(0, 3);
                    }
                    e.target.value = value;
                });

                // Submit Validation
                form.addEventListener('submit', function(e) {
                    let isValid = true;
                    clearErrors();

                    const cardNumber = cardNumberInput.value.replace(/\s/g, '');
                    if (cardNumber.length !== 16) {
                        showError(cardNumberInput, 'Card number must be 16 digits.');
                        isValid = false;
                    }

                    const month = parseInt(expirationMonthInput.value, 10);
                    if (isNaN(month) || month < 1 || month > 12) {
                        showError(expirationMonthInput, 'Month must be between 01 and 12.');
                        isValid = false;
                    }

                    const year = expirationYearInput.value;
                    if (year.length !== 4) {
                        showError(expirationYearInput, 'Year must be 4 digits (e.g., 2024).');
                        isValid = false;
                    }

                    const cvc = cvcInput.value;
                    if (cvc.length !== 3) {
                        showError(cvcInput, 'CVC must be exactly 3 digits.');
                        isValid = false;
                    }

                    if (!isValid) {
                        e.preventDefault(); // Stop form submit if errors
                    }
                });

                function showError(input, message) {
                    const error = document.createElement('div');
                    error.className = 'error-message';
                    error.style.color = 'red';
                    error.style.fontSize = '13px';
                    error.textContent = message;
                    input.parentNode.appendChild(error);
                }

                function clearErrors() {
                    const errors = document.querySelectorAll('.error-message');
                    errors.forEach(error => error.remove());
                }
            });
            </script>


	<!-- End of footer section
		============================================= -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
        {{-- <script src="https://js.stripe.com/v3/"></script> --}}


        <script type="text/javascript">

        $(function() {

            /*------------------------------------------
            --------------------------------------------
            Stripe Payment Code
            --------------------------------------------
            --------------------------------------------*/

            var $form = $(".require-validation");

            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                                 'input[type=text]', 'input[type=file]',
                                 'textarea'].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
                $errorMessage.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                  var $input = $(el);
                  if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                  }
                });

                console.log($form.data('stripe-publishable-key'));
                console.log($form.data('stripe-publishable-key'));
                console.log($form.data('stripe-publishable-key'));
                console.log("jbjj");
                console.log({{ env('STRIPE_KEY') }});
                console.log($form.data('stripe-publishable-key'));

                if (!$form.data('cc-on-file')) {
                  e.preventDefault();
                  Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                  Stripe.createToken({
                    // number: $('.card-number').val(),
                    // cvc: $('.card-cvc').val(),
                    // exp_month: $('.card-expiry-month').val(),
                    // exp_year: $('.card-expiry-year').val()
                    number: $('#card_number').val(),
    cvc: $('#cvc').val(),
    exp_month: $('#expiration_month').val(),
    exp_year: $('#expiration_year').val()
                  }, stripeResponseHandler);
                }

            });

            /*------------------------------------------
            --------------------------------------------
            Stripe Response Handler
            --------------------------------------------
            --------------------------------------------*/
            // function stripeResponseHandler(status, response) {
            //     if (response.error) {
            //         $('.error')
            //             .removeClass('hide')
            //             .find('.alert')
            //             .text(response.error.message);
            //     } else {
            //         /* token contains id, last4, and card type */
            //         var token = response['id'];

            //         $form.find('input[type=text]').empty();
            //         $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            //         $form.get(0).submit();
            //     }
            // }

            function stripeResponseHandler(status, response) {
    if (response.error) {
        showToast(response.error.message, 'error');
    } else {
        /* token contains id, last4, and card type */
        var token = response['id'];

        $form.find('input[type=text]').empty();
        $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
        $form.get(0).submit();
    }
}

// Function to show toast messages
function showToast(message, type) {
    // Remove existing toast if any
    let existingToast = document.getElementById('dynamic-toast');
    if (existingToast) {
        existingToast.remove();
    }

    // Create new toast
    const toast = document.createElement('div');
    toast.id = 'dynamic-toast';
    toast.className = 'toast-message';
    toast.style.backgroundColor = (type === 'error') ? '#f44336' : '#4CAF50'; // red for error, green for success
    toast.style.color = 'white';
    toast.style.position = 'fixed';
    toast.style.top = '20px';
    toast.style.right = '20px';
    toast.style.padding = '15px 25px';
    toast.style.borderRadius = '8px';
    toast.style.boxShadow = '0px 0px 10px rgba(0,0,0,0.3)';
    toast.style.zIndex = '9999';
    toast.style.fontWeight = 'bold';
    toast.style.animation = 'fadeout 1s ease-in-out 9s forwards';
    toast.textContent = message;

    document.body.appendChild(toast);

    // Remove toast after 10 seconds
    setTimeout(function() {
        toast.remove();
    }, 10000);
}


        });
        </script>


		<!-- For Js Library -->
		<script src="{{asset('assets/js/jquery-2.1.4.min.js')}}"></script>
		<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('assets/js/popper.min.js')}}"></script>
		<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
		<script src="{{asset('assets/js/jarallax.js')}}"></script>
		<script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
		<script src="{{asset('assets/js/lightbox.js')}}"></script>
		<script src="{{asset('assets/js/jquery.meanmenu.js')}}"></script>
		<script src="{{asset('assets/js/scrollreveal.min.js')}}"></script>
		<script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
		<script src="{{asset('assets/js/waypoints.min.js')}}"></script>
		<script src="{{asset('assets/js/jquery-ui.js')}}"></script>
		<script src="{{asset('assets/js/gmap3.min.js')}}"></script>
		<script src="{{asset('assets/js/switch.js')}}"></script>
		<script src="http://maps.google.com/maps/api/js?key=AIzaSyC61_QVqt9LAhwFdlQmsNwi5aUJy9B2SyA"></script>

		<script src="{{asset('assets/js/script.js')}}"></script>
	</body>


</html>
