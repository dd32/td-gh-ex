<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.6.3
 */


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $woocommerce, $product, $ascend;
if(isset($ascend['product_simg_resize']) && $ascend['product_simg_resize'] == 0) {
	$presizeimage = 0;
} else {
	$presizeimage = 1;
		if(isset($ascend['shop_img_ratio'])) { 
			$img_ratio = $ascend['shop_img_ratio']; 
		} else {
			$img_ratio = 'square';
		}
		if(ascend_display_sidebar()) { 
			$productimgwidth = 360; 
		} else {
			$productimgwidth = 460; 
		}
		$image_crop = true;
		if($img_ratio == 'portrait') {
			$tempproductimgheight = $productimgwidth * 1.35;
			$productimgheight = floor($tempproductimgheight);
		} else if($img_ratio == 'landscape') {
			$tempproductimgheight = $productimgwidth / 1.35;
			$productimgheight = floor($tempproductimgheight);
		} else if($img_ratio == 'widelandscape') {
			$tempproductimgheight = $productimgwidth / 2;
			$productimgheight = floor($tempproductimgheight);
		} else if($img_ratio == 'softcrop') {
            $productimgheight = null;
            $image_crop = false;
        } else {
			$productimgheight = $productimgwidth;
		}
		$productimgwidth = apply_filters('kadence_product_single_image_width', $productimgwidth);
        $productimgheight = apply_filters('kadence_product_single_image_height', $productimgheight);

}


?>
<div class="images kad-light-gallery">
	<div class="product_image">
	<?php
		if ( has_post_thumbnail() ) {
			$image_title = esc_attr( get_the_title( get_post_thumbnail_id() ) );
			$alt = esc_attr( get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true) );
			if( !empty($alt) ) {
				$alttag	= $alt;
			} else {
				$alttag	= $image_title;
			}
			$image_link  = wp_get_attachment_url( get_post_thumbnail_id() );

			if($presizeimage == 1){
				$image_id = get_post_thumbnail_id( $post->ID );
				$image = ascend_get_image_output($productimgwidth, $productimgheight, $image_crop, 'attachment-shop_single wp-post-image', $alttag, $image_id, false, false, false, 'title="'.$image_title.'"');
			} else {
				$image = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
				'title' => $image_title,
				'alt' => $alttag
				) );
			}
			$attachment_count   = count( $product->get_gallery_attachment_ids() );

			if ( $attachment_count > 0 ) {
				$gallery = '[product-gallery]';
			} else {
				$gallery = '';
			}

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s"  data-rel="lightbox' . esc_attr($gallery) . '">%s</a>', esc_url($image_link), $image_title, $image ), $post->ID );

		} else {

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="Placeholder" />', woocommerce_placeholder_img_src() ), $post->ID );

		}
	?>
	</div>
	<?php do_action( 'woocommerce_product_thumbnails' ); ?>

</div>
