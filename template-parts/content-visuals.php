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
		<!-- Instagram Feed 3-Up -->
		<div class="card-grid card-grid-three">
		<?php
			// get json
			$json_link="https://api.instagram.com/v1/users/self/media/recent/?access_token=1296646825.1677ed0.eb64e46c9f9b40e3a29e74f9cf014254&count=6";
			$content = file_get_contents($json_link);
			$json = json_decode($content, true);
			// var_dump($json['data']);
			// $json['data'] returns an array, why am I getting "Trying to get property of non-object" from line 30?

			// loop and display
			foreach ($json['data'] as $instagram) {

				$pic_link=$instagram['link'];
				$pic_src=$instagram['images']['standard_resolution']['url'];

				echo "<div class='card-container'>";
					echo "<div class='featured-image'>";
						echo "<a href='{$pic_link}' target='_blank'>";
							echo "<img src='{$pic_src}'>";
						echo "</a>";
					echo "</div>";
				echo "</div>";
			}
		?>
		</div>

		<!-- Videos 2-Up -->
		<div class="card-grid card-grid-two">
		<?php
		if( have_rows('media') ): ?>

			<?php while( have_rows('media') ): the_row();

			$type = get_sub_field('media_type');
			$video_title = get_sub_field('video_title');
			$video_subtitle = get_sub_field('video_subtitle');
			$video = get_sub_field('video');
			if($type == 'video'):
			?>
				<div class="card-container">
					<div class="video-card">
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
