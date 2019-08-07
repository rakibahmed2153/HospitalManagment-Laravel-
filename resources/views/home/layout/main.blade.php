<!DOCTYPE html>
<html lang="en">
<head>
<title>CareMed</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="CareMed demo project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
<link rel="stylesheet" type="text/css" href="styles/services.css">
<link rel="stylesheet" type="text/css" href="styles/services_responsive.css">
<link rel="stylesheet" type="text/css" href="styles/about.css">
<link rel="stylesheet" type="text/css" href="styles/about_responsive.css">
<link rel="stylesheet" type="text/css" href="styles/contact.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
</head>
<body>
@csrf
<div class="super_container">
	
	<header class="header trans_200">
			
		
	     <!-- Top Bar -->
		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
							<div class="top_bar_item"><a href="{{route('home.appoint')}}">Request an Appointment</a></div>
							<div class="emergencies  d-flex flex-row align-items-center justify-content-start ml-auto">For Emergencies: +563 47558 623</div>
						</div>

					</div>
				</div>
			</div>
		</div>

	      
	     <!-- Header Content -->
		<div class="header_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_content d-flex flex-row align-items-center justify-content-start">
							<nav class="main_nav ml-auto">
								<ul>
									<li><a href="{{route('home.index')}}">Home</a></li>
									<li><a href="{{route('home.about')}}">About us</a></li>
									<li><a href="{{route('home.service')}}">Services</a></li>
									<li><a href="{{route('home.contact')}}">Contact</a></li>
									<li><a href="{{route('login.index')}}">Login</a></li>
								</ul>
							</nav>
							<div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
						</div>
					</div>
				</div>
			</div>
		</div>

	    <!-- Logo -->
		<div class="logo_container_outer">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="logo_container">
							<a href="#">
								<div class="logo_content d-flex flex-column align-items-start justify-content-center">
									<div class="logo_line"></div>
									<div class="logo d-flex flex-row align-items-center justify-content-center">
										<div class="logo_text">Care<span>Med</span></div>
										<div class="logo_box">+</div>
									</div>
									<div class="logo_sub">Health Care Center</div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</header>	
</div>	

	<!-- Home -->
        @yield('Home')

	<!-- 3 Boxes -->
       @yield('Boxes')

	<!-- About -->
	    @yield('About')

	<!-- Departments -->
        @yield('Department')

	<!-- Services -->
	    @yield('Service_head')
	    @yield('Service_body')
    
    <!-- About -->
	    @yield('AboutUs')

	<!-- Appointment -->
        @yield('Contact')    

	<!-- Call to action -->
        @yield('Action')
	
	<!-- Appointment -->
        @yield('Appoint')

    
    
    

	<!-- Footer -->

	<footer class="footer">
		<div class="footer_container">
			<div class="container">
				<div class="row">
					
					<!-- Footer About -->
		            <div class="col-lg-4 footer_col">
						<div class="footer_about">
							<div class="footer_logo_container">
								<a href="#" class="d-flex flex-column align-items-center justify-content-center">
									<div class="logo_content">
										<div class="logo d-flex flex-row align-items-center justify-content-center">
											<div class="logo_text">Care<span>Med</span></div>
											<div class="logo_box">+</div>
										</div>
										<div class="logo_sub">Health Care Center</div>
									</div>
								</a>
							</div>
							<div class="footer_about_text">
								<p>Lorem ipsum dolor sit amet, conse ctetur adipiscing elit. Curabitur ante leo, finibus quis est ut, tempor tincidunt ipsum.</p>
							</div>
							<ul class="footer_about_list">
								<li><div class="footer_about_icon"><img src="images/phone-call.svg" alt=""></div><span>+45 677 8993000 223</span></li>
								<li><div class="footer_about_icon"><img src="images/envelope.svg" alt=""></div><span>office@template.com</span></li>
								<li><div class="footer_about_icon"><img src="images/placeholder.svg" alt=""></div><span>Main Str. no 45-46, b3, 56832, Los Angeles, CA</span></li>
							</ul>
						</div>
					</div>
					<!-- Footer - Links -->
					
		            <div class="col-lg-4 footer_col">
						<div class="footer_links footer_column">
							<div class="footer_title">Useful Links</div>
							<ul>
								<li><a href="{{route('home.index')}}">Home</a></li>
								<li><a href="{{route('home.appoint')}}">Appointment</a></li>
								<li><a href="{{route('login.index')}}">Login</a></li>
								<li><a href="{{route('home.service')}}">Services</a></li>
								<li><a href="{{route('home.about')}}">About us</a></li>
								<li><a href="{{route('home.contact')}}">Contact</a></li>
							</ul>
						</div>
					</div>

					<!-- Footer News -->
		            <div class="col-lg-4 footer_col">
						<div class="footer_news footer_column">
							<div class="footer_title">Useful Links</div>
							<ul>
								<li>
									<div class="footer_news_title"><a href="news.html">Aliquam ac eleifend metus</a></div>
									<div class="footer_news_date">March 10, 2018</div>
								</li>
								<li>
									<div class="footer_news_title"><a href="news.html">Donec in libero sit amet mi vulputate</a></div>
									<div class="footer_news_date">March 10, 2018</div>
								</li>
								<li>
									<div class="footer_news_title"><a href="news.html">Aliquam ac eleifend metus</a></div>
									<div class="footer_news_date">March 10, 2018</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="copyright">
			<div class="container">
				<div class="row">
					 <div class="col">
						<div class="copyright_content d-flex flex-lg-row flex-column align-items-lg-center justify-content-start">
							<div class="cr"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
							<div class="footer_social ml-lg-auto">
								<ul>
									<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>			
		</div>
	</footer>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/progressbar/progressbar.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>