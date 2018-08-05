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
        <style type="text/css">
            .header-wrap{
                background: <?php echo $bee_news_redux_builder['primary-color']['color']; ?>;
            }

            .panel-heading span{
                background: <?php echo $bee_news_redux_builder['primary-color']['color']; ?>;
                color: <?php echo $bee_news_redux_builder['heading-text-color']['color']; ?>;
            }

            .carousel-news .carousel-caption label{
                background: <?php echo $bee_news_redux_builder['primary-color']['color']; ?>;
            }
            .carousel-news .carousel-indicators:after{
                background: <?php echo $bee_news_redux_builder['primary-color']['color']; ?>;
            }
           .carousel-news .carousel-indicators li{
            display:block;
            margin-bottom:5px;
            border:0;
            border-left:3px solid <?php echo $bee_news_redux_builder['primary-color']['color']; ?>;
            width:100%;
            height:auto;border-radius:0;
            text-align:left;
            text-indent:inherit;
            padding:2px 0 2px 8px;
            opacity:0.7;
            background:transparent;
            }
            .panel-slider .carousel-indicators li.active, .photo-gallery-carousel .carousel-indicators li.active{
                background: <?php echo $bee_news_redux_builder['primary-color']['color']; ?>;
            }
            .tab-container .nav-tabs li.active a,
            .tab-container .nav-tabs li.active a:focus,
            .tab-container .nav-tabs li.active:hover a,
            .tab-container .nav-tabs li.active:hover a:focus,
            .tab-container .nav-tabs li.active:focus a,
            .tab-container .nav-tabs li.active:focus a:focus {
                color: <?php echo $bee_news_redux_builder['primary-color']['color']; ?>;
                background: #fff
            }
            a:hover, a:focus {
                text-decoration: none;
                color: <?php echo $bee_news_redux_builder['primary-color']['color']; ?>;
            }
            .video-carousel{
                background: <?php echo $bee_news_redux_builder['secondary-color']['color']; ?>;
            }
            .footer{
                background: <?php echo $bee_news_redux_builder['secondary-color']['color']; ?>;
            }
            .navbar-maitri{
                background: <?php echo $bee_news_redux_builder['menu-color']['color']; ?>;
            }
            .navbar-maitri li.active, .navbar-maitri li a:hover, .navbar-maitri li a:focus{
                background: <?php echo $bee_news_redux_builder['menu-active-color']['color']; ?>;
            }
            .navbar-maitri li.menu-item-home.active a {
                color: rgba(255,255,255,0);
            }
        </style>
    </head>     
    <body class="<?php echo implode(' ', get_body_class()); ?>"> 
<div class="header-wrap">        <div class="container"> 
            <div class="row header-brand"> 
                <div class="col-md-4"> 
                    <a class="logo" href="<?php echo  site_url(); ?>">
                        <img src="<?php global $bee_news_redux_builder; echo $bee_news_redux_builder['upload-logo']['url'];?>" >
                    </a>                     
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
                    <!-- <a class="navbar-brand" href="#"><i class="glyphicon glyphicon-home"></i></a> -->                     
                </div>                 
                <!-- Collect the nav links, forms, and other content for toggling -->                 
                <div class="collapse navbar-collapse" id="mobile-collapse">                      
                    <?php 
                    wp_nav_menu( array(
                            'menu' => 'main-navigation',
                            'theme_location'=>'primary',
                            'menu_class' => 'nav navbar-nav',
                            'container' => '',
                            'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                            'walker' => new wp_bootstrap_navwalker()
                    ) ); 

                    ?>

                      
                    <ul class="nav navbar-nav"></ul>
                </div>                 
                <!-- /.navbar-collapse -->                 
            </div>             
            <!-- /.container-fluid -->             
        </nav>         
        