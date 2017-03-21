<?php
/* Template Name: Events Page */

get_header(); ?>

<div id="events">

	<div class="content">
		<h1><?php the_title(); ?></h1>

		<?php
		  $page_number = get_query_var('paged', 1);

		  $query = array(
		    'post_type'=>'Events',
		    'posts_per_page'=>5,
		    'paged'=>$page_number
		  );
		  $the_query = new WP_Query( $query );
		?>

		$the_query = new WP_Query( $args ); ?>

		<?php if ( $the_query->have_posts() ) : ?>

			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

				<?php include( 'page-templates/partials/content-events.php' ); ?>

			<?php endwhile; ?>

			<?php get_template_part( 'page-templates/partials/content', 'pagination' ); ?>

			<?php wp_reset_postdata(); ?>

		<?php else : ?>

			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

		<?php endif; ?>

	</div> <!-- content -->

	<?php get_sidebar('blog'); ?>

</div> <!-- #events -->

</div>

<?php get_footer(); ?>
