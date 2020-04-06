
        <footer id="widgets-and-credits" style="background-image:url(<?php semper_fi_lite_image( 'footer_and_widgets_img_1' , '/inc/footer/images/forest-background-1920x450.jpg' , 1920 , 450 ); ?>);">
        
            <?php if ( (current_user_can( 'editor' ) || current_user_can( 'administrator' ) ) && ( !is_customize_preview() ) ) : ?><a href="<?php echo get_admin_url(); ?>widgets.php" title="<?php _e( 'Only the Admin and Editor can see this Link' , 'semper-fi-lite' ); ?>"><?php _e( 'Edit Widgets?' , 'semper-fi-lite' ); ?></a><?php endif; ?>
            
<?php do_action( 'semper_fi_lite_footer_widgets_action' ) ?>    
            
            <section id="credit-to-schwarttzy">
                
                <p><?php $semper_fi_lite_theme_info = wp_get_theme(); echo __( 'Good Old Fashioned Hand Written WordPress Theme' , 'semper-fi-lite' ) . ' <a href="' . $semper_fi_lite_theme_info->get( 'ThemeURI' ) . '" title="' . $semper_fi_lite_theme_info->get( 'Name' ) . ' - v' . $semper_fi_lite_theme_info->get( 'Version' ) . '">' . $semper_fi_lite_theme_info->get( 'Name' ) . '</a> ' . __( 'by ' , 'semper-fi-lite' ) . '<a href="' . $semper_fi_lite_theme_info->get( 'AuthorURI' ) . '" title="' . __( 'Eric J Schwarz' , 'semper-fi-lite' ) . '">' . $semper_fi_lite_theme_info->get( 'Author' ) . '</a>'; ?></p>
                
            </section>
        
        </footer>

