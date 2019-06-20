@extends('frontend.core.main')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('styles/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/responsive.css') }}">
@endsection

@section('content')
	
	<!-- Home -->
	<div class="home">
		<!-- Home Slider -->
		<div class="home_slider_container">
			<div class="owl-carousel owl-theme home_slider">
					<!-- SESSION -->

						<div class="col-md-12 col-sm-6">
						
						@if(Session::has('success'))
							<div class="alert alert-success">
								{{ Session::get('success') }}
							</div>
						@endif

					</div>

					<!-- END SESSION -->
				<!-- Home Slider Item -->
				<div class="owl-item home_slider_item">
					<!-- Image by https://unsplash.com/@aahubs -->
					<div class="home_slider_background" style="background-image:url('{{ asset('images/home_slider_bcg.jpg') }}')"></div>
					<div class="home_slider_content_container text-center">
						<div class="home_slider_content">
							<h1 data-animation-in="flipInX" data-animation-out="animate-out fadeOut">find your home</h1>
						</div>
					</div>
				</div>

				<!-- Home Slider Item -->
				<div class="owl-item home_slider_item">
					<!-- Image by https://unsplash.com/@aahubs -->
					<div class="home_slider_background" style="background-image:url('{{ asset('images/home_slider_bcg.jpg') }}')"></div>
					<div class="home_slider_content_container text-center">
						<div class="home_slider_content">
							<h1 data-animation-in="flipInX" data-animation-out="animate-out fadeOut">find your home</h1>
						</div>
					</div>
				</div>

				<!-- Home Slider Item -->
				<div class="owl-item home_slider_item">
					<!-- Image by https://unsplash.com/@aahubs -->
					<div class="home_slider_background" style="background-image:url('{{ asset('images/home_slider_bcg.jpg') }}')"></div>
					<div class="home_slider_content_container text-center">
						<div class="home_slider_content">
							<h1 data-animation-in="flipInX" data-animation-out="animate-out fadeOut">find your home</h1>
						</div>
					</div>
				</div>

				<!-- Home Slider Item -->
				<div class="owl-item home_slider_item">
					<!-- Image by https://unsplash.com/@aahubs -->
					<div class="home_slider_background" style="background-image:url('{{ asset('images/home_slider_bcg.jpg') }}')"></div>
					<div class="home_slider_content_container text-center">
						<div class="home_slider_content">
							<h1 data-animation-in="flipInX" data-animation-out="animate-out fadeOut">find your home</h1>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Home Slider Nav -->
			<div class="home_slider_nav_left home_slider_nav d-flex flex-row align-items-center justify-content-end">
				<img src="{{ asset('images/nav_left.png') }}" alt="">
			</div>

		</div>

	</div>

	@include('frontend.core.top')

	<!-- Search Box -->

	<div class="search_box">
		<div class="container">
			<div class="row">
				<div class="col">

					<div class="search_box_outer">
						<div class="search_box_inner">

							<!-- Search Box Title -->
							<div class="search_box_title text-center">
								<div class="search_box_title_inner">
									<div class="search_box_title_icon d-flex flex-column align-items-center justify-content-center"><img src="images/search.png" alt=""></div>
									<span>search your home</span>
								</div>
							</div>

							<!-- Search Arrow -->
							<div class="search_arrow_box">
								<div class="search_arrow_box_inner">
									<div class="search_arrow_circle d-flex flex-column align-items-center justify-content-center"><span>Search it here</span></div>
									<img src="images/search_arrow.png" alt="">
								</div>
							</div>

							<!-- Search Form -->
							<form class="search_form" action="{{ route('tim-kiem-nha-dat') }}" method="GET">
								@csrf
								<div class="search_box_container">
									<ul class="dropdown_row clearfix">
										<li class="dropdown_item dropdown_item_5">
											<div class="dropdown_item_title">Keywords</div>
											<input type="text" name="Keyword" class="dropdown_item_select">
										</li>
										<li class="dropdown_item dropdown_item_5">
											<div class="dropdown_item_title">Property ID</div>
											<input type="text" name="property_id" class="dropdown_item_select">
										</li>
										<li class="dropdown_item dropdown_item_5">
											<div class="dropdown_item_title">Town/City</div>
											<select name="location" id="location" class="dropdown_item_select">
												<option>Any</option>
												@foreach($locations as $location)
													<option value="{{ $location['id'] }}">{{ $location['name'] }}</option>
												@endforeach
											</select>
										</li>
										<li class="dropdown_item dropdown_item_5">
											<div class="dropdown_item_title">District</div>
											<select name="district" id="district" class="dropdown_item_select">
												<option>Any</option>
											</select>
										</li>
										<li class="dropdown_item dropdown_item_5">
											<div class="dropdown_item_title">Property Type</div>
											<select name="property_type" id="property_type" class="dropdown_item_select">
												<option>Any</option>
												<option>Type 1</option>
												<option>Type 2</option>
											</select>
										</li>
									</ul>
								</div>

								<div class="search_box_container">
									<ul class="dropdown_row clearfix">
										<li class="dropdown_item dropdown_item_6">
											<div class="dropdown_item_title">Bedrooms no</div>
											<select name="bedroom" id="bedroom" class="dropdown_item_select">
												<option>Any</option>
												<option>1</option>
												<option>2</option>
											</select>
										</li>
										<li class="dropdown_item dropdown_item_6">
											<div class="dropdown_item_title">Bathrooms no</div>
											<select name="bathroom" id="bathroom" class="dropdown_item_select">
												<option>Any</option>
												<option>1</option>
												<option>2</option>
											</select>
										</li>
										<li class="dropdown_item dropdown_item_6">
											<div class="dropdown_item_title">Min Price</div>
											<select name="min_price" id="min_price" class="dropdown_item_select">
												<option>Any</option>
												<option>$10000</option>
												<option>$20000</option>
											</select>
										</li>
										<li class="dropdown_item dropdown_item_6">
											<div class="dropdown_item_title">Max Price</div>
											<select name="max_price" id="max_price" class="dropdown_item_select">
												<option>Any</option>
												<option>$1000000</option>
												<option>$2000000</option>
											</select>
										</li>
										<li class="dropdown_item dropdown_item_6">
											<div class="dropdown_item_title">Width</div>
											<select name="width" id="width" class="dropdown_item_select">
												<option>Any</option>
												<option>Any</option>
												<option>Any</option>
											</select>
										</li>
										<li class="dropdown_item dropdown_item_6">
											<div class="dropdown_item_title">Length</div>
											<select name="length" id="length" class="dropdown_item_select">
												<option>Any</option>
												<option>Any</option>
												<option>Any</option>
											</select>
										</li>
										<li class="dropdown_item">
											<div class="search_button">
												<input type="submit" class="search_submit_button">
											</div>
										</li>
									</ul>
								</div>

							</form>
						</div>
					</div>

				</div>
			</div>
		</div>		
	</div>

	<!-- Featured Properties -->

	<div class="featured">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h3>featured properties</h3>
						<span class="section_subtitle">See our best offers</span>
					</div>
				</div>
			</div>

			<div class="row featured_row">
				<div class="col-lg-4 featured_card_col">

					<div class="featured_card_container">
						<div class="card featured_card trans_300">
							<div class="featured_panel">featured</div>
							<img class="card-img-top" src="images/featured_1.jpg" alt="https://unsplash.com/@breather">
							<div class="card-body">
								<div class="card-title"><a href="listings_single.html">House in West California</a></div>
								<div class="card-text">Donec ullamcorper nulla non metus auctor fringi lla. Curabitur blandit tempus porttitor.</div>
								<div class="rooms">

									<div class="room">
										<span class="room_title">Bedrooms</span>
										<div class="room_content">
											<div class="room_image"><img src="images/bedroom.png" alt=""></div>
											<span class="room_number">4</span>
										</div>
									</div>

									<div class="room">
										<span class="room_title">Bathrooms</span>
										<div class="room_content">
											<div class="room_image"><img src="images/shower.png" alt=""></div>
											<span class="room_number">3</span>
										</div>
									</div>

									<div class="room">
										<span class="room_title">Area</span>
										<div class="room_content">
											<div class="room_image"><img src="images/area.png" alt=""></div>
											<span class="room_number">7100 Sq Ft</span>
										</div>
									</div>

									<div class="room">
										<span class="room_title">Patio</span>
										<div class="room_content">
											<div class="room_image"><img src="images/patio.png" alt=""></div>
											<span class="room_number">1</span>
										</div>
									</div>

									<div class="room">
										<span class="room_title">Garage</span>
										<div class="room_content">
											<div class="room_image"><img src="images/garage.png" alt=""></div>
											<span class="room_number">2</span>
										</div>
									</div>

								</div>

								<div class="room_tags">
									<span class="room_tag"><a href="#">Hottub</a></span>
									<span class="room_tag"><a href="#">Swimming Pool</a></span>
									<span class="room_tag"><a href="#">Garden</a></span>
									<span class="room_tag"><a href="#">Patio</a></span>
									<span class="room_tag"><a href="#">Hard Wood Floor</a></span>
								</div>

							</div>
						</div>

						<div class="featured_card_box d-flex flex-row align-items-center trans_300">
							<img src="images/tag.svg" alt="https://www.flaticon.com/authors/lucy-g">
							<div class="featured_card_box_content">
								<div class="featured_card_price_title">For Sale</div>
								<div class="featured_card_price">$540,000</div>
							</div>
						</div>

					</div>

				</div>

				<div class="col-lg-4 featured_card_col">

					<div class="featured_card_container">
						<div class="card featured_card trans_300">
							<div class="featured_panel">featured</div>
							<img class="card-img-top" src="images/featured_2.jpg" alt="https://unsplash.com/@astute">
							<div class="card-body">
								<div class="card-title"><a href="listings_single.html">House in West California</a></div>
								<div class="card-text">Donec ullamcorper nulla non metus auctor fringi lla. Curabitur blandit tempus porttitor.</div>
								<div class="rooms">

									<div class="room">
										<span class="room_title">Bedrooms</span>
										<div class="room_content">
											<div class="room_image"><img src="images/bedroom.png" alt=""></div>
											<span class="room_number">4</span>
										</div>
									</div>

									<div class="room">
										<span class="room_title">Bathrooms</span>
										<div class="room_content">
											<div class="room_image"><img src="images/shower.png" alt=""></div>
											<span class="room_number">3</span>
										</div>
									</div>

									<div class="room">
										<span class="room_title">Area</span>
										<div class="room_content">
											<div class="room_image"><img src="images/area.png" alt=""></div>
											<span class="room_number">7100 Sq Ft</span>
										</div>
									</div>

									<div class="room">
										<span class="room_title">Patio</span>
										<div class="room_content">
											<div class="room_image"><img src="images/patio.png" alt=""></div>
											<span class="room_number">1</span>
										</div>
									</div>

									<div class="room">
										<span class="room_title">Garage</span>
										<div class="room_content">
											<div class="room_image"><img src="images/garage.png" alt=""></div>
											<span class="room_number">2</span>
										</div>
									</div>

								</div>

								<div class="room_tags">
									<span class="room_tag"><a href="#">Hottub</a></span>
									<span class="room_tag"><a href="#">Swimming Pool</a></span>
									<span class="room_tag"><a href="#">Garden</a></span>
									<span class="room_tag"><a href="#">Patio</a></span>
									<span class="room_tag"><a href="#">Hard Wood Floor</a></span>
								</div>

							</div>
						</div>

						<div class="featured_card_box d-flex flex-row align-items-center trans_300">
							<img src="images/tag.svg" alt="https://www.flaticon.com/authors/lucy-g">
							<div class="featured_card_box_content">
								<div class="featured_card_price_title">For Sale</div>
								<div class="featured_card_price">$540,000</div>
							</div>
						</div>

					</div>

				</div>

				<div class="col-lg-4 featured_card_col">

					<div class="featured_card_container">
						<div class="card featured_card trans_300">
							<div class="featured_panel">featured</div>
							<img class="card-img-top" src="images/featured_3.jpg" alt="https://unsplash.com/@marcusneto">
							<div class="card-body">
								<div class="card-title"><a href="listings_single.html">House in West California</a></div>
								<div class="card-text">Donec ullamcorper nulla non metus auctor fringi lla. Curabitur blandit tempus porttitor.</div>
								<div class="rooms">

									<div class="room">
										<span class="room_title">Bedrooms</span>
										<div class="room_content">
											<div class="room_image"><img src="images/bedroom.png" alt=""></div>
											<span class="room_number">4</span>
										</div>
									</div>

									<div class="room">
										<span class="room_title">Bathrooms</span>
										<div class="room_content">
											<div class="room_image"><img src="images/shower.png" alt=""></div>
											<span class="room_number">3</span>
										</div>
									</div>

									<div class="room">
										<span class="room_title">Area</span>
										<div class="room_content">
											<div class="room_image"><img src="images/area.png" alt=""></div>
											<span class="room_number">7100 Sq Ft</span>
										</div>
									</div>

									<div class="room">
										<span class="room_title">Patio</span>
										<div class="room_content">
											<div class="room_image"><img src="images/patio.png" alt=""></div>
											<span class="room_number">1</span>
										</div>
									</div>

									<div class="room">
										<span class="room_title">Garage</span>
										<div class="room_content">
											<div class="room_image"><img src="images/garage.png" alt=""></div>
											<span class="room_number">2</span>
										</div>
									</div>

								</div>

								<div class="room_tags">
									<span class="room_tag"><a href="#">Hottub</a></span>
									<span class="room_tag"><a href="#">Swimming Pool</a></span>
									<span class="room_tag"><a href="#">Garden</a></span>
									<span class="room_tag"><a href="#">Patio</a></span>
									<span class="room_tag"><a href="#">Hard Wood Floor</a></span>
								</div>

							</div>
						</div>

						<div class="featured_card_box d-flex flex-row align-items-center trans_300">
							<img src="images/tag.svg" alt="https://www.flaticon.com/authors/lucy-g">
							<div class="featured_card_box_content">
								<div class="featured_card_price_title">For Sale</div>
								<div class="featured_card_price">$540,000</div>
							</div>
						</div>

					</div>

				</div>

			</div>
		</div>
	</div>

	<!-- Testimonials -->

	<div class="testimonials">
		<div class="testimonials_background_container prlx_parent">
			<div class="testimonials_background prlx" style="background-image:url(images/testimonials_background.jpg)"></div>
		</div>
		<div class="container">

			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h3>clients testimonials</h3>
						<span class="section_subtitle">See our best offers</span>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					
					<div class="testimonials_slider_container">

						<!-- Testimonials Slider -->
						<div class="owl-carousel owl-theme testimonials_slider">
							
							<!-- Testimonials Item -->
							<div class="owl-item">
								<div class="testimonials_item text-center">
									<p class="testimonials_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae neque libero. Vivamus vel interdum massa. Mauris ut felis vel diam pretium eleifend vel eu neque. Mauris a condimentum tortor. Cras nec molestie est. Nulla vel facilisis metus. Quisque tempus fermentum enim, in feugiat sem laoreet</p>
									<div class="testimonial_user">
										<div class="testimonial_image mx-auto">
											<img src="images/person.jpg" alt="https://unsplash.com/@remdesigns">
										</div>
										<div class="testimonial_name">natalie smith</div>
										<div class="testimonial_title">Client in California</div>
									</div>
								</div>
							</div>

							<!-- Testimonials Item -->
							<div class="owl-item">
								<div class="testimonials_item text-center">
									<p class="testimonials_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae neque libero. Vivamus vel interdum massa. Mauris ut felis vel diam pretium eleifend vel eu neque. Mauris a condimentum tortor. Cras nec molestie est. Nulla vel facilisis metus. Quisque tempus fermentum enim, in feugiat sem laoreet</p>
									<div class="testimonial_user">
										<div class="testimonial_image mx-auto">
											<img src="images/person.jpg" alt="https://unsplash.com/@remdesigns">
										</div>
										<div class="testimonial_name">natalie smith</div>
										<div class="testimonial_title">Client in California</div>
									</div>
								</div>
							</div>

							<!-- Testimonials Item -->
							<div class="owl-item">
								<div class="testimonials_item text-center">
									<p class="testimonials_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae neque libero. Vivamus vel interdum massa. Mauris ut felis vel diam pretium eleifend vel eu neque. Mauris a condimentum tortor. Cras nec molestie est. Nulla vel facilisis metus. Quisque tempus fermentum enim, in feugiat sem laoreet</p>
									<div class="testimonial_user">
										<div class="testimonial_image mx-auto">
											<img src="images/person.jpg" alt="https://unsplash.com/@remdesigns">
										</div>
										<div class="testimonial_name">natalie smith</div>
										<div class="testimonial_title">Client in California</div>
									</div>
								</div>
							</div>

						</div>

					</div>
				</div>
			</div>

		</div>
	</div>

	<!-- Workflow -->

	<div class="workflow">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h3>see how we operate</h3>
						<span class="section_subtitle">What you need to do</span>
					</div>
				</div>
			</div>

			<div class="row workflow_row">
				<div class="workflow_rocket"><img src="images/rocket.png" alt=""></div>

				<!-- Workflow Item -->
				<div class="col-lg-4 workflow_col">
					<div class="workflow_item">
						<div class="workflow_image_container d-flex flex-column align-items-center justify-content-center">
							<div class="workflow_image_background">
								<div class="workflow_circle_outer trans_200"></div>
								<div class="workflow_circle_inner trans_200"></div>
								<div class="workflow_num text-center trans_200"><span>01.</span></div>
							</div>
							<div class="workflow_image">
								<img src="images/workflow_1.png" alt="">
							</div>
							
						</div>
						<div class="workflow_item_content text-center">
							<div class="workflow_title">Choose a Location</div>
							<p class="workflow_text">Donec ullamcorper nulla non metus auctor fringi lla. Curabitur blandit tempus porttitor.</p>
						</div>
					</div>
				</div>

				<!-- Workflow Item -->
				<div class="col-lg-4 workflow_col">
					<div class="workflow_item">
						<div class="workflow_image_container d-flex flex-column align-items-center justify-content-center">
							<div class="workflow_image_background">
								<div class="workflow_circle_outer trans_200"></div>
								<div class="workflow_circle_inner trans_200"></div>
								<div class="workflow_num text-center trans_200"><span>02.</span></div>
							</div>
							<div class="workflow_image">
								<img src="images/workflow_2.png" alt="">
							</div>
							
						</div>
						<div class="workflow_item_content text-center">
							<div class="workflow_title">Find the Perfect Home</div>
							<p class="workflow_text">Donec ullamcorper nulla non metus auctor fringi lla. Curabitur blandit tempus porttitor.</p>
						</div>
					</div>
				</div>

				<!-- Workflow Item -->
				<div class="col-lg-4 workflow_col">
					<div class="workflow_item">
						<div class="workflow_image_container d-flex flex-column align-items-center justify-content-center">
							<div class="workflow_image_background">
								<div class="workflow_circle_outer trans_200"></div>
								<div class="workflow_circle_inner trans_200"></div>
								<div class="workflow_num text-center trans_200"><span>03.</span></div>
							</div>
							<div class="workflow_image">
								<img src="images/workflow_3.png" alt="">
							</div>
							
						</div>
						<div class="workflow_item_content text-center">
							<div class="workflow_title">Move in your new life</div>
							<p class="workflow_text">Donec ullamcorper nulla non metus auctor fringi lla. Curabitur blandit tempus porttitor.</p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Cities -->

	<div class="cities">
		<div class="cities_background"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h3>cities clients prefer</h3>
						<span class="section_subtitle">What you need to do</span>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col">

					<!-- Cities Slider -->
		
					<div class="cities_slider_container">
						<div class="owl-carousel owl-theme cities_slider">
							
							<!-- City Item -->
							<div class="owl-item city_item">
								<a href="#">
									<div class="city_image">
										<img src="images/city_1.jpg" alt="">
									</div>
									<div class="city_details"><img src="images/search.png" alt=""></div>
									<div class="city_name"><span>miami</span></div>
								</a>
							</div>

							<!-- City Item -->
							<div class="owl-item city_item">
								<a href="#">
									<div class="city_image">
										<img src="images/city_2.jpg" alt="">
									</div>
									<div class="city_details"><img src="images/search.png" alt=""></div>
									<div class="city_name"><span>dublin</span></div>
								</a>
							</div>

							<!-- City Item -->
							<div class="owl-item city_item">
								<a href="#">
									<div class="city_image">
										<img src="images/city_3.jpg" alt="">
									</div>
									<div class="city_details"><img src="images/search.png" alt=""></div>
									<div class="city_name"><span>vienna</span></div>
								</a>
							</div>

							<!-- City Item -->
							<div class="owl-item city_item">
								<a href="#">
									<div class="city_image">
										<img src="images/city_4.jpg" alt="">
									</div>
									<div class="city_details"><img src="images/search.png" alt=""></div>
									<div class="city_name"><span>marbella</span></div>
								</a>
							</div>

							<!-- City Item -->
							<div class="owl-item city_item">
								<a href="#">
									<div class="city_image">
										<img src="images/city_5.jpg" alt="">
									</div>
									<div class="city_details"><img src="images/search.png" alt=""></div>
									<div class="city_name"><span>new york</span></div>
								</a>
							</div>

							<!-- City Item -->
							<div class="owl-item city_item">
								<a href="#">
									<div class="city_image">
										<img src="images/city_6.jpg" alt="">
									</div>
									<div class="city_details"><img src="images/search.png" alt=""></div>
									<div class="city_name"><span>geneva</span></div>
								</a>
							</div>
							
						</div>
						
						<div class="cities_prev cities_nav d-flex flex-row align-items-center justify-content-center trans_200">
							<img src="images/nav_left.png" alt="">
						</div>

						<div class="cities_next cities_nav d-flex flex-row align-items-center justify-content-center trans_200">
							<img src="images/nav_right.png" alt="">
						</div>

					</div>

				</div>
					
			</div>

		</div>
	</div>

	<!-- Call to Action -->

	<div class="cta_1">
		<div class="cta_1_background" style="background-image:url(images/cta_1.jpg)"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="cta_1_content d-flex flex-lg-row flex-column align-items-center justify-content-start">
						<h3 class="cta_1_text text-lg-left text-center">Do you want to talk with one of our <span>real estate experts?</span></h3>
						<div class="cta_1_phone">Call now:   +0080 234 567 84441</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row row-equal-height">

				<div class="col-lg-6">
					<div class="newsletter_title">
						<h3>subscribe to our newsletter</h3>
						<span class="newsletter_subtitle">Get the latest offers</span>
					</div>
					<div class="newsletter_form_container">
						<form action="#">
							<div class="newsletter_form_content d-flex flex-row">
								<input id="newsletter_email" class="newsletter_email" type="email" placeholder="Your email here" required="required" data-error="Valid email is required.">
								<button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_200" value="Submit">subscribe</button>
							</div>
						</form>
					</div>
				</div>

				<div class="col-lg-6">
					<a href="#">
						<div class="weekly_offer">
							<div class="weekly_offer_content d-flex flex-row">
								<div class="weekly_offer_icon d-flex flex-column align-items-center justify-content-center">
									<img src="images/prize.svg" alt="">
								</div>
								<div class="weekly_offer_text text-center">weekly offer</div>
							</div>
							<div class="weekly_offer_image" style="background-image:url(images/weekly.jpg)"></div>
						</div>
					</a>
				</div>

			</div>
		</div>
	</div>

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">
				
				<!-- Footer About -->

				<div class="col-lg-3 footer_col">
					<div class="footer_col_title">
						<div class="logo_container">
							<a href="#">
								<div class="logo">
									<img src="images/logo.png" alt="">
									<span>the estate</span>
								</div>
							</a>
						</div>
					</div>
					<div class="footer_social">
						<ul class="footer_social_list">
							<li class="footer_social_item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
							<li class="footer_social_item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
							<li class="footer_social_item"><a href="#"><i class="fab fa-twitter"></i></a></li>
							<li class="footer_social_item"><a href="#"><i class="fab fa-dribbble"></i></a></li>
							<li class="footer_social_item"><a href="#"><i class="fab fa-behance"></i></a></li>
						</ul>
					</div>
					<div class="footer_about">
						<p>Lorem ipsum dolor sit amet, cons ectetur  quis ferme adipiscing elit. Suspen dis se tellus eros, placerat quis ferme ntum et, viverra sit amet lacus. Nam gravida  quis ferme semper augue.</p>
					</div>
				</div>
				
				<!-- Footer Useful Links -->

				<div class="col-lg-3 footer_col">
					<div class="footer_col_title">useful links</div>
					<ul class="footer_useful_links">
						<li class="useful_links_item"><a href="#">Listings</a></li>
						<li class="useful_links_item"><a href="#">Favorite Cities</a></li>
						<li class="useful_links_item"><a href="#">Clients Testimonials</a></li>
						<li class="useful_links_item"><a href="#">Featured Listings</a></li>
						<li class="useful_links_item"><a href="#">Properties on Offer</a></li>
						<li class="useful_links_item"><a href="#">Services</a></li>
						<li class="useful_links_item"><a href="#">News</a></li>
						<li class="useful_links_item"><a href="#">Our Agents</a></li>
					</ul>
				</div>

				<!-- Footer Contact Form -->
				<div class="col-lg-3 footer_col">
					<div class="footer_col_title">say hello</div>
					<div class="footer_contact_form_container">
						<form id="footer_contact_form" class="footer_contact_form" action="post">
							<input id="contact_form_name" class="input_field contact_form_name" type="text" placeholder="Name" required="required" data-error="Name is required.">
							<input id="contact_form_email" class="input_field contact_form_email" type="email" placeholder="E-mail" required="required" data-error="Valid email is required.">
							<textarea id="contact_form_message" class="text_field contact_form_message" name="message" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
							<button id="contact_send_btn" type="submit" class="contact_send_btn trans_200" value="Submit">send</button>
						</form>
					</div>
				</div>

				<!-- Footer Contact Info -->

				<div class="col-lg-3 footer_col">
					<div class="footer_col_title">contact info</div>
					<ul class="contact_info_list">
						<li class="contact_info_item d-flex flex-row">
							<div><div class="contact_info_icon"><img src="images/placeholder.svg" alt=""></div></div>
							<div class="contact_info_text">4127 Raoul Wallenber 45b-c Gibraltar</div>
						</li>
						<li class="contact_info_item d-flex flex-row">
							<div><div class="contact_info_icon"><img src="images/phone-call.svg" alt=""></div></div>
							<div class="contact_info_text">2556-808-8613</div>
						</li>
						<li class="contact_info_item d-flex flex-row">
							<div><div class="contact_info_icon"><img src="images/message.svg" alt=""></div></div>
							<div class="contact_info_text"><a href="mailto:contactme@gmail.com?Subject=Hello" target="_top">contactme@gmail.com</a></div>
						</li>
						<li class="contact_info_item d-flex flex-row">
							<div><div class="contact_info_icon"><img src="images/planet-earth.svg" alt=""></div></div>
							<div class="contact_info_text"><a href="https://colorlib.com">www.colorlib.com</a></div>
						</li>
					</ul>
				</div>

			</div>
		</div>
	</footer>

	<!-- Credits -->

	<script
	  src="https://code.jquery.com/jquery-3.4.1.min.js"
	  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	  crossorigin="anonymous"></script>

	  <script>
	  	$(document).ready(function(){
	  		$('#location').on('change', function(){
	  			var value = $(this).val();
	  			$('#district').children().hide();
	  			$('#district').load(location.href + ' #district');
	  			$.ajax({
	  				url:'location/change',
	  				method:'GET',
	  				dataType:'text',
	  				data:{location_id:value},
	  				success:function($response){
	  					$.each(JSON.parse($response), function(i, district){
	  						$('#district').append('<option value="'+district.id+'">'+district.name+'</option>');
	  					});
	  				}
	  			});
	  		});
	  	});
	  </script>

@stop