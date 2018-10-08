<?php 
global $bee_news_redux_builder; 

?>
<!doctype html> 
<html <?php language_attributes(); ?>> 
    <head>          
        <meta charset="<?php bloginfo( 'charset' ); ?>"> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">                   
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php wp_head(); ?>
        <?php 

         ?>
       
    </head>     
    <body class="<?php get_body_class(); ?>"> 
<div class="header-wrap">        <div class="container"> 
            <div class="row header-brand"> 
                <div class="col-md-4"> 
                    <?php  if ( class_exists( 'Redux' ) ) : ?>
                    <?php if($bee_news_redux_builder['upload-logo']['url']!=''){ ?>
                        <a class="logo" href="<?php echo  site_url(); ?>">
                        <img src="<?php global $bee_news_redux_builder; echo $bee_news_redux_builder['upload-logo']['url'];?>" >
                                 </a>
                       <?php }else{ ?>
                        <h1 class="text-sm-center text-md-left">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <?php bloginfo( 'name' ); ?>
                            </a>
                        </h1>
                        <?php } ?>
                        <?php else : ?>
                        <?php if ( has_header_image() ): ?>
                        <img src="<?php echo( get_header_image() ); ?>" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" />
                       <?php else: ?>
                        <h1 class="text-sm-center text-md-left">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <?php bloginfo( 'name' ); ?>
                            </a>
                        </h1>
                       <?php endif; ?>
                       <?php endif; ?>
                        
                                            
                </div>                 
                <div class="col-md-8"> 
                    <div class="row row-advertisement"> 
                        <div class="col-md-12"> 
                         <a href="<?php global $bee_news_redux_builder; echo $bee_news_redux_builder['header-ads-Link'];?>" class="advertisement"> 
                            <img src="<?php global $bee_news_redux_builder; echo $bee_news_redux_builder['header-ads']['url'];?>">
                        </a>                         
                        </div>                         
                    </div>                     
                </div>                 
            </div>             
        </div></div>
        <nav class="navbar navbar-maitri navbar-static-top" data-spy="affix" data-offset-top="90"> 
            <div class="container"> 
                <!-- Brand and toggle get grouped for better mobile display -->                 
                <div class="navbar-header"> 
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mobile-collapse" aria-expanded="false"> 
                        <span class="sr-only"><?php _e( 'Toggle navigation', 'bee-news' ); ?></span> 
                        <span class="icon-bar"></span> 
                        <span class="icon-bar"></span> 
                        <span class="icon-bar"></span> 
                    </button>                     
                                         
                </div>                 
                <!-- Collect the nav links, forms, and other content for toggling -->                 
                <div class="collapse navbar-collapse" id="mobile-collapse">                      
                    <?php 
                    wp_nav_menu( array(
                            'menu' => 'main-navigation',
                            'theme_location'=>'primary',
                            'menu_class' => 'nav navbar-nav',
                            'container' => '',
                            'fallback_cb' => 'bee_news_bootstrap_navwalker::fallback',
                            'walker' => new bee_news_bootstrap_navwalker()
                    ) ); 

                    ?>

                      
                    <ul class="nav navbar-nav"></ul>
                </div>                 
                <!-- /.navbar-collapse -->                 
            </div>             
            <!-- /.container-fluid -->             
        </nav>         
        