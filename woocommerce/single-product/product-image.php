<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.7.0
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product, $ascend;
$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
$thumbnail_post    = get_post( $post_thumbnail_id );
$image_title       = $thumbnail_post->post_content;
$placeholder       = has_post_thumbnail() ? 'with-images' : 'without-images';
$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
	'woocommerce-product-gallery',
	'woocommerce-product-gallery--' . $placeholder,
	'woocommerce-product-gallery--columns-' . absint( $columns ),
	'images',
	'kad-light-gallery',
) );

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
<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>">
		<div class="product_image">
			<?php
			$attributes = array(
				'title'                   => $image_title,
				'data-large-image'        => $full_size_image[0],
				'data-large-image-width'  => $full_size_image[1],
				'data-large-image-height' => $full_size_image[2],
			);

			if ( has_post_thumbnail() ) {
				if($presizeimage == 1){
					$html  = '<figure data-thumb="' . get_the_post_thumbnail_url( $post->ID, 'shop_thumbnail' ) . '" class="woocommerce-product-gallery__image"><a href="' . esc_url( $full_size_image[0] ) . '">';
					$html .= ascend_get_image_output($productimgwidth, $productimgheight, $image_crop, 'attachment-shop_single wp-post-image', null, $post_thumbnail_id, false, false, false, 'title="'.$image_title.'"');
					$html .= '</a></figure>';
				} else {
					$html  = '<figure data-thumb="' . get_the_post_thumbnail_url( $post->ID, 'shop_thumbnail' ) . '" class="woocommerce-product-gallery__image"><a href="' . esc_url( $full_size_image[0] ) . '">';
					$html .= get_the_post_thumbnail( $post->ID, 'shop_single', $attributes );
					$html .= '</a></figure>';
				}
			} else {
				$html  = '<figure class="woocommerce-product-gallery__image--placeholder">';
				$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'ascend' ) );
				$html .= '</figure>';
			}

			echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( $post->ID ) );
			?>
		</div>
		<?php 
		do_action( 'woocommerce_product_thumbnails' );
		?>
</div>

