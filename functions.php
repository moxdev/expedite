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
		add_image_size( 'home-carousel-sm', 750, 340, true );
		add_image_size( 'home-carousel-md', 1000, 455, true );
		add_image_size( 'home-carousel-lg', 1500, 680, true );
		add_image_size( 'home-carousel-xl', 2200, 1000, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu'     => esc_html__( 'Main Menu', 'expedite_delivery_system' ),
				'aux_menu' => esc_html__( 'Aux Menu', 'expedite_delivery_system' ),
				'ftr_menu' => esc_html__( 'Footer Menu', 'expedite_delivery_system' ),
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
	wp_enqueue_style( 'expedite_delivery_system-style', get_stylesheet_uri() );

	wp_enqueue_script( 'expedite_delivery_system-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'expedite_delivery_system-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

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
	acf_add_options_sub_page(
		array(
			'page_title'  => 'Footer Content',
			'menu_title'  => 'Footer Content',
			'menu_slug'   => 'footer-custom-content',
			'post_id'     => 'footer-custom-content',
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

	$labels  = array(
		'name'                  => 'Testimonials',
		'singular_name'         => 'Testimonial',
		'menu_name'             => 'Testimonials',
		'name_admin_bar'        => 'Testimonials',
		'archives'              => 'Testimonials Archives',
		'attributes'            => 'Testimonials Attributes',
		'parent_item_colon'     => 'Parent Item: Testimonials',
		'all_items'             => 'All Testimonials',
		'add_new_item'          => 'Add New Testimonial',
		'add_new'               => 'Add New Testimonial',
		'new_item'              => 'New Testimonial',
		'edit_item'             => 'Edit Testimonial',
		'update_item'           => 'Update Testimonial',
		'view_item'             => 'View Testimonial',
		'view_items'            => 'View Testimonials',
		'search_items'          => 'Search Testimonials',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into item',
		'uploaded_to_this_item' => 'Uploaded to this item',
		'items_list'            => 'Items list',
		'items_list_navigation' => 'Items list navigation',
		'filter_items_list'     => 'Filter items list',
	);
	$rewrite = array(
		'slug'       => 'testimonial',
		'with_front' => true,
		'pages'      => true,
		'feeds'      => true,
	);
	$args    = array(
		'label'               => 'Testimonial',
		'description'         => 'Testimonial Section',
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'revisions' ),
		'taxonomies'          => array( 'testimonial' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-testimonial',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => false,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'query_var'           => 'testimonial',
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
		'show_in_rest'        => true,
	);
	register_post_type( 'testimonials', $args );

}
add_action( 'init', 'expedite_delivery_system_create_testimonial_custom_post_type', 0 );

// Adds arrow button from mobile menu dropdown.
add_filter( 'walker_nav_menu_start_el', 'expedite_delivery_system_add_arrow', 10, 4 );
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
	if ( 'main' === $args->theme_location && in_array( 'menu-item-has-children', $item->classes, true ) ) {
		$item_output .= '<button class="arrow"><span class="screen-reader-text">Toggle Item</span></button>';
	}
	return $item_output;
}

/**
 * Object Fit Polyfill for IE
 *
 * @link https://github.com/bfred-it/object-fit-images
 */
function quantum_object_fit_js() { ?>
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
