<?php
/**
* Template Name: Front Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package some_like_it_neat
 */
get_header();?>

<div id="home">

  <div class="content">

    <h1 style="display: none;">The New Zealand Hobbit League</h1>
    <h2>Latest from the NZHL Community</h2>

    <?php $the_query = new WP_Query( 'post_type=post&posts_per_page=10$paged=1' ); ?>

    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

      <?php get_template_part( 'page-templates/partials/content', 'front' ); ?>

    <?php endwhile; ?>


  </div>

</div>

</div>

<?php //get_sidebar('front'); ?>

<?php get_footer(); ?>
