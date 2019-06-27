 <?php global $axiohost; ?>
<!--End Hosting Solution Area -->
    <footer class="footer-area bg-color1">
        <div class="container ">
            <?php 
                if(is_active_sidebar('footer1') || is_active_sidebar('footer2') || is_active_sidebar('footer3') || is_active_sidebar('footer4')){?>
                    <div class="footer-wrapper">
                        <div class="row">
        				        <?php $layout = $axiohost['widget-layout']; ?>

                                <div class="col-md-6 col-lg-<?php if($layout == '1'){echo '4'; }else if($layout == '2'){echo '3';}else if($layout == '3'){echo '4'; }else if($layout == '4'){echo '3'; }else if($layout == '5'){echo '6'; }else if($layout == '6'){echo '4'; }else{echo '4';} ?>">
                                    <?php dynamic_sidebar('footer1'); ?>
                                    
                                </div>
                                <div class="col-md-6 col-lg-<?php if($layout == '1'){echo '4'; }else if($layout == '2'){echo '3';}else if($layout == '3'){echo '2'; }else if($layout == '4'){echo '3'; }else if($layout == '5'){echo '6'; }else if($layout == '6'){echo '2'; }else{echo '2';} ?>">
                                        <?php dynamic_sidebar('footer2'); ?>
                                </div>
                                <div class="col-md-6 col-lg-<?php if($layout == '1'){echo '4'; }else if($layout == '2'){echo '3';}else if($layout == '3'){echo '3'; }else if($layout == '4'){echo '2'; }else if($layout == '5'){echo '6'; }else if($layout == '6'){echo '4'; }else{echo '3';} ?>">
                                        <?php dynamic_sidebar('footer3'); ?>
                                </div>
                                <?php 
                                    if($layout == '1'){
                                        echo '';
                                    }
                                    else{?>
                                        <div class="col-md-6 col-lg-<?php if($layout == '1'){echo '4'; }else if($layout == '2'){echo '3';}else if($layout == '3'){echo '3'; }else if($layout == '4'){echo '4'; }else if($layout == '5'){echo '6'; }else if($layout == '6'){echo '2'; }else{echo '3';} ?>">
                                            <?php dynamic_sidebar('footer4'); ?>
                                        </div>        
                                    <?php
                                    }
                                ?>
        
                        </div>
                    </div>
                <?php
                }
            ?>
            <div class="footer-copyright">
                <div class="row">
                    <div class="col-md-6">
                        <div class="footer-copyright-text">
                            <?php 
                                if(class_exists('ReduxFrameworkPlugin')){
                                    echo wp_kses_post($axiohost['copyright_text']);       
                                }
                                else{
        							esc_html_e('© Copyright 2019 axiohost - Designed by ', 'axiohost'); ?>
                                        <a href="<?php echo esc_url('https//themeix.com'); ?>"><?php  esc_html_e('Themeix', 'axiohost');?></a>
                                     <?php
                                }
                            ?>
                            
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