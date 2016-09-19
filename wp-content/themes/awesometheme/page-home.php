<?php get_header(); ?>
<div class="row">

	<!-- WP_Query --> 
	last post
	<div class="col-xs-12">
		<?php
			$lastBlog = new WP_Query('type=post&posts_per_page=1');
			if($lastBlog->have_posts()) :
				while($lastBlog->have_posts()):			
					$lastBlog->the_post();
					get_template_part('content',get_post_format());				
				endwhile;
			endif;
			wp_reset_postdata();
		?>
	</div>
	<!-- end WP_Query -->
	<hr> Home Page
	<!-- Default Home -->
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
		<hr> Second last post
		<?php
		// Last other 2 posts not the first one
		$args = array(
			'type'	=>	'post',
			'posts_per_page'	=>	2,
			'offset'	=>	1,
		);
			$lastBlog = new WP_Query($args);
			// offset = skip 1 post
			if($lastBlog->have_posts()) :
				while($lastBlog->have_posts()):			
					$lastBlog->the_post();
					get_template_part('content',get_post_format());				
				endwhile;
			endif;
			wp_reset_postdata();
		?>
		<hr> Cat Query 
		<?php
		// Only tutorial category
			//$lastBlog = new WP_Query('type=post&posts_per_page=-1&cat=15');
			$lastBlog = new WP_Query('type=post&posts_per_page=-1&category_name=tutorials');
			// offset = skip 1 post
			if($lastBlog->have_posts()) :
				while($lastBlog->have_posts()):			
					$lastBlog->the_post();
					get_template_part('content',get_post_format());				
				endwhile;
			endif;
			wp_reset_postdata();
		?>
		



	</div>
	<!-- end Default Home -->	
	<div class="col-xs-12 col-md-4">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>