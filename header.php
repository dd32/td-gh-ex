<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div id="wrapper">

	<header id="branding" role="banner">
    
      <div id="inner-header" class="clearfix">
      	
		<div id="site-heading">
      			<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ): 
            $virality_custom_logo_id = get_theme_mod( 'custom_logo' );
            $image = wp_get_attachment_image_src( $virality_custom_logo_id,'full');
            ?>
            <div id="site-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo esc_url( $image[0] ); ?>"></a></div>
            <?php else : ?>
            <div id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
            <?php endif; ?>
		</div>
        
        <div id="banner-header">
        <!-- add 728x90 banner code after this comment -->
		
        <!-- end editing -->
        </div>

      </div> 
      
      <?php if ( ! get_theme_mod( 'virality_disable_nav' ) ) : ?>
      <nav id="access" role="navigation">
        <div class="inner-nav">
        <h1 class="assistive-text section-heading"><?php _e( 'Main menu', 'virality' ); ?></h1>
        <div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'virality' ); ?>"><?php _e( 'Skip to content', 'virality' ); ?></a></div>
        <?php virality_header_nav(); // Adjust using Menus in Wordpress Admin ?>
        </div>
      </nav><!-- #access -->
      <?php endif; ?>
      
	</header><!-- #branding -->

	<div id="container">