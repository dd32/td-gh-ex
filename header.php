<?php
/*
 * Header For medium Theme.
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<!--header strat-->
   <header class="home-header">
       <div class="col-md-3 col-sm-3 col-xs-3 menu-button clearfix">
           <a href="javascript:void(0);" id="menu-trigger" class="fa fa-bars"></a>
        </div>   
          	<div class="header-menu">
	          <div class="menu-column">
		         <?php
			$medium_args = array(
					'theme_location'  => 'primary',
					'container'       => '',
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => '',
					'menu_id'         => '',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '<ul>%3$s</ul>',
					'depth'           => 0,
					'walker'          => ''
					);
			wp_nav_menu($medium_args); ?>
	          </div>
	      </div>
          <div class="col-md-6 col-sm-6 col-xs-6 header-logo">
              <div class="site-title">
              <?php 
              $medium_options = get_option( 'medium_theme_options' );
              if(empty($medium_options['logo'])) { ?>
        		<a href="<?php echo esc_url(site_url()); ?>"><?php echo get_bloginfo('name'); ?></a>
            <?php } else { ?>
                <a href="<?php echo esc_url(site_url()); ?>"><img src="<?php echo esc_url($medium_options['logo']); ?>" alt="<?php echo get_bloginfo('name'); ?>" class="logo-center img-responsive" /></a>
            <?php }
            ?>
              </div>
           </div>
       
              
       <div class="col-md-3 col-sm-3 col-xs-3 menu-button clearfix">
          		<a href="javascript:void(0);" id="search-trigger" class="fa fa-search"></a>
             </div>   
          	<div class="header-search">
	          <div class="search-column">
               <form method="post" action="javascript:void(0);" name="Search-form">
		          <input type="search" placeholder="Search" autofocus class="pop-search">
               </form>
               
               <div id="search_result_form">
               <div id="search_text_result"></div>
               <div class="row">
               	<div class="" id="search_result">
                
                </div>
                </div>
               	<h2 id="no_search_result"><?php _e( 'No results found...', 'medium' ); ?></h2>
               </div>
                  <p id="msg"><?php 
                  if(!empty($medium_options['search-text']))
                    echo esc_attr($medium_options['search-text']); ?>
                  </p>
	          </div>
	      </div>
	  </header>
   <!---header end-->   
