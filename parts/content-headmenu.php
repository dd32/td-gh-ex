<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Athenea
 */
?>

<div class="jumbotron_portint">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2 class="site-title-head">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'description' ); ?>" rel="home">
			<?php if ( of_get_option('athenea_logo') !='' ) { ?>
            <img src="<?php echo of_get_option('athenea_logo'); ?>" style="margin-top:0px; margin-bottom:0px;" alt="<?php bloginfo( 'description' ); ?>" />
            <?php } else { ?>
            <img src="<?php echo get_template_directory_uri(); ?>/images/logo-athenea.png" style="margin-top:0px; margin-bottom:0px;" alt="<?php bloginfo( 'description' ); ?>" />
            <?php } ?>
          </a>
        </h2>
      </div><!-- #col-md-6 -->
      <div class="col-md-6 text-right">
           <h3 class="site-title-head"><span class="glyphicon glyphicon-phone"></span>Tel: <a href="tel:<?php
              if (of_get_option('address_7') != '') {
              echo stripslashes(of_get_option('address_7'));
              } else {
              _e( '9XX 123 456', 'athenea' );
              }
           ?>" style="color:#fff;">
           <?php
              if (of_get_option('address_7') != '') {
                   echo of_get_option('address_7');
               } else {
                   _e( '9XX 123 456', 'athenea' );
               }
           ?></a></h3>
           <p class="site-title-head" style="font-size:18px;"><a href="mailto:<?php
              if (of_get_option('address_8') != '') {
              echo stripslashes(of_get_option('address_8'));
              } else {
              _e( 'office@company.com', 'athenea' );
              }
           ?>" style="color:#fff;">
           <?php
              if (of_get_option('address_8') != '') {
                   echo of_get_option('address_8');
               } else {
                   _e( 'office@company.com', 'athenea' );
               }
           ?></a></p>
      </div><!-- #col-md-6 -->
    </div>
  </div>
</div>