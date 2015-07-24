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
                   <?php if( get_theme_mod( 'hide_copyright' ) == '') { ?>
    <?php esc_attr_e('&copy;', 'responsive'); ?> <?php _e(date('Y')); ?><a href="<?php echo home_url('/') ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
        <?php echo get_theme_mod( 'copyright_textbox', 'No copyright information has been saved yet.' ); ?>
    </a><?php } // end if ?>
                        <p> This site is powered by <a href="https://wordpress.org/">WordPress</a></p>
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
