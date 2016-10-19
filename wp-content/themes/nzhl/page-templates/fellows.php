<?php
/**
* Template Name: Faculty fellows
*
* @package some_like_it_neat
*/

get_header();
$page_id = get_the_id(); ?>

<?php 


function facultyCard(){

// $profilePic = ( get_field('profile') ? get_field('profile') : "https://unsplash.it/200/300/?random" );
	$profilePic = ( get_field('profile') ? true : false );
	$research_areas = get_field('research_areas');
	$app_areas = get_field('application_areas');
	?>
	<div class="fellow-card <?php the_field('university');
	echo ($profilePic ? "  has-profile " : "" );
	echo (get_the_content() ? "" : " no-content " );
	if ($research_areas) {foreach ($research_areas as $t) {echo " " . str_replace(' ', '-', strtolower($t)); } }
	if ($app_areas) {foreach ($app_areas as $t) {echo " " . str_replace(' ', '-', strtolower($t)); } } 
	// if ( ! get_the_content() ) { echo " no-content "; } 
	?>
	" data-surname="<?php the_field('surname_for_ordering'); ?>">
	<div class="fellow-card-intro">
		<div class='flex-content'>
			<span class="dashicons dashicons-arrow-down-alt2"></span>

			<h1><?php the_title(); ?></h1>
			<h2><?php the_field('university'); ?></h2>
		</div>
	</div><!-- /.card-intro -->

	<div class="fellow-card-hidden">

		<div class="fellow-profile"
		style="background-image: url(<?php echo ($profilePic ? get_field('profile') : ""); ?>);" 
		></div><!-- /.fellow-profile -->

		<div class="fellow-card-content">
			<?php if ( get_the_content( ) )  : the_content();  else : ?>
			<p>
				<!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus nihil aliquid animi maiores nulla ad praesentium neque sit earum velit ipsum fugiat tenetur aperiam, quaerat excepturi! Sed ipsa deserunt quam. -->
			</p>
		<?php endif; ?>

	</div><!-- /.fellow-card-content -->

	<?php if ( get_field('website') ) { ?>

		<div class="fellow-card-footer">
			<a target="_blank" href="<?php the_field('website'); ?>">
				View <?php the_title(); ?>'s personal website
			</a>
		</div>

		<?php } ?>

	</div>
</div>


<?php } ?>



<div id="primary" class="content-area">
	<div class="full">



		<?php while ( have_posts() ) : the_post(); ?>

			<div id='fellows-content'>
				<h1>
					<?php the_title(); ?>
				</h1>

				<?php the_content(); ?>
			</div>

			<div class="hide">
				<h2>Faculty directors</h2>

				<div class="row">
					<?php if( have_rows('featured_fellows') ): 
						// while( have_rows('featured_fellows') ) : the_row(); 
					$posts = get_field('featured_fellows');
						// echo var_dump_pre(count($posts));

					foreach ($posts as $post) {
						setup_postdata($post); 
						$personal_website = ( get_field('personal_website') ? true : false );
						?>

						<div class="featured-fellow">
							<a href="<?php echo ( $personal_website ? get_field('personal_website') : the_permalink() ) ; ?>">
								<div class="ff-image" style="background-image: url(<?php the_field('profile_image', get_the_id()) ?>);"></div><!-- /.ff-image -->
								<div class="ff-title">
									<?php the_title(); ?>
								</div><!-- /.title -->
							</a>
						</div><!-- /.featured-fellow -->

						<?php
					}
					wp_reset_postdata();
					// endwhile;		
					endif;
					?>

				</div><!-- /.row -->

				<br /><br />
			</div><!-- /.hide -->


			<?php
			endwhile; // end of the loop.
			?>




			<div class="fellows-search-filters">
<!-- 				<div class="fellows-search">
					<i class="fa fa-info-circle" aria-hidden="true"></i>
					Use the filters to narrow down the Faculty Fellows. Click on the name of a Faculty Fellow to expand and find out more about them. The Faculty fellows are ordered by surname.
				</div> --><!-- /.fellows-search -->

				<div class="fellows-filters">
					<div class="btn-group filter-dropdown">
						<button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
							Filter by University
						</button>

						<ul class="dropdown-menu" data-filter-group="university">
							<li class="disabled">Select</li>
							<li role="separator" class="divider disabled"></li>
							<li data-filter="">All Universities</li>

							<li data-filter=".Cambridge">Cambridge</li>
							<li data-filter=".Edinburgh">Edinburgh</li>
							<li data-filter=".Oxford">Oxford</li>
							<li data-filter=".UCL">UCL</li>
							<li data-filter=".Warwick">Warwick</li>
						</ul>
					</div>

					<div class="btn-group filter-dropdown">
						<button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
							Filter by Research Area
						</button>

						<ul class="dropdown-menu" data-filter-group="research">
							<li class="disabled">Select</li>
							<li role="separator" class="divider disabled"></li>
							<li data-filter="" class="select-half">All Research Areas</li>

							<?php 

							/*
							*  Get the field objects (search tags) options
							*/

							$searchTags = get_field_object("field_573482c76793a");

							if( $searchTags )
							{
								foreach( $searchTags['choices'] as $k => $v )
								{
									echo '<li class="select-half" data-filter=".' . str_replace(' ', '-', strtolower($k)) . '">' . $k . '</li>';
								}
							}
							?>
						</ul>
					</div>


					<div class="btn-group filter-dropdown hide">
						<button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
							Filter by Application Area
						</button>

						<ul class="dropdown-menu" data-filter-group="application">
							<li class="disabled">Select area of application:</li>
							<li role="separator" class="divider disabled"></li>
							<li data-filter="" class="select-half">All Application Areas</li>

							<?php 

							/*
							*  Get the field objects (search tags) options
							*/

							$searchTags = get_field_object("field_57559b735b8be");

							if( $searchTags )
							{
								foreach( $searchTags['choices'] as $k => $v )
								{
									echo '<li class="select-half" data-filter=".' . str_replace(' ', '-', strtolower($k))  . '">' . $k . '</li>';
								}
							}
							?>
						</ul>
					</div>

					<div class="btn-group filter-search">
						  <input class="fellows-search" type="search" name="search-fellows" placeholder="Search fellows">
						  <i class="fa fa-search"></i>
					</div>


				</div><!-- /.filters -->
			</div>



			<div class="col-md-12" id="no-results" style="display: none;">
				<div class="alert alert-info mtop" >
					Sorry, no faculty fellows match the filter you have chosen.
				</div>
			</div>



			<div class="row">

				<h2 class="uni-title">Cambridge</h2>
				<div class="faculty-list">
					<?php 
					$fellows_loop = new WP_Query( array(
						'post_type' => 'facultyfellows',
						'posts_per_page' => -1,
						'meta_key'		=> 'university',
						'meta_value'	=> 'cambridge',
						// 'meta_key'		=> 'surname',
						// 'meta_value'	=> 'cambridge',
						// 'orderby' => 'surname',
						'order' => 'asc'
						) );
					while ( $fellows_loop->have_posts() ) : $fellows_loop->the_post();
					facultyCard();
					endwhile;
					?>
				</div><!-- /.faculty-list -->
				
				<h2 class="uni-title">Edinburgh</h2>
				<div class="faculty-list">
					<?php 
					$fellows_loop = new WP_Query( array(
						'post_type' => 'facultyfellows',
						'posts_per_page' => -1,
						'meta_key'		=> 'university',
						'meta_value'	=> 'edinburgh'
						) );
					while ( $fellows_loop->have_posts() ) : $fellows_loop->the_post();
					facultyCard();
					endwhile;
					?>
				</div><!-- /.faculty-list -->
				
				<h2 class="uni-title">Oxford</h2>
				<div class="faculty-list">
					<?php 
					$fellows_loop = new WP_Query( array(
						'post_type' => 'facultyfellows',
						'posts_per_page' => -1,
						'meta_key'		=> 'university',
						'meta_value'	=> 'oxford'
						) );
					while ( $fellows_loop->have_posts() ) : $fellows_loop->the_post();
					facultyCard();
					endwhile;
					?>
				</div><!-- /.faculty-list -->

				<h2 class="uni-title">UCL</h2>
				<div class="faculty-list">
					<?php 
					$fellows_loop = new WP_Query( array(
						'post_type' => 'facultyfellows',
						'posts_per_page' => -1,
						'meta_key'		=> 'university',
						'meta_value'	=> 'UCL'
						) );
					while ( $fellows_loop->have_posts() ) : $fellows_loop->the_post();
					facultyCard();
					endwhile;
					?>
				</div><!-- /.faculty-list -->

				<h2 class="uni-title">Warwick</h2>
				<div class="faculty-list">
					<?php 
					$fellows_loop = new WP_Query( array(
						'post_type' => 'facultyfellows',
						'posts_per_page' => -1,
						'meta_key'		=> 'university',
						'meta_value'	=> 'warwick'
						) );
					while ( $fellows_loop->have_posts() ) : $fellows_loop->the_post();
					facultyCard();
					endwhile;
					?>
				</div><!-- /.faculty-list -->


				
			</div><!-- /.row -->

			<br /><br />
		</div><!-- #primary -->
	</div>
</div>

<?php get_footer(); ?>
