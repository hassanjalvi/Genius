<!doctype html>
<html lang="en">


<head>
	<meta charset="UTF-8">
	<title>Course Page</title>

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
		<section id="breadcrumb" class="breadcrumb-section relative-position backgroud-style">
			<div class="blakish-overlay"></div>
			<div class="container">
				<div class="page-breadcrumb-content text-center">
					<div class="page-breadcrumb-title">
						<h2 class="breadcrumb-head black bold">Genius <span>Courses</span></h2>
					</div>
					<div class="page-breadcrumb-item ul-li">
						<ul class="breadcrumb text-uppercase black">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Courses</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
	<!-- End of breadcrumb section
		============================================= -->


	<!-- Start of course section
		============================================= -->
		<section id="course-page" class="course-page-section">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<div class="short-filter-tab">
							<div class="shorting-filter  float-left">
								<span><b>View</b> By</span>
								<select>
									<option value="9" selected="">9 Course</option>
									<option value="10">7 Course</option>
									<option value="11">2 Course</option>
									<option value="12">0 Course</option>
								</select>
							</div>
							<div class="tab-button blog-button ul-li text-center float-right">
								<ul class="product-tab">
									<li class="active" rel="tab1"><i class="fas fa-th"></i></li>
									<li rel="tab2"> <i class="fas fa-list"></i></li>
								</ul>
							</div>
							<div class="shorting-filter float-right">
								<span><b>Sort</b> By</span>
								<select>
									<option value="9" selected="">Popularity</option>
									<option value="10">Most Read</option>
									<option value="11">Most View</option>
									<option value="12">Most Shared</option>
								</select>
							</div>
						</div>

						<div class="genius-post-item">
							<div class="tab-container">
								<div id="tab1" class="tab-content-1 pt35">
									<div class="best-course-area best-course-v2">
										<div class="row">
											<div class="col-md-4">
												<div class="best-course-pic-text relative-position">
													<div class="best-course-pic relative-position">
														<img src="assets/img/course/bc-1.jpg" alt="">
														<div class="trend-badge-2 text-center text-uppercase">
															<i class="fas fa-bolt"></i>
															<span>Trending</span>
														</div>
														<div class="course-price text-center gradient-bg">
															<span>$99.00</span>
														</div>
														<div class="course-rate ul-li">
															<ul>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
															</ul>
														</div>
														<div class="course-details-btn">
															<a href="#">COURSE DETAIL <i class="fas fa-arrow-right"></i></a>
														</div>
														<div class="blakish-overlay"></div>
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
											<!-- /course -->

											<div class="col-md-4">
												<div class="best-course-pic-text relative-position">
													<div class="best-course-pic relative-position">
														<img src="assets/img/course/bc-2.jpg" alt="">
														<div class="course-price text-center gradient-bg">
															<span>$99.00</span>
														</div>
														<div class="course-rate ul-li">
															<ul>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
															</ul>
														</div>
														<div class="course-details-btn">
															<a href="#">COURSE DETAIL <i class="fas fa-arrow-right"></i></a>
														</div>
														<div class="blakish-overlay"></div>
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
											<!-- /course -->

											<div class="col-md-4">
												<div class="best-course-pic-text relative-position">
													<div class="best-course-pic relative-position">
														<img src="assets/img/course/bc-3.jpg" alt="">
														<div class="course-price text-center gradient-bg">
															<span>$99.00</span>
														</div>
														<div class="course-rate ul-li">
															<ul>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
															</ul>
														</div>
														<div class="course-details-btn">
															<a href="#">COURSE DETAIL <i class="fas fa-arrow-right"></i></a>
														</div>
														<div class="blakish-overlay"></div>
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
											<!-- /course -->

											<div class="col-md-4">
												<div class="best-course-pic-text relative-position">
													<div class="best-course-pic relative-position">
														<img src="assets/img/course/bc-4.jpg" alt="">
														<div class="course-price text-center gradient-bg">
															<span>$99.00</span>
														</div>
														<div class="course-rate ul-li">
															<ul>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
															</ul>
														</div>
														<div class="course-details-btn">
															<a href="#">COURSE DETAIL <i class="fas fa-arrow-right"></i></a>
														</div>
														<div class="blakish-overlay"></div>
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
											<!-- /course -->

											<div class="col-md-4">
												<div class="best-course-pic-text relative-position">
													<div class="best-course-pic relative-position">
														<img src="assets/img/course/bc-5.jpg" alt="">
														<div class="course-price text-center gradient-bg">
															<span>$99.00</span>
														</div>
														<div class="course-rate ul-li">
															<ul>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
															</ul>
														</div>
														<div class="course-details-btn">
															<a href="#">COURSE DETAIL <i class="fas fa-arrow-right"></i></a>
														</div>
														<div class="blakish-overlay"></div>
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
											<!-- /course -->

											<div class="col-md-4">
												<div class="best-course-pic-text relative-position">
													<div class="best-course-pic relative-position">
														<img src="assets/img/course/bc-6.jpg" alt="">
														<div class="trend-badge-2 text-center text-uppercase">
															<i class="fas fa-bolt"></i>
															<span>Trending</span>
														</div>
														<div class="course-price text-center gradient-bg">
															<span>$99.00</span>
														</div>
														<div class="course-rate ul-li">
															<ul>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
															</ul>
														</div>
														<div class="course-details-btn">
															<a href="#">COURSE DETAIL <i class="fas fa-arrow-right"></i></a>
														</div>
														<div class="blakish-overlay"></div>
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
											<!-- /course -->

											<div class="col-md-4">
												<div class="best-course-pic-text relative-position">
													<div class="best-course-pic relative-position">
														<img src="assets/img/course/bc-7.jpg" alt="">
														<div class="course-price text-center gradient-bg">
															<span>$99.00</span>
														</div>
														<div class="course-rate ul-li">
															<ul>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
															</ul>
														</div>
														<div class="course-details-btn">
															<a href="#">COURSE DETAIL <i class="fas fa-arrow-right"></i></a>
														</div>
														<div class="blakish-overlay"></div>
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
											<!-- /course -->

											<div class="col-md-4">
												<div class="best-course-pic-text relative-position">
													<div class="best-course-pic relative-position">
														<img src="assets/img/course/bc-8.jpg" alt="">
														<div class="course-price text-center gradient-bg">
															<span>$99.00</span>
														</div>
														<div class="course-rate ul-li">
															<ul>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
															</ul>
														</div>
														<div class="course-details-btn">
															<a href="#">COURSE DETAIL <i class="fas fa-arrow-right"></i></a>
														</div>
														<div class="blakish-overlay"></div>
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
											<!-- /course -->

											<div class="col-md-4">
												<div class="best-course-pic-text relative-position">
													<div class="best-course-pic relative-position">
														<img src="assets/img/course/bc-4.jpg" alt="">
														<div class="course-price text-center gradient-bg">
															<span>$99.00</span>
														</div>
														<div class="course-rate ul-li">
															<ul>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
															</ul>
														</div>
														<div class="course-details-btn">
															<a href="#">COURSE DETAIL <i class="fas fa-arrow-right"></i></a>
														</div>
														<div class="blakish-overlay"></div>
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
											<!-- /course -->
										</div>
									</div>
								</div><!-- /tab-1 -->

								<div id="tab2" class="tab-content-1">
									<div class="course-list-view">
										<table>
											<tr class="list-head">
												<th>COURSE NAME</th>
												<th>COURSE TYPE</th>
												<th>STARTS</th>
												<th>LENGTH</th>
											</tr>
											<tr>
												<td>
													<div class="course-list-img-text">
														<div class="course-list-img">
															<img src="assets/img/course/cl-1.jpg" alt="">
														</div>
														<div class="course-list-text">
															<h3><a href="#">Fully Responsive Web Design & Development.</a></h3>
															<div class="course-meta">
																<span class="course-category bold-font"><a href="#">$120.25</a></span>
																<div class="course-rate ul-li">
																	<ul>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
												</td>
												<td>
													<div class="course-type-list">
														<span>Graphic Design & 3D</span>
													</div>
												</td>
												<td>6-06-2018</td>
												<td>3 Months</td>
											</tr>
											<tr>
												<td>
													<div class="course-list-img-text">
														<div class="course-list-img">
															<img src="assets/img/course/cl-2.jpg" alt="">
														</div>
														<div class="course-list-text">
															<h3><a href="#">Fully Responsive Web Design & Development.</a></h3>
															<div class="course-meta">
																<span class="course-category bold-font"><a href="#">$120.25</a></span>
																<div class="course-rate ul-li">
																	<ul>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
												</td>
												<td>
													<div class="course-type-list">
														<span>Graphic Design & 3D</span>
													</div>
												</td>
												<td>6-06-2018</td>
												<td>3 Months</td>
											</tr>
											<tr>
												<td>
													<div class="course-list-img-text">
														<div class="course-list-img">
															<img src="assets/img/course/cl-3.jpg" alt="">
														</div>
														<div class="course-list-text">
															<h3><a href="#">Fully Responsive Web Design & Development.</a></h3>
															<div class="course-meta">
																<span class="course-category bold-font"><a href="#">$120.25</a></span>
																<div class="course-rate ul-li">
																	<ul>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
												</td>
												<td>
													<div class="course-type-list">
														<span>Graphic Design & 3D</span>
													</div>
												</td>
												<td>6-06-2018</td>
												<td>3 Months</td>
											</tr>
											<tr>
												<td>
													<div class="course-list-img-text">
														<div class="course-list-img">
															<img src="assets/img/course/cl-4.jpg" alt="">
														</div>
														<div class="course-list-text">
															<h3><a href="#">Fully Responsive Web Design & Development.</a></h3>
															<div class="course-meta">
																<span class="course-category bold-font"><a href="#">$120.25</a></span>
																<div class="course-rate ul-li">
																	<ul>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
												</td>
												<td>
													<div class="course-type-list">
														<span>Graphic Design & 3D</span>
													</div>
												</td>
												<td>6-06-2018</td>
												<td>3 Months</td>
											</tr>
											<tr>
												<td>
													<div class="course-list-img-text">
														<div class="course-list-img">
															<img src="assets/img/course/cl-5.jpg" alt="">
														</div>
														<div class="course-list-text">
															<h3><a href="#">Fully Responsive Web Design & Development.</a></h3>
															<div class="course-meta">
																<span class="course-category bold-font"><a href="#">$120.25</a></span>
																<div class="course-rate ul-li">
																	<ul>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
												</td>
												<td>
													<div class="course-type-list">
														<span>Graphic Design & 3D</span>
													</div>
												</td>
												<td>6-06-2018</td>
												<td>3 Months</td>
											</tr>
											<tr>
												<td>
													<div class="course-list-img-text">
														<div class="course-list-img">
															<img src="assets/img/course/cl-1.jpg" alt="">
														</div>
														<div class="course-list-text">
															<h3><a href="#">Fully Responsive Web Design & Development.</a></h3>
															<div class="course-meta">
																<span class="course-category bold-font"><a href="#">$120.25</a></span>
																<div class="course-rate ul-li">
																	<ul>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																		<li><i class="fas fa-star"></i></li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
												</td>
												<td>
													<div class="course-type-list">
														<span>Graphic Design & 3D</span>
													</div>
												</td>
												<td>6-06-2018</td>
												<td>3 Months</td>
											</tr>
										</table>
									</div>
								</div><!-- /tab-2 -->
							</div>
						</div>

						<div class="couse-pagination text-center ul-li">
							<ul>
								<li class="pg-text"><a href="#">PREV</a></li>
								<li><a href="#">01</a></li>
								<li><a href="#">02</a></li>
								<li class="active"><a href="#">03</a></li>
								<li><a href="#">04</a></li>
								<li><a href="#">...</a></li>
								<li><a href="#">15</a></li>
								<li class="pg-text"><a href="#">NEXT</a></li>
							</ul>
						</div>
					</div>

					<div class="col-md-3">
						<div class="side-bar">

							<div class="side-bar-widget  first-widget">
								<h2 class="widget-title text-capitalize"><span>Find </span>Your Course.</h2>
								<div class="listing-filter-form pb30">
									<form action="#" method="get">
										<div class="filter-select mb20">
											<label>COURSE TYPE</label>
											<select>
												<option value="9" selected="">All Categories </option>
												<option value="10">Default Listing</option>
												<option value="11">Category Listing</option>
												<option value="12">Orderly Listing</option>
											</select>
										</div>

										<div class="filter-select mb20">
											<label>STUDY LAVEL</label>
											<select>
												<option value="9" selected="">All Locations</option>
												<option value="10">Default Listing</option>
												<option value="11">Category Listing</option>
												<option value="12">Orderly Listing</option>
											</select>
										</div>
										<div class="filter-search mb20">
											<label>FULL TEXT</label>
											<input type="text" class="" placeholder="Looking for?">
										</div>
										<div class="genius-btn gradient-bg text-center text-uppercase ul-li-block bold-font">
											<a href="#">FIND COURSES <i class="fas fa-caret-right"></i></a>
										</div>
									</form>

								</div>
							</div>

							<div class="side-bar-widget">
								<h2 class="widget-title text-capitalize"><span>Recent  </span>News</h2>
								<div class="latest-news-posts">
									<div class="latest-news-area">
										<div class="latest-news-thumbnile relative-position">
											<img src="assets/img/blog/lb-1.jpg" alt="">
											<div class="hover-search">
												<i class="fas fa-search"></i>
											</div>
											<div class="blakish-overlay"></div>
										</div>
										<div class="date-meta">
											<i class="fas fa-calendar-alt"></i> 26 April 2018
										</div>
										<h3 class="latest-title bold-font"><a href="#">Affiliate Marketing A Beginner’s Guide.</a></h3>
									</div>
									<!-- /post -->

									<div class="latest-news-posts">
										<div class="latest-news-area">
											<div class="latest-news-thumbnile relative-position">
												<img src="assets/img/blog/lb-2.jpg" alt="">
												<div class="hover-search">
													<i class="fas fa-search"></i>
												</div>
												<div class="blakish-overlay"></div>
											</div>
											<div class="date-meta">
												<i class="fas fa-calendar-alt"></i> 26 April 2018
											</div>
											<h3 class="latest-title bold-font"><a href="#">No.1 The Best Online Course 2018.</a></h3>
										</div>
										<!-- /post -->
									</div>

									<div class="view-all-btn bold-font">
										<a href="#">View All News <i class="fas fa-chevron-circle-right"></i></a>
									</div>
								</div>
							</div>

							<div class="side-bar-widget">
								<h2 class="widget-title text-capitalize">Popular <span>Tag's.</span></h2>
								<div class="tag-clouds ul-li">
									<ul>
										<li><a href="#">fruits</a></li>
										<li><a href="#">veegetable</a></li>
										<li><a href="#">juices</a></li>
										<li><a href="#">natural food</a></li>
										<li><a href="#">food</a></li>
										<li><a href="#">bread</a></li>
										<li><a href="#">natural</a></li>
										<li><a href="#">healthy</a></li>
									</ul>
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
						</div>
					</div>
				</div>
			</div>
		</section>
	<!-- End of course section
		============================================= -->


		<section id="best-course" class="best-course-section">
			<div class="container">
				<div class="section-title mb45 headline text-center">
					<span class="subtitle text-uppercase">SEARCH OUR COURSES</span>
					<h2>You<span> Recently View.</span></h2>
				</div>
				<div class="best-course-area mb45">
					<div class="row">
						<div class="col-md-3">
							<div class="best-course-pic-text relative-position">
								<div class="best-course-pic relative-position">
									<img src="assets/img/course/bc-1.jpg" alt="">
									<div class="trend-badge-2 text-center text-uppercase">
										<i class="fas fa-bolt"></i>
										<span>Trending</span>
									</div>
									<div class="course-price text-center gradient-bg">
										<span>$99.00</span>
									</div>
									<div class="course-rate ul-li">
										<ul>
											<li><i class="fas fa-star"></i></li>
											<li><i class="fas fa-star"></i></li>
											<li><i class="fas fa-star"></i></li>
											<li><i class="fas fa-star"></i></li>
											<li><i class="fas fa-star"></i></li>
										</ul>
									</div>
									<div class="course-details-btn">
										<a href="#">COURSE DETAIL <i class="fas fa-arrow-right"></i></a>
									</div>
									<div class="blakish-overlay"></div>
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
						<!-- /course -->

						<div class="col-md-3">
							<div class="best-course-pic-text relative-position">
								<div class="best-course-pic relative-position">
									<img src="assets/img/course/bc-2.jpg" alt="">
									<div class="course-price text-center gradient-bg">
										<span>$99.00</span>
									</div>
									<div class="course-rate ul-li">
										<ul>
											<li><i class="fas fa-star"></i></li>
											<li><i class="fas fa-star"></i></li>
											<li><i class="fas fa-star"></i></li>
											<li><i class="fas fa-star"></i></li>
											<li><i class="fas fa-star"></i></li>
										</ul>
									</div>
									<div class="course-details-btn">
										<a href="#">COURSE DETAIL <i class="fas fa-arrow-right"></i></a>
									</div>
									<div class="blakish-overlay"></div>
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
						<!-- /course -->

						<div class="col-md-3">
							<div class="best-course-pic-text relative-position">
								<div class="best-course-pic relative-position">
									<img src="assets/img/course/bc-3.jpg" alt="">
									<div class="course-price text-center gradient-bg">
										<span>$99.00</span>
									</div>
									<div class="course-rate ul-li">
										<ul>
											<li><i class="fas fa-star"></i></li>
											<li><i class="fas fa-star"></i></li>
											<li><i class="fas fa-star"></i></li>
											<li><i class="fas fa-star"></i></li>
											<li><i class="fas fa-star"></i></li>
										</ul>
									</div>
									<div class="course-details-btn">
										<a href="#">COURSE DETAIL <i class="fas fa-arrow-right"></i></a>
									</div>
									<div class="blakish-overlay"></div>
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
						<!-- /course -->

						<div class="col-md-3">
							<div class="best-course-pic-text relative-position">
								<div class="best-course-pic relative-position">
									<img src="assets/img/course/bc-4.jpg" alt="">
									<div class="course-price text-center gradient-bg">
										<span>$99.00</span>
									</div>
									<div class="course-rate ul-li">
										<ul>
											<li><i class="fas fa-star"></i></li>
											<li><i class="fas fa-star"></i></li>
											<li><i class="fas fa-star"></i></li>
											<li><i class="fas fa-star"></i></li>
											<li><i class="fas fa-star"></i></li>
										</ul>
									</div>
									<div class="course-details-btn">
										<a href="#">COURSE DETAIL <i class="fas fa-arrow-right"></i></a>
									</div>
									<div class="blakish-overlay"></div>
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
						<!-- /course -->
					</div>
				</div>
			</div>
		</section>


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
	<!-- End of footer section
		============================================= -->



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