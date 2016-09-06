<?php
/**
 * The template used for displaying page breadcrumb
 *
 * @package Greenr
 */ 
?>
<div class="breadcrumb-wrap">
	<div class="container">
		<div class="sixteen columns breadcrumb">	
			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->
			<?php if ( get_theme_mod('breadcrumb' ) && function_exists( 'greenr_breadcrumbs' ) ) : ?>
				<div id="breadcrumb" role="navigation">
					<?php greenr_breadcrumbs(); ?>
				</div>
			<?php endif; ?>  
		</div>
	</div>
</div>