<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Resolution_Athens
 */

get_header(); ?>
	<main id="main" class="site-main" role="main">

		<div class="hp-featured-area">
		<?php
		if( have_rows('slideshow_images') ):
		?>

			<div class="cycle-slideshow" data-cycle-slides="div" data-cycle-speed="4000">
			<?php
			while( have_rows('slideshow_images') ): the_row();
				$image = get_sub_field('image');
			?>

				<div class="hp-hero" style="background-image:url('<?php echo $image['url']; ?>');"></div>

			<?php endwhile; ?>
			</div>
		<?php endif; ?>


			<div class="hp-newsletter">
				<div class="lg-container clear">
					<div class="wrapper clear">
            <form class="clear" action="//GreggAllman.us14.list-manage.com/subscribe/post?u=7f78ff63f40071f909f81904f&amp;id=067dc401ba" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" no>
        			<input type="email" name="EMAIL" id="mce-EMAIL" placeholder="you@email.com" />
              <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
              <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_7f78ff63f40071f909f81904f_067dc401ba" tabindex="-1" value=""></div>
              <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" />
        		</form>
						<div class="social-icons">
							<a href="https://www.youtube.com/user/officialgreggallman" target="_blank" title="YouTube"><?php get_template_part('template-parts/icons/icon', 'youtube.svg'); ?></a>
							<a href="http://facebook.com/GreggAllman" target="_blank" title="Facebook"><?php get_template_part('template-parts/icons/icon', 'facebook.svg'); ?></a>
							<a href="http://instagram.com/OfficialGreggAllman" target="_blank" title="Instagram"><?php get_template_part('template-parts/icons/icon', 'instagram.svg'); ?></a>
							<a href="http://twitter.com/GreggAllman" target="_blank" title="Twitter"><?php get_template_part('template-parts/icons/icon', 'twitter.svg'); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="page-content">
			<div class="lg-container mobile-container-full">
				<div class="row">
					<div class="col-one-third">
						<?php get_template_part('template-parts/widget', 'tour'); ?>
					</div>
					<div class="col-two-third">
						<div class="hp-recent-news">
							<div class="news-header">Recent News</div>
							<?php
							$args1 = array(
								'post_type' => 'post',
								'posts_per_page' => '3',
							);

							$query1 = new WP_Query( $args1 );

							while ( $query1->have_posts()):
								$query1->the_post();?>
								<div class="news clear">
									<div class="featured-image">
										<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
									</div>
									<div class="text">
										<div class="entry-meta"><?php resolutionathens_posted_on(); ?></div>
										<div class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
										<div class="excerpt"><?php the_excerpt(); ?></div>
									</div>
								</div>
							<?php endwhile;
							wp_reset_postdata();
							?>
							<div class="news-footer"><a href="<?php echo site_url(); ?>/news/">View All</a></div>
						</div>
					</div>
				</div>

				<?php if( have_rows('featured_announcements') ): ?>
					<div class="card-grid card-grid-three">

					<?php while( have_rows('featured_announcements') ): the_row();

						// vars
						$image = get_sub_field('image');
						$title = get_sub_field('title');
						$subtitle = get_sub_field('subtitle');
						$link = get_sub_field('link');
						?>

						<div class="card-container">
							<a href="<?php echo $link; ?>" class="card">
								<div class="featured-image">
									<img src="<?php echo $image['sizes']['store-item']; ?>" alt="<?php echo $title; ?>" />
								</div>
								<div class="lower-text">
									<h2 class="entry-title"><?php echo $title; ?></h2>
									<div class="entry-meta"><?php echo $subtitle; ?></div>
								</div>
							</a>
						</div>
					<?php endwhile; ?>

					</div>
				<?php endif; ?>

			</div>
		</div>

	</main><!-- #main -->

<?php
get_footer();
