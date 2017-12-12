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

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="container-fluid">
        <!-- end col-12 -->
        <div class="row">
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
                <section class="wrapper block-section footer-widget">
                    <div class="container overhidden">
                        <div class="contact-inner">
                            <div class="row">
                                <div class="col-md-12">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php } ?>

            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="site-info">
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

                                    <span aria-hidden="true" class="stretchy-nav-bg secondary-bgcolor"></span>
                                </div>
                            </div>

                            <div class="site-copyright">
                                <?php
                                $best_education_copyright_text = best_education_get_option('copyright_text');
                                if (!empty ($best_education_copyright_text)) {
                                    echo wp_kses_post($best_education_copyright_text);
                                }
                                ?>
                                <br>
                                <?php printf(esc_html__('Theme: %1$s by %2$s', 'best-education'), 'Magazine Base', '<a href="https://thememattic.com" target = "_blank" rel="designer">Themematic </a>'); ?>
                            </div>
                        </div>
                    </div>
                </div><!-- .site-info -->
            </div>
        </div>
        <!-- end col-12 -->
    </div>
    <!-- end container -->
</footer>
</div><!-- #page -->
<a id="scroll-up" class="tertiary-bgcolor"><i class="ion-ios-arrow-up"></i></a>
<?php wp_footer(); ?>

</body>
</html>