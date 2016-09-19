<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php bloginfo('name'); ?> : <?php wp_title( '', true, '' ); ?></title>
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<?php wp_head(); ?>
	</head>

	<?php 
	/*
	   ============================================
	   check home page or not !!
	   ============================================
	*/
		// is_home(); == blog page
		// is_front_page(); == Home
		if(is_front_page()) : 
			$awesome_classes = array('awesome-class','my-class');
		else :
			$awesome_classes = array('no-awesome-class');
		endif;
	/*
	   ============================================
	*/
	?>
	<body <?php body_class($awesome_classes); ?> >
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">

				<nav class="navbar navbar-default">
				  <div class="container-fluid">
				    <!-- Brand and toggle get grouped for better mobile display -->
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				      <a class="navbar-brand" href="<?php bloginfo('url'); ?>">Awesome Theme</a>
				    </div>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<?php 
							wp_nav_menu(array(
								'theme_location' => 'primary',
								'container' => false,
								'menu_class' => 'nav navbar-nav navbar-right',
								'walker' => new Walker_Nav_Primary()
								)
							);
						?>
					</div>
				  </div><!-- /.container-fluid -->
				</nav>

			</div> <!-- end col-xs-12 -->
			<?php get_search_form(); ?>
		</div> <!-- end row -->
	
		
		<img src="<?php header_image(); ?>" height="<?php get_custom_header()->height; ?>" width="<?php get_custom_header()->width; ?>" >