<?php
/**
* Template Name: Front Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package some_like_it_neat
 */
get_header();?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'page-templates/partials/content', 'front' ); ?>

	<?php
	endwhile; // end of the loop. ?>

<?php //get_sidebar('front'); ?>

    </div>

</div>

<?php get_footer(); ?>
