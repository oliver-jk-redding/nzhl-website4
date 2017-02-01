<?php
/**
 * The template for displaying Archive pages.
 *
 */

$the_query = $wp_query;

get_header(); ?>

<div id="blog">

	<div class="content">

		<?php if ( have_posts() ) : ?>

			<h1 class="page-title">

				<?php

					if ( function_exists( 'get_the_archive_title' ) ) :
						echo get_the_archive_title();

					elseif ( is_category() ) :
						single_cat_title();

					elseif ( is_tag() ) :
						single_tag_title();

					elseif ( is_author() ) :
						/* Queue the first post, that way we know
		         * what author we're dealing with (if that is the case).
		         */
						the_post();
						printf( __( 'Author: %s', 'some-like-it-neat' ), '<span class="vcard">' . get_the_author() . '</span>' );
						/* Since we called the_post() above, we need to
		         * rewind the loop back to the beginning that way
		         * we can run the loop properly, in full.
		         */
						rewind_posts();

					elseif ( is_day() ) :
						printf( __( 'Day: %s', 'some-like-it-neat' ), '<span>' . get_the_date() . '</span>' );

					elseif ( is_month() ) :
						printf( __( 'Month: %s', 'some-like-it-neat' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'some-like-it-neat' ) ) . '</span>' );

					elseif ( is_year() ) :
						printf( __( 'Year: %s', 'some-like-it-neat' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'some-like-it-neat' ) ) . '</span>' );

					elseif ( is_tax() ) :
						+ single_term_title();

					else :
						_e( 'Archives', 'some-like-it-neat' );

					endif;

				?>

			</h1>

			<?php
				// Show an optional term description.
				if ( function_exists( 'get_the_archive_description' ) ) :
					echo '<div class="taxonomy-description">'.get_the_archive_description().'</div>';
				elseif ( $term_description = term_description() ) :
					printf( '<div class="taxonomy-description">%s</div>', $term_description );
				endif;
			?>

			<?php /* Start the Loop */ ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'page-templates/partials/content', 'post' ); ?>

			<?php endwhile; ?>

			<?php get_template_part( 'page-templates/partials/content', 'pagination' ); ?>

			<?php wp_reset_postdata(); ?>

		<?php else : ?>

			<?php get_template_part( 'page-templates/partials/content', 'none' ); ?>

		<?php endif; ?>

	</div><!-- content -->

	<?php get_sidebar('blog'); ?>

</div><!-- #blog -->
</div>

<?php get_footer(); ?>
