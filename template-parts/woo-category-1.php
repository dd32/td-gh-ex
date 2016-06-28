<?php
	$taxonomyName = "product_cat";
	$prod_categories = get_terms($taxonomyName, array(
	    'orderby'=> 'name',
	    'order' => 'ASC',
	    'hide_empty' => 1
	));
	foreach( $prod_categories as $prod_cat ) :
	    if ( $prod_cat->parent != 0 )
	        continue;
	    $cat_thumb_id = get_woocommerce_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
	    $cat_thumb_url = wp_get_attachment_thumb_url( $cat_thumb_id );
	    $term_link = get_term_link( $prod_cat, 'product_cat' );
	    if (empty($cat_thumb_url)):
	    	$cat_thumb_url = get_template_directory_uri() . '/images/category-image.png';
	    endif;
	    ?>
		<div itemprop="category" class="front-product-category__card <?php echo get_option('woo_product_category_row', 'col-sm-3' );?>">
		<div class="front-product-category__card__inner">
		<a href="<?php echo $term_link; ?>">
		    <img  src="<?php echo $cat_thumb_url; ?>" class="img-responsive" alt="<?php echo $prod_cat->name; ?>" itemprop="image" />
		    <h3 class="category_title">
		    	<?php echo $prod_cat->name;?>
		    </h3>
		</a>
		</div>
		</div>
<?php endforeach;?>