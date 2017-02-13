<?php

/**
 * Remove the Admin Login Header
 */
function removeAdminLoginHeader() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'removeAdminLoginHeader');

/**
 * Adds theme support for custom header, feed links, title tag, post formats, HTML5 and post thumbnails
 */
function addThemeSupports() {
	add_theme_support('custom-header');
	add_theme_support('automatic-feed-links');
	add_theme_support('title-tag');
	add_theme_support('post-formats', array(
		'aside',
		'link',
		'gallery',
		'status',
		'quote',
		'image',
		'video',
		'audio',
		'chat'
	));
	add_theme_support('html5', array(
		'comment-list',
		'comment-form',
		'search-form',
		'gallery',
		'caption',
	));
	add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'addThemeSupports');

function registerStyles() {
    wp_register_style('custom-style', get_template_directory_uri() . '/css/style.css', array(), '20120208', 'all');
    wp_enqueue_style('custom-font', '//fonts.googleapis.com/css?family=Oswald:300|Playfair+Display|Source+Sans+Pro:300,400', array(), null );
    wp_enqueue_style('google-material-icons', '//fonts.googleapis.com/icon?family=Material+Icons', array(), null);
    wp_enqueue_style('custom-style');
}
add_action('wp_enqueue_scripts', 'registerStyles');

/**
 * Register the scripts
 */
function registerScripts() {
    wp_register_script('segments', '//cdnjs.cloudflare.com/ajax/libs/segment-js/1.0.8/segment.js', array());
    wp_register_script('custom-script', get_template_directory_uri() . '/js/script.js', array('jquery', 'segments'));
    
    wp_enqueue_script('jquery-color-plugin', get_template_directory_uri() . '/js/lib/jquery.color-2.1.2.min.js', array('jquery'), null);
    wp_enqueue_script('jquery-countdown-plugin', get_template_directory_uri() . '/js/lib/jquery.countdown.min.js', array('jquery'), null);
    wp_enqueue_script('custom-script');
}
add_action('wp_enqueue_scripts', 'registerScripts');

/**
 * Register the menus
 */
function addMenus() {
	register_nav_menus(array(
		'header-menu' => __('Header Menu', 'taxikos'),
        'footer-menu' => __('Footer Menu', 'taxikos'),
	));
}
add_action('init', 'addMenus');

function addMenuAttributes($atts, $item, $args) {
	$atts['data-hover'] = $item->title;
    return $atts;
}
add_filter('nav_menu_link_attributes', 'addMenuAttributes', 10, 3);

/**
 * Initialize all widgets
 */
function initWidgets() {
    register_sidebar( array(
        'name'          => __( 'Custom Widget Area Footer Left (1)', 'yourthemename' ),
        'id'            => 'widget-custom-footer-1',
        'description'   => __( 'Custom widget area for the header of my theme', 'yourthemename' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<span class="widget-title">',
        'after_title'   => '</span>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Custom Widget Area Footer Left (2)', 'yourthemename' ),
        'id'            => 'widget-custom-footer-2',
        'description'   => __( 'Custom widget area for the header of my theme', 'yourthemename' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<span class="widget-title">',
        'after_title'   => '</span>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Custom Widget Area Footer Right (1)', 'yourthemename' ),
        'id'            => 'widget-custom-footer-3',
        'description'   => __( 'Custom widget area for the header of my theme', 'yourthemename' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<span class="widget-title">',
        'after_title'   => '</span>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Custom Widget Area Footer Right (2)', 'yourthemename' ),
        'id'            => 'widget-custom-footer-4',
        'description'   => __( 'Custom widget area for the header of my theme', 'yourthemename' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<span class="widget-title">',
        'after_title'   => '</span>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Header Widget', 'yourthemename' ),
        'id'            => 'widget-custom-header',
        'description'   => __( 'Custom widget area for the header of my theme', 'yourthemename' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s widget-header">',
        'after_widget'  => '</div>',
        'before_title'  => '<span class="widget-title">',
        'after_title'   => '</span>',
    ) );
}
add_action( 'widgets_init', 'initWidgets' );
