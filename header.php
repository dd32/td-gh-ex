<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php $options = get_option( 'arinio_theme_options' ); 
if($options['metak'] != '') {
?>
 <meta name="keywords" content="<?php echo $options['metak'];?>" />
 
<?php } ?>
<?php if($options['metad'] != '') {
?>
 <meta name="description" content="<?php echo $options['metad'];?>" />
 
<?php } ?>
<?php if($options['metaa'] != '') {
?>
 <meta name="author" content="<?php echo $options['metaa'];?>" />
 
<?php } ?>


<?php $options = get_option( 'arinio_theme_options' ); 
if($options['fevicon'] != '') {
?>
<link rel="shortcut icon" href="<?php echo $options['fevicon'];?>">
<?php } ?>
<!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
    <![endif]-->
 
   <?php wp_head(); ?> 
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

 
    
<style>
#mainheader {background-image: url(<?php  $options = get_option( 'arinio_theme_options' );  if($options['mainhi'] != '') { echo $options['mainhi']; }else{ echo get_template_directory_uri(); echo '/styles/Banner031.jpg'; } ?>);}
</style>    
    
<?php if($options['trackingc'] != '') {
?>
 
 
<?php echo $options['trackingc'];?>
 
<?php } ?>

<?php if($options['customcss'] != '') {
?>
 
  <style type="text/css">
<?php echo $options['customcss'];?>
</style> 
<?php } ?>
  
  
 
 
 
    
  
  
 
  
    
</head>
<body <?php body_class(); ?> id="pageBody">


<!--++++++++++++++ Main Menu Start +++++++++++++++++++++++++-->
<div id="mainheader1">
    <div class="container">

        <div class="divPanel topArea notop nobottom" >
            <div class="row">
                <div class="col-md-12">

                   <div id="divLogo" class="pull-left">
                     <?php    if($options['logo'] != '') { echo '<img src="'.$options['logo'].'">'; }else{ echo ' <a href="" id="divSiteTitle">'; echo bloginfo('name'); echo '</a><br />
                        <a href="" id="divTagLine">';echo bloginfo('description'); echo'</a>'; } ?>
                    </div>

                    <div id="divMenuRight" class="pull-right">
                    <div class="navbar">
                        <button type="button" class="btn btn-navbar-highlight btn-large btn-primary" data-toggle="collapse" data-target=".nav-collapse">
                            NAVIGATION <span class="icon-chevron-down icon-white"></span>
                        </button>
                        <div id="abby" class="nav-collapse navbar-collapse single-page-nav collapse">
                        
                         
                        
                        <?php 
			$defaults = array(
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
					'items_wrap'      => '<ul id="nav" class="nav nav-pills ddmenu">%3$s</ul>',
					'depth'           => 0,
					'walker'          => ''
					);
			wp_nav_menu($defaults); ?>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                           
                               
                             
                        </div>
                    </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<!--++++++++++++++ Main Menu End +++++++++++++++++++++++++-->