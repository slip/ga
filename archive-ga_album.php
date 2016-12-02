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

		<?php
		if ( have_posts() ) :
		?>
			<header>
				<h1 class="page-title hidden-text">Music</h1>
			</header>
			
			<div class="card-grid card-grid-two">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;
			?>
			</div>
			
			<?php
			the_posts_pagination();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
?>
</div>
<?php
get_footer();

