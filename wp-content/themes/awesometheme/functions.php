<?php
/* ====================
 Enqueue Script 
 =================== */
function awesome_script_enqueue(){
	wp_enqueue_style( 'customstyle',get_template_directory_uri() . '/css/awesome.css' , array(), '1.0.0', 'all' );
	wp_enqueue_script( 'customjs',get_template_directory_uri() . '/js/awesome.js' , array(), '1.0.0', true );
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
add_action( 'init','awesome_theme_setup');

// theme support
add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');
add_theme_support('post-formats',array('aside','image','video'));

