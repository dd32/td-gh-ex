<?php
/**
 * The template for displaying the footer
 *
 * @package WordPress
 * @subpackage B & W
 * @since B & W 1.1
 */
?>
		<!-- Footer
		================================================== -->
		<footer class="footer-wrapper wow fadeIn"  data-wow-offset="100">
			<!-- top-footer -->
			<div class="top-footer">
				<div class="container">
					<div class="row">
						<div class="col-lg-3">
							<div class="footer-area footer-01">
								<?php if ( is_active_sidebar( 'footer-01' ) ) : ?>
									<?php dynamic_sidebar( 'footer-01' ); ?>
								<?php else : ?>
								<?php
								/*
								* This content shows up if there are no widgets defined in the backend.
								*/
								?>
								<div class="no-widgets">
									<p><?php _e( 'This is a widget ready area. Add some and they will appear here.', 'bnwtheme' );  ?></p>
								</div>
								<?php endif; ?>
								
							</div>
						</div>
						<div class="col-lg-3">
						
							<div class="footer-area footer-02">
								<?php if ( is_active_sidebar( 'footer-02' ) ) : ?>
									<?php dynamic_sidebar( 'footer-02' ); ?>
								<?php else : ?>
								<?php
								/*
								* This content shows up if there are no widgets defined in the backend.
								*/
								?>
								<div class="no-widgets">
									<p><?php _e( 'This is a widget ready area. Add some and they will appear here.', 'bnwtheme' );  ?></p>
								</div>
								<?php endif; ?>
								
							</div>
							
						</div>
						<div class="col-lg-3">
							<div class="footer-area footer-03">
								<?php if ( is_active_sidebar( 'footer-03' ) ) : ?>
									<?php dynamic_sidebar( 'footer-03' ); ?>
								<?php else : ?>
								<?php
								/*
								* This content shows up if there are no widgets defined in the backend.
								*/
								?>
								<div class="no-widgets">
									<p><?php _e( 'This is a widget ready area. Add some and they will appear here.', 'bnwtheme' );  ?></p>
								</div>
								<?php endif; ?>
								
							</div>
						</div>
						<div class="col-lg-3">
							<div class="footer-area footer-04">
								<?php if ( is_active_sidebar( 'footer-04' ) ) : ?>
									<?php dynamic_sidebar( 'footer-04' ); ?>
								<?php else : ?>
								<?php
								/*
								* This content shows up if there are no widgets defined in the backend.
								*/
								?>
								<div class="no-widgets">
									<p><?php _e( 'This is a widget ready area. Add some and they will appear here.', 'bnwtheme' );  ?></p>
								</div>
								<?php endif; ?>
								
							</div>
						</div>
					</div>
					<hr style="style-six"> 
					<div class="row">
						<div class="col-lg-12">
							<div class="footer-area footer-05">
								<?php if ( is_active_sidebar( 'footer-05' ) ) : ?>
									<?php dynamic_sidebar( 'footer-05' ); ?>
								<?php else : ?>
								<?php
								/*
								* This content shows up if there are no widgets defined in the backend.
								*/
								?>
								<div class="no-widgets">
									<p><?php _e( 'This is a widget ready area. Add some and they will appear here.', 'bnwtheme' );  ?></p>
								</div>
								<?php endif; ?>
								
							</div>
						</div>
					</div>
					<hr style="style-six">
					<div class="row">
						<div class="col-lg-12">
							<div class="footer-area footer-06">
								<?php if ( is_active_sidebar( 'footer-06' ) ) : ?>
									<?php dynamic_sidebar( 'footer-06' ); ?>
								<?php else : ?>
								<?php
								/*
								* This content shows up if there are no widgets defined in the backend.
								*/
								?>
								<div class="no-widgets">
									<p><?php _e( 'This is a widget ready area. Add some and they will appear here.', 'bnwtheme' );  ?></p>
								</div>
								<?php endif; ?>
								
							</div>
						</div>
					</div>
				</div><!-- /container -->
			</div><!-- /top-footer -->
			<!-- middle-footer -->
			<div class="middle-footer">
				<div class="container">
					<!-- Footer Menu -->
					<nav role="navigation">
						<?php wp_nav_menu(array(
    					'container' => '',                              // remove nav container
    					'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
    					'menu' => __( 'Footer Links', 'bnwtheme' ),   // nav name
    					'menu_class' => 'nav nav-pills footer-menu',    // adding custom nav class
    					'theme_location' => 'footer-links',             // where it's located in the theme
    					'before' => '',                                 // before the menu
						'after' => '',                                  // after the menu
						'link_before' => '',                            // before each link
						'link_after' => '',                             // after each link
						'depth' => 0,                                   // limit the depth of the nav
    					'fallback_cb' => 'bnw_footer_links_fallback'  // fallback function
						)); ?>
					</nav><!-- /Footer Menu -->
				</div><!-- /container -->
			</div><!-- /middle-footer -->
			<!-- bottom-footer -->
			<div class="bottom-footer">
				<div class="container">
					<div  class="row">
						<div class="col-lg-6">
							<div class="copyright">
								&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. 
								<!--  -->
								<?php if ( of_get_option( 'footer_copyright' ) ) { ?>
									<?php echo of_get_option( 'footer_copyright' ); ?>
								<?php } ?>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="pull-right">
								<ul class="nav nav-pills footer-social">
									<li><a title="Facebook" href="<?php if(of_get_option('facebook_url')) echo of_get_option('facebook_url'); ?>"><i class="fa fa-facebook"></i></a></li>
									<li><a title="Google Plus" href="<?php if(of_get_option('googleplus_url')) echo of_get_option('googleplus_url'); ?>"><i class="fa fa-google-plus"></i></a></li>
									<li><a title="LinkedIn" href="<?php if(of_get_option('linkedin_url')) echo of_get_option('linkedin_url'); ?>"><i class="fa fa-linkedin"></i></a></li>
									<li><a title="Twitter" href="<?php if(of_get_option('twitter_url')) echo of_get_option('twitter_url'); ?>"><i class="fa fa-twitter"></i></a></li>
									<li><a title="YouTube" href="<?php if(of_get_option('youtube_url')) echo of_get_option('youtube_url'); ?>"><i class="fa fa-youtube"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div><!-- /container -->
			</div><!-- /bottom-footer -->
		</footer><!-- /footer-wrapper -->
	</div><!-- /Wrapper End -->
	<!-- Scroll To Top -->
	<p id="back-top">
		<a href="#top"><span><i class="fa fa-chevron-up"></i></span></a>
	</p>
	<!-- /Scroll To Top -->
	
	<?php // all js scripts are loaded in library/scripts.php ?>
	<?php wp_footer(); ?>
	</body>
</html><!-- /html -->