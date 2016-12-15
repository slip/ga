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

			?>
				<div class="card-container">
          <div class="featured-image">
					<a href="<?php echo $photo['url']; ?>" data-featherlight="<?php echo $photo['url']; ?>" class="gallery">
							<img src="<?php echo $photo['sizes']['three-column-thumb']; ?>" alt="<?php echo $photo['alt']; ?>" />
					</a>
        </div>

				</div>

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
<script>
  jQuery(document).ready(function(){
    jQuery('.gallery').featherlightGallery({
      gallery: {
        fadeIn: 300,
        fadeOut: 300,
        next: 'next »',
        previous: '« previous'
      },
      openSpeed:    300,
      closeSpeed:   300
    });
    jQuery('.gallery2').featherlightGallery({
      gallery: {
        next: 'next »',
        previous: '« previous'
      },
      variant: 'featherlight-gallery2'
    });
  });
</script>
