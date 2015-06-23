<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package Theme-Vision
 * @subpackage Agama
 * @since Agama 1.0
 */
?>		
			</div><!-- .container -->
		</div><!-- #main .wrapper -->
	</div><!-- #page -->
	
	<?php 
	if( 
		is_active_sidebar( 'footer-widget-1' ) || 
		is_active_sidebar( 'footer-widget-2' ) || 
		is_active_sidebar( 'footer-widget-3' ) || 
		is_active_sidebar( 'footer-widget-4' )
	  ): ?>
	<div class="footer-widgets">
		<div class="container">
			
			<?php if( is_active_sidebar( 'footer-widget-1' ) ): ?>
			<div class="col-md-3">
				<?php dynamic_sidebar( 'footer-widget-1' ); ?>
			</div>
			<?php endif; ?>
			
			<?php if( is_active_sidebar( 'footer-widget-2' ) ): ?>
			<div class="col-md-3">
				<?php dynamic_sidebar( 'footer-widget-2' ); ?>
			</div>
			<?php endif; ?>
			
			<?php if( is_active_sidebar( 'footer-widget-3' ) ): ?>
			<div class="col-md-3">
				<?php dynamic_sidebar( 'footer-widget-3' ); ?>
			</div>
			<?php endif; ?>
			
			<?php if( is_active_sidebar( 'footer-widget-4' ) ): ?>
			<div class="col-md-3">
				<?php dynamic_sidebar( 'footer-widget-4' ); ?>
			</div>
			<?php endif; ?>
			
		</div>
	</div><!-- .footer-widgets -->
	<?php endif; ?>
	
	<?php if( get_theme_mod('agama_to_top', true) ): ?>
	<a id="toTop">
		<i class="fa fa-angle-up"></i>
	</a>
	<?php endif; ?>
	
	<footer id="colophon" class="clear" role="contentinfo">
		<div class="site-info col-md-6">
			<?php do_action('agama_credits'); ?>
		</div><!-- .site-info -->
		
		<?php if( get_theme_mod('agama_footer_social', false) ): ?>
		<div class="social col-md-6">
			<?php agama_social_icons( 'top' ); ?>
		</div>
		<?php endif; ?>
		
	</footer><!-- #colophon -->
	
</div><!-- .main-wrapper -->

<?php wp_footer(); ?>

</body>
</html>