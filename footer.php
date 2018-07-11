<?php
/**
 * The Footer template.
 */
$multishop_options = get_option('multishop_theme_options');
 ?>
<div class="clearfix"></div>
<footer>
	 <?php if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')) { ?>
    <div class="container multishop-container multishop-footer">
        <div class="row">
            <div class="col-md-3 col-sm-6 footer-box">
                <?php if (is_active_sidebar('footer-1')) {
                    dynamic_sidebar('footer-1');
                } ?>
            </div>
            <div class="col-md-3 col-sm-6 footer-box">
                <?php if (is_active_sidebar('footer-2')) {
                    dynamic_sidebar('footer-2');
                } ?>
            </div>
            <div class="col-md-3 col-sm-6 footer-box">
				<?php if (is_active_sidebar('footer-3')) {
					dynamic_sidebar('footer-3');
				} ?>
            </div>
            <div class="col-md-3 col-sm-6 footer-box">
                <?php if (is_active_sidebar('footer-4')) {
                    dynamic_sidebar('footer-4');
                } ?>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="footer-bottom">
        <div class="container multishop-container">
            <div class="col-md-6 foot-copy-right no-padding-lr">
             <?php echo wp_kses_post(get_theme_mod ( 'footertext',(!empty($multishop_options['footertext'])) ? $multishop_options['footertext']:''));?>
            <?php printf(/* translators: 1 is link for theme.*/esc_html__('Powered by %1$s', 'multishop'), '<a href="'.esc_url("http://fasterthemes.com/wordpress-themes/multishop").'" target="_blank">Multishop WordPress Theme</a>'); ?>
            </div>
            <div class="col-md-6  no-padding-lr social-icon">
                <?php $TopHeaderSocialIconDefault = array(array('url'=>$multishop_options['fburl'],'icon'=>'fa-facebook-square'),array('url'=>$multishop_options['twitter'],'icon'=>'fa-twitter-square'),array('url'=>$multishop_options['googleplus'],'icon'=>'fa-google-plus-square'));?>
                <ul>                    
                    <?php for($i=1; $i<=3; $i++) : 
                        if(get_theme_mod('TopHeaderSocialIconLink'.$i,$TopHeaderSocialIconDefault[$i-1]['url'])!= '' && get_theme_mod('TopHeaderSocialIcon'.$i,$TopHeaderSocialIconDefault[$i-1]['icon'])!= ''){     ?>
                           <li><a href="<?php echo esc_url(get_theme_mod('TopHeaderSocialIconLink'.$i,$TopHeaderSocialIconDefault[$i-1]['url'])); ?>" class="icon" title="" target="_blank">
                                <i class="fa <?php echo esc_attr(get_theme_mod('TopHeaderSocialIcon'.$i,$TopHeaderSocialIconDefault[$i-1]['icon'])); ?>"></i>
                            </a></li>
                    <?php } endfor; ?>
                </ul>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body></html>