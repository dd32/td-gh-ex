<?php 

function agensy_footer_section_page(){

	if( is_active_sidebar('footer-widget-area-one') || is_active_sidebar('footer-widget-area-two') || is_active_sidebar('footer-widget-area-three') || is_active_sidebar('footer-widget-area-four') ){
		?>
		<section id = "agensy-section-footer-wrap" class="agensy-section-footer-wrap-main clearfix">
			<?php if(is_active_sidebar('footer-widget-area-one')){ ?>
	            <div class="team-members-contents  clearfix">
	                <?php
	                    dynamic_sidebar('footer-widget-area-one');
	                ?>
	            </div>
   			 <?php } ?>
   			 <?php if(is_active_sidebar('footer-widget-area-two')){ ?>
	            <div class="team-members-contents  clearfix">
	                <?php
	                    dynamic_sidebar('footer-widget-area-two');
	                ?>
	            </div>
   			 <?php } ?>
   			 <?php if(is_active_sidebar('footer-widget-area-three')){ ?>
	            <div class="team-members-contents  clearfix">
	                <?php
	                    dynamic_sidebar('footer-widget-area-three');
	                ?>
	            </div>
   			 <?php } ?>
   			 <?php if(is_active_sidebar('footer-widget-area-four')){ ?>
	            <div class="team-members-contents  clearfix">
	                <?php
	                    dynamic_sidebar('footer-widget-area-four');
	                ?>
	            </div>
   			 <?php } ?>
		</section>
	<?php 
	}
}

add_action('agensy_footer_section_page_roles','agensy_footer_section_page');

function agensy_footer_nav_menu()
{?>	
	<div class = "agensy-footer-nav-menu">
		<?php 
			wp_nav_menu( array(
				'theme_location' => 'agensy-footer-menu',
				'menu_id'        => 'footer-menu',
			));
		?>
	</div>
	<?php 
}
add_action('agensy_footer_nav_menu_role','agensy_footer_nav_menu');

// Social Icons

if( ! function_exists('agensy_footer_social_icons')){

  function agensy_footer_social_icons(){
        $agensy_footer_icon_enable = esc_attr( get_theme_mod('agensy_footer_icon_enable','on') );
        if( $agensy_footer_icon_enable == 'on' ){
        	?>
        	<div class = "agensy-social-icons">
        		<?php agensy_social_icons(); ?>
        	</div>
        	<?php 
        }
    }
} 
add_action( 'agensy_after_footer', 'agensy_footer_social_icons');

function agensy_footer_copyright_fn()
{
	$agensy_footer_copyright = get_theme_mod('agensy_footer_copyright');
	$agensy_footer_image_control = get_theme_mod('agensy_footer_image_control');
	?>
	<div class = "agensy-footer-wrap ">
		<div class="agensy-container clearfix">
		<div class = "agensy-footer-copyright">
			
			<?php
			  if( !empty($agensy_footer_copyright)){
                        echo wp_kses_post($agensy_footer_copyright) . " | "; 
	            } ?>
	            WordPress Theme : <a href="https://accesspressthemes.com/" target="_blank">Agensy</a> 
		</div>
		<div class = "agensy-footer-image-control"> 
		<img src="<?php echo esc_url($agensy_footer_image_control); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
		</div>
	</div>
	</div>
	<?php 

}
add_action('agensy_footer_copyright_roles','agensy_footer_copyright_fn');


                   