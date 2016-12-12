<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Resolution_Athens
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="lg-container clear">
			<div class="row">
				<div class="col-three">
					<div class="legal">
						<p>The GREGG ALLMAN name, The GREGG ALLMAN &ampersand; FRIENDS name, likenesses and logos, are all registered trademarks of Gregg Allman, whose rights are specifically reserved.</p>
						<p>Any artwork, visual, or audio representations used on this web site CONTAINING ANY REGISTERED TRADEMARKS are under license from Gregg Allman.</p>
						<p><?php if(is_front_page()):{ ?><a href="http://www.resolutionathens.com/" target="_blank">Designed by</a> <a href="http://www.resolution.agency/" target="_blank">Resolution</a><?php } else:{ ?><a href="http://www.resolution.agency/" target="_blank" rel="nofollow">Designed by Resolution</a><?php } endif; ?></p>
					</div>
				</div>
				<div class="col-three">
					<div class="footer-logo">
						<img src="<?php echo get_template_directory_uri(); ?>/img/ga-footer-min.png" alt="Gregg Allman" />
					</div>
				</div>
				<div class="col-three">
					<div class="footer-social-icons">
						<a href="#" target="_blank" title="YouTube"><?php get_template_part('template-parts/icons/icon', 'youtube.svg'); ?></a>
						<a href="#" target="_blank" title="Facebook"><?php get_template_part('template-parts/icons/icon', 'facebook.svg'); ?></a>
						<a href="#" target="_blank" title="Instagram"><?php get_template_part('template-parts/icons/icon', 'instagram.svg'); ?></a>
						<a href="#" target="_blank" title="Twitter"><?php get_template_part('template-parts/icons/icon', 'twitter.svg'); ?></a>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
