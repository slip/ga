<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Resolution_Athens
 */
?>

<aside id="secondary" class="widget-area" role="complementary">

	<?php if(!is_post_type_archive('ga_tour_dates')):
		 
		get_template_part('template-parts/widget', 'tour');
		
	endif; ?>
	
	<?php get_template_part('template-parts/widget', 'newsletter'); ?>
	
	<?php if( have_rows('sidebar_promos', 'option') ): ?>
		<div class="clear">
		<?php while( have_rows('sidebar_promos', 'option') ): the_row(); 
	
			$graphic = get_sub_field('graphic','option');
			$link = get_sub_field('link','option');
			?>
			
			<div class="promo">
				<a href="<?php echo $link; ?>"><img src="<?php echo $graphic['sizes']['sidebar-promo']; ?>" alt="<?php echo $graphic['alt'] ?>" /></a>
			</div>
	
		<?php endwhile; ?>
		</div>
	
	<?php endif; ?>

</aside><!-- #secondary -->
