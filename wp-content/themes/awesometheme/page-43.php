<?php get_header(); ?>
<div class="row">
<h2>Page-43</h2>
	<div class="col-xs-12 col-md-8">
		<?php
			if(have_posts()) :
				while(have_posts()):			
					the_post();
					get_template_part('content',get_post_format());
				//echo "This is the post format " . get_post_format();
				endwhile;
			endif;
		?>
	</div>
	<div class="col-xs-12 col-md-4">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>