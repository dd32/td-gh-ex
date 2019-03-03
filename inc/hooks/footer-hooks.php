<?php
/**
* Functions and definations required for theme footer
*
*/

//footer widgets
add_action('arrival_footer_section','arrival_theme_footer_widgets',10);
if( ! function_exists('arrival_theme_footer_widgets')){
	function arrival_theme_footer_widgets(){
		$defaults = arrival_get_default_theme_options();
		$arrival_footer_widget_enable = get_theme_mod('arrival_footer_widget_enable',$defaults['arrival_footer_widget_enable']);

		if( $arrival_footer_widget_enable == 'no' ){
			return;
		}
	?>
		<div class="footer-widget-wrapper clearfix">
			<div class="footer-1 ftr-widget">
			<?php dynamic_sidebar( 'footer-1' ); ?>
			</div>
			<div class="footer-2 ftr-widget">
			<?php dynamic_sidebar( 'footer-2' ); ?>
			</div>
			<div class="footer-3 ftr-widget">
			<?php dynamic_sidebar( 'footer-3' ); ?>
			</div>
			<div class="footer-4 ftr-widget">
			<?php dynamic_sidebar( 'footer-4' ); ?>
			</div>
		</div>
	<?php
	}
}

/*
* Bottom footer section
*
*/
add_action('arrival_footer_section','arrival_btm_footer',15);
if(! function_exists('arrival_btm_footer')){
	function arrival_btm_footer(){
	?>
	<div class="footer-btm">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'arrival' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'arrival' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
			<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'arrival' ), 'Arrival', '<a href="' . esc_url( 'https://wpoperation.com/' ) . '" target="_blank">WPoperation</a>' );
			?>
		</div><!-- .site-info -->
		<div class="social-icons-wrapp">
			<?php do_action('arrival_social_icons'); ?>
		</div>
	</div><!-- .footer-btm -->
	<?php 
	}
}

/**
* Theme footer main contents
*
*/
add_action('arrival_footer_contents','arrival_footer_contents',10);
if(! function_exists('arrival_footer_contents')){
	function arrival_footer_contents(){
	?>
	<footer id="colophon" class="site-footer">
		<div class="container">
			<?php do_action('arrival_footer_section'); ?>
		</div>
	</footer><!-- #colophon -->
	<?php 
	}
}

/**
* Scroll to top 
*
*/
add_action('arrival_footer_contents','arrival_scroll_to_top',15);
if( ! function_exists('arrival_scroll_to_top')){
	function arrival_scroll_to_top(){
	?>
	<div class="scroll-top-top">
		<span class="fa fa-angle-double-up"></span>
	</div>
	<?php 
	}
}