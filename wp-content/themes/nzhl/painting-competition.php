<?php
/* Template Name: Painting Competition */

get_header(); ?>

<div id="painting_comp">

	<div class="content">
		<h1><?php the_title(); ?></h1>

		<?php
			$posts_per_page = -1;
		  $year = date('Y');
		  $month = date('F');
		  $order = 'ASC';
		  $mime_types = array('image/jpeg', 'image/png');
		  $tags = array($year, $month);

		  $args = array(
		    'post_type' => 'attachment',
				'post_status' => 'inherit',
				'post_mime_type' => $mime_types,
		    'posts_per_page' => $posts_per_page,
		    'tax_query' => array(
		    	'relation' => 'AND',
		    	array(
		    		'taxonomy' => 'attachment_category',
		    		'field'    => 'slug',
		    		'terms'    => 'painting_comp'
		    	),
	    		array(
	    			'taxonomy' => 'attachment_tag',
	    			'field'    => 'slug',
	    			'terms'    => $tags,
	    			'operator' => 'AND'
	    		)
	    	)
		  );

		  $the_query = new WP_Query( $args );
		?>

		$the_query = new WP_Query( $args ); ?>

		<?php if ( $the_query->have_posts() ) : ?>

			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

				<?php // include( 'page-templates/partials/content-events.php' ); ?>

			<?php endwhile; ?>

			<?php wp_reset_postdata(); ?>

		<?php else : ?>

			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

		<?php endif; ?>

	</div> <!-- content -->

	<?php get_sidebar('blog'); ?>

</div> <!-- #events -->

</div>

<?php get_footer(); ?>
