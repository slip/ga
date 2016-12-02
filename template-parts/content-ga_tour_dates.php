<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Resolution_Athens
 */

?>
<?php
	$date = get_field('date');
	$date = new DateTime($date);
	$city = get_field('city');
	$status = get_field('status');
	$ticket = get_field('ticket_link'); 
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
			<p class="subheading"><?php echo $city; ?></p>
			<p class="subheading"><?php echo $date->format('F j, Y'); ?></p>
	</header><!-- .entry-header -->
	
	<div class="entry-content">
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
		<div class="tour-links">
			<p>
			<?php if($status == 'onsale'): ?>
			<a href="<?php echo $ticket; ?>" target="_blank">Buy Tickets</a><br />
			<?php endif; ?>
			<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" title="Share on Facebook.">Share on Facebook</a><br />
			<a href="http://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>" title="Tweet this!">Tweet this</a></p>	
		</div>
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
