<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package some_like_it_neat
 */
?>

        <div class="sidebar" id="sidebar-front">
        
            <aside id="sidebar-frontpage">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-frontpage') ) ?>
            </aside>
 
        </div> 

    </div> <!-- END DIV class="full"> -->

</div> <!-- END DIV class="page-container"> -->		