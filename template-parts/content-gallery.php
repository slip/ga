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
        $photographer = get_sub_field('photographer');
  ?>

  <div class="card-container">
      <div class="featured-image">
        <a href="<?php echo $photo['url']; ?>" class="gallery">
          <img src="<?php echo $photo['sizes']['three-column-thumb']; ?>" alt="<?php echo $photo['alt']; ?>" />
        </a>
      </div>
      <?php if (!empty($photographer)): ?>
        <div class="lower-text">
          <div class="photo-credit">Photo by: <?php echo $photographer; ?></div>
        </div>
      <?php endif; ?>
  </div>

  <?php endwhile; ?>
  </div><!-- card-grid -->

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
  jQuery(document).ready(function() {
    jQuery('.gallery').featherlightGallery({
      galleryFadeIn: 1000,
      galleryFadeOut: 1000,
      openSPeed: 1000
    })
  })
</script>
