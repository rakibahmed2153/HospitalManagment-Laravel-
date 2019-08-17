@extends('home.layout.main')


@section('Home')
      
	<div class="home" style="height: 900px;">
		<div class="home_slider_container">
			<!-- Home Slider -->
			<div class="owl-carousel owl-theme home_slider">
				
				<!-- Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(images/home_background_1.jpg)"></div>
					<div class="home_content">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_content_inner">
										<div class="home_title"><h1>Medicine made with care</h1></div>
										<div class="home_text">
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tempus vestibulum mauris quis aliquam. Integer accumsan sodales odio, id tempus velit ullamcorper id. Quisque at erat eu.</p>
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(images/home_background_2.jpg)"></div>
					<div class="home_content">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_content_inner">
										<div class="home_title"><h1>Medicine made with care</h1></div>
										<div class="home_text">
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tempus vestibulum mauris quis aliquam. Integer accumsan sodales odio, id tempus velit ullamcorper id. Quisque at erat eu.</p>
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(images/home_background_3.jpg)"></div>
					<div class="home_content">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_content_inner">
										<div class="home_title"><h1>Medicine made with care</h1></div>
										<div class="home_text">
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tempus vestibulum mauris quis aliquam. Integer accumsan sodales odio, id tempus velit ullamcorper id. Quisque at erat eu.</p>
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

			<!-- Slider Progress -->
			<div class="home_slider_progress"></div>
		</div>
	</div>
		
@endsection

@section('Boxes')
		
	<div class="boxes">
		<div class="container">
			<div class="row">
				
				<!-- Box -->
				<div class="col-lg-4 box_col">
					<div class="box working_hours" style="margin-left: -77px;">
						<div class="box_icon d-flex flex-column align-items-start justify-content-center"><div style="width:29px; height:29px;"><img src="images/alarm-clock.svg" alt=""></div></div>
						<div class="box_title">Working Hours</div>
						<div class="working_hours_list">
							<ul>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div>Monday – Friday</div>
									<div class="ml-auto">8.00 – 19.00</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div>Saturday</div>
									<div class="ml-auto">9.30 – 17.00</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div>Sunday</div>
									<div class="ml-auto">9.30 – 15.00</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
            
				<!-- Box -->
			<div class="col-lg-4 box_col">
					<div class="box box_appointments">
						<div class="box_icon d-flex flex-column align-items-start justify-content-center"><div style="width: 29px; height:29px;"><img src="images/phone-call.svg" alt=""></div></div>
						<div class="box_title">Appointments</div>
						<div class="box_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ante leo, finibus quis est ut, tempor tincidunt ipsum. Nam cons equat semper sollicitudin.</div>
					</div>
				</div> 

				<!-- Box -->
			<div class="col-lg-4 box_col">
					<div class="box box_emergency">
						<div class="box_icon d-flex flex-column align-items-start justify-content-center"><div style="width: 37px; height:37px; margin-left:-4px;"><img src="images/bell.svg" alt=""></div></div>
						<div class="box_title">Emergency Cases</div>
						<div class="box_phone">+56 273 45678 235</div>
						<div class="box_emergency_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ante leo.</div>
					</div>
				</div> 

			</div>
		</div>
	</div>

@endsection

@section('About')
		
       <div class="about">
		<div class="container">
			<div class="row row-lg-eq-height">
				
				<!-- About Content -->
				<div class="col-lg-7">
					<div class="about_content">
						<div class="section_title"><h2>A great medical team to help your needs</h2></div>
						<div class="about_text">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ante leo, finibus quis est ut, tempor tincidunt ipsum. Nam consequat semper sollicitudin. Aliquam nec dapibus massa. Pellen tesque in luctus ex. Praesent luctus erat sit amet tortor aliquam bibendum. Nulla ut molestie augue, scelerisque consectetur quam. Dolor sit amet, consectetur adipiscing elit. Cura bitur ante leo, finibus quis est ut, tempor tincidunt ipsum. Nam consequat semper sollicitudin. Aliquam nec dapibus massa. Pellentesque in luctus ex.</p>
						</div>
					</div>
				</div>

				<!-- About Image -->
				<div class="col-lg-5">
					<div class="about_image"><img src="images/about.png" alt=""></div>
				</div>
			</div>
		</div>
	</div>
	
@endsection



@section('Department')       
	<div class="departments">
		<div class="departments_background parallax-window" data-parallax="scroll" data-image-src="images/departments.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title section_title_light"><h2>Our Medical Departments</h2></div>
				</div>
			</div>
			<div class="row departments_row row-md-eq-height">
			
			
				<!-- Department -->
				@foreach ($department as $d)
				<div class="col-lg-3 col-md-6 dept_col">
					<div class="dept">
						<div class="dept_image"><img src="{{asset('upload')}}/departments/{{$d['deptName']}}.jpeg" alt="Department"></div>
						<div class="dept_content text-center">
							<div class="dept_title">{{$d['deptName']}}</div>
							<div class="dept_subtitle">{{$d['name']}}</div>
						</div>
					</div>
				</div>
                @endforeach
				
			</div>
		</div>
	</div>
@endsection	

@section('Service_body')
     <div class="services">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title"><h2>Our Featured Services</h2></div>
				</div>
			</div>
			<div class="row services_row">
				
				<!-- Service -->
				@foreach ($service as $s)
				<div class="col-lg-4 col-md-6 service_col">
					<a href="services.html">
						<div class="service text-center trans_200">
							<div class="service_icon"><img class="svg" src="{{asset('upload')}}/services/{{$s['name']}}.PNG" alt="Services"></div>
							<div class="service_title trans_200">{{$s['name']}}</div>
							<div class="service_text">
								<p>{{$s['details']}}</p>
							</div>
						</div>
					</a>
				</div>
            @endforeach
				
			</div>
		</div>
	</div>
@endsection

@section('Action')
     <div class="cta">
		<div class="cta_background parallax-window" data-parallax="scroll" data-image-src="images/cta.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="cta_content text-center">
						<h2>Need a personal health plan?</h2>
						<p>Duis massa massa, mollis vel ullamcorper quis, finibus et urna. Aliquam ac eleifend metus. Ut sollicitudin risus ex</p>
						<div class="button cta_button"><a href="{{route('home.appoint')}}">Request an Appointment</a></div>
					</div>
				</div>
			</div>
		</div>		
	</div>
@endsection

	