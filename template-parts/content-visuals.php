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
		<?php
		if( have_rows('media') ): ?>

			<div class="card-grid card-grid-three">
		
			<?php while( have_rows('media') ): the_row(); 
		
			$type = get_sub_field('media_type');
			$photo = get_sub_field('photo');
			$video_title = get_sub_field('video_title');
			$video_subtitle = get_sub_field('video_subtitle');
			$video = get_sub_field('video');
			
			if($type == 'photo'):
			?>	
				<div class="card-container">
					<a href="<?php echo $photo['url']; ?>" data-featherlight="<?php echo $photo['url']; ?>" class="card">
						<div class="featured-image">
							<img src="<?php echo $photo['sizes']['three-column-thumb']; ?>" alt="<?php echo $photo['alt']; ?>" />
						</div>
					</a>
				</div>
			<?php	
			endif;
			
			if($type == 'video'):
			?>
				<div class="card-container">
					<div class="card">
						<div class="featured-video embed-container">
							<?php echo $video; ?>
						</div>
						<div class="lower-text">
							<h2 class="entry-title"><?php echo $video_title; ?></h2>
							<div class="entry-meta"><?php echo $video_subtitle; ?></div>
						</div>
					</div>
				</div>
			<?php
			endif;
			?>
			
				
		
			<?php endwhile; ?>
		
			</div>
		
		<?php 
		endif;

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'resolutionathens' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
