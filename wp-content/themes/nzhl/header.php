<?php
echo getenv('WP_ENV');
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package some_like_it_neat
 */
?>
<!DOCTYPE html>
<?php tha_html_before(); ?>
<html <?php language_attributes(); ?>>
<head>
	<?php tha_head_top(); ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google-site-verification" content="LWJ-GMR_j6tDtEU5YTFKwqSvyhfiWgZZ9l7FuU3Q6P0" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<script>try{Typekit.load();}catch(e){}</script>

	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-65996802-1', 'auto');
		ga('send', 'pageview');

	</script>

	<?php tha_head_bottom(); ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php tha_body_top(); ?>

		<?php tha_header_before(); ?>

		<?php if (is_front_page()) { ?>
		<div id="banner" class="parallax-window" data-parallax="scroll" data-image-src="wp-content/themes/nzhl/assets/img/wallpaper-pics/wallpaper-3.jpg" data-position="center center" data-speed="0.3" role="banner"></div>
		<div id="banner-logo"></div>
		<header id="masthead" class="page-header with-banner">
		<?php } else { ?>
		<header id="masthead" class="page-header">
		<?php } ?>

			<?php tha_header_top(); ?>

			<div class="topbox">
				<div class="logo-box">
					<a class="logo" href='<?php echo get_site_url(); ?>'></a>
				</div>
				<a class="name" href='<?php echo get_site_url(); ?>'>The New Zealand Hobbit League</a>

				<div id="header-search">
					<div id="search-icon">
						<!-- <span class="dashicons dashicons-search"></span> -->
					</div><!-- header-search-icon -->

					<?php get_search_form(); ?>
				</div><!-- #header-search -->

				<!-- <a id ="navmenu" href="#">Menu</a> -->
				<!-- <div id="device_menu_trigger"> -->
					<div id="nav-icon">
					  <span></span>
					  <span></span>
					  <span></span>
					  <span></span>
					</div>
				<!-- </div> -->

				<nav class="nav-collapse" id="hideshow">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary-navigation',
			                'items_wrap' => '<ul data-breakpoint=" '. esc_attr( get_theme_mod( 'some_like_it_neat_mobile_min_width', '768' ) ) .' " id="%1$s" class="%2$s main-nav">%3$s</ul>', // Adding data-breakpoint for FlexNav
			                )
						);
						?>
				</nav><!-- #site-navigation -->

			</div>



				<?php tha_header_bottom(); ?>
			</header><!-- #masthead -->
			<?php tha_header_after(); ?>
			<div id="page" class="page-container">

			<?php tha_content_before(); ?>
			<main id="main" class="site-main wrap" role="main">
				<?php tha_content_top(); ?>
