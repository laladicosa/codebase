<!-- Header -->

<header class="header trans_300">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="header_container d-flex flex-row align-items-center trans_300">

					<!-- Logo -->

					<div class="logo_container">
						<a href="#">
							<div class="logo">
								<img src="images/logo.png" alt="">
								<span>the estate</span>
							</div>
						</a>
					</div>
					
					<!-- Main Navigation -->

					<nav class="main_nav">
						<ul class="main_nav_list">
							<li class="main_nav_item"><a href="/">home</a></li>
							<li class="main_nav_item"><a href="">about us</a></li>
							<li class="main_nav_item"><a href="{{ route('main.nhadat') }}">listings</a></li>
							<li class="main_nav_item"><a href="{{ route('danh-sach-nha.list') }}">post listing</a></li>
							<li class="main_nav_item"><a href="">news</a></li>
							<li class="main_nav_item"><a href="">contact</a></li>
						</ul>
					</nav>
					
					<!-- Phone Home -->

					<div class="phone_home bg-transparent text-center">
						<span>0856014248</span>
					</div>
					@if(!isset(Auth::user()->id))
					<div class="phone_home bg-transparent text-center">
						<a href="/signin"><span>Login</span></a>
					</div>
					@endif
					@if(isset(Auth::user()->image))
					<div class="phone_home bg-transparent text-center">
						<span><img src="{{ Auth::user()->image }}" width="36px" height="36px" class="rounded mb-1"></span>
					</div>

					<div class="phone_home bg-transparent text-center">
						<form action="{{ route('logout') }}" method="POST">
							@csrf
							<button type="submit" class="bg-transparent border-0"><span><i class="fas fa-sign-out-alt mr-1 ml-1"></i></span></button>
						</form>
					</div>
					@endif
					
					<!-- Hamburger -->

					<div class="hamburger_container menu_mm">
						<div class="hamburger menu_mm">
							<i class="fas fa-bars trans_200 menu_mm"></i>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Menu -->

	<div class="menu menu_mm">
		<ul class="menu_list">
			<li class="menu_item">
				<div class="container">
					<div class="row">
						<div class="col">
							<a href="#">home</a>
						</div>
					</div>
				</div>
			</li>
			<li class="menu_item">
				<div class="container">
					<div class="row">
						<div class="col">
							<a href="about.html">about us</a>
						</div>
					</div>
				</div>
			</li>
			<li class="menu_item">
				<div class="container">
					<div class="row">
						<div class="col">
							<a href="listings.html">listings</a>
						</div>
					</div>
				</div>
			</li>
			<li class="menu_item">
				<div class="container">
					<div class="row">
						<div class="col">
							<a href="news.html">news</a>
						</div>
					</div>
				</div>
			</li>
			<li class="menu_item">
				<div class="container">
					<div class="row">
						<div class="col">
							<a href="contact.html">contact</a>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>

</header>