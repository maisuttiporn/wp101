<?php

/** Tell WordPress to run consultant_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'consultant_setup' );

if ( ! function_exists( 'consultant_setup' ) ):

function consultant_setup() {
	
	 global $content_width;
	 
     if (!isset($content_width))
            $content_width = 620;	

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );
	
	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );	
	
	// Add support for custom backgrounds
	$args = array(
	'default-color' => 'ffffff',
	'wp-head-callback' => '_custom_background_cb'
);
add_theme_support( 'custom-background', $args );	

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'consultant', get_template_directory() . '/languages' );
		
			// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'consultant' ),
	) );

}
endif;
?>
<?php
/**
 * Setup the WordPress core custom header feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for previous versions.
 * Use feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * @todo Rework this function to remove WordPress 3.4 support when WordPress 3.6 is released.
 *
 * @uses consultant_s_header_style()
 * @uses consultant_s_admin_header_style()
 * @uses consultant_s_admin_header_image()
 *
 * @package consultant_s
 */
function consultant_custom_header_setup() {
	$args = array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 220,
		'height'                 => 75,
		'flex-height'            => true,
		'wp-head-callback'       => 'consultant_header_style',
		'admin-head-callback'    => 'consultant_admin_header_style',
		'admin-preview-callback' => 'consultant_admin_header_image',
	);

	$args = apply_filters( 'consultant_custom_header_args', $args );
	add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'consultant_custom_header_setup' );

if ( ! function_exists( 'consultant_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see _s_custom_header_setup().
 */
function consultant_header_style() {

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == get_header_textcolor() )
		return;
	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == get_header_textcolor() ) :
	?>
		.site-title,
		.site-description {
			position: absolute !important;
			clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo get_header_textcolor(); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // _s_header_style

if ( ! function_exists( 'consultant_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see _s_custom_header_setup().
 */
function consultant_admin_header_style() {
?>
	<style type="text/css">
	.appearance_page_custom-header #headimg {
		border: none;
	}
	#headimg h1,
	#desc {
	}
	#headimg h1 {
	}
	#headimg h1 a {
	}
	#desc {
	}
	#headimg img {
	}
	</style>
<?php
}
endif; // _s_admin_header_style

if ( ! function_exists( 'consultant_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see consultant_s_custom_header_setup().
 */
function consultant_admin_header_image() { ?>
	<div id="headimg">
		<?php
		if ( 'blank' == get_header_textcolor() || '' == get_header_textcolor() )
			$style = ' style="display:none;"';
		else
			$style = ' style="color:#' . get_header_textcolor() . ';"';
		?>
		<h1 class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div class="displaying-header-text" id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<img src="<?php echo esc_url( $header_image ); ?>" alt="" />
		<?php endif; ?>
	</div>
<?php }
endif; // consultant_s_admin_header_image

?>
<?php
function consultant_list_pings($comment, $args, $depth) { 
	$GLOBALS['comment'] = $comment; ?>
	<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?>
<?php } ?>
<?php
add_filter('get_comments_number', 'consultant_comment_count', 0);
function consultant_comment_count( $count ) {
	if ( ! is_admin() ) {
	global $id;
	$get_comments_status= get_comments('status=approve&post_id=' . $id);
	$comments_by_type = separate_comments($get_comments_status);
	return count($comments_by_type['comment']);
} else {
return $count;
}
}
?>
<?php
if ( ! function_exists( 'consultant_comment' ) ) :
function consultant_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s', 'consultant' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e( 'Your comment is awaiting moderation.', 'consultant' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'consultant' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'consultant' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'consultant' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'consultant'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override consultant_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 */
function consultant_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'consultant' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'consultant' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	// Area 3, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'consultant' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'consultant' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'consultant' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'consultant' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 5, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'consultant' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'consultant' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}
if ( ! function_exists( 'consultant_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post—date/time and author.
 */
function consultant_posted_on() {
	printf( __( '%2$s <span class="meta-sep">by</span> %3$s', 'consultant' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'consultant' ), get_the_author() ),
			get_the_author()
		)
	);
}
endif;
/** Register sidebars by running consultant_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'consultant_widgets_init' );

/** Excerpt */
function consultant_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'consultant_excerpt_length' );

function consultant_auto_excerpt_more( $more ) {
	return ' &hellip;' ;
}
add_filter( 'excerpt_more', 'consultant_auto_excerpt_more' );

/*-----------------------------------------------------------------------------------*/
/* Exclude categories from displaying on the "Blog" page template.
/*-----------------------------------------------------------------------------------*/

// Exclude categories on the "Blog" page template.
add_filter( 'consultant_blog_template_query_args', 'consultant_exclude_categories_blogtemplate' );

function consultant_exclude_categories_blogtemplate ( $args ) {

	if ( ! function_exists( 'consultant_prepare_category_ids_from_option' ) ) { return $args; }

	$excluded_cats = array();

	// Process the category data and convert all categories to IDs.
	$excluded_cats = consultant_prepare_category_ids_from_option( 'exclude_cat' );


	if ( count( $excluded_cats ) > 0 ) {

		// Setup the categories as a string, because "category__not_in" doesn't seem to work
		// when using query_posts().

		foreach ( $excluded_cats as $k => $v ) { $excluded_cats[$k] = '-' . $v; }
		$cats = join( ',', $excluded_cats );

		$args['cat'] = $cats;
	}

	return $args;

}

/*-----------------------------------------------------------------------------------*/
/* consultant_prepare_category_ids_from_option()
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'consultant_prepare_category_ids_from_option' ) ) {

	function consultant_prepare_category_ids_from_option ( $option ) {

		$cats = array();

		$stored_cats = of_get_option( $option );

		$cats_raw = explode( ',', $stored_cats );

		if ( is_array( $cats_raw ) && ( count( $cats_raw ) > 0 ) ) {
			foreach ( $cats_raw as $k => $v ) {
				$value = trim( $v );

				if ( is_numeric( $value ) ) {
					$cats_raw[$k] = $value;
				} else {
					$cat_obj = get_category_by_slug( $value );
					if ( isset( $cat_obj->term_id ) ) {
						$cats_raw[$k] = $cat_obj->term_id;
					}
				}

				$cats = $cats_raw;
			}
		}

		return $cats;

	}

}



// custom function
function consultant_head_css() {
		$output = '';
		$custom_css = of_get_option('custom_css');
		if ($custom_css <> '') {
			$output .= $custom_css . "\n";
		}	
			
		// Output styles
		if ($output <> '') {
			$output = "<!-- Custom Styling -->\n<style type=\"text/css\">\n" . $output . "</style>\n";
			echo $output;
		}
	
}

add_action('wp_head', 'consultant_head_css');

function consultant_date_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s', 'consultant' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		)
	);
}

/** filter function for wp_title */
function consultant_filter_wp_title( $old_title, $sep, $sep_location ){
 
// add padding to the sep
$ssep = ' ' . $sep . ' ';
 
// find the type of index page this is
if( is_category() ) $insert = $ssep . 'Category';
elseif( is_tag() ) $insert = $ssep . 'Tag';
elseif( is_author() ) $insert = $ssep . 'Author';
elseif( is_year() || is_month() || is_day() ) $insert = $ssep . 'Archives';
else $insert = NULL;
 
// get the page number we're on (index)
if( get_query_var( 'paged' ) )
$num = $ssep . 'page ' . get_query_var( 'paged' );
 
// get the page number we're on (multipage post)
elseif( get_query_var( 'page' ) )
$num = $ssep . 'page ' . get_query_var( 'page' );
 
// else
else $num = NULL;
 
// concoct and return new title
return get_bloginfo( 'name' ) . $insert . $old_title . $num;
}

// call our custom wp_title filter, with normal (10) priority, and 3 args
add_filter( 'wp_title', 'consultant_filter_wp_title', 10, 3 );

function consultant_of_register_js() {
	if (!is_admin()) {
	
		
		wp_enqueue_script( 'superfish', get_template_directory_uri() . '/js/superfish.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'consultant_custom', get_template_directory_uri() . '/js/jquery.custom.js', array( 'jquery' ), '1.0', true );			
		wp_enqueue_script( 'fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'selectnav', get_template_directory_uri() . '/js/selectnav.js', array( 'jquery' ), '0.1', true );		
		wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array( 'jquery' ), '2.1', true );
		wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', array( 'jquery' ), '2.6.1', false );
		wp_enqueue_script( 'responsive', get_template_directory_uri() . '/js/responsive-scripts.js', array( 'jquery' ), '1.2.1', true );		
	
		
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
		
	}
}
add_action('wp_enqueue_scripts', 'consultant_of_register_js');

function consultant_of_styles() {
		wp_enqueue_style( 'superfish', get_template_directory_uri() . '/css/superfish.css', array(), '2.0' );
		wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.css', array(), null );
		wp_enqueue_style( 'foundation', get_template_directory_uri() . '/css/foundation.css', array(), null );
		wp_enqueue_style( 'consultant-style', get_stylesheet_uri() , array(), '1.2.14' );
		
}
add_action('wp_enqueue_scripts', 'consultant_of_styles');

/** redirect */

define( 'CONSULTANT_PARENT_DIR', get_template_directory() );
define( 'CONSULTANT_ADMIN_DIR', CONSULTANT_PARENT_DIR . '/admin' );
/**
 * Adds support for a theme option.
 */
if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/admin/options/' );
	require_once( CONSULTANT_ADMIN_DIR . '/options/options-framework.php' );

	// Loads options.php from child or parent theme
	$optionsfile = locate_template( 'options.php' );
	load_template( $optionsfile );
}