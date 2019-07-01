<?php global $axiohost; ?>
<!--End Hosting Solution Area -->
    <footer class="footer-area bg-color1">
        <div class="container ">
            <?php 
                if(is_active_sidebar('footer1') || is_active_sidebar('footer2') || is_active_sidebar('footer3') || is_active_sidebar('footer4')){?>
                    <div class="footer-wrapper">
                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <?php dynamic_sidebar('footer1'); ?>   
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <?php dynamic_sidebar('footer2'); ?>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <?php dynamic_sidebar('footer3'); ?>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <?php dynamic_sidebar('footer4'); ?>
                            </div>  
                        </div>
                    </div>
                <?php
                }
            ?>
            <div class="footer-copyright">
                <div class="row">
                    <div class="col-md-6">
                        <div class="footer-copyright-text">
                            <?php esc_html_e('© Copyright 2019 axiohost - Designed by ', 'axiohost'); ?>
                            <a href="<?php echo esc_url('https//themeix.com'); ?>"><?php  esc_html_e('Themeix', 'axiohost');?></a>
                             
                        </div>
                    </div>
                    <div class="col-md-6">
                        <?php dynamic_sidebar('footer-menu'); ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <?php 
        if($axiohost['scroll-back-to-top'] == 1){
            echo '<a id="scrollUp" href="#top" title="Scroll to top"><i class="fa fa-chevron-up"> </i></a>';
        }
    ?>
    <!-- End Footer Area -->
    <?php wp_footer(); ?>

</body>

</html>