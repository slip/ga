<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Resolution_Athens
 */

get_header(); ?>
<div class="md-container clear">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<header>
				<h1 class="page-title hidden-text">Tour</h1>
			</header>
			
			<div class="tour-dates">
				<?php
				$today = date('Ymd');
				$args1 = array(
					'post_type' => 'ga_tour_dates',
					'posts_per_page' => '-1',
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
				$status = get_field('status');
				$ticket = get_field('ticket_link');
				
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
							<div class="ticket">
								<?php 
								if($status == 'onsale'):
								?>
									<a href="<?php echo $ticket; ?>" target="_blank"><?php get_template_part('template-parts/icons/icon', 'on-sale.svg'); ?></a>
								<?php	
								elseif($status == 'soldout'):
									get_template_part('template-parts/icons/icon', 'sold-out.svg'); 
								endif;
								?>
							</div>
							<div class="info">
								<a href="<?php the_permalink(); ?>"><?php get_template_part('template-parts/icons/icon','info.svg'); ?></a>
							</div>
							<div class="share">
								<div class="share-button">
									<?php get_template_part('template-parts/icons/icon', 'share.svg'); ?>
									<ul>
										<li class="share-facebook"><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" title="Share on Facebook.">Facebook</a></li>
										<li class="share-twitter"><a href="http://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>" title="Tweet this!">Twitter</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
					
				<?php endwhile;
				wp_reset_postdata();
				?>
			</div>			
		
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
?>
</div>
<?php
get_footer();

