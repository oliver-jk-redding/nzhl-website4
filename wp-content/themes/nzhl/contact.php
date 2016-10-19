<?php
/* Template Name: Contact Page */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'page-templates/partials/content', 'contact' ); ?>

		<?php
				// If comments are open or we have at least one comment, load up the comment template
		if ( comments_open() || '0' != get_comments_number() ) :
			comments_template();
		endif;
		?>

	<?php
	endwhile; // end of the loop. ?>


<?php get_sidebar('contact'); ?>

    </div>

</div>

<?php get_footer(); ?>
