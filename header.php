<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package businessup
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
<div class="wrapper">
<header class="ta-trhead">
  <!--==================== TOP BAR ====================-->
  <?php 
  $businessup_topbar_enable = get_theme_mod('businessup_topbar_enable','true');
  if($businessup_topbar_enable !='false'){
  ?>
  <div class="ta-head-detail hidden-xs hidden-sm">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-xs-12 col-sm-6">
         <ul class="info-left">
            <?php 
              $businessup_head_info_one = get_theme_mod('businessup_head_info_one');
              $businessup_head_info_two = get_theme_mod('businessup_head_info_two');
            ?>
            <li><?php echo html_entity_decode($businessup_head_info_one); ?></li>
            <li><?php echo html_entity_decode($businessup_head_info_two); ?></li>
          </ul>
        </div>
        <div class="col-md-6 col-xs-12">
      
          <?php $businessup_header_widget_four_label = get_theme_mod('businessup_header_widget_four_label'); 
                  $businessup_header_widget_four_link = get_theme_mod('businessup_header_widget_four_link');
                  $businessup_header_widget_four_target = get_theme_mod('businessup_header_widget_four_target'); 

                    if( !empty($businessup_header_widget_four_label) ):?>
                      <a href="<?php echo esc_url($businessup_header_widget_four_link); ?>" <?php if( $businessup_header_widget_four_target ==true) { echo "target='_blank'"; } ?> class="btn btn-theme quote"><?php echo esc_attr($businessup_header_widget_four_label); ?></a> 
                    <?php endif; ?>


          </div>
      </div>
    </div>
  </div>
  <?php } ?>
  <div class="clearfix"></div>
	<div class="ta-main-nav">
      <nav class="navbar navbar-default navbar-wp">
      <div class="container"> 
        <!-- Start Navbar Header -->
        <div class="navbar-header col-md-3"> 
          <?php if(has_custom_logo()) {
				// Display the Custom Logo
				the_custom_logo();
				} else { ?>
          	<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"> 
            <span> <?php bloginfo('name'); ?> </span> <br>
            <?php $description = get_bloginfo( 'description', 'display' );
  				if ( $description || is_customize_preview() ) : ?>
          		<span class="site-description"><?php echo $description; ?></span> 
          	<?php endif;?></a><?php }?>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-wp"> <span class="sr-only"><?php echo esc_attr('Toggle Navigation'); ?></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <!-- /End Navbar Header --> 
        
        <!-- Navigation -->
        <div class="collapse navbar-collapse" id="navbar-wp">
          <?php wp_nav_menu( array(  
				    'theme_location' => 'primary', 'container'  => '', 'menu_class' => 'nav navbar-nav','fallback_cb' => 'businessup_fallback_page_menu','walker' => new businessup_nav_walker()
				     ) );
		      	?>
        </div>
        <!-- /Navigation --> 
      </div>
    </nav>
      
  </div>
</header>
<!-- #masthead -->