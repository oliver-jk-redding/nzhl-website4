<?php
/**
 * The template used for displaying page content in front-page.php
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
else {
  $thumb_url = '/wp-content/themes/nzhl/assets/img/middle-earth-map-with-logo2.jpg';
}
?>

<div class="post-content">

  <div class="post-heading">
    <a class="post-title" href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3>
    <?php if(strpos(get_the_category_list(), "Event") == true) { ?>
      <span class="post-location"><?php echo get_field('location'); ?></span></a>
    <?php } else { ?>
      <span class="post-author">by <?php echo get_the_author(); ?></span></a>
    <?php } ?>
    <?php if(strpos(get_the_category_list(), "Event") == true) { ?>
      <?php if(get_field('event_end_date')) { ?>
        <a class="post-date" href="<?php the_permalink(); ?>"><?php echo date_range_to_string(get_field('event_date'), get_field('event_end_date')); ?></a>
      <?php } else { ?>
        <a class="post-date" href="<?php the_permalink(); ?>"><?php echo date_to_string(get_field('event_date')); ?></a>
      <?php } ?>
    <?php } else { ?>
      <a class="post-date" href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>
    <?php } ?>
  </div>

  <div class="post-image-container">
    <a class="post-image" href="<?php the_permalink(); ?>" style="background-image: url(<?php echo $thumb_url; ?>);"></a>
    <?php if(strpos(get_the_category_list(), "Uncategorised") === false) { the_category(); }?>
  </div>

  <div class="post-details">
    <div class="post-excerpt">
      <?php the_excerpt(); ?>
    </div>
  </div>
</div>