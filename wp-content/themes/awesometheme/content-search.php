<?php the_title( sprintf('<h4 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ),'</a></h4>' ); ?>

<div class="row">
	<div class="col-xs-12 col-sm-2">
		<div class="thumbnail"><?php the_post_thumbnail('thumbnail'); ?></div>
	</div>
	<div class="col-xs-12 col-sm-10">
		<?php the_excerpt(); ?>
	</div>
</div>
