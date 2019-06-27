<?php global $axiohost; ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	
     <?php if(!empty($axiohost['fb-pexel-code'])){ echo wp_kses_post($axiohost['fb-pexel-code']); } ?>
     <?php if(!empty($axiohost['google-analytics-code'])){ echo wp_kses_post($axiohost['google-analytics-code']); } ?>
     
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <!-- Loading -->
    <?php 
        if($axiohost['preloader'] == 1){?>
            <div class="loader-wrapper">
                <div class="lds-roller">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>    
        <?php
        }
    ?>
    
    <header class="header-area">
        <div class="container">
            <div class="navigation-wrapper">
                <div class="navigation-brand">
                    <?php 
                        $axiohost_description = get_bloginfo( 'description', 'display' );
                        if ( !empty(get_custom_logo()) ){
                            the_custom_logo();
                        }
                        else{
                            ?>
                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                            <p class="site-description"><?php echo esc_html($axiohost_description); /* WPCS: xss ok. */ ?></p>
                            <?php
                        }
                    ?>
                </div>
                <div class="navigation-main">
                    
                        <a href="#" class="search-popup-icon"><img src="<?php echo esc_url(AXIOHOST_IMG_URL.'/search-icon.png'); ?>" alt="<?php esc_attr__('nav search', 'axiohost'); ?> "></a> 
                    <?php
                       get_template_part('template-parts/primary-menu', 'primary-menu'); 
                       get_template_part('template-parts/responsive-menu', 'mobile-menu'); 
                    
                    ?>
                </div>
            </div>
        </div>
         <div class="searchBoxTop">
            <div class="seachBoxContainer">
               <div class="container">
                  <span class="searchClose"></span>
                  <?php get_axiohost_search_form(); ?>
               </div>
            </div>
         </div>
         
      </header>
      <!-- End Header Area -->
      