
        <!-- FOOTER --> 
        <?php 
            global $bee_news_redux_builder; 
        ?>        
        <div class="cleafix"></div>         
        <footer class="footer"> 
            <div> 
                <div class="container"> 
                <?php  if ( class_exists( 'Redux' ) ) : ?>
                        <div class="col-md-3 col-xs-12">
                        <?php if($bee_news_redux_builder['upload-logo']['url']!=''){ ?>
                            <a href="" class="logo">
                        <img src="<?php global $bee_news_redux_builder; echo $bee_news_redux_builder['upload-logo']['url'];?>" class="img-responsive">
                            </a>
                       <?php }else{ ?>
                        <h1 class="text-sm-center text-md-left">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <?php bloginfo( 'name' ); ?>
                            </a>
                        </h1>
                        <?php } ?>
                                              
                        <ul class="list-unstyled"> 
                            <li>
                            <?php  if ( class_exists( 'Redux' ) ) : ?>
                                    <a href=""><i class="glyphicon glyphicon-map-marker"></i><?php global $bee_news_redux_builder; echo $bee_news_redux_builder['footer-address'];?></a>
                                <?php else : ?>
                                    <a href=""><i class="glyphicon glyphicon-map-marker"></i><?php _e( 'Melbourne, Australia', 'bee-news' ); ?></a>
                            <?php endif; ?>
                            </li>                             
                            <li>
                            <?php  if ( class_exists( 'Redux' ) ) : ?>
                                <a href=""><i class="glyphicon glyphicon-earphone"></i><?php global $bee_news_redux_builder; echo $bee_news_redux_builder['footer-phone'];?></a>
                                <?php else : ?>
                                <a href=""><i class="glyphicon glyphicon-earphone"></i><?php _e( '+61 491 570 156', 'bee-news' ); ?></a>
                            <?php endif; ?>
                            </li>                             
                            <li>
                            <?php  if ( class_exists( 'Redux' ) ) : ?>
                                <a href=""><i class="glyphicon glyphicon-envelope"></i><?php global $bee_news_redux_builder; echo $bee_news_redux_builder['footer-email'];?></a>
                            <?php else : ?>
                                <a href=""><i class="glyphicon glyphicon-envelope"></i><?php _e( 'beenews@xyz.com', 'bee-news' ); ?></a>
                            <?php endif; ?>
                            </li>                             
                        </ul>                         

                        </div>
                    
                   
                        <div class="col-md-4 col-xs-12">
                           <h5><?php _e( 'About', 'bee-news' ); ?></h5> 
                           <?php  if ( class_exists( 'Redux' ) ) : ?>
                        <p><?php global $bee_news_redux_builder; echo $bee_news_redux_builder['footer-about'];?></p> 
                        <?php else : ?>
                        <p><?php _e( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas reprehenderit quia, vero amet laborum. Omnis reiciendis, vel animi minus, soluta doloribus quae, eligendi at harum recusandae quos. Ex impedit, asperiores!', 'bee-news' ); ?></p> 
                        <?php endif; ?>
                        </div>
                    
                    
                        <div class="col-md-5">
                            <h5><?php _e( 'Quick Links', 'bee-news' ); ?></h5> 
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
                       <?php endif; ?>
                    
                    <div class="col-md-12 text-right footer-bottom"> 
                    <?php if(class_exists( 'Redux' )): ?>
                        <?php if($bee_news_redux_builder['footer-switch']==1): ?>
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
                        <?php endif; ?>    
                       <?php else: ?>  
                       <small class=""><?php _e( 'Copyright Bee News 2018 | All Rights Reserve', 'bee-news' ); ?>
                        </small> 
                       <?php endif; ?>
                    </div>                     
                </div>                 
            </div>             
        </footer>         
        <a href="" id="btnTop" class="scrollup"><i class="glyphicon glyphicon-circle-arrow-up"></i></a>                   
   
   
        <?php wp_footer(); ?>
    </body>     
</html>