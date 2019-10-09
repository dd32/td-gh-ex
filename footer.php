<?php
/* 	AssociationX Theme's Footer
	Copyright: 2012-2019, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since AssociationX 1.0
*/
?>
			</div><!-- #site-con -->		
		</div><!-- #sitetoppart -->	
		<?php do_action('associationx_before_footer'); ?>
		<div class="clear"></div>
		<div id="bottomspace"></div>
		<div id="sitebottompart">
			<div id="footer">
				<div id="footer-content">
					<?php associationx_social_links(1); ?>
					<?php 
					$logoimg = '';
					if ( function_exists( 'the_custom_logo' ) ) {
						if ( has_custom_logo() ):
							$logoimg = esc_url(wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' )[0]);
						endif;
					} 
					$stitleclass = 'site-title'; if($logoimg) $stitleclass = 'site-title-hidden';
					?>
					<div id="footerlogo">  
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logotitle"><?php if ( $logoimg ): ?><img class="site-logo" src="<?php echo $logoimg; ?>" alt="<?php esc_html(bloginfo('name')); ?>" /><?php endif; ?><h1 class="<?php echo $stitleclass; ?>"><?php esc_html(bloginfo('name')); ?></h1></a>
						<h2 class="site-des"><?php esc_html(bloginfo('description')); ?></h2>
					</div>
					<?php  get_sidebar( 'footer' ); ?>
				</div><!-- #footer-content -->
				<div id="creditline" class="box100"><?php echo '&copy; ' . date("Y"). ': ' . esc_html(get_bloginfo('name')) .','; ?> <span class="credit">| AssociationX Theme by: <a href="<?php echo esc_url('https://d5creation.com'); ?>" target="_blank">D5 Creation</a> | Powered by: <a href="http://wordpress.org" target="_blank">WordPress</a></span></div>						
			</div><!-- #footer -->						
		</div><!-- #sitebottompart -->
		<div class="clear"></div>
		<a href="#top" class="go-top smscroll"></a>
		<?php do_action('associationx_after_footer'); ?>
	</div> <!-- #site-container -->
	<div id="wpfooterpart"><?php wp_footer(); ?></div>
</body>
</html>