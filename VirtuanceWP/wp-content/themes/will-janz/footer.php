<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package will-janz
 */

?>

	</div><!-- #content -->



	<footer class="page-footer">
		<div class="container">
			<div class="row">
				<div class="col l6 s12">
					<?php
					$will_janz_description = get_bloginfo( 'description', 'display' );
					if ( $will_janz_description || is_customize_preview() ) :
						?>
						<h5 class="white-text"><?php echo $will_janz_description; /* WPCS: xss ok. */ ?></h5>
					<?php endif; ?>
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'will-janz' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'will-janz' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'will-janz' ), 'will-janz', '<a href="http://underscores.me/">Will Janz</a>' );
				?>
				</div>
				<div class="col l4 offset-l2 s12">
					<h5 class="white-text">Links</h5>
					<ul>
						<li><a class="grey-text text-lighten-3" href="/">Home</a></li>
						<li><a class="grey-text text-lighten-3" href="/test">Test</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container">© $current_year Will Janz</div>
		</div>
	</footer>

	<footer id="colophon" class="site-footer">

		<div class="site-info">

		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
