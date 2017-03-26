<?php
/**
 * The template used for displaying page content in page.php
 *
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

<div id="page">

  <div class="content">
		<h2><?php the_title(); ?></h2>

    <div class="page">
      <?php if($thumb_id) : ?>
        <div class="page-image-container">
          <div class="page-image" style="background-image: url(<?php echo $thumb_url; ?>);"></div>
        </div>
      <?php endif; ?>

      <div class="page-content">

  		  <?php the_content(); ?>

      </div> <!-- .page-content -->

    </div> <!-- .page -->

	</div><!-- .content -->
