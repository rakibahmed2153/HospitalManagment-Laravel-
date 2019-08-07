@extends('home.layout.main')





@section('Service_head')

    <div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/services.jpg" data-speed="0.8"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content">
							<div class="home_title"><span>CareMed</span> Services</div>
							<div class="breadcrumbs">
								<ul>
									<li><a href="#">Home</a></li>
									<li>Services</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
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
					<a href="#">
						<div class="service text-center trans_200">
							<div class="service_icon"><img class="svg" src="{{asset('upload')}}/services/{{$s['id']}}.PNG" alt=""></div>
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



	