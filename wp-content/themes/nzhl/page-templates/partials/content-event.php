<?php
/**
 * @package some_like_it_neat
 */
?>
<?php tha_entry_before(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemType="http://schema.org/BlogPosting">
	<?php tha_entry_top(); ?>
	<header class="entry-header">
		<h1 class="entry-title" itemprop="name" ><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<p>
			<?php echo get_field('event_location'); ?>, <?php echo get_field('event_start_date'); ?>
		</p>
		<?php
		if( have_rows('event_organisers') ): ?>
			<p>Main Organisers: 
		    <?php while ( have_rows('event_organisers') ) : the_row(); ?>
		        <a href="<?php the_sub_field('organiser_email'); ?>" target="_blank"><?php the_sub_field('organiser_name'); ?></a> 
		    <?php endwhile;
		else :
		    // no rows found
		endif; ?>
		</p>

		<?php echo get_field('event_abstract'); ?>
		

	</div><!-- .entry-content -->
	<div class="clearboth"></div>

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

	<footer class="entry-meta" itemprop="keywords" >

	<?php edit_post_link( __( 'Edit', 'some-like-it-neat' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
	<?php tha_entry_bottom(); ?>
</article><!-- #post-## -->
<?php tha_entry_after(); ?>
