<?php
/* Template Name: Blog Page */

get_header(); ?>

<div id="blog">

  <div class="content">
    <h1><?php the_title(); ?></h1>

    <?php // $the_query = new WP_Query( 'post_type=post&posts_per_page=3&paged=1' ); ?>

    <?php
      $page_number = 1;
      $paged = get_query_var('paged');
      if( $paged > 1) { $page_number = $paged; }

      $query = array(
        'post_type'=>'post',
        'posts_per_page'=>4,
        'paged'=>$page_number
      );
      $the_query = new WP_Query( $query );
    ?>

    <?php if ( $the_query->have_posts() ) : ?>

      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

        <?php get_template_part( 'page-templates/partials/content', 'post' ); ?>

      <?php endwhile; ?>

      <?php get_template_part( 'page-templates/partials/content', 'pagination' ); ?>

      <?php wp_reset_postdata(); ?>

    <?php else : ?>
      <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>

  </div>

  <?php get_sidebar('blog'); ?>

</div>

</div>

<?php get_footer(); ?>