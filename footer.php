
        <!-- FOOTER -->         
        <div class="cleafix"></div>         
        <footer class="footer"> 
            <div> 
                <div class="container"> 
                    
                        <div class="col-md-3 col-xs-12">
                                                   <a href="" class="logo"> 
                            <img src="<?php global $bee_news_redux_builder; echo $bee_news_redux_builder['upload-logo']['url'];?>" class="img-responsive">
                        </a>                         
                        <ul class="list-unstyled"> 
                            <li>
                                <a href=""><i class="glyphicon glyphicon-map-marker"></i><?php global $bee_news_redux_builder; echo $bee_news_redux_builder['footer-address'];?></a>
                            </li>                             
                            <li>
                                <a href=""><i class="glyphicon glyphicon-earphone"></i><?php global $bee_news_redux_builder; echo $bee_news_redux_builder['footer-phone'];?></a>
                            </li>                             
                            <li>
                                <a href=""><i class="glyphicon glyphicon-envelope"></i><?php global $bee_news_redux_builder; echo $bee_news_redux_builder['footer-email'];?></a>
                            </li>                             
                        </ul>                         

                        </div>
                    
                   
                        <div class="col-md-4 col-xs-12">
                           <h5>About</h5> 
                        <p><?php global $bee_news_redux_builder; echo $bee_news_redux_builder['footer-about'];?></p> 
                        </div>
                    
                    
                        <div class="col-md-5">
                            <h5>Quick Links</h5> 
                            <div class="row"> 
                            <?php if ( is_active_sidebar( 'footer-3-quicklink-1' ) ) : ?>
                              
                                <?php dynamic_sidebar( 'footer-3-quicklink-1' ); ?>
                              
                            <?php endif; ?> 
                            <?php if ( is_active_sidebar( 'footer-3-quicklink-2' ) ) : ?>
                              
                                <?php dynamic_sidebar( 'footer-3-quicklink-2' ); ?>
                              
                            <?php endif; ?> 
                            <?php if ( is_active_sidebar( 'footer-3-quicklink-3' ) ) : ?>
                              
                                <?php dynamic_sidebar( 'footer-3-quicklink-3' ); ?>
                              
                            <?php endif; ?> 
                            </div>                         
                        
                        </div>
                    
                    <div class="col-md-12 text-right footer-bottom"> 
                        <ul class="list-inline pull-left"> 
                            <li>
                                <a href="<?php global $bee_news_redux_builder; echo $bee_news_redux_builder['facebook-url'];?>">
                                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icon/facebook.png" alt="">
                                </a>
                            </li>                             
                            <li>
                                <a href="<?php global $bee_news_redux_builder; echo $bee_news_redux_builder['twitter-url'];?>">
                                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icon/twitter.png" alt="">
                                </a>
                            </li>                             
                            <li>
                                <a href="<?php global $bee_news_redux_builder; echo $bee_news_redux_builder['googleP-url'];?>">
                                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icon/google-plus-1.png" alt="">
                                </a>
                            </li>                             
                            <li>
                                <a href="<?php global $bee_news_redux_builder; echo $bee_news_redux_builder['youtube-url'];?>">
                                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icon/youtube.png" alt="">
                                </a>
                            </li>                             
                        </ul>                         
                        <small class=""><?php global $bee_news_redux_builder; echo $bee_news_redux_builder['footer-setting'];?></small> 
                    </div>                     
                </div>                 
            </div>             
        </footer>         
        <a href="" id="btnTop" class="scrollup"><i class="glyphicon glyphicon-circle-arrow-up"></i></a>                   
   
   
        <?php wp_footer(); ?>
    </body>     
</html>