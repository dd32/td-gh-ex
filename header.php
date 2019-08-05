<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="main-content">
 * @package Ascent
 * @since 1.0.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php 
      if( false === get_option( 'site_icon', false ) )  {
        $ascent_old_fav_icon = ascent_get_options( 'favicon' ); 
        if( $ascent_old_fav_icon ) {
          echo '<link rel="icon" href="'.$ascent_old_fav_icon.'" sizes="16x16" />';
        }
      }
    ?>

    <?php
    $home_slider_pagination = ascent_get_options( 'asc_enable_home_slider_pagination' );
    $home_slider_navigation = ascent_get_options( 'asc_enable_home_slider_navigation' );
    $body_font_family = ascent_get_options( 'asc_body_font_family' );

     if ( $home_slider_pagination ): ?>
      <script type="text/javascript">
        home_slider_pagination = 1;
      </script>
    <?php else: ?>
      <script type="text/javascript">
        home_slider_pagination = 0;
      </script>
    <?php endif; ?>

    <?php if ( $home_slider_navigation ): ?>
      <script type="text/javascript">
        home_slider_nav = 1;
      </script>
    <?php else: ?>
      <script type="text/javascript">
        home_slider_nav = 0;
      </script>
    <?php endif; ?>

    <?php wp_head(); ?>

    <?php if( $body_font_family ): ?>
      <?php $fonts_array = explode( '|||', $body_font_family ); ?>
      <style>
        body, h1, h2, h3, h4, h5, h6, p, * {
            font-family: '<?php echo $fonts_array[0]; ?>', sans-serif, arial;
        }
      </style>
      <?php endif; ?>
</head>

<body <?php body_class(); ?>>
  <?php do_action( 'before' ); ?>
<header id="masthead" class="site-header" role="banner">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="mail-info">
                        <?php
                          $phone_number = ascent_get_options( 'asc_phone_number' );
                          $email_id = ascent_get_options( 'asc_email_id' );
                        ?>
                        <?php if ( $phone_number ): ?>
                          <span class="phone-info"><i class="fa fa-phone"></i> <?php echo esc_html( $phone_number ); ?></span>
                        <?php endif; ?>
                        <?php if ( $email_id ): ?>
                          <span><i class="fa fa-envelope"></i> <a href="mailto:<?php echo esc_html( $email_id ); ?>"><?php echo esc_html( $email_id ); ?></a></span>
                        <?php endif; ?>
                    </div>
                </div><!-- .col-md-6-->
                <div class="col-md-6">
                    <div class="header-social-icon-wrap">
                        <ul class="social-icons">
                           <?php
                            $socialmedia_navs = ascent_socialmedia_navs();
                            foreach ( $socialmedia_navs as $name => $item_class ) {
                              $social_url = ascent_get_options( $name );
                              if ( $social_url ) {
                                echo '<li class="social-icon"><a target="_blank" href="'.esc_url( $social_url ).'"><i class="'.$item_class.'"></i></a></li>';
                              }
                            }
                            ?>
                        </ul>
                    </div><!--.header-social-icon-wrap-->
                </div><!-- .col-md-6-->
            </div>
        </div>
     </div>
    <div id="header-main" class="header-bottom">
        <div class="header-bottom-inner">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div id="logo">
                            <div class="site-header-inner col-md-12">
                                <div class="site-branding">
                                    <h1 class="site-title">
                                        <?php
                                          $logo = ascent_get_options( 'asc_logo' );
                                          $custom_logo =  get_custom_logo();
                                          
                                          if( $logo && ! $custom_logo ) {
                                            $updated_logo = $logo; ?>
                                            <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><img src="<?php echo esc_url($updated_logo); ?>" alt="<?php bloginfo('name'); ?>"></a>
                                            <?php 
                                              } else if( ! $logo && $custom_logo ) {
                                                echo $custom_logo;
                                              } else if( $logo && $custom_logo ) {
                                                echo $custom_logo;
                                              } else {
                                            ?>
                                            <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                                            <?php 
                                          }
                                        ?>
                                    </h1>
                                    <?php if( display_header_text() ) : ?>
                                      <h4 class="site-description"><?php bloginfo('description'); ?></h4>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div><!--.col-md-3-->

                    <div class="col-md-9">
                        <div class="header-search pull-right">
                            <div id="header-search-button"><i class="fa fa-search"></i></div>
                        </div>
                        <div class="site-navigation pull-right">
                          <nav class="main-menu">
                            <?php
                              wp_nav_menu(array(
                                'theme_location' => 'main-menu',
                                'container' => false,
                                'menu_class' => 'header-nav clearfix',
                              ));
                            ?>
                          </nav>
                          <div id="responsive-menu-container"></div>
                        </div><!-- .site-navigation -->
                    </div><!--.col-md-9-->
                </div><!--.row-->
            </div><!-- .container -->
        </div><!--.header-bottom-inner-->
    </div><!--.header-bottom-->
  <?php get_template_part( 'header', 'searchform' ); ?>
</header><!-- #masthead -->

<?php get_template_part( 'header', 'banner' ); ?>

<div class="main-content">
  <div class="container">
    <div id="content" class="main-content-inner">
