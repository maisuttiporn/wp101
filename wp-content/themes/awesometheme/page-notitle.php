<?php 
/*
	Template Name: Page no title.
*/
?>
<?php get_header(); ?>
<?php
	if(have_posts()) :
		while(have_posts()):			
			the_post();
?>			
			<h1>This is my Static Title.</h1>
			<small>
				Posted on: 
				<?php the_time('F j, Y'); ?>
				: <?php the_time('g:i m'); ?>
				<?php the_category(); ?>
				<?php the_author(); ?>
			</small>
			<?php the_content(); ?>
<?php
		endwhile;
	endif;
?>
<?php get_footer(); ?>