<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package optimize
 */

?>
</div><!-- .row -->
</div><!-- .container -->
	</div><!-- #content -->
<div class="container">
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-12">
<?php if (!dynamic_sidebar('opbottom1') ) : ?>
		<?php endif; ?>
</div> <!-- end div #bottom-menu-left -->
<div class="col-lg-4 col-md-4 col-sm-12">
	<?php if (!dynamic_sidebar('opbottom2') ) : ?>
			<?php endif; ?>
</div> <!-- end div #bottom-menu-center -->
<div class="col-lg-4 col-md-4 col-sm-12">
	<?php if ( !dynamic_sidebar('opbottom3') ) : ?>
	<?php endif; ?>
</div>
</div>
</div>
	<footer id="colophon" class="site-footer">
	<?php optimize_socialprofiles(); ?>
	<?php wp_nav_menu( array( 'theme_location' => 'footer-menu','container_class' => '','menu_id' => 'footerhorizontal',    'echo' => true,'depth' =>'1','fallback_cb' => false ) ); ?>	
		<div class="site-info">
		<?php _e('Copyright &#169;', 'optimize'); ?>  <?php echo date('Y');?> <a href="<?php echo esc_url(home_url('/'));?>" title="<?php bloginfo('name');?>" ><?php bloginfo('name');?></a>
			<span class="sep"> | </span>
				<?php				
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'optimize' ), 'optimize', '<a href="http://www.insertcart.com/product/optimize-wp-theme/">Insertcart.com</a>' );
				?>
		</div><!-- .site-info -->
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
