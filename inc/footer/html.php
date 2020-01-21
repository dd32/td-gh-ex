
        <footer id="widgets-and-credits" style="background-image:url(<?php echo esc_url( get_theme_mod( 'footer_and_widgets_img_1' , get_template_directory_uri() . '/inc/footer/images/forest-background-1920x450.jpg' ) ); ?>);">
        
            <?php if ( (current_user_can( 'editor' ) || current_user_can( 'administrator' ) ) && ( !is_customize_preview() ) ) : ?><a href="<?php echo get_admin_url(); ?>widgets.php" title="<?php _e( 'Only the Admin and Editor can see this Link' , 'semper-fi-lite' ); ?>"><?php _e( 'Edit Widgets?' , 'semper-fi-lite' ); ?></a><?php endif; ?>
            
<?php do_action('footer_widgets') ?>    
            
            <section id="credit-to-schwarttzy">
                
                <p><?php $my_theme = wp_get_theme(); echo __( 'Good Old Fashioned Hand Written WordPress Theme' , 'semper-fi-lite' ) . ' <a href="' . $my_theme->get( 'ThemeURI' ) . '" title="' . $my_theme->get( 'Name' ) . ' - v' . $my_theme->get( 'Version' ) . '">' . $my_theme->get( 'Name' ) . '</a> ' . __( 'by ' , 'semper-fi-lite' ) . '<a href="' . $my_theme->get( 'AuthorURI' ) . '" title="Eric J Schwarz">' . $my_theme->get( 'Author' ) . '</a>'; ?></p>
                
            </section>
        
        </footer>

