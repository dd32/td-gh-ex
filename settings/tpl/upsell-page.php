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
                <img src="<?php echo get_template_directory_uri(); ?>/settings/images/web-layout-one.jpg" alt="Website layout one" /><br /><br />
                <img src="<?php echo get_template_directory_uri(); ?>/settings/images/web-layout-two.jpg" alt="Website layout two" />
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
                <img src="<?php echo get_template_directory_uri(); ?>/settings/images/sticky-header.jpg" alt="Sticky header" />
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
                <img src="<?php echo get_template_directory_uri(); ?>/settings/images/slider-transitions.jpg" alt="Slider transitions" />
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
                <img src="<?php echo get_template_directory_uri(); ?>/settings/images/blog-layout.jpg" alt="Blog layout" />
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
                <img src="<?php echo get_template_directory_uri(); ?>/settings/images/footer-text.jpg" alt="Footer copy text" />
            </div>
            <div class="clearboth"></div>
        </div>
        
        <div class="clearboth"></div>
    </div>
    
    <div class="clearboth"></div>
</div>