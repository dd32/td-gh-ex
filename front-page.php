<?php if ( 'posts' == get_option( 'show_on_front' ) ) {
    include( get_home_template() );
} else { ?>

<?php get_header(); ?>

<!-- slider -->

<div id="slider_container">

	<div class="row">
	
		<div class="four columns">
		
			<h1><?php if(esc_html(themeszen_get_option('discover_slidewelcomehead')) != NULL){ echo esc_html(themeszen_get_option('discover_slidewelcomehead'));} else echo "Write your welcome headline here." ?></h1>
		<p><?php if(esc_textarea(themeszen_get_option('discover_slidewelcometext')) != NULL){ echo esc_textarea(themeszen_get_option('discover_slidewelcometext'));} else echo "Nullam posuere felis a lacus tempor eget dignissim arcu adipiscing. Donec est est, rutrum vitae bibendum vel, suscipit non metus." ?></p>
		
	<?php if(themeszen_get_option('discover_home_page_slider') != "off") { ?>
	
		<?php if(esc_html(themeszen_get_option('discover_slidewelcomebtntext')) != NULL){ ?> 
	<a class="button large" href="<?php if(esc_url(themeszen_get_option('discover_slidewelcomelink')) != NULL){ echo esc_url(themeszen_get_option('discover_slidewelcomelink'));} ?>"><?php echo esc_html(themeszen_get_option('discover_slidewelcomebtntext')); ?></a>
	<?php } else { ?> <a class="button large" href="<?php if(esc_url(themeszen_get_option('discover_slidewelcomelink')) != NULL){ echo esc_url(themeszen_get_option('discover_slidewelcomelink'));} ?>"> <?php echo "Download Now!" ?></a> <?php } ?>
		
	<?php } ?>
		
		</div>	

		<div class="eight columns">
			<?php get_template_part( 'element-slider', 'index' ); ?>
		</div>
		
	</div>
</div>

<!-- slider end -->


<!-- home boxes -->
	
	<div class="row" id="box_container">

		<?php get_template_part( 'element-boxes', 'index' ); ?>

	</div>
	
<!-- home boxes end -->

<div class="clear"></div>
		

<?php get_footer(); ?>

<?php } ?>