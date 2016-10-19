
<form role="search" method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
	<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
	<i class="fa fa-search" aria-hidden="true"><input type="submit" id="searchsubmit" value="" /></i>
</form>
