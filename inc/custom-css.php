<?php
function a_portfolio_color_css(){
?>
<style type="text/css">
<?php if(get_theme_mod( 'google_fontfamily_setting' )):?>
body,h1,h2,h3,h4,h5,h6{
	font-family: <?php echo esc_attr( get_theme_mod('google_fontfamily_setting') );?>;
}
<?php endif;?>
</style>
<?php }
add_action('wp_head','a_portfolio_color_css');
?>