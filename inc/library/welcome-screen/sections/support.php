<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>
<div class="feature-section">
    <div class="row two-col">
        <div class="col">
            <h3><i class="dashicons dashicons-sos"></i><?php esc_html_e( 'Contact Support', 'bee-news' ); ?></h3>
            <p>
                <i><?php esc_html_e( 'We offer excellent support through our advanced ticketing system. Make sure to register your purchase before contacting support!', 'bee-news' ) ?></i>
            </p>
            <p><a target="_blank" class="button button-primary"
                  href="<?php echo esc_url( 'http://www.beepressthemes.com/support/' ); ?>"><?php esc_html_e( 'Contact Support', 'bee-news' ); ?></a>
            </p>
        </div><!--/.col-->

        <div class="col">
            <h3><i class="dashicons dashicons-book-alt"></i><?php esc_html_e( 'Documentation', 'bee-news' ); ?></h3>
            <p>
                <i><?php esc_html_e( 'This is the place to go to reference different aspects of the theme. Our online documentation is an incredible resource for learning the ins and outs of using beenews.', 'bee-news' ) ?></i>
            </p>
            <p>
                <a target="_blank"
                   href="<?php echo esc_url( 'http://docs.beepressthemes.com/' ); ?>"><?php esc_html_e( 'See our full documentation', 'bee-news' ); ?></a>
            </p>
        </div><!--/.col-->
    </div>
</div><!--/.feature-section-->
