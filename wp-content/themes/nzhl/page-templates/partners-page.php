<?php
/**
 * Template Name: Partners page
 *
 * This template display content at full with, with no sidebars.
 * Please note that this is the WordPress construct of pages and that other 'pages' on your WordPress site will use a different template.
 *
 * @package some_like_it_neat
 */

get_header(); ?>

<div id="primary" class="content-area">

	<?php while ( have_posts() ) : the_post(); ?>

		<div class="partners-prolog"><?php the_content(); ?></div> 

		<p>
			The following strategic partnerships have already been announced:
		</p>

		<h2 class="section-heading">Partnerships</h2>
		<div class="row partner-cards">

			<?php // check if the repeater field has rows of data

			if( have_rows('partnership_cards') ): ?>

			<?php while ( have_rows('partnership_cards') ) : the_row(); ?>

				<?php if (get_sub_field('hidebox')== FALSE ) { ?>

				<div class="partner-card" <?php if (get_sub_field('logo')) { ?> style="background-image: url(<?php the_sub_field('logo'); ?>);"<?php } ?> >
					<div class="view-more">View more</div>

					<div class="partner-bio">
						<h2 class="partner-title"><?php the_sub_field('block_title'); ?></h2>

						<div class="partner-content"> <?php the_sub_field('block_content'); ?> </div>
					</div>
				</div><!-- /.partner-card -->


				<?php } ?>

			<?php endwhile; ?>


		<?php endif;

		?>

	</div><!-- /.row -->


	<!-- <p>
		The partnership will also train a new generation of data scientists through  The Alan Turing Institute’s doctoral programme, ensuring students are equipped with the latest data science techniques, tools, and methodologies.
	</p> -->

	<h2 class="section-heading">Founders</h2>

	<div class="row partner-cards">

			<?php // check if the repeater field has rows of data

			if( have_rows('content_blocks') ): ?>

			<?php while ( have_rows('content_blocks') ) : the_row(); ?>

				<?php if (get_sub_field('hidebox')== FALSE ) { ?>

				<div class="partner-card" <?php if (get_sub_field('logo')) { ?> style="background-image: url(<?php the_sub_field('logo'); ?>);"<?php } ?> >
					<div class="view-more">View more</div>

					<div class="partner-bio">
						<h2 class="partner-title"><?php the_sub_field('block_title'); ?></h2>

						<div class="partner-content"> <?php the_sub_field('block_content'); ?> </div>
					</div>
				</div><!-- /.partner-card -->


				<?php } ?>

			<?php endwhile; ?>


		<?php endif;

		?>

	</div><!-- /.row -->


	<?php
		endwhile; // end of the loop.
		?>

	</div><!-- #primary -->
</div>

<?php get_footer(); ?>
