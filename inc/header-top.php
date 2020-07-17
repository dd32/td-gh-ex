<?php
// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

function baw_header () {
?>
<header id="masthead" class="site-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
	
	<div class="grid-top">
		<?php if (  has_nav_menu('primary') ) { ?>
		<nav id="site-navigation" class="main-navigation">
			<?php
			wp_nav_menu( array( 
			'theme_location' => 'primary', 
			'menu_id' => 'primary-menu' 
		) ); 
		?>
		</nav><!-- #primary-navigation -->
		<?php } ?>
		<?php if ( function_exists('has_nav_menu') && has_nav_menu('mobile-menu') ) { ?>
		<nav style="display: none;" id="menu">
			<?php
				wp_nav_menu( array(
				  'depth' => 8,
				  'sort_column' => 'menu_order',
				  'container' => 'ul',
				  'menu_class' => 'mobile-menu',
				  'theme_location' => 'mobile-menu'
				) );
			?>
		</nav><!-- #mobile-navigation -->
		<?php } ?>
		<div class="header-right"itemprop="logo" itemscope itemtype="http://schema.org/ImageObject">
			<?php the_custom_logo(); ?>
		</div>		
		<?php if ( class_exists( 'WooCommerce' ) ) { ?>		
		<?php } ?>		
	</div>
	
	<div class="all-header">
    	<div class="s-shadow"></div>
		<?php if (get_theme_mod('header_image_position') == 'default') { ?>
		<img id="masthead" class="header-image" style="<?php baw_heade_image_zoom_speed (); ?>" src='<?php echo esc_url(get_template_directory_uri()) . '/images/header.jpg'; ?>' alt="header image"/>	
		<?php } ?>
		<?php if (get_theme_mod('header_image_position') == 'real') { ?>
		<img id="masthead" class="header-image" style="<?php baw_heade_image_zoom_speed (); ?>" src='<?php header_image(); ?>' alt="header image"/>	
		<?php } else { ?>
		<div id="masthead" class="header-image" style="<?php baw_heade_image_zoom_speed (); ?> background-image: url('<?php header_image(); ?>');"></div>
		<?php } ?>

		<div class="site-branding">
		<span class="ml15">
			<?php
			
			if ( is_front_page() && is_home() ) :
				?>
					<h1 class="site-title" itemscope itemtype="http://schema.org/Brand"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span class="word"><?php bloginfo( 'name' ); ?></span></a></h1>

					<?php
				else :
					?>
					<p class="site-title" itemscope itemtype="http://schema.org/Brand"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span class="word"><?php bloginfo( 'name' ); ?></span></a></p>
					
					<?php
				endif;
				$baw_description = get_bloginfo( 'description', 'display' );
				if ( $baw_description || is_customize_preview() ) :
					?>    
					<p class="site-description" itemprop="headline">
						<span class="word"><?php echo $baw_description; ?></span>
					</p>

				<?php endif; ?>	
			</span>			
		</div><!-- .site-branding -->
	</div>
	
</header>
<script>


</script>
<?php }