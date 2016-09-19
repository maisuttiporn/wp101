<?php
/* ====================
 Enqueue Script 
 =================== */
function awesome_script_enqueue(){
	//css
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.4', 'all');
	wp_enqueue_style( 'customstyle',get_template_directory_uri() . '/css/awesome.css' , array(), '1.0.0', 'all' );
	
	//js
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'customjs',get_template_directory_uri() . '/js/awesome.js' , array(), '1.0.0', true );
	wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.4', true);

}
add_action('wp_enqueue_scripts','awesome_script_enqueue');



/* ====================
 Theme Setup
 =================== */
function awesome_theme_setup(){
	show_admin_bar(false); // hide menubar
	
	add_theme_support('menus');

	register_nav_menu('primary', 'primary menu');
	register_nav_menu('secondary', 'secondary menu');
 }
// init or after_theme_setup
add_action( 'init','awesome_theme_setup');

// theme support
add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');
add_theme_support('post-formats',array('aside','image','video'));
add_theme_support('html5',array('search-form'));

/* ====================
 Sidebar function
 =================== */
function awesome_widget_setup(){
	register_sidebar(
		array(
			'name'	=>	'Sidebar',
			'id'	=>	'sidebar-1',
			'class'	=>	'custom',
			'description'	=>	'my first sidebar',
			'before_widget'	=>	'<aside id="%1$s" class="widget %2$s">',
			'after_widget'	=>	'</aside>',
			'before_title'	=>	'<h1> class="widget-title">',
			'after_title'	=>	'<h1>',
		)
	);
}
add_action('wiget_init', 'awesome_widget_setup');


/*
* Include Walker file
*/
require get_template_directory() . '/inc/walker.php';



/*
* Remove wp showing version
*/
function awesome_remove_version() {
	return '';
}
add_filter( 'the_generator', 'awesome_remove_version');




/*
* Custom Post Type
*/
function awesome_custom_post_type(){
	$label = array(
		'name'	=>	'Portfolio',
		'singular_name'	=>	'Portfolio',
		'add_new'	=>	'Add Portfolio Item',
		'all_items'	=>	'All Items',
		'add_new_item'	=>	'Add Item',
		'edit_item'	=>	'Edit Item',
		'new_item'	=>	'New Item',
		'view_item'	=>	'View Item',
		'search_item'	=>	'Search Portfolio',
		'not_found'	=>	'No Items found',
		'not_found_in_trash'	=>	'No items found in trash',
		'parent_item_colon'	=>	'Parent Item'
	);

	$args = array(
		'labels'	=>	$label,
		'public'	=>	true,
		'has_archive'	=>	true,
		'publicly_queryable'	=>	true,
		'query_var'	=>	true,
		'rewrite'	=>	true,
		'capability_type'	=>	'post',
		'hierarchical'	=>	false,
		'supports'	=>	array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'revisions',			
		),
		/*
		'taxonomies'	=>	array(
			'category',
			'post_tag'
		),
		*/
		'menu_position'	=>	5,
		'exclude_from_search' =>	false
	);
	register_post_type( 'portfolio',$args );
}
add_action( 'init','awesome_custom_post_type');

/*
* Customs Taxonomies 
*/
function awesome_custom_taxonomies(){

	// add new taxonomy hierarchical
	
	$labels = array(
		'name' => 'Fields',
		'singular_name'	=>	'Field',
		'search_items'	=>	'Search Field',
		'all_items'	=>	'All Fields',
		'parent_item'	=>	'Parent Field',
		'parent_item_colon'	=>	'Parent Field',
		'edit_item'	=>	'Edit Field',
		'update_item'	=>	'Update Field',
		'add_new_item'	=>	'Add New Field',
		'new_item_name'	=>	'New Type Name',
		'menu_name'	=>	'Field',
	);
	/*
	$labels = array(
		'name'              => _x( 'Types', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Type', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Type', 'textdomain' ),
		'all_items'         => __( 'All Types', 'textdomain' ),
		'parent_item'       => __( 'Parent Type', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Type:', 'textdomain' ),
		'edit_item'         => __( 'Edit Type', 'textdomain' ),
		'update_item'       => __( 'Update Type', 'textdomain' ),
		'add_new_item'      => __( 'Add New Type', 'textdomain' ),
		'new_item_name'     => __( 'New Type Name', 'textdomain' ),
		'menu_name'         => __( 'Type', 'textdomain' ),
	);
	*/
	$args = array(

		'hierarchical'	=>	true,
		'labels'	=>	$labels,
		'show_ui'	=>	true,
		'show_admin_column'	=>	true,
		'query_var'	=>	true,
		'rewrite'	=>	array('slug'	=>	'Field'), // mysite.com/development >> mysite.com/type/devlopment

	);
	register_taxonomy( 'Field', array('portfolio'),$args);

	// add new taxonomy not hierarchical
	register_taxonomy( 'software',array('portfolio'),array(
		'label'	=>	'Software',
		'rewrite'	=>	array('slug'	=>	'software'),
		'hierarchical'	=>	false,
	));


}
add_action( 'init', 'awesome_custom_taxonomies');

















