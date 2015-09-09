<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package BBird Under
 */
?>

	
	

	<footer id="colophon" class="site-footer" role="contentinfo">
		             
               
                
                    <?php
                    if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ))  :
                        echo '<div class="footer-bg row">';
$footer_columns = get_theme_mod('footer_widgets');
 switch ( $footer_columns ) {
            case 'no':
                //do nothing, really
                break;
            case 'one':
               echo '<div class="medium-12 columns">';
               dynamic_sidebar( 'footer-1' );
                echo '</div>';               
                break;
            case 'two':
                echo '<div class="medium-6 columns">';
                dynamic_sidebar( 'footer-1' );
                echo'</div><div class="medium-6 columns">';
                dynamic_sidebar( 'footer-2' );
                echo '</div>'; 
                break;
            case 'three':
                echo '<div class="medium-4 columns">';
                dynamic_sidebar( 'footer-1' );
                echo '</div><div class="medium-4 columns">';
                dynamic_sidebar( 'footer-2' );
                echo '</div><div class="medium-4 columns">';
                dynamic_sidebar( 'footer-3' );
                echo '</div>'; 
                break;
            case 'four':
                echo '<div class="medium-3 columns">';
                dynamic_sidebar( 'footer-1' );
                echo '</div><div class="medium-3 columns">';
                dynamic_sidebar( 'footer-2' );
                echo '</div><div class="medium-3 columns">';
                dynamic_sidebar( 'footer-3' );
                echo '</div><div class="medium-3 columns">';
                dynamic_sidebar( 'footer-4' );
                echo '</div>'; 
                break;
        }
        echo '</div>';
endif;
?>
               
               <div class="site-info">
                   
                   
                   
                 <div class="copyright">
                    <p>   &copy; <?php echo date("Y") ?> <?php printf( __( 'Copyright text', 'bbird-under' )); ?> </p>                    
                    <p>  
                        <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'bbird-under' ) ); ?>">
                        <?php printf( __( 'Proudly powered by %s', 'bbird-under' ), 'WordPress' ); ?>
                        </a>
                    </p>
                  
                 	  </div>
			
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<a href="#0" class="go-back">Top</a>
  </div> <!--inner wrap  -->
    </div> <!--inner wrap  -->
<?php wp_footer(); ?>


</body>
</html>
