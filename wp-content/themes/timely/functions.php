<?php
/**
 * Timely functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Timely
 */

if ( ! function_exists( 'timely_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function timely_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Timely, use a find and replace
	 * to change 'timely' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'timely', get_template_directory() . '/languages' );

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
	add_image_size( 'timely-index', 966, 555, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'timely' ),
		'social' => esc_html__( 'Social Media Menu', 'hume' ),
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

	// Add theme support for Custom Logo
	add_theme_support( 'custom-logo', array(
		'width' => 250,
		'height' => 250,
		'flex-width' => false,
	));

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'timely_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function timely_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'timely_content_width', 640 );
}
add_action( 'after_setup_theme', 'timely_content_width', 0 );


/**
 * Register custom fonts.
 */
function timely_fonts_url() {
	$fonts_url = '';

	/**
	 * Translators: If there are characters in your language that are not
	 * supported by Rubik and Roboto Mono translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$rubik = _x( 'on', 'Rubik font: on or off', 'timely' );
	$roboto_slab = _x( 'on', 'Roboto Slab font: on or off', 'timely' );
	$slabo = _x( 'on', 'Slabo 27px font: on or off', 'timely' );

	$font_families = array();

	if ( 'off' !== $rubik ) {
		$font_families[] = 'Rubik:300,300i,400,400i';
	}

	if ( 'off' !== $roboto_slab ) {
		$font_families[] = 'Roboto Slab:400,100,300,700';
	}

	if ( in_array( 'on', array($rubik, $roboto_slab) ) ) {

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function timely_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'timely-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'timely_resource_hints', 10, 2 );



/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @origin Twenty Seventeen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function timely_content_image_sizes_attr( $sizes, $size ) {
	if ( is_singular() ) {
		$width = $size[0];
		if ( 610 <= $width ) {
			$sizes = '(min-width: 990px) 720px, (min-width: 1300px) 610px, 95vw';
		}
		return $sizes;
	}
}
add_filter( 'wp_calculate_image_sizes', 'timely_content_image_sizes_attr', 10, 2 );


/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @origin Twenty Seventeen 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function timely_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_singular() ) {
		$attr['sizes'] = '(min-width: 990px) 720px, (min-width: 1300px) 820px, 95vw';
	} else {
		$attr['sizes'] = '(min-width: 990px) 955px, (min-width: 1300px) 966px, 95vw';
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'timely_post_thumbnail_sizes_attr', 10, 3 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function timely_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'timely' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'timely' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'timely_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function timely_scripts() {
	// Enqueue Google Fonts:
	wp_enqueue_style( 'timely-fonts', timely_fonts_url() );

	wp_enqueue_style( 'timely-style', get_stylesheet_uri() );

	wp_enqueue_script( 'timely-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20151215', true );
	wp_localize_script( 'timely-navigation', 'timelyScreenReaderText', array(
		'expand' => __( 'Expand child menu', 'timely'),
		'collapse' => __( 'Collapse child menu', 'timely'),
	));

	wp_enqueue_script( 'timely-functions', get_template_directory_uri() . '/js/functions.js', array('jquery'), '20161201', true );
	wp_enqueue_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), '3.3.5', true );
	wp_enqueue_script( 'timely-scroll', get_template_directory_uri() . '/js/scroll.js', array('jquery'), '', true );	wp_enqueue_script( 'timely-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

function replace_vc_gitem_post_image_background($output){
    // Get the URL to replace in string background-image: url('https://yoursite.com/wp-content/plugins/js_composer/assets/vc/vc_gitem_image.png') !important;
    $url = get_site_url(null, '/wp-content/plugins/js_composer/assets/vc/vc_gitem_image.png');
    // Full http(s) path to image
    $new_url = get_template_directory_uri() . '/images/default-thumb.png'; // 1024x1024 image
    // String Replace
    $new_output = str_replace($url, $new_url, $output);
    // Return new string
    return $new_output;
}

add_filter('vc_gitem_template_attribute_post_image_background_image_css_value', 'replace_vc_gitem_post_image_background', 10);

add_action( 'wp_enqueue_scripts', 'timely_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load SVG icon functions.
 */
require get_template_directory() . '/inc/icon-functions.php';

/**
 * Load custom widgets
 */
require get_template_directory() . "/widgets/recent-comments.php";
require get_template_directory() . "/widgets/recent-posts.php";

add_filter( 'wp_nav_menu_items','add_search_box', 10, 2 );
 function add_search_box( $items, $args ) {
     $items .= '<li>' . get_search_form( false ) . '</li>';
     return $items;
 }
