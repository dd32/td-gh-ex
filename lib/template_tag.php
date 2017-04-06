<?php
//Custom Post Title
if(!function_exists('backyard_post_title')) : 
function backyard_post_title()
{
  if ( is_single() ) :
 ?>
     <?php the_title(); ?>
      <?php else: ?>
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
<?php endif; 
}

endif;

//Social Links

if(!function_exists('backyard_social_media_link')) :
function backyard_social_media_link() { 
  if(get_theme_mod('facebook_url'))
  {
      echo '<a href="'.esc_url(get_theme_mod('facebook_url')).'" target="_blank" class="fb"><i class="fa fa-facebook"></i></a>';
  }
  if(get_theme_mod('twitter_url'))
  {
      echo '<a href="'.esc_url(get_theme_mod('twitter_url')).'" target="_blank" class="tw"><i class="fa fa-twitter"></i></a>';
  }
  if(get_theme_mod('google_url'))
  {
      echo '<a href="'.esc_url(get_theme_mod('google_url')).'" target="_blank" class="google"><i class="fa fa-google-plus"></i></a>';
  }
  if(get_theme_mod('instagram_url'))
  {
      echo '<a href="'.esc_url(get_theme_mod('instagram_url')).'"  target="_blank" class="instagram"><i class="fa fa-instagram"></i></a>';
  }
  if(get_theme_mod('youtube_channel_link'))
  {
      echo '<a href="'.esc_url(get_theme_mod('youtube_channel_link')).'" target="_blank" class="youtube"><i class="fa fa-youtube"></i></a>';
  }
  if(get_theme_mod('linkedin_link'))
  {
      echo '<a href="'.esc_url(get_theme_mod('linkedin_link')).'"   target="_blank" class="linkdin"><i class="fa fa-linkedin"></i></a>';
  }
  if(get_theme_mod('pinterest_link'))
  {
      echo '<a href="'.esc_url(get_theme_mod('pinterest_link')).'"  target="_blank" class="pinterest"><i class="fa fa-pinterest"></i></a>';
  }
}   
endif;
// get from session your URL variable and add it to item
add_filter('woocommerce_get_cart_item_from_session', 'cart_item_from_session', 99, 3);
function cart_item_from_session( $data, $values, $key ) {
    $data['url'] = isset( $values['url'] ) ? $values['url'] : '';
    return $data;
}

// this one does the same as woocommerce_update_cart_action() in plugins\woocommerce\woocommerce-functions.php
// but with your URL variable
// this might not be the best way but it works
add_action( 'init', 'update_cart_action', 9);
function update_cart_action() {
    global $woocommerce;
    if ( ( ! empty( $_POST['update_cart'] ) || ! empty( $_POST['proceed'] ) ) && $woocommerce->verify_nonce('cart')) {
        $cart_totals = isset( $_POST['cart'] ) ? sanitize_text_field(wp_unslash($_POST['cart'])) : '';
        if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) {
            foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $values ) {
                if ( isset( $cart_totals[ $cart_item_key ]['url'] ) ) {
                    $woocommerce->cart->cart_contents[ $cart_item_key ]['url'] = $cart_totals[ $cart_item_key ]['url'];
                }
            }
        }
    }
}

// this is in Order summary. It show Url variable under product name. Same place where Variations are shown.
add_filter( 'woocommerce_get_item_data', 'item_data', 10, 2 );
function item_data( $data, $cart_item ) {
	print_r($cart_item);
    if ( isset( $cart_item['url'] ) ) {
        $data['url'] = array('name' => 'Url', 'value' => $cart_item['url']);
    }
    return $data;
}

// this adds Url as meta in Order for item
add_action ('woocommerce_add_order_item_meta', 'add_item_meta', 10, 2);
function add_item_meta( $item_id, $values ) {
    woocommerce_add_order_item_meta( $item_id, 'Url', $values['url'] );
}
?>