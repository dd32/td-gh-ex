<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package atoz
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<!-- Basic Page Needs
    ================================================== -->
<meta charset="<?php bloginfo( 'charset' ); ?>">
<!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>     
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body <?php body_class(); ?>>

<!-- Navigation
    ==========================================-->
<nav id="tf-menu" class="navbar navbar-default navbar-fixed-top">
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
	<div class="col-md-4">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
         
        <?php  
          
                $custom_logo_id = get_theme_mod( 'custom_logo' );
                $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                if ( has_custom_logo() ) {
                    the_custom_logo();
                    } else {
                echo '<h3>'. get_bloginfo( 'name' ) .'</h3>';
                    }
          
                ?> 
                
        </a> </div></div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
	<div class="col-md-8">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
       <?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_class' => 'nav navbar-nav navbar-right' ) );?>
    </div>
	</div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>