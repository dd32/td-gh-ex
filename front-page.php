<?php if ( 'posts' == get_option( 'show_on_front' ) ) {
    include( get_home_template() );
} else { ?>

<?php get_header(); ?>

<!-- slider -->

<div class="clear"></div>

	<div class="row">
	
		<?php get_template_part( 'element-slider', 'index' ); ?>
		
		</div>	
		
<div class="clear"></div>

		<?php get_template_part( 'element-sliderbar', 'index' ); ?>

<!-- slider end -->

<div class="clear"></div>
	
	<?php get_template_part( 'element-about', 'index' ); ?>
		
		
	<div class="clear"></div>
	
		<?php get_template_part( 'element-portfolio', 'index' ); ?>	
		
	
<div class="clear"></div>

		<?php get_template_part( 'element-cta', 'index' ); ?>

	
<div class="clear"></div>	

	<div class="container">
			
		<?php get_template_part( 'element-testimonial', 'index' ); ?>
	
		</div>		
		
		<div class="clear"></div>
<?php get_footer(); ?>

<?php } ?>