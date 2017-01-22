<?php
/**
 * @package some_like_it_neat
 */
?>

<?php tha_entry_before(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemType="http://schema.org/BlogPosting" >
	<?php tha_entry_top(); ?>
	<header class="entry-header">

		<h1 class="entry-title" itemprop="name" ><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<span class="genericon genericon-time"></span> <?php some_like_it_neat_posted_on(); ?>
				<!-- <span itemprop="dateModified" style="display:none;"><?php printf( __( 'Last modified:', 'some-like-it-neat' ) ); ?> <?php the_modified_date(); ?></span> -->
			</div><!-- .entry-meta -->
			<?php
			endif; ?>
		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
			<div class="entry-summary" itemprop="description">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		<?php else : ?>
			<div class="entry-content" itemprop="articleBody">
				<?php
				the_content(
					sprintf(
						__( 'Continue reading%s &rarr;', 'some-like-it-neat' ),
						'<span class="screen-reader-text">  '.get_the_title().'</span>'
						)
					);
					?>

				</div><!-- .entry-content -->

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

					<?php
					endif; ?>

					<?php tha_entry_bottom(); ?>
				</article><!-- #post-## -->
				<?php tha_entry_after(); ?>
