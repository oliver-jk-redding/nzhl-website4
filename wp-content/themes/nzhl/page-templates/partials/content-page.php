<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package some_like_it_neat
 */
?>

<div id="home">

  <div class="content">
		<?php //if( get_field('header_image') ): ?>
			<!-- <div class="intro-image"> -->
				<?php //echo '<img src="' . get_field('header_image') . '">'; ?>
			<!-- </div> -->
		<?php //endif;?>

		<h2><?php the_title(); ?></h2>

		<?php the_content(); ?>

	</div>
