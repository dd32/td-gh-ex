<!-- footer
        ================================================== -->
<footer class="footer">
    <div class="footer_bottom section-padding text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <?php
                    if (get_theme_mod('footer_logo')) {
                        printf('<a href="%1$s" class="footer_logo"><img src="%2$s" alt="%3$s"></a>', esc_url(home_url('/')), esc_url(wp_get_attachment_image_url(get_theme_mod('footer_logo'), 'full')), get_bloginfo('name', 'display'));
                    }
                    ?>

                    <div class="box_scoial_icon">
                        <?php if (is_active_sidebar('footer-widget')) : ?>
                            <ul id="footer-sidebar">
                                <?php dynamic_sidebar('footer-widget'); ?>
                            </ul>
                        <?php endif; ?>
                    </div>

                    <div class="to_top">
                        <a href="#header"></a>
                        <div class="icon-circle"></div>
                        <div id="to-top">
                            <i class="fas fa-angle-up"></i>
                        </div>
                    </div>

                    <div class="disclaimer">
                        <?php
                        if (get_theme_mod('aari_footer_copyright')):
                            echo get_theme_mod('aari_footer_copyright');
                        else:
                            printf(
                                    __('<p>&copy; %1$s %2$s. All Rights Reserved - Powered by <a href="%3$s">WordPress</a></p>','aari'), date('Y'), get_bloginfo('name', 'display'), esc_url('https://wordpress.org/')
                            );
                        endif;
                        ?>
                    </div>


                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End footer
================================================== -->

</main>
<!-- End Main Content
================================================== -->

<?php wp_footer(); ?>
</body>
</html>