<?= $this->extend('Web/Layout/main') ?>

<?= $this->section('title') ?>

<?php echo $title ?? ''; ?>

<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<!-- Style da view -->
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!--===========================================
=            Popular deals section            =
============================================-->

<section class="popular-deals section bg-gray">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title">
						<h2>Trending Adds</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, magnam.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<!-- offer 01 -->
				<div class="col-lg-12">
					<div class="trending-ads-slide">
						<div class="col-sm-12 col-lg-4">
							<!-- product card -->
							<div class="product-item bg-light">
								<div class="card">
									<div class="thumb-content">
										<!-- <div class="price">$200</div> -->
										<a href="single.html">
											<img class="card-img-top img-fluid" src="<?php echo site_url('web/'); ?>images/products/products-1.jpg" alt="Card image cap">
										</a>
									</div>
									<div class="card-body">
										<h4 class="card-title"><a href="single.html">11inch Macbook Air</a></h4>
										<ul class="list-inline product-meta">
											<li class="list-inline-item">
												<a href="single.html"><i class="fa fa-folder-open-o"></i>Electronics</a>
											</li>
											<li class="list-inline-item">
												<a href="category.html"><i class="fa fa-calendar"></i>26th December</a>
											</li>
										</ul>
										<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>
										<div class="product-ratings">
											<ul class="list-inline">
												<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
												<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
												<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
												<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
												<li class="list-inline-item"><i class="fa fa-star"></i></li>
											</ul>
										</div>
									</div>
								</div>
							</div>



						</div>
						<div class="col-sm-12 col-lg-4">
							<!-- product card -->
							<div class="product-item bg-light">
								<div class="card">
									<div class="thumb-content">
										<!-- <div class="price">$200</div> -->
										<a href="single.html">
											<img class="card-img-top img-fluid" src="<?php echo site_url('web/'); ?>images/products/products-2.jpg" alt="Card image cap">
										</a>
									</div>
									<div class="card-body">
										<h4 class="card-title"><a href="single.html">Full Study Table Combo</a></h4>
										<ul class="list-inline product-meta">
											<li class="list-inline-item">
												<a href="single.html"><i class="fa fa-folder-open-o"></i>Furnitures</a>
											</li>
											<li class="list-inline-item">
												<a href="category.html"><i class="fa fa-calendar"></i>26th December</a>
											</li>
										</ul>
										<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>
										<div class="product-ratings">
											<ul class="list-inline">
												<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
												<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
												<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
												<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
												<li class="list-inline-item"><i class="fa fa-star"></i></li>
											</ul>
										</div>
									</div>
								</div>
							</div>



						</div>
						<div class="col-sm-12 col-lg-4">
							<!-- product card -->
							<div class="product-item bg-light">
								<div class="card">
									<div class="thumb-content">
										<!-- <div class="price">$200</div> -->
										<a href="single.html">
											<img class="card-img-top img-fluid" src="<?php echo site_url('web/'); ?>images/products/products-3.jpg" alt="Card image cap">
										</a>
									</div>
									<div class="card-body">
										<h4 class="card-title"><a href="single.html">11inch Macbook Air</a></h4>
										<ul class="list-inline product-meta">
											<li class="list-inline-item">
												<a href="single.html"><i class="fa fa-folder-open-o"></i>Electronics</a>
											</li>
											<li class="list-inline-item">
												<a href="category.html"><i class="fa fa-calendar"></i>26th December</a>
											</li>
										</ul>
										<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>
										<div class="product-ratings">
											<ul class="list-inline">
												<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
												<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
												<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
												<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
												<li class="list-inline-item"><i class="fa fa-star"></i></li>
											</ul>
										</div>
									</div>
								</div>
							</div>



						</div>
						<div class="col-sm-12 col-lg-4">
							<!-- product card -->
							<div class="product-item bg-light">
								<div class="card">
									<div class="thumb-content">
										<!-- <div class="price">$200</div> -->
										<a href="single.html">
											<img class="card-img-top img-fluid" src="<?php echo site_url('web/'); ?>images/products/products-2.jpg" alt="Card image cap">
										</a>
									</div>
									<div class="card-body">
										<h4 class="card-title"><a href="single.html">Full Study Table Combo</a></h4>
										<ul class="list-inline product-meta">
											<li class="list-inline-item">
												<a href="single.html"><i class="fa fa-folder-open-o"></i>Furnitures</a>
											</li>
											<li class="list-inline-item">
												<a href="category.html"><i class="fa fa-calendar"></i>26th December</a>
											</li>
										</ul>
										<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>
										<div class="product-ratings">
											<ul class="list-inline">
												<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
												<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
												<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
												<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
												<li class="list-inline-item"><i class="fa fa-star"></i></li>
											</ul>
										</div>
									</div>
								</div>
							</div>



						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<!-- Scripts da view -->
<script>
    toastr.warning('My name is Inigo Montoya. You killed my father, prepare to die!')
</script>

<?= $this->endSection() ?>





























	