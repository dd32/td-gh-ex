<?php
/**
 * The UpSell page included on the admin settings page
 *
 * @package electa
 */ ?>

<div class="premium-upsell-wrap">
    
    <h4>
        <?php echo __( '<a href="http://sllwi.re/p/Fs" target="_blank">Upgrade to Electa Premium</a> to get all the features for the Electa theme.', 'electa' ); ?>
    </h4>
    
    <div class="premium-electa-wrap">
        
        <div class="premium-electa-block">
            <div class="premium-electa-block-left">
                <h6><?php echo __( 'Sticky Header', 'electa' ); ?></h6>
                <span class="description">
                    <?php echo __( 'Upgrade to enable the sticky header option that keeps the header on the side of the page when scrolling.', 'electa' ); ?>
                </span>
            </div>
            <div class="premium-electa-block-right">
                <img src="<?php echo get_template_directory_uri(); ?>/settings/images/sticky-header.jpg" alt="Sticky Header" />
            </div>
            <div class="clearboth"></div>
        </div>
        
        <div class="premium-electa-block">
            <div class="premium-electa-block-left">
                <h6><?php echo __( 'Home Block Columns Layout', 'electa' ); ?></h6>
                <span class="description">
                    <?php echo __( 'Select how many columns you want the home blocks layout to have... 2, 3, 4 or 5.', 'electa' ); ?>
                </span>
            </div>
            <div class="premium-electa-block-right">
                <img src="<?php echo get_template_directory_uri(); ?>/settings/images/home-blocks-layout.jpg" alt="Home Columns Layout" />
            </div>
            <div class="clearboth"></div>
        </div>
        
        <div class="premium-electa-block">
            <div class="premium-electa-block-left">
                <h6><?php echo __( 'Blog Block Columns Layout', 'electa' ); ?></h6>
                <span class="description">
                    <?php echo __( 'Select how many columns you want the blog blocks layout to have... 2, 3, 4 or 5.', 'electa' ); ?>
                </span>
            </div>
            <div class="premium-electa-block-right">
                <img src="<?php echo get_template_directory_uri(); ?>/settings/images/blog-blocks-layout.jpg" alt="Blog Columns Layout" />
            </div>
            <div class="clearboth"></div>
        </div>
        
        <div class="premium-electa-block">
            <div class="premium-electa-block-left">
                <h6><?php echo __( 'Social Media Links', 'electa' ); ?></h6>
                <span class="description">
                    <?php echo __( 'Upgrade to premium to enable the option to add your social media links to your site.', 'electa' ); ?>
                </span>
            </div>
            <div class="premium-electa-block-right">
                <img src="<?php echo get_template_directory_uri(); ?>/settings/images/social-links.jpg" alt="Add Social Links" />
            </div>
            <div class="clearboth"></div>
        </div>
        
        <div class="premium-electa-block">
            <div class="premium-electa-block-left">
                <h6><?php echo __( 'Site Info Text', 'electa' ); ?></h6>
                <span class="description">
                    <?php echo __( 'Get Premium to enable the option to change the copy text at the bottom of the header to link to your own site.', 'electa' ); ?>
                </span>
            </div>
            <div class="premium-electa-block-right">
                <img src="<?php echo get_template_directory_uri(); ?>/settings/images/site-copy-text.jpg" alt="Site Info Text" />
            </div>
            <div class="clearboth"></div>
        </div>
        
        <div class="clearboth"></div>
    </div>
    
    <div class="clearboth"></div>
</div>