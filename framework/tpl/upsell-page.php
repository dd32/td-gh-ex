<?php
/**
 * The UpSell page included on the admin settings page
 *
 * @package conica
 */ ?>

<div class="premium-upsell-wrap">
    
    <h4>
        <?php echo __( '<a href="http://sllwi.re/p/EK" target="_blank">Upgrade to Conica Premium</a> to get all the features for the Conica theme.', 'conica' ); ?>
    </h4>
    
    <div class="premium-albar-wrap">
        
        <div class="premium-albar-block">
            <div class="premium-albar-block-left">
                <h6><?php echo __( 'Website Layout', 'conica' ); ?></h6>
                <span class="description">
                    <?php echo __( 'Have the option to select between 2 different site layouts... Full width or boxed.', 'conica' ); ?>
                </span>
            </div>
            <div class="premium-albar-block-right">
                <img src="<?php echo get_template_directory_uri(); ?>/framework/images/web-layout-one.jpg" alt="Website layout one" /><br /><br />
                <img src="<?php echo get_template_directory_uri(); ?>/framework/images/web-layout-two.jpg" alt="Website layout two" />
            </div>
            <div class="clearboth"></div>
        </div>
        
        <div class="premium-albar-block">
            <div class="premium-albar-block-left">
                <h6><?php echo __( 'Sticky Header', 'conica' ); ?></h6>
                <span class="description">
                    <?php echo __( 'Upgrade to enable the sticky header option that keeps the header at the top of the browser and re-sizes to be smaller.', 'conica' ); ?>
                </span>
            </div>
            <div class="premium-albar-block-right">
                <img src="<?php echo get_template_directory_uri(); ?>/framework/images/sticky-header.jpg" alt="Sticky header" />
            </div>
            <div class="clearboth"></div>
        </div>
        
        <div class="premium-albar-block">
            <div class="premium-albar-block-left">
                <h6><?php echo __( 'Slider Transitions', 'conica' ); ?></h6>
                <span class="description">
                    <?php echo __( 'Enable the options to change the transition effect on the home page slider.', 'conica' ); ?>
                </span>
            </div>
            <div class="premium-albar-block-right">
                <img src="<?php echo get_template_directory_uri(); ?>/framework/images/slider-transitions.jpg" alt="Slider transitions" />
            </div>
            <div class="clearboth"></div>
        </div>
        
        <div class="premium-albar-block">
            <div class="premium-albar-block-left">
                <h6><?php echo __( 'Blog Layout', 'conica' ); ?></h6>
                <span class="description">
                    <?php echo __( 'Select between 2 different blog layouts, standard and grid', 'conica' ); ?>
                </span>
            </div>
            <div class="premium-albar-block-right">
                <img src="<?php echo get_template_directory_uri(); ?>/framework/images/blog-layout.jpg" alt="Blog layout" />
            </div>
            <div class="clearboth"></div>
        </div>
        
        <div class="premium-albar-block">
            <div class="premium-albar-block-left">
                <h6><?php echo __( 'Footer Copy Text', 'conica' ); ?></h6>
                <span class="description">
                    <?php echo __( 'Enable the option to add your own copyright text to the footer', 'conica' ); ?>
                </span>
            </div>
            <div class="premium-albar-block-right">
                <img src="<?php echo get_template_directory_uri(); ?>/framework/images/footer-text.jpg" alt="Footer copy text" />
            </div>
            <div class="clearboth"></div>
        
        <div class="clearboth"></div>
    </div>
    
    <h5>
        <?php echo __( 'View <a href="http://codecanyon.net/user/cxThemes/portfolio" target="_blank">our WooCommerce extensions</a> that we\'ve made to improve your online store.', 'conica' ); ?>
    </h5>
    
    <div class="premium-plugins-wrap">
    
        <a href="http://codecanyon.net/item/email-cart-for-woocommerce/5568059" target="_blank" class="premium-plugin-block">
            <img src="<?php echo get_template_directory_uri(); ?>/framework/images/cx-emc.jpg" alt="Email Cart for WooCommerce" />
            <div class="premium-plugin-block-desc"><?php echo __( 'Email Cart is a useful plugin which allows customers and admins to send a pre-populated WooCommerce Cart to any email address ready for checkout', 'conica' ); ?></div>
        </a>
        <a href="http://codecanyon.net/item/create-customer-on-order-for-woocommerce/6395319" target="_blank" class="premium-plugin-block">
            <img src="<?php echo get_template_directory_uri(); ?>/framework/images/cx-ccoo.jpg" alt="Email Cart for WooCommerce" />
            <div class="premium-plugin-block-desc"><?php echo __( 'Save time and simplify your life by having the ability to create a new Customer directly on the WooCommerce Order screen', 'conica' ); ?></div>
        </a>
        <a href="http://codecanyon.net/item/shop-as-customer-for-woocommerce/7043722" target="_blank" class="premium-plugin-block">
            <img src="<?php echo get_template_directory_uri(); ?>/framework/images/cx-sac.jpg" alt="Email Cart for WooCommerce" />
            <div class="premium-plugin-block-desc"><?php echo __( 'Shop as Customer allows a store Admin or Shop Manager to shop the front-end of the store as another User', 'conica' ); ?></div>
        </a>
        <a href="http://codecanyon.net/item/email-control-for-woocommerce/8654473" target="_blank" class="premium-plugin-block">
            <img src="<?php echo get_template_directory_uri(); ?>/framework/images/cx-ec.jpg" alt="Email Cart for WooCommerce" />
            <div class="premium-plugin-block-desc"><?php echo __( 'Email Control provides enhanced control over your store emails by allowing you to preview and send tests of the emails that the customer will receive', 'conica' ); ?></div>
        </a>
        <a href="http://codecanyon.net/item/shop-assistant-for-woocommerce/6644090" target="_blank" class="premium-plugin-block">
            <img src="<?php echo get_template_directory_uri(); ?>/framework/images/cx-shfw.jpg" alt="Email Cart for WooCommerce" />
            <div class="premium-plugin-block-desc"><?php echo __( 'Shop Assistant offers your customers a natural language search function where they complete a specific search tailored to their needs', 'conica' ); ?></div>
        </a>
        
        <div class="clearboth"></div>
    </div>
    
    <div class="clearboth"></div>
</div>