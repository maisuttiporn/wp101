<h3>
	Image Post - <?php the_title(); ?>
</h3>
<div class="thumbnail-img">
	<?php the_post_thumbnail('thumbnail'); ?>
</div>
<small>
	Posted on: 
	<?php the_time('F j, Y'); ?>
	: <?php the_time('g:i m'); ?>
	<?php the_category(); ?>
	<?php the_author(); ?>
</small>
<?php the_content(); ?>
<hr>