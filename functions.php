<?php
/**
 * Expedite Delivery System functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Expedite_Delivery_System
 */

if ( ! function_exists( 'expedite_delivery_system_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function expedite_delivery_system_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Expedite Delivery System, use a find and replace
		 * to change 'expedite_delivery_system' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'expedite_delivery_system', get_template_directory() . '/languages' );

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
		add_image_size( 'home-testimonial-sm', 750, 500, true );
		add_image_size( 'home-testimonial-md', 1000, 667, true );
		add_image_size( 'home-testimonial-lg', 1500, 1000, true );
		add_image_size( 'home-testimonial-xl', 2200, 1467, true );

		add_image_size( 'icon-cards', 298, 9999, false );

		add_image_size( 'icon-mobile-app', 236, 9999, false );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-main' => esc_html__( 'Main Menu', 'expedite_delivery_system' ),
				'menu-aux'  => esc_html__( 'Aux Menu', 'expedite_delivery_system' ),
				'menu-ftr'  => esc_html__( 'Footer Menu', 'expedite_delivery_system' ),
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
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'expedite_delivery_system_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

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
	}
endif;
add_action( 'after_setup_theme', 'expedite_delivery_system_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function expedite_delivery_system_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'expedite_delivery_system_content_width', 640 );
}
add_action( 'after_setup_theme', 'expedite_delivery_system_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function expedite_delivery_system_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'expedite_delivery_system' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'expedite_delivery_system' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'expedite_delivery_system_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function expedite_delivery_system_scripts() {
	wp_enqueue_style( 'expedite-delivery-system-style', get_stylesheet_uri(), array(), '20190422' );

	wp_enqueue_script( 'expedite-delivery-system-navigation', get_template_directory_uri() . '/js/min/navigation.min.js', array( 'expedite-delivery-system-focus-trap-library' ), '20190422', true );

	wp_enqueue_script( 'expedite-delivery-system-skip-link-focus-fix', get_template_directory_uri() . '/js/min/skip-link-focus-fix.min.js', array(), '20190422', true );

	wp_register_script( 'expedite-delivery-system-waypoints-library', get_template_directory_uri() . '/js/vendor/noframework.waypoints.min.js', array(), '20190422', true );

	wp_register_script( 'expedite-delivery-system-focus-trap-library', get_template_directory_uri() . '/js/vendor/focus-trap.min.js', array(), '20190422', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'expedite_delivery_system_scripts' );

/**
 * Global Site Information
 */
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page(
		array(
			'page_title' => 'Global Website Information',
			'menu_title' => 'Site Global Info',
			'menu_slug'  => 'global-information',
			'post_id'    => 'global-information',
			'capability' => 'edit_posts',
		)
	);
	acf_add_options_sub_page(
		array(
			'page_title'  => 'Contact Information',
			'menu_title'  => 'Contact Info',
			'menu_slug'   => 'contact-information',
			'post_id'     => 'contact-information',
			'parent_slug' => 'global-information',
		)
	);
	acf_add_options_sub_page(
		array(
			'page_title'  => 'Social Media Channels',
			'menu_title'  => 'Social Media',
			'menu_slug'   => 'social-media-channels',
			'post_id'     => 'social-media-channels',
			'parent_slug' => 'global-information',
		)
	);
}

/**
 * Register Custom Post Type for Testimonial
 *
 * @return void
 */
function expedite_delivery_system_create_testimonial_custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Testimonials', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Testimonials', 'text_domain' ),
		'name_admin_bar'        => __( 'Testimonials', 'text_domain' ),
		'archives'              => __( 'Testimonial Archives', 'text_domain' ),
		'attributes'            => __( 'Testimonial Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Testimonial:', 'text_domain' ),
		'all_items'             => __( 'All Testimonials', 'text_domain' ),
		'add_new_item'          => __( 'Add New Testimonial', 'text_domain' ),
		'add_new'               => __( 'Add Testimonial', 'text_domain' ),
		'new_item'              => __( 'New Testimonial', 'text_domain' ),
		'edit_item'             => __( 'Edit Testimonial', 'text_domain' ),
		'update_item'           => __( 'Update Testimonial', 'text_domain' ),
		'view_item'             => __( 'View Testimonial', 'text_domain' ),
		'view_items'            => __( 'View Testimonial', 'text_domain' ),
		'search_items'          => __( 'Search Testimonials', 'text_domain' ),
		'not_found'             => __( 'Testimonial Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Testimonial Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Testimonial Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into testimonial', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this testimonial', 'text_domain' ),
		'items_list'            => __( 'Testimonials list', 'text_domain' ),
		'items_list_navigation' => __( 'Testimonials list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter testimonials list', 'text_domain' ),
	);
	$args   = array(
		'label'               => __( 'Testimonial', 'text_domain' ),
		'description'         => __( 'Testimonials', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'revisions' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-testimonial',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'testimonial', $args );

}
add_action( 'init', 'expedite_delivery_system_create_testimonial_custom_post_type', 0 );

/**
 * Main nav submenu toggling.
 * Add arrow icons into registered menu "main"
 *
 * @param string $item_output String to be output after menu items.
 * @param object $item Menu item.
 * @param int    $depth Depth of each menu item.
 * @param object $args Menu.
 */
function expedite_delivery_system_add_arrow( $item_output, $item, $depth, $args ) {
	if ( 'menu-main' === $args->theme_location && in_array( 'menu-item-has-children', $item->classes, true ) ) {
		$item_output .= '<button class="toggle-sub-menu"><span class="screen-reader-text">' . __( 'Toggle Item', 'expedite_delivery_system' ) . '</span></button>';
	}
	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'expedite_delivery_system_add_arrow', 10, 4 );

/**
 * Object Fit Polyfill for IE
 *
 * @link https://github.com/bfred-it/object-fit-images
 */
function expedite_delivery_system_object_fit_js() { ?>
	<script>objectFitImages();</script>
	<?php
}

add_filter( 'wpseo_metabox_prio', 'yoast_to_bottom' );
/**
 * Move Yoast to bottom of page in WP backend
 */
function yoast_to_bottom() {
	return 'low';
}

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
 * Front Page Featured Image.
 */
require get_template_directory() . '/inc/components/front-page/fp-featured-img.php';

/**
 * Front Page Icon Section.
 */
require get_template_directory() . '/inc/components/front-page/fp-icon-section.php';

/**
 * Front Page Mobile App Icon Section.
 */
require get_template_directory() . '/inc/components/front-page/fp-mobile-app-section.php';

/**
 * Front Page Callout Section.
 */
require get_template_directory() . '/inc/components/front-page/fp-call-out-section.php';

/**
 * Front Page Testimonial Section.
 */
require get_template_directory() . '/inc/components/front-page/fp-testimonial-section.php';
