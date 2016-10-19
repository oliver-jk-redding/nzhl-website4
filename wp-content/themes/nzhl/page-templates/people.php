<?php
/**
 * Template Name: People
 *
 * @package some_like_it_neat
 */

get_header();
$page_id = get_the_id(); ?>



<div id="primary" class="content-area">
	<div class="full">



		<?php while ( have_posts() ) : the_post(); ?>

			<h1>
				<?php the_title(); ?>
			</h1>

			<div class="row">
				<p style="margin: 24px 0 22px 0;">
					Please select which group of people you wish to view.
				</p>
			</div><!-- /.row -->

			<div class="row people-cards">
				<?php 
			// Set up the objects needed
				// $my_wp_query = new WP_Query();
				// $all_wp_pages = $my_wp_query->query(array(
				// 	'post_type' => 'page',
				// 	'child_of' => $post->ID, 
				// 	'parent' => $post->ID,
				// 	'include' => ''
				// 	'hierarchical' => 0,
				// 	'sort_column' => 'menu_order', 
				// 	'sort_order' => 'asc'
				// 	));
				// $childPages = get_page_children( $page_id, $all_wp_pages );

				// foreach ($childPages as $post) {
				// 	setup_postdata($post); 

				$directors_link = get_page_by_path('director-andrew-blake');
				$fellows_link = get_page_by_title('Faculty Fellows');
				// var_dump($directors_link);
				?>

				<a href="<?php the_permalink($directors_link->ID); ?>">
					<div class="people-card">
						Director
						<?php // echo $directors_link->post_title; ?> 
						<i class="fa fa-angle-right"></i>
					</div><!-- /.people-card -->
				</a>

				<a href="<?php the_permalink($fellows_link->ID); ?>">
					<div class="people-card">
						<?php echo $fellows_link->post_title; ?> 
						<i class="fa fa-angle-right"></i>
					</div><!-- /.people-card -->
				</a>

				<?php 
				// }
				// wp_reset_postdata(); 
				
			endwhile; // end of the loop.
			?>



		</div><!-- /.row -->

	</div>
</div>
</div>

<?php get_footer(); ?>
