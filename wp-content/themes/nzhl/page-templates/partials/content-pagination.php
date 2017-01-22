<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package some_like_it_neat
 */
?>


<div class="pagination">

  <?php global $the_query;

  $total_pages = $the_query->max_num_pages;

  if ($total_pages > 1){

    $current_page = max(1, get_query_var('paged'));


    echo paginate_links(array(
      'base' => get_pagenum_link(1) . '%_%',
      'format' => '/page/%#%',
      'current' => $current_page,
      'total' => $total_pages,
      'prev_text' => 'Previous',
      'next_text' => ' Next'
    ));

  } ?>

</div>
