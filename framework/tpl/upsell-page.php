<?php
/**
 * The UpSell page included on the admin settings page
 *
 * @package albar
 */ ?>

<div class="premium-upsell-wrap">
    
    <h4>
        <?php echo __( '<a href="http://sllwi.re/p/Eu" target="_blank">Upgrade to Albar Premium</a> to get all the features for the Albar theme.', 'albar' ); ?>
    </h4>
    
    <div class="premium-albar-wrap">
        
        <div class="premium-albar-block">
            <div class="premium-albar-block-left">
                <h6><?php echo __( 'Header Layout', 'albar' ); ?></h6>
                <span class="description">
                    <?php echo __( 'Have the option to select between 2 different header layouts.', 'albar' ); ?>
                </span>
            </div>
            <div class="premium-albar-block-right">
                <img src="<?php echo get_template_directory_uri(); ?>/framework/images/albar-header-one.jpg" alt="Albar header layout one" /><br /><br />
                <img src="<?php echo get_template_directory_uri(); ?>/framework/images/albar-header-two.jpg" alt="Albar header layout two" />
            </div>
            <div class="clearboth"></div>
        </div>
        
        <div class="premium-albar-block">
            <div class="premium-albar-block-left">
                <h6><?php echo __( 'Sticky Header', 'albar' ); ?></h6>
                <span class="description">
                    <?php echo __( 'Upgrade to enable the sticky header option that keeps the header at the top of the browser and re-sizes to be smaller.', 'albar' ); ?>
                </span>
            </div>
            <div class="premium-albar-block-right">
                <img src="<?php echo get_template_directory_uri(); ?>/framework/images/albar-sticky-header.jpg" alt="Albar sticky header" />
            </div>
            <div class="clearboth"></div>
        </div>
        
        <div class="premium-albar-block">
            <div class="premium-albar-block-left">
                <h6><?php echo __( 'Slider Transitions', 'albar' ); ?></h6>
                <span class="description">
                    <?php echo __( 'Enable the options to change the transition effect on the home page slider.', 'albar' ); ?>
                </span>
            </div>
            <div class="premium-albar-block-right">
                <img src="<?php echo get_template_directory_uri(); ?>/framework/images/albar-slider-transitions.jpg" alt="Albar slider transitions" />
            </div>
            <div class="clearboth"></div>
        </div>
        
        <div class="premium-albar-block">
            <div class="premium-albar-block-left">
                <h6><?php echo __( 'Blog Layout', 'albar' ); ?></h6>
                <span class="description">
                    <?php echo __( 'Select between 2 different blog layouts, standard and grid', 'albar' ); ?>
                </span>
            </div>
            <div class="premium-albar-block-right">
                <img src="<?php echo get_template_directory_uri(); ?>/framework/images/albar-blog-layout.jpg" alt="Albar blog layout" />
            </div>
            <div class="clearboth"></div>
        </div>
        
        <div class="clearboth"></div>
    </div>
    
    <h5>
        <?php echo __( 'View <a href="http://codecanyon.net/user/cxThemes/portfolio" target="_blank">our WooCommerce extensions</a> that we\'ve made to improve your online store.', 'albar' ); ?>
    </h5>
    
    <div class="premium-plugins-wrap">
    
        <a href="http://codecanyon.net/item/email-cart-for-woocommerce/5568059" target="_blank" class="premium-plugin-block">
            <img src="<?php echo get_template_directory_uri(); ?>/framework/images/cx-emc.jpg" alt="Email Cart for WooCommerce" />
            <div class="premium-plugin-block-desc"><?php echo __( 'Email Cart is a useful plugin which allows customers and admins to send a pre-populated WooCommerce Cart to any email address ready for checkout', 'albar' ); ?></div>
        </a>
        <a href="http://codecanyon.net/item/create-customer-on-order-for-woocommerce/6395319" target="_blank" class="premium-plugin-block">
            <img src="<?php echo get_template_directory_uri(); ?>/framework/images/cx-ccoo.jpg" alt="Email Cart for WooCommerce" />
            <div class="premium-plugin-block-desc"><?php echo __( 'Save time and simplify your life by having the ability to create a new Customer directly on the WooCommerce Order screen', 'albar' ); ?></div>
        </a>
        <a href="http://codecanyon.net/item/shop-as-customer-for-woocommerce/7043722" target="_blank" class="premium-plugin-block">
            <img src="<?php echo get_template_directory_uri(); ?>/framework/images/cx-sac.jpg" alt="Email Cart for WooCommerce" />
            <div class="premium-plugin-block-desc"><?php echo __( 'Shop as Customer allows a store Admin or Shop Manager to shop the front-end of the store as another User', 'albar' ); ?></div>
        </a>
        <a href="http://codecanyon.net/item/email-control-for-woocommerce/8654473" target="_blank" class="premium-plugin-block">
            <img src="<?php echo get_template_directory_uri(); ?>/framework/images/cx-ec.jpg" alt="Email Cart for WooCommerce" />
            <div class="premium-plugin-block-desc"><?php echo __( 'Email Control provides enhanced control over your store emails by allowing you to preview and send tests of the emails that the customer will receive', 'albar' ); ?></div>
        </a>
        <a href="http://codecanyon.net/item/shop-assistant-for-woocommerce/6644090" target="_blank" class="premium-plugin-block">
            <img src="<?php echo get_template_directory_uri(); ?>/framework/images/cx-shfw.jpg" alt="Email Cart for WooCommerce" />
            <div class="premium-plugin-block-desc"><?php echo __( 'Shop Assistant offers your customers a natural language search function where they complete a specific search tailored to their needs', 'albar' ); ?></div>
        </a>
        
        <div class="clearboth"></div>
    </div>
    
    <div class="clearboth"></div>
</div>