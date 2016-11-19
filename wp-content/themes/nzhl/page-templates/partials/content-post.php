<?php
/**
 * The template used for displaying post content in content-front.php
 *
 * @package some_like_it_neat
 */
?>


<div class="post grid-item card news-card" >
    <span class="date"><?php the_date(); ?></span>

    <div class="post-content">
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php echo get_the_excerpt(); ?>
    </div>

    <div class="share">

        <?php
            $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='. get_permalink();
            $twitterURL = "https://twitter.com/intent/tweet?text=". get_the_title() ."&url=". get_permalink();
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
</div>

