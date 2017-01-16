<?php
/**
 * Twenty Fourteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link https://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
/**
 * Set up the content width value based on the theme's design.
 *
 * @see twentyfourteen_content_width()
 *
 * @since Twenty Fourteen 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 474;
}
/**
 * Twenty Fourteen only works in WordPress 3.6 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '3.6', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}
include "include/img_resize.php";
if ( ! function_exists( 'twentyfourteen_setup' ) ) :
/**
 * Twenty Fourteen setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_setup() {
	/*
	 * Make Twenty Fourteen available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Fourteen, use a find and
	 * replace to change 'twentyfourteen' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'twentyfourteen', get_template_directory() . '/languages' );
	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'css/editor-style.css', twentyfourteen_font_url(), 'genericons/genericons.css' ) );
	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );
	add_image_size( 'twentyfourteen-full-width', 1038, 576, true );
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'twentyfourteen' ),
		'secondary' => __( 'Secondary menu in left sidebar', 'twentyfourteen' ),
	) );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
	/*
	 * Enable support for Post Formats.
	 * See https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
	) );
	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'twentyfourteen_custom_background_args', array(
		'default-color' => 'f5f5f5',
	) ) );
	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'twentyfourteen_get_featured_posts',
		'max_posts' => 6,
	) );
	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
endif; // twentyfourteen_setup
add_action( 'after_setup_theme', 'twentyfourteen_setup' );
/**
 * Adjust content_width value for image attachment template.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_content_width() {
	if ( is_attachment() && wp_attachment_is_image() ) {
		$GLOBALS['content_width'] = 810;
	}
}
add_action( 'template_redirect', 'twentyfourteen_content_width' );
/**
 * Getter function for Featured Content Plugin.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return array An array of WP_Post objects.
 */
function twentyfourteen_get_featured_posts() {
	/**
	 * Filter the featured posts to return in Twenty Fourteen.
	 *
	 * @since Twenty Fourteen 1.0
	 *
	 * @param array|bool $posts Array of featured posts, otherwise false.
	 */
	return apply_filters( 'twentyfourteen_get_featured_posts', array() );
}
/**
 * A helper conditional function that returns a boolean value.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return bool Whether there are featured posts.
 */
function twentyfourteen_has_featured_posts() {
	return ! is_paged() && (bool) twentyfourteen_get_featured_posts();
}
/**
 * Register three Twenty Fourteen widget areas.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_widgets_init() {
	require get_template_directory() . '/inc/widgets.php';
	register_widget( 'Twenty_Fourteen_Ephemera_Widget' );
	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'twentyfourteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on the left.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Content Sidebar', 'twentyfourteen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Additional sidebar that appears on the right.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'twentyfourteen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears in the footer section of the site.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'twentyfourteen_widgets_init' );
/**
 * Register Lato Google font for Twenty Fourteen.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return string
 */
function twentyfourteen_font_url() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'twentyfourteen' ) ) {
		$query_args = array(
			'family' => urlencode( 'Lato:300,400,700,900,300italic,400italic,700italic' ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$font_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}
	return $font_url;
}
/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_scripts() {
	// Add Lato font, used in the main stylesheet.
	wp_enqueue_style( 'twentyfourteen-lato', twentyfourteen_font_url(), array(), null );
	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.0.3' );
	// Load our main stylesheet.
	wp_enqueue_style( 'twentyfourteen-style', get_stylesheet_uri() );
	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentyfourteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentyfourteen-style' ), '20131205' );
	wp_style_add_data( 'twentyfourteen-ie', 'conditional', 'lt IE 9' );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'twentyfourteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20130402' );
	}
	if ( is_active_sidebar( 'sidebar-3' ) ) {
		wp_enqueue_script( 'jquery-masonry' );
	}
	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
		wp_enqueue_script( 'twentyfourteen-slider', get_template_directory_uri() . '/js/slider.js', array( 'jquery' ), '20131205', true );
		wp_localize_script( 'twentyfourteen-slider', 'featuredSliderDefaults', array(
			'prevText' => __( 'Previous', 'twentyfourteen' ),
			'nextText' => __( 'Next', 'twentyfourteen' )
		) );
	}
	wp_enqueue_script( 'twentyfourteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150315', true );
}
add_action( 'wp_enqueue_scripts', 'twentyfourteen_scripts' );
/**
 * Enqueue Google fonts style to admin screen for custom header display.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_admin_fonts() {
	wp_enqueue_style( 'twentyfourteen-lato', twentyfourteen_font_url(), array(), null );
}
add_action( 'admin_print_scripts-appearance_page_custom-header', 'twentyfourteen_admin_fonts' );
if ( ! function_exists( 'twentyfourteen_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_the_attached_image() {
	$post                = get_post();
	/**
	 * Filter the default Twenty Fourteen attachment size.
	 *
	 * @since Twenty Fourteen 1.0
	 *
	 * @param array $dimensions {
	 *     An array of height and width dimensions.
	 *
	 *     @type int $height Height of the image in pixels. Default 810.
	 *     @type int $width  Width of the image in pixels. Default 810.
	 * }
	 */
	$attachment_size     = apply_filters( 'twentyfourteen_attachment_size', array( 810, 810 ) );
	$next_attachment_url = wp_get_attachment_url();
	/*
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID',
	) );
	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}
		// get the URL of the next image attachment...
		if ( $next_id ) {
			$next_attachment_url = get_attachment_link( $next_id );
		}
		// or get the URL of the first image attachment.
		else {
			$next_attachment_url = get_attachment_link( reset( $attachment_ids ) );
		}
	}
	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;
if ( ! function_exists( 'twentyfourteen_list_authors' ) ) :
/**
 * Print a list of all site contributors who published at least one post.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_list_authors() {
	$contributor_ids = get_users( array(
		'fields'  => 'ID',
		'orderby' => 'post_count',
		'order'   => 'DESC',
		'who'     => 'authors',
	) );
	foreach ( $contributor_ids as $contributor_id ) :
		$post_count = count_user_posts( $contributor_id );
		// Move on if user has not published a post (yet).
		if ( ! $post_count ) {
			continue;
		}
	?>
	<div class="contributor">
		<div class="contributor-info">
			<div class="contributor-avatar"><?php echo get_avatar( $contributor_id, 132 ); ?></div>
			<div class="contributor-summary">
				<h2 class="contributor-name"><?php echo get_the_author_meta( 'display_name', $contributor_id ); ?></h2>
				<p class="contributor-bio">
					<?php echo get_the_author_meta( 'description', $contributor_id ); ?>
				</p>
				<a class="button contributor-posts-link" href="<?php echo esc_url( get_author_posts_url( $contributor_id ) ); ?>">
					<?php printf( _n( '%d Article', '%d Articles', $post_count, 'twentyfourteen' ), $post_count ); ?>
				</a>
			</div><!-- .contributor-summary -->
		</div><!-- .contributor-info -->
	</div><!-- .contributor -->
	<?php
	endforeach;
}
endif;
/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Presence of header image except in Multisite signup and activate pages.
 * 3. Index views.
 * 4. Full-width content layout.
 * 5. Presence of footer widgets.
 * 6. Single views.
 * 7. Featured content layout.
 *
 * @since Twenty Fourteen 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function twentyfourteen_body_classes( $classes ) {
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
	if ( get_header_image() ) {
		$classes[] = 'header-image';
	} elseif ( ! in_array( $GLOBALS['pagenow'], array( 'wp-activate.php', 'wp-signup.php' ) ) ) {
		$classes[] = 'masthead-fixed';
	}
	if ( is_archive() || is_search() || is_home() ) {
		$classes[] = 'list-view';
	}
	if ( ( ! is_active_sidebar( 'sidebar-2' ) )
		|| is_page_template( 'page-templates/full-width.php' )
		|| is_page_template( 'page-templates/contributors.php' )
		|| is_attachment() ) {
		$classes[] = 'full-width';
	}
	if ( is_active_sidebar( 'sidebar-3' ) ) {
		$classes[] = 'footer-widgets';
	}
	if ( is_singular() && ! is_front_page() ) {
		$classes[] = 'singular';
	}
	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
		$classes[] = 'slider';
	} elseif ( is_front_page() ) {
		$classes[] = 'grid';
	}
	return $classes;
}
add_filter( 'body_class', 'twentyfourteen_body_classes' );
/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @since Twenty Fourteen 1.0
 *
 * @param array $classes A list of existing post class values.
 * @return array The filtered post class list.
 */
function twentyfourteen_post_classes( $classes ) {
	if ( ! post_password_required() && ! is_attachment() && has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	}
	return $classes;
}
add_filter( 'post_class', 'twentyfourteen_post_classes' );
/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Twenty Fourteen 1.0
 *
 * @global int $paged WordPress archive pagination page count.
 * @global int $page  WordPress paginated post page count.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function twentyfourteen_wp_title( $title, $sep ) {
	global $paged, $page;
	if ( is_feed() ) {
		return $title;
	}
	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );
	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}
	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentyfourteen' ), max( $paged, $page ) );
	}
	return $title;
}
add_filter( 'wp_title', 'twentyfourteen_wp_title', 10, 2 );
// Implement Custom Header features.
require get_template_directory() . '/inc/custom-header.php';
// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';
// Add Customizer functionality.
require get_template_directory() . '/inc/customizer.php';
/*
 * Add Featured Content functionality.
 *
 * To overwrite in a plugin, define your own Featured_Content class on or
 * before the 'setup_theme' hook.
 */
if ( ! class_exists( 'Featured_Content' ) && 'plugins.php' !== $GLOBALS['pagenow'] ) {
	require get_template_directory() . '/inc/featured-content.php';
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
ob_start();
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
	  'header-menu-page' => __( 'Header Menu page' ),
	  'side-menu' => __( 'Sidebar menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );
add_theme_support( 'post-thumbnails' ); 
add_action('init', 'your_business');   
function your_business() {   
$labels = array( 
    'name' => _x('Cases', 'post type general name'), 
    'singular_name' => _x('Your business Item', 'post type singular name'), 
    'add_new' => _x('Add New ', 'cases item'), 
    'add_new_item' => __('Add Cases'), 
    'edit_item' => __('Edit Cases'), 
    'new_item' => __('New Your cases'), 
    'view_item' => __('View Your cases'), 
    'search_items' => __('Search Your cases'), 
    'not_found' => __('Nothing found'), 
    'not_found_in_trash' => __('Nothing found in Trash'), 
    'parent_item_colon' => '' 
);   
$args = array( 
    'labels' => $labels, 
    'public' => true, 
    'publicly_queryable' => true, 
    'show_ui' => true, 
    'query_var' => true, 
    'rewrite' => array( 'slug' => 'cases', 'with_front'=> false ), 'capability_type' => 'post', 
    'hierarchical' => true, 
    'menu_position' => null, 
    'supports' => array('title','thumbnail','editor') 
);   
register_post_type( 'cases' , $args ); 
register_taxonomy(
      'categories_csc',
      array( 'cases'),
      array( 'hierarchical' => true,
             'label' => __('Categories', 'series'),
             'query_var' => 'actoraccase',
             'rewrite' => array( 'slug' => 'categories_csc' )
      )
   );
}
add_action('init', 'your_perspektivs');   
function your_perspektivs() {   
$labels = array( 
    'name' => _x('People', 'post type general name'), 
    'singular_name' => _x('People', 'post type singular name'), 
    'add_new' => _x('Add New ', 'People'), 
    'add_new_item' => __('Add New People'), 
    'edit_item' => __('Edit Your People'), 
    'new_item' => __('New Your People'), 
    'view_item' => __('View Your People'), 
    'search_items' => __('Search Your People'), 
    'not_found' => __('Nothing found'), 
    'not_found_in_trash' => __('Nothing found in Trash'), 
    'parent_item_colon' => '' 
);   
$args = array( 
    'labels' => $labels, 
    'public' => true, 
    'publicly_queryable' => true, 
    'show_ui' => true, 
    'query_var' => true, 
    'rewrite' => array( 'slug' => 'perspektivs', 'with_front'=> false ), 'capability_type' => 'post', 
    'hierarchical' => true, 
    'menu_position' => null, 
    'supports' => array('title','editor','thumbnail') 
);   
register_post_type( 'perspektivs' , $args ); 
register_taxonomy(
      'categories_peo',
      array( 'perspektivs' ),
      array( 'hierarchical' => true,
             'label' => __('Categories', 'series'),
             'query_var' => 'actorss',
             'rewrite' => array( 'slug' => 'categories_peo' )
      )
   );
}
if(is_admin())
{
	wp_enqueue_script('field-upload', get_template_directory_uri().'/meta_box/js/field_upload.js', array('jquery') );
}
add_action( 'widgets_init', 'footer_sidebar_one' );
add_action( 'widgets_init', 'footer_sidebar_two' );
add_action( 'widgets_init', 'footer_sidebar_three' );
add_action( 'widgets_init', 'buzz_sidebar_three' );
add_action( 'widgets_init', 'buzz_sidebar_search' );
add_action( 'widgets_init', 'buzz_sidebar_cat' );
add_action( 'widgets_init', 'hover_menu_widget' );
add_action( 'widgets_init', 'res_menu_widget' );
function footer_sidebar_one() {
    register_sidebar( array(
        'name' => __( 'Footer Sidebar One', 'arkitekter' ),
        'id' => 'sidebar-1',
        'description' => __( 'Widgets in this area will be shown on  home pages.', 'arkitekter' ),
        'before_widget' => '<section class="widget footer_widget">',
	'after_widget'  => '</section>',
     ) );
}
function footer_sidebar_two() {
    register_sidebar( array(
        'name' => __( 'Footer Sidebar Two', 'arkitekter' ),
        'id' => 'sidebar-2',
        'description' => __( 'Widgets in this area will be shown on  home pages.', 'arkitekter' ),
        'before_widget' => '<section class="widget footer_widget">',
	'after_widget'  => '</section>',
	'before_title'  => '',
	'after_title'   => '',
    ) );
}
function footer_sidebar_three() {
    register_sidebar( array(
        'name' => __( 'Footer Sidebar Three', 'arkitekter' ),
        'id' => 'sidebar-3',
        'description' => __( 'Widgets in this area will be shown on home pages.', 'arkitekter' ),
        'before_widget' => '',
	'after_widget'  => '',
	'before_title'  => '<h4 class="widget-title">',
	'after_title'   => '</h4>',
    ) );
}
function buzz_sidebar_three() {
    register_sidebar( array(
        'name' => __( 'Buzz Recent Post', 'arkitekter' ),
        'id' => 'sidebar-4',
        'description' => __( 'Widgets in this area will be shown on home pages.', 'arkitekter' ),
        'before_widget' => '<div class="widget">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widget_title">',
	'after_title'   => '</h2>',
    ) );
}
function buzz_sidebar_search() {
    register_sidebar( array(
        'name' => __( 'Buzz Search', 'arkitekter' ),
        'id' => 'sidebar-5',
        'description' => __( 'Widgets in this area will be shown on home pages.', 'arkitekter' ),
        'before_widget' => '<div class="widget"><div class="search_widget">',
	'after_widget'  => '</div></div>',
	'before_title'  => '<h6>',
	'after_title'   => '</h6>',
    ) );
}
function buzz_sidebar_cat() {
    register_sidebar( array(
        'name' => __( 'Buzz post category', 'arkitekter' ),
        'id' => 'sidebar-6',
        'description' => __( 'Widgets in this area will be shown on home pages.', 'arkitekter' ),
        'before_widget' => '<div class="widget"><div class="category_widget">',
	'after_widget'  => '</div></div>',
		'before_title'  => '<h2 class="widget_title side_category">',
	'after_title'   => '</h2>',
    ) );
}
function hover_menu_widget() {
    register_sidebar( array(
        'name' => __( 'Hover Menu', 'arkitekter' ),
        'id' => 'sidebar-7',
        'description' => __( 'Widgets in this area will be shown on hover menu.', 'arkitekter' ),
        'before_widget' => '<div class="fronts"><div class=" drop_header">',
	'after_widget'  => '</div></div>',
	'before_title'  => '<h1>',
	'after_title'   => '</h1>',
    ) );
}
function res_menu_widget() {
    register_sidebar( array(
        'name' => __( 'Responsive  Menu', 'arkitekter' ),
        'id' => 'sidebar-8',
        'description' => __( 'Widgets in this area will be shown on Responsive menu.', 'arkitekter' ),
        'before_widget' => '<ul class="links">',
	'after_widget'  => '</ul>',
	'before_title'  => '',
	'after_title'   => '',
    ) );
}
add_action( 'init', 'Vacancies_post' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function Vacancies_post() {
	$labels = array(
		'name'               => _x( 'Job', 'post type general name', 'arkitekter' ),
		'singular_name'      => _x( 'Job', 'post type singular name', 'arkitekter' ),
		'menu_name'          => _x( 'Job', 'admin menu', 'arkitekter' ),
		'name_admin_bar'     => _x( 'Job', 'add new on admin bar', 'arkitekter' ),
		'add_new'            => _x( 'Add New', 'Vacancies', 'arkitekter' ),
		'add_new_item'       => __( 'Add New Job', 'arkitekter' ),
		'new_item'           => __( 'New Job', 'arkitekter' ),
		'edit_item'          => __( 'Edit Job', 'arkitekter' ),
		'view_item'          => __( 'View Job', 'arkitekter' ),
		'all_items'          => __( 'Ledige stillinger', 'arkitekter' ),
		'search_items'       => __( 'Search Career', 'arkitekter' ),
		'parent_item_colon'  => __( 'Parent Career:', 'arkitekter' ),
		'not_found'          => __( 'No Job found.', 'arkitekter' ),
		'not_found_in_trash' => __( 'No Job found in Trash.', 'arkitekter' )
	);
	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'arkitekter' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'vacancies' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor','thumbnail')
	);
	register_post_type( 'vacancies', $args );
}
/*add_action( 'init', 'ourbusiness_post' );
function ourbusiness_post() {
	$labels = array(
		'name'               => _x( 'Our Business', 'post type general name', 'arkitekter' ),
		'singular_name'      => _x( 'Our Business', 'post type singular name', 'arkitekter' ),
		'menu_name'          => _x( 'Our Business', 'admin menu', 'arkitekter' ),
		'name_admin_bar'     => _x( 'Business', 'add new on admin bar', 'arkitekter' ),
		'add_new'            => _x( 'Add New', 'Business', 'arkitekter' ),
		'add_new_item'       => __( 'Add New Business', 'arkitekter' ),
		'new_item'           => __( 'New Business', 'arkitekter' ),
		'edit_item'          => __( 'Edit Business', 'arkitekter' ),
		'view_item'          => __( 'View Business', 'arkitekter' ),
		'all_items'          => __( 'All Business', 'arkitekter' ),
		'search_items'       => __( 'Search Business', 'arkitekter' ),
		'parent_item_colon'  => __( 'Parent Business:', 'arkitekter' ),
		'not_found'          => __( 'No Business found.', 'arkitekter' ),
		'not_found_in_trash' => __( 'No Business found in Trash.', 'arkitekter' )
	);
	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'arkitekter' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'our-business' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail')
	);
	register_post_type( 'ourbusiness', $args );
}*/
define( 'RWMB_URL', trailingslashit( get_stylesheet_directory_uri() . '/meta-box' ) );
define( 'RWMB_DIR', trailingslashit( STYLESHEETPATH . '/meta-box' ) );
// Include the meta box script
require_once RWMB_DIR . 'meta-box.php';
// Include the meta box definition (the file where you define meta boxes, see `demo/demo.php`)
include 'meta-boxes.php';
add_filter( 'widget_display_callback', function ( $instance, $widget_instance )
{
    if ($widget_instance->id_base === 'recent-posts'
        && $instance['show_date'] === true
    ) {
        add_filter( 'get_the_date', function ( $the_date, $d, $post )
        {
            // Set new date format
            $d = 'd/m/Y';
            // Set new value format to $the_date
            $the_date = mysql2date( $d, $post->post_date );
            return $the_date;
            
        }, 10, 3 );
    }
    return $instance;
}, 10, 2 );
if(is_admin())
{
add_action('admin_head', 'my_custom_fonts');
	function my_custom_fonts() {
	 echo'<style>
		img#redux-opts-screenshot-people_single_image {
		width: 100px;
		</style>';
	}
}
add_action('init', 'arkitekt_partnere');   
function arkitekt_partnere() {   
$labels = array( 
    'name' => _x('Partnere', 'post type general name'), 
    'singular_name' => _x('Arkitekter Partnere', 'post type singular name'), 
    'add_new' => _x('Add New ', 'Partnere item'), 
    'add_new_item' => __('Add New Partnere'), 
    'edit_item' => __('Edit Your Partnere Item'), 
    'new_item' => __('New Your Partnere'), 
    'view_item' => __('View Your Partnere'), 
    'search_items' => __('Search Your Partnere'), 
    'not_found' => __('Nothing found'), 
    'not_found_in_trash' => __('Nothing found in Trash'), 
    'parent_item_colon' => '' 
);   
$args = array( 
    'labels' => $labels, 
    'public' => true, 
    'publicly_queryable' => true, 
    'show_ui' => true, 
    'query_var' => true, 
    'rewrite' => array( 'slug' => 'partnere', 'with_front'=> false ), 'capability_type' => 'post', 
    'hierarchical' => true, 
    'menu_position' => null, 
    'supports' => array('title','thumbnail','editor','excerpt') 
);   
register_post_type( 'partnere' , $args ); 
}
p2p_register_connection_type( array( 
    'name' => 'Partnere',
    'from' => 'partnere',
    'to' => 'perspektivs',
    'reciprocal' => true,
    'title' => 'Assign Team'
) );
do_action( 'p2p_register_connection_type' );
add_filter( 'meta_content', 'wptexturize'        );
add_filter( 'meta_content', 'convert_smilies'    );
add_filter( 'meta_content', 'convert_chars'      );
add_filter( 'meta_content', 'wpautop'            );
add_filter( 'meta_content', 'shortcode_unautop'  );
add_filter( 'meta_content', 'prepend_attachment' );
function add_custom_meta_box()
{
    add_meta_box("demo-meta-box","People Add This Case", "custom_meta_box_markup", "cases", "normal", "high", null);
}
add_action("add_meta_boxes", "add_custom_meta_box");
function custom_meta_box_markup($object)
{
    ?>
        <div>
            <table>
			<tr>
            <td>
            <?php $chk = get_post_meta($object->ID, "people_access" ,true); 
			$hobby_value=explode(",",$chk); 
			//echo '<pre>';
			//print_r($hobby_value);
			//echo '</pre>';
			?>
			 <?php
              $args = array( 'post_type' => 'perspektivs','paged' => $paged);
									$loop = new WP_Query( $args );
								
									while ( $loop->have_posts() ) : $loop->the_post(); $post_id=get_the_ID();
						?>
            
            <input type="checkbox" name="regist[]" <?php if (in_array($post_id,$hobby_value)){ echo "checked";} ?>  value="<?php echo $post_id; ?>"><?php the_title(); ?><br/>
			<?php
            endwhile;    
			?>
            </td>
            </tr>
     </table>
        </div>
    <?php 
}
function save_custom_meta_box($post_id, $post, $update)
{ 
    $val= implode(',' ,$_POST['regist']);
    if(isset($_POST['regist'])){
	  $reg = $_POST['regist'];
	}
	update_post_meta($post_id, "people_access",$val);
	
}
add_action("save_post", "save_custom_meta_box", 10, 3);
add_action('init', 'your_News');   
function your_News() {   
$labels = array( 
    'name' => _x('News', 'post type general name'), 
    'singular_name' => _x('Your News', 'post type singular name'), 
    'add_new' => _x('Add New ', 'gallery item'), 
    'add_new_item' => __('Add News'), 
    'edit_item' => __('Edit Your News'), 
    'new_item' => __('News'), 
    'view_item' => __('View Your News'), 
    'search_items' => __('Search Your News'), 
    'not_found' => __('Nothing found'), 
    'not_found_in_trash' => __('Nothing found in Trash'), 
    'parent_item_colon' => '' 
);   
$args = array( 
    'labels' => $labels, 
    'public' => true, 
    'publicly_queryable' => true, 
    'show_ui' => true, 
    'query_var' => true, 
    'rewrite' => array( 'slug' => 'news', 'with_front'=> false ), 'capability_type' => 'post', 
    'hierarchical' => true, 
    'menu_position' => null, 
    'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
);   
register_post_type( 'News' , $args ); 
register_taxonomy(
      'categories_n',
      array( 'news'),
      array( 'hierarchical' => true,
             'label' => __('Categories', 'series'),
             'query_var' => 'actorrrr',
             'rewrite' => array( 'slug' => 'categories_news' )
      )
   );
}
add_action('init', 'your_projects');   
function your_projects() {   
$labels = array( 
    'name' => _x('Projects', 'post type general name'), 
    'singular_name' => _x('Your Projects', 'post type singular name'), 
    'add_new' => _x('Add New ', 'gallery item'), 
    'add_new_item' => __('Add Projects'), 
    'edit_item' => __('Edit Your Projects'), 
    'new_item' => __('Projects'), 
    'view_item' => __('View Your Projects'), 
    'search_items' => __('Search Your Projects'), 
    'not_found' => __('Nothing found'), 
    'not_found_in_trash' => __('Nothing found in Trash'), 
    'parent_item_colon' => '' 
);   
$args = array( 
    'labels' => $labels, 
    'public' => true, 
    'publicly_queryable' => true, 
    'show_ui' => true, 
    'query_var' => true, 
    'rewrite' => array( 'slug' => 'projects', 'with_front'=> false ), 'capability_type' => 'post', 
    'hierarchical' => true, 
    'menu_position' => null, 
    'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
);   
register_post_type( 'Projects' , $args ); 
register_taxonomy(
      'categories_project',
      array( 'projects'),
      array( 'hierarchical' => true,
             'label' => __('Categories', 'series'),
             'query_var' => 'actoracc',
             'rewrite' => array( 'slug' => 'categories_project' )
      )
   );
}
function add_custom_meta_box_pro()
{
    add_meta_box("demo-meta-boxxx","People Add This Case", "custom_meta_box_markup_pro", "projects", "normal", "high", null);
}
add_action("add_meta_boxes", "add_custom_meta_box_pro");
function custom_meta_box_markup_pro($object)
{
    ?>
    	  <div>
		    <table>
			<tr>
            <td>
            <?php $chk = get_post_meta($object->ID, "people_access" ,true); 
			$hobby_value=explode(",",$chk); 
			?>
			 <?php
              $args = array( 'post_type' => 'partnere','paged' => $paged);
									$loop = new WP_Query( $args );
								
									while ( $loop->have_posts() ) : $loop->the_post(); $post_id=get_the_ID();
						?>
            
            <input type="checkbox" name="regist[]" <?php if (in_array($post_id,$hobby_value)){ echo "checked";} ?>  value="<?php echo $post_id; ?>"><?php the_title(); ?><br/>
			<?php
            endwhile;    
			?>
            </td>
            </tr>
     </table>
        </div>
    <?php 
}
function save_custom_meta_box_pro($post_id, $post, $update)
{ 
    $val= implode(',' ,$_POST['regist']);
    if(isset($_POST['regist'])){
	  $reg = $_POST['regist'];
	}
	add_post_meta($post_id, "people_access",$val,true);
}
add_action("save_post", "save_custom_meta_box_pro", 10, 3);
add_action('init', 'your_services');   
function your_services() {   
$labels = array( 
    'name' => _x('Services', 'post type general name'), 
    'singular_name' => _x('Your Services', 'post type singular name'), 
    'add_new' => _x('Add New ', 'gallery item'), 
    'add_new_item' => __('Add Services'), 
    'edit_item' => __('Edit Your Services'), 
    'new_item' => __('Services'), 
    'view_item' => __('View Your Services'), 
    'search_items' => __('Search Your Services'), 
    'not_found' => __('Nothing found'), 
    'not_found_in_trash' => __('Nothing found in Trash'), 
    'parent_item_colon' => '' 
);   
$args = array( 
    'labels' => $labels, 
    'public' => true, 
    'publicly_queryable' => true, 
    'show_ui' => true, 
    'query_var' => true, 
    'rewrite' => array( 'slug' => 'Services', 'with_front'=> false ), 'capability_type' => 'post', 
    'hierarchical' => true, 
    'menu_position' => null, 
    'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
);   
register_post_type( 'Services' , $args ); 
register_taxonomy(
      'categories_services',
      array( 'services'),
      array( 'hierarchical' => true,
             'label' => __('Categories', 'series'),
             'query_var' => 'actoraccaa',
             'rewrite' => array( 'slug' => 'categories_services' )
      )
   );
}
add_action('init', 'job_portrate');   
function job_portrate() {   
$labels = array( 
    'name' => _x('Portraet', 'post type general name'), 
    'singular_name' => _x('Your Portraet', 'post type singular name'), 
    'add_new' => _x('Add New ', 'gallery item'), 
    'add_new_item' => __('Add Portraet'), 
    'edit_item' => __('Edit Your Portraet'), 
    'new_item' => __('Portraet'), 
    'view_item' => __('View Your Portraet'), 
    'search_items' => __('Search Your Portraet'), 
    'not_found' => __('Nothing found'), 
    'not_found_in_trash' => __('Nothing found in Trash'), 
    'parent_item_colon' => '' 
);   
$args = array( 
    'labels' => $labels, 
    'public' => true, 
    'publicly_queryable' => true, 
    'show_ui' => true, 
    'query_var' => true, 
    'rewrite' => array( 'slug' => 'portraet', 'with_front'=> false ), 'capability_type' => 'post', 
    'hierarchical' => true, 
    'menu_position' => null, 
    'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
);   
register_post_type( 'Portraet' , $args ); 
}
add_action('init', 'your_contact');   
function your_contact() {   
$labels = array( 
    'name' => _x('Contact', 'post type general name'), 
    'singular_name' => _x('Your Contact', 'post type singular name'), 
    'add_new' => _x('Add New ', 'gallery item'), 
    'add_new_item' => __('Add Contact'), 
    'edit_item' => __('Edit Your Contact'), 
    'new_item' => __('Contact'), 
    'view_item' => __('View Your Contact'), 
    'search_items' => __('Search Your Contact'), 
    'not_found' => __('Nothing found'), 
    'not_found_in_trash' => __('Nothing found in Trash'), 
    'parent_item_colon' => '' 
);   
$args = array( 
    'labels' => $labels, 
    'public' => true, 
    'publicly_queryable' => true, 
    'show_ui' => true, 
    'query_var' => true, 
    'rewrite' => array( 'slug' => 'contact', 'with_front'=> false ), 'capability_type' => 'post', 
    'hierarchical' => true, 
    'menu_position' => null, 
    'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
);   
register_post_type( 'Contact' , $args ); 
}
function add_custom_meta_box_on_cases()
{
    add_meta_box("demo-meta-box-cases","Display on Home", "custom_meta_box_markup_cases", "cases", "normal", "high", null);
}
add_action("add_meta_boxes", "add_custom_meta_box_on_cases");
function custom_meta_box_markup_cases($object)
{
    ?>
        <div>
            <table>
			<tr>
            <td>
            <?php $chk = get_post_meta($object->ID, "home_show" ,true); ?>	
            <input type="checkbox" name="regist" <?php if($chk != NULL){ echo 'checked'; } ?>  >Home Page Show This Case<br/>
            </td>
            </tr>
    		</table>
        </div>
    <?php 
}
function save_custom_meta_box_cases($post_id, $post, $update)
{ 
  if(isset($_POST['regist'])){
	  $reg = $_POST['regist'];
	 // $val= implode(',' ,$reg);
	//  echo $val;
	}
	update_post_meta($post_id, "home_show",$reg);
}
add_action("save_post", "save_custom_meta_box_cases", 10, 3);
function add_custom_meta_box_on_nn()
{
    add_meta_box("demo-meta-box-cases","Display on Home", "custom_meta_box_markup_nn", "news", "normal", "high", null);
}
add_action("add_meta_boxes", "add_custom_meta_box_on_nn");
function custom_meta_box_markup_nn($object)
{
    ?>
        <div>
            <table>
			<tr>
            <td>
            <?php $chk = get_post_meta($object->ID, "home_show" ,true); ?>	
            <input type="checkbox" name="regist" <?php if($chk != NULL){ echo 'checked'; } ?>  >Home Page Show This News<br/>
            </td>
            </tr>
    		</table>
        </div>
    <?php 
}
function save_custom_meta_box_nn($post_id, $post, $update)
{ 
    if(isset($_POST['regist'])){
	  $reg = $_POST['regist'];
	 // $val= implode(',' ,$reg);
	//  echo $val;
	}
	update_post_meta($post_id, "home_show",$reg);
}
add_action("save_post", "save_custom_meta_box_nn", 10, 3);
 global $theme_option;
if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/ReduxFramework/sample/sample-config.php' ) ) {
    require_once( dirname( __FILE__ ) . '/ReduxFramework/sample/sample-config.php' );
}
add_action('init', 'your_video');   
function your_video() {   
$labels = array( 
    'name' => _x('Video', 'post type general name'), 
    'singular_name' => _x('Your video', 'post type singular name'), 
    'add_new' => _x('Add New ', 'gallery item'), 
    'add_new_item' => __('Add Video'), 
    'edit_item' => __('Edit Your Video'), 
    'new_item' => __('Video'), 
    'view_item' => __('View Your Video'), 
    'search_items' => __('Search Your Video'), 
    'not_found' => __('Nothing found'), 
    'not_found_in_trash' => __('Nothing found in Trash'), 
    'parent_item_colon' => '' 
);   
$args = array( 
    'labels' => $labels, 
    'public' => true, 
    'publicly_queryable' => true, 
    'show_ui' => true, 
    'query_var' => true, 
    'rewrite' => array( 'slug' => 'video', 'with_front'=> false ), 'capability_type' => 'post', 
    'hierarchical' => true, 
    'menu_position' => null, 
    'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
);   
register_post_type( 'Video' , $args ); 
}
add_action( 'wp_ajax_auto_search', 'auto_search' );
add_action( 'wp_ajax_nopriv_auto_search', 'auto_search' );
function auto_search(){
	$type = $_POST['type'];
	$contactid = $_POST['postid'];
	$posts_chck = get_field('mennesker',$contactid);
	$peoplesarray = array();
	  foreach( $posts_chck as $post_chck):
	  array_push($peoplesarray,$post_chck->ID);
	  endforeach;	 
	//  print_r($peoplesarray) ;
	$args = array(
    'type'                     => 'perspektivs',
    //'child_of'                 => 0,
    'parent'                   => '',
    'orderby'                  => 'name',
    'order'                    => 'ASC',
    'hide_empty'               => 1,
    'hierarchical'             => 1,
    'exclude'                  => '',
    'include'                  => '',
    //'number'                   => '',
    'taxonomy'                 => 'categories_peo',
   // 'pad_counts'               => false 
    ); 
	
$categories = get_categories( $args );
foreach ( $categories as $cat ) {
// here's my code for getting the posts for custom post type
	if($type=='loc') { 
	$posts_array = array('showposts' => -1,
						'post_type' => 'perspektivs',
						'order' => 'ASC'
						);
	}
	else {
	$posts_array = array('showposts' => -1,
						'post_type' => 'perspektivs',
						'tax_query' => array(
							array(
							'taxonomy' => 'categories_peo',
							'field' => 'id',
							'terms' => $_POST['state_id'],
							)
						 )
					);
	}
}
$tax_terms_posts = get_posts( $posts_array );
?>
 <ul>
 <?php 
 $nopost = 0;
 foreach ( $tax_terms_posts as $post ) { 
 //echo $post->ID;
 if(in_array($post->ID,$peoplesarray)) {
	 $nopost++;
 $location = get_field( 'people_location', $post->ID );  ?>
			<?php 
				$locationarr = array();
				$i = 1;
				foreach( $location as $posts ): // variable must be called $post (IMPORTANT) 
	        		setup_postdata( $posts ); 
					$locationarr[$i] = get_the_title($posts->ID);
             		$i++; 
			 	endforeach;
            
            if($type=='loc') { 
		   	 $checkloc = array_search($_POST['state_id'], $locationarr);
			 if($checkloc == true) {
		   ?>
               <li>
               <div class="pthumb">
               <?php
			   if ( has_post_thumbnail($post->ID) ) : 
			 $url_orinignal = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
			 $url = img_resize($url_orinignal, 230, 243, true);
			 else: 
			 $url = img_resize(get_template_directory_uri().'/images/no_profile.jpg', 230, 243, true);
			 endif;
			   ?>
                <?php //echo get_the_post_thumbnail( $post->ID );?>
                <img src="<?php echo $url ; ?>" alt="<?php echo get_the_title($post->ID)?>" />
                <div class="partner_text">
                      <span>
                        <strong><?php echo get_the_title( $post->ID ); ?></strong><br>
                        <?php the_field('achieved', $post->ID); ?><br>
                        Tel. <?php the_field('telephone', $post->ID); ?><br>
                      </span>
                 </div>
                </div>
            </li>
           
		   <?php } ?>
           <?php 
			}
			else { ?>       
           <li>
               <div class="pthumb" data-poepleid="<?php echo $post->ID;?>">
                <?php 
		   if ( has_post_thumbnail($post->ID) ) : 
			 $url_orinignal = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
			 $url = img_resize($url_orinignal, 230, 243, true);
			 else: 
			 $url = img_resize(get_template_directory_uri().'/images/no_profile.jpg', 230, 243, true);
			 endif;
			?>
			<img src="<?php echo $url ; ?>" alt="<?php echo get_the_title($post->ID)?>" />
                <div class="partner_text">
                      <span>
                        <strong><?php echo get_the_title( $post->ID ); ?></strong><br>
                        <?php the_field('achieved', $post->ID); ?><br>
                        Tel. <?php the_field('telephone', $post->ID); ?><br>
                      </span>
                 </div>
                </div>
            </li>
     	   <?php } ?>       
           
     <?php 
 }
	 } 
	 if($nopost==0){
	 echo 'No Peoples found';}
	 ?>
      </ul>
		<?php
	//wp_reset_postdata();
	exit;
}
add_action( 'wp_ajax_auto_searchpeople', 'auto_searchpeople' );
add_action( 'wp_ajax_nopriv_auto_searchpeople', 'auto_searchpeople' );
function auto_searchpeople(){
	$type = $_POST['type'];
	$location = $_POST['postid'];
	
	$args = array(
    'type'                     => 'perspektivs',
    //'child_of'                 => 0,
    'parent'                   => '',
    'orderby'                  => 'name',
    'order'                    => 'ASC',
    'hide_empty'               => 1,
    'hierarchical'             => 1,
    'exclude'                  => '',
    'include'                  => '',
    //'number'                   => '',
    'taxonomy'                 => 'categories_peo',
   // 'pad_counts'               => false 
    ); 
	
$categories = get_categories( $args );
if($type=='loc') {
		$posts = get_field('mennesker', $location);
		//print_r($posts);
						if( $posts ):
						?> <ul>
                        <?php
							foreach( $posts as $post):
							//print_r($post);
							//setup_postdata($post);
							?>
                            <li>
                            	<div class="pthumb" data-poepleid="<?php echo $post->ID;?>"> 
                                         <?php if ( has_post_thumbnail($post->ID) ) : 
										 $url_orinignal = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
										 $url = img_resize($url_orinignal, 230, 243, true);
										 else: 
										 $url = img_resize(get_template_directory_uri().'/images/no_profile.jpg', 230, 243, true);
										 endif; ?>
                                         <img src="<?php echo $url ; ?>" alt="<?php echo get_the_title($post->ID)?>" />
	                                <div class="partner_text">
                                      <span>
                                        <strong><?php the_title($post->ID); ?></strong><br>
                                        <?php the_field('achieved',$post->ID); ?><br>
                                        Tel. <?php the_field('telephone',$post->ID); ?><br>
                                        <?php the_field('email',$post->ID); ?>
                                      </span>
                                 </div>
                                </div>
                            </li>
                            <?php
							endforeach;
							//wp_reset_postdata(); ?>
                            </ul>
							<?php
							else:
							?>
                            <div style=" margin: auto;text-align: center;">No data found</div>
                            <?php
						endif;
						
		
		}
else {
	foreach ( $categories as $cat ) {
	// here's my code for getting the posts for custom post type
	$posts_array = array('showposts' => -1,
							'post_type' => 'perspektivs',
							'tax_query' => array(
								array(
								'taxonomy' => 'categories_peo',
								'field' => 'id',
								'terms' => $_POST['state_id'],
								)
							 )
						);
		  }
	$tax_terms_posts = get_posts( $posts_array );
	?>
		<ul>
		<?php 
		foreach ( $tax_terms_posts as $post ) { ?>
			<li>
				<div class="pthumb">
					<?php 
					if ( has_post_thumbnail($post->ID) ) : 
						$url_orinignal = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
						$url = img_resize($url_orinignal, 230, 243, true);
					else: 
						$url = img_resize(get_template_directory_uri().'/images/no_profile.jpg', 230, 243, true);
					endif;
					?>
					<img src="<?php echo $url ; ?>" alt="<?php echo get_the_title($post->ID)?>" />
					<div class="partner_text">
						<span>
							<strong><?php echo get_the_title( $post->ID ); ?></strong><br>
							<?php the_field('achieved', $post->ID); ?><br>
							Tel. <?php the_field('telephone', $post->ID); ?><br>
						</span>
					</div>
				</div>
			</li>
		
		<?php } ?>
		</ul>	
		  <?php
	}
	exit;
}

add_action( 'wp_ajax_auto_searchservice', 'auto_searchservice' );
add_action( 'wp_ajax_nopriv_auto_searchservice', 'auto_searchservice' );
function auto_searchservice(){
	
	$type = $_POST['type'];
	$serviceid = $_POST['postid'];
	$sort_type = $_POST['sort_type'];
	$viewtype = $_POST['viewtype'];
	$posts_chck = get_field('services_project',$serviceid);
	//print_r($posts_chck);
	$projectsarray = array();
	  foreach( $posts_chck as $post_chck):
		  array_push($projectsarray,$post_chck->ID);
	  endforeach;
	  //print_r($projectsarray);
		if($_POST['state_id']==0){
			if($_POST['sort_type']=='alphabets'){
				$posts_array = 	array(	'posts_per_page'=> -1,
								'post_type' => 'projects',
								'post_status'=>'publish',
								'orderby'=>'title',
								'order' => 'ASC',
								);
			}
			else if($_POST['sort_type']=='location'){
				$posts_array = 	array(	'posts_per_page'=> -1,
								'post_type' => 'projects',
								'post_status'=>'publish',
								'meta_key'	=> 'location',
								'orderby'=>'meta_value',
								'order' => 'ASC',
								);
			}
			else{
				$posts_array = 	array(	'posts_per_page'=> -1,
								'post_type' => 'projects',
								'post_status'=>'publish',
								'orderby'=>'post_date',
								'order' => 'DESC',
								);
			}
		}
		else{
			if($_POST['sort_type']=='alphabets'){
				$posts_array = 	array(	'posts_per_page'=> -1,
								'post_type' => 'projects',
								'post_status'=>'publish',
								'orderby'=>'title',
								'order' => 'ASC',
								'tax_query' => array(
													array(
													'taxonomy' => 'categories_project',
													'field' => 'id',
													'terms' => $_POST['state_id'],
													)
												)
								);
			}
			else if($_POST['sort_type']=='location'){
				$posts_array = 	array(	'posts_per_page'=> -1,
								'post_type' => 'projects',
								'post_status'=>'publish',
								'meta_key'	=> 'location',
								'orderby'=>'meta_value',
								'order' => 'ASC',
								'tax_query' => array(
													array(
													'taxonomy' => 'categories_project',
													'field' => 'id',
													'terms' => $_POST['state_id'],
													)
												)
								);
			}
			else{
				$posts_array = 	array(	'posts_per_page'=> -1,
								'post_type' => 'projects',
								'post_status'=>'publish',
								'orderby'=>'post_date',
								'order' => 'DESC',
								'tax_query' => array(
													array(
													'taxonomy' => 'categories_project',
													'field' => 'id',
													'terms' => $_POST['state_id'],
													)
												)
								);
			}
		}
				
	$posts_array = get_posts($posts_array);

 $nopost = 0;
 if(count($posts_array) > 0){
	 foreach ( $posts_array as $post ) { 
		 if(in_array($post->ID,$projectsarray)) {
			 if($nopost==12){break;}
			 if($viewtype == 'grid'){
		 ?>
            <div class="post" data-projid="<?php echo $post->ID;?>">
                <div class="case-inner">
                 <?php if ( has_post_thumbnail($post->ID) ) : 
                 $url_orinignal = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
                 $url = img_resize_project_related($url_orinignal, 260, 150, true);
                 else: 
                 $url = get_template_directory_uri().'/images/default-project.jpg';
                 endif; ?>
                 <img src="<?php echo $url ; ?>" alt="" />
                    <div class="cases">
                      <div class="cases_table">
                            <div class="cases_td">
                                 <div class="cases_text_inner">
                                      <h2><?php echo get_the_title($post->ID); ?></h2>
                                      <a href="<?php echo get_permalink($post->ID); ?>" class="button-with-arrow">læs mere</a>
                                      <h6><?php echo the_field('location',$post->ID); ?> </h6>
                                  </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
		 	<?php 
			 }
			 else{
			?>
            <tr class="serviceprojectrow">
            <td class="project_list_date"><?php echo get_the_date('d | m | Y',$post->ID); ?></td>
            <td class="project_list_title"><a href="<?php echo get_permalink($post->ID); ?>" class="td_link"><?php echo get_the_title($post->ID); ?></a></td>
            <td class="project_list_location"><?php echo the_field('location',$post->ID); ?></td></tr>
         	<?php
			 }
		 $nopost++;
		} 
	 }
 }
 if($nopost==0){
echo '1';	 }
	//wp_reset_postdata();
	exit;
}

add_action( 'wp_ajax_auto_pr', 'auto_pr' );
add_action( 'wp_ajax_nopriv_auto_pr', 'auto_pr' );
function auto_pr(){
	$viewtype  = (isset($_POST['viewtype'])) ? $_POST['viewtype'] : 'grid';
	if($_POST['type'] = 'sort'){
		if($_POST['state_id'] == 0)
			{
			if($_POST['sort_type']=='alphabets'){
				$posts_array = 	array(	'posts_per_page'=> 12,
								'post_type' => 'projects',
								'post_status'=>'publish',
								'orderby'=>'title',
								'order' => 'ASC'
								);
			}
			else if($_POST['sort_type']=='location'){
				$posts_array = 	array(	'posts_per_page'=> 12,
								'post_type' => 'projects',
								'post_status'=>'publish',
								'meta_key'	=> 'location',
								'orderby'=>'meta_value',
								'order' => 'ASC'
								);
			}
			else{
				$posts_array = 	array(	'posts_per_page'=> 12,
								'post_type' => 'projects',
								'post_status'=>'publish',
								'orderby'=>'post_date',
								'order' => 'DESC'
								);
			}
		}else{
			if($_POST['sort_type']=='alphabets'){
				$posts_array = 	array(	'posts_per_page'=> 12,
								'post_type' => 'projects',
								'post_status'=>'publish',
								'orderby'=>'title',
								'order' => 'ASC',
								'tax_query' => array(
											array(
											'taxonomy' => 'categories_project',
											'field' => 'id',
											'terms' => $_POST['state_id'],
											)
										)
								);
			}
			else if($_POST['sort_type']=='location'){
				$posts_array = 	array(	'posts_per_page'=> 12,
								'post_type' => 'projects',
								'post_status'=>'publish',
								'meta_key'	=> 'location',
								'orderby'=>'meta_value',
								'order' => 'ASC',
								'tax_query' => array(
											array(
											'taxonomy' => 'categories_project',
											'field' => 'id',
											'terms' => $_POST['state_id'],
											)
										)
								
								);
			}
			else{
				$posts_array = 	array(	'posts_per_page'=> 12,
								'post_type' => 'projects',
								'post_status'=>'publish',
								'orderby'=>'post_date',
								'order' => 'DESC',
								'tax_query' => array(
											array(
											'taxonomy' => 'categories_project',
											'field' => 'id',
											'terms' => $_POST['state_id'],
											)
										)
								);
			}
		}
	}
	else{
		if($_POST['state_id'] == 0)
		{
			if($_POST['sort_type']=='alphabets'){
				$posts_array = 	array(	'posts_per_page'=> 12,
								'post_type' => 'projects',
								'post_status'=>'publish',
								'orderby'=>'title',
								'order' => 'ASC'
								);
				}
			else if($_POST['sort_type']=='location'){
				$posts_array = 	array(	'posts_per_page'=> 12,
								'post_type' => 'projects',
								'post_status'=>'publish',
								'meta_key'	=> 'location',
								'orderby'=>'meta_value',
								'order' => 'ASC'
								);
			}
			else{
				$posts_array = 	array(	'posts_per_page'=> 12,
								'post_type' => 'projects',
								'post_status'=>'publish',
								'orderby'=>'post_date',
								'order' => 'DESC'
								);
			}
		}
		else{
			if($_POST['sort_type']=='alphabets'){
				$posts_array = 	array(	'posts_per_page'=> 12,
								'post_type' => 'projects',
								'post_status'=>'publish',
								'orderby'=>'title',
								'order' => 'ASC',
								'tax_query' => array(
											array(
											'taxonomy' => 'categories_project',
											'field' => 'id',
											'terms' => $_POST['state_id'],
											)
										)

								);
				}
			else if($_POST['sort_type']=='location'){
				$posts_array = 	array(	'posts_per_page'=> 12,
								'post_type' => 'projects',
								'post_status'=>'publish',
								'meta_key'	=> 'location',
								'orderby'=>'meta_value',
								'order' => 'ASC',
								'tax_query' => array(
									array(
									'taxonomy' => 'categories_project',
									'field' => 'id',
									'terms' => $_POST['state_id'],
									)
								)
								);
			}
			else{
				$posts_array = 	array(	'posts_per_page'=> 12,
								'post_type' => 'projects',
								'post_status'=>'publish',
								'orderby'=>'post_date',
								'order' => 'DESC',
								'tax_query' => array(
											array(
											'taxonomy' => 'categories_project',
											'field' => 'id',
											'terms' => $_POST['state_id'],
											)
										)
								);
			}
		}
		/*$posts_array = 	array(	'posts_per_page'=> 12,
						'post_type' => 'projects',
						'post_status'=>'publish',
						'tax_query' => array(
											array(
											'taxonomy' => 'categories_project',
											'field' => 'id',
											'terms' => $_POST['state_id'],
											)
										)
						);*/
	}
	
	//print_r($posts_array);
	
	$tax_terms_posts = get_posts( $posts_array );
	$response_array = array();
		
		if($viewtype =='list'){
			?><table id="listTable" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr >
            <td><h3>Dato</h3></td>
            <td><h3>Titel</h3></td>
            <td><h3>Lokation</h3></td>
        </tr>
        <?php
		foreach ( $tax_terms_posts as $post ) {
			if ( has_post_thumbnail($post->ID) ) : 
				$url_original = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
				$url = img_resize_project_related($url_original, 260, 150, true);
			else:
				$url = get_template_directory_uri().'/images/default-project.jpg';
			endif;
	//$response_array[] = array('postid'=>$post->ID,'imageurl'=>$url, 'title'=>get_the_title($post->ID), 'url'=>get_permalink($post->ID), 'location' =>  get_field('location',$post->ID)) ;
	?>
            <tr data-projid="<?php echo $post->ID;?>" class="projectrow">
                <td class="project_list_date"><?php echo get_the_date('d | m | Y',$post->ID); ?></td>
                <td class="project_list_title"><a class="td_link" href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_title($post->ID);  ?></a></td>
                <td class="project_list_location"><?php echo get_field('location',$post->ID); ?></td>
            </tr>
    	<?php
		}
		?>
         </table>
				<?php
		}
		else{
			foreach ( $tax_terms_posts as $post ) {
				if ( has_post_thumbnail($post->ID) ) : 
					$url_original = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
					$url = img_resize_project_related($url_original, 260, 150, true);
				else:
					$url = get_template_directory_uri().'/images/default-project.jpg';
				endif;
		//$response_array[] = array('postid'=>$post->ID,'imageurl'=>$url, 'title'=>get_the_title($post->ID), 'url'=>get_permalink($post->ID), 'location' =>  get_field('location',$post->ID)) ;
				?><div class="post" data-projid="<?php echo $post->ID;?>" >
									<div class="case-inner">
									<img src="<?php echo $url ;?>"  />                     
										 <div class="cases">
											  <div class="cases_table">
													<div class="cases_td">
														 <div class="cases_text_inner">
															  <h2><?php echo get_the_title($post->ID);  ?></h2>
															  <a href="<?php echo get_permalink($post->ID); ?>" class="button-with-arrow">læs mere</a>
															  <h6><?php echo get_field('location',$post->ID); ?></h6>
														  </div>
													 </div>
												</div>
										</div>
									</div>
								</div>
				<?php
			}
		}
	//wp_send_json(array('status'=> 'success', 'datas' => $response_array));
	
	//wp_reset_postdata();
	exit;
}

add_action( 'wp_ajax_auto_pr_list', 'auto_pr_list' );
add_action( 'wp_ajax_nopriv_auto_pr_list', 'auto_pr_list' );
function auto_pr_list(){
	$viewtype  = (isset($_POST['viewtype'])) ? $_POST['viewtype'] : 'grid';
	if($_POST['type'] = 'sort'){
		
		if($_POST['state_id']=='alphabets'){
			$posts_array = 	array(	'posts_per_page'=> 12,
							'post_type' => 'projects',
							'post_status'=>'publish',
							'orderby'=>'title',
							'order' => 'ASC'
							);
		}
		else if($_POST['state_id']=='location'){
			$posts_array = 	array(	'posts_per_page'=> 12,
							'post_type' => 'projects',
							'post_status'=>'publish',
							'meta_key'	=> 'location',
							'orderby'=>'meta_value',
							'order' => 'ASC'
							);
		}
		else{
			$posts_array = 	array(	'posts_per_page'=> 12,
							'post_type' => 'projects',
							'post_status'=>'publish',
							'orderby'=>'post_date',
							'order' => 'DESC'
							);
		}
	}
	else{
		$posts_array = 	array(	'posts_per_page'=> 12,
						'post_type' => 'projects',
						'post_status'=>'publish',
						'tax_query' => array(
											array(
											'taxonomy' => 'categories_project',
											'field' => 'id',
											'terms' => $_POST['state_id'],
											)
										)
						);
	}
	
	$tax_terms_posts = get_posts( $posts_array );
	$response_array = array();
		
		if($viewtype =='list'){
			?><table id="listTable" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr >
            <td><h3>Dato</h3></td>
            <td><h3>Titel</h3></td>
            <td><h3>Lokation</h3></td>
        </tr>
        <?php
		foreach ( $tax_terms_posts as $post ) {
			if ( has_post_thumbnail($post->ID) ) : 
				$url_original = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
				$url = img_resize_project_related($url_original, 260, 150, true);
			else:
				$url = get_template_directory_uri().'/images/default-project.jpg';
			endif;
	//$response_array[] = array('postid'=>$post->ID,'imageurl'=>$url, 'title'=>get_the_title($post->ID), 'url'=>get_permalink($post->ID), 'location' =>  get_field('location',$post->ID)) ;
	?>
            <tr data-projid="<?php echo $post->ID;?>" class="projectrow">
                <td class="project_list_date"><?php echo get_the_date('d | m | Y',$post->ID); ?></td>
                <td class="project_list_title"><a class="td_link" href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_title($post->ID);  ?></a></td>
                <td class="project_list_location"><?php echo get_field('location',$post->ID); ?></td>
            </tr>
    	<?php
		}
		?>
         </table>
				<?php
		}
		else{
			foreach ( $tax_terms_posts as $post ) {
				if ( has_post_thumbnail($post->ID) ) : 
					$url_original = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
					$url = img_resize_project_related($url_original, 260, 150, true);
				else:
					$url = get_template_directory_uri().'/images/default-project.jpg';
				endif;
		//$response_array[] = array('postid'=>$post->ID,'imageurl'=>$url, 'title'=>get_the_title($post->ID), 'url'=>get_permalink($post->ID), 'location' =>  get_field('location',$post->ID)) ;
				?><div class="post" data-projid="<?php echo $post->ID;?>" >
									<div class="case-inner">
									<img src="<?php echo $url ;?>"  />                     
										 <div class="cases">
											  <div class="cases_table">
													<div class="cases_td">
														 <div class="cases_text_inner">
															  <h2><?php echo get_the_title($post->ID);  ?></h2>
															  <a href="<?php echo get_permalink($post->ID); ?>" class="button-with-arrow">læs mere</a>
															  <h6><?php echo get_field('location',$post->ID); ?></h6>
														  </div>
													 </div>
												</div>
										</div>
									</div>
								</div>
				<?php
			}
		}
	//wp_send_json(array('status'=> 'success', 'datas' => $response_array));
	
	//wp_reset_postdata();
	exit;
}


/**SVG-allowed**/
/*
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');*/
/*   Ajax Load more projects    */
$ajaxurl = admin_url( 'admin-ajax.php');
wp_register_script( 'Arkitekt_script', $ajaxurl );
wp_localize_script( 'Arkitekt_script', 'screenReaderText', array(
	'expand'   => __( 'expand child menu', 'Arkitekt' ),
	'collapse' => __( 'collapse child menu', 'Arkitekt' ),
	'ajaxurl'  => $ajaxurl,
	'noposts'  => esc_html__('No older posts found', 'Arkitekt'),
	'loadmore' => esc_html__('Load more', 'Arkitekt')
) );
wp_enqueue_script( 'Arkitekt_script' );
add_action('wp_ajax_nopriv_mytheme_more_post_ajax', 'mytheme_more_post_ajax');
add_action('wp_ajax_mytheme_more_post_ajax', 'mytheme_more_post_ajax');
 
if (!function_exists('mytheme_more_post_ajax')) {
	function mytheme_more_post_ajax(){
	  	$ppp     = (isset($_POST['ppp'])) ? $_POST['ppp'] : 10;
	    $state_id     = (isset($_POST['state_id'])) ? $_POST['state_id'] : 0;
	    $offset  = (isset($_POST['offset'])) ? $_POST['offset'] : 0;
		$type  = (isset($_POST['type'])) ? $_POST['type'] : 'default';
		$viewtype  = (isset($_POST['viewtype'])) ? $_POST['viewtype'] : 'grid';
 		
		if($_POST['type'] = 'sort'){
		if($_POST['state_id'] == 0)
			{
			if($_POST['sort_type']=='alphabets'){
				$posts_array = 	array(	'posts_per_page'=> 12,
								'post_type' => 'projects',
								'offset'          => $offset,
								'post_status'=>'publish',
								'orderby'=>'title',
								'order' => 'ASC'
								);
			}
			else if($_POST['sort_type']=='location'){
				$posts_array = 	array(	'posts_per_page'=> 12,
								'post_type' => 'projects',
								'offset'          => $offset,
								'post_status'=>'publish',
								'meta_key'	=> 'location',
								'orderby'=>'meta_value',
								'order' => 'ASC'
								);
			}
			else{
				$posts_array = 	array(	'posts_per_page'=> 12,
								'post_type' => 'projects',
								'offset'          => $offset,
								'post_status'=>'publish',
								'orderby'=>'post_date',
								'order' => 'DESC'
								);
			}
		}else{
			if($_POST['sort_type']=='alphabets'){
				$posts_array = 	array(	'posts_per_page'=> 12,
								'post_type' => 'projects',
								'post_status'=>'publish',
								'offset'          => $offset,
								'orderby'=>'title',
								'order' => 'ASC',
								'tax_query' => array(
											array(
											'taxonomy' => 'categories_project',
											'field' => 'id',
											'terms' => $_POST['state_id'],
											)
										)
								);
			}
			else if($_POST['sort_type']=='location'){
				$posts_array = 	array(	'posts_per_page'=> 12,
								'post_type' => 'projects',
								'offset'          => $offset,
								'post_status'=>'publish',
								'meta_key'	=> 'location',
								'orderby'=>'meta_value',
								'order' => 'ASC',
								'tax_query' => array(
											array(
											'taxonomy' => 'categories_project',
											'field' => 'id',
											'terms' => $_POST['state_id'],
											)
										)
								
								);
			}
			else{
				$posts_array = 	array(	'posts_per_page'=> 12,
								'post_type' => 'projects',
								'offset'          => $offset,
								'post_status'=>'publish',
								'orderby'=>'post_date',
								'order' => 'DESC',
								'tax_query' => array(
											array(
											'taxonomy' => 'categories_project',
											'field' => 'id',
											'terms' => $_POST['state_id'],
											)
										)
								);
			}
		}
	}
	else{
		if($_POST['state_id'] == 0)
		{
			if($_POST['sort_type']=='alphabets'){
				$posts_array = 	array(	'posts_per_page'=> 12,
								'post_type' => 'projects',
								'offset'          => $offset,
								'post_status'=>'publish',
								'orderby'=>'title',
								'order' => 'ASC'
								);
				}
			else if($_POST['sort_type']=='location'){
				$posts_array = 	array(	'posts_per_page'=> 12,
								'post_type' => 'projects',
								'offset'          => $offset,
								'post_status'=>'publish',
								'meta_key'	=> 'location',
								'orderby'=>'meta_value',
								'order' => 'ASC'
								);
			}
			else{
				$posts_array = 	array(	'posts_per_page'=> 12,
								'post_type' => 'projects',
								'offset'          => $offset,
								'post_status'=>'publish',
								'orderby'=>'post_date',
								'order' => 'DESC'
								);
			}
		}
		else{
			if($_POST['sort_type']=='alphabets'){
				$posts_array = 	array(	'posts_per_page'=> 12,
								'post_type' => 'projects',
								'offset'          => $offset,
								'post_status'=>'publish',
								'orderby'=>'title',
								'order' => 'ASC',
								'tax_query' => array(
											array(
											'taxonomy' => 'categories_project',
											'field' => 'id',
											'terms' => $_POST['state_id'],
											)
										)

								);
				}
			else if($_POST['sort_type']=='location'){
				$posts_array = 	array(	'posts_per_page'=> 12,
								'post_type' => 'projects',
								'offset'          => $offset,
								'post_status'=>'publish',
								'meta_key'	=> 'location',
								'orderby'=>'meta_value',
								'order' => 'ASC',
								'tax_query' => array(
									array(
									'taxonomy' => 'categories_project',
									'field' => 'id',
									'terms' => $_POST['state_id'],
									)
								)
								);
			}
			else{
				$posts_array = 	array(	'posts_per_page'=> 12,
								'post_type' => 'projects',
								'offset'          => $offset,
								'post_status'=>'publish',
								'orderby'=>'post_date',
								'order' => 'DESC',
								'tax_query' => array(
											array(
											'taxonomy' => 'categories_project',
											'field' => 'id',
											'terms' => $_POST['state_id'],
											)
										)
								);
			}
		}
		/*$posts_array = 	array(	'posts_per_page'=> 12,
						'post_type' => 'projects',
						'post_status'=>'publish',
						'tax_query' => array(
											array(
											'taxonomy' => 'categories_project',
											'field' => 'id',
											'terms' => $_POST['state_id'],
											)
										)
						);*/
	}

	 
			$loop = new WP_Query($posts_array);
			$is_there_a_next_load = ($loop->found_posts - $offset > 12)?'true':'false';
	 
			if($viewtype =='list'){
			if ($loop -> have_posts()) :
			$response_array = array();
				while ($loop -> have_posts()) :
					$loop -> the_post();
					$response_array[] = array('postid'=>get_the_ID(),'addeddate'=>get_the_date('d | m | Y',get_the_ID()), 'title'=>get_the_title(), 'url'=>get_permalink(), 'location' =>  get_field('location')) ;

				endwhile;
				$status = 'success';
			else:
				$status = 'error';
			endif;
			//echo $string;
			wp_send_json(array('status'=> $status, 'datas' => $response_array, 'is_there_a_next_load' => $is_there_a_next_load));
			//wp_reset_postdata();
		}
		else{
					if ($loop -> have_posts()) :
				$response_array = array();
					$string ='';
				while ($loop -> have_posts()) :
					$loop -> the_post();
					if ( has_post_thumbnail() ) : 
					$url_original = wp_get_attachment_url( get_post_thumbnail_id());
					 //$url = img_resize($url_original, 260, 150, true);
					 $url = img_resize_project_related($url_original, 260, 150, true);
					//$url = '';
					 else:
					 $url = get_template_directory_uri().'/images/default-project.jpg';
					 endif;
					 $response_array[] = array('postid'=>get_the_ID(),'imageurl'=>$url, 'title'=>get_the_title(), 'url'=>get_permalink(), 'location' =>  get_field('location')) ;
				endwhile;
				$status = 'success';
			else:
				$status = 'error';
			endif;
			//echo $string;
			wp_send_json(array('status'=> $status, 'datas' => $response_array, 'is_there_a_next_load' => $is_there_a_next_load));
			//wp_reset_postdata();
		}
		
		exit;
	   // wp_die($out);
	}
}
// Ajax Loading post for CASES
wp_register_script( 'Arkitekt_script_case', $ajaxurl );
wp_localize_script( 'Arkitekt_script_case', 'screenReaderText', array(
	'expand'   => __( 'expand child menu', 'Arkitekt' ),
	'collapse' => __( 'collapse child menu', 'Arkitekt' ),
	'ajaxurl'  => $ajaxurl,
	'noposts'  => esc_html__('No older cases found', 'Arkitekt'),
	'loadmore' => esc_html__('Load more', 'Arkitekt')
) );
wp_enqueue_script( 'Arkitekt_script_case' );
add_action('wp_ajax_nopriv_mytheme_more_case_ajax', 'mytheme_more_case_ajax');
add_action('wp_ajax_mytheme_more_case_ajax', 'mytheme_more_case_ajax');
 
if (!function_exists('mytheme_more_case_ajax')) {
	function mytheme_more_case_ajax(){
 
	  	$ppp     = (isset($_POST['ppp'])) ? $_POST['ppp'] : 6;
	    $offset  = (isset($_POST['offset'])) ? $_POST['offset'] : 0;
 
	    $args = array(
	        'post_type'      => 'cases',
	        'posts_per_page' => $ppp,
			'order'	=>	'DESC',
	        'offset'          => $offset,
			'post_status'=>'publish'
	    );
 
	    $loop = new WP_Query($args);
 		$i = 0; $j=1;
		$totalpost = $custom_query->post_count;
		//$total_row = round( ($totalpost /2), PHP_ROUND_HALF_UP );
		$total_row = 3;
	    if ($loop -> have_posts()) :
		?><div class="cases_row">
        <?php
	    	while ($loop -> have_posts()) :
	    		$loop -> the_post();
				if(($i > 1) && (($i % $total_row) == 0)) { $j++;
 				?> </div>
                    <div class="cases_row"> <?php } ?>
                                        <?php 
						if(($i % 3) == 0 ){
							$class = 'case-big';
								if ( has_post_thumbnail() ) : 
								 $url_orinignal = wp_get_attachment_url( get_post_thumbnail_id());
								 $url = img_resize($url_orinignal, 708, 430, true);
								else: 
								 $url = get_template_directory_uri().'/images/default-project.jpg';
								endif; 
						}
						else {
							$class = 'case-small';
								if ( has_post_thumbnail() ) : 
								 $url_orinignal = wp_get_attachment_url( get_post_thumbnail_id());
								 $url = img_resize($url_orinignal, 360, 209, true);
								else: 
								 $url = get_template_directory_uri().'/images/default-project.jpg';
								endif; 
						}
						$rcnt =	($j % 2);
						if($rcnt == 0) {
							$class = (($i % 3) == 1 )?'case-big pull-right':'case-small pull-left';
						}
					?>
				<div class="<?php echo $class; ?>">
                         	  <div class="case-inner">
                                     <?php if ( has_post_thumbnail() ) : ?>
										<?php the_post_thumbnail(); ?>
                                    <?php endif; ?>
                                     <div class="cases">
                                          <div class="cases_table">
                                               <div class="cases_td">
                                                    <div class="cases_text_inner">
                                                         <h2><?php the_title(); ?></h2>
                                                         <p><?php $content = get_the_content();
														 echo mb_strimwidth($content, 0, 90, '...') ?>
                                                         </p>
                                                         <a href="<?php  echo get_permalink(); ?>" class="button-with-arrow">læs mere</a>
                                                    </div>
                                               </div>
                                          </div>
                                     </div>
                                </div>
                         </div>
				<?php
	    	endwhile;
	    endif;
 		exit;
	   // wp_reset_postdata();
 
	   // wp_die($out);
	}
}
// Ajax Loading post for Services
wp_register_script( 'Arkitekt_script_service', $ajaxurl );
wp_localize_script( 'Arkitekt_script_service', 'screenReaderTextservice', array(
	'expand'   => __( 'expand child menu', 'Arkitektservice' ),
	'collapse' => __( 'collapse child menu', 'Arkitektservice' ),
	'ajaxurl'  => $ajaxurl,
	'noposts'  => esc_html__('No older cases found', 'Arkitektservice'),
	'loadmore' => esc_html__('Load more', 'Arkitektservice')
) );
wp_enqueue_script( 'Arkitekt_script_service' );
add_action('wp_ajax_nopriv_mytheme_more_service_ajax', 'mytheme_more_service_ajax');
add_action('wp_ajax_mytheme_more_service_ajax', 'mytheme_more_service_ajax');
 
if (!function_exists('mytheme_more_service_ajax')) {
	function mytheme_more_service_ajax(){
 
	  	$ppp     = (isset($_POST['ppp'])) ? $_POST['ppp'] : 8;
	    $offset  = (isset($_POST['offset'])) ? $_POST['offset'] : 0;
 		$ppp =12;
	    $args = array(
	        'post_type'      => 'cases',
	        'posts_per_page' => $ppp,
			'order'	=>	'DESC',
	        'offset'          => $offset,
			'post_status'=>'publish'
	    );
 
	    $loop = new WP_Query($args);
 		$i = 0; $j=1;
		$totalpost = $custom_query->post_count;
		//$total_row = round( ($totalpost /2), PHP_ROUND_HALF_UP );
		$total_row = 3;
	    if ($loop -> have_posts()) :
		?><div class="cases_row">
        <?php
	    	while ($loop -> have_posts()) :
	    		$loop -> the_post();
				if(($i > 1) && (($i % $total_row) == 0)) { $j++;
 				?> </div>
                    <div class="cases_row"> <?php } ?>
                                        <?php 
						if(($i % 3) == 0 ){
							$class = 'case-big';
						}
						else {
							$class = 'case-small';
						}
						$rcnt =	($j % 2);
						if($rcnt == 0) {
							$class = (($i % 3) == 1 )?'case-big pull-right':'case-small pull-left';
						}
					?>
				<div class="<?php echo $class; ?>">
                         	  <div class="case-inner">
                                     <?php if ( has_post_thumbnail() ) : ?>
										<?php the_post_thumbnail(); ?>
                                    <?php endif; ?>
                                     <div class="cases">
                                          <div class="cases_table">
                                               <div class="cases_td">
                                                    <div class="cases_text_inner">
                                                         <h2><?php the_title(); ?></h2>
                                                         <p><?php $content = get_the_content();
														 echo mb_strimwidth($content, 0, 90, '...') ?>
                                                         </p>
                                                         <a href="<?php  echo get_permalink(); ?>" class="button-with-arrow">læs mere</a>
                                                    </div>
                                               </div>
                                          </div>
                                     </div>
                                </div>
                         </div>
				<?php
	    	endwhile;
	    endif;
 		exit;
	   // wp_reset_postdata();
 
	   // wp_die($out);
	}
}
/*   Ajax Load more News    */
wp_register_script( 'Arkitekt_script_news', $ajaxurl );
wp_localize_script( 'Arkitekt_script_news', 'screenReaderTextnews', array(
	'expand'   => __( 'expand child menu', 'Arkitektnews' ),
	'collapse' => __( 'collapse child menu', 'Arkitektnews' ),
	'ajaxurl'  => $ajaxurl,
	'noposts'  => esc_html__('No older news found', 'Arkitektnews'),
	'loadmore' => esc_html__('Load more', 'Arkitektnews')
) );
wp_enqueue_script( 'Arkitekt_script_news' );
add_action('wp_ajax_nopriv_mytheme_more_news_ajax', 'mytheme_more_news_ajax');
add_action('wp_ajax_mytheme_more_news_ajax', 'mytheme_more_news_ajax');
 
if (!function_exists('mytheme_more_news_ajax')) {
	function mytheme_more_news_ajax(){
 
	  	$ppp     = (isset($_POST['ppp'])) ? $_POST['ppp'] : 8;
	    $cat     = (isset($_POST['cat'])) ? $_POST['cat'] : 0;
	    $offset  = (isset($_POST['offset'])) ? $_POST['offset'] : 0;
 
	    $args = array(
	        'post_type'      => 'news',
	        'posts_per_page' => 12,
	        'offset'          => $offset,
			'post_status'=>'publish'
	    );
 
	    $loop = new WP_Query($args);
 
	    if ($loop -> have_posts()) :
			$response_array = array();
				$string ='';
	    	while ($loop -> have_posts()) :
	    		$loop -> the_post();
				if(get_field('grid_image',get_the_ID())){
					$gridimage = get_field('grid_image',get_the_ID()); 
					$url = img_resize($gridimage['url'], 193, 300, true);
				}else{
					if ( has_post_thumbnail() ) : 
						$url_original = wp_get_attachment_url( get_post_thumbnail_id());
						$url = img_resize($url_original, 260, 150, true);
						//$url = '';
					else:
						$url = get_template_directory_uri().'/images/default-project.jpg';
					endif;
				}
				 
				 $response_array[] = array('postid'=>get_the_ID(),'imageurl'=>$url, 'title'=>get_the_title(), 'url'=>get_permalink(), 'location' =>  get_field('location')) ;
	    	endwhile;
			$status = 'success';
		else:
			$status = 'error';
	    endif;
 		echo $string;
		wp_send_json(array('status'=> $status, 'datas' => $response_array));
	    //wp_reset_postdata();
		exit;
 
	   // wp_die($out);
	}
}
add_action( 'wp_ajax_auto_contact', 'auto_contact' );
add_action( 'wp_ajax_auto_contact', 'auto_contact' );
function auto_contact(){
	$args = array(
    'type'                     => 'perspektivs',
    //'child_of'                 => 0,
    'parent'                   => '',
    'orderby'                  => 'name',
    'order'                    => 'ASC',
    'hide_empty'               => 1,
    'hierarchical'             => 1,
    'exclude'                  => '',
    'include'                  => '',
    //'number'                   => '',
    'taxonomy'                 => 'categories_project',
   // 'pad_counts'               => false 
    ); 
$categories = get_categories( $args );
foreach ( $categories as $cat ) {
// here's my code for getting the posts for custom post type
$posts_array = 
	array( 'posts_per_page'=> 12,
		'post_type' => 'projects',
		'tax_query' => array(
			array(
			'taxonomy' => 'categories_project',
			'field' => 'id',
			'terms' => $_POST['state_id'],
			)
		)
 
);
}
	
	$tax_terms_posts = get_posts( $posts_array );
		$response_array = array();
		foreach ( $tax_terms_posts as $post ) {
			if ( has_post_thumbnail() ) : 
				$url_original = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
				$url = img_resize($url_original, 260, 150, true);
			else:
				$url = get_template_directory_uri().'/images/default-project.jpg';
			endif;
	//$response_array[] = array('postid'=>$post->ID,'imageurl'=>$url, 'title'=>get_the_title($post->ID), 'url'=>get_permalink($post->ID), 'location' =>  get_field('location',$post->ID)) ;
	?><div class="post" >
                                <div class="case-inner">
                                <img src="<?php echo $url ;?>"  />                     
                                     <div class="cases">
                                          <div class="cases_table">
                                                <div class="cases_td">
                                                     <div class="cases_text_inner">
                                                          <h2><?php echo get_the_title($post->ID);  ?></h2>
                                                          <a href="<?php echo get_permalink($post->ID); ?>" class="button-with-arrow">læs mere</a>
                                                          <h6><?php echo get_field('location',$post->ID); ?></h6>
                                                      </div>
                                          		 </div>
                                     		</div>
                                	</div>
                           		</div>
                        	</div>
    <?php
		}
	//wp_send_json(array('status'=> 'success', 'datas' => $response_array));
	
	//wp_reset_postdata();
	exit;
}

wp_register_script( 'Arkitekt_script_ser', $ajaxurl );
wp_localize_script( 'Arkitekt_script_ser', 'screenReaderTextser', array(
	'expand'   => __( 'expand child menu', 'Arkitektser' ),
	'collapse' => __( 'collapse child menu', 'Arkitektser' ),
	'ajaxurl'  => $ajaxurl,
	'noposts'  => esc_html__('No older news found', 'Arkitektser'),
	'loadmore' => esc_html__('Load more', 'Arkitektser')
) );
wp_enqueue_script( 'Arkitekt_script_ser' );

add_action( 'wp_ajax_more_service_ajax', 'more_service_ajax' );
add_action( 'wp_ajax_nopriv_more_service_ajax', 'more_service_ajax' );
function more_service_ajax(){
	
	$cat = $_POST['cat'];
	$type = $_POST['type'];
	$serviceid = $_POST['postid'];
	$sort_type = $_POST['sort_type'];
	$viewtype = $_POST['viewtype'];
	$ppp     = (isset($_POST['ppp'])) ? $_POST['ppp'] : 4;
	$offset  = (isset($_POST['offset'])) ? $_POST['offset'] : 0;
	$ppp = 12;
	/*if($cat==0){
		
	$posts_chck = get_field('services_project',$serviceid);
	//print_r($posts_chck);
 	$nopost = 0;
	
	$projectsarray = array();
	$status = 'success';
	$response_array = array();
	  foreach( $posts_chck as $post_chck):
 
			 if($nopost >= $offset){
				 if($nopost == $offset+$ppp){break;}
 				if ( has_post_thumbnail($post_chck->ID) ) : 
				$url_original = wp_get_attachment_url( get_post_thumbnail_id($post_chck->ID));
				 $url = img_resize_project_related($url_original, 260, 150, true);
				//$url = '';
				 else:
				 $url = get_template_directory_uri().'/images/default-project.jpg';
				 endif;
				 $response_array[] = array('postid'=>$post_chck->ID,'imageurl'=>$url, 'title'=>get_the_title($post_chck->ID), 'url'=>get_permalink($post_chck->ID), 'location' =>  get_field('location',$post_chck->ID)) ;
			}
		 $nopost++;
	 	  endforeach;
	  //print_r($projectsarray);

	}else{*/
	$posts_chck = get_field('services_project',$serviceid);
	//print_r($posts_chck);
	
	$projectsarray = array();
	  foreach( $posts_chck as $post_chck):
			array_push($projectsarray,$post_chck->ID);
	  endforeach;
	  //print_r($projectsarray);
	 
		if($_POST['state_id']==0){
			if($_POST['sort_type']=='alphabets'){
				$posts_array = 	array(	'posts_per_page'=> -1,
								'post_type' => 'projects',
								'post_status'=>'publish',
								'orderby'=>'title',
								'order' => 'ASC',
								);
			}
			else if($_POST['sort_type']=='location'){
				$posts_array = 	array(	'posts_per_page'=> -1,
								'post_type' => 'projects',
								'post_status'=>'publish',
								'meta_key'	=> 'location',
								'orderby'=>'meta_value',
								'order' => 'ASC',
								);
			}
			else{
				$posts_array = 	array(	'posts_per_page'=> -1,
								'post_type' => 'projects',
								'post_status'=>'publish',
								'orderby'=>'post_date',
								'order' => 'DESC',
								);
			}
		}
		else{
			if($_POST['sort_type']=='alphabets'){
				$posts_array = 	array(	'posts_per_page'=> -1,
								'post_type' => 'projects',
								'post_status'=>'publish',
								'orderby'=>'title',
								'order' => 'ASC',
								'tax_query' => array(
													array(
													'taxonomy' => 'categories_project',
													'field' => 'id',
													'terms' => $_POST['state_id'],
													)
												)
								);
			}
			else if($_POST['sort_type']=='location'){
				$posts_array = 	array(	'posts_per_page'=> -1,
								'post_type' => 'projects',
								'post_status'=>'publish',
								'meta_key'	=> 'location',
								'orderby'=>'meta_value',
								'order' => 'ASC',
								'tax_query' => array(
													array(
													'taxonomy' => 'categories_project',
													'field' => 'id',
													'terms' => $_POST['state_id'],
													)
												)
								);
			}
			else{
				$posts_array = 	array(	'posts_per_page'=> -1,
								'post_type' => 'projects',
								'post_status'=>'publish',
								'orderby'=>'post_date',
								'order' => 'DESC',
								'tax_query' => array(
													array(
													'taxonomy' => 'categories_project',
													'field' => 'id',
													'terms' => $_POST['state_id'],
													)
												)
								);
			}
		}
	 
	  	 
	$posts_array = get_posts($posts_array);

 $nopost = 0;
 if(count($posts_array) > 0){
	 $status = 'success';
	$response_array = array();
	 foreach ( $posts_array as $post ) { 
		
		 if(in_array($post->ID,$projectsarray)) {
			 if($nopost >= $offset){
				 if($nopost == $offset+$ppp){break;}
 				if ( has_post_thumbnail($post->ID) ) : 
				$url_original = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
				 $url = img_resize_project_related($url_original, 260, 150, true);
				//$url = '';
				 else:
				 $url = get_template_directory_uri().'/images/default-project.jpg';
				 endif;
				 if($viewtype == 'list'){
					$response_array[] = array('postid'=>$post->ID,'addeddate'=>get_the_date('d | m | Y',$post->ID), 'title'=>get_the_title($post->ID), 'url'=>get_permalink($post->ID), 'location' =>  get_field('location',$post->ID)) ;

				 }else{
					 
				 	$response_array[] = array('postid'=>$post->ID,'imageurl'=>$url, 'title'=>get_the_title($post->ID), 'url'=>get_permalink($post->ID), 'location' =>  get_field('location',$post->ID)) ;
				 }
			}
		 $nopost++;
		} 
	 }
 }
 //}
 if($nopost==0){
$status = 'error';	 }
if(count($response_array) == 0)
$status = 'error';
	wp_send_json(array('status'=> $status, 'datas' => $response_array));
	exit;
}


add_filter( 'wp_nav_menu_objects', 'wpse16243_wp_nav_menu_objects' );
function wpse16243_wp_nav_menu_objects( $sorted_menu_items )
{
    foreach ( $sorted_menu_items as $menu_item ) {
        if ( $menu_item->current ) {
            $GLOBALS['wpse16243_title'] = $menu_item->ID;
            break;
        }
    }
    return $sorted_menu_items;
}
add_filter( 'single_cat_title', 'wpse16243_single_cat_title' );
function wpse16243_single_cat_title( $cat_title )
{
    if ( isset( $GLOBALS['wpse16243_title'] ) ) {
        return $GLOBALS['wpse16243_title'];
    }
    return $cat_title;
}