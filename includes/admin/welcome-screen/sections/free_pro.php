<?php
/**
 * Avis Pro
 */
?>

<div id="free_pro" class="avis-lite-tab-pane avis-lite-fre-pro">
    
    <div class="wrap">
    <div class="container-fluid">
    <div id="upsell_container">
    <div class="clearfix row-fluid">
        <div id="upsell_header" class="span12">
        <?php $directory_uri = get_template_directory_uri().'/images'; ?>
            <h2>
                <a href="https://sketchthemes.com/" target="_blank">
                    <img src="<?php echo $directory_uri; ?>/sketch-logo.png" alt="<?php __('Sketch Themes', 'avis-lite') ?>" />
                </a>
            </h2>
            <div class="donate-info">
              <strong><?php _e('To Activate All Features, Please Upgrade to Pro version!', 'avis-lite'); ?></strong><br>
              <a title="<?php _e('Upgrade to Pro', 'avis-lite') ?>" href="https://sketchthemes.com/" target="_blank" class="upgrade"><?php _e('Upgrade to Pro', 'avis-lite'); ?></a> <a title="<?php _e('Setup Instructions', 'avis-lite'); ?>" href="<?php echo get_template_directory_uri(); ?>/readme.txt" target="_blank" class="donate"><?php _e('Setup Instructions', 'avis-lite'); ?></a>
              <a title="<?php _e('Rate Avis Lite', 'avis-lite'); ?>" href="https://wordpress.org/support/view/theme-reviews/avis-lite" target="_blank" class="review"><?php _e('Rate Avis Lite', 'avis-lite'); ?></a>
              <a title="<?php _e('Theme Test Drive', 'avis-lite'); ?>" href="http://trial.sketchthemes.com/wp-signup.php" target="_blank" class="review"><?php _e('Theme Test Drive', 'avis-lite'); ?></a>
            </div>
        </div>
    </div>
    <div id="upsell_themes" class="clearfix row-fluid">
    <!-- -------------- Avis Pro ------------------- -->
<?php $directory_uri = get_template_directory_uri().'/images'; ?>
        <div id="Avis" class="row-fluid">
            <div class="theme-container">
                <div class="theme-image span3">
                    <a href="https://sketchthemes.com/themes/avis-responsive-woocommerce-wordpress-theme/" target="_blank">
                        <img src="<?php echo $directory_uri; ?>/Avis.png"  alt="<?php __('Avis Theme', 'avis-lite') ?>" width="300px"/>
                    </a>
                </div>
                <div class="theme-info span9">
                    <a class="theme-name" href="https://sketchthemes.com/themes/avis-responsive-woocommerce-wordpress-theme/" target="_blank"><h4><?php _e('Avis - Responsive WooCommerce WordPress Theme','avis-lite');?></h4></a>

                    <div class="theme-description">
                        <p><?php _e("SketchThemes continues the legacy of best multipurpose responsive business WordPress themes. Here we are gearing up to introduce a new WooCommerce WordPress theme which keeps it at the top priority for the customers to proliferate their business. This classy theme is fully WooCommerce compatible, SEO optimized and fully responsive so forget the fear of screen sizes, SEO optimization, just go and grab it.",'avis-lite'); ?></p>

                    </div>

                    <a class="free btn btn-success" href="https://wordpress.org/themes/download/avis-lite.1.0.3.zip?nostats=1" target="_blank"><?php _e( 'Try Avis Free', 'avis-lite' ); ?></a>
                    <a class="buy  btn btn-info" href="https://sketchthemes.com/samples/avis-responsive-woocommerce-demo/" target="_blank"><?php _e( 'View Demo', 'avis-lite' ); ?></a>
                    <a class="buy btn btn-primary" href="https://www.sketchthemes.com/members/signup/avis/" target="_blank"><?php _e( 'Buy Avis Pro', 'avis-lite' ); ?></a>
                    
                </div>
            </div>
        </div>
    
    </div>
    <!-- upsell themes -->
    </div>
    <!-- upsell container -->
    </div>
    <!-- container-fluid -->
    </div>


</div>