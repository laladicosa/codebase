@extends('frontend.core.main')
	
@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/listings_styles.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/listings_responsive.css') }}">
	<style>
		.listing_title{
			margin-top: -12px;
		}
	</style>
@endsection

@section('content')

	
	<!-- Home -->
	<div class="home">
		<!-- Image by: https://unsplash.com/@jbriscoe -->
		<div class="home_background" style="background-image:url(images/listings.jpg)"></div>
		
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="home_content">
						<div class="home_title">
							<h2>listings</h2>
						</div>
						<div class="breadcrumbs">
							<span><a href="index.html">Home</a></span>
							<span><a href="#"> Search</a></span>
							<span><a href="#"> Listings</a></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Header -->

	@include('frontend.core.top')

	<!-- Listings -->

	<div class="listings">
		<div class="container">
			<div class="row">
				<!-- Listings -->
						<div class="col-lg-8 listings_col">
							@if($houses_arrays)
								@foreach($houses_arrays as $house)
							<!-- Listings Item -->
							<div class="listing_item">
								<div class="listing_item_inner d-flex flex-md-row flex-column trans_300">
									<div class="listing_image_container">
										<div class="listing_image">
											<!-- Image by: https://unsplash.com/@breather -->
											<div class="listing_background" style="background-image:url('{{$house['image']}}')"></div>
										</div>
										<div class="featured_card_box d-flex flex-row align-items-center trans_300">
											<img src="images/tag.svg" alt="https://www.flaticon.com/authors/lucy-g">
											<div class="featured_card_box_content">
												<div class="featured_card_price_title trans_300">Actual Price</div>
												<div class="featured_card_price trans_300">{{ $house['price'] }} VND</div>
											</div>
										</div>
									</div>
									<div class="listing_content">
										@if(isset($house[2][0]['name']) && $house[2]['name'])<p><i class="fas fa-map-marker-alt"></i> <a href="">{{ $house[2][0]['name'] }} - {{ $house[2]['name'] }}</a></p>@else <p></p> @endif
										<div class="listing_title"><a href="{{ route('main.nhadat.details', ['id'=>$house['id'], 'slug'=>$house['slug']]) }}">{{ $house['title'] }}</a></div>
										<small class="badge bg-dark text-white">
											@if(isset($house['updated_at']))
												Updated: {{ date('d/m/Y', strtotime($house['updated_at'])) }}
											@else
												Created: {{ date('d/m/Y', strtotime($house['created_at'])) }}
											@endif
										</small>
										<div class="listing_text">{{ str_limit($house['description'], 100) }}</div>
										<div class="rooms">

											<div class="room">
												<span class="room_title">Bedrooms</span>
												<div class="room_content">
													<div class="room_image"><img src="images/bedroom.png" alt=""></div>
													<span class="room_number">{{ $house[1]['bedroom'] }}</span>
												</div>
											</div>

											<div class="room">
												<span class="room_title">Bathrooms</span>
												<div class="room_content">
													<div class="room_image"><img src="images/shower.png" alt=""></div>
													<span class="room_number">{{ $house[1]['bathroom'] }}</span>
												</div>
											</div>

											<div class="room">
												<span class="room_title">Area</span>
												<div class="room_content">
													<div class="room_image"><img src="images/area.png" alt=""></div>
													<span class="room_number">{{ $house['width'] * $house['length'] }} m<sup>2</sup></span>
												</div>
											</div>

										</div>

										<div class="room_tags">
											<span class="room_tag">
												<a href="">
													Living Room @if(isset($house[1]['living_room'])) {{ $house[1]['living_room'] }} @else 0 @endif
												</a>
											</span>
											<span class="room_tag">
												<a href="">
													Kitchen @if(isset($house[1]['kitchen'])) {{ $house[1]['kitchen'] }} @else 0 @endif
												</a>
											</span>
											<span class="room_tag">
												<a href="">
													Toilet @if(isset($house[1]['toilet'])) {{ $house[1]['toilet'] }} @else 0 @endif
												</a>
											</span>
											<span class="room_tag">
												<a href="">
													Garage @if(isset($house[1]['garage'])) {{ $house[1]['garage'] }} @else 0 @endif
												</a>
											</span>
											<span class="room_tag">
												<a href="">
													Swimming Pool @if(isset($house[1]['swimming_pool'])) {{ $house[1]['swimming_pool'] }} @else 0 @endif
												</a>
											</span>
											<span class="room_tag">
												<a href="">
													Patio @if(isset($house[1]['patio'])) {{ $house[1]['patio'] }} @else 0 @endif
												</a>
											</span>
											<span class="room_tag">
												<a href="">
													Garden @if(isset($house[1]['garden'])) {{ $house[1]['garden'] }} @else 0 @endif
												</a>
											</span>
										</div>
									</div>
								</div>
							</div>
								@endforeach
							@endif	
						</div>
						<div class="col-lg-4 sidebar_col">
							<!-- Search Box -->

							<div class="search_box">

								<div class="search_box_content">

									<!-- Search Box Title -->
									<div class="search_box_title text-center">
										<div class="search_box_title_inner">
											<div class="search_box_title_icon d-flex flex-column align-items-center justify-content-center"><img src="images/search.png" alt=""></div>
											<span>search your home</span>
										</div>
									</div>

									<!-- Search Form -->
									<form class="search_form" action="#">
										<div class="search_box_container">
											<ul class="dropdown_row clearfix">
												<li class="dropdown_item">
													<div class="dropdown_item_title">Keywords</div>
													<select name="keywords" id="keywords" class="dropdown_item_select">
														<option>Any</option>
														<option>Keyword 1</option>
														<option>Keyword 2</option>
													</select>
												</li>
												<li class="dropdown_item">
													<div class="dropdown_item_title">Property ID</div>
													<select name="property_ID" id="property_ID" class="dropdown_item_select">
														<option>Any</option>
														<option>ID 1</option>
														<option>ID 2</option>
													</select>
												</li>
												<li class="dropdown_item">
													<div class="dropdown_item_title">Property Status</div>
													<select name="property_status" id="property_status" class="dropdown_item_select">
														<option>Any</option>
														<option>Status 1</option>
														<option>Status 2</option>
													</select>
												</li>
												<li class="dropdown_item">
													<div class="dropdown_item_title">Location</div>
													<select name="property_location" id="property_location" class="dropdown_item_select">
														<option>Any</option>
														<option>Location 1</option>
														<option>Location 2</option>
													</select>
												</li>
												<li class="dropdown_item">
													<div class="dropdown_item_title">Property Type</div>
													<select name="property_type" id="property_type" class="dropdown_item_select">
														<option>Any</option>
														<option>Type 1</option>
														<option>Type 2</option>
													</select>
												</li>
												<li class="dropdown_item dropdown_item_half">
													<div class="dropdown_item_title">Bedrooms no</div>
													<select name="bedrooms_no" id="bedrooms_no" class="dropdown_item_select">
														<option>Any</option>
														<option>1</option>
														<option>2</option>
													</select>
												</li>
												<li class="dropdown_item dropdown_item_half">
													<div class="dropdown_item_title">Bathrooms no</div>
													<select name="bathrooms_no" id="bathrooms_no" class="dropdown_item_select">
														<option>Any</option>
														<option>1</option>
														<option>2</option>
													</select>
												</li>
												<li class="dropdown_item dropdown_item_half">
													<div class="dropdown_item_title">Min Price</div>
													<select name="min_price" id="min_price" class="dropdown_item_select">
														<option>Any</option>
														<option>$10000</option>
														<option>$20000</option>
													</select>
												</li>
												<li class="dropdown_item dropdown_item_half">
													<div class="dropdown_item_title">Max Price</div>
													<select name="max_price" id="max_price" class="dropdown_item_select">
														<option>Any</option>
														<option>$1000000</option>
														<option>$2000000</option>
													</select>
												</li>
												<li class="dropdown_item dropdown_item_half">
													<div class="dropdown_item_title">Min Sq Ft</div>
													<select name="min_sq_ft" id="min_sq_ft" class="dropdown_item_select">
														<option>Any</option>
														<option>Any</option>
														<option>Any</option>
													</select>
												</li>
												<li class="dropdown_item dropdown_item_half">
													<div class="dropdown_item_title">Max Sq Ft</div>
													<select name="max_sq_ft" id="max_sq_ft" class="dropdown_item_select">
														<option>Any</option>
														<option>Any</option>
														<option>Any</option>
													</select>
												</li>
											</ul>
										</div>

										<div class="search_features_container">
											<div class="search_features_trigger">
												<a href="#">Specific features</a>
											</div>
											<ul class="search_features clearfix">
												<li class="search_features_item">
													<div>
														<input type="checkbox" id="search_features_1" class="search_features_cb">
														<label for="search_features_1">Feature 1</label>
													</div>	
												</li>
												<li class="search_features_item">
													<div>
														<input type="checkbox" id="search_features_2" class="search_features_cb">
														<label for="search_features_2">Feature 2</label>
													</div>
												</li>
												<li class="search_features_item">
													<div>
														<input type="checkbox" id="search_features_3" class="search_features_cb">
														<label for="search_features_3">Feature 3</label>
													</div>
												</li>
												<li class="search_features_item">
													<div>
														<input type="checkbox" id="search_features_4" class="search_features_cb">
														<label for="search_features_4">Feature 4</label>
													</div>
												</li>
												<li class="search_features_item">
													<div>
														<input type="checkbox" id="search_features_5" class="search_features_cb">
														<label for="search_features_5">Feature 5</label>
													</div>
												</li>
												<li class="search_features_item">
													<div>
														<input type="checkbox" id="search_features_6" class="search_features_cb">
														<label for="search_features_6">Feature 6</label>
													</div>
												</li>
												<li class="search_features_item">
													<div>
														<input type="checkbox" id="search_features_7" class="search_features_cb">
														<label for="search_features_7">Feature 7</label>
													</div>
												</li>
												<li class="search_features_item">
													<div>
														<input type="checkbox" id="search_features_8" class="search_features_cb">
														<label for="search_features_8">Feature 8</label>
													</div>
												</li>
												<li class="search_features_item">
													<div>
														<input type="checkbox" id="search_features_9" class="search_features_cb">
														<label for="search_features_9">Feature 9</label>
													</div>
												</li>
												<li class="search_features_item">
													<div>
														<input type="checkbox" id="search_features_10" class="search_features_cb">
														<label for="search_features_10">Feature 10</label>
													</div>
												</li>
											</ul>

											<div class="search_button">
												<input value="search" type="submit" class="search_submit_button">
											</div>
										</div>
									</form>
								</div>	
							</div>
						</div>
					
				<!-- Search Sidebar -->
			</div>

			<div class="row">
				<div class="col clearfix">
					<div class="listings_nav">
						<ul>
							<li class="listings_nav_item active"><a href="#">01.</a></li>
							<li class="listings_nav_item"><a href="#">02.</a></li>
							<li class="listings_nav_item"><a href="#">03.</a></li>
						</ul>
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
@stop