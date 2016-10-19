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

		<div class="entry-meta">

			<span class="genericon genericon-time"></span> 
			<span class="posted-on" itemprop="datePublished">Posted on <?php echo get_the_date(); ?></span>

		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content" itemprop="articleBody" >

	<?php the_content(); ?>

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

	<footer class="entry-meta" itemprop="keywords" >
	<?php
	/* translators: used between list items, there is a space after the comma */
	// $category_list = get_the_category_list( __( ', ', 'some-like-it-neat' ) );

	// /* translators: used between list items, there is a space after the comma */
	// $tag_list = get_the_tag_list( '', __( ', ', 'some-like-it-neat' ) );

	// if ( ! some_like_it_neat_categorized_blog() ) {
	// 	// This blog only has 1 category so we just need to worry about tags in the meta text
	// 	if ( '' != $tag_list ) {
	// 		$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'some-like-it-neat' );
	// 	} else {
	// 		$meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'some-like-it-neat' );
	// 	}
	// } else {
	// 	// But this blog has loads of categories so we should probably display them here
	// 	if ( '' != $tag_list ) {
	// 		$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'some-like-it-neat' );
	// 	} else {
	// 		$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'some-like-it-neat' );
	// 	}
	// } // end check for categories on this blog

	?>

	<?php edit_post_link( __( 'Edit', 'some-like-it-neat' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
	<?php tha_entry_bottom(); ?>
</article><!-- #post-## -->
<?php tha_entry_after(); ?>
