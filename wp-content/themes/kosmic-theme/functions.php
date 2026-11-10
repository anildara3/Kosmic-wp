<?php
/**
 * Kosmic Studio 4 Danz Theme Functions and Definitions
 *
 * @package Kosmic
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Define Theme Constants
 */
define('KOSMIC_VERSION', '1.1.1');
define('KOSMIC_DIR', get_template_directory());
define('KOSMIC_URI', get_template_directory_uri());

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function kosmic_theme_setup() {
    // Make theme available for translation.
    load_theme_textdomain('kosmic', KOSMIC_DIR . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title.
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(850, 480, true);
    add_image_size('kosmic-blog-thumb', 400, 260, true);
    add_image_size('kosmic-recent-thumb', 100, 100, true);

    // Switch default core markup to output valid HTML5.
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Custom Logo Support
    add_theme_support('custom-logo', array(
        'height'      => 70,
        'width'       => 260,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Responsive embeds
    add_theme_support('responsive-embeds');

    // Register Navigation Menus
    register_nav_menus(array(
        'primary_menu'      => esc_html__('Primary Navigation', 'kosmic'),
        'mobile_menu'       => esc_html__('Mobile Navigation', 'kosmic'),
        'footer_quicklinks' => esc_html__('Footer Quick Links', 'kosmic'),
        'footer_legal'      => esc_html__('Footer Legal Links', 'kosmic'),
    ));
}
add_action('after_setup_theme', 'kosmic_theme_setup');

/**
 * Enqueue scripts and styles.
 */
function kosmic_enqueue_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'kosmic-google-fonts',
        'https://fonts.googleapis.com/css2?family=Norican&family=Poppins:wght@300;400;500;600;700;800&display=swap',
        array(),
        null
    );

    // Core Vendor CSS
    wp_enqueue_style('bootstrap', KOSMIC_URI . '/assets/css/bootstrap.min.css', array(), '5.3.0');
    wp_enqueue_style('fontawesome', KOSMIC_URI . '/assets/css/fontawesome.min.css', array(), '6.0.0');
    wp_enqueue_style('magnific-popup', KOSMIC_URI . '/assets/css/magnific-popup.min.css', array(), '1.1.0');
    wp_enqueue_style('slick', KOSMIC_URI . '/assets/css/slick.min.css', array(), '1.8.1');

    // Main Studio CSS (Consolidated Design System)
    wp_enqueue_style('kosmic-main-style', KOSMIC_URI . '/assets/css/style.css', array('bootstrap', 'fontawesome'), KOSMIC_VERSION);

    // Theme Root style.css
    wp_enqueue_style('kosmic-theme-style', get_stylesheet_uri(), array('kosmic-main-style'), KOSMIC_VERSION);

    // Scripts (Register & Enqueue)
    wp_enqueue_script('jquery');

    wp_enqueue_script('slick', KOSMIC_URI . '/assets/js/slick.min.js', array('jquery'), '1.8.1', true);
    wp_enqueue_script('bootstrap-bundle', KOSMIC_URI . '/assets/js/bootstrap.min.js', array('jquery'), '5.3.0', true);
    wp_enqueue_script('magnific-popup', KOSMIC_URI . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), '1.1.0', true);
    wp_enqueue_script('counterup', KOSMIC_URI . '/assets/js/jquery.counterup.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('jquery-ui', KOSMIC_URI . '/assets/js/jquery-ui.min.js', array('jquery'), '1.13.2', true);
    wp_enqueue_script('imagesloaded');
    wp_enqueue_script('isotope', KOSMIC_URI . '/assets/js/isotope.pkgd.min.js', array('jquery'), '3.0.6', true);
    wp_enqueue_script('tweenmax', KOSMIC_URI . '/assets/js/tweenmax.min.js', array(), '2.1.3', true);
    wp_enqueue_script('nice-select', KOSMIC_URI . '/assets/js/nice-select.min.js', array('jquery'), '1.0', true);

    // Main Theme JavaScript Interaction Logic
    wp_enqueue_script('kosmic-main-js', KOSMIC_URI . '/assets/js/main.js', array('jquery', 'slick', 'bootstrap-bundle', 'magnific-popup'), KOSMIC_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'kosmic_enqueue_scripts');

/**
 * Register widget area.
 */
function kosmic_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Blog Sidebar', 'kosmic'),
        'id'            => 'blog-sidebar',
        'description'   => esc_html__('Add widgets here to appear in your blog sidebar.', 'kosmic'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget_title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'kosmic_widgets_init');

/**
 * Helper to generate asset URLs
 *
 * @param string $path Path relative to assets directory
 * @return string Full asset URL
 */
function kosmic_asset($path = '') {
    return KOSMIC_URI . '/assets/' . ltrim($path, '/');
}

/**
 * Helper to get page URL by slug or return fallback
 *
 * @param string $slug Page slug
 * @param string $fallback Fallback relative or full URL
 * @return string URL
 */
function kosmic_page_url($slug, $fallback = '#') {
    $page = get_page_by_path($slug);
    if ($page) {
        return esc_url(get_permalink($page->ID));
    }
    return esc_url(home_url('/' . ltrim($fallback, '/')));
}

/**
 * Custom excerpt length
 */
function kosmic_custom_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'kosmic_custom_excerpt_length', 999);

/**
 * Custom excerpt more
 */
function kosmic_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'kosmic_excerpt_more');

/**
 * Include Custom Post Types, Theme Options, ACF Fields, CF7 Setup, and Seeder
 */
require_once KOSMIC_DIR . '/inc/cpt.php';
require_once KOSMIC_DIR . '/inc/theme-options.php';
require_once KOSMIC_DIR . '/inc/acf-fields.php';
require_once KOSMIC_DIR . '/inc/cf7-setup.php';
require_once KOSMIC_DIR . '/inc/demo-importer.php';


