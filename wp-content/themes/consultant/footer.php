	<!--footer-->
	<div class="clear"></div>
		
		<div id="footer">
		
	
	<!--footer container--><div class="row">	
		
		<div class="large-12 columns" id="footer-widget">
			
			<?php
			/* A sidebar in the footer? Yep. You can can customize
			 * your footer with four columns of widgets.
			 */
			get_sidebar( 'footer' );
			?>
			
			</div><!--footer widget end-->
		
		</div><!-- row end-->		
		
		</div><!-- footer end-->				
		
	<div class="clear"></div>
	
		<div id="footer-info">		
			
				<!--footer container--><div class="row">
				
		<div class="large-12 columns">
			
			<div id="copyright"><?php _e( 'Copyright', 'consultant' ); ?> <?php echo date( 'Y' ); ?> <?php echo esc_html(of_get_option('footer_cr')); ?> | <?php _e( 'Powered by', 'consultant' ); ?> <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'consultant' ) ); ?>"><?php _e( 'WordPress', 'consultant' ); ?></a> | <?php _e( 'consultant theme by', 'consultant' ); ?> <a href="<?php echo esc_url( __( 'http://www.antthemes.com', 'consultant' ) ); ?>"><?php _e( 'antthemes', 'consultant' ); ?></a></div>
					
			</div><!--footer info end-->		
		</div><!-- footer container2-->				
			
	</div>
	
	<?php wp_footer(); ?>

</body>

</html>