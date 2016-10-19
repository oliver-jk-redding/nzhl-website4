<?php
/* Template Name: News Page */

get_header(); ?>

<div id="news">

	<div class="content">
		<h1><?php the_title(); ?></h1>

		<?php $the_query = new WP_Query( 'category_name=news' ); ?>

		<?php if ( $the_query->have_posts() ) : ?>

			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

				<?php get_template_part( 'page-templates/partials/content', 'news' ); ?>
				
			<?php endwhile; ?>

			<?php get_template_part( 'page-templates/partials/content', 'pagination' ); ?>

			<?php wp_reset_postdata(); ?>

		<?php else : ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>

	</div>

	<?php get_sidebar(); ?>

</div>

</div>

<?php get_footer(); ?>