<!doctype html>
<html lang="en">


<head>
	<meta charset="UTF-8">
	<title>Home Page </title>
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
                @if(session('success'))
                <div id="toast-success" class="toast-message">
                    {{ session('success') }}
                </div>

                <style>
                .toast-message {
                    position: fixed;
                    top: 20px;
                    right: 20px;
                    background-color: #4CAF50;
                    color: white;
                    padding: 15px 25px;
                    border-radius: 8px;
                    box-shadow: 0px 0px 10px rgba(0,0,0,0.3);
                    z-index: 9999;
                    font-weight: bold;
                    animation: fadeout 1s ease-in-out 9s forwards;
                }

                @keyframes fadeout {
                    to { opacity: 0; transform: translateY(-20px); visibility: hidden; }
                }
                </style>

                <script>
                    setTimeout(function() {
                        let toast = document.getElementById('toast-success');
                        if (toast) {
                            toast.remove();
                        }
                    }, 10000); // 10 seconds
                </script>
            @endif
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
								{{-- <a  data-toggle="modal" data-target="#myModal" href="#">log in</a> --}}
                                @if (Auth::check())
                                {{-- Logged In: Show "Log out" link --}}
                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Log out
                                </a>

                                {{-- Logout Form (POST request) --}}
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('POST')
                                </form>
                            @else
                                {{-- Not Logged In: Show "Log in" link --}}
                                <a href="{{ route('login.form') }}">Log in</a>
                            @endif
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
											<a href="{{route('Home')}}">Home</a>
											
										</li>
										
                                        @if (Auth::check() && Auth::user()->role === 'user')
                                       <li><a href="{{ route('student.dashboard') }}">Student Dashboard</a></li>
                                        @endif
                                        @if (Auth::check() && Auth::user()->role === 'parent')
                                       <li><a href="{{ route('parent.dashboard') }}">Parent Dashboard</a></li>
                                        @endif
                                        @if (Auth::check() && Auth::user()->role === 'instructor')
                                       <li><a href="{{ route('instructor.dashboard') }}">Instructor Dashboard</a></li>
                                        @endif

										
									</ul>
								</div>
							</nav>

							<div class="mobile-menu">
								<div class="logo"><a href="index-1.html"><img src="assets/img/logo/logo.png" alt="Logo"></a></div>
								<nav>
									<ul>
										<li><a href="{{route('Home')}}">Home</a>
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



 	<!-- Start of slider section
 		============================================= -->
 		<section id="slide" class="slider-section">
 			<div id="slider-item" class="slider-item-details">
 				<div  class="slider-area slider-bg-5 relative-position">
 					<div class="slider-text">
 						<div class="section-title mb20 headline text-left ">
 							<div class="layer-1-1">
 								<span class="subtitle ml42 text-uppercase">EDUCATION & TRAINING ORGANIZATION</span>
 							</div>
 							<div class="layer-1-3">
 								<h2><span>Inventive</span> Solution <br> for <span>Education</span></h2>
 							</div>
 						</div>
 						<div class="layer-1-4">
 							<div class="genius-btn  text-center text-uppercase ul-li-block bold-font">
 								<a href="#">Our Courses <i class="fas fa-caret-right"></i></a>
 							</div>
 						</div>
 					</div>

 				</div>
 				<div class="slider-area slider-bg-2 relative-position">
 					<div class="slider-text">
 						<div class="section-title mb20 headline text-center ">
 							<div class="layer-1-1">
 								<span class="subtitle text-uppercase">EDUCATION & TRAINING ORGANIZATION</span>
 							</div>
 							<div class="layer-1-2">
 								<h2 class="secoud-title"> Browse The <span>Best Courses.</span></h2>
 							</div>
 						</div>
 						<div class="layer-1-3">
 							<div class="search-course mb30 relative-position">
 								<form action="#" method="post">
 									<input class="course" name="course" type="text" placeholder="Type what do you want to learn today?">
 									<div class="nws-button text-center  gradient-bg text-capitalize">
 										<button type="submit" value="Submit">Search Course</button>
 									</div>
 								</form>
 							</div>
 							<div class="layer-1-4">
 								<div class="slider-course-category ul-li text-center">
 									<span class="float-left">BY CATEGORY:</span>
 									<ul>
 										<li>Graphics Design</li>
 										<li>Web Design</li>
 										<li>Mobile Application</li>
 										<li>Enginering</li>
 										<li>Science</li>
 									</ul>
 								</div>
 							</div>
 						</div>
 					</div>
 				</div>
 				<div class="slider-area slider-bg-3 relative-position">
 					<div class="slider-text">
 						<div class="layer-1-2">
 							<div class="coming-countdown ul-li">
 								<ul>
 									<li class="days">
 										<span class="number"></span>
 										<span class>Days</span>
 									</li>

 									<li class="hours">
 										<span class="number"></span>
 										<span class>Hours</span>
 									</li>

 									<li class="minutes">
 										<span class="number"></span>
 										<span class>Minutes</span>
 									</li>

 									<li class="seconds">
 										<span class="number"></span>
 										<span class>Seconds</span>
 									</li>
 								</ul>
 							</div>
 						</div>
 						<div class="section-title mb20 headline text-center ">
 							<div class="layer-1-3">
 								<h2 class="third-slide"> Mobile Application Experiences : <br> <span>Mobile App Design.</span></h2>
 							</div>
 						</div>
 						<div class="layer-1-4">
 							<div class="about-btn text-center">
 								<div class="genius-btn text-center text-uppercase ul-li-block bold-font">
 									<a href="#">About Us <i class="fas fa-caret-right"></i></a>
 								</div>
 							</div>
 						</div>
 					</div>
 				</div>
 				<div class="slider-area slider-bg-4 relative-position">
 					<div class="slider-text">
 						<div class="section-title mb20 headline text-center ">
 							<span class="subtitle text-uppercase">EDUCATION & TRAINING ORGANIZATION</span>
 							<h2 class=""  ><span>Inventive</span> Solution <br> for <span>Education</span></h2>
 						</div>
 					</div>
 				</div>
 			</div>
 		</section>
	<!-- End of slider section
		============================================= -->



	<!-- Start of sponsor section
		============================================= -->
		<div id="sponsor" class="sponsor-section sponsor-2">
			<div class="container">
				<div class="sponsor-item">
					<div class="sponsor-pic text-center">
						<img src="assets/img/sponsor/s-1.jpg" alt="">
					</div>
					<div class="sponsor-pic text-center ">
						<img src="assets/img/sponsor/s-2.jpg" alt="">
					</div>
					<div class="sponsor-pic text-center">
						<img src="assets/img/sponsor/s-3.jpg" alt="">
					</div>
					<div class="sponsor-pic text-center">
						<img src="assets/img/sponsor/s-4.jpg" alt="">
					</div>
					<div class="sponsor-pic text-center">
						<img src="assets/img/sponsor/s-5.jpg" alt="">
					</div>
					<div class="sponsor-pic text-center">
						<img src="assets/img/sponsor/s-6.jpg" alt="">
					</div>
					<div class="sponsor-pic text-center">
						<img src="assets/img/sponsor/s-1.jpg" alt="">
					</div>
					<div class="sponsor-pic text-center">
						<img src="assets/img/sponsor/s-2.jpg" alt="">
					</div>
					<div class="sponsor-pic text-center">
						<img src="assets/img/sponsor/s-3.jpg" alt="">
					</div>
					<div class="sponsor-pic text-center">
						<img src="assets/img/sponsor/s-4.jpg" alt="">
					</div>
					<div class="sponsor-pic text-center">
						<img src="assets/img/sponsor/s-5.jpg" alt="">
					</div>
					<div class="sponsor-pic text-center">
						<img src="assets/img/sponsor/s-6.jpg" alt="">
					</div>
					<div class="sponsor-pic text-center">
						<img src="assets/img/sponsor/s-1.jpg" alt="">
					</div>
					<div class="sponsor-pic text-center">
						<img src="assets/img/sponsor/s-2.jpg" alt="">
					</div>
					<div class="sponsor-pic text-center">
						<img src="assets/img/sponsor/s-3.jpg" alt="">
					</div>
					<div class="sponsor-pic text-center">
						<img src="assets/img/sponsor/s-4.jpg" alt="">
					</div>
					<div class="sponsor-pic text-center">
						<img src="assets/img/sponsor/s-5.jpg" alt="">
					</div>
					<div class="sponsor-pic text-center">
						<img src="assets/img/sponsor/s-6.jpg" alt="">
					</div>
				</div>
			</div>
		</div>
	<!-- End of sponsor section
		============================================= -->


	<!-- Start popular course
		============================================= -->
		<section id="popular-course" class="popular-course-section">
			<div class="container">
				<div class="section-title mb20 headline text-left">
					<span class="subtitle text-uppercase">LEARN NEW SKILLS</span>
					<h2><span>Popular</span> Courses.</h2>
				</div>






				<div id="course-slide-item" class="course-slide">

                    @foreach ($courses as $cou)


					<div class="course-item-pic-text">
                        <div class="course-pic relative-position mb25">
                            @if ($cou->pic)
                                <a href="{{ route('course.details', $cou->id) }}">
                                    <img src="{{ $cou->pic }}" alt="" style="width: 300px; height: 250px;">
                                </a>
                            @else
                                <img src="assets/img/course/c-1.jpg" alt="">
                            @endif
                            <div class="course-price text-center gradient-bg">
                                <span>${{ $cou->courseFee->price ?? "0" }}</span>
                            </div>
                            <div class="course-details-btn">
                                <a href="{{ route('course.details', $cou->id) }}">COURSE DETAIL <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="course-item-text">
                            <div class="course-meta">
                                <span class="course-author bold-font">
                                    <div class="instructor-info" style="display: flex; align-items: center; margin-bottom: 5px;">
                                        @if($cou->instructor->instructor && $cou->instructor->instructor->pic)
                                            <img src="{{ $cou->instructor->instructor->pic ?? '' }}" alt="{{ $cou->instructor->name }}"
                                                 style="width: 30px; height: 30px; border-radius: 50%; margin-right: 10px; object-fit: cover;">
                                        @endif
                                        <a href="{{ route('course.details', $cou->id) }}">{{ $cou->instructor->name ?? "" }}</a>
                                    </div>
                                    @if($cou->instructor->instructor && $cou->instructor->instructor->expertise)
                                        <div class="instructor-expertise" style="font-size: 12px; color: #666;">
                                            {{ $cou->instructor->instructor->expertise }}
                                        </div>
                                    @endif
                                </span>
                            </div>
                            <div class="course-title mt10 headline pb45 relative-position">
                                <h3><a href="{{ route('course.details', $cou->id) }}">{{ $cou->name ?? "" }}</a>
                                    <span class="trend-badge text-uppercase bold-font"><i class="fas fa-bolt"></i> TRENDING</span>
                                </h3>
                            </div>
                        </div>
                    </div>
					<!-- /item -->
                    @endforeach


					<!-- /item -->
				</div>





			</div>
		</section>
	<!-- End popular course
		============================================= -->


	<!-- Start of about us section
		============================================= -->
		<section id="about-us" class="about-us-section home-secound">
			<div class="container">
				<div class="row">
					<div class="col-md-5">
						<div class="about-resigter-form backgroud-style relative-position">
							<div class="register-content">
								<div class="register-fomr-title text-center">
									<h3 class="bold-font"><span></span> Contact Us</h3>
									<p>More Than 122K Online Available Courses</p>
								</div>
								<div class="register-form-area">
									<form class="contact_form" action="{{ route('contact.form') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
										<div class="contact-info">
											<input class="name" name="name" type="text" placeholder="Your Name.">
                                            @error('name')
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror
										</div>
										<div class="contact-info">
											<input class="nbm" name="nbm" type="number" placeholder="Your Number">
                                            @error('nbm')
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror
										</div>
										<div class="contact-info">
											<input class="email" name="email" type="email" placeholder="Email Address.">
                                            @error('email')
            <div class="error-message">{{ $message }}</div>
        @enderror
										</div>
										{{-- <select>
											<option value="9" selected="">Select Course.</option>
											<option value="10">Web Design</option>
											<option value="11">Web Development</option>
											<option value="12">Php Core</option>
										</select> --}}
										{{-- <div class="contact-info">
											<input type="text" id="datepicker" placeholder="Date.">
										</div> --}}
										<textarea name="message" placeholder="Message."></textarea>
                                        @error('message')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror

										<div class="nws-button text-uppercase text-center white text-capitalize">
											<button type="submit" value="Submit">SUBMIT REQUEST </button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="bg-mockup">
							<img src="assets/img/about/abt.jpg" alt="">
						</div>
					</div>
					<!-- /form -->

					<div class="col-md-7">
						<div class="about-us-text">
							<div class="section-title relative-position mb20 headline text-left">
								<span class="subtitle ml42 text-uppercase">SORT ABOUT US</span>
								<h2>We are <span>Genius Course</span>
								work since 1980.</h2>
								<p>We take our mission of increasing global access to quality education seriously. We connect learners to the best universities and institutions from around the world.</p>
							</div>
							<div class="about-content-text">
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam volutpat. Ut wisi enim ad minim veniam. magna aliquam volutpat. Ut wisi enim ad minim veniam.</p>
								<div class="about-list mb65 ul-li-block">
									<ul>
										<li>Professional And Experienced Since 1980</li>
										<li>We Connect Learners To The Best  Universities From Around The World</li>
										<li>Our Mission Increasing Global Access To Quality Aducation</li>
										<li>100K Online Available Courses</li>
									</ul>
								</div>
								<div class="about-btn">
									<div class="genius-btn gradient-bg text-center text-uppercase ul-li-block bold-font">
										<a href="#">About Us <i class="fas fa-caret-right"></i></a>
									</div>
									<div class="genius-btn gradient-bg text-center text-uppercase ul-li-block bold-font">
										<a href="#">contact us <i class="fas fa-caret-right"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	<!-- End of about us section
		============================================= -->


	<!-- Start of Search Courses
		============================================= -->
		<section id="search-course" class="search-course-section home-secound-course-search backgroud-style">
			<div class="container">
				<div class="section-title mb20 headline text-center">
					<span class="subtitle text-uppercase">LEARN NEW SKILLS</span>
					<h2><span>Search</span> Genius Courses.</h2>
				</div>
				<div class="search-course mb30 relative-position">
					<form action="#" method="post">
						<input class="course" name="course" type="text" placeholder="Type what do you want to learn today?">
						<div class="nws-button text-center  gradient-bg text-capitalize">
							<button type="submit" value="Submit">Search Course</button>
						</div>
					</form>
				</div>
				<div class="search-counter-up">
					<div class="row">
						<div class="col-md-3">
							<div class="counter-icon-number">
								<div class="counter-icon">
									<i class="text-gradiant flaticon-graduation-hat"></i>
								</div>
								<div class="counter-number">
									<span class="counter-count bold-font">5 </span><span>M+</span>
									<p>Students Enrolled</p>
								</div>
							</div>
						</div>
						<!-- /counter -->

						<div class="col-md-3">
							<div class="counter-icon-number">
								<div class="counter-icon">
									<i class="text-gradiant flaticon-book"></i>
								</div>
								<div class="counter-number">
									<span class="counter-count bold-font">122</span><span>.500+</span>
									<p>Online Available Courses</p>
								</div>
							</div>
						</div>
						<!-- /counter -->

						<div class="col-md-3">
							<div class="counter-icon-number">
								<div class="counter-icon">
									<i class="text-gradiant flaticon-favorites-button"></i>
								</div>
								<div class="counter-number">
									<span class="counter-count bold-font">15</span><span>.000+</span>
									<p>Premium Quality Products</p>
								</div>
							</div>
						</div>
						<!-- /counter -->

						<div class="col-md-3">
							<div class="counter-icon-number">
								<div class="counter-icon">
									<i class="text-gradiant flaticon-group"></i>
								</div>
								<div class="counter-number">
									<span class="counter-count bold-font">7</span><span>.500+</span>
									<p>Teachers Registered</p>
								</div>
							</div>
						</div>
						<!-- /counter -->
					</div>
				</div>

				<div class="search-app">
					<div class="row">
						<div class="col-md-6">
							<div class="app-mock-up">
								<img src="assets/img/about/ab-2.png" alt="">
							</div>
						</div>

						<div class="col-md-6">
							<div class="about-us-text search-app-content">
								<div class="section-title relative-position mb20 headline text-left">
									<h2><span>Download</span> Genius Application on <span>PlayStore.</span></h2>
								</div>

								<div class="app-details-content">
									<p>Introduction Genius Mobile Application on Play Store lorem ipsum dolor sit amet consectuerer adipiscing.</p>

									<div class="about-list mb30 ul-li-block">
										<ul>
											<li>Professional And Experienced Since 1980</li>
											<li>Our Mission Increasing Global Access To Quality Aducation</li>
											<li>100K Online Available Courses</li>
										</ul>
									</div>
									<div class="about-btn">
										<div class="genius-btn gradient-bg text-center text-uppercase ul-li-block bold-font float-left">
											<a href="#">GET THE APP NOW </a>
										</div>

										<div class="app-stor ul-li mt10">
											<ul>
												<li><a href="#"><i class="fab fa-android"></i></a></li>
												<li><a href="#"><i class="fab fa-apple"></i></a></li>
												<li><a href="#"><i class="fab fa-windows"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	<!-- End of Search Courses
		============================================= -->


	<!-- Start latest section
		============================================= -->
		{{-- <section id="latest-area" class="latest-area-section">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="latest-area-content">
							<div class="section-title-2 mb65 headline text-left">
								<h2>Latest <span>News.</span></h2>
							</div>
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
									<div class="course-viewer ul-li">
										<ul>
											<li><a href="#"><i class="fas fa-user"></i> 1.220</a></li>
											<li><a href="#"><i class="fas fa-comment-dots"></i> 1.015</a></li>
										</ul>
									</div>
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
										<div class="course-viewer ul-li">
											<ul>
												<li><a href="#"><i class="fas fa-user"></i> 1.220</a></li>
												<li><a href="#"><i class="fas fa-comment-dots"></i> 1.015</a></li>
											</ul>
										</div>
									</div>
									<!-- /post -->
								</div>

								<div class="view-all-btn bold-font">
									<a href="#">View All News <i class="fas fa-chevron-circle-right"></i></a>
								</div>
							</div>
						</div>
					</div>
					<!-- /latest-news -->
					<div class="col-md-4">
						<div class="latest-area-content">
							<div class="section-title-2 mb65 headline text-left">
								<h2>Upcoming <span>Events.</span></h2>
							</div>
							<div class="latest-events">
								<div class="latest-event-item">
									<div class="events-date  relative-position text-center">
										<div class="gradient-bdr"></div>
										<span class="event-date bold-font">22</span>
										April 2018
									</div>
									<div class="event-text">
										<h3 class="latest-title bold-font"><a href="#">Fully Responsive Web Design & Development.</a></h3>
										<div class="course-meta">
											<span class="course-category"><a href="#">Web Design</a></span>
											<span class="course-author"><a href="#">Koke</a></span>
										</div>
									</div>
								</div>
							</div>

							<div class="latest-events">
								<div class="latest-event-item">
									<div class="events-date  relative-position text-center">
										<div class="gradient-bdr"></div>
										<span class="event-date bold-font">07</span>
										August 2018
									</div>
									<div class="event-text">
										<h3 class="latest-title bold-font"><a href="#">Introduction to Mobile Application Development.</a></h3>
										<div class="course-meta">
											<span class="course-category"><a href="#">Web Design</a></span>
											<span class="course-author"><a href="#">Koke</a></span>
										</div>
									</div>
								</div>
							</div>

							<div class="latest-events">
								<div class="latest-event-item">
									<div class="events-date  relative-position text-center">
										<div class="gradient-bdr"></div>
										<span class="event-date bold-font">30</span>
										Sept 2018
									</div>
									<div class="event-text">
										<h3 class="latest-title bold-font"><a href="#">IOS Apps Programming & Development.</a></h3>
										<div class="course-meta">
											<span class="course-category"><a href="#">Web Design</a></span>
											<span class="course-author"><a href="#">Koke</a></span>
										</div>
									</div>
								</div>
							</div>

							<div class="view-all-btn bold-font">
								<a  href="#">Check Calendar   <i class="fas fa-calendar-alt"></i></a>
							</div>
						</div>
					</div>
					<!-- /events -->

					<div class="col-md-4">
						<div class="latest-area-content">
							<div class="section-title-2 mb65 headline text-left">
								<h2>Latest <span>Video.</span></h2>
							</div>
							<div class="latest-video-poster relative-position mb20">
								<img src="assets/img/banner/v-1.jpg" alt="">
								<div class="video-play-btn text-center gradient-bg">
									<a class="popup-with-zoom-anim" href="https://www.youtube.com/watch?v=-g4TnixUdSc"><i class="fas fa-play"></i></a>
								</div>
							</div>
							<h3 class="latest-title bold-font"><a href="#">Learning IOS Apps in Amsterdam.</a></h3>
							<p class="mb25">Lorem ipsum dolor sit amet, consectetuer delacosta adipiscing elit, sed diam nonummy.</p>
							<div class="view-all-btn bold-font">
								<a href="#">View All Videos <i class="fas fa-chevron-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /. -->
				</div>
			</div>
		</section> --}}
	<!-- End latest section
		============================================= -->


	<!-- Start of best product section
		============================================= -->
		<section id="best-product" class="best-product-section home_2">
			<div class="container">
				<div class="section-title-2 mb65 headline text-left">
					<h2><span>Best Products.</span></h2>
				</div>


				<div id="best-product-slide-item"  class="best-product-slide">


                    @foreach ($courses as $cou)


					<div class="product-img-text">
						<div class="product-img text-center mb20">
                            @if ($cou->pic)

                          <a href="{{ route('course.details', $cou->id) }}">  <img src="{{ $cou->pic  }}" alt=""> </a>

                            @else
							<img src="assets/img/product/bp-1.png" alt="">
                            @endif


						</div>
						<div class="product-text-content relative-position">
							<div class="best-title-price float-left">
								<div class="course-title headline">
									<h3><a href="{{ route('course.details', $cou->id) }}">{{$cou->name}}</a></h3>
								</div>
								<div class="price-start">
									Start from
									<span>${{$cou->courseFee->price ?? ""}}</span>
								</div>
							</div>
							<div class="add-cart text-center">
								<i class="fas fa-cart-plus"></i>
							</div>
						</div>
					</div>


                    @endforeach





				</div>
			</div>
		</section>
	<!-- End  of best product section
		============================================= -->


	<!-- Start of best course
		============================================= -->
		<section id="best-course" class="best-course-section">
			<div class="container">
				<div class="section-title mb45 headline text-center">
					<span class="subtitle text-uppercase">SEARCH OUR COURSES</span>
					<h2>Browse Our<span> Best Course.</span></h2>
				</div>
				<div class="best-course-area mb45">
					<div class="row">


                        @foreach ($courses as $cou )



						<div class="col-md-3">


							<div class="best-course-pic-text relative-position">
								<div class="best-course-pic relative-position">
                                    @if ($cou->pic)

                                <a href="{{ route('course.details', $cou->id) }}">    <img  src="{{ $cou->pic  }}" alt="">  </a>

                                    @else
                                    <img src="assets/img/product/bp-1.png" alt="">
                                    @endif									{{-- <div class="trend-badge-2 text-center text-uppercase">
										<i class="fas fa-bolt"></i>
										<span>Trending</span>
									</div> --}}
									<div class="course-price text-center gradient-bg">
										<span>${{$cou->courseFee->price ?? ""}}</span>
									</div>
									{{-- <div class="course-rate ul-li">
										<ul>
											<li><i class="fas fa-star"></i></li>
											<li><i class="fas fa-star"></i></li>
											<li><i class="fas fa-star"></i></li>
											<li><i class="fas fa-star"></i></li>
											<li><i class="fas fa-star"></i></li>
										</ul>
									</div> --}}
									<div class="course-details-btn">
										<a href="#">COURSE DETAIL <i class="fas fa-arrow-right"></i></a>
									</div>
									<div class="blakish-overlay"></div>
								</div>
								<div class="best-course-text">
									<div class="course-title mb20 headline relative-position">
										<h3><a href="#">{{$cou->name ?? ""}}</a></h3>
									</div>
									{{-- <div class="course-meta">
										<span class="course-category"><a href="#">Web Design</a></span>
										<span class="course-author"><a href="#">250 Students</a></span>
									</div> --}}
								</div>
							</div>
						</div>
						<!-- /course -->
                        @endforeach

						<!-- /course -->
					</div>
				</div>


			</div>
		</section>
	<!-- End of best course
		============================================= -->


	<!-- Start FAQ section
		============================================= -->
		<section id="faq" class="faq-section faq-secound-home-version backgroud-style">
			<div class="container">
				<div class="section-title mb45 headline text-center">
					<span class="subtitle text-uppercase">GENIUS COURSE FAQ</span>
					<h2>Frequently<span> Ask & Questions</span></h2>
				</div>

				<div class="faq-tab mb45">
					<div class="faq-tab-ques  ul-li">
						<div class="tab-button text-center mb45">
							<ul class="product-tab">
								<li class="active" rel="tab1">GENERAL </li>
								<li rel="tab2"> COURSES </li>
								<li rel="tab3"> TEACHERS </li>
								<li rel="tab4">  EVENTS  </li>
								<li rel="tab5">  OTHERS  </li>
							</ul>
						</div>
						<!-- /tab-head -->

						<!-- tab content -->
						<div class="tab-container">

							<!-- 1st tab -->
							<div id="tab1" class="tab-content-1 pt35">
								<div id="accordion" class="panel-group">
									<div class="panel">
										<div class="panel-title" id="headingOne">
											<h3 class="mb-0">
												<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
													How to Register or Make An Account in Genius?
												</button>
											</h3>
										</div>
										<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
											<div class="panel-body">
												Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam volutpat. Ut wisi enim ad minim veniam consectetuer adipiscing elit, sed diam nonummy.
											</div>
										</div>
									</div>
									<div class="panel">
										<div class="panel-title" id="headingTwo">
											<h3 class="mb-0">
												<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
													What is Genius Courses?
												</button>
											</h3>
										</div>
										<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
											<div class="panel-body">
												Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam volutpat. Ut wisi enim ad minim veniam consectetuer adipiscing elit, sed diam nonummy.
											</div>
										</div>
									</div>
									<div class="panel">
										<div class="panel-title" id="headingThree">
											<h3 class="mb-0">
												<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
													What Lorem Ipsum Dolor Sit Amet Consectuerer?
												</button>
											</h3>
										</div>
										<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
											<div class="panel-body">
												Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam volutpat. Ut wisi enim ad minim veniam consectetuer adipiscing elit, sed diam nonummy.
											</div>
										</div>
									</div>
									<div class="panel">
										<div class="panel-title" id="headingFoure">
											<h3 class="mb-0">
												<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFoure" aria-expanded="false" aria-controls="collapseFoure">
													Adipiscing Diamet Nonnumy Nibh Euismod?
												</button>
											</h3>
										</div>
										<div id="collapseFoure" class="collapse"  data-parent="#accordion">
											<div class="panel-body">
												Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam volutpat. Ut wisi enim ad minim veniam consectetuer adipiscing elit, sed diam nonummy.
											</div>
										</div>
									</div>
								</div>
								<!-- end of #accordion -->

							</div>
							<!-- #tab1 -->

							<div id="tab2" class="tab-content-1 pt35">
								<div id="accordion-2" class="panel-group">
									<div class="panel">
										<div class="panel-title" id="headingSix">
											<h3 class="mb-0">
												<button class="btn btn-link" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
													How to Register or Make An Account in Genius?
												</button>
											</h3>
										</div>
										<div id="collapseSix" class="collapse show" aria-labelledby="headingSix" data-parent="#accordion-2">
											<div class="panel-body">
												Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam volutpat. Ut wisi enim ad minim veniam consectetuer adipiscing elit, sed diam nonummy.
											</div>
										</div>
									</div>
									<div class="panel">
										<div class="panel-title" id="headingSeven">
											<h3 class="mb-0">
												<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
													What is Genius Courses?
												</button>
											</h3>
										</div>
										<div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion-2">
											<div class="panel-body">
												Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam volutpat. Ut wisi enim ad minim veniam consectetuer adipiscing elit, sed diam nonummy.
											</div>
										</div>
									</div>
									<div class="panel">
										<div class="panel-title" id="headingEight">
											<h3 class="mb-0">
												<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
													What Lorem Ipsum Dolor Sit Amet Consectuerer?
												</button>
											</h3>
										</div>
										<div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion-2">
											<div class="panel-body">
												Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam volutpat. Ut wisi enim ad minim veniam consectetuer adipiscing elit, sed diam nonummy.
											</div>
										</div>
									</div>
									<div class="panel">
										<div class="panel-title" id="headingNine">
											<h3 class="mb-0">
												<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
													Adipiscing Diamet Nonnumy Nibh Euismod?
												</button>
											</h3>
										</div>
										<div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordion-2">
											<div class="panel-body">
												Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam volutpat. Ut wisi enim ad minim veniam consectetuer adipiscing elit, sed diam nonummy.
											</div>
										</div>
									</div>
								</div>
								<!-- end of #accordion -->
							</div>
							<!-- #tab2 -->

							<div id="tab3" class="tab-content-1 pt35">
								<div class="row">
									<div class="col-md-6">
										<div class="ques-ans mb45 headline">
											<h3> What is Genius Courses?</h3>
											<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam volutpat. Ut wisi enim ad minim veniam.</p>
										</div>

										<div class="ques-ans mb45 headline">
											<h3> What Lorem Ipsum Dolor Sit Amet Consectuerer?</h3>
											<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam volutpat. Ut wisi enim ad minim veniam.</p>
										</div>
									</div>

									<div class="col-md-6">
										<div class="ques-ans mb45 headline">
											<h3> How to Register or Make An Account in Genius?</h3>
											<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam volutpat. Ut wisi enim ad minim veniam.</p>
										</div>

										<div class="ques-ans mb45 headline">
											<h3> Adipiscing Diamet Nonnumy Nibh Euismod?</h3>
											<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam volutpat. Ut wisi enim ad minim veniam.</p>
										</div>
									</div>
								</div>
							</div>
							<!-- #tab3 -->

							<div id="tab4" class="tab-content-1 pt35">
								<div class="row">
									<div class="col-md-6">
										<div class="ques-ans mb45 headline">
											<h3> What is Genius Courses?</h3>
											<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam volutpat. Ut wisi enim ad minim veniam.</p>
										</div>

										<div class="ques-ans mb45 headline">
											<h3> What Lorem Ipsum Dolor Sit Amet Consectuerer?</h3>
											<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam volutpat. Ut wisi enim ad minim veniam.</p>
										</div>
									</div>

									<div class="col-md-6">
										<div class="ques-ans mb45 headline">
											<h3> How to Register or Make An Account in Genius?</h3>
											<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam volutpat. Ut wisi enim ad minim veniam.</p>
										</div>

										<div class="ques-ans mb45 headline">
											<h3> Adipiscing Diamet Nonnumy Nibh Euismod?</h3>
											<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam volutpat. Ut wisi enim ad minim veniam.</p>
										</div>
									</div>
								</div>
							</div>
							<!-- #tab3 -->

							<div id="tab5" class="tab-content-1 pt35">
								<div class="row">
									<div class="col-md-6">
										<div class="ques-ans mb45 headline">
											<h3> What is Genius Courses?</h3>
											<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam volutpat. Ut wisi enim ad minim veniam.</p>
										</div>

										<div class="ques-ans mb45 headline">
											<h3> What Lorem Ipsum Dolor Sit Amet Consectuerer?</h3>
											<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam volutpat. Ut wisi enim ad minim veniam.</p>
										</div>
									</div>

									<div class="col-md-6">
										<div class="ques-ans mb45 headline">
											<h3> How to Register or Make An Account in Genius?</h3>
											<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam volutpat. Ut wisi enim ad minim veniam.</p>
										</div>

										<div class="ques-ans mb45 headline">
											<h3> Adipiscing Diamet Nonnumy Nibh Euismod?</h3>
											<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam volutpat. Ut wisi enim ad minim veniam.</p>
										</div>
									</div>
								</div>
							</div>
							<!-- #tab3 -->
						</div>
					</div>
				</div>

				<div class="about-btn text-center">
					<div class="genius-btn gradient-bg text-center text-uppercase ul-li-block bold-font">
						<a href="#">Make Question <i class="fas fa-caret-right"></i></a>
					</div>
					<div class="genius-btn gradient-bg text-center text-uppercase ul-li-block bold-font">
						<a href="#">contact us <i class="fas fa-caret-right"></i></a>
					</div>
				</div>
			</div>
		</section>
	<!-- End FAQ section
		============================================= -->


	<!-- Start Course category
		============================================= -->
		{{-- <section id="course-category" class="course-category-section home-secound-version">
			<div class="container">
				<div class="section-title mb20 headline text-left">
					<span class="subtitle ml42  text-uppercase">GENIUS CATEGORIES</span>
					<h2>Browse <span>By Category.</span></h2>
				</div>
				<div class="category-item category-slide-item">
					<div class="category-slide-content">
						<div class="category-icon-title text-center">
							<div class="category-icon">
								<i class="text-gradiant flaticon-technology"></i>
							</div>
							<div class="category-title">
								<h4>Responsive Website</h4>
							</div>
						</div>
						<div class="category-icon-title text-center">
							<div class="category-icon">
								<i class="text-gradiant flaticon-app-store"></i>
							</div>
							<div class="category-title">
								<h4>IOS Applications</h4>
							</div>
						</div>
					</div>
					<div class="category-slide-content">
						<div class="category-icon-title text-center">
							<div class="category-icon">
								<i class="text-gradiant flaticon-artist-tools"></i>
							</div>
							<div class="category-title">
								<h4>Graphic Design</h4>
							</div>
						</div>
						<div class="category-icon-title text-center">
							<div class="category-icon">
								<i class="text-gradiant flaticon-business"></i>
							</div>
							<div class="category-title">
								<h4>Marketing</h4>
							</div>
						</div>
					</div>

					<div class="category-slide-content">
						<div class="category-icon-title text-center">
							<div class="category-icon">
								<i class="text-gradiant flaticon-dna"></i>
							</div>
							<div class="category-title">
								<h4>Science</h4>
							</div>
						</div>

						<div class="category-icon-title text-center">
							<div class="category-icon">
								<i class="text-gradiant flaticon-cogwheel"></i>
							</div>
							<div class="category-title">
								<h4>Enginering</h4>
							</div>
						</div>
					</div>

					<div class="category-slide-content">
						<div class="category-icon-title text-center">
							<div class="category-icon">
								<i class="text-gradiant flaticon-technology-1"></i>
							</div>
							<div class="category-title">
								<h4>Photography</h4>
							</div>
						</div>

						<div class="category-icon-title text-center">
							<div class="category-icon">
								<i class="text-gradiant flaticon-technology-2"></i>
							</div>
							<div class="category-title">
								<h4>Mobile Application</h4>
							</div>
						</div>
					</div>
					<div class="category-slide-content">
						<div class="category-icon-title text-center">
							<div class="category-icon">
								<i class="text-gradiant flaticon-technology"></i>
							</div>
							<div class="category-title">
								<h4>Responsive Website</h4>
							</div>
						</div>
						<div class="category-icon-title text-center">
							<div class="category-icon">
								<i class="text-gradiant flaticon-app-store"></i>
							</div>
							<div class="category-title">
								<h4>IOS Applications</h4>
							</div>
						</div>
					</div>
					<div class="category-slide-content">
						<div class="category-icon-title text-center">
							<div class="category-icon">
								<i class="text-gradiant flaticon-artist-tools"></i>
							</div>
							<div class="category-title">
								<h4>Graphic Design</h4>
							</div>
						</div>
						<div class="category-icon-title text-center">
							<div class="category-icon">
								<i class="text-gradiant flaticon-business"></i>
							</div>
							<div class="category-title">
								<h4>Marketing</h4>
							</div>
						</div>
					</div>

					<div class="category-slide-content">
						<div class="category-icon-title text-center">
							<div class="category-icon">
								<i class="text-gradiant flaticon-dna"></i>
							</div>
							<div class="category-title">
								<h4>Science</h4>
							</div>
						</div>

						<div class="category-icon-title text-center">
							<div class="category-icon">
								<i class="text-gradiant flaticon-cogwheel"></i>
							</div>
							<div class="category-title">
								<h4>Enginering</h4>
							</div>
						</div>
					</div>

					<div class="category-slide-content">
						<div class="category-icon-title text-center">
							<div class="category-icon">
								<i class="text-gradiant flaticon-technology-1"></i>
							</div>
							<div class="category-title">
								<h4>Photography</h4>
							</div>
						</div>

						<div class="category-icon-title text-center">
							<div class="category-icon">
								<i class="text-gradiant flaticon-technology-2"></i>
							</div>
							<div class="category-title">
								<h4>Mobile Application</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> --}}
	<!-- End Course category
		============================================= -->


	<!-- Start secound testimonial section
		============================================= -->
		<section id="testimonial-secound" class="secound-testimoinial-section">
			<div class="container">
				<div class="testimonial-slide">
					<div class="section-title mb35 headline text-center">
						<span class="subtitle text-uppercase">WHAT THEY SAY ABOUT US</span>
						<h2>Students <span>Testimonial.</span></h2>
					</div>

					<div class="testimonial-secound-slide-area">
						<div class="student-qoute text-center">
							<p>“This was our first time lorem ipsum and we <b> were very pleased with the whole experience</b>. Your price was lower than other companies. Our experience so we’ll be back in the future lorem ipsum diamet.”</p>
							<div class="student-name-designation">
								<span class="st-name bold-font">Robertho Garcia </span>
								<span class="st-designation">Graphic Designer</span>
							</div>
						</div>

						<div class="student-qoute text-center">
							<p>“This was our first time lorem ipsum and we <b> were very pleased with the whole experience</b>. Your price was lower than other companies. Our experience so we’ll be back in the future lorem ipsum diamet.”</p>
							<div class="student-name-designation">
								<span class="st-name bold-font">Robertho Garcia </span>
								<span class="st-designation">Graphic Designer</span>
							</div>
						</div>

						<div class="student-qoute text-center">
							<p>“This was our first time lorem ipsum and we <b> were very pleased with the whole experience</b>. Your price was lower than other companies. Our experience so we’ll be back in the future lorem ipsum diamet.”</p>
							<div class="student-name-designation">
								<span class="st-name bold-font">Robertho Garcia </span>
								<span class="st-designation">Graphic Designer</span>
							</div>
						</div>

						<div class="student-qoute text-center">
							<p>“This was our first time lorem ipsum and we <b> were very pleased with the whole experience</b>. Your price was lower than other companies. Our experience so we’ll be back in the future lorem ipsum diamet.”</p>
							<div class="student-name-designation">
								<span class="st-name bold-font">Robertho Garcia </span>
								<span class="st-designation">Graphic Designer</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	<!-- End secound testimonial section
		============================================= -->


	<!-- Start secound teacher section
		============================================= -->
		<section id="teacher-2" class="secound-teacher-section">
			<div class="container">
				<div class="section-title mb35 headline text-left">
					<span class="subtitle ml42  text-uppercase">GENIUS STAFFS</span>
					<h2>Genius <span>Teachers.</span></h2>
				</div>
				<div class="teacher-secound-slide">



                    @foreach ($instructor as $ins )



					<div class="teacher-img-text relative-position text-center">


						<div class="teacher-img-social relative-position">

                            @if ($ins->pic)

                            <img src="{{ $ins->pic }}" alt=""  style="width: 200px; height: 200px; ">
                            @else
							<img src="assets/img/teacher/tb-1.png" alt="" style="width: 30px; height: 30px;">

                            @endif
							<div class="blakish-overlay"></div>
							{{-- <div class="teacher-social-list ul-li">
								<ul>
									<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
									<li><a href="#"><i class="fab fa-twitter"></i></a></li>
									<li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
								</ul>
							</div> --}}
						</div>
						<div class="teacher-name-designation mt15">
							<span class="teacher-name">{{$ins->user->name ?? ""}}</span>
							<span class="teacher-designation">{{$ins->expertise ?? ""}}</span>
							<span class="teacher-name">{{$ins->name }}</span>

						</div>
					</div>

                    @endforeach





				</div>

				{{-- <div class="genius-btn gradient-bg text-center text-uppercase ul-li-block bold-font">
					<a href="#">All teacher <i class="fas fa-caret-right"></i></a>
				</div> --}}
			</div>
		</section>
	<!-- End teacher section
		============================================= -->



	<!-- Start Of scound contact section
		============================================= -->
		<section id="contact_secound" class="contact_secound_section backgroud-style">
			<div class="container">
				<div class="contact_secound_content">
					<div class="row">
						<div class="col-md-6">
							<div class="contact-left-content">
								<div class="section-title  mb45 headline text-left">
									<span class="subtitle ml42  text-uppercase">CONTACT US</span>
									<h2><span>Get in Touch</span></h2>
									<p>
										Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet  ipsum dolor sit amet, consectetuer adipiscing elit.
									</p>
								</div>

								<div class="contact-address">
									<div class="contact-address-details">
										<div class="address-icon relative-position text-center float-left">
											<i class="fas fa-map-marker-alt"></i>
										</div>
										<div class="address-details ul-li-block">
											<ul>
												<li><span>Primary: </span>Last Vegas, 120 Graphic Street, US</li>
												<li><span>Second: </span>Califorinia, 88 Design Street, US</li>
											</ul>
										</div>
									</div>

									<div class="contact-address-details">
										<div class="address-icon relative-position text-center float-left">
											<i class="fas fa-phone"></i>
										</div>
										<div class="address-details ul-li-block">
											<ul>
												<li><span>Primary: </span>(100) 3434 55666</li>
												<li><span>Second: </span>(20) 3434 9999</li>
											</ul>
										</div>
									</div>

									<div class="contact-address-details">
										<div class="address-icon relative-position text-center float-left">
											<i class="fas fa-envelope"></i>
										</div>
										<div class="address-details ul-li-block">
											<ul>
												<li><span>Primary: </span>info@geniuscourse.com</li>
												<li><span>Second: </span>mail@genius.info</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="contact_secound_form">
								<div class="section-title-2 mb65 headline text-left">
									<h2>Send Us a message</h2>
								</div>
								<form class="contact_form" action="#" method="POST" enctype="multipart/form-data">
									<div class="contact-info">
										<input class="name" name="name" type="text" placeholder="Your Name.">
									</div>
									<div class="contact-info">
										<input class="email" name="email" type="email" placeholder="Your Email">
									</div>
									<textarea  placeholder="Message."></textarea>
									<div class="nws-button text-center  gradient-bg text-capitalize">
										<button type="submit" value="Submit">SEND MESSAGE NOW <i class="fas fa-caret-right"></i></button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer_2 backgroud-style">
				<div class="container">
					<div class="back-top text-center mb45">
						<a class="scrollup" href="#"><img src="assets/img/banner/bt.png" alt=""></a>
					</div>
					<div class="footer_2_logo text-center">
						<img src="assets/img/logo/logo.png" alt="">
					</div>

					<div class="footer_2_subs text-center">
						<p>We take our mission of increasing global access to quality education seriously. </p>
						<div class="subs-form relative-position">
							<form action="#" method="post">
								<input class="course" name="course" type="email" placeholder="Email Address.">
								<div class="nws-button text-center  gradient-bg text-uppercase">
									<button type="submit" value="Submit">Subscribe now</button>
								</div>
							</form>
						</div>
					</div>
					<div class="copy-right-menu">
						<div class="row">
							<div class="col-md-5">
								<div class="copy-right-text">
									<p>© 2018 - Designed & Developed by <a href="https://jthemes.com/" title="Best Premium WordPress, HTML Template Store"> Jthemes Studio</a>. All rights reserved</p>
								</div>
							</div>
							<div class="col-md-3">
								<div class="footer-social  text-center ul-li">
									<ul>
										<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
										<li><a href="#"><i class="fab fa-twitter"></i></a></li>
										<li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="col-md-4">
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
			</div>
		</section>
	<!-- ENd Of scound contact section
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

        <script>
            window.addEventListener("pageshow", function (event) {
                if (event.persisted || (window.performance && window.performance.navigation.type === 2)) {
                    window.location.reload();
                }
            });
        </script>

	</body>


</html>
