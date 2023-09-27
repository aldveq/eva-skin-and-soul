<?php

/**
 * Eva Skin And Soul functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Base_Theme
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	// TODO: Replace time() with static version on production launch
	define('_S_VERSION', time());
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function base_theme_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Eva Skin And Soul, use a find and replace
		* to change 'theme-eva-skin-and-soul' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('theme-eva-skin-and-soul', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'theme-eva-skin-and-soul'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'base_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	add_filter('use_block_editor_for_post', '__return_false');
	add_action( 'init', function() {
		remove_post_type_support( 'page', 'editor' );
	}, 99);

    // Add image sizes
    add_image_size('logo_size', 69, 37, true);
}
add_action('after_setup_theme', 'base_theme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function base_theme_content_width()
{
	$GLOBALS['content_width'] = apply_filters('base_theme_content_width', 640);
}
add_action('after_setup_theme', 'base_theme_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function base_theme_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'theme-eva-skin-and-soul'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'theme-eva-skin-and-soul'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'base_theme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function base_theme_scripts()
{
	wp_enqueue_style('theme-eva-skin-and-soul-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_enqueue_style( 'theme-eva-skin-and-soul-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css', array(), null, 'all' );
	wp_style_add_data('theme-eva-skin-and-soul-style', 'rtl', 'replace');

	wp_enqueue_script('theme-eva-skin-and-soul-classes', get_template_directory_uri() . '/js/add-classes.js', array('jquery'), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'base_theme_scripts');

require get_template_directory() . '/inc/script-calls.php';

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
 * Theme Options
 */
require get_template_directory() . '/inc/theme-options.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}
