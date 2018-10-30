<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Akarsh_Blog
 * @since Akarsh Blog 1.0
 */

 	 $header_social		 	= akarsh_blog_get_theme_mod( 'header_social' );				  
	 $facebook 			 	= akarsh_blog_get_theme_mod( 'facebook' );	
	 $twitter 				= akarsh_blog_get_theme_mod( 'twitter' );
	 $linkedin 				= akarsh_blog_get_theme_mod( 'linkedin' );
     $behance 				= akarsh_blog_get_theme_mod( 'behance' );	
	 $dribbble 				= akarsh_blog_get_theme_mod( 'dribbble' );
	 $instagram 			= akarsh_blog_get_theme_mod( 'instagram' );
	 $youtube 				= akarsh_blog_get_theme_mod( 'youtube' );
	 $footer_copyright_text = akarsh_blog_get_theme_mod( 'copyright' );
 
if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) || is_active_sidebar( 'sidebar-1' )  ) : ?>
	<div id="secondary" class="secondary">

		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php
					// Primary navigation menu.
					wp_nav_menu( array(
						'menu_class'     => 'nav-menu',
						'theme_location' => 'primary',
					) );
				?>
			</nav><!-- .main-navigation -->
		<?php endif; ?>

		<?php if(!empty($header_social) ) { ?>			
					<div class="akarsh-blog-social-networks akarsh-blog-social-networks-header">
						<?php if(!empty($facebook) ) { ?>	
							<a href="<?php echo esc_url($facebook); ?>" title="<?php esc_attr_e('Facebook','akarsh-blog'); ?>" target="_blank" class="akarsh-blog-social-network-icon akarsh_blog-facebook-icon"><i class="fa fa-facebook"></i></a>
						<?php } 
						if(!empty($twitter) ) { ?>	
							<a href="<?php echo esc_url($twitter); ?>" title="<?php esc_attr_e('Twitter','akarsh-blog'); ?>" target="_blank" class="akarsh-blog-social-network-icon akarsh_blog-twitter-icon"><i class="fa fa-twitter"></i></a>
						<?php } 
						if(!empty($linkedin) ) { ?>	
							<a href="<?php echo esc_url($linkedin); ?>" title="<?php esc_attr_e('LinkedIn','akarsh-blog'); ?>" target="_blank" class="akarsh-blog-social-network-icon akarsh_blog-linkedin-icon"><i class="fa fa-linkedin"></i></a>
						<?php } 
						if(!empty($youtube)) { ?>		
							<a href="<?php echo esc_url($youtube); ?>" title="<?php esc_attr_e('YouTube','akarsh-blog'); ?>" target="_blank" class="akarsh-blog-social-network-icon akarsh_blog-youtube-icon"><i class="fa fa-youtube"></i></a>				
						<?php } 
						if(!empty($instagram) ) { ?>		
							<a href="<?php echo esc_url($instagram); ?>" title="<?php esc_attr_e('Instagram','akarsh-blog'); ?>" target="_blank" class="akarsh-blog-social-network-icon akarsh_blog-instagram-icon"><i class="fa fa-instagram"></i></a>				
						<?php } 
						if(!empty($behance) ) { ?>		
							<a href="<?php echo esc_url($behance); ?>" title="<?php esc_attr_e('Behance','akarsh-blog'); ?>" target="_blank" class="akarsh-blog-social-network-icon akarsh_blog-behance-icon"><i class="fa fa-behance"></i></a>				
						<?php } 
						if(!empty($dribbble) ) { ?>		
							<a href="<?php echo esc_url($dribbble); ?>" title="<?php esc_attr_e('Dribbble','akarsh-blog'); ?>" target="_blank" class="akarsh-blog-social-network-icon akarsh_blog-dribbble-icon"><i class="fa fa-dribbble"></i></a>				
						<?php } ?>				
					</div>
				<?php } ?>

		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
			<div id="widget-area" class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div><!-- .widget-area -->
		<?php endif; ?>
		
		<?php if(!empty($footer_copyright_text)) { ?>
			<div class="akarsh-blog-social-networks footer_copyrigh">
				<?php	echo '&copy; '. esc_html($footer_copyright_text); ?>
			</div>
		<?php } ?>

	</div><!-- .secondary -->

<?php endif; ?>
