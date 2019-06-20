@extends('frontend.core.main')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('styles/listings_single_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/listings_single_responsive.css') }}">

<style>
	.panel-header{
		background-color: #0e1d41;
	}

	label{
		color: black;
	}

	.home_background{
		background-image:url('{{asset('images/listings_single.jpg')}}');
	}
</style>
@endsection

@section('content')
	
	<!-- Home -->
	<div class="home">
		<!-- Image by: https://unsplash.com/@jbriscoe -->
		<div class="home_background"></div>
		
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="home_content">
						<div class="home_title">
							<h2>POST LISTINGS</h2>
						</div>
						<div class="breadcrumbs">
							<span><a href="index.html">Home</a></span>
							<span><a href="#"> Search</a></span>
							<span><a href="listings.html"> Listings</a></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Header -->

	@include('frontend.core.top')

	<!-- Listing -->

	<div class="listing">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					
					<!-- Listing Title -->
					<div class="listing_title_container">
						@if(isset($house_arr))
						<div class="listing_title">View & Edit: {{ $house_arr['title'] }}</div>
						@else
						<div class="listing_title">Create Your Own Properties & Sell Them</div>
						@endif
						<p class="listing_text">Provide as much in details as you can so that your properties stand out and attracting orders !</p>
						<div class="room_tags">
							<span class="room_tag"><a href="#">Hottub</a></span>
							<span class="room_tag"><a href="#">Swimming Pool</a></span>
							<span class="room_tag"><a href="#">Garden</a></span>
							<span class="room_tag"><a href="#">Patio</a></span>
							<span class="room_tag"><a href="#">Hard Wood Floor</a></span>
						</div>
					</div>
				</div>
				
				<!-- Listing Price -->
				<div class="col-lg-4 listing_price_col clearfix">
					<div class="featured_card_box d-flex flex-row align-items-center trans_300 float-lg-right">
						<img src="{{ Auth::user()->image }}" class="rounded">
						<div class="featured_card_box_content">
							<div class="featured_card_price_title trans_300">{{ Auth::user()->name }}</div>
							<div class="featured_card_price trans_300">{{ $total_house }} listings</div>
						</div>
					</div>
				</div>

			</div>
					

			<div class="row listing_content_row">
				
				<!-- Search Sidebar -->

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

					<div class="hello">
						<div class="footer_col_title">say hello</div>
						<div class="footer_contact_form_container">
							<form id="hello_contact_form" class="footer_contact_form" action="post">
								<input id="hello_contact_form_name" class="input_field contact_form_name" type="text" placeholder="Name" required="required" data-error="Name is required.">
								<input id="hello_contact_form_email" class="input_field contact_form_email" type="email" placeholder="E-mail" required="required" data-error="Valid email is required.">
								<textarea id="hello_contact_form_message" class="text_field contact_form_message" name="message" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
								<button id="hello_contact_send_btn" type="submit" class="contact_send_btn trans_200" value="Submit">send</button>
							</form>
						</div>
					</div>
				</div>

				<!-- FORM -->

				<div class="col-lg-8">
					@if(isset($house_arr))
						<form action="{{ route('sua-nha.process', ['id'=>$house_arr['id'], 'slug'=>$house_arr['slug']]) }}" method="POST" enctype="multipart/form-data">
					@else
						<form action="{{ route('dang-nha.process') }}" method="POST" enctype="multipart/form-data">
					@endif
						@csrf
						<div class="panel panel-default">
							<div class="panel-header">
								<h3 class="text-white ml-5 pt-3 pb-4">
									@if(isset($house_arr))
										Edit here.
									@else
										Start here.
									@endif
								</h3>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="form-group col-lg-12">
										<label for="title">Title</label>
										@if(isset($house_arr))
											<input type="text" name="title" id="title" class="form-control" value="{{ $house_arr['title'] }}" required>
										@else
											<input type="text" name="title" id="title" class="form-control" placeholder="Conclude your property in a sentence." required>
										@endif
									</div>
									<div class="form-group col-lg-12">
										<label for="address">Address</label>
										@if(isset($house_arr))
											<input type="text" name="address" id="address" value="{{ $house_arr['address'] }}" class="form-control" required>
										@else
											<input type="text" name="address" id="address" placeholder="Example: No. ABC Khuat Duy Tien" class="form-control" required>
										@endif
									</div>
									<div class="form-group col-lg-4">
										<label for="location_id">Town</label>
										<select id="location" name="location_id" class="form-control" required>
											@if(isset($house_arr[0]))
												<option value="{{ $house_arr[0]['id'] }}">{{ $house_arr[0]['name'] }}</option>
											@else
												<option>...Choose location...</option>
											@endif
											@if(isset($locations))
												@foreach($locations as $location)
													<option value="{{ $location['id'] }}">{{ $location['name'] }}</option>
												@endforeach
											@endif
										</select>
									</div>
									<div class="form-group col-lg-5">
										<label for="district_id">District</label>
										<select id="district_dropdown" name="district_id" class="form-control">
											@if(isset($house_arr[0]))
												<option value="{{ $house_arr[0][0]['id'] }}">{{ $house_arr[0][0]['name'] }}</option>
											@else
												<option disabled>...Choose district...</option>
											@endif
										</select>
									</div>
									<div class="form-group col-lg-3">
										<label for="price">Price (VND)</label>
										@if(isset($house_arr))
											<input type="text" name="price" id="price" value="{{ $house_arr['price'] }}" class="form-control" required>
										@else
											<input type="text" name="price" id="price" placeholder="Example: 5678900000" class="form-control" required>
										@endif
									</div>
									<div class="form-group col-lg-12">
										<label for="description">Description</label>
										@if(isset($house_arr))
											<textarea rows="11" name="description" id="description" class="form-control" required>{{ $house_arr['description'] }}</textarea>
										@else
											<textarea rows="11" name="description" id="description" placeholder="Write a few words to your buyers..." class="form-control" required></textarea>
										@endif
									</div>
									<div class="form-group col-lg-4">
										<label for="width">Width (m)</label>
										@if(isset($house_arr))
											<input type="text" name="width" title="width" id="width" value="{{ $house_arr['width'] }}" class="form-control" required>
										@else
											<input type="text" name="width" title="width" id="width" placeholder="Example: 15" class="form-control" required>
										@endif
									</div>
									<div class="form-group col-lg-4">
										<label for="length">Length (m)</label>
										@if(isset($house_arr))
											<input type="text" name="length" title="length" id="length" value="{{ $house_arr['length'] }}" class="form-control" required>
										@else
											<input type="text" name="length" title="length" id="length" placeholder="Example: 20" class="form-control" required>
										@endif
									</div>
									<div class="form-group col-lg-4">
										<label for="status">Status</label>
										@if(isset($house_arr))
											<select name="status" class="form-control">
												<option>{{ $house_arr['status'] }}</option>
												<option id="true">Active</option>
												<option id="false">Non-Active</option>
											</select>
										@else
											<select name="status" class="form-control">
												<option id="true">Active</option>
												<option id="false">Non-Active</option>
											</select>
										@endif
									</div>
									@if(isset($house_arr))
										<div class="form-group col-lg-3">
											<label for="image">Image</label>
											<input type="file" name="image" title="image" id="image" class="form-control">
											<label for="image_two">Image 2</label>
											<input type="file" name="image_two" title="image_two" id="image_two" class="form-control">
											<label for="image_three">Image 3</label>
											<input type="file" name="image_three" title="image_three" id="image_three" class="form-control">
										</div>
										<div class="form-group col-lg-3">
											<label for="image">Main</label>
											@if(isset($house_arr['image']))
											<img src="{{ URL::to('/') }}/{{ $house_arr['image'] }}" width="150" height="190">
											@else
											<h4>Not yet uploaded!</h4>
											@endif
										</div><div class="form-group col-lg-3">
											<label for="image">Image 2</label>
											@if(isset($house_arr['image_two']))
											<img src="{{ URL::to('/') }}/{{ $house_arr['image_two'] }}" width="150" height="190">
											@else
											<h4>Not yet uploaded!</h4>
											@endif
										</div><div class="form-group col-lg-3">
											<label for="image">Image 3</label>
											@if(isset($house_arr['image_three']))
											<img src="{{ URL::to('/') }}/{{ $house_arr['image_three'] }}" width="150" height="190">
											@else
											<h4>Not yet uploaded!</h4>
											@endif
										</div>
									@else
										<div class="form-group col-lg-12">
											<label for="image">Image</label>
											<input type="file" name="image" title="image" id="image" class="form-control">
										</div>
										<div class="form-group col-lg-12">
											<label for="image_two">Image 2</label>
											<input type="file" name="image_two" title="image_two" id="image_two" class="form-control">
										</div>
										<div class="form-group col-lg-12">
											<label for="image_three">Image 3</label>
											<input type="file" name="image_three" title="image_three" id="image_three" class="form-control">
										</div>
									@endif
									
									
									<label class="ml-3">Agree to our <a href="">terms and conditions</a></label>
									<div class="form-group col-lg-1">
										<input type="checkbox" name="terms_complied" required checked>
									</div>
									<div class="form-group col-lg-11">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque venenatis nibh ac nisi venenatis, in cursus augue imperdiet. Suspendisse potenti. Etiam congue orci sed ipsum interdum dignissim. Nunc eget est interdum, vulputate est volutpat, ullamcorper nunc. Etiam cursus pulvinar tincidunt. Integer aliquam iaculis ante sed consectetur.
									</div>
									<label class="ml-3">Subcribe to our <a href="">news and listings</a></label>
									<div class="form-group col-lg-1">
										<input type="checkbox" name="news_subscribed" checked>
									</div>
									<div class="form-group col-lg-11">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque venenatis nibh ac nisi venenatis, in cursus augue imperdiet. Suspendisse potenti. Etiam congue orci sed ipsum interdum dignissim. Nunc eget est interdum, vulputate est volutpat, ullamcorper nunc. Etiam cursus pulvinar tincidunt. Integer aliquam iaculis ante sed consectetur.
									</div>
									<div class="form-group col-lg-12">
										<button type="submit" class="btn btn-success btn-lg text-white form-control">
											@if(isset($house_arr))
												UPDATE YOUR LISTING
											@else
												SUBMIT YOUR LISTING
											@endif
										</button>
									</div>
								</div>
							</div>
							<div class="panel-footer">
								<div class="row">
									<div class="col-lg-12">
										<img src="https://www.solidbackgrounds.com/images/3840x2160/3840x2160-pastel-yellow-solid-color-background.jpg" width="100%" height="110px">
									</div>
								</div>
							</div>
						</div>
					</form>
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
	  			$('#district_dropdown').children().hide();
	  			$('#district_dropdown').load(location.href + ' #district_dropdown');
	  			$.ajax({
	  				url:'location/change',
	  				method:'GET',
	  				dataType:'text',
	  				data:{location_id:value},
	  				success:function($response){
	  					$.each(JSON.parse($response), function(i, district){
	  						$('#district_dropdown').append('<option value="'+district.id+'">'+district.name+'</option>');
	  					});
	  				}
	  			});
	  		});
	  	});
	  </script>
@stop