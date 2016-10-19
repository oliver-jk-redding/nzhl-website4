<?php
/* Template Name: Events Page */

get_header(); ?>

	<div id="events" class="full">

		<div class="content">
			<h1><?php the_title(); ?></h1>

			<?php $args = array(
				'post_type' => array( 'eventtables' )
			);

			$the_query = new WP_Query( $args ); ?>

			<?php if ( $the_query->have_posts() ) : ?>

				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

					<?php $parent_post_name = $post->post_name;?>

					<?php include( 'page-templates/partials/content-events.php' ); ?>
				
				<?php endwhile; ?>

					<?php get_template_part( 'page-templates/partials/content', 'pagination' ); ?>

				<?php wp_reset_postdata(); ?>

			<?php else : ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>

		</div>

	<?php get_sidebar('contact'); ?>

	</div>

</div>
