<?php
/**
 * froma2c functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package froma2c
 */

if ( ! function_exists( 'froma2c_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function froma2c_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on froma2c, use a find and replace
	 * to change 'froma2c' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'froma2c', get_template_directory() . '/languages' );

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
		'menu-1' => esc_html__( 'Primary', 'froma2c' ),
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
	add_theme_support( 'custom-background', apply_filters( 'froma2c_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'froma2c_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function froma2c_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'froma2c_content_width', 640 );
}
add_action( 'after_setup_theme', 'froma2c_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function froma2c_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'froma2c' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'froma2c' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'froma2c_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function froma2c_scripts() {
	wp_enqueue_style( 'froma2c-style', get_stylesheet_uri() );
	
	//enqueue froma2c added styles
	wp_enqueue_style( 'froma2c-reset-style', get_template_directory_uri() . '/layouts/reset.css'  );
	wp_enqueue_style( 'froma2c-anna-style', get_template_directory_uri() . '/layouts/style.css'  );
	
	//enqueue sidebar styles
	wp_enqueue_style( 'froma2c-content-sidebar-style', get_template_directory_uri() . '/layouts/content-sidebar.css'  );
	//wp_enqueue_style( 'froma2c-sidebar-content-style', get_template_directory_uri() . '/layouts/sidebar-content.css'  );

	wp_enqueue_script( 'froma2c-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'froma2c-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'froma2c_scripts' );

/**
 * Enqueue Google Fonts.
 */

add_action( 'wp_enqueue_scripts', 'bg_load_google_fonts' );
function bg_load_google_fonts() {
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Asap|Assistant|Muli|Nunito|Oxygen', array(), CHILD_THEME_VERSION );
}



/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function froma2c_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'froma2c_pingback_header' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Additional features to allow styling of the templates.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
*Additional customizer controls
*/

function themeslug_customize_register( $wp_customize ) {
   $wp_customize->add_section( 'custom_css', array(
   'title' => __( 'Custom Con CSS' ),
   'description' => __( 'Add custom CSS here' ),
   'panel' => '', // Not typically needed.
   'priority' => 190,
   'capability' => 'edit_theme_options',
   'theme_supports' => '', // Rarely needed.
 ) );
}
add_action( 'customize_register', 'themeslug_customize_register' );