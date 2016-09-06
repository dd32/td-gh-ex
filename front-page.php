<?php
/**
 * The Front Page template file.
 *
 * This is the front page template file, use to display static page
 * when set 'Front page displays' to a page in Reading Settings
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package BOXY
 */
if ( 'posts' == get_option( 'show_on_front' ) ) {
	include get_home_template();
} else {
	get_header();
	if ( get_theme_mod('page-builder',false) ) { 
		if( get_theme_mod('flexslider') ) {    
			echo do_shortcode( get_theme_mod('flexslider'));
		} ?>

		<div id="content" class="site-content container">
				<div id="primary" class="content-area <?php boxy_home_sidebar_class(); ?>">
						<main id="main" class="site-main" role="main">
					<?php
						while ( have_posts() ) : the_post();
							the_content();
						endwhile;
					?>
					
			     </main><!-- #main -->
		     </div><!-- #primary --><?php	
    } else {  
            if( get_theme_mod('enable_slider',true) ) { 
                get_template_part('category-slider');
            }
		
			if( get_theme_mod('enable_service',true)  ) { 
							
				$output = '';
				$output = '<div class="services">';
				$output .= '<div class="container">'; 


				if ( get_theme_mod('service-icon-1') || get_theme_mod('service-title-1') || get_theme_mod('service-description-1') ) {
					$output .= '<div class="one-third column" class="service">';
					$output .= '<div class="service-title"><p><i class="' . esc_attr( get_theme_mod('service-icon-1') ) . '"></i></p>';
					$output .= '<h3>' . esc_html(  get_theme_mod('service-title-1') ) . '</h3></div>';
					$output .= '<div class="service">' .  get_theme_mod('service-description-1') . '</div>';
					$output .= '</div><!-- .one-third -->';
				} else {
					$output .= '<div class="one-third column" class="service">';
					$output .= '<div class="service-title"><p><i class="fa fa-magic"></i></p>';
					$output .= '</div>';
					$output .= '<div class="service">';
					$output .= sprintf( __('<h3>Featured Page</h3><p>Featured page description text : use the page excerpt or set your own custom text. Click  <a href="%1$s"target="_blank"> Customizer </a> and Goto Home => Sercice Section -1.</p>', 'boxy' ), admin_url('customize.php') );
					$output .= '</div></div><!-- .one-third -->';
				}

				if ( get_theme_mod('service-icon-2') || get_theme_mod('service-title-2') || get_theme_mod('service-description-2') )  {
					$output .= '<div class="one-third column" class="service">';
					$output .= '<div class="service-title"><p><i class="' . esc_attr( get_theme_mod('service-icon-2') ) . '"></i></p>';
					$output .= '<h3>' . esc_html(  get_theme_mod('service-title-2') ) . '</h3></div>';
					$output .= '<div class="service">' .  get_theme_mod('service-description-2') . '</div>';
					$output .= '</div><!-- .one-third -->';
				} else {
					$output .= '<div class="one-third column" class="service">';
					$output .= '<div class="service-title"><p><i class="fa fa-magic"></i></p>';
					$output .= '</div>';
					$output .= '<div class="service">';
					$output .= sprintf( __('<h3>Featured Page</h3><p>Featured page description text : use the page excerpt or set your own custom text. Click  <a href="%1$s"target="_blank"> Customizer </a> and Goto Home => Sercice Section -2.</p>', 'boxy' ), admin_url('customize.php') );
					$output .= '</div></div><!-- .one-third -->';
				}

				if ( get_theme_mod('service-icon-3') || get_theme_mod('service-title-3') || get_theme_mod('service-description-3') )  {
					$output .= '<div class="one-third column" class="service">';
					$output .= '<div class="service-title"><p><i class="' . esc_attr( get_theme_mod('service-icon-3') ) . '"></i></p>';
					$output .= '<h3>' . esc_html(  get_theme_mod('service-title-3') ) . '</h3></div>';
					$output .= '<div class="service">' .  get_theme_mod('service-description-3') . '</div>';
					$output .= '</div><!-- .one-third -->';
				} else {
					$output .= '<div class="one-third column" class="service">';
					$output .= '<div class="service-title"><p><i class="fa fa-magic"></i></p>';
					$output .= '</div>';
					$output .= '<div class="service">';
					$output .= sprintf( __('<h3>Featured Page</h3><p>Featured page description text : use the page excerpt or set your own custom text. Click  <a href="%1$s"target="_blank"> Customizer </a> and Goto Home => Sercice Section -3.</p>', 'boxy' ), admin_url('customize.php') );
					$output .= '</div></div><!-- .one-third -->';
				}
				$output .= '</div><!-- .container -->';
				$output .= '</div><!-- .services -->';

				echo $output;
			}

     do_action('boxy_service_content_after'); ?>

		<div id="content" class="site-content container free">  
				<div id="primary" class="content-area <?php boxy_home_sidebar_class(); ?>">
					<main id="main" class="site-main" role="main"><?php 
					do_action('boxy_recent_post_before');
					if( get_theme_mod('enable_recent_post_service',true)  ) { 
					    boxy_recent_posts(); 
					}
					do_action('boxy_recent_post_after');

	            if( get_theme_mod('enable_client',true ) ) {
					$output = '';
			      	$output .= '<div class="sixteen columns">';
					$output .= '<div class="flex-container clients">';
					$output .= '<ul class="slides">'; 
   
					if ( boxy_client_exists() ) {                 
						for( $slide_count = 1 ;  $slide_count < 7; $slide_count++ ) {   	
							if ( get_theme_mod( 'client_image-' . $slide_count ) ) {
								$output .= '<li>';	
								$slide_image = get_theme_mod( 'client_image-' . $slide_count );
								$output .= '<div class="flex-image"><img src="' . esc_url( $slide_image ) . '" alt="" ></div>';
								$output .= '</li>';
							}
						}    		
					}else {         
						$output .= '<li>';   
						$slide_image = BOXY_PARENT_URL .'/images/logo.png';
						$output .= '<div class="flex-image"><img src="' . esc_url( $slide_image ) . '" alt="" ></div>';
						$output .= '</li>';
					}

					$output .= '</ul>';
					$output .= '</div><!-- .flex-container -->';
					$output .= '</div><!-- .sixteen columns -->'; 
					$output .= '<br class="clear"/>';
					$output .= '<div class="gap"></div>';
					echo $output; 
				} 
				if( get_theme_mod('enable_home_default_content',false ) ) {  ?>
					<div class="container default-home-page"><?php
						while ( have_posts() ) : the_post();       
							the_content();
						endwhile; ?>
			         </div><?php
                } ?>

				</main><!-- #main -->
			</div><!-- #primary --><?php
}

if( get_theme_mod('home_sidebar',false) ) {
  get_sidebar();
}
 get_footer();
}
?>

	 
