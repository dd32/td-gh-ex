<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Artwork
 * @since Artwork 1.0
 */

?>

<?php if (get_page_template_slug() != 'template-landing-page.php' || is_search()): ?>
    <?php
    $mp_artwork_location = esc_html(get_theme_mod(mp_artwork_get_prefix() . 'location_info'));
    $mp_artwork_hours = esc_html(get_theme_mod(mp_artwork_get_prefix() . 'hours_info'));
    $mp_artwork_location_label = esc_html(get_theme_mod(mp_artwork_get_prefix() . 'location_info_label'));
    $mp_artwork_hours_label = esc_html(get_theme_mod(mp_artwork_get_prefix() . 'hours_info_label'));
    $mp_artwork_facbook_link = esc_url(get_theme_mod(mp_artwork_get_prefix() . 'facebook_link'));
    $mp_artwork_twitter_link = esc_url(get_theme_mod(mp_artwork_get_prefix() . 'twitter_link'));
    $mp_artwork_linkedin_link = esc_url(get_theme_mod(mp_artwork_get_prefix() . 'linkedin_link'));
    $mp_artwork_google_plus_link = esc_url(get_theme_mod(mp_artwork_get_prefix() . 'google_plus_link'));
    $mp_artwork_rss_link = esc_url(get_theme_mod(mp_artwork_get_prefix() . 'rss_link'));
    $mp_artwork_copyright = wp_kses_data(get_theme_mod(mp_artwork_get_prefix() . 'copyright'));
    ?>
    <footer id="footer" class="site-footer">
        <div class="footer-inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                        <div class="site-logo">
                            <a class="home-link" href="<?php echo esc_url(home_url('/')); ?>"
                               title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                                   <?php if (get_theme_mod(mp_artwork_get_prefix() . 'logo_footer', false) === false) : ?> 
                                    <div class="header-logo "><img src="<?php echo (get_template_directory_uri() . '/images/headers/logo2.png'); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"></div>
                                <?php else: ?>
                                    <?php if (get_theme_mod(mp_artwork_get_prefix() . 'logo_footer')) : ?> 
                                        <div class="header-logo "><img src="<?php echo esc_url(get_theme_mod(mp_artwork_get_prefix() . 'logo_footer')); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"></div>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <div class="site-description">
                                    <h2 class="site-title <?php if (!get_bloginfo('description')) : ?>empty-tagline<?php endif; ?>"><?php bloginfo('name'); ?></h2>
                                    <?php if (get_bloginfo('description')) : ?>
                                        <p class="site-tagline"><?php bloginfo('description'); ?></p>
                                    <?php endif; ?>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <div class="contact-info footer-widget">   
                            <div class="info-list-address">
                                <?php if (get_theme_mod(mp_artwork_get_prefix() . 'location_info_label', false) === false) : ?>
                                    <div class="footer-title"><?php _e('Address', 'artwork-lite'); ?></div>
                                <?php else: ?>
                                    <div class="footer-title"><?php echo $mp_artwork_location_label; ?></div>
                                <?php endif; ?>
                                <?php if (get_theme_mod(mp_artwork_get_prefix() . 'location_info', false) === false) : ?>
                                    <ul class=" info-list">
                                        <li><?php echo MP_ARTWORK_DEFAULT_ADDRESS; ?></li>
                                    </ul>
                                <?php else: ?>
                                    <?php if (!empty($mp_artwork_location)): ?>
                                        <ul class=" info-list">
                                            <li><?php echo $mp_artwork_location; ?></li>
                                        </ul>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                            <br/>
                            <div class="info-list-hours">
                                <?php if (get_theme_mod(mp_artwork_get_prefix() . 'hours_info_label', false) === false) : ?>
                                    <div class="footer-title"><?php _e('Opening hours', 'artwork-lite'); ?></div>
                                <?php else: ?>
                                    <div class="footer-title"><?php echo $mp_artwork_hours_label; ?></div>
                                <?php endif; ?>
                                <?php if (get_theme_mod(mp_artwork_get_prefix() . 'hours_info', false) === false) : ?>
                                    <ul class="info-list">
                                        <li><?php echo MP_ARTWORK_DEFAULT_OPEN_HOURS; ?></li>
                                    </ul>
                                <?php else: ?>
                                    <?php if (!empty($mp_artwork_hours)): ?>
                                        <ul class="info-list">
                                            <li><?php echo $mp_artwork_hours; ?></li>
                                        </ul>
                                    <?php endif; ?>
                                <?php endif; ?>


                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="footer-widget">
                            <div class="footer-title"><?php _e('Follow us', 'artwork-lite'); ?></div>
                            <div class="social-profile">
                                <?php if (get_theme_mod(mp_artwork_get_prefix() . 'facebook_link', false) === false) : ?> 
                                    <a href="#" class="button-facebook" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                <?php else: ?>
                                    <?php if (!empty($mp_artwork_facbook_link)): ?> 
                                        <a href="<?php echo $mp_artwork_facbook_link; ?>" class="button-facebook" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if (get_theme_mod(mp_artwork_get_prefix() . 'twitter_link', false) === false) : ?> 
                                    <a href="#" class="button-twitter" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                <?php else: ?>
                                    <?php if (!empty($mp_artwork_twitter_link)): ?>
                                        <a href="<?php echo $mp_artwork_twitter_link; ?>" class="button-twitter" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if (get_theme_mod(mp_artwork_get_prefix() . 'linkedin_link', false) === false) : ?> 
                                    <a href="#" class="button-linkedin" title="LinkedIn" target="_blank"><i class="fa fa-linkedin"></i></a>
                                <?php else: ?>      
                                    <?php if (!empty($mp_artwork_linkedin_link)): ?>
                                        <a href="<?php echo $mp_artwork_linkedin_link; ?>" class="button-linkedin" title="LinkedIn" target="_blank"><i class="fa fa-linkedin"></i></a>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if (get_theme_mod(mp_artwork_get_prefix() . 'google_plus_link', false) === false) : ?> 
                                    <a href="#" class="button-google" title="Google +" target="_blank"><i class="fa fa-google-plus"></i></a>
                                <?php else: ?>
                                    <?php if (!empty($mp_artwork_google_plus_link)): ?>
                                        <a href="<?php echo $mp_artwork_google_plus_link; ?>" class="button-google" title="Google +" target="_blank"><i class="fa fa-google-plus"></i></a>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if (get_theme_mod(mp_artwork_get_prefix() . 'rss_link', false) === false) : ?> 
                                    <a href="#" class="button-rss" title="rss" target="_blank"><i class="fa fa-rss"></i></a>
                                <?php else: ?>
                                    <?php if (!empty($mp_artwork_rss_link)): ?>
                                        <a href="<?php echo $mp_artwork_rss_link; ?>" class="button-rss" title="rss" target="_blank"><i class="fa fa-rss"></i></a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <p><span class="copyright-date"><?php _e('&copy; Copyright', 'artwork-lite'); ?> <?php
                            $mp_artwork_dateObj = new DateTime;
                            $mp_artwork_year = $mp_artwork_dateObj->format("Y");
                            echo $mp_artwork_year;
                            ?> 
                        </span>
                        <?php
                        ?>
                          <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>" target="_blank"><?php bloginfo('name'); ?></a>
                          <?php printf(__('&#8226; Designed by', 'artwork-lite')); ?> <a href="<?php echo esc_url(__('http://www.getmotopress.com/', 'artwork-lite' )); ?>" rel="nofollow" title="<?php esc_attr_e('Premium WordPress Plugins and Themes', 'artwork-lite' ); ?>"><?php _e('MotoPress', 'artwork-lite'); ?></a>
                          <?php printf(__('&#8226; Proudly Powered by ',  'artwork-lite')); ?><a href="<?php echo esc_url(__('http://wordpress.org/', 'artwork-lite')); ?>"  rel="nofollow" title="<?php esc_attr_e('Semantic Personal Publishing Platform', 'artwork-lite' ); ?>"><?php _e('WordPress',  'artwork-lite' ); ?></a>
                          <?php
                        ?>
                    </p><!-- .copyright -->
                </div>
            </div>
        </div>
    </footer>
<?php endif; ?>
</div>
<?php wp_footer(); ?>
</body>
</html>