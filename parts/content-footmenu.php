<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Athenea
 */
?>
<div class="jumbotron_foot_sid">
  <div class="container">
      <div class="row">
        <div class="col-md-3">
		<?php do_action( 'before_sidebar' ); ?>
		<?php if ( ! dynamic_sidebar( 'sidebar-6' ) ) : ?>
		<?php endif; // end sidebar widget area ?>
        </div><!-- /.col-md-3 -->
        <div class="col-md-3">
		<?php do_action( 'before_sidebar' ); ?>
		<?php if ( ! dynamic_sidebar( 'sidebar-7' ) ) : ?>
		<?php endif; // end sidebar widget area ?>
        </div><!-- /.col-md-3 -->
        <div class="col-md-3">
		<?php do_action( 'before_sidebar' ); ?>
		<?php if ( ! dynamic_sidebar( 'sidebar-8' ) ) : ?>
		<?php endif; // end sidebar widget area ?>
        </div><!-- /.col-md-3 -->
        <div class="col-md-3">
		<?php do_action( 'before_sidebar' ); ?>
		<?php if ( ! dynamic_sidebar( 'sidebar-9' ) ) : ?>
		<?php endif; // end sidebar widget area ?>
        </div><!-- /.col-md-3 -->
      </div><!-- /.row -->
  </div>
</div>
<div class="jumbotron_foot">
  <div class="container">
      <div class="row">
        <div class="col-md-4">
        <address>
         <small>
		   <?php if (of_get_option('address_1') != '') { ?>
           <strong><?php echo stripslashes(of_get_option('address_1')); ?></strong><br>
           <?php } else { ?>
           <strong><?php _e( 'Company S.A.', 'athenea' ); ?></strong><br>
           <?php } ?>

		   <?php if (of_get_option('address_2') != '') { ?>
           <strong>CIF:</strong> <?php echo stripslashes(of_get_option('address_2')); ?><br>
           <?php } else { ?>
           <strong>CIF:</strong> <?php _e( 'B123456789', 'athenea' ); ?><br>
           <?php } ?>

		   <?php if (of_get_option('address_3') != '') { ?>
           <?php echo stripslashes(of_get_option('address_3')); ?><br>
           <?php } else { ?>
           <?php _e( 'New Burlington St, 123', 'athenea' ); ?><br>
           <?php } ?>

		   <?php if (of_get_option('address_4') != '') { ?>
           CP: <?php echo stripslashes(of_get_option('address_4')); ?>
           <?php } else { ?>
           CP: <?php _e( 'W1B 5NF', 'athenea' ); ?>
           <?php } ?>

		   <?php if (of_get_option('address_5') != '') { ?>
           <?php echo stripslashes(of_get_option('address_5')); ?>
           <?php } else { ?>
           <?php _e( 'London', 'athenea' ); ?>
           <?php } ?>

		   <?php if (of_get_option('address_6') != '') { ?>
           (<?php echo stripslashes(of_get_option('address_6')); ?>)<br>
           <?php } else { ?>
           (<?php _e( 'United Kingdom', 'athenea' ); ?>)<br>
           <?php } ?>

		   <?php if (of_get_option('address_7') != '') { ?>
           <abbr title="<?php _e( 'Phone', 'athenea' ); ?>">Tel:</abbr> <?php echo stripslashes(of_get_option('address_7')); ?><br>
           <?php } else { ?>
           <abbr title="<?php _e( 'Phone', 'athenea' ); ?>">Tel:</abbr> <?php _e( '9XX 123 456', 'athenea' ); ?><br>
           <?php } ?>

           <p><a href="mailto:<?php
              if (of_get_option('address_8') != '') {
              echo stripslashes(of_get_option('address_8'));
              } else {
              echo "#";
              }
           ?>">
           <?php
              if (of_get_option('address_8') != '') {
                   echo of_get_option('address_8');
               } else {
                   _e( 'office@company.com', 'athenea' );
               }
           ?></a></p>
         </small>
        </address>
        </div><!-- /.col-md-4 -->
        <div class="col-md-4">
          <ul class="list-inline text-center">
            <li id="<?php if ( of_get_option('athenea_face') !='' ) { ?><?php echo of_get_option('athenea_face'); ?><?php } else { ?><?php echo __('N', 'athenea'); ?><?php } ?>"><a href="<?php if ( of_get_option('athenea_facebook') !='' ) { ?><?php echo of_get_option('athenea_facebook'); ?><?php } else { ?><?php echo __('#', 'athenea'); ?><?php } ?>" class="genericon-facebook" title="Facebook" target="_blank" rel="nofollow"></a></li>
            <li id="<?php if ( of_get_option('athenea_twit') !='' ) { ?><?php echo of_get_option('athenea_twit'); ?><?php } else { ?><?php echo __('N', 'athenea'); ?><?php } ?>"><a href="<?php if ( of_get_option('athenea_twitter') !='' ) { ?><?php echo of_get_option('athenea_twitter'); ?><?php } else { ?><?php echo __('#', 'athenea'); ?><?php } ?>" class="genericon-twitter" title="Twitter" target="_blank" rel="nofollow"></a></li>
            <li id="<?php if ( of_get_option('athenea_yout') !='' ) { ?><?php echo of_get_option('athenea_yout'); ?><?php } else { ?><?php echo __('N', 'athenea'); ?><?php } ?>"><a href="<?php if ( of_get_option('athenea_youtube') !='' ) { ?><?php echo of_get_option('athenea_youtube'); ?><?php } else { ?><?php echo __('#', 'athenea'); ?><?php } ?>" class="genericon-youtube" title="YouTube" target="_blank" rel="nofollow"></a></li>
            <li id="<?php if ( of_get_option('athenea_vime') !='' ) { ?><?php echo of_get_option('athenea_vime'); ?><?php } else { ?><?php echo __('N', 'athenea'); ?><?php } ?>"><a href="<?php if ( of_get_option('athenea_vimeo') !='' ) { ?><?php echo of_get_option('athenea_vimeo'); ?><?php } else { ?><?php echo __('#', 'athenea'); ?><?php } ?>" class="genericon-vimeo" title="Vimeo" target="_blank" rel="nofollow"></a></li>
            <li id="<?php if ( of_get_option('athenea_fee') !='' ) { ?><?php echo of_get_option('athenea_fee'); ?><?php } else { ?><?php echo __('Y', 'athenea'); ?><?php } ?>"><a href="<?php if ( of_get_option('athenea_feed') !='' ) { ?><?php echo of_get_option('athenea_feed'); ?><?php } else { ?><?php echo __('#', 'athenea'); ?><?php } ?>" class="genericon-feed" title="Feed" target="_blank" rel="nofollow"></a></li>
            <li id="<?php if ( of_get_option('athenea_goog') !='' ) { ?><?php echo of_get_option('athenea_goog'); ?><?php } else { ?><?php echo __('N', 'athenea'); ?><?php } ?>"><a href="<?php if ( of_get_option('athenea_google') !='' ) { ?><?php echo of_get_option('athenea_google'); ?><?php } else { ?><?php echo __('#', 'athenea'); ?><?php } ?>" class="genericon-googleplus" title="Google Plus" target="_blank" rel="nofollow"></a></li>
          </ul>
        </div><!-- /.col-md-4 -->
        <div class="col-md-4 text-center">
          	<?php if ( of_get_option('athenea_logo') !='' ) { ?>
            <img src="<?php echo of_get_option('athenea_logo'); ?>" alt="<?php bloginfo( 'description' ); ?>" />
            <?php } else { ?>
            <img src="<?php echo get_template_directory_uri(); ?>/images/logo-athenea.png" alt="<?php bloginfo( 'description' ); ?>" />
            <?php } ?>
        </div><!-- /.col-md-4 -->
      </div><!-- /.row -->
  </div>
</div>