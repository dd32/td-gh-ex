<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title('|', true, 'left'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />



 <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

      <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>

      <script src="<?php echo get_template_directory_uri(); ?>/js/ie-responsive.min.js"></script>

      

    <![endif]-->

<!-- WP Head -->
<?php wp_head(); ?>
</head>



<body <?php body_class(); ?>>

	<div id="wrapper">

    	<div class="top-bar">

        	<div class="container">

            	<div class="row">

                	<div class="col-md-7">
							<p style="display:inline-block; color:#fff; vertical-align: top; padding-top:10px; float:left; margin-right:10px;"><?php echo date_i18n( get_option( 'date_format' )); ?></p>

                            <div id="top-nav">
                            	<div class="navbar-default">                             
                            <!-- Home and toggle get grouped for better mobile display -->

                                <div class="navbar-header">
            
                                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
            
                                    <span class="sr-only"><?php _e( 'Toggle navigation', 'wp-fanzone' ); ?></span>
            
                                    <span class="icon-bar"></span>
            
                                    <span class="icon-bar"></span>
            
                                    <span class="icon-bar"></span>
            
                                  </button>
            
                                </div>
            
                            
            
                                <!-- Collect the nav links, forms, and other content for toggling -->
            
                                <div class="collapse navbar-collapse" id="navbar-collapse-1">
            
                                  <?php
            							if (has_nav_menu('top-menu')) {
										  wp_nav_menu( array(
											  'theme_location' => 'top-menu',
											  'walker'         => new wpfanzoneNavMenuWalker,
											  'depth'	=> 3,            
                                        	  'container'	=> false,
											  'menu_class'	=> 'top-menu',
										  ) );
										}                                      
            
            
            					?>           
                                  
            
                                </div><!-- /.navbar-collapse -->
                                </div>
                            </div>
					</div>

                    <div class="col-md-5 fan-sociel-media">  

                    	
						 
                                 	

                        <?php if ( get_theme_mod( 'wp_fanzone_email' ) ) : ?>

                        	<a href="<?php _e('mailto:', 'wp-fanzone'); echo sanitize_email( get_theme_mod( 'wp_fanzone_email' ) ); ?>" class="btn btn-default btn-xs" title="Email"><span class="fa fa-envelope"></span></a>

                        <?php endif; ?>

                    	

                        <?php if ( get_theme_mod( 'wp_fanzone_rss' ) ) : ?>

                        	<a href="<?php echo esc_url( get_theme_mod( 'wp_fanzone_rss' ) ); ?>" class="btn btn-default btn-xs" title="RSS"><span class="fa fa-rss"></span></a>

                        <?php endif; ?>

                        

						<?php if ( get_theme_mod( 'wp_fanzone_vimeo' ) ) : ?>

                        	<a href="<?php echo esc_url( get_theme_mod( 'wp_fanzone_vimeo' ) ); ?>" class="btn btn-default btn-xs" title="Vimeo"><span class="fa fa-vimeo-square"></span></a>

                        <?php endif; ?>

                    	

                        <?php if ( get_theme_mod( 'wp_fanzone_flickr' ) ) : ?>

                        	<a href="<?php echo esc_url( get_theme_mod( 'wp_fanzone_flickr' ) ); ?>" class="btn btn-default btn-xs" title="Flickr"><span class="fa fa-flickr"></span></a>

                        <?php endif; ?>

                        

                        <?php if ( get_theme_mod( 'wp_fanzone_instagram' ) ) : ?>

                        	<a href="<?php echo esc_url( get_theme_mod( 'wp_fanzone_instagram' ) ); ?>" class="btn btn-default btn-xs" title="Instagram"><span class="fa fa-instagram"></span></a>

                        <?php endif; ?>

                        

						<?php if ( get_theme_mod( 'wp_fanzone_tumblr' ) ) : ?>

                        	<a href="<?php echo esc_url( get_theme_mod( 'wp_fanzone_tumblr' ) ); ?>" class="btn btn-default btn-xs" title="Tumblr"><span class="fa fa-tumblr"></span></a>

                        <?php endif; ?>

                        

						<?php if ( get_theme_mod( 'wp_fanzone_youtube' ) ) : ?>

                        	<a href="<?php echo esc_url( get_theme_mod( 'wp_fanzone_youtube' ) ); ?>" class="btn btn-default btn-xs" title="Youtube"><span class="fa fa-youtube"></span></a>

                        <?php endif; ?>

                        

						<?php if ( get_theme_mod( 'wp_fanzone_linkedin' ) ) : ?>

                        	<a href="<?php echo esc_url( get_theme_mod( 'wp_fanzone_linkedin' ) ); ?>" class="btn btn-default btn-xs" title="Linkedin"><span class="fa fa-linkedin"></span></a>

                        <?php endif; ?>

                    

                    	<?php if ( get_theme_mod( 'wp_fanzone_pinterest' ) ) : ?>

                        	<a href="<?php echo esc_url( get_theme_mod( 'wp_fanzone_pinterest' ) ); ?>" class="btn btn-default btn-xs" title="Pinterest"><span class="fa fa-pinterest"></span></a>

                        <?php endif; ?>

            

                    	<?php if ( get_theme_mod( 'wp_fanzone_google' ) ) : ?>

            				<a href="<?php echo esc_url( get_theme_mod( 'wp_fanzone_google' ) ); ?>" class="btn btn-default btn-xs" title="Google Plus"><span class="fa fa-google-plus"></span></a>

            			<?php endif; ?>

                        

                    	<?php if ( get_theme_mod( 'wp_fanzone_twitter' ) ) : ?>

            				<a href="<?php echo esc_url( get_theme_mod( 'wp_fanzone_twitter' ) ); ?>" class="btn btn-default btn-xs" title="Twitter"><span class="fa fa-twitter"></span></a>

            			<?php endif; ?>

            

                    	<?php if ( get_theme_mod( 'wp_fanzone_facebook' ) ) : ?>

            				<a href="<?php echo esc_url( get_theme_mod( 'wp_fanzone_facebook' ) ); ?>" class="btn btn-default btn-xs" title="Facebook"><span class="fa fa-facebook"></span></a>

            			<?php endif; ?>              

                    </div> <!--end fan-sociel-media-->

                </div>

                

            	

            </div> <!--end class container-->

        </div> <!--end top-bar-->

        

        <header id="header" class="header">

        	<div class="container">

            	<div class="row">

                	<div class="col-md-12">

                    	<div class="logo">

                        	<?php if ( get_theme_mod( 'wp_fanzone_logo' ) ) : ?>

                <div id="site-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo esc_url( get_theme_mod( 'wp_fanzone_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a></div>

                <?php else : ?>

                <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

                <?php endif; ?>

                        </div>               
						                 

                        <?php dynamic_sidebar('top-right-widget'); ?>

                    </div>

                </div>

            </div>

        </header>

        <div class="nav_container">

            <div class="container">

                <nav class="navbar navbar-default" role="navigation">

                  <div class="container-fluid">

                    <!-- Home and toggle get grouped for better mobile display -->

                    <div class="navbar-header">

                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">

                        <span class="sr-only">Toggle navigation</span>

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>

                      </button>

                    </div>

                

                    <!-- Collect the nav links, forms, and other content for toggling -->

                    <div class="collapse navbar-collapse" id="navbar-collapse">

                      <?php

							$args = array(

							'theme_location' => 'main-menu',

							'depth'	=> 3,

							'container'	=> false,

							'fallback_cb' => 'wp_fanzone_menu',

							'menu_class'	=> 'nav navbar-nav',

							'walker'	=> new wpfanzoneNavMenuWalker()

							);						 



							wp_nav_menu($args);



							?>

                      

                    </div><!-- /.navbar-collapse -->

                  </div><!-- /.container-fluid -->

                </nav>

            </div>

        </div> <!--end nav_container-->