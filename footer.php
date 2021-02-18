<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package accesspress_parallax
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<?php if(is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')) :?>
		<div class="top-footer footer-column-<?php echo accesspress_footer_count(); ?>">
			<div class="mid-content clearfix">
				<?php if(is_active_sidebar('footer-1')): ?>
				<div class="footer-block">
					<?php dynamic_sidebar('footer-1'); ?>
				</div>
				<?php endif; ?>

				<?php if(is_active_sidebar('footer-2')): ?>
				<div class="footer-block">
					<?php dynamic_sidebar('footer-2'); ?>
				</div>
				<?php endif; ?>

				<?php if(is_active_sidebar('footer-3')): ?>
				<div class="footer-block">
					<?php dynamic_sidebar('footer-3'); ?>
				</div>
				<?php endif; ?>

				<?php if(is_active_sidebar('footer-4')): ?>
				<div class="footer-block">
					<?php dynamic_sidebar('footer-4'); ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<?php endif; ?>
		

		<div class="bottom-footer">
			<div class="mid-content clearfix">
				<div  class="copy-right">
					&copy; <?php echo date('Y')." "; bloginfo('name'); ?>  
				</div><!-- .copy-right -->
				<div class="site-info">
					<?php _e('Free WordPress Theme: AccessPress Parallax by','accesspress_parallax'); ?> <a href="<?php echo esc_url('http://accesspressthemes.com/','accesspress_parallax'); ?>" title="AccessPress Themes" target="_blank">AccessPress Themes</a>
				</div><!-- .site-info -->
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<div id="go-top"><a href="#page"><i class="fa fa-arrow-up"></i></a></div>

<?php wp_footer(); ?>
<?php /*
$accesspress_parallax = get_option('accesspress_parallax');
var_dump($accesspress_parallax); */
?>
</body>
</html>
