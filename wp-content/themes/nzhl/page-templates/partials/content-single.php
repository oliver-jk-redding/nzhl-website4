<?php
/**
 * @package some_like_it_neat
 */
?>

<?php
  $thumb_id = get_post_thumbnail_id();
  if($thumb_id) {
    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
    $thumb_url = $thumb_url_array[0];
  }
?>

<?php tha_entry_before(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemType="http://schema.org/BlogPosting">
	<?php tha_entry_top(); ?>

  <header class="entry-header">
		<div class="entry-title" itemprop="name" >
      <h1><?php the_title(); ?></h1>
      <span class="entry-author">by <?php echo get_the_author(); ?></span></a>
    </div>
  	<span class="entry-date" itemprop="datePublished"><?php echo get_the_date(); ?></span>
    <?php if(strpos(get_the_category_list(), "Uncategorised") === false) { the_category(); }?>
  </header><!-- .entry-header -->

  <?php if($thumb_id) : ?>
    <div class="entry-image-container">
      <div class="entry-image" style="background-image: url(<?php echo $thumb_url; ?>);"></div>
    </div>
  <?php endif; ?>

	<div class="entry-content" itemprop="articleBody">

  	<?php the_content(); ?>

    <div class="share">
      <?php
        $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='. get_permalink();
        $twitterURL = 'https://twitter.com/intent/tweet?text='. get_the_title() .'&amp;url='. get_permalink();
      ?>
      <p>
        <a href="<?php echo $facebookURL ?>" target="_blank"><i class="icons ss-facebook"></i></a>
        <a href="<?php echo $twitterURL ?>" target="_blank"><i class="icons ss-twitter"></i></a>
        <a href="mailto:?subject=<?php bloginfo('name'); ?>: <?php the_title('','',true)?>&amp;body=<?php
        the_title('','',true); ?> .... Read More here: <?php the_permalink(); ?>" title="Email to a friend/
        colleague"><i class="icons ss-mail"></i></a>
    	</p>
    </div>

  </div><!-- .entry-content -->


	<footer class="entry-meta" itemprop="keywords">

  	<?php edit_post_link( __( 'Edit post', 'some-like-it-neat' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-meta -->
	<?php tha_entry_bottom(); ?>
</article><!-- #post-## -->
<?php tha_entry_after(); ?>
