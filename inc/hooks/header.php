<?php 


/**
* Top Header Function
*/
if( ! function_exists('agensy_top_header') ){
	function agensy_top_header(){
		$agensy_email_header_control = get_theme_mod('agensy_email_header_control');
		$agensy_phone_header_control = get_theme_mod('agensy_phone_header_control');
		?>
		<div class="info-wrapper">
			<div class="agensy-container clearfix">

				<?php 
					if($agensy_email_header_control) {?>
					<div class="email">
						<a href="mailto:<?php echo esc_attr($agensy_email_header_control);?>">
							<i class="fa fa-envelope-o"></i>
							<span><?php echo esc_html($agensy_email_header_control);?></span>
						</a>
					</div>
				<?php } ?>
				<?php
				if($agensy_phone_header_control) {?>
					<div class="phone">
						<a href="tel:<?php echo esc_attr($agensy_phone_header_control);  ?>">
							<i class="fa fa-mobile"></i>
							<span><?php echo esc_html($agensy_phone_header_control); ?></span>
						</a>
					</div>
				<?php } ?>
			<div class = "social-icons">
				<?php /**  Social Icons **/
                    do_action('agensy_after_header'); ?>
			</div>
		</div>
	</div>
	<?php 	
	}
}
add_action( 'agensy_top_header','agensy_top_header' );


// Social Icons
if( ! function_exists('agensy_header_social_icons')){

  function agensy_header_social_icons(){
        $agensy_header_icon_enable = agensy_sanitize_textarea( get_theme_mod('agensy_header_icon_enable','on') );
        if( $agensy_header_icon_enable == 'on' ){
          agensy_social_icons();
        }
    }
} add_action( 'agensy_after_header', 'agensy_header_social_icons');

				
