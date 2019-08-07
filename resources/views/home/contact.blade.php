@extends('home.layout.main')





@section('Contact')

    <div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/contact.jpg" data-speed="0.8"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content">
							<div class="home_title"><span>CareMed</span> News</div>
							<div class="breadcrumbs">
								<ul>
									<li><a href="#">Home</a></li>
									<li>Contact</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Contact -->

	<div class="contact">
		<div class="container">
			<div class="row">

				<!-- Contact Info -->
				<div class="col-lg-6">
					<div class="section_title"><h2>Get in touch</h2></div>
					<div class="contact_text">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ante leo, finibus quis est ut, tempor tincidunt ipsum. Nam consequat semper sollicitudin. Aliquam nec dapibus massa.</p>
					</div>
					<ul class="contact_about_list">
						<li><div class="contact_about_icon"><img src="images/phone-call.svg" alt=""></div><span>+45 677 8993000 223</span></li>
						<li><div class="contact_about_icon"><img src="images/envelope.svg" alt=""></div><span>office@template.com</span></li>
						<li><div class="contact_about_icon"><img src="images/placeholder.svg" alt=""></div><span>Main Str. no 45-46, b3, 56832, Los Angeles, CA</span></li>
					</ul>
				</div>

				<!-- Contact Form -->
				<div class="col-lg-6 form_col">
					<div class="contact_form_container">
						<form method="post" id="contact_form" class="contact_form">
							@csrf
							<div class="row">
								<div class="col-md-6 input_col">
									<div class="input_container input_name"><input type="text" class="contact_input" name="name" placeholder="Name"></div>
								</div>
								<div class="col-md-6 input_col">
									<div class="input_container"><input type="email" class="contact_input" name="email" placeholder="E-mail"></div>
								</div>
							</div>

							<div class="input_container"><input type="text" class="contact_input" name="subject" placeholder="Subject"></div>

							<div class="input_container"><textarea class="contact_input contact_text_area" name="message" placeholder="Message"></textarea></div>
							<input type="submit" name="submit" style="
                                                            background-color: blue;
  														    color: white;
 														    width: 100px;
    													    height: 50px;
  														    font-size: 20px;
    														font-style: italic;" value="Submit">
						</form>
                        <br><br>

                        <div style="color: green;">
							{{session('msg')}}
						</div>
						<div style="color: red;">

                                   @foreach($errors->all() as $err)
									{{$err}} <br>
								   @endforeach
                                </div>

							</div>

					</div>
				</div>
			</div>
			<div class="row map_row">
				<div class="col">

					<!-- Contact Map -->

					<div class="contact_map">

						<!-- Google Map -->
						
						<div class="map">
							<div id="google_map" class="google_map">
								<div class="map_container">
									<div id="map"></div>
								</div>
							</div>
						</div>

						<!-- Working Hours -->
						<div class="box working_hours">
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

				</div>
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



	