<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package some_like_it_neat
 */

get_header(); ?>

<div id="primary" class="content-area">
	<div class="full">
		<section class="error-404 not-found">

			<h1 class="page-title">404 Sorry, this page can&rsquo;t be found.</h1>
		</header><!-- .page-header -->

		<div class="page-content">
			<p>It looks like nothing was found at this location. </p>

			<a href="<?php echo site_url(); ?>" class="btn">Return to home</a>

			<br /><br /><br />
			<hr />
			<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

			<?php if ( some_like_it_neat_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
				<div class="widget widget_categories">
					<h2 class="widgettitle"><?php _e( 'Most Used Categories', 'some-like-it-neat' ); ?></h2>
					<ul>
						<?php
						wp_list_categories(
							array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
								)
							);
							?>
						</ul>
					</div><!-- .widget -->
					<?php
					endif; ?>


				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</div><!-- /.full -->
	</div><!-- #primary -->

</div>
<?php get_footer(); ?>