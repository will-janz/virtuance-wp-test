<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package will-janz
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'will-janz' ); ?></a>

	<header id="masthead" class="site-header">
		<nav>
			<div class="nav-wrapper col s12">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="brand-logo"><?php the_custom_logo(); bloginfo( 'name' ); ?></a>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<!-- TODO: this should be generated dynamically -->
					<li><a href="/test">Test Page</a></li>
				</ul>
			</div>
		</nav>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
