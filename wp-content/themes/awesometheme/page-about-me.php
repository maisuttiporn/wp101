<?php get_header(); ?>
<?php
	if(have_posts()) :
		while(have_posts()):			
			the_post();
?>			
			<?php the_content(); ?>
			<h3>
			<?php the_title(); ?>
			</h3>
<?php
		endwhile;
	endif;
?>
<?php get_footer(); ?>