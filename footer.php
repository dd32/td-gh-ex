<?php
/**
 * footer.php
 *
 * @author    Denis Franchi
 * @package   Avik
 * @version   1.0.0
 */
 ?>
 </div> <!--Content -->
    <footer>
     <div class="jumbotron">
        <!-- Social Icons Contact -->
        <div class="avik-social-icons-footer" data-aos="zoom-in">
		         <ul class="avik-social-icons-footer-ul">
                   <?php get_template_part( 'inc/social' ); ?>
		         </ul>
        </div>
        <hr class="my-4 avik-footer">
        <?php if ( false == get_theme_mod( 'enable_copyright_footer', false) ) :?>
         <p>
           &copy; <?php echo date("Y"); echo " "; echo bloginfo('name'); ?>
         </p>
          <?php endif; ?> 
          <?php if ( false == get_theme_mod( 'enable_power_footer', false) ) :?>
          <p class="title-power"><?php echo get_theme_mod( 'title_power_footer','Created by DF Design'); ?></p>
          <?php endif; ?> 
     </div>
    </footer>
    </div><!-- #page -->
<?php wp_footer(); ?>
<?php if ( false == get_theme_mod( 'enable_to_top', false) ) :?>
<div id="avik-scrol-to-top"><p><?php esc_html_e( 'BACK TO TOP', 'avik')?></p></div>
<?php endif; ?> 
</body>

</html>
