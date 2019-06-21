 <?php
 /**
 * The template for displaying the footer
 *
 */
 ?>       
        <footer id="footer">
                <div class="row">
                    <div class="col-md-4">
                        <?php dynamic_sidebar('footer-one'); ?>
                    </div>
                    <div class="col-md-4">
                        <?php dynamic_sidebar('footer-two'); ?>
                    </div>
                    <div class="col-md-4">
                        <?php dynamic_sidebar('footer-three'); ?>
                    </div>
                </div>
            
            <div id="copyright">
                    <div class="row">
                        <div class="col-md-12">                    
                        <?php echo __('&copy; ', 'wp-news-stream') . esc_attr( get_bloginfo( 'name', 'display' ) );  ?>
                        <?php if(is_home() && !is_paged()){?>            
                            <?php echo __(' - Built with','wp-news-stream'); ?> <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'wp-news-stream' ) ); ?>" target="_blank"><?php printf( esc_html( '%s', 'wp-news-stream' ), 'WordPress' ); ?></a><span><?php esc_html_e(' and ','wp-news-stream'); ?></span><a href="<?php echo esc_url( __( 'https://wpdevshed.com/news-stream-theme/', 'wp-news-stream' ) ); ?>" target="_blank"><?php printf( esc_html( '%s', 'wp-news-stream' ), 'WP News Stream' ); ?></a>
                        <?php } ?>
                        </div>
                    </div>
            </div>
            
        </footer>
        <!-- WP Footer -->
	</div> <!--end id main-container-->
</div> <!--end id wrapper-->

<?php wp_footer(); ?>
</body>
</html>