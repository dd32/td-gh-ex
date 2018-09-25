<?php
/**
 * Main navigation bar.
 *
 * @package BA Tours
 */


$header_phone = apply_filters('bathemos_option', '', 'header-phone');
$header_address = apply_filters('bathemos_option', '', 'header-address');
$header_times = apply_filters('bathemos_option', '', 'header-times');

$header_phone = $header_phone ? '
           <div class="header-contacts-phone">
             <div class="header-contacts-phone-inner">
             <i class="fas fa-phone"></i>
             '.$header_phone.'
             </div>
           </div>' : '';
           
$header_address = $header_address ? '
           <div class="header-contacts-address">
             <i class="fas fa-map-marker-alt"></i>
             '.$header_address.'
           </div>' : '';
           
$header_times = $header_times ? '
           <div class="header-contacts-times">
             <i class="fas fa-clock"></i>
             '.$header_times.'
           </div>' : '';
           
$header_address = $header_address.$header_times ? '
           <div class="header-contacts-address-times">
             '.$header_address.$header_times.'
           </div>' : '';

$header_line = $header_phone.$header_address;

$header_line = $header_line ? '
        <div class="header-contacts-row">   
           '.$header_line.'
           <div class="header-contacts-plane header-background">
             <i class="fas fa-plane"></i>
           </div>
        </div>
        ': '';

$navigation_class = $header_line ? 'header-with-texts' : '';

$menu_position = $header_line ? 'justify-content-center' : 'justify-content-end';                                            
?>
<nav id="site-navigation" class="header-background navbar navbar-expand-lg <?php echo esc_attr(apply_filters( 'bathemos_navbar_style', $navigation_class)); ?>" role="navigation">

	<div class="container">
    
      <div class="header-top-row">
	
		<!-- Brand -->
		<?php $blogname = esc_attr( get_bloginfo( 'name' ) ); ?>
		<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr($blogname); ?>" rel="home">
			<?php if ( has_custom_logo() ) : ?>
				<?php $custom_logo_id = get_theme_mod( 'custom_logo' ); ?>
				<?php $image = wp_get_attachment_image_src( $custom_logo_id, 'full' ); ?>
				<img class="site-logo" src="<?php echo esc_attr($image[0]); ?>" alt="<?php echo esc_attr($blogname); ?>" />
			<?php else : ?>
				<h1><?php echo esc_attr($blogname); ?></h1>
			<?php endif; ?>
			<?php if ( ( $tagline = get_bloginfo('description') ) && ( ! has_custom_logo() ) ) : ?>
				<span class="site-description"><?php echo esc_attr( $tagline ); ?></span>
			<?php endif; ?>
		</a>
        
         <?php echo wp_kses_post($header_line); ?>
        
        <!-- Toggler/collapsible button -->
        <div class="header-contacts-toggler navbar-toggler">
		  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target=".navbar-collapse-primary" aria-controls="primary-menu" aria-expanded="false">
			<span class="navbar-toggler-icon"></span>
		  </button>
        </div>
        
      </div>
      
      <div class="header-menu-row">
		
		<!-- Main menu -->
		<?php
		$walker = apply_filters( 'bathemos_nav_menu_walker', '' );
		$fallback = apply_filters( 'bathemos_nav_menu_fallback', '' );
		wp_nav_menu( array(
			'theme_location' => 'primary',
			'menu_class' => 'navbar-nav',
			'menu_id' => 'nav_menu',
			'container' => 'div',
			'container_class' => 'collapse navbar-collapse navbar-collapse-primary '. $menu_position,
			'container_id' => 'nav_menu_container',
			'walker' => new $walker,
			'fallback_cb' => $fallback,
		) );
		?>
        
      </div>
        
	</div>
	
</nav><!-- #site-navigation -->