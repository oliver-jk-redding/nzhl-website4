<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package some_like_it_neat
 */
?>
<?php tha_entry_before(); ?>


<section class="no-results not-found">
	<div id="primary" class="content-area">
		<div class="full">

			<h1>
				No search results 
			</h1>


			<div class="page-content body-height">
				<?php tha_entry_top(); ?>
				<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

					<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'some-like-it-neat' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

				<?php elseif ( is_search() ) : ?>

					<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'some-like-it-neat' ); ?></p>
					<?php get_search_form(); ?>

				<?php else : ?>

					<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'some-like-it-neat' ); ?></p>

					<?php get_search_form(); ?>

					<?php
					endif; ?>

				</div><!-- .page-content -->

			</section><!-- .no-results -->
			<?php tha_entry_after(); ?>
