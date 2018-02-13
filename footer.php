<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package best-education
 */

?>
</div>
<!-- #content -->
</div>


<footer id="colophon" class="site-footer">
    <?php $best_education_footer_widgets_number = best_education_get_option('number_of_footer_widget');
    if (1 == $best_education_footer_widgets_number) {
        $col = 'col-md-12';
    } elseif (2 == $best_education_footer_widgets_number) {
        $col = 'col-md-6';
    } elseif (3 == $best_education_footer_widgets_number) {
        $col = 'col-md-4';
    } elseif (4 == $best_education_footer_widgets_number) {
        $col = 'col-md-3';
    } else {
        $col = 'col-md-3';
    }
    if (is_active_sidebar('footer-col-one') || is_active_sidebar('footer-col-two') || is_active_sidebar('footer-col-three') || is_active_sidebar('footer-col-four')) { ?>
    <div class="footer-widget-area">
        <div class="container">
            <div class="row">
                <?php if (is_active_sidebar('footer-col-one') && $best_education_footer_widgets_number > 0) : ?>
                    <div class="contact-list <?php echo esc_attr($col); ?>">
                        <?php dynamic_sidebar('footer-col-one'); ?>
                    </div>
                <?php endif; ?>
                <?php if (is_active_sidebar('footer-col-two') && $best_education_footer_widgets_number > 1) : ?>
                    <div class="contact-list <?php echo esc_attr($col); ?>">
                        <?php dynamic_sidebar('footer-col-two'); ?>
                    </div>
                <?php endif; ?>
                <?php if (is_active_sidebar('footer-col-three') && $best_education_footer_widgets_number > 2) : ?>
                    <div class="contact-list <?php echo esc_attr($col); ?>">
                        <?php dynamic_sidebar('footer-col-three'); ?>
                    </div>
                <?php endif; ?>
                <?php if (is_active_sidebar('footer-col-four') && $best_education_footer_widgets_number > 3) : ?>
                    <div class="contact-list <?php echo esc_attr($col); ?>">
                        <?php dynamic_sidebar('footer-col-four'); ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php } ?>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <div class="tm-social-share">
                        <?php if (best_education_get_option('social_icon_style') == 'circle') {
                            $best_education_social_icon = 'bordered-radius';
                        } else {
                            $best_education_social_icon = '';
                        } ?>
                        <div class="social-icons <?php echo esc_attr($best_education_social_icon); ?>">
                            <?php
                            wp_nav_menu(
                                array('theme_location' => 'social',
                                    'link_before' => '<span class="screen-reader-text">',
                                    'link_after' => '</span>',
                                    'menu_id' => 'social-menu',
                                    'fallback_cb' => false,
                                    'menu_class' => false
                                )); ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xs-12">
                    <span class="footer-divider"></span>
                </div>
                <div class="col-sm-12 col-xs-12">
                    <div class="site-copyright">
                        <div class="row">
                            <div class="col-xs-5">
                                <?php
                                $best_education_copyright_text = best_education_get_option('copyright_text');
                                if (!empty ($best_education_copyright_text)) {
                                    echo wp_kses_post($best_education_copyright_text);
                                }
                                ?>
                            </div>
                            <div class="col-xs-2">
                                <a id="scroll-up">
                                    <i class="fa fa-angle-up"></i>
                                </a>
                            </div>

                            <div class="col-xs-5">
                                <?php printf(esc_html__('Theme: %1$s by %2$s', 'best-education'), 'Best Education', '<a href="https://thememattic.com" target = "_blank" rel="designer">Themematic </a>'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>
</div>
<?php wp_footer(); ?>

</body>
</html>