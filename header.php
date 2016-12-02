<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Resolution_Athens
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<?php 
	if(get_field('color_theme')):
		$color_theme = get_field('color_theme');
	elseif(is_home() || is_archive() || is_post_type_archive() || is_front_page()):
		$color_theme = 'dark-theme';
	else:
		$color_theme = 'light-theme';
	endif;
 ?>

<body <?php body_class($color_theme); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'resolutionathens' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="lg-container">
			<div class="site-branding">
				<?php
				if ( is_front_page() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a></p>
				<?php
				endif;
				?>
			</div><!-- .site-branding -->
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle closed" aria-controls="primary-menu" aria-expanded="false"><span id="line-1"></span><span id="line-2"></span><span id="line-3"></span><span id="line-4"></span><div><?php esc_html_e( 'Menu', 'resolutionathens' ); ?></div></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'primary-menu-ul closed' , 'container' => '' ) ); ?>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
