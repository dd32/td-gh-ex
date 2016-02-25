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
<style>
.upgradepro {
background: #7ab849 none repeat scroll 0 0;
border-radius: 5px;
color: #ffffff;
display: inline-block;
font-weight: bold;
margin: 10px 10px 10px 0;
padding: 10px 20px;
text-decoration: none;
text-shadow: 0 1px 1px #0f3760;
text-transform: uppercase;	
}
.livepreviw {
background: #427eba none repeat scroll 0 0;
border-radius: 5px;
color: #ffffff;
display: inline-block;
margin: 10px 10px 10px 0;
padding: 10px 20px;
text-decoration: none;
text-transform: uppercase;	
font-weight: bold;
text-shadow: 0 1px 1px #0f3760;	
}
.upgradepro:hover, .livepreviw:hover, .upgradepro:focus, .livepreviw:focus{
opacity:0.85;
color: #ffffff;
dorder:none;
}
</style>
<div class="wrapper-info">
	<div class="aedifcator-box" style="margin: 0 100px 0 0;">
   		<div style="border-bottom: 1px solid #ccc; font-size: 21px; font-weight: bold; padding: 40px 0 20px;">
			<?php esc_attr_e('About Avvocato Theme', 'avvocato'); ?>
		</div>
		<p><?php esc_attr_e('Avvocato is an awesome theme with fully responsive and compatible with newest version of WordPress, is easy to customizable, SEO Optimizable, Fast loading and an awesome panel options. Avvocato Theme is perfect for a construction business, but also for various other business or personal blog, The customization of this theme is very easy.','avvocato'); ?></p>
		<div class="proversion">
			<h3><?php esc_attr_e('Upgrade to Pro version!', 'avvocato'); ?></h3>
				<a class="upgradepro" target="_blank" href="<?php echo esc_url('http://www.pwtthemes.com/theme/avvocato-responsive-wordpress-theme'); ?>" target="_blank"><?php esc_attr_e('UPGRADE TO PRO', 'avvocato'); ?></a>
				<a class="livepreviw" target="_blank" href="<?php echo esc_url('http://www.pwtthemes.com/demo/avvocato'); ?>" target="_blank"><?php esc_attr_e('LIVE PREVIEW', 'avvocato'); ?></a>
			<p><?php esc_attr_e('If you need assistance, please do not hesitate to', 'avvocato'); ?> <a target="_blank" href="<?php echo esc_url('http://www.pwtthemes.com/contact'); ?>"><?php esc_attr_e('contact us', 'avvocato'); ?></a></p>
	        <h3><?php esc_attr_e('FREE vs PRO', 'avvocato'); ?></h3>

    	</div>		   
		<a href="<?php echo esc_url('http://www.pwtthemes.com/theme/avvocato-responsive-wordpress-theme'); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/demo/freevspro.jpg" alt="" /></a>
	</div>
</div>
<?php } ?>