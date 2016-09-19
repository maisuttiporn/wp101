<?php get_header(); ?>
<div class="row">
	<div class="col-xs-12 col-md-8">
		<?php
			if(have_posts()) :
				while(have_posts()):			
					the_post();
					
					get_template_part('content', 'search');

				endwhile;
			endif;
		?>
	</div>
	<div class="col-xs-12 col-md-4">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>