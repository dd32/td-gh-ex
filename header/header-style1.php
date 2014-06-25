<?php 
	global $accesspresslite_options;
	$accesspresslite_settings = get_option( 'accesspresslite_options', $accesspresslite_options );
	if(!empty($accesspresslite_settings['sticky_header']) && $accesspresslite_settings['sticky_header'] == 1){
		$accesspresslite_sticky_header = " sticky-header";
	}else{
		$accesspresslite_sticky_header = "";
	}
?>
    <div id="top-header">
		<div class="ak-container">
			<div class="site-branding">
				
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php if ( get_header_image() ) { ?>
					<img src="<?php header_image(); ?>" alt="<?php bloginfo('name') ?>">
				<?php } ?>
				</a>
				
			</div><!-- .site-branding -->
        

			<div class="right-header clear">
				<?php 
				do_action( 'accesspresslite_header_text' ); 
                ?>
                <div class="clear"></div>
                <?php
				/** 
				* @hooked accesspresslite_social_cb - 10
				*/
				if($accesspresslite_settings['show_social_header'] == 0){
				do_action( 'accesspresslite_social_links' ); 
				}

				if($accesspresslite_settings['show_search'] == 1){ ?>
				<div class="ak-search">
					<?php get_search_form(); ?>
				</div>
				<?php } ?>
			</div><!-- .right-header -->
		</div><!-- .ak-container -->
 	</div><!-- #top-header -->

  	<nav id="site-navigation" class="main-navigation <?php echo $accesspresslite_sticky_header; ?>">
		<div class="ak-container">
			<h1 class="menu-toggle"><?php _e( 'Menu', 'accesspresslite' ); ?></h1>
			<?php wp_nav_menu( array( 
					'theme_location' => 'primary',
					'container'      => 'div',
					'container_class'=> 'menu',
					'items_wrap'      => '<ul>%3$s</ul>',
					 ) ); ?>
		</div>
	</nav><!-- #site-navigation -->