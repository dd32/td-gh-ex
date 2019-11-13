<?php global $axiohost; ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />     
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e ( 'Skip to content', 'axiohost' ); ?></a>
    <header class="header-area">
        <div class="container">
            <div class="navigation-wrapper">
				<div class="navigation-brand">				
					<?php if (has_custom_logo()): ?>
						<div class="site-logo"><?php the_custom_logo(); ?></div>
					<?php
				endif; ?>
					<?php $blog_info = get_bloginfo('name'); ?>
					<?php if (!empty($blog_info) && display_header_text()): ?>
				 
							<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
				<?php
					$description = get_bloginfo('description', 'display');
					if ($description || is_customize_preview()):
				?>
							<p class="site-description">
								<?php echo esc_html($description); ?>
							</p>
					<?php
					endif; ?>	
					<?php
				endif; ?>
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
                  <?php axiohost_get_search_form(); ?>
               </div>
            </div>
         </div>
         
      </header>
      <!-- End Header Area -->
      