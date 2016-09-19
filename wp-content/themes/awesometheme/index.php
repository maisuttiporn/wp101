<?php get_header(); ?>
<div class="row">
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
	<!-- Blog nav -->
	<div class="col-xs-6 text-left">
			<?php next_posts_link('Next Blog'); ?>
	</div>
	<div class="col-xs-6 text-right">
			<?php previous_posts_link('Previous Blog'); ?>
	</div>
	<!-- end Blog nav -->


	<div class="col-xs-12 col-md-4">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>