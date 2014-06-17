<?php
/** homepage_page_full.php
 *
 * Template Name: Front page Full (no entry)
 *
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Athenea
 */

get_header(); ?>

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

<div class="container"><hr></div>

<div class="jumbotron">
  <div class="container">
    <div class="row">
      <div class="col-md-6 text-right">
       <blockquote class="pull-right">
       <?php if (of_get_option('present_1') != '') { ?>
       <h2><?php echo stripslashes(of_get_option('present_1')); ?></h2>
       <?php } else { ?>
       <h2><?php _e( 'Who is the company', 'athenea' ); ?></h2>
       <?php } ?>

       <?php if (of_get_option('present_2') != '') { ?>
       <p><?php echo stripslashes(of_get_option('present_2')); ?></p>
       <?php } else { ?>
       <p><?php _e( 'A brief description of your business in this area of the website is the best option for visitors. Insert a text descripctivo y call the attention of your potential in the first minute.', 'athenea' ); ?></p>
       <?php } ?>
        
       <p><a class="btn btn-primary btn-lg" href="<?php
          if (of_get_option('present_4') != '') {
          echo stripslashes(of_get_option('present_4'));
          } else {
          echo "#";
          }
       ?>">
       <?php
          if (of_get_option('present_3') != '') {
               echo of_get_option('present_3');
           } else {
               _e( 'Read More', 'athenea' );
           }
       ?></a></p>
       </blockquote>
      </div><!-- #col-md-6 -->
      <div class="col-md-6 text-left">
        <?php if ( of_get_option('present_5') !='' ) { ?>
		<img src="<?php echo of_get_option('present_5'); ?>" class="img-responsive img-rounded" alt="<?php echo __('Main section','athenea'); ?>" />
        <?php } else { ?>
        <img src="<?php echo get_template_directory_uri(); ?>/images/office.png" class="img-responsive img-rounded" alt="<?php echo __('Main section','athenea'); ?>" />
        <?php } ?>
      </div><!-- #col-md-6 -->
    </div><!-- #row -->
  </div>
</div>

<div class="container"><hr></div>

	</div><!-- #primary col-md-12 -->
   </div><!-- /row -->
</div><!--/container-->

<?php
get_template_part( 'parts/content', 'footmenu' );
get_footer(); ?>