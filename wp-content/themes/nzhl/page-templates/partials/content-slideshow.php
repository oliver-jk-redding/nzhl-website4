<?php
/**
 * The template used for displaying an image slideshow on painting-competition.php
 *
 * @package some_like_it_neat
 */
?>

<?php global $wp_query; ?>

<div class="slideshow">
  <div class="slider-for">
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <div class="slider-item">
        <a class="slider-image" href="<?php echo wp_get_attachment_url(); ?>" target="_blank">
          <?php echo wp_get_attachment_image(get_the_ID(), 'medium'); ?>
          <?php if(isset(get_post()->winner)) { echo '<span>Winner!</span>'; } ?>
        </a>
      </div>
    <?php endwhile; ?>
    <?php rewind_posts(); ?>
  </div>
  <div class="slider-nav">
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <div class="slider-thumb" style="background-image: url('<?php echo wp_get_attachment_image_url(get_the_ID()); ?>');"></div>
    <?php endwhile; ?>
  </div>
</div>