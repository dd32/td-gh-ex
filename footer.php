<?php
/**
 * The template for displaying the footer.
 *
 * Closes the <div> for #content, #content-main and #container, <body> and <html> tags.
 *
 * @package WordPress
 * @subpackage Graphene
 * @since Graphene 1.0
 */
global $graphene_settings;
?>    
    </div><!-- #content-main -->
    
    <?php
    
        /* Sidebar 1 on the right side? */
        if ( in_array(graphene_column_mode(), array('two-col-left', 'three-col-left')) ){
            get_sidebar();
        }
        /* Sidebar 2 on the right side? */
        if ( in_array(graphene_column_mode(), array('three-col-left', 'three-col-center')) ){
            get_sidebar('two');
        }
    
    ?>
    

</div><!-- #content -->

<?php /* Get the footer widget area */ ?>
<?php get_template_part('sidebar', 'footer'); ?>

<?php do_action('graphene_before_footer'); ?>

<div id="footer" class="clearfix">
    
    <?php if (!$graphene_settings['hide_copyright']) : ?>
    <div id="copyright">
    	<h3><?php _e('Copyright', 'graphene'); ?></h3>
		<?php if ($graphene_settings['copy_text'] == '') : ?>
            <p>
            <?php _e('Except where otherwise noted, content on this site is licensed under a <a href="http://creativecommons.org/licenses/by-nc-nd/3.0/">Creative Commons Licence</a>.', 'graphene'); ?>
            </p>
        <?php else : ?>
        	<?php echo stripslashes($graphene_settings['copy_text']); ?>
 	    <?php endif; ?>
        
        <?php if ($graphene_settings['show_cc']) : ?>
        	<p class="cc-logo"><span>Creative Commons Licence BY-NC-ND</span></p>
        <?php endif; ?>

    	<?php do_action('graphene_copyright'); ?>
    </div>
<?php endif; ?>

	<div class="footer-menu-wrap">
    	<ul id="footer-menu" class="clearfix">
			<?php /* Footer menu */
            $args = array(
                'container' => '',
                'fallback_cb' => 'none',
                'depth' => 2,
                'theme_location' => 'footer-menu',
                'items_wrap' => '%3$s'
            );
            wp_nav_menu(apply_filters('graphene_secondary_menu_args', $args));
            ?>
            <?php if ( ! $graphene_settings['hide_return_top'] ) : ?>
        	<li class="menu-item return-top"><a href="#"><?php _e('Return to top', 'graphene'); ?></a></li>
            <?php endif; ?>
        </ul>
    </div>

    <div id="developer">
        <p>
        <?php /* translators: %1$s is the link to WordPress.org, %2$s is the theme's name */ ?>
<?php printf(__('Powered by %1$s and the %2$s.', 'graphene'), '<a href="http://wordpress.org/">WordPress</a>', '<a href="http://www.khairul-syahir.com/wordpress-dev/graphene-theme">' . __('Graphene Theme', 'graphene') . '</a>'); ?>
        </p>

	<?php do_action('graphene_developer'); ?>
    </div>
    
    <?php do_action('graphene_footer'); ?>
</div><!-- #footer -->

<?php do_action('graphene_after_footer'); ?>

</div><!-- #container -->

<?php if (!get_theme_mod('background_image', false) && !get_theme_mod('background_color', false)) : ?>
    </div><!-- .bg-gradient -->
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>