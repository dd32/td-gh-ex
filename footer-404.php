<?php
/**
* footer-404.php
* @author    Franchi Design
* @package   Atomy
* @version   1.0.3
*/

?>

</div><!-- #content -->
 <footer id="colophon" class="footer_area mt-5">
            <div class="container-fluid pl-0 pr-0">
                <div class="footer_copyright text-center">
                    <h5>
                    <?php if ( true == esc_attr( get_theme_mod( 'at_enable_copyright_footer', false) )) : ?>
                     &copy;<?php echo esc_html(date("Y")); echo " "; echo bloginfo('name'); ?>
                     <?php endif; // End Function Customize Enable Copyright Footer ?>
                     <span>
                     <a rel="author" target="_blank" href=""<?php echo esc_url(atomy_url_copyright_theme); ?>">
                        <?php  echo esc_html('Franchi Design','atomy');?></a>
                     </span>
                     </h5>
                </div>
            </div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer();
 ?>
</body>
</html>








