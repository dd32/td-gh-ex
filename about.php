<?php
/**
 * Avvocato About Theme
 *
 * @package Avvocato
 */
?>

<?php

// About theme info

add_action( 'admin_menu', 'avvocato_abouttheme' );

function avvocato_abouttheme() {   
 	
	add_theme_page( __('About Theme', 'avvocato'), __('About Theme', 'avvocato'), 'edit_theme_options', 'about-avvocato', 'avvocato_guide');   
	
} 

//guidline for about theme

function avvocato_guide() { 
?>
<div class="wrapper-info">
	<div class="aedifcator-box">
   		<div class="aedifcator-box-title">
            <h1><?php esc_attr_e('About Avvocato Theme', 'avvocato'); ?></h1>
		</div>
		<p><?php esc_attr_e('Avvocato is an awesome theme with fully responsive and compatible with newest version of WordPress, is easy to customizable, SEO Optimizable, Fast loading and an awesome panel options. Avvocato Theme is perfect for a construction business, but also for various other business or personal blog, The customization of this theme is very easy.','avvocato'); ?></p>
		<div class="proversion">
			<h3><?php esc_attr_e('Upgrade to Pro version!', 'avvocato'); ?></h3>
				<a class="upgradepro" target="_blank" href="<?php echo esc_url('https://www.pwtthemes.com/theme/avvocato-responsive-wordpress-theme'); ?>" target="_blank"><?php esc_attr_e('UPGRADE TO PRO', 'avvocato'); ?></a></br>
				<a class="livepreviw" target="_blank" href="<?php echo esc_url('https://www.pwtthemes.com/demo/avvocato'); ?>" target="_blank"><?php esc_attr_e('LIVE PREVIEW', 'avvocato'); ?></a>
			<p><?php esc_attr_e('If you need assistance, please do not hesitate to', 'avvocato'); ?> <a target="_blank" href="<?php echo esc_url('https://www.pwtthemes.com/contact'); ?>"><?php esc_attr_e('contact us', 'avvocato'); ?></a></p>
	        <h3><?php esc_attr_e('FREE vs PRO', 'avvocato'); ?></h3>

    	</div>		   
		<a href="<?php echo esc_url('https://www.pwtthemes.com/theme/avvocato-responsive-wordpress-theme'); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/demo/freevspro.jpg" alt="" /></a>
	</div>
</div>
<?php } ?>