
        <footer id="widgets-and-credits" style="background-image:url(<?php echo get_theme_mod( 'footer_and_widgets_img_1' , get_template_directory_uri() . '/images/forest-background-1920x450.jpg' ); ?>);">
        
            <?php if ( (current_user_can('editor') || current_user_can('administrator')) && (!is_customize_preview()) ) : ?><a href="<?php echo get_admin_url(); ?>widgets.php" title="Only the Admin and Editor can see this Link">Edit Widgets?</a><?php endif; ?>
            
<?php do_action('footer_widgets') ?>    
            
            <section id="credit-to-schwarttzy">
                
                <p>Good Old Fashioned Hand Written WordPress Theme <a href="<?php $my_theme = wp_get_theme(); echo $my_theme->get( 'ThemeURI' );?>" title="<?php $my_theme = wp_get_theme(); echo $my_theme->get( 'Name' ); ?> - v<?php $my_theme = wp_get_theme(); echo $my_theme->get( 'Version' );?>"><?php echo $my_theme->get( 'Name' ); ?></a> by <a href="<?php $my_theme = wp_get_theme(); echo $my_theme->get( 'AuthorURI' );?>" title="Eric J Schwarz"><?php echo $my_theme->get( 'Author' );?></a></p>
                
            </section>
        
        </footer>

