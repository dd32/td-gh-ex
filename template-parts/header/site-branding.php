<?php 
/*
* Display Logo and contact details
*/
?>

<div class="headerbox">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-4">
        <div class="logo">
          <?php if( has_custom_logo() ){ automobile_hub_the_custom_logo();
           }else{ ?>
          <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
          <?php $description = get_bloginfo( 'description', 'display' );
          if ( $description || is_customize_preview() ) : ?> 
              <p class="site-description"><?php echo esc_html($description); ?></p> 
          <?php endif; }?>
        </div>
      </div>
      <div class="call col-lg-3 col-md-3">
        <?php if( get_theme_mod( 'automobile_hub_call_text' ) != '' || get_theme_mod( 'automobile_hub_call' ) != '') { ?>
          <div class="row">
            <div class="col-lg-3 col-md-3"><i class="fas fa-phone"></i></div>
            <div class="col-lg-9 col-md-9">
              <p class="infotext"><?php echo esc_html( get_theme_mod('automobile_hub_call_text','') ); ?></p>
              <p class="simplep"><?php echo esc_html( get_theme_mod('automobile_hub_call','') ); ?></p>
            </div>            
          </div>
        <?php } ?>
      </div>
      <div class="email col-lg-3 col-md-3">
        <?php if( get_theme_mod( 'automobile_hub_mail_text' ) != '' || get_theme_mod( 'automobile_hub_mail' ) != '') { ?>
          <div class="row">
            <div class="col-lg-3 col-md-3"><i class="fas fa-envelope-open"></i></div>
            <div class="col-lg-9 col-md-9">
              <p class="infotext"><?php echo esc_html( get_theme_mod('automobile_hub_mail_text','')); ?></p>
              <p class="simplep"><?php echo esc_html( get_theme_mod('automobile_hub_mail','') ); ?></p>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="col-lg-2 col-md-2">
        <?php if(class_exists('woocommerce')){ ?>
          <div class="row">
            <div class="col-lg-4 col-md-4"><i class="fas fa-shopping-basket"></i></div>
            <div class="col-lg-8 col-md-8">
              <p class="cart_no infotext">
                <?php global $woocommerce; ?>
                <a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_html_e( 'shopping cart','automobile-hub' ); ?>"><?php esc_html_e('CART ITEM','automobile-hub'); ?></a>
              </p>
              <p class="cart-value simplep"> <?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?> - <?php echo esc_sql( $woocommerce->cart->get_cart_total() ); ?></p>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="clear"></div>
    </div>
  </div> 
</div>