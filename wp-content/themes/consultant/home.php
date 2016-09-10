<?php get_header(); ?>

<?php if(!is_front_page()) { ?>

	<div id="subhead_container">
		
		<div class="row">

		<div class="large-12 columns">
	
			
<h1><?php if ( is_category() ) {
		single_cat_title();
		} elseif (is_tag() ) {
		echo (__( 'Archives for ', 'consultant' )); single_tag_title();
		} elseif (is_author() ) {
    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));		
		echo (__( 'Archives for ', 'consultant' )); echo $curauth->nickname;		
	} elseif (is_archive() ) {
		echo (__( 'Archives for ', 'consultant' )); single_month_title(' ', true);
	} else {
		wp_title('',true);
	} ?></h1>
			
			</div>	
			
	</div></div>
	
<?php } ?>

<?php if(is_front_page()) { ?>

	<!--welcome-->
	<div id="welcome_container">

	<div class="row">
		<div class="large-12 columns">

			<div id="welcome-box">
		
	<h1><?php if(of_get_option('welcome_head') != NULL){ echo esc_html(of_get_option('welcome_head'));} else echo __( 'Your welcome headline here', 'consultant' ); ?></h1>
	<p><?php if(of_get_option('welcome_text') != NULL){ echo esc_textarea(of_get_option('welcome_text'));} else echo __( 'Nullam posuere felis a lacus tempor eget dignissim arcu adipiscing. Donec est est, rutrum vitae bibendum vel, suscipit non metus. Nullam posuere felis a lacus tempor eget dignissim arcu adipiscing. Donec est est, rutrum vitae bibendum vel, suscipit non metus.', 'consultant' );  ?></p>
		
	</div>
	
</div><!--col end-->
	
</div><!--row end-->	
</div><!--welcome end-->

<div class="hr"><hr /></div>   
<div class="clear"></div>
				
		<!--boxes-->
		<div id="box_container">
		
	<div class="row">		
				
		<?php get_template_part( 'element-boxes', 'home' ); ?>
		
</div><!--row end-->			
		
		</div><!--box-container end-->
			
			<div class="clear"></div>
	<?php } ?> 
<!--content-->

		<div class="row" id="content_container">
				
	<!--left col--><div class="large-8 columns">
	
		<div id="left-col">
			
			<?php get_template_part( 'loop', 'home' ); ?>

	</div> <!--left-col end-->
</div> <!--column end-->

<?php get_sidebar(); ?>

</div>
<!--content end-->			
		

<?php get_footer(); ?>