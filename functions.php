<?php

if ( ! function_exists( 'wordpolymer_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own wordpolymer_setup() function to override in a child theme.
 *
 * @since 1.0
 */
function wordpolymer_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on WordPolymer, use a find and replace
	 * to change 'wordpolymer' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'wordpolymer', get_template_directory() . '/languages' );
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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 0, true );
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'wordpolymer' ),
//		'social'  => __( 'Social Links Menu', 'wordpolymer' ),
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
	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
//	add_editor_style( array( 'css/editor-style.css', wordpolymer_fonts_url() ) );
}
endif; // wordpolymer_setup
add_action( 'after_setup_theme', 'wordpolymer_setup' );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since 1.0
 */
function wordpolymer_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'wordpolymer' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'wordpolymer' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Content Bottom 1', 'wordpolymer' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'wordpolymer' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Content Bottom 2', 'wordpolymer' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'wordpolymer' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'wordpolymer_widgets_init' );

/**
 * Enqueues scripts and styles.
 *
 * @since 1.0
 */
function wordpolymer_scripts() {
	// Theme stylesheet.
	wp_enqueue_style( 'wordpolymer-style', get_stylesheet_uri() );

	// Load WebComponents polyfill
	wp_enqueue_script( 'wordpolymer-webcomponents', get_template_directory_uri() . '/bower_components/webcomponentsjs/webcomponents.js' );
?>
	<link rel="import" href="<?php echo get_template_directory_uri(); ?>/bower_components/iron-icons/iron-icons.html">
	<link rel="import" href="<?php echo get_template_directory_uri(); ?>/bower_components/iron-icons/communication-icons.html">
	<link rel="import" href="<?php echo get_template_directory_uri(); ?>/bower_components/iron-icons/device-icons.html">
	<link rel="import" href="<?php echo get_template_directory_uri(); ?>/bower_components/font-roboto/roboto.html">
	<link rel="import" href="<?php echo get_template_directory_uri(); ?>/bower_components/paper-header-panel/paper-header-panel.html">
	<link rel="import" href="<?php echo get_template_directory_uri(); ?>/bower_components/paper-toolbar/paper-toolbar.html">
	<link rel="import" href="<?php echo get_template_directory_uri(); ?>/bower_components/paper-tabs/paper-tabs.html">
	<link rel="import" href="<?php echo get_template_directory_uri(); ?>/bower_components/paper-button/paper-button.html">
	<link rel="import" href="<?php echo get_template_directory_uri(); ?>/bower_components/paper-icon-button/paper-icon-button.html">
<?php
}
add_action( 'wp_enqueue_scripts', 'wordpolymer_scripts' );

class wordpolymer_walker_nav_menu extends Walker_Nav_Menu {
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		if( in_array('current-menu-item', $classes ) ) {
			$classes[] = 'core-selected';
		}

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<paper-tab' . $id . $class_names .'>';

		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = ' horizontal center-center layout';

		if( in_array('current-menu-item', $classes ) ) {
			$attributes .= ' active';
		}

		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		/** This filter is documented in wp-includes/post-template.php */
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$output .= "</paper-tab>\n";
	}
}
