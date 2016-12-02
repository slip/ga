<div class="tour-dates widget">
	<div class="tour-header">Tour Dates</div>
	<?php
	$today = date('Ymd');
	$args1 = array(
		'post_type' => 'ga_tour_dates',
		'posts_per_page' => '5',
		'orderby' => 'meta_value_num',
		'order' => 'ASC',
		'meta_query' => array(
			array(
		        'key'		=> 'date',
		        'compare'	=> '>=',
		        'value'		=> $today,
		    )       
        ),
	);
						
	$query1 = new WP_Query( $args1 );
						
	while ( $query1->have_posts()): $query1->the_post();
	
	$date = get_field('date');
	$date = new DateTime($date);
	$city = get_field('city');
	?>
	<div class="tour-date">
		<div class="date">
			<div class="month"><?php echo $date->format('M'); ?></div>
			<div class="day"><?php echo $date->format('j'); ?></div>
		</div>
		<div class="details">
			<div class="location">
				<div class="title">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</div>
				<div class="city">
					<a href="<?php the_permalink(); ?>"><?php echo $city; ?></a>
				</div>
			</div>
			<div class="buttons">
				<div class="info">
					<a href="<?php the_permalink(); ?>"><?php get_template_part('template-parts/icons/icon','info.svg'); ?></a>
				</div>
			</div>
		</div>
	</div>

	<?php endwhile;
	wp_reset_postdata();
	?>
	<div class="tour-footer"><a href="<?php echo site_url(); ?>/tour/">View All</a></div>
</div>