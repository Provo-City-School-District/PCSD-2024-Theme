<!DOCTYPE html>
<html>

<head>
	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-FTPJPV04N2"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'G-FTPJPV04N2');
	</script>
	<meta charset="utf-8" />
	<title><?php if (is_home()) { ?>News | <?php } ?><?php if (is_page()) {
															the_title(); ?> | <?php } ?><?php if (is_single()) {
																							the_title(); ?> | <?php } ?><?php bloginfo('name'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:600" rel="stylesheet">
	<!--end Fonts -->
	<meta name="theme-color" content="#ffffff ">
	<?php
	wp_head();
	$theme_vars = my_theme_variables();
	?>
</head>

<body <?php body_class(); ?>>
	<a href="#mainContent" class="skip-nav-link">
		skip navigation
	</a>
	<header id="mainHeader">

		<div class="siteLogo griditem">
			<a href="<?php echo home_url(); ?>">
				<img alt="Provo City School District Home" class="websiteLogo" src="<?php echo $theme_vars['logo']; ?>" />
				<?php echo $theme_vars['full_school_name']; ?>
			</a>
		</div>

		<nav id="navbar">
			<?php wp_nav_menu(array('menu' => 'header-menu')); ?>
		</nav>
		<div class="siteSearch griditem">
			<a href="https://provo.edu/search-results/"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/search-loupe.svg" width="25px"></a>
		</div>

	</header><!-- end mainHeader -->