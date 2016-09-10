<?php if ( 'posts' == get_option( 'show_on_front' ) ) {
	 get_template_part( 'home', 'index' );
} else { ?>

<?php get_header(); ?>

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
				
		<?php get_template_part( 'element-boxes', 'index' ); ?>
		
</div><!--row end-->			
		
		</div><!--box-container end-->
			
			<div class="clear"></div>
         

<?php get_footer(); ?>

<?php } ?>