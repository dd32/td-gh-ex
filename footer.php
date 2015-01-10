<?php if(is_active_sidebar('footer-sidebar-1') && is_active_sidebar('footer-sidebar-2')): ?> 
   <footer class="kt-footer">
   <div class="container">
        <div class="row">
        <?php $beyond_fsn = esc_html(of_get_option('footer_sidebars_number','1')); 
              if($beyond_fsn == 1):
        ?>
               <div class="col-md-12 kt-sidebar">
                    <?php if (!dynamic_sidebar( 'footer-sidebar-1')): ?>
                        <div class="pre-widget">
                            <h3><?php _e('Widgetized Sidebar', 'beyondmagazine'); ?></h3>
                            <p><?php _e('This panel is active and ready for you to add 
                            some widgets via the WP Admin', 'beyondmagazine'); ?></p>
                        </div>
                    <?php endif; ?>
                </div>    
        <?php elseif($beyond_fsn == 2): ?>
                <div class="col-md-6 kt-sidebar">
                    <?php if (!dynamic_sidebar( 'footer-sidebar-1')): ?>
                        <div class="pre-widget">
                            <h3><?php _e('Widgetized Sidebar', 'beyondmagazine'); ?></h3>
                            <p><?php _e('This panel is active and ready for you to add 
                            some widgets via the WP Admin', 'beyondmagazine'); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-6 kt-sidebar">
                    <?php if (!dynamic_sidebar( 'footer-sidebar-2')): ?>
                        <div class="pre-widget">
                            <h3><?php _e('Widgetized Sidebar', 'beyondmagazine'); ?></h3>
                            <p><?php _e('This panel is active and ready for you to add 
                            some widgets via the WP Admin', 'beyondmagazine'); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
        <?php else: ?>
               <div class="col-md-12 kt-sidebar">
                    <?php if (!dynamic_sidebar( 'footer-sidebar-1')): ?>
                        <div class="pre-widget">
                            <h3><?php _e('Widgetized Sidebar', 'beyondmagazine'); ?></h3>
                            <p><?php _e('This panel is active and ready for you to add 
                            some widgets via the WP Admin', 'beyondmagazine'); ?></p>
                        </div>
                    <?php endif; ?>
                </div>    
        <?php endif ;?>    
        </div>
    </div>
   </footer>
<?php endif; ?>
            <div id="kt-copyright">
                <div class="row">
                    <div class="col-md-12">
                        <div class="kt-copyright-column">
                        <p><a rel="nofollow" href="<?php echo esc_url( __( 'http://www.ketchupthemes.com/beyond-magazine/', 'beyondmagazine')); ?>">
                        <?php printf( __( 'Beyond Magazine', 'beyondmagazine' )); ?></a>, <?php echo __('&copy;','beyondmagazine').date('Y'); ?> <?php echo get_bloginfo('name'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
    
    </div>
   </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <?php wp_footer();?>
  </body>
</html>