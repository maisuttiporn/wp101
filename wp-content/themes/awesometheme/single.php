<?php get_header(); ?>
<div class="row">
	<div class="col-xs-12 col-md-8">
		<?php
			if(have_posts()) :
				while(have_posts()):			
					the_post();
					?>
					<article id="<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php the_title('<h1 class="entry-title">','</h1>'); ?>
						<?php if(has_post_thumbnail()) : ?>
							<div class="pull-right">
								<?php the_post_thumbnail('thumbnail'); ?>
							</div>
						<?php endif; ?>
						<small>
							<?php the_category(' '); ?>
							 || <?php the_tags(); ?>
							 || <?php edit_post_link(); ?>
						</small>
						<?php the_content(); ?>
						<hr>
						<!-- Blog nav -->
						<div class="row">
							<div class="col-xs-6 text-left">
									<?php next_post_link(); ?>
							</div>
							<div class="col-xs-6 text-right">
									<?php previous_post_link(); ?>
							</div>
						</div>
						
						<!-- end Blog nav -->

						<!-- add comment -->
						<hr>
						<?php 
							if(comments_open())  comments_template(); 
							else "<h5>Sorry comment is closed.</h5>";
						?>
					</article>
					<?php
				endwhile;
			endif;
		?>
	</div>

	<div class="col-xs-12 col-md-4">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>