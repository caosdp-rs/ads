<!DOCTYPE html>
<html lang="en">

<head>

	<!-- ** Basic Page Needs ** -->
	<meta charset="utf-8">


	<!-- ** Mobile Specific Metas ** -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Agency HTML Template">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

	<meta name="<?php echo csrf_token() ?>" content="<?php echo csrf_hash(); ?>" class="csrf" />

	<title><?php echo $this->renderSection('title') ?>-<?php echo ' ' . env('APP_NAME'); ?> </title>

	<meta name="author" content="Carlos Silva">
	<meta name="generator" content="">

	<!-- theme meta -->
	<meta name="theme-name" content="classimax" />

	<!-- favicon -->
	<link href="<?php echo site_url('web/'); ?>images/favicon.png" rel="shortcut icon">

	<!-- 
  Essential stylesheets
  =====================================-->
	<link href="<?php echo site_url('web/'); ?>plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo site_url('web/'); ?>plugins/bootstrap/bootstrap-slider.css" rel="stylesheet">
	<link href="<?php echo site_url('web/'); ?>plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo site_url('web/'); ?>plugins/slick/slick.css" rel="stylesheet">
	<link href="<?php echo site_url('web/'); ?>plugins/slick/slick-theme.css" rel="stylesheet">
	<link href="<?php echo site_url('web/'); ?>plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">

	<link href="<?php echo site_url('web/'); ?>css/style.css" rel="stylesheet">

	<?php echo $this->renderSection('styles') ?>

</head>

<body class="body-wrapper">


	<header>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<nav class="navbar navbar-expand-lg navbar-light navigation">
						<a class="navbar-brand" href="<?php echo route_to('web.home') ?>">
							<img src="<?php echo site_url('web/'); ?>images/logo.png" alt="">
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav ml-auto main-nav ">
								<li class="nav-item active">
									<a class="nav-link" href="<?php echo route_to('web.home'); ?>">Home</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo route_to('pricing'); ?>">Nossos Planos</a>
								</li>

								<?php if (auth()->check()) : ?>
									<?php if (!auth()->user()->isSuperAdmin()) : ?>

										<li class="nav-item">
											<a class="nav-link" href="<?php echo route_to('dashboard'); ?>">Dashboard</a>
										</li>
										<li class="nav-item dropdown dropdown-slide @@dashboard">
											<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#!">Dashboard<span><i class="fa fa-angle-down"></i></span>
											</a>

											<!-- Dropdown list -->
											<ul class="dropdown-menu">
												<li><a class="dropdown-item @@dashboardPage" href="dashboard.html">Dashboard</a></li>
												<li><a class="dropdown-item @@dashboardMyAds" href="dashboard-my-ads.html">Dashboard My Ads</a></li>
												<li><a class="dropdown-item @@dashboardFavouriteAds" href="dashboard-favourite-ads.html">Dashboard Favourite Ads</a></li>
												<li><a class="dropdown-item @@dashboardArchivedAds" href="dashboard-archived-ads.html">Dashboard Archived Ads</a></li>
												<li><a class="dropdown-item @@dashboardPendingAds" href="dashboard-pending-ads.html">Dashboard Pending Ads</a></li>

												<li class="dropdown dropdown-submenu dropright">
													<a class="dropdown-item dropdown-toggle" href="#!" id="dropdown0501" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sub Menu</a>

													<ul class="dropdown-menu" aria-labelledby="dropdown0501">
														<li><a class="dropdown-item" href="index.html">Submenu 01</a></li>
														<li><a class="dropdown-item" href="index.html">Submenu 02</a></li>
													</ul>
												</li>
											</ul>
										</li>

									<?php else : ?>

										<li class="nav-item">
											<a class="nav-link" href="<?php echo route_to('manager') ?>">Manager</a>
										</li>

									<?php endif; ?>

								<?php endif; ?>


								<li class="nav-item dropdown dropdown-slide @@pages">
									<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Pages <span><i class="fa fa-angle-down"></i></span>
									</a>
									<!-- Dropdown list -->
									<ul class="dropdown-menu">
										<li><a class="dropdown-item @@about" href="about-us.html">About Us</a></li>
										<li><a class="dropdown-item @@contact" href="contact-us.html">Contact Us</a></li>
										<li><a class="dropdown-item @@profile" href="user-profile.html">User Profile</a></li>
										<li><a class="dropdown-item @@404" href="404.html">404 Page</a></li>
										<li><a class="dropdown-item @@package" href="package.html">Package</a></li>
										<li><a class="dropdown-item @@singlePage" href="single.html">Single Page</a></li>
										<li><a class="dropdown-item @@store" href="store.html">Store Single</a></li>
										<li><a class="dropdown-item @@blog" href="blog.html">Blog</a></li>
										<li><a class="dropdown-item @@singleBlog" href="single-blog.html">Blog Details</a></li>
										<li><a class="dropdown-item @@terms" href="terms-condition.html">Terms &amp; Conditions</a></li>
									</ul>
								</li>
								<li class="nav-item dropdown dropdown-slide @@listing">
									<a class="nav-link dropdown-toggle" href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Listing <span><i class="fa fa-angle-down"></i></span>
									</a>
									<!-- Dropdown list -->
									<ul class="dropdown-menu">
										<li><a class="dropdown-item @@category" href="category.html">Ad-Gird View</a></li>
										<li><a class="dropdown-item @@listView" href="ad-list-view.html">Ad-List View</a></li>

										<li class="dropdown dropdown-submenu dropleft">
											<a class="dropdown-item dropdown-toggle" href="#!" id="dropdown0201" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sub Menu</a>

											<ul class="dropdown-menu" aria-labelledby="dropdown0201">
												<li><a class="dropdown-item" href="index.html">Submenu 01</a></li>
												<li><a class="dropdown-item" href="index.html">Submenu 02</a></li>
											</ul>
										</li>
									</ul>
								</li>
							</ul>
							<ul class="navbar-nav ml-auto mt-10">
							<?php if (!auth()->check()) : ?>

								

									<li class="nav-item">
										<a class="nav-link login-button" href="<?php echo route_to('login'); ?>">Login</a>
									</li>

									<li class="nav-item">
										<a class="nav-link login-button" href="<?php echo route_to('register'); ?>">Registre-se</a>
									</li>

							

							<?php endif; ?>

							<li class="nav-item">
								<a class="nav-link text-white add-button" href="<?php echo route_to('dashboard'); ?>"><i class="fa fa-plus-circle"></i> Criar Anúncio </a>
							</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</header>

	<!--===============================
=            Hero Area            =
================================-->

	<section class="hero-area bg-1 text-center overly">
		<!-- Container Start -->
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!-- Header Contetnt -->
					<div class="content-block">
						<h1>Buy & Sell Near You </h1>
						<p>Join the millions who buy and sell from each other <br> everyday in local communities around the world</p>
						<div class="short-popular-category-list text-center">
							<h2>Popular Category</h2>
							<ul class="list-inline">
								<li class="list-inline-item">
									<a href="category.html"><i class="fa fa-bed"></i> Hotel</a>
								</li>
								<li class="list-inline-item">
									<a href="category.html"><i class="fa fa-grav"></i> Fitness</a>
								</li>
								<li class="list-inline-item">
									<a href="category.html"><i class="fa fa-car"></i> Cars</a>
								</li>
								<li class="list-inline-item">
									<a href="category.html"><i class="fa fa-cutlery"></i> Restaurants</a>
								</li>
								<li class="list-inline-item">
									<a href="category.html"><i class="fa fa-coffee"></i> Cafe</a>
								</li>
							</ul>
						</div>

					</div>
					<!-- Advance Search -->
					<div class="advance-search">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-lg-12 col-md-12 align-content-center">
									<form>
										<div class="form-row">
											<div class="form-group col-xl-4 col-lg-3 col-md-6">
												<input type="text" class="form-control my-2 my-lg-1" id="inputtext4" placeholder="What are you looking for">
											</div>
											<div class="form-group col-lg-3 col-md-6">
												<select class="w-100 form-control mt-lg-1 mt-md-2">
													<option>Category</option>
													<option value="1">Top rated</option>
													<option value="2">Lowest Price</option>
													<option value="4">Highest Price</option>
												</select>
											</div>
											<div class="form-group col-lg-3 col-md-6">
												<input type="text" class="form-control my-2 my-lg-1" id="inputLocation4" placeholder="Location">
											</div>
											<div class="form-group col-xl-2 col-lg-3 col-md-6 align-self-center">
												<button type="submit" class="btn btn-primary active w-100">Search Now</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Container End -->
	</section>


	<!-- Page content-->

	<?php echo $this->include('Web/Layout/_session_messages'); ?>

	<?php echo $this->renderSection('content') ?>




	<!--====================================
=            Call to Action            =
=====================================-->

	<section class="call-to-action overly bg-3 section-sm">
		<!-- Container Start -->
		<div class="container">
			<div class="row justify-content-md-center text-center">
				<div class="col-md-8">
					<div class="content-holder">
						<h2>Start today to get more exposure and
							grow your business</h2>
						<ul class="list-inline mt-30">
							<li class="list-inline-item"><a class="btn btn-main" href="ad-listing.html">Add Listing</a></li>
							<li class="list-inline-item"><a class="btn btn-secondary" href="category.html">Browser Listing</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- Container End -->
	</section>




	<!--============================
=            Footer            =
=============================-->

	<footer class="footer section section-sm">
		<!-- Container Start -->
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-7 offset-md-1 offset-lg-0 mb-4 mb-lg-0">
					<!-- About -->
					<div class="block about">
						<!-- footer logo -->
						<img src="<?php echo site_url('web/'); ?>images/logo-footer.png" alt="logo">
						<!-- description -->
						<p class="alt-color">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
							incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
							laboris nisi ut aliquip ex ea commodo consequat.</p>
					</div>
				</div>
				<!-- Link list -->
				<div class="col-lg-2 offset-lg-1 col-md-3 col-6 mb-4 mb-lg-0">
					<div class="block">
						<h4>Site Pages</h4>
						<ul>
							<li><a href="dashboard-my-ads.html">My Ads</a></li>
							<li><a href="dashboard-favourite-ads.html">Favourite Ads</a></li>
							<li><a href="dashboard-archived-ads.html">Archived Ads</a></li>
							<li><a href="dashboard-pending-ads.html">Pending Ads</a></li>
							<li><a href="terms-condition.html">Terms & Conditions</a></li>
						</ul>
					</div>
				</div>
				<!-- Link list -->
				<div class="col-lg-2 col-md-3 offset-md-1 offset-lg-0 col-6 mb-4 mb-md-0">
					<div class="block">
						<h4>Admin Pages</h4>
						<ul>
							<li><a href="category.html">Category</a></li>
							<li><a href="single.html">Single Page</a></li>
							<li><a href="store.html">Store Single</a></li>
							<li><a href="single-blog.html">Single Post</a>
							</li>
							<li><a href="blog.html">Blog</a></li>



						</ul>
					</div>
				</div>
				<!-- Promotion -->
				<div class="col-lg-4 col-md-7">
					<!-- App promotion -->
					<div class="block-2 app-promotion">
						<div class="mobile d-flex  align-items-center">
							<a href="index.html">
								<!-- Icon -->
								<img src="<?php echo site_url('web/'); ?>images/footer/phone-icon.png" alt="mobile-icon">
							</a>
							<p class="mb-0">Get the Dealsy Mobile App and Save more</p>
						</div>
						<div class="download-btn d-flex my-3">
							<a href="index.html"><img src="<?php echo site_url('web/'); ?>images/apps/google-play-store.png" class="img-fluid" alt=""></a>
							<a href="index.html" class=" ml-3"><img src="<?php echo site_url('web/'); ?>images/apps/apple-app-store.png" class="img-fluid" alt=""></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Container End -->
	</footer>
	<!-- Footer Bottom -->
	<footer class="footer-bottom">
		<!-- Container Start -->
		<div class="container">
			<div class="row">
				<div class="col-lg-6 text-center text-lg-left mb-3 mb-lg-0">
					<!-- Copyright -->
					<div class="copyright">
						<p>Copyright &copy; <script>
								var CurrentYear = new Date().getFullYear()
								document.write(CurrentYear)
							</script>. Designed & Developed by <a class="text-white" href="https://themefisher.com">Themefisher</a></p>
					</div>
				</div>
				<div class="col-lg-6">
					<!-- Social Icons -->
					<ul class="social-media-icons text-center text-lg-right">
						<li><a class="fa fa-facebook" href="https://www.facebook.com/themefisher"></a></li>
						<li><a class="fa fa-twitter" href="https://www.twitter.com/themefisher"></a></li>
						<li><a class="fa fa-pinterest-p" href="https://www.pinterest.com/themefisher"></a></li>
						<li><a class="fa fa-github-alt" href="https://www.github.com/themefisher"></a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- Container End -->
		<!-- To Top -->
		<div class="scroll-top-to">
			<i class="fa fa-angle-up"></i>
		</div>
	</footer>

	<!-- 
Essential Scripts
=====================================-->
	<script src="<?php echo site_url('web/'); ?>plugins/jquery/jquery.min.js"></script>
	<script src="<?php echo site_url('web/'); ?>plugins/bootstrap/popper.min.js"></script>
	<script src="<?php echo site_url('web/'); ?>plugins/bootstrap/bootstrap.min.js"></script>
	<script src="<?php echo site_url('web/'); ?>plugins/bootstrap/bootstrap-slider.js"></script>
	<script src="<?php echo site_url('web/'); ?>plugins/tether/js/tether.min.js"></script>
	<script src="<?php echo site_url('web/'); ?>plugins/raty/jquery.raty-fa.js"></script>
	<script src="<?php echo site_url('web/'); ?>plugins/slick/slick.min.js"></script>
	<script src="<?php echo site_url('web/'); ?>plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
	<!-- google map -->
	<!-- <script src="https://maps.googleapis.com/maps/api/js?key=ver_no_original_se_precisar" defer></script>-->
	<!-- <script src="<?php //echo site_url('web/'); 
						?>plugins/google-map/map.js" defer></script> -->

	<script src="<?php echo site_url('web/'); ?>js/script.js"></script>
	<script src="<?php echo site_url('manager_assets/toast/toastr.min.js') ?>"></script>

	<?php echo $this->renderSection('scripts') ?>
</body>

</html>