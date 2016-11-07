<?php
/**
 * The footer for our theme
 *
 * @package astrology
 */
?>
<footer id="main-footer">
    <div class="container">
        <div class="row">
            <?php if( is_active_sidebar( 'footer-1' )) : ?>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="blog-sidebar blog-padd">
                    <?php dynamic_sidebar('footer-1'); ?>
                </div>
            </div>
            <?php endif; ?>
            <?php if( is_active_sidebar( 'footer-2' )) : ?>
             <div class="col-xs-12 col-sm-12 col-md-4">
                 <div class="blog-sidebar blog-padd">
                    <?php dynamic_sidebar('footer-2'); ?>
                </div>
            </div>
            <?php endif; ?>
            <?php if( is_active_sidebar( 'footer-3' )) : ?>
            <div class="col-xs-12 col-sm-12 col-md-4">
                 <div class="blog-sidebar blog-padd">
                    <?php dynamic_sidebar('footer-3'); ?>
                 </div>
            </div>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="footer-menu">
                <ul>
                <?php
                    if (has_nav_menu('footer')) {
                        $astrologyDefaults = array(
                            'theme_location' => 'footer',
                            'container'      => 'none',
                            'menu_class'    => false,
                        );
                        wp_nav_menu($astrologyDefaults);                                        
                    }   ?> 
            </div>
        </div>
    <!-- Row End -->
    <div class="row">
        <div class="footer-socail-icon">
            <ul>
                <?php for($i=1; $i<=5; $i++) : 
						if(get_theme_mod('socialIcon'. $i) != '' && get_theme_mod('socialLink'. $i) != '') : ?>
                        <li> 
                            <a href="<?php echo esc_url(get_theme_mod('socialLink'.$i)) ?>">
                                <span class="fa <?php echo esc_attr(get_theme_mod('socialIcon'.$i)) ?>"></span>
                            </a>
                        </li>
                <?php endif; ?>
                <?php endfor; ?>
            </ul>
        </div>
    </div>
    <!-- Row End -->
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <div class="footer-copyrights">
                <p><?php _e('Powered by','astrology'); ?> <a href="<?php echo esc_url('https://vaultthemes.com/astrology-wordpress-theme/'); ?>" target="_blank">Astrology WordPress Theme</a></p>
            </div>
        </div>
    </div>
</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>