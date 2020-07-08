<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

	<!--- basic page needs
    ================================================== -->
	<meta charset="utf-8">
	<title>SIGAKA</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- mobile specific metas
    ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSS
    ================================================== -->
	<link rel="stylesheet" href="<?= base_url()?>assets/frontend/css/base.css">
	<link rel="stylesheet" href="<?= base_url()?>assets/frontend/css/vendor.css">
	<link rel="stylesheet" href="<?= base_url()?>assets/frontend/css/main.css">
	<link rel="stylesheet" href="<?= base_url()?>assets/frontend/css/slideshow.css">

	<!-- script
    ================================================== -->
	<script src="<?=base_url()?>assets/frontend/js/modernizr.js"></script>
	<script src="<?=base_url()?>assets/frontend/js/pace.min.js"></script>

	<!-- favicons
    ================================================== -->
	<link rel="shortcut icon" href="<?= base_url() ?>assets/images/logo/63-512.png" type="image/x-icon">
	<link rel="icon" href="<?= base_url() ?>assets/images/logo/63-512.png" type="image/x-icon">

</head>

<body id="top">

<!-- header
================================================== -->
<header class="s-header">

<!--	<div class="header-logo">-->
<!--		<a class="site-logo" href="--><?//= base_url()?><!--assets/frontend/index.html">-->
<!--			<img src="--><?//= base_url()?><!--assets/frontend/images/logo.svg" alt="Homepage">-->
<!--		</a>-->
<!--	</div> -->
	<!-- end header-logo -->

	<nav class="header-nav">

		<a href="#0" class="header-nav__close" title="close"><span>Close</span></a>

		<div class="header-nav__content">
			<h3>Menu</h3>
			<ul class="header-nav__list">
				<li><a href="<?=base_url('login')?>" title="login">Login</a></li>
			</ul>
		</div> <!-- end header-nav__content -->

	</nav> <!-- end header-nav -->

	<a class="header-menu-toggle" href="#0">
		<span class="header-menu-icon"></span>
	</a>

</header> <!-- end s-header -->


<!-- home
================================================== -->
<section id="home" class="s-home target-section" data-parallax="scroll" data-image-src="<?= base_url()?>assets/frontend/images/sigaka/background.png" data-natural-width=3000 data-natural-height=2000 data-position-y=top>

	<div class="shadow-overlay"></div>

	<div class="home-content">

		<div class="row home-content__main">
			<h1>
				Sigaka. <br>
			</h1>

			<p>
				Sistem Informasi Gaji Karyawan
			</p>
		</div> <!-- end home-content__main -->

	</div> <!-- end home-content -->

	<!-- <ul class="home-sidelinks">
		<li><a class="smoothscroll" href="#gallery">Gallery<span>who are we</span></a></li>
		<li><a class="smoothscroll" href="#location">Location<span>where are we</span></a></li>
		<li><a  class="smoothscroll" href="#contact">Contact<span>get in touch</span></a></li>
	</ul>  --><!-- end home-sidelinks -->

	
</section> <!-- end s-home -->




<!-- preloader
================================================== -->
<div id="preloader">
	<div id="loader">
	</div>
</div>


<!-- Java Script
================================================== -->
<script src="<?=base_url()?>assets/frontend/js/jquery-3.2.1.min.js"></script>
<script src="<?=base_url()?>assets/frontend/js/plugins.js"></script>
<script src="<?=base_url()?>assets/frontend/js/main.js"></script>
<script type="text/javascript">
	var slideIndex = 1;
	showSlides(slideIndex);

	// Next/previous controls
	function plusSlides(n) {
		showSlides(slideIndex += n);
	}

	// Thumbnail image controls
	function currentSlide(n) {
		showSlides(slideIndex = n);
	}

	function showSlides(n) {
		var i;
		var slides = document.getElementsByClassName("mySlides");
		var dots = document.getElementsByClassName("dot");
		if (n > slides.length) {slideIndex = 1}
		if (n < 1) {slideIndex = slides.length}
		for (i = 0; i < slides.length; i++) {
			slides[i].style.display = "none";
		}
		for (i = 0; i < dots.length; i++) {
			dots[i].className = dots[i].className.replace(" active", "");
		}
		slides[slideIndex-1].style.display = "block";
		dots[slideIndex-1].className += " active";
	}
</script>

</body>

</html>
