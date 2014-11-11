   <footer id="kt-footer">
                <div class="row">
                    <div class="col-md-6">
                        <div class="kt-footer-column">
                        <?php if (!dynamic_sidebar( 'left-footer-sidebar')): ?>
                        <div class="pre-widget">
                            <h3><?php _e('Widgetized Sidebar', 'businesscard'); ?></h3>
                            <p><?php _e('This panel is active and ready for you to add 
                            some widgets via the WP Admin', 'businesscard'); ?></p>
                        </div>
                        <?php endif; ?>   
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="kt-footer-column">
                        <?php if (!dynamic_sidebar( 'right-footer-sidebar')): ?>
                        <div class="pre-widget">
                            <h3><?php _e('Widgetized Sidebar', 'businesscard'); ?></h3>
                            <p><?php _e('This panel is active and ready for you to add 
                            some widgets via the WP Admin', 'businesscard'); ?></p>
                        </div>
                        <?php endif; ?> 
                        </div>
                    </div>
                </div>
            </footer>
            <div id="kt-copyright">
                <div class="row">
                    <div class="col-md-12">
                        <div class="kt-footer-column">
                        <p class="small">&copy; Copyright 2014, Beyond Magazine Theme. All Rights Reserved</p>
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