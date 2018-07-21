<?php
/**
 * footer.php
 *
 * @author    Denis Franchi
 * @package   Avik
 * @version   1.1.1
 */
 ?>
 </div> <!--Content --> 
    <footer>
     <div class="jumbotron">
        <!-- Social Icons Contact -->
       
		         <div class="avik-social-icons-footer" data-aos="zoom-in">
                   <?php get_template_part( 'inc/social' ); ?>
</div>  
        <hr class="my-4 avik-footer">
        <?php if ( false == esc_attr( get_theme_mod( 'avik_enable_copyright_footer', false) )) :?>
         <p>
           &copy; <?php echo date("Y"); echo " "; echo bloginfo('name'); ?>
         </p>
          <?php endif; ?> 
          <?php if ( false == esc_attr( get_theme_mod( 'avik_enable_power_footer', false) )) :?>
          <p class="title-power"><?php echo esc_html( get_theme_mod( 'avik_title_power_footer','Created by DF Design')); ?></p>
          <?php endif; ?> 
     </div>
    </footer>
    </div><!-- #page -->
<?php wp_footer(); ?>
<?php if ( false == esc_attr( get_theme_mod( 'avik_enable_to_top', false) )) :?>
<div id="avik-scrol-to-top"><p><?php esc_html_e( 'BACK TO TOP', 'avik')?></p></div>
<?php endif; ?> 
</body>

</html>
