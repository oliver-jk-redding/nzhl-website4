<?php
/**
 * The template used for displaying page content in front-page.php
 *
 * @package some_like_it_neat
 */
?>

<?php
$thumb_id = get_post_thumbnail_id();
$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
$thumb_url = $thumb_url_array[0];
?>

<div class="post-content">
  <?php if($thumb_id) { ?>
    <div class="post-image-container">
      <a class="post-image" href="<?php the_permalink(); ?>" style="background-image: url(<?php echo $thumb_url; ?>);"></a>
      <?php if(strpos(get_the_category_list(), "Uncategorised") === false) { the_category(); }?>
    </div>
  <?php } else { ?>
    <div class="post-image-container">
      <a class="post-image" href="<?php the_permalink(); ?>" style="background-image: url(wp-content/themes/nzhl/assets/img/middle-earth-map-with-logo.jpg);"></a>
      <?php if(strpos(get_the_category_list(), "Uncategorised") === false) { the_category(); }?>
    </div>
  <?php } ?>
  <div class="post-heading">
    <a class="post-title" href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3><span class="post-author">by <?php echo get_the_author(); ?></span></a>
    <a class="post-date" href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>
  </div>
  <div class="post-details">
    <div class="post-excerpt">
      <?php the_excerpt(); ?>
      <!-- <a href="<?php the_permalink(); ?>">Read more...</a> -->
    </div>
    <!-- <div class="post-read-more"> -->
    <!-- </div> -->
  </div>
</div>