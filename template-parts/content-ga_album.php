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
		<div class="artist"><?php the_field('artist_name'); ?></div>
		<?php
			the_title( '<h1 class="entry-title album">', '</h1>' );
		?>
		<div class="release-info"><?php the_field('release_info'); ?></div>
	</header><!-- .entry-header -->

	<div class="entry-content">
	<?php if( have_rows('purchase_links') ): ?>
		<ul class="purchase-links">
		<?php while( have_rows('purchase_links') ): the_row();

			$type = get_sub_field('type');
			$description = get_sub_field('type_description');
			$link = get_sub_field('link');
      $track_num = 0;
			?>

			<li><a href="<?php echo $link; ?>">
				<div class="type">
				<?php
				if($type == 'Double LP'):
					get_template_part('template-parts/icons/icon', 'doublelp.svg');

				elseif($type == 'Vinyl'):
					get_template_part('template-parts/icons/icon', 'vinyl.svg');

				elseif($type == 'Download'):
					get_template_part('template-parts/icons/icon', 'download.svg');

				elseif($type == 'CD'):
					get_template_part('template-parts/icons/icon', 'cd.svg');

				elseif($type == '2 CD'):
					get_template_part('template-parts/icons/icon', '2cd.svg');

				elseif($type == 'DVD'):
					get_template_part('template-parts/icons/icon', 'dvd.svg');

				elseif($type == '2 CD + DVD'):
					get_template_part('template-parts/icons/icon', '2cd+dvd.svg');

				elseif($type == 'Blu-Ray'):
					get_template_part('template-parts/icons/icon', 'bluray.svg');

				endif;
				?>
				</div>
				<div class="type-text">
					<?php echo $type; ?>
				</div>
				<div class="type-description">
					<?php echo $description; ?>
				</div>

			</a></li>

		<?php endwhile; ?>
		</ul>
	<?php endif;

		if(have_rows('track_list')): ?>
		<div class="tracklist-header">
			Track List
		</div>
		<ul class="tracklist">
		<?php while(have_rows('track_list')): the_row();
      $track_title = get_sub_field('track_name');
      $track_url = get_sub_field('preview_track');
      $track_prefix = "track_";
      ?>
      <style>
        .play-btn{
          content:url("<?php echo $play_btn_url ?>");
        }
        .pause-btn{
          content:url("<?php echo $pause_btn_url ?>");
        }
      </style>
			<li><?php echo $track_title; ?>
        <?php
          $track_num++;
          $track_id = ($track_prefix . $track_num);
          $play_btn_url = get_template_directory_uri() . '/img/play-btn.svg';
          $pause_btn_url = get_template_directory_uri() . '/img/pause-btn.svg';
        ?>
        <?php if (!empty($track_url)): ?>
          <div class="preview-track">
            <audio id="<?php echo $track_id ?>">
              <source src="<?php echo $track_url; ?>" type="audio/mpeg">
            </audio>
            <img src="<?php echo $play_btn_url ?>" alt="play track" onclick="document.getElementById('<?php echo $track_id ?>').play()"/>
            <img src="<?php echo $pause_btn_url ?>" alt="pause track" onclick="document.getElementById('<?php echo $track_id ?>').pause()"/>
          </div>
        <?php endif; ?>
      </li>
		<?php endwhile; ?>
		</ul>
	<?php endif;

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
			<?php the_post_thumbnail('two-column-thumb'); ?>
			<div class="upper-text">
				<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
				<div class="entry-meta"><?php the_field('artist_name'); ?></div>
			</div>
		</div>
		<div class="lower-text">
			<?php the_excerpt(); ?>
		</div>
	</a>
	<?php endif; ?>



</article><!-- #post-## -->
