<?php
/* Template Name: Painting Competition */

get_header(); ?>

<div id="painting_comp">

	<div class="content">

		<?php
			$posts_per_page = -1;
		  $year = date('Y');
		  $month = date('F');
		  $order = 'ASC';
		  $mime_types = array('image/jpeg', 'image/png');
		  $tags = array($year, $month);
		  $cat = 'painting_comp';

		  $args = array(
		    'post_type' 			=> 'attachment',
				'post_status' 		=> 'inherit',
				'post_mime_type' 	=> $mime_types,
		    'posts_per_page' 	=> $posts_per_page,
		    'tax_query' 			=> array(
		    	'relation' 			=> 'AND',
		    	array(
		    		'taxonomy'		=> 'attachment_category',
		    		'field'    		=> 'slug',
		    		'terms'    		=> $cat
		    	),
	    		array(
	    			'taxonomy' 		=> 'attachment_tag',
	    			'field'    		=> 'slug',
	    			'terms'    		=> $tags,
	    			'operator' 		=> 'AND'
	    		)
	    	)
		  );

		  $the_query = new WP_Query( $args );

		  // Add the winning entry to the front of the array so it displays first.
		  // Also add a property of 'winner' to the winning entry post.
		  foreach($the_query->posts as $index => &$post) {
		  	$tags = wp_get_post_terms($post->ID,'attachment_tag');
		  	foreach($tags as $tag) {
		  		if( $tag->slug == 'winner' ) {
		  			$winner = array_splice($the_query->posts, $index, 1);
		  			array_unshift($the_query->posts, $winner[0]);
		  			$post->winner = true;
		  		}
		  	}
		  }
		  rewind_posts();
		?>

		<h1><?php echo $month . ' ' . $year . ' Painting Competition'; ?></h1>

		<?php if ( $the_query->have_posts() ) : ?>

			<?php include( 'page-templates/partials/content-slideshow.php' ); ?>

			<?php wp_reset_postdata(); ?>

		<?php else : ?>

			<p><?php _e( 'Sorry, no images have been uploaded yet for this month.' ); ?></p>

		<?php endif; ?>

	</div> <!-- content -->

	<?php get_sidebar('painting_comp'); ?>

</div> <!-- #painting_comp -->

</div>

<?php get_footer(); ?>
