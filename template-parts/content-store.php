<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Resolution_Athens
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="page-title hidden-text">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="page-content">

		<div class="row">
			<div class="banner col-two-third">
				<a class="graphic" href="http://greggallman.shop.redstarmerch.com/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/store-banner.jpg" alt="Enter The Online Store" /></a>
				<a class="button" href="http://greggallman.shop.redstarmerch.com/" target="_blank">Enter The Online Store</a>
			</div>
			<div class="widget col-one-third">
				<?php get_template_part('template-parts/widget', 'newsletter'); ?>
			</div>
		</div>

	<?php if( have_rows('featured_store_items') ): ?>
		<div class="card-grid card-grid-three">

		<?php while( have_rows('featured_store_items') ): the_row();

			// vars
			$image = get_sub_field('image');
			$title = get_sub_field('title');
			$subtitle = get_sub_field('subtitle');
			$link = get_sub_field('link');
			$description = get_sub_field('brief_description');
			?>

			<div class="card-container">
				<a href="<?php echo $link; ?>" class="card" target="_blank">
					<div class="featured-image">
						<img src="<?php echo $image['sizes']['store-item']; ?>" alt="<?php echo $title; ?>" />
						<div class="upper-text">
							<h2 class="entry-title"><?php echo $title; ?></h2>
							<div class="entry-meta"><?php echo $subtitle; ?></div>
						</div>
					</div>
					<div class="lower-text">
						<?php echo $description; ?>
					</div>
					<div class="store-link">
						<span>Purchase at online store</span>
					</div>
				</a>
			</div>
		<?php endwhile; ?>

		</div>
	<?php endif; ?>

	<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'resolutionathens' ),
			'after'  => '</div>',
		) );
	?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
