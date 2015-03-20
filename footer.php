<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Accesspress Mag
 */
?>

	</div><!-- #content -->
    
	<?php
        $apmag_show_footer_switch = of_get_option('footer_switch');
        $apmag_footer_layout = of_get_option('footer_layout');
        $apmag_sub_footer_switch = of_get_option('sub_footer_switch');
        $apmag_copyright_text = of_get_option('mag_footer_copyright');
        $apmag_copyright_symbol = of_get_option('copyright_symbol');
    ?>
    <footer id="colophon" class="site-footer" role="contentinfo">
    
        <?php 
            if($apmag_show_footer_switch!='0'){
            if ( is_active_sidebar( 'footer-1' ) ||  is_active_sidebar( 'footer-2' )  || is_active_sidebar( 'footer-3' )  ) : ?>
			<div class="top-footer footer-<?php echo esc_attr($apmag_footer_layout); ?>">
    			<div class="apmag-container">
                    <div class="footer-block-wrapper clearfix">
        				<div class="footer-block-1 footer-block">
        					<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
        						<?php dynamic_sidebar( 'footer-1' ); ?>
        					<?php endif; ?>
        				</div>
        
        				<div class="footer-block-2 footer-block" style="display: <?php if($apmag_footer_layout=='column1'){echo 'none';}else{echo 'block';}?>;">
        					<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
        						<?php dynamic_sidebar( 'footer-2' ); ?>
        					<?php endif; ?>	
        				</div>
        
        				<div class="footer-block-3 footer-block" style="display: <?php if ($apmag_footer_layout=='column1' || $apmag_footer_layout=='column2'){echo 'none';}else{echo 'block';}?>;">
        					<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
        						<?php dynamic_sidebar( 'footer-3' ); ?>
        					<?php endif; ?>	
        				</div>
                    </div> <!-- footer-block-wrapper -->
                 </div><!--apmag-container-->
            </div><!--top-footer-->
        <?php endif; } ?>
        	         
        <div class="bottom-footer clearfix">
            <div class="apmag-container">
        		<div class="site-info">
                    <?php 
                        if($apmag_sub_footer_switch!='0'){
                            if($apmag_copyright_symbol!='0'){echo '<span class="copyright-symbol">&copy;</span>';}
                            if($apmag_copyright_text!=''){echo '<span class="copyright-text">'.$apmag_copyright_text.' - </span>';}
                        }
                        _e('Accesspress Mag', 'accesspress-mag'); 
                    ?>            
        		</div><!-- .site-info -->
                <div class="ak-info"><?php _e( 'WordPress Theme by', 'accesspress-mag' ); ?> <a title="AccessPress Themes" href="<?php echo esc_url( 'http://accesspressthemes.com', 'accesspress-mag' ); ?>">AccessPress Themes</a></div>
                <div class="subfooter-menu">
                    <?php 
                        $apmag_footer_menu = of_get_option('footer_menu_select');
                        if(!empty($apmag_footer_menu)){
                    ?>
                        <nav id="footer-navigation" class="footer-main-navigation" role="navigation">
                                <button class="menu-toggle hide" aria-controls="menu" aria-expanded="false"><?php _e( 'Footer Menu', 'accesspress-mag' ); ?></button>
                                <?php wp_nav_menu( array( 'menu' => $apmag_footer_menu ) ); ?>
                        </nav><!-- #site-navigation -->
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
	</footer><!-- #colophon -->   
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
