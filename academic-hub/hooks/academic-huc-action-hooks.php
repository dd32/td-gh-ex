<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package     Academic Hub
 * @author      Podamibe Nepal
 * @copyright   Copyright (c) 2019, Podamibe Nepal
 * @link        http://podamibenepal.com
 * @since       Academic Hub 1.0.0
 * */


/**
 * Academic Hub Header
*/
if ( ! function_exists( 'academic_hub_header_section' ) ) {

	/**
	 * Academic Hub Header
	 *
	 * @since 1.0.0
	 * @return void            
	 */
	function academic_hub_header_section(){
		$academic_hub_header_image = get_header_image();
		
        ?>
        <!-- Academic Hub Header Section -->
            <nav class="navbar navbar-default" <?php if( !empty($academic_hub_header_image) ): ?> style="background:url('<?php echo esc_url( $academic_hub_header_image ); ?>')" <?php endif; ?> >
                <div class="container">

                    <?php do_action( 'academic_hub_header_content' ); ?>
                    
                </div><!-- /.container-fluid -->
            </nav>
        <!-- #Academic Hub Header Section -->
		<?php
	}
}

add_action( 'academic_hub_header', 'academic_hub_header_section' );



/**
 * Header Site Branding
 * @since 1.0.0
*/
if ( ! function_exists( 'academic_hub_header_site_branding_section' ) ) {

	/**
	 * Header Site Branding
	 *
	 * @since 1.0.0
	 * @return void            
	 */
	function academic_hub_header_site_branding_section(){
        ?>
        <!-- Academic Hub Header Section -->
            <div class="navbar-header">
                <div class="site-branding">
                    <?php
                        the_custom_logo();
                        ?>
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php
                        
                        $academic_hub_description = get_bloginfo( 'description', 'display' );
                        if ( $academic_hub_description || is_customize_preview() ) :
                    ?>
                        <p class="site-description"><?php echo $academic_hub_description; /* WPCS: xss ok. */ ?></p>
                    <?php endif; ?>
                </div><!-- .site-branding -->
            </div>
        <!-- #Academic Hub Header Section -->
		<?php
	}
}

add_action( 'academic_hub_header_content', 'academic_hub_header_site_branding_section',10 );




/**
 * Header Nav Menu
 * @since 1.0.0
*/
if ( ! function_exists( 'academic_hub_header_nav_section' ) ) {

	/**
	* Header Nav Menu
	 *
	 * @since 1.0.0
	 * @return void            
	 */
	function academic_hub_header_nav_section(){
        ?>
       

        <nav id="site-navigation" class="main-navigation">
                        <button class="main-menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i
                                    class="fa fa-bars"></i></button>
                        <div class="search_main_menu">
                            <a href="javascript:void(0)"><i class="fas fa-search"></i></a>
                        </div>
                        <div class="main-menu-container-collapse">
                        <?php
                        /**
                         * Nav Menu
                         * @since 1.0.0
                         */
                            wp_nav_menu( array(
                                'theme_location' 	=> 'menu-1',
                                'menu_id'        	=> 'primary-menu',
                                'container'			=>'ul',
                                'menu_class'	 	=>  'menu nav-menu',
                            ) );
                        ?>
                           
                        </div>`
                    </nav>


		<?php
	}
}

add_action( 'academic_hub_header_content', 'academic_hub_header_nav_section',20 );