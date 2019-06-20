@extends('frontend.core.main')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('styles/listings_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/listings_responsive.css') }}">

<style>
	.above{
		background-color: #0e1d41;
	}
	.ef{
		background-color: #0e1d41;
		padding:5px 15px;
		/*border-radius: 3px;*/
	}
	.ed{
		background-color: red;
		padding:5px 15px;
		/*border-radius: 3px;*/
	}
	.eda{
		background-color: #0e1d41;
		padding:10px 30px;
	}
	.efa{
		background-color: #0e1d41;
		padding:15px 50px;
	}
	.edfd{
		background-color: red;
		padding:15px 30px;
	}

	.edad{
		background-color: red;
		padding:15px 30px;
	}
	.switcher-active{
		background-color: #0e1d41;
		font-weight: bold;
		font-size: 20px;
		cursor: pointer;
	}
	.non-switcher-active{
		background-color: #636972;
		text-decoration: underline;
		cursor: pointer;
	}
	.active_state{
		display: block;
	}

	.non_active_state{
		display: none;
	}
	.active_text{
		background-color: green;
	}
	.listing_title{
		margin-top: -10px;
	}
</style>
@endsection

@section('content')
	
	<!-- Home -->
	<div class="home">
		<!-- Image by: https://unsplash.com/@jbriscoe -->
		<div class="home_background" style="background-image:url('{{ asset('images/listings.jpg') }}')"></div>
		
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
				</div>

				<!-- Listings -->

				
					<div class="col-lg-8 listings_col">
						  @if(Session::has('success'))
						      <div class="alert alert-success">
						          {{ Session::get('success') }}
						      </div>
						  @endif
						  @if(Session::has('warning'))
						      <div class="alert alert-success">
						          {{ Session::get('warning') }}
						      </div>
						  @endif
						  <div class="above pt-3 pb-4 mb-2">
						  	<h3 class="text-white ml-4">
						  		All 
						  		@if(isset($hs))
						  			@if(isset($hs[0]) && isset($hs[1]))
						  				{{ $hs[2] }} listings of {{ Auth::user()->name }}
						  			@else
						  				{{ sizeof($hs[0]) }} listings of {{ Auth::user()->name }}
						  			@endif
						  		@endif

						  	</h3>
						  	<a href="{{ route('nha.dat') }}"><small class="text-white ml-4"><i class="fas fa-plus"></i> Click here to post another listing.</small></a>
						  </div>
						  @if(isset($hs))
							  @if(sizeof($hs[0]) < 1)
							  	<h3>You don't have any listings! Please <a href="{{ route('nha.dat') }}">post one</a>.</h3>
							  @endif
						  @else
						  		<h3>You don't have any listings! Please <a href="{{ route('nha.dat') }}">post one</a>.</h3>
						  @endif

						  @if(!isset($hs[1]))
						  	<!-- Nothing -->
						  @else
						  	<div class="row">
						  			<div class="switcher-active pt-2 pb-3 mb-2 col-lg-4 ml-3 text-white" id="actively">
						  					Features List <i class="fas fa-hand-pointer"></i>
						  			</div>
						  			<div class="non-switcher-active pt-2 pb-3 mb-2 col-lg-4 text-white" id="non_actively">
						  					All <i class="fas fa-hand-pointer"></i>
						  			</div>	
						  	</div>
						  @endif

						<!-- Listings Item -->
						@if(isset($hs) && isset($hs[0]))
							@foreach($hs[0] as $key => $h)
							<div class="listing_item active_state feature_up_first">
								<div class="listing_item_inner d-flex flex-md-row flex-column trans_300">
									<div class="listing_image_container">
										<div class="listing_image">
											<!-- Image by: https://unsplash.com/@breather -->
											<div class="listing_background" style="background-image:url('{{ URL::to('/') }}/{{ $h['image'] }}')"></div>
										</div>
										<div class="featured_card_box d-flex flex-row align-items-center trans_300">
											<img src="{{ asset('images/tag.svg') }}" alt="https://www.flaticon.com/authors/lucy-g">
											<div class="featured_card_box_content">
												<div class="featured_card_price_title trans_300">Actual price</div>
												<div class="featured_card_price trans_300">{{ $h['price'] }} VND</div>
											</div>
										</div>
									</div>
									<div class="listing_content">
										@if(isset($h[1][0]['name']) && $h[1]['name'])<p><i class="fas fa-map-marker-alt"></i> <a href="">{{ $h[1][0]['name'] }} - {{ $h[1]['name'] }}</a></p>@else <p></p> @endif
										<div class="listing_title"><a href="{{ route('thong-tin-nha.info', ['id'=>$h['id'], 'slug'=>$h['slug']]) }}">{{ $h['title'] }}</a>
										<br>
										@if(isset($h['updated_at']))
											Updated: {{ date('d/m/Y', strtotime($h['updated_at'])) }}
										@else
											Created: {{ date('d/m/Y', strtotime($h['created_at'])) }}
										@endif</div>
										<div class="listing_text">
											<span>Currently @if($h['status'] == 'Active') <span class="text-success">Active</span> @else <span class="text-danger">Not Active</span> @endif</span> |
											@if(isset($h[0]))
												<a href="{{ route('sua-tien-ich.edit', ['id'=>$h[0]['id']]) }}" class="ef text-white"><i class="fas fa-edit"></i>Edit Features</a><a href="" class="ed text-white"><i class="fas fa-trash-alt"></i></a>
											@else
												<a href="{{ route('tien-ich.feature', ['id'=>$h['id']]) }}" class="ef text-white"><i class="fas fa-edit"></i>Add Features</a><a href="" class="ed text-white"><i class="fas fa-trash-alt"></i></a>
											@endif
										</div>
										<div class="rooms">

											<div class="room">
												<span class="room_title">Bedrooms</span>
												<div class="room_content">
													<div class="room_image"><img src="{{ asset('images/bedroom.png') }}" alt=""></div>
													<span class="room_number">@if(isset($h[0]['bedroom'])){{ $h[0]['bedroom'] }} @else 0 @endif</span>
												</div>
											</div>

											<div class="room">
												<span class="room_title">Bathrooms</span>
												<div class="room_content">
													<div class="room_image"><img src="{{ asset('images/shower.png') }}" alt=""></div>
													<span class="room_number">@if(isset($h[0]['bathroom'])){{ $h[0]['bathroom'] }} @else 0 @endif</span>
												</div>
											</div>

											<div class="room">
												<span class="room_title">Area</span>
												<div class="room_content">
													<div class="room_image"><img src="{{ asset('images/area.png') }}" alt=""></div>
													<span class="room_number">{{ $h['width'] * $h['length'] }} Sq Ft</span>
												</div>
											</div>

										</div>

										<div class="room_tags">
											<span class="room_tag">
												<a href="">
													Living Room @if(isset($h[0]['living_room'])) {{ $h[0]['living_room'] }} @else 0 @endif
												</a>
											</span>
											<span class="room_tag">
												<a href="">
													Kitchen @if(isset($h[0]['kitchen'])) {{ $h[0]['kitchen'] }} @else 0 @endif
												</a>
											</span>
											<span class="room_tag">
												<a href="">
													Toilet @if(isset($h[0]['toilet'])) {{ $h[0]['toilet'] }} @else 0 @endif
												</a>
											</span>
											<span class="room_tag">
												<a href="">
													Garage @if(isset($h[0]['garage'])) {{ $h[0]['garage'] }} @else 0 @endif
												</a>
											</span>
											<span class="room_tag">
												<a href="">
													Swimming Pool @if(isset($h[0]['swimming_pool'])) {{ $h[0]['swimming_pool'] }} @else 0 @endif
												</a>
											</span>
											<span class="room_tag">
												<a href="">
													Patio @if(isset($h[0]['patio'])) {{ $h[0]['patio'] }} @else 0 @endif
												</a>
											</span>
											<span class="room_tag">
												<a href="">
													Garden @if(isset($h[0]['garden'])) {{ $h[0]['garden'] }} @else 0 @endif
												</a>
											</span>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						@endif
						@if(isset($hs) & isset($hs[1]))
							@foreach($hs[1] as $key => $h)
							<div class="listing_item non_active_state no_feature">
								<div class="listing_item_inner d-flex flex-md-row flex-column trans_300">
									<div class="listing_image_container">
										<div class="listing_image">
											<!-- Image by: https://unsplash.com/@breather -->
											<div class="listing_background" style="background-image:url('{{ URL::to('/') }}/{{ $h['image'] }}')"></div>
										</div>
										<div class="featured_card_box d-flex flex-row align-items-center trans_300">
											<img src="{{ asset('images/tag.svg') }}" alt="https://www.flaticon.com/authors/lucy-g">
											<div class="featured_card_box_content">
												<div class="featured_card_price_title trans_300">Actual price</div>
												<div class="featured_card_price trans_300">{{ $h['price'] }} VND</div>
											</div>
										</div>
									</div>
									<div class="listing_content">
										<div class="listing_title mt-3">
											<a href="{{ route('thong-tin-nha.info', ['id'=>$h['id'], 'slug'=>$h['slug']]) }}">{{ $h['title'] }}</a><br>
											@if(isset($h['updated_at']))
												Updated at: {{ date('d-m-Y', strtotime($h['updated_at'])) }}
											@else
												Created at: {{ date('d-m-Y', strtotime($h['created_at'])) }}
											@endif
										</div>
										<div class="listing_text">
											<span class="text-info">Description:</span>
											{{ str_limit($h['description'], 100) }}
											<hr>
											<small>Currently @if($h['status'] == 'Active') <span class="text-success">active</span> @else <span class="text-danger">not active</span> @endif on the market</small>
											<div class="room ml-3">
												<div class="room_content">
													<div class="room_image"><img src="{{ asset('images/area.png') }}" alt=""></div>
													<span class="room_number">{{ $h['width'] * $h['length'] }} Sq Ft</span>
												</div>
											</div>
											<hr>
										</div>
										@if(isset($h[0]))
											<div class="room_tags">
												<a href="{{ route('sua-tien-ich.edit', ['id'=>$h[0]['id']]) }}" class="ef text-white"><i class="fas fa-edit"></i> Features</a><a href="" class="edad text-white"><i class="fas fa-trash-alt"></i></a>
											</div>
										@else
											<div class="room_tags">
												<a href="{{ route('tien-ich.feature', ['id'=>$h['id']]) }}" class="efa text-white"><i class="fas fa-edit"></i>Add Features</a>
												<a href="" class="edfd text-white"><i class="fas fa-trash-alt"></i></a>
											</div>
										@endif
									</div>
								</div>
							</div>
							@endforeach
						@endif
					</div>
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
							<div class="weekly_offer_image" style="background-image:url('{{ asset('images/weekly.jpg') }}')"></div>
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
	  		$('#non_actively').on('click', function(){
	  			$('#actively').removeClass('switcher-active')
	  					      .addClass('non-switcher-active');
	  			$(this).removeClass('non-switcher-active')
	  				   .addClass('switcher-active');
	  			$('.feature_up_first').removeClass('active_state');
	  			$('.feature_up_first').addClass('non_active_state');
	  			$('.no_feature').removeClass('non_active_state');
	  			$('.no_feature').addClass('active_state');
	  		});

	  		$('#actively').on('click', function(){
	  			$('#non_actively').removeClass('switcher-active')
	  					      .addClass('non-switcher-active');
	  			$(this).removeClass('non-switcher-active')
	  				   .addClass('switcher-active');
	  		    $('.feature_up_first').addClass('active_state');
	  		    $('.feature_up_first').removeClass('non_active_state');
	  		    $('.no_feature').addClass('non_active_state');
	  		    $('.no_feature').removeClass('active_state');
	  		});
	  	});
	  </script>

@stop