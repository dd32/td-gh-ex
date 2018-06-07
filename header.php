<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package a-portfolio
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if(get_header_image()):?>
<header class="<?php echo ((!is_front_page() || is_home()) ? 'details-page' : '');?>" style="background: url(<?php echo esc_url(get_header_image());?>)">
 <?php else:?>
 <header class="<?php echo ((!is_front_page() || is_home()) ? 'details-page' : '');?>">
<?php endif;?>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container"><?php if(has_custom_logo()):?>
          <?php the_custom_logo();?>
          <?php else: ?>    
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="navbar-brand text-center logo-title"><?php bloginfo('name');?></a>
          <?php endif; ?>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" >
          <?php echo esc_html__( 'Menu', 'a-portfolio' );?>
          <i class="fa fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <?php
              if(has_nav_menu('primary')): 
              $args = array(
                'theme_location'  =>  'primary',                  
                'menu_class'    =>  'nav navbar-nav pull-right',
                'walker'      =>  new wp_bootstrap_navwalker()
              ); 
               wp_nav_menu( $args );
              else:
                 ?> 
               <ul id="menu-top-menu" class="nav navbar-nav ml-auto">
                  <a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?> "> <?php echo esc_html__('Add a menu','a-portfolio'); ?></a>
               </ul>
            <?php endif;?>
        </div>
      </div>
    </nav>

    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <?php if(get_theme_mod( 'a_portfolio_banner_page_title' )):?>
              <h1><?php echo esc_html(get_theme_mod( 'a_portfolio_banner_page_title' ));?></h1>
            <?php endif;?>
            <?php if(get_theme_mod( 'a_portfolio_banner_page_subtitle' )):?>
              <span class="subheading"><?php echo esc_html(get_theme_mod( 'a_portfolio_banner_page_subtitle' ));?></span>
            <?php endif;?>
            <?php if(is_front_page()): ?>
            <?php if(get_theme_mod( 'a_portfolio_banner_button_title' )):?>
             <div class="slide-button">
                <a href="<?php echo esc_url(get_theme_mod('a_portfolio_banner_button_url_title'));?>" class="button primary contact-us-btn"><?php echo esc_html(get_theme_mod( 'a_portfolio_banner_button_title' ));?></a>
              </div>
            <?php endif;?>
          <?php endif;?>
          </div>
        
        </div>
      </div>
    </div>
</header>

<?php if(!is_front_page() || is_home()): ?>
<!-- Start Breadcrumbs -->
<div class="breadcrumbs" style="background: grey;">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php
        if ( is_archive() ) {
        the_archive_title( '<h2>', '</h2>' );
        }
        elseif(is_home()){
        echo '<h2 style="color:#FFF">';
        echo esc_html__( 'Home','a-portfolio' );
        echo '</h2>';
        }
        else{
          echo '<h2>';
        echo esc_html( get_the_title() );
        echo '</h2>';
        }?>
      <?php if(!is_home()): ?>
         <ul class="bread-list">
          <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Home', 'a-portfolio' );?><i class="fa fa-angle-right"></i></a></li>
          <li class="active"><a href="<?php the_permalink();?>">
           <?php
              if ( is_archive() ) {
              the_archive_title();
              }
              else{
              echo esc_html( get_the_title() );
              }?>
          </a></li>
        </ul>
      <?php endif;?>  
      </div>
    </div>
  </div>
</div>
<!--/ End Breadcrumbs -->
<?php endif; ?>