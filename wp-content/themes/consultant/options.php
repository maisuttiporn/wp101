<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = wp_get_theme(get_stylesheet_directory() . '/style.css');
	$themename = $themename['Name'];
	$themename = preg_replace("/\W/", "", strtolower($themename) );
	$themename = 'consultant';
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
	
	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {
	
	
	// Pull all the categories into an array
	$options_categories = array();  
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = __('Select a page:', 'consultant' );
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}
		
	// If using image radio buttons, define a directory path
	$imagepath =  get_stylesheet_directory_uri() . '/images/';
		
	$options = array();
		
	$options[] = array( "name" => __('Homepage Settings', 'consultant' ),
						"type" => "heading");
								
	$options[] = array( "name" => __('Welcome heading', 'consultant' ),
						"desc" => __('Heading for the homepage.', 'consultant' ),
						"id" => "welcome_head",
						"std" => "",
						"type" => "text");
							
	$options[] = array( "name" => __('Welcome text', 'consultant' ),
						"desc" => __('Textarea description of homepage.', 'consultant' ),
						"id" => "welcome_text",
						"std" => "",
						"type" => "textarea");							 

	$options[] = array( "name" => __('Homepage Box 1 heading', 'consultant' ),
						"desc" => __('Heading for homepage box1.', 'consultant' ),
						"id" => "box_head1",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => __('Homepage Box 1 text', 'consultant' ),
						"desc" => __('Textarea for homepage box1.', 'consultant' ),
						"id" => "box_text1",
						"std" => "",
						"type" => "textarea");
						
	$options[] = array( "name" => __('Homepage Box 1 thumbnail image', 'consultant' ),
						"desc" => __('215px x 80px exact. Upload your image for homepage box 1.', 'consultant' ),
						"id" => "box_image1",
						"type" => "upload");						
						
	$options[] = array( "name" => __('Homepage Box 1 link', 'consultant' ),
						"desc" => __('Paste here the link of the page or post.' , 'consultant' ),
						"id" => "box_link1",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => __('Homepage Box 2 heading' , 'consultant' ),
						"desc" => __('Heading for homepage box2.' , 'consultant' ),
						"id" => "box_head2",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => __('Homepage Box 2 text' , 'consultant' ),
						"desc" => __('Textarea for homepage box2.' , 'consultant' ),
						"id" => "box_text2",
						"std" => "",
						"type" => "textarea");
						
	$options[] = array( "name" => __('Homepage Box 2 thumbnail image' , 'consultant' ),
						"desc" => __('215px x 80px exact. Upload your image for homepage box 2.' , 'consultant' ),
						"id" => "box_image2",
						"type" => "upload");						
						
	$options[] = array( "name" => __('Homepage Box 2 link' , 'consultant' ),
						"desc" => __('Paste here the link of the page or post.' , 'consultant' ),
						"id" => "box_link2",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => __('Homepage Box 3 heading' , 'consultant' ),
						"desc" => __('Heading for homepage box3.' , 'consultant' ),
						"id" => "box_head3",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => __('Homepage Box 3 text' , 'consultant' ),
						"desc" => __('Textarea for homepage box3.' , 'consultant' ),
						"id" => "box_text3",
						"std" => "",
						"type" => "textarea");
						
	$options[] = array( "name" => __('Homepage Box 3 thumbnail image' , 'consultant' ),
						"desc" => __('215px x 80px exact. Upload your image for homepage box 3.' , 'consultant' ),
						"id" => "box_image3",
						"type" => "upload");						
						
	$options[] = array( "name" => __('Homepage Box 3 link' , 'consultant' ),
						"desc" => __('Paste here the link of the page or post.' , 'consultant' ),
						"id" => "box_link3",
						"std" => "",
						"type" => "text");																			
															
						
	$options[] = array( "name" => __('Slider Settings' , 'consultant' ),
						"type" => "heading");

	$options[] = array( "name" => __('Slider caption 1' , 'consultant' ),
						"desc" => __('Caption for the slider.' , 'consultant' ),
						"id" => "slider_head1",
						"std" => "",
						"type" => "text");		
						
	$options[] = array( "name" => __('Slider image 1' , 'consultant' ),
						"desc" => __('970px x 350px exact. Upload your image for homepage slider.' , 'consultant' ),
						"id" => "slider_image1",
						"type" => "upload");
						
	$options[] = array( "name" => __('Slider image link' , 'consultant' ),
						"desc" => __('Paste here the link of the page or post.' , 'consultant' ),
						"id" => "slider_link1",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => __('Slider caption 2' , 'consultant' ),
						"desc" => __('Caption for the slider.' , 'consultant' ),
						"id" => "slider_head2",
						"std" => "",
						"type" => "text");						
						
	$options[] = array( "name" => __('Slider image 2' , 'consultant' ),
						"desc" => __('970px x 350px exact. Upload your image for homepage slider.' , 'consultant' ),
						"id" => "slider_image2",
						"type" => "upload");
						
	$options[] = array( "name" => __('Slider image link' , 'consultant' ),
						"desc" => __('Paste here the link of the page or post.' , 'consultant' ),
						"id" => "slider_link2",
						"std" => "",
						"type" => "text");						
						
	$options[] = array( "name" => __('Footer Settings' , 'consultant' ),
						"type" => "heading");
						
	$options[] = array( "name" => __('Footer copyright text' , 'consultant' ),
						"desc" => __('Enter your company name here.' , 'consultant' ),
						"id" => "footer_cr",
						"std" => "",
						"type" => "text");
															
	return $options;
}