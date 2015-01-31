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






  <!-- Navigation -->
    <nav class="navbar header navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <?php    if($options['logo'] != '') { echo '<img src="'.$options['logo'].'">'; }else{ echo ' <a class="navbar-brand" href="/">Avnii</a>'; } ?> 
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              
              
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
					'items_wrap'      => '<ul id="nav" class="nav navbar-nav navbar-right">%3$s</ul>',
					'depth'           => 0,
					'walker'          => ''
					);
			wp_nav_menu($defaults); ?>
              
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

