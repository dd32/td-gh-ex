<?php
/*
* Footer Section Closing Container 
* @since 1.0.0
* @package appdetail
*/ 
if ( ! function_exists( 'appdetail_container_closing' ) ) :
    /**
     * Footer Section Closing Container 
     *
     * @since 1.0.0
     */
    function appdetail_container_closing() {
  
    ?>
    		</div><!-- #row -->
		</div><!-- #container -->
	</div><!-- #content -->

    
    <?php
    }
endif;


add_action( 'appdetail_container_closing_action', 'appdetail_container_closing', 10 );



/*
* Footer Section site-footer class 
* @since 1.0.0
* @package appdetail
*/ 
if ( ! function_exists( 'appdetail_site_footer_start' ) ) :
    /**
     * Footer Section site-footer class
     *
     * @since 1.0.0
     */
    function appdetail_site_footer_start() {

    if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')) 
    {
      $value="top-footer-widget";
    
    ?>
    <footer id="footer" class="footer <?php echo  esc_attr($value); ?>">
        
<?php
 }

    }
endif;
add_action( 'appdetail_site_footer_start_action', 'appdetail_site_footer_start', 10 );
	
/*
* Footer Section footer widget section 
* @since 1.0.0
* @package appdetail
*/ 
if ( ! function_exists( 'appdetail_site_footer_widget' ) ) :
    /**
     * Footer Section footer widget section
     *
     * @since 1.0.0
     */
    function appdetail_site_footer_widget() { 
		if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')) {
    
   	$count = 0;
		for ( $i = 1; $i <= 4; $i++ )
		    {
			  if ( is_active_sidebar( 'footer-' . $i ) )
			        {
						$count++;
					}
			}
		$column=3;
		if( $count == 4 ) 
		{
		   	$column = 3;  
	   
		}
        elseif( $count == 3)
        {
             	$column=4;
        }
        elseif( $count == 2) 
        {
             	$column = 6;
        }
       elseif( $count == 1) 
        {
             	$column = 12;
        }
	?>
		<div class="foot-top">
			<div class="container">
				<div class="row">
					
				<?php
				for ( $i = 1; $i <= 4 ; $i++ )
		    	{
				  	if ( is_active_sidebar( 'footer-' . $i ) )
				  	{ 
				?>

					<div class="col-md-<?php echo  absint( $column ); ?>">
						<?php dynamic_sidebar( 'footer-' . $i ); ?>
					</div>
				<?php }

			    }
				
				?>	

				</div>
			</div>
		</div>
	<?php
    }
   }
endif;
add_action( 'appdetail_site_footer_widget_action', 'appdetail_site_footer_widget', 10 );

/*
* Footer Section footer widget section 
* @since 1.0.0
* @package appdetail
*/ 
if ( ! function_exists( 'appdetail_footer_site_info' ) ) :
    /**
     * Footer Section footer widget section
     *
     * @since 1.0.0
     */
    function appdetail_footer_site_info() { 
    	global $appdetail_theme_options;
  		$appdetail_copyright = wp_kses_post( $appdetail_theme_options['appdetail-footer-copyright'] );
        ?>

		<div class="foot-bottom" align="center">
			<p class="copyright">
				<?php echo esc_html($appdetail_copyright); ?>				
			</p>
			<div class="powered-text">
                <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'appdetail' ) ); ?>"><?php printf( 
                   /* translators: 1: copyright. */
                    esc_html__( 'Proudly powered by %s', 'appdetail' ), 'WordPress' ); ?></a>
			</div>
		</div><!-- .site-info -->
<?php
    }
endif;
add_action( 'appdetail_footer_site_info_action', 'appdetail_footer_site_info', 10 );


/*
* Footer Section closing 
* @since 1.0.0
* @package appdetail
*/ 
if ( ! function_exists( 'appdetail_footer_closing' ) ) :
    /**
     * Footer Section footer widget section
     *
     * @since 1.0.0
     */
    function appdetail_footer_closing() { ?>
		</footer><!-- #colophon -->
<?php
    }
endif;
add_action( 'appdetail_footer_closing_action', 'appdetail_footer_closing', 10 );