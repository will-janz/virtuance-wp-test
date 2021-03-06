<?php
/**
 * will-janz functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package will-janz
 */

if ( ! function_exists( 'will_janz_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function will_janz_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on will-janz, use a find and replace
		 * to change 'will-janz' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'will-janz', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'will-janz' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'will_janz_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'will_janz_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function will_janz_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'will_janz_content_width', 640 );
}
add_action( 'after_setup_theme', 'will_janz_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function will_janz_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'will-janz' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'will-janz' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'will_janz_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function will_janz_scripts() {
	// Using Materialize as the base
	wp_enqueue_style( 'materialize.min.css', get_template_directory_uri() . '/css/materialize.min.css' );
	wp_enqueue_script( 'materialize.min.js', get_template_directory_uri() . '/js/materialize.min.js' );

	// Fetch contacts script that should probably be a plugin
	wp_enqueue_script( 'fetch-contacts', get_template_directory_uri() .'/js/fetch-contacts.js', array( 'jquery' ), null, true );
	// Populate AJAX object; if only the docs told you to do this
	wp_localize_script( 'fetch-contacts', 'my_ajax_obj', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

	wp_enqueue_style( 'will-janz-style', get_stylesheet_uri() );

	wp_enqueue_script( 'will-janz-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'will-janz-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'will_janz_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
 * Custom AJAX
 */
function fetch_contacts() {
	// I've gone past my three hours around here
	// I don't want to bring in another library for one API call,
	// so the next TODO would be to cURL the endpoint and forward that over.
	// I don't currently have a place to store my API key,
	// probably make it a config option for a plugin or something.

	// For now, dummy data
	echo json_encode([
		[
			'first_name' => 'First1',
			'last_name'  => 'Last1',
			'email'      => 'first_last1@example.com',
		],
		[
			'first_name' => 'First2',
			'last_name'  => 'Last2',
			'email'      => 'first_last2@example.com',
		],
		[
			'first_name' => 'First3',
			'last_name'  => 'Last3',
			'email'      => 'first_last3@example.com',
		],
		[
			'first_name' => 'First4',
			'last_name'  => 'Last4',
			'email'      => 'first_last4@example.com',
		],
		[
			'first_name' => 'First5',
			'last_name'  => 'Last5',
			'email'      => 'first_last5@example.com',
		],
	]);

	// Finish
	wp_die();
}
add_action('wp_ajax_fetch_contacts', 'fetch_contacts');
add_action('wp_ajax_nopriv_fetch_contacts', 'fetch_contacts');
