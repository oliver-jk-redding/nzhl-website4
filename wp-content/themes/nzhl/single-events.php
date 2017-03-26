<?php
/**
 * The Template for displaying all single events posts.
 *
 * @package some_like_it_neat
 */

get_header(); ?>

<div id="events">

	<div class="content">

		<h2>Events</h2>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'page-templates/partials/content', 'event' ); ?>

		<?php endwhile; // end of the loop. ?>

    <?php comments_template(); ?>

	</div><!-- #content -->

	<?php get_sidebar(); ?>

</div><!-- #full -->

</div>

<?php get_footer(); ?>
