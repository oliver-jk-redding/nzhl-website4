<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package some_like_it_neat
 */

get_header(); ?>


<div id="primary" class="content-area">
	<div class="full">

		<?php
		$excludedTypes =  array('Milestone');
		?>

		<?php if ( have_posts() && strlen( trim(get_search_query()) ) != 0 ) : ?>
			<?php
			 // echo var_dump_pre($wp_query); ?>
			 <h1>
			 	<?php printf( __( 'Search Results for: %s', 'some-like-it-neat' ), '<span class="highlight">' . get_search_query() . '</span>' ); ?>
			 	</h1>
			 	<p class="post-count">
			 		<?=$wp_query->found_posts;?>  results</p>

			 	<div class="search-row body-height">
			 		<?php while ( have_posts() ) : the_post(); ?>

			 			<?php $postTypeObj = get_post_type_object( get_post_type() ); ?>

			 			<?php
			 			 // if ( !in_array( $postTypeObj->labels->singular_name , $excludedTypes ) && get_post_status() == "publish" ) : ?>

			 			 <?php // get_template_part( 'page-templates/partials/content', 'search' ); ?>

			 			 <div class="search-card match">
			 			 	<span class="post-type-tag">
			 			 		<?php echo $postTypeObj->labels->singular_name; ?>
			 			 	</span>
			 			 	<span class="tag-tail">
			 			 	</span>

			 			 	<span class="h1">
			 			 		<a href="<?php the_permalink(); ?>">
			 			 			<?php
			 			 			if ( countWords(get_the_title()) > 10 ) {
			 			 				echo getWordsForSearch(get_the_title(), 10) . "...";
			 			 			} else {
			 			 				the_title();
			 			 			}
			 			 			?>
			 			 		</a>
			 			 	</span>

			 			 	<div class="search-date">
			 			 		<?php the_date(); ?>
			 			 	</div><!-- /.search-date -->

			 			 	<div class="search-desc">
			 			 		<?php
			 			 		if ( get_the_excerpt() ) {
			 			 			echo getWordsForSearch(strip_tags(get_the_excerpt() ), 20) . "...";
			 			 		} else if ( get_field('content') ) {
			 			 			echo getWordsForSearch( strip_tags(get_field('content')), 20) . "...";
			 			 		} else {
			 			 			echo getWordsForSearch( strip_tags( get_the_content() ), 20 ) . "...";
			 			 		}

			 			 		?>
			 			 	</div><!-- /.search-desc -->

			 			 	<a class="btn" href="<?php the_permalink(); ?>">View <?php echo $postTypeObj->labels->singular_name; ?></a>
			 			 </div><!-- /.search-card -->

			 			 <?php // endif; ?>
			 			<?php endwhile; ?>
			 		</div><!-- /.row -->

				<div class="navigation"><?php posts_nav_link(); ?></div>


			<?php else : ?>

				<?php get_template_part( 'page-templates/partials/content', 'none' ); ?>

			<?php endif; ?>


		</div><!-- #primary -->
	</div>
</div>
<?php get_footer(); ?>
