<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package some_like_it_neat
 */
?>


    <div class="post">

        <div class="post-content">
        	<h2><?php the_title(); ?></h2>
        	<table>
                <thead>
                    <tr>
                        <?php 
                        // if( get_field('add_title_field') ):
                            echo '<th>Event Title</th>';
                        // endif; 
                        // if( get_field('add_location_field') ):
                            echo '<th>Location</th>';
                        // endif;
                        // if( get_field('add_date_field') ):
                            echo '<th>Date</th>';
                        // endif;
                        // if( get_field('add_organisers_field') ):
                            echo '<th>Organisers</th>';
                        // endif; ?>

                    </tr>
                </thead>
                <tbody>
                        <?php 
                            $args = array(
                                'post_type' => array( 'events' )
                            );

                            $event_query = new WP_Query( $args ); 

                            if ( $event_query->have_posts() ) : 
                                while ( $event_query->have_posts() ) : $event_query->the_post(); ?>
                                <?php if (get_field('add_to_table')->post_name == $parent_post_name) { ?>
                                <tr>
                                   
                                        <td>
                                            <?php if( get_field('event_abstract') ): ?>
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            <?php else: ?>
                                                <?php the_title(); ?>
                                            <?php endif; ?>
                                        </td>
                                
                                
                                    
                                    <td> <?php
                                        if( get_field('event_location') ): 
                                            echo get_field('event_location');
                                        endif; ?>
                                    </td>
                                    
                                    
                                    
                                    <td> <?php
                                        if( get_field('event_date') ): 
                                            echo get_field('event_date');
                                        endif; ?>
                                    </td>
                                   
                                    <td><?php
                                        if( have_rows('event_organisers') ):
                                            while ( have_rows('event_organisers') ) : the_row(); ?>
                                                <a href="<?php the_sub_field('organiser_email'); ?>"><?php the_sub_field('organiser_name'); ?></a>
                                            <?php 
                                            endwhile;
                                        endif; 
                                        ?>
                                    </td>
                                </tr>
                                <? } ?>
                                <?php endwhile;
                            endif;
                        ?>
                </tbody>
            </table>

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
