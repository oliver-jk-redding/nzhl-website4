<?php
/**
 * Template Name: Events page2
 *
 * @package some_like_it_neat
 */

get_header(); ?>

<div id="primary" class="content-area">
	<div class="full ">
		<?php while ( have_posts() ) : the_post(); ?>

			<div class="title-has-cta">
				<h1>
					Current <?php the_title(); ?>
				</h1>

			</div>

			<?php // the_content(); ?>

			<div id="filter-buttons">
				<ul>
					<li data-filter="*">All</li>
					<li data-filter="Turing lectures">Turing lectures</li>
					<li data-filter="Data summits 2015 - 2016">Data summits</li>
					<li data-filter="Symposia 2016">Symposia</li>
					<li data-filter="Workshops 2015 - 2016">Workshops</li>
					<li data-filter="Other">Other</li>
					<!-- <a href="<?php the_permalink(1644); ?>"><li>Previous Events</li></a> -->
				</ul>
			</div><!-- /#filter-buttons -->

			<a href="<?php echo get_permalink_check('Past Events', 1664); ?>" class="btn title-cta-btn">
				View past events
			</a>

			<table id="all-events-table" class="body-height" width="100%">
				<thead>
					<tr>
						<th class="event-category">Category</th>
						<th class="event-title">Title</th>
						<th class="event-date">Date</th>
						<th class="event-location">Location</th>
						<th class="event-speakers no-sort">Additional info</th>
						<th class="event-date-order hide">date-order</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$args=array(
						'post_type' => 'events',
						'post_status' => 'publish',
						'posts_per_page' => -1,
						'caller_get_posts'=> 1
						);

					$my_query = null;
					$my_query = new WP_Query($args);
					if( $my_query->have_posts() ) {
						while ($my_query->have_posts()) : $my_query->the_post();

						$event_date = DateTime::createFromFormat('Ymd', get_field('event_dates'));
						$event_end_date = DateTime::createFromFormat('Ymd', get_field('event_end_date'));

						$event_start_time = get_field('event_start_time') ? get_field('event_start_time') : NULL ;
						$event_end_time = get_field('event_end_time') ? get_field('event_end_time') : NULL;

						$current_date = current_time('Ymd');

						$archived = ( get_field('event_dates') < $current_date && !get_field('tbc_date') ) ? true : false; 

						if (!$archived) {
							?>

							<tr class="<?php echo ( ($archived && !get_field('tbc_date')) ? "archived hide" : ""); ?>">
								<td class="event-category">
									<?php the_field('category'); ?>
								</td>

								<td class="event-title">
									<?php
									if ( get_field('has_content') ) { ?>
										<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
										<? } else {
											the_title();
										}
										?>
									</td>

									<td class="event-date">
										<?php
										if ( !get_field('tbc_date') && !get_field('event_end_date') ) {
											echo nl2br($event_date->format('l jS F, Y') . "\n"  . $event_start_time . " - " .  $event_end_time);
										} else if ( get_field('event_end_date') ) {
											echo nl2br($event_date->format('l jS') . " - ". $event_end_date->format('l jS F, Y') . "\n" . $event_start_time . " - " .  $event_end_time); 

										} else {
											echo "TBC";
										}
										?>
									</td>

									<td class="event-location">
										<?php if ( get_field('location') ) 
										the_field('location'); 
										?>
									</td>

									<td class="event-speakers">
										<?php 
										if ( get_field('has_speakers') ) {
											$i = 1;
											$speakers = get_field('speakers');
											foreach ($speakers as $speaker) {

												echo "Speaker " . $i . ": " . $speaker['speakers_name']; 
												if ( $speaker['speakers_email'] ){
													echo " [<a href='mailto:" . $speaker['speakers_email'] . "'>Email</a>]";
												} 
												if ( $speaker['speakers_website'] ){
													echo " [<a href='" . $speaker['speakers_website'] . "' target='blank'>Website</a>]";
												} 
												echo "<br />";

												$i++;
											}
										}
										if ( get_field('extra_info') ) {
											the_field('extra_info');  	
										} 

										if ( !get_field('extra_info') && !get_field('has_speakers') ) {
											echo "No additional info";
										}
										?>
									</td>


									<td class="hide">
										<?php the_field('event_dates'); ?>
									</td><!-- /.hide -->
								</tr>


								<?php 
							}
							endwhile;
						}
			wp_reset_query();  // Restore global post data stomped by the_post().
			?>

		</tbody>
	</table>




	<h2 id="prev-events" class="hide">Previous events</h2>

	<table id="all-events-table-old-x"  class="hide" width="100%">
		<thead>
			<tr>
				<th class="event-category">Category</th>
				<th class="event-title">Title</th>
				<th class="event-date">Date</th>
				<th class="event-location">Location</th>
				<th class="event-speakers no-sort">Additional info</th>
				<th class="event-date-order hide">date-order</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$args=array(
				'post_type' => 'events',
				'post_status' => 'publish',
				'posts_per_page' => -1,
				'caller_get_posts'=> 1
				);

			$my_query = null;
			$my_query = new WP_Query($args);
			if( $my_query->have_posts() ) {
				while ($my_query->have_posts()) : $my_query->the_post();

				$event_date = DateTime::createFromFormat('Ymd', get_field('event_dates'));
				$event_end_date = DateTime::createFromFormat('Ymd', get_field('event_end_date'));

				$current_date = current_time('Ymd');

				$archived = ( get_field('event_dates') < $current_date && !get_field('tbc_date') ) ? true : false; 

				if ($archived) {
					?>

					<tr class="<?php echo ( ($archived && !get_field('tbc_date')) ? "archived" : ""); ?>">
						<td class="event-category">
							<?php the_field('category'); ?>
						</td>

						<td class="event-title">
							<?php
							if ( get_field('has_content') ) { ?>
								<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
								<? } else {
									the_title();
								}
								?>
							</td>

							<td class="event-date">
								<?php
								if ( !get_field('tbc_date') && !get_field('event_end_date') ) {
									echo $event_date->format('l jS F, Y');
								} else if ( get_field('event_end_date') ) {
									echo $event_date->format('l jS') . " - ". $event_end_date->format('l jS F, Y');
								} else {
									echo "TBC";
								}
								?>
							</td>

							<td class="event-location">
								<?php if ( get_field('location') ) 
								the_field('location'); 
								?>
							</td>

							<td class="event-speakers">
								<?php 
								if ( get_field('has_speakers') ) {
									$i = 1;
									$speakers = get_field('speakers');
									foreach ($speakers as $speaker) {

										echo "Speaker " . $i . ": " . $speaker['speakers_name']; 
										if ( $speaker['speakers_email'] ){
											echo " [<a href='mailto:" . $speaker['speakers_email'] . "'>Email</a>]";
										} 
										if ( $speaker['speakers_website'] ){
											echo " [<a href='" . $speaker['speakers_website'] . "' target='blank'>Website</a>]";
										} 
										echo "<br />";

										$i++;
									}
								}
								if ( get_field('extra_info') ) {
									the_field('extra_info');  	
								} 

								if ( !get_field('extra_info') && !get_field('has_speakers') ) {
									echo "No additional info";
								}
								?>
							</td>


							<td class="hide">
								<?php the_field('event_dates'); ?>
							</td><!-- /.hide -->
						</tr>


						<?php 
					}
					endwhile;
				}
			wp_reset_query();  // Restore global post data stomped by the_post().
			?>

		</tbody>
	</table>


	<?php
		endwhile; // end of the loop.
		?>

	</div><!-- #primary -->
</div>
</div>

<?php get_footer(); ?>
