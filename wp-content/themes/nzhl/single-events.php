<?php

get_header(); ?>



<?php while ( have_posts() ) : the_post(); ?>


	<div >
		<div class="content">

			<h1><?php the_title(); ?></h1>


			<?php the_field('content'); ?>

			<?php
			endwhile; // end of the loop. ?>

			<div class="share">
				
				<?php 
				$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='. get_permalink(); 
				$twitterURL = 'https://twitter.com/intent/tweet?text='. get_the_title() .'&amp;url='. get_permalink();
				$linkedinURL = 'http://www.linkedin.com/shareArticle?mini=true&url=' . get_permalink();
				?>
				<p>Share:
					<a href="<?php echo $facebookURL ?>" target="_blank"><i class="icons ss-facebook"></i></a>
					<a href="<?php echo $twitterURL ?>" target="_blank"><i class="icons ss-twitter"></i></a>
					<a href="<?php echo $linkedinURL ?>" target="_blank"><i class="icons ss-linkedin"></i></a>
					<a href="mailto:?subject=<?php bloginfo('name'); ?>: <?php the_title('','',true)?>&amp;body=<?php 
						the_title('','',true); ?> .... Read More here: <?php the_permalink(); ?>" title="Email to a friend/
						colleague"><i class="icons ss-mail"></i></a>
					</p>
				</div>
				

				
				<div class="row">
					<a href="<?php echo site_url(); ?>/events/" class="btn">
						Return to events 
					</a>
				</div><!-- /.row -->


			</div>


			<div class="sidebar">
				<aside class="side-content other-events">
					<?php 
			// categoryCount = ;
					$currentCategory = get_field('category');
					$currentID = get_the_id(); 
					$args=array(
						'post_type' => 'events',
						'post_status' => 'publish',
						'meta_key'		=> 'category',
						'exclude'		=> $currentID, 
						'meta_value'	=> $currentCategory
						);

					$my_query = null;
					$my_query = new WP_Query($args);
					if( $my_query->have_posts() ) { ?>

					<h3><?php echo "All " .  $currentCategory . " Events";  ?></h3>
					<?
					while ($my_query->have_posts()) : $my_query->the_post();
					$current = ($currentID == get_the_id() ? "active" : "");
					$event_date = DateTime::createFromFormat('Ymd', get_field('event_dates'));
					$event_end_date = DateTime::createFromFormat('Ymd', get_field('event_end_date'));
					$current_date = current_time(Ymd);
					$archived = ( get_field('event_dates') < $current_date ) ? "archived" : ""; 
					?>


					<span  class="<?php echo $archived; ?>">

						<?php
						if ( get_field('has_content') ) { ?>
						<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						<? } else {
							the_title();
						}
						?>
						<br />
						<?php // echo "<a class='". $current . " " .  . "' href='" . get_the_permalink() . "'>" . get_the_title() . "</a> <br />"; ?>

						<span class="event-small-date"> 
							<?php
							if ( !get_field('tbc_date') && !get_field('event_end_date') ) {
								echo $event_date->format('l jS F, Y') . "<br /><br />";
							} else if ( get_field('event_end_date') ) {
								echo $event_date->format('l jS') . " - ". $event_end_date->format('l jS F, Y')  . "<br /><br />";
							} else {
								echo "TBC"  . "<br /><br />" ;
							}
							?>
						</span>
					</span>

					<?php 
					endwhile;
					wp_reset_query(); 
				} 
				 // Restore global post data stomped by the_post().
				?>

			</aside>
		</div><!-- /.sidebar -->


	</div><!-- /.full -->
</div>
</div>
<?php get_footer(); ?>
