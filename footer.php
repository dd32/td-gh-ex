<!-- Footer Widget Secton -->
<?php if (get_theme_mod('footer_widgets', 1) == 1) { ?>
    <div class="enigma_footer_widget_area">
        <div class="container">
            <div class="row">
                <?php
                if (is_active_sidebar('footer-widget-area')) {
                    dynamic_sidebar('footer-widget-area');
                }
                ?>
            </div>
        </div>
    </div>
<?php } ?>
<div class="enigma_footer_area">
    <div class="container">
        <div class="col-md-12">
            <p class="enigma_footer_copyright_info wl_rtl">
                <?php if (!empty (get_theme_mod('footer_customizations', '@ '))) {
                    esc_html_e(get_theme_mod('footer_customizations', '@ '), 'enigma');
                }
                if (!empty (get_theme_mod('developed_by_text', 'Powered By'))) {
                    esc_html_e(get_theme_mod('developed_by_text', 'Powered By'), 'enigma');
                }
                ?>
                <a target="_blank" rel="nofollow" href="<?php if (!empty (get_theme_mod('developed_by_link', '#'))) {
                    echo esc_url(get_theme_mod('developed_by_link', 'https://wordpress.org/'));
                } ?>"><?php if (!empty (get_theme_mod('developed_by_weblizar_text', 'WordPress'))) {
                        esc_html_e(get_theme_mod('developed_by_weblizar_text', 'WordPress'), 'enigma');
                    } ?></a>
            </p>
            <?php if (get_theme_mod('footer_section_social_media_enbled', 1) == 1) { ?>
                <div class="enigma_footer_social_div">
                    <ul class="social">
                        <?php if (!empty (get_theme_mod('fb_link', '#'))) { ?>
                            <li class="facebook" data-toggle="tooltip" data-placement="bottom" title="Facebook"><a
                                        href="<?php echo esc_url(get_theme_mod('fb_link', '#')); ?>"><i
                                            class="fab fa-facebook-f"></i></a></li>
                        <?php }
                        if (!empty (get_theme_mod('twitter_link', '#'))) { ?>
                            <li class="twitter" data-toggle="tooltip" data-placement="bottom" title="Twitter"><a
                                        href="<?php echo esc_url(get_theme_mod('twitter_link', '#')); ?>"><i
                                            class="fab fa-twitter"></i></a></li>
                        <?php }
                        if (!empty (get_theme_mod('linkedin_link', '#'))) { ?>
                            <li class="linkedin" data-toggle="tooltip" data-placement="bottom" title="Linkedin"><a
                                        href="<?php echo esc_url(get_theme_mod('linkedin_link', '#')); ?>"><i
                                            class="fab fa-linkedin-in"></i></a></li>
                        <?php }
                        if (!empty (get_theme_mod('youtube_link', '#'))) { ?>
                            <li class="youtube" data-toggle="tooltip" data-placement="bottom" title="Youtube"><a
                                        href="<?php echo esc_url(get_theme_mod('youtube_link', '#')); ?>"><i
                                            class="fab fa-youtube"></i></a></li>
                        <?php }
                        if (!empty (get_theme_mod('instagram', '#'))) { ?>
                            <li class="facebook" data-toggle="tooltip" data-placement="bottom" title="instagram"><a
                                        href="<?php echo esc_url(get_theme_mod('instagram', '#')); ?>"><i
                                            class="fab fa-instagram"></i></a></li>
                        <?php }
                        if (!empty (get_theme_mod('vk_link', '#'))) { ?>
                            <li class="facebook" data-toggle="tooltip" data-placement="bottom" title="vk"><a
                                        href="<?php echo esc_url(get_theme_mod('vk_link', '#')); ?>"><i
                                            class="fab fa-vk"></i></a></li>
                        <?php }
                        if (!empty (get_theme_mod('qq_link', '#'))) { ?>
                            <li class="facebook" data-toggle="tooltip" data-placement="bottom" title="qq"><a
                                        href="<?php echo esc_url(get_theme_mod('qq_link', '#')); ?>"><i
                                            class="fab fa-qq"></i></a></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- /Footer Widget Secton--> <a id="btn-to-top"></a>
</div>
<?php wp_footer(); ?>
</body>
</html>