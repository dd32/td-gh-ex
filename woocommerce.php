<?php
/**
 * single page detail file
 * @package WordPress
 * @subpackage spasalon
 */
 
get_header(); 
page_banner_strip(); // banner strip
?>
<!-- Blog & Sidebar Section -->
<section id="section">		
	<div class="container">
		<div class="row">
			
			<!--Blog Detail-->
			<div class="col-md-<?php echo ( !is_active_sidebar( 'woocommerce-1' ) ? '12' :'8' ); ?> col-md-12">
				<div class="site-content">
				<?php woocommerce_content(); ?>
				</div>
			</div>
			<!--/End of Blog Detail-->

			<?php get_sidebar('woocommerce'); ?>
		
		</div>	
	</div>
</section>
<!-- End of Blog & Sidebar Section -->
 
<div class="clearfix"></div>

<?php get_footer(); ?>