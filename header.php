<?php
/* The Header template for our theme
 * Displays all of the <head> section and everything up till <div id="main">
 * @package WordPress
 * @subpackage belfast
 */

?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header id="header" class="site-header" role="banner">
        <div class="container">
       	<div class="row clearfix">
		<?php 
		
		$rsslink 	 	= get_theme_mod( 'belfast_rsslink' );
		$twitterlink 	= get_theme_mod( 'belfast_twitterlink' );
		$facebooklink 	= get_theme_mod( 'belfast_facebooklink' );
		$pinterestlink 	= get_theme_mod( 'belfast_pinterestlink' );
		$googlelink 	= get_theme_mod( 'belfast_googlelink' );
		$stumblelink 	= get_theme_mod( 'belfast_stumblelink' );
		$youtubelink 	= get_theme_mod( 'belfast_youtubelink' );
		
		
		if( $rsslink || $twitterlink || $facebooklink || $pinterestlink || $googlelink || 
		$stumblelink || $youtubelink ):
		?>
		<div class="col-md-12 clearfix">
			<ul class="icon-fonts text-center social-icons">
			   <?php if ( $rsslink ) : ?>
				   <li><a class="genericon genericon-feed" href="<?php  echo esc_url( $rsslink ); ?>"></a></li>
			   <?php endif; ?>
			   <?php if ( $twitterlink ) : ?>
					<li><a class="genericon genericon-twitter" href="<?php  echo esc_url($twitterlink); ?>"></a></li>
			   <?php endif; ?>
			   <?php if ( $facebooklink ) : ?>
				   <li><a class="genericon genericon-facebook-alt" href="<?php  echo esc_url( $facebooklink ); ?>"></a></li>
			   <?php endif; ?>
			   <?php if ( $pinterestlink ) : ?>
					<li><a class="genericon genericon-pinterest-alt" href="<?php  echo esc_url( $pinterestlink ); ?>"></a></li>
			   <?php endif; ?>
			   <?php if ( $googlelink ) : ?>
					<li><a class="genericon genericon-googleplus" href="<?php  echo esc_url( $googlelink ); ?>"></a></li>
			   <?php endif; ?>
			   <?php if ( $stumblelink ) : ?>
					<li><a class="genericon genericon-tumblr" href="<?php  echo esc_url( $stumblelink ); ?>"></a></li>
			   <?php endif; ?>
			   <?php if ( $youtubelink ) : ?>
					<li><a class="genericon genericon-youtube" href="<?php  echo esc_url( $youtubelink ); ?>"></a></li>
			   <?php endif; ?>
			 </ul>
		</div>
		<?php 
		endif;
		?>  
		<div class="col-md-12 clearfix primary-nav">       
            
            <nav class="primary-navigation site-navigation " role="navigation" id="menu-primary">
             <div class="menu">
                 <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'menu_id' => 'menu-primary-items' ) ); ?>
             </div>
           </nav>
           
        </div>

      </div>
      
    </div>
	<div class="header-banner">
	<div class="container">
       
		
		<div class="col-md-12">
               <?php if(is_home()) echo '<h1 id="site-title">'; else echo '<h2 id="site-title">'; ?>
                  <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
                    	<?php if ( get_theme_mod( 'custom_logo' ) ) : 
						
						$custom_logo_id = get_theme_mod( 'custom_logo' );
						$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
						
						?>
						
                            <span>
                            	<img src='<?php echo esc_url( $image[0] ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
                            </span>
                        <?php else : ?>
							<?php esc_html( bloginfo( 'name' ) ); ?>				
						<?php endif; ?>
                        </a>
                    <?php if(is_home()) echo '</h1>'; else echo '</h2>'; ?>
					<?php 
					if( get_bloginfo( 'description', 'display' ) ):
					?>
					<p class="site-description"><?php echo  esc_html( get_bloginfo( 'description', 'display' ) ); ?></p> 
					<?php 
					endif;
					?>
        </div>
		
		
	</div>
	<div>
	
 </header><!-- #masthead -->
	<div class="container">
		<div id="main" class="site-main">
