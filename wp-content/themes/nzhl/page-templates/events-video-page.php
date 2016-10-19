<?php
/**
 * Template Name: Event videos
 *
 * @package some_like_it_neat
 */

get_header(); ?>

<div id="primary" class="content-area ">
	<div class="full">
		<?php while ( have_posts() ) : the_post(); ?>

			<div class="title-has-cta">
				<h1> <?php the_title(); ?></h1>

				<a href="https://www.youtube.com/channel/UCcr5vuAH5TPlYox-QLj4ySw" target="blank" class="btn yt-cta title-cta-btn">
					Subscribe on YouTube <span class="dashicons dashicons-video-alt3"></span>
				</a>
			</div>




			<div class="evp-content-wrapper"><?php  the_content(); ?></div>
			

			<?php if( have_rows('video') ): ?>

				<div class="row-videos">

					<?php while( have_rows('video') ): the_row(); ?>

						<div class="video-card match">
							<?php the_sub_field('youtube_link'); ?>
							<div class="video-title match">
								<?php
								  // echo substr(get_sub_field('video_title'), 0, 60) . '...'; 
								the_sub_field('video_title');
								?> </div><!-- /.video-title -->
							</div>

						<?php endwhile; ?>

					</div>

				<?php endif; ?>


				<?php
		endwhile; // end of the loop.
		?>

	</div><!-- #primary -->
</div>
</div>

<?php get_footer(); ?>
