<?php
/**
 * The Template for displaying all single posts.
 *
 * @package some_like_it_neat
 */

get_header(); ?>

<div id="news">

	<div class="content">

		<?php if ( $category_name == 'news') : ?>
			<h1>News</h1>
		<?php else : ?>
			<h1>Opportunities</h1>
		<?php endif; ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'page-templates/partials/content', 'single' ); ?>

				<?php
				endwhile; // end of the loop. ?>

		</div><!-- #content -->

		<?php get_sidebar(); ?>

	</div><!-- #full -->

</div>

<?php get_footer(); ?>
