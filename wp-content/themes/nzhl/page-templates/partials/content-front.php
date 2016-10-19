<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package some_like_it_neat
 */
?>

<div id="home">

	<div class="splash-image-container show">
		<div class="splash-image">
			<div id="nzhl-logo"></div>
		</div>
		<div class="splash-nav">
			<a class="logo-box" href='<?php echo get_site_url(); ?>'></a>
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
	</div>

	<div class="content">
		<?php //if( get_field('header_image') ): ?>
			<!-- <div class="intro-image"> -->
				<?php //echo '<img src="' . get_field('header_image') . '">'; ?>
			<!-- </div> -->
		<?php //endif;?>

		<?php the_content(); ?>

	</div>
