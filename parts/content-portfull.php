<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Athenea
 */
?>
<div class="jumbotron_port">
  <div class="container">
    <div class="row">
      <div class="col-md-4 text-center">
       <?php if (of_get_option('principal_1a') != '') { ?>
       <h3><?php echo stripslashes(of_get_option('principal_1a')); ?></h3>
       <?php } else { ?>
       <h3><?php _e( 'Add your first highlighted section here.', 'athenea' ); ?></h3>
       <?php } ?>
       
       <?php if ( of_get_option('principal_1e') !='' ) { ?>
		<img src="<?php echo of_get_option('principal_1e'); ?>" width="50%" class="img-circle" alt="<?php echo __('Section one','athenea'); ?>" />
        <?php } else { ?>
        <img src="<?php echo get_template_directory_uri(); ?>/images/section1.jpg" width="50%" class="img-circle" alt="<?php echo __('Section one','athenea'); ?>" />
       <?php } ?>
       
        <?php if (of_get_option('principal_1b') != '') { ?>
       <p><?php echo stripslashes(of_get_option('principal_1b')); ?></p>
       <?php } else { ?>
       <p><?php _e( 'Sign in options on topic and write a brief description.', 'athenea' ); ?></p>
       <?php } ?>
        
       <p><a class="btn btn-primary" href="<?php
          if (of_get_option('principal_1d') != '') {
          echo stripslashes(of_get_option('principal_1d'));
          } else {
          echo "#";
          }
       ?>">
       <span><?php
          if (of_get_option('principal_1c') != '') {
               echo of_get_option('principal_1c');
           } else {
               _e( 'Read More', 'athenea' );
           }
       ?></span></a></p>
      </div><!-- #col-md-4 -->
      <div class="col-md-4 text-center">
       <?php if (of_get_option('principal_2a') != '') { ?>
       <h3><?php echo stripslashes(of_get_option('principal_2a')); ?></h3>
       <?php } else { ?>
       <h3><?php _e( 'Continue with the second highlighted section.', 'athenea' ); ?></h3>
       <?php } ?>
       
       <?php if ( of_get_option('principal_2e') !='' ) { ?>
		<img src="<?php echo of_get_option('principal_2e'); ?>" width="50%" class="img-circle" alt="<?php echo __('Section two','athenea'); ?>" />
        <?php } else { ?>
        <img src="<?php echo get_template_directory_uri(); ?>/images/section2.jpg" width="50%" class="img-circle" alt="<?php echo __('Section two','athenea'); ?>" />
       <?php } ?>
        
         <?php if (of_get_option('principal_2b') != '') { ?>
       <p><?php echo stripslashes(of_get_option('principal_2b')); ?></p>
       <?php } else { ?>
       <p><?php _e( 'Sign in options on topic and write a brief description.', 'athenea' ); ?></p>
       <?php } ?>
        
       <p><a class="btn btn-primary" href="<?php
          if (of_get_option('principal_2d') != '') {
          echo stripslashes(of_get_option('principal_2d'));
          } else {
          echo "#";
          }
       ?>">
       <?php
          if (of_get_option('principal_2c') != '') {
               echo of_get_option('principal_2c');
           } else {
               _e( 'Read More', 'athenea' );
           }
       ?></a></p>
      </div><!-- #col-md-4 -->
      <div class="col-md-4 text-center">
       <?php if (of_get_option('principal_3a') != '') { ?>
       <h3><?php echo stripslashes(of_get_option('principal_3a')); ?></h3>
       <?php } else { ?>
       <h3><?php _e( 'And finally, the third section highlighted.', 'athenea' ); ?></h3>
       <?php } ?>
        
       <?php if ( of_get_option('principal_3e') !='' ) { ?>
		<img src="<?php echo of_get_option('principal_3e'); ?>" width="50%" class="img-circle" alt="<?php echo __('Section three','athenea'); ?>" />
        <?php } else { ?>
        <img src="<?php echo get_template_directory_uri(); ?>/images/section3.jpg" width="50%" class="img-circle" alt="<?php echo __('Section three','athenea'); ?>" />
       <?php } ?>
        
       <?php if (of_get_option('principal_3b') != '') { ?>
       <p><?php echo stripslashes(of_get_option('principal_3b')); ?></p>
       <?php } else { ?>
       <p><?php _e( 'Sign in options on topic and write a brief description.', 'athenea' ); ?></p>
       <?php } ?>
        
       <p><a class="btn btn-primary" href="<?php
          if (of_get_option('principal_3d') != '') {
          echo stripslashes(of_get_option('principal_3d'));
          } else {
          echo "#";
          }
       ?>">
       <?php
          if (of_get_option('principal_3c') != '') {
               echo of_get_option('principal_3c');
           } else {
               _e( 'Read More', 'athenea' );
           }
       ?></a></p>
      </div><!-- #col-md-4 -->
    </div>
  </div>
</div>