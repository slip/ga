<?php
/**
 * Template Name: Store
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Resolution_Athens
 */

get_header(); ?>
<div class="md-container clear">
	<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'store' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

</div>

<?php
get_footer();
