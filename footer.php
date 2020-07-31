<?php
/**
* footer.php
* @author    Franchi Design
* @package   Atomy
*/

?>

</div><!-- #content --> 
 <footer id="colophon" class="footer_area"> 
            <div class="<?php if ( false == get_theme_mod('atomy_enable_full_width_footer', false) ):?>container-fluid pl-0 pr-0 <?php endif;?> <?php if ( true == get_theme_mod('atomy_enable_full_width_footer', true) ):?><?php echo esc_html( get_theme_mod( 'atomy_enable_full_width_body','container') )?><?php endif;?>">
                <div class="footer_copyright text-center container-fluid">
                  <div class="row">
                   <div class="col-lg-12 col-md-12">
                    <h5>
                      <?php if ( false == get_theme_mod( 'at_enable_copyright_footer', false) ) : ?>
                       &copy;<?php echo esc_html(date("Y")); echo " "; echo bloginfo('name'); ?>
                       <?php endif; // End Function Customize Enable Copyright Footer ?>
                       <span>
                        <a rel="author" target="_blank" href="<?php echo esc_url(atomy_url_copyright_theme); ?>">
                        <?php  echo esc_html__('By Franchi Design','atomy');?></a>
                       </span>
                    </h5>
                    </div>
                </div>
              </div>
            </div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); 
?>
</body>
</html>








