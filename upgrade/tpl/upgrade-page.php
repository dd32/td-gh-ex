<div class="wrap upgrade-page-wrap">
    
    <h2 class="upgrade-page-title">
        <?php _e( 'Premium Upgrade', 'topshop' ); ?>
    </h2>
    
    <div class="upgrade-page-inner-wrap">
        
        <div class="upgrade-page-top">
            
            <p class="upgrade-page-top-note">
                <?php printf( __( "Sometimes emails take a while... Please <a href='%s' target='_blank'>Read here</a> for an easy upgrade.", 'topshop' ) , 'https://kairaweb.com/support/purchasing-a-theme/' ); ?>
            </p>
            
            <div class="upgrade-order-number-info-btns">
                <a href="http://kaira.fetchapp.com/sell/a82c3d0f" id="upgrade-purchase-link" target="_blank">
                    <?php printf( __( "<span>Purchase Now </span><em>$20</em>", 'topshop' ) ); ?>
                </a>
                <a href="#" id="upgrade-has-order-number"><?php _e( 'Already have one?', 'topshop' ) ?></a>
            </div>
            
            <div class="upgrade-order-number-info-form">
                <h3 class="upgrade-page-sub-title"><?php _e( 'Enter your Order Number', 'topshop' ); ?></h3>
                
                <p>
                    <?php printf( __( "After purchase you should receive an email with your order number.", 'topshop' ) ); ?>
                </p>
                <p>
                    <?php printf( __( "Please be patient as this email can take a few minutes to come through.", 'topshop' ) ); ?>
                </p>
                
                <form action="<?php echo esc_url( add_query_arg( 'action', 'order-entered' ) ) ?>" method="post" id="upgrade-order-number-info">
                    
                    <input type="text" class="upgrade-text" name="user_order_number">
                    
                    <input type="submit" class="upgrade-submit" value="<?php esc_attr_e( 'Get Upgrade', 'topshop' ) ?>" />
                    <?php wp_nonce_field( 'save_order_number', '_upgrade_nonce' ) ?>
                    
                </form>
                
                <p>
                    <?php printf( __( "If you need to look up your order number, please <a href='%s' target='_blank'>search here</a> using your <strong>PayPal email address</strong>.<br />", 'topshop' ) , 'https://kairaweb.com/orders/' ); ?>
                    <?php _e( 'Also, be sure to check your spam folder if you can\'t find it.', 'topshop' ); ?>
                </p>
                
            </div>
            
        </div>
        <div class="clearboth"></div>
        
        <div class="upgrade-page-left">
            
            <h3 class="upgrade-page-sub-title"><?php _e( 'Upgrade to Premium', 'topshop' ); ?></h3>
            <div class="upgrade-page-left-box">
                <div class="upgrade-page-left-box-left">
                    <?php printf( __( "If you've enjoyed using our TopShop theme to build your website, then you should love the premium version which comes with a bunch of extra features for a low cost of <strong>$20</strong>.<br /><br />With TopShop premium we offer continued updates and you'll get prioritized support to help you build the website you want.", 'topshop' ) ); ?>
                </div>
                <div class="upgrade-page-left-box-right">
                    <img src="<?php echo get_template_directory_uri(); ?>/upgrade/images/upgrade-payment.png" alt="<?php _e( 'Upgrade to Premium', 'topshop' ); ?>" />
                </div>
                <div class="clearboth"></div>
            </div>
            
            <h3 class="upgrade-page-sub-title"><?php _e( 'Continued Updates', 'topshop' ); ?></h3>
            <div class="upgrade-page-left-box">
                <div class="upgrade-page-left-box-left">
                    <?php printf( __( "Once you upgrade to TopShop Premium, you'll then support and move over to our premium updates system which will ensure TopShop works with all future versions of WordPress that are released.", 'topshop' ) ); ?>
                </div>
                <div class="upgrade-page-left-box-right">
                    <img src="<?php echo get_template_directory_uri(); ?>/upgrade/images/upgrade-updates.png" alt="<?php _e( 'Continued Updates', 'topshop' ); ?>" />
                </div>
                <div class="clearboth"></div>
            </div>
            
            <h3 class="upgrade-page-sub-title"><?php _e( 'Get Premium Support', 'topshop' ); ?></h3>
            <div class="upgrade-page-left-box">
                <div class="upgrade-page-left-box-left">
                    <?php printf( __( "Upgrading to TopShop Premium will also give you prioritized support, ensuring we get to your queries first.<br /><br />We have a growing <a href='https://kairaweb.com/support/' target='_blank'>support forum</a> on our website as well as <a href='https://kairaweb.com/support-contact/' target='_blank'>email support</a> to sort out any queries you may have.", 'topshop' ) ); ?>
                </div>
                <div class="upgrade-page-left-box-right">
                    <img src="<?php echo get_template_directory_uri(); ?>/upgrade/images/upgrade-support.png" alt="<?php _e( 'Get Premium Support', 'topshop' ); ?>" />
                </div>
                <div class="clearboth"></div>
            </div>
            
        </div>
        
        <div class="upgrade-page-right">
            
            <div class="upgrade-page-right-box">
                
                <p><?php printf( __( "We aim to keep our prices low, all our themes are under <strong>$30</strong>, while still offering you great WordPress themes.", 'topshop' ) ); ?></p>
                
                <p><?php printf( __( "Upgrading will support us and enable us to keep building WordPress themes.", 'topshop' ) ); ?></p>
                
                <p><?php printf( __( "If you like our themes and/or found our support helpful, please let us know by <a href='%s' target='_blank'>giving us a review</a>.", 'topshop' ) , 'https://wordpress.org/support/view/theme-reviews/topshop#postform' ); ?></p>
                
            </div>
            
            <h3 class="upgrade-page-sub-title"><?php _e( 'Theme Ratings', 'topshop' ); ?></h3>
            
            <div class="upgrade-page-right-box">
                
                <div class="upgrade-rating-slider-wrap upgrade-rating-slider-wrap-remove">
                    <div class="upgrade-rating-slider-prev"></div>
                    <div class="upgrade-rating-slider-next"></div>
                    
                    <div class="upgrade-rating-slider">
                        
                        <div class="upgrade-rating-slider-block">
                            <div class="upgrade-rating-slider-block-title">
                                <?php printf( __( "SpySunny", "topshop" ) ); ?>
                            </div>
                            <div class="upgrade-rating-slider-block-rating">
                                <?php printf( __( "Very user-friendly theme with etopshoplent support.", "topshop" ) ); ?>
                            </div>
                        </div>
                        
                        <div class="upgrade-rating-slider-block">
                            <div class="upgrade-rating-slider-block-title">
                                <?php printf( __( "Fitoni", "topshop" ) ); ?>
                            </div>
                            <div class="upgrade-rating-slider-block-rating">
                                <?php printf( __( "What a great theme!! been using it for a long time, very clean code, easy to use, easy to customize, really cant say any wrong about it!!!<br /><br />Give it a try and you will not be dissapointed! this theme is THE BEST!!", "topshop" ) ); ?>
                            </div>
                        </div>
                        
                        <div class="upgrade-rating-slider-block">
                            <div class="upgrade-rating-slider-block-title">
                                <?php printf( __( "NayWordPress", "topshop" ) ); ?>
                            </div>
                            <div class="upgrade-rating-slider-block-rating">
                                <?php printf( __( "I've purchased the Premium Theme for my Online Store. Very awesome! Support assistance 100&#37; available, easy to customize. I recommend it to everyone who want to build a Store Online. Really practicable for E-commerce.", "topshop" ) ); ?>
                            </div>
                        </div>
                        
                    </div>
                    <div class="clearboth"></div>
                </div>
                
            </div>
            
        </div>
        
        <div class="clearboth"></div>
    </div>
    
</div>