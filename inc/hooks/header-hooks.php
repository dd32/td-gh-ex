<?php
/**
* Hooks and defunations required for theme headers
*
* @author WPoperation
* @package arrival
*/


add_action( 'arrival_main_nav','arrival_site_logo',5 );
if( ! function_exists('arrival_site_logo')){
	function arrival_site_logo(){
	?>
	<div class="site-branding">
		<?php the_custom_logo(); ?>
		<?php if ( is_front_page() && is_home() ) : ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<?php else : ?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		<?php endif; ?>

		<?php $arrival_description = get_bloginfo( 'description', 'display' ); ?>
		<?php if ( $arrival_description || is_customize_preview() ) : ?>
			<p class="site-description"><?php echo wp_kses_post($arrival_description); /* WPCS: xss ok. */ ?></p>
		<?php endif; ?>
	</div><!-- .site-branding -->
	<?php
	}
}

add_action( 'arrival_main_nav','arrival_main_nav',10 );
if( ! function_exists('arrival_main_nav')){
	function arrival_main_nav(){
		$default = arrival_get_default_theme_options();
		$arrival_main_nav_right_content = get_theme_mod('arrival_main_nav_right_content',$default['arrival_main_nav_right_content']);
		

	?>
		<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Main menu', 'arrival' ); ?>"
				<?php if ( arrival_is_amp() ) : ?>
					[class]=" siteNavigationMenu.expanded ? 'main-navigation toggled-on' : 'main-navigation' "
				<?php endif; ?>
			>
				<?php if ( arrival_is_amp() ) : ?>
					<amp-state id="siteNavigationMenu">
						<script type="application/json">
							{
								"expanded": false
							}
						</script>
					</amp-state>
				<?php endif; ?>

				

				<div class="primary-menu-container">
					<?php

					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'menu_id'        => 'primary-menu',
							'container'      => 'ul',
							'menu_class'	 => 'arrival-main-navigation'
						)
					);

					?>
					<?php if( 'search' == $arrival_main_nav_right_content ){ ?>
						<div class="header-last-item search-wrap">
							<i class="fa fa-search"></i>
						</div>
					<?php }elseif( 'button' == $arrival_main_nav_right_content){ ?>
						<div class="header-last-item search-wrap header-btn">
							<?php do_action('arrival_header_cta_btn_info'); ?>
						</div>
					<?php } ?>
				</div>
			</nav><!-- #site-navigation -->
<?php 
	}
}

//hook search form on footer if enabled
add_action('wp_footer','arrival_top_search');
if( ! function_exists('arrival_top_search')){
	function arrival_top_search(){
		$default = arrival_get_default_theme_options();
		$arrival_main_nav_right_content = get_theme_mod('arrival_main_nav_right_content',$default['arrival_main_nav_right_content']);

		if( 'search' != $arrival_main_nav_right_content ){
			return;
		}
	?>
		<div class="arrival-search-form-wrapp">
			<span class="close"></span>
			<?php get_search_form(); ?>
		</div>
	<?php 
	}
}

//get page details by page id
add_action('arrival_header_cta_btn_info','arrival_header_cta_btn_info');
if( ! function_exists('arrival_header_cta_btn_info')){
	function arrival_header_cta_btn_info(){
		$default = arrival_get_default_theme_options();
		$arrival_main_nav_right_btn = get_theme_mod('arrival_main_nav_right_btn',$default['arrival_main_nav_right_btn']);

		if( empty($arrival_main_nav_right_btn) ){
			return;
		}
		
		$the_query = new WP_Query( array( 'page_id' => $arrival_main_nav_right_btn ) );
		while ($the_query -> have_posts()) : $the_query -> the_post();
		?>
		<a href="<?php the_permalink();?>" class="header-cta-btn"> <?php the_title(); ?></a>
		<?php 
		endwhile;
		wp_reset_postdata();
	}
}
/**
* Top header 
*/
if( ! function_exists('arrival_top_header')){
	function arrival_top_header(){
		$prefix = 'arrival';
		$default = arrival_get_default_theme_options();
		$arrival_top_header_enable = get_theme_mod($prefix.'_top_header_enable',$default[$prefix.'_top_header_enable']);
		
		if( 'off' == $arrival_top_header_enable ){
			return;
		}
	?>
	<div class="top-header-wrapp">
		<div class="container op-grid-two">
		<div class="top-left-wrapp">
			<?php arrival_top_header_left(); ?>
		</div>
		<div class="top-right-wrapp">
			<?php arrival_top_header_right(); ?>
		</div>
		</div>
	</div>
	<?php
	}
}

//top left
add_action('arrival_top_header','arrival_top_header_left',10);
if( ! function_exists('arrival_top_header_left')){
	function arrival_top_header_left(){

		$prefix = 'arrival';
		$default = arrival_get_default_theme_options();
		$arrival_top_header_email = get_theme_mod($prefix.'_top_header_email',$default[$prefix.'_top_header_email']);
		$arrival_top_header_phone = get_theme_mod($prefix.'_top_header_phone',$default[$prefix.'_top_header_phone']);
		
			if( $arrival_top_header_email ): ?>
				<div class="email-wrap">
					<i class="fa fa-envelope"></i>
					<span>
						<?php esc_html_e('Mail Us:','arrival'); ?>
						<a href="mailto:<?php echo sanitize_email($arrival_top_header_email)?>">
							<?php echo sanitize_email($arrival_top_header_email); ?>
						</a>
					</span>
				</div>
			<?php endif; ?>

			<?php if( $arrival_top_header_phone ): ?>
			<div class="phone-wrap">
				<i class="fa fa-phone"></i>
				<span>
					<?php esc_html_e('Call Us:','arrival'); ?>
				</span>
				<a href="tel:<?php echo esc_attr($arrival_top_header_phone);?>">
					<?php echo esc_html($arrival_top_header_phone); ?>
				</a>
			</div>
			<?php endif;

	}
}

//top right
add_action('arrival_top_header','arrival_top_header_right',15);
if( ! function_exists('arrival_top_header_right')){
	function arrival_top_header_right(){

		$prefix = 'arrival';
		$default = arrival_get_default_theme_options();
		$arrival_top_right_header_content = get_theme_mod($prefix.'_top_right_header_content',$default[$prefix.'_top_right_header_content']);
		$arrival_top_right_header_menus = get_theme_mod($prefix.'_top_right_header_menus',$default[$prefix.'_top_right_header_menus']);
	
		if( 'menus' == $arrival_top_right_header_content ){
			?>
			<div class="top-nav-wrap">
				<?php 
					wp_nav_menu(
						array(
							'theme_location' => $arrival_top_right_header_menus,
							'menu_id'        => 'top-header-menu',
							'container'      => 'ul',
							'menu_class'	 => 'arrival-top-navigation',
							'fallback_cb'	 =>	false	 
						)
					);
				 ?>
			</div>
			<?php
		}else{
			do_action('arrival_social_icons');
		}
	}
}

/**
* Mobile navigation
*
*/
add_action('arrival_mob_nav','arrival_mob_nav');
if(! function_exists('arrival_mob_nav')){
	function arrival_mob_nav(){
	?>
	<div class="mob-outer-wrapp">
	<div class="container clearfix">
		<?php arrival_site_logo(); ?>
		<span class="toggle-wrapp">
			<span class="toggle-box">
			<span class="menu-toggle"></span>
			</span>
		</span>
		
	</div>
		<div class="mob-nav-wrapp">
				<?php 
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'container'      => 'ul',
						'menu_class'	 => 'mob-primary-menu'
					)
				);
				do_action('arrival_social_icons');
				 ?>

		</div>
	</div>
<?php
	}
}