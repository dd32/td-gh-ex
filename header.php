<?php
/**
 * The Header template file
 */
$impressive_options = get_option('impressive_theme_options');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">                
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <header>
            <?php $is_social_brand =false; 
            if (is_page_template('page-templates/frontpage.php')) { ?>
                <div class="header_bg">
                    <span class="mask-overlay"></span>
                    <div class="impressive-container container">
                        <div class="impressive-header col-md-12">
                            <div class="logo">
                            <?php if(has_custom_logo()):    the_custom_logo();    endif;
                                  if(display_header_text()==true) { ?>		  
                                       <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><h2><?php bloginfo('name'); ?></h2></a>
                                       <a href="<?php echo esc_url(home_url('/')); ?>"><h6 class="impressive-site-description">
                                        <?php echo esc_html(get_bloginfo('description')); ?></h6></a>
                            <?php } ?>
                            </div> 
                            <?php $TopHeaderSocialIconDefault = array(array('url'=>$impressive_options['fburl'],'icon'=>'fa-facebook'),array('url'=>$impressive_options['twitter'],'icon'=>'fa-twitter'),array('url'=>$impressive_options['youtube'],'icon'=>'fa-youtube'),array('url'=>$impressive_options['rss'],'icon'=>'fa-rss'),);?>
                            <div class="social-icon">
                                <ul>
                                    <?php for($i=1; $i<=4; $i++) : 
                                    if(get_theme_mod('TopHeaderSocialIconLink'.$i,$TopHeaderSocialIconDefault[$i-1]['url'])!= '' && get_theme_mod('TopHeaderSocialIcon'.$i,$TopHeaderSocialIconDefault[$i-1]['icon'])!= ''){   $is_social_brand=true;   ?>
                                           <li><a href="<?php echo esc_url(get_theme_mod('TopHeaderSocialIconLink'.$i,$TopHeaderSocialIconDefault[$i-1]['url'])); ?>" class="icon" title="" target="_blank">
                                                <i class="fa <?php echo esc_attr(get_theme_mod('TopHeaderSocialIcon'.$i,$TopHeaderSocialIconDefault[$i-1]['icon'])); ?>"></i>
                                            </a></li>                                            
                                    <?php } endfor; ?>
                                </ul>
                            </div>
                            

                            <div class="searchform-wrap">
                                <form class="searchform" method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
                                    <i class="fa fa-search"></i>
                                    <input type="text" value="<?php the_search_query(); ?>" class="search-box" name="s" id="s"  placeholder="<?php esc_attr_e('Search', 'impressive'); ?>" />
                                </form>
                            </div>
                            <div class="menu-bar">

                                <?php
                                $impressive_defaults = array(
                                    'theme_location' => 'primary',
                                    'container' => 'div',
                                    'container_class' => 'collapse navbar-collapse main-menu-ul no-padding',
                                    'echo' => true,                                    
                                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                    'depth' => 0,
                                );
                                if (has_nav_menu('primary')) {
                                    wp_nav_menu($impressive_defaults);
                                }
                                ?>        
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <div  class="scrolling-menubar" >                
                <div class="scroll-header" >
                    <div class="impressive-container container">
                        <div class="row">
                            <div class="col-md-3 logo-small col-sm-12">
                                <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                            </div>
                            
                            <?php if (empty($impressive_options['remove-header-socialicon'])) { ?>
                                <?php
                                if ($is_social_brand) {
                                    $impressive_div_class = 'col-md-9';
                                } else {
                                    $impressive_div_class = 'col-md-12';
                                }
                                ?>
                                <?php
                            } else {
                                $impressive_div_class = 'col-md-12';
                            }
                            ?> 	
                            <div class="col-md-9 center-content">
                                <div class="scroll-menu-bar col-sm-9 <?php echo esc_attr($impressive_div_class); ?>"> 
                                    <?php if (has_nav_menu('primary')) { ?>
                                        <div class="navbar-header res-nav-header toggle-respon">
                                            <button data-target="#example-navbar-collapse" data-toggle="collapse" class="navbar-toggle menu_toggle" type="button">
                                                <span class="sr-only"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                            </button>
                                        </div>
                                    <?php } ?> 

                                    <?php
                                    $impressive_defaults = array(
                                        'theme_location' => 'primary',
                                        'container' => 'div',
                                        'container_class' => 'collapse navbar-collapse main-menu-ul no-padding top-menu',
                                        'container_id' => 'example-navbar-collapse',
                                        'echo' => true,
                                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                        'depth' => 0,
                                    );
                                    if (has_nav_menu('primary')) {
                                        wp_nav_menu($impressive_defaults);
                                    }
                                    ?>      
                                </div>
                           
                                <?php if (empty($impressive_options['remove-header-socialicon'])): ?>
                                    <?php if ($is_social_brand) { ?>
                                        <div class="col-md-3 col-sm-3 social-icon  no-padding">	
                                            <ul>
                                                <?php for($i=1; $i<=4; $i++) : 
                                                if(get_theme_mod('TopHeaderSocialIconLink'.$i,$TopHeaderSocialIconDefault[$i-1]['url'])!= '' && get_theme_mod('TopHeaderSocialIcon'.$i,$TopHeaderSocialIconDefault[$i-1]['icon'])!= ''){   ?>
                                                       <li><a href="<?php echo esc_url(get_theme_mod('TopHeaderSocialIconLink'.$i,$TopHeaderSocialIconDefault[$i-1]['url'])); ?>" class="icon" title="" target="_blank">
                                                            <i class="fa <?php echo esc_attr(get_theme_mod('TopHeaderSocialIcon'.$i,$TopHeaderSocialIconDefault[$i-1]['icon'])); ?>"></i>
                                                        </a></li>                                            
                                                <?php } endfor; ?>
                                            </ul>
                                        </div>
                                    <?php } 
                                    endif; ?> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>	            
        </header>