<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Resolution_Athens
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if(is_single()): ?>
	<figure class="featured-image">
		<?php the_post_thumbnail('medium'); ?>
	</figure>
	
	<header class="entry-header">
		<?php
			the_title( '<h1 class="entry-title">', '</h1>' );	
		?>
			<p class="subheading"><?php the_field('instrument'); ?></p>
	</header><!-- .entry-header -->
	
	<div class="entry-content">
	<?php
		
		the_content( sprintf(
			/* translators: %s: Name of current post. */
			wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'resolutionathens' ), array( 'span' => array( 'class' => array() ) ) ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		) );
		
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'resolutionathens' ),
			'after'  => '</div>',
		) );
	?>
</div><!-- .entry-content -->

	<?php else: ?>
	<a href="<?php the_permalink(); ?>" class="card" rel="bookmark">
		<div class="featured-image">
			<?php the_post_thumbnail('three-column-thumb'); ?>
			<div class="upper-text">
				<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
				<div class="entry-meta"><?php the_field('instrument'); ?></div>
			</div>
		</div>
		<div class="lower-text">
			<?php the_excerpt(); ?>
		</div>
	</a>
	<?php endif; ?>
	
	

</article><!-- #post-## -->
