<?php


/*--------------------------------------------------------------
## Bellini Hero Image
--------------------------------------------------------------*/

function bellini_static_slider() {

if(get_option('bellini_show_frontpage_slider', true) == true) :
if (absint(get_option( 'bellini_front_slider_type', 1)) == 1):
	// Check if hero image is set
	if (get_option( 'bellini_static_slider_image')){
		$bellini_static_slider_image 	= esc_url(get_option('bellini_static_slider_image'));
	}
	else{
		// Get the default image
		$bellini_static_slider_image = get_template_directory_uri() . '/images/slider.jpg';
	}
	?>
	<section class="front__slider__static">
    <img src="<?php echo $bellini_static_slider_image;?>" class="img-responsive">
    <div class="slider-content">
    	<?php
    	// Hero Image Heading
    	if(get_option('bellini_static_slider_title') == true):
    		$bellini_static_slider_title = wp_kses_post(get_option( 'bellini_static_slider_title', __( 'Introducting Summer Collections', 'bellini')));
    		?>
    		<h3 class="element-title slider-content__title">
				<?php echo do_shortcode(wp_kses_post($bellini_static_slider_title) );?>
			</h3>
	    <?php endif; ?>
    	<?php
    	// Hero Section Content
    	if(get_option('bellini_static_slider_content') == true):
    		$bellini_static_slider_content = wp_kses_post(get_option( 'bellini_static_slider_content', __('You see that bamboo behind me though, you see that bamboo? Bless up.', 'bellini' )));
    		echo '<div class="slider-content__text animated fadeIn">';
			echo do_shortcode(wp_kses_post($bellini_static_slider_content));
			echo '</div>';
	    endif;
	    ?>
		<?php
		// Check if buttons are set
		if(get_option('bellini_static_slider_button_text-1') == true || get_option('bellini_static_slider_button_text-2') == true):?>
			<div class="front__slider__cta">
		<?php
		// Button 1
		if(get_option('bellini_static_slider_button_text-1') == true):
				$bellini_slider_cta_one_text = esc_html(get_option( 'bellini_static_slider_button_text-1'));
			?>
		    <a class="button slider__cta--one" role="button" href="<?php if(get_option('bellini_static_slider_button_url-1') == true): echo esc_url(get_option( 'bellini_static_slider_button_url-1')); endif;?>">
				<?php echo $bellini_slider_cta_one_text ;?>
			</a>
	    <?php endif;?>
	    <?php
	    // Button 2
		if(get_option('bellini_static_slider_button_text-2') == true):
			$bellini_slider_cta_two_text = esc_html(get_option( 'bellini_static_slider_button_text-2'));
		?>
		    <a class="button slider__cta--two" role="button" href="<?php if(get_option('bellini_static_slider_button_url-2') == true): echo esc_url(get_option( 'bellini_static_slider_button_url-2')); endif;?>">
				<?php echo $bellini_slider_cta_two_text;?>
			</a>
	    <?php endif;?>
		</div>
	    <?php endif;?>
    </div><!-- Slider Content ends-->
</section>
<?php endif;

if (absint(get_option( 'bellini_front_slider_type', 1)) == 2): ?>
	<section class="front__slider__static">
		<?php
			if (get_option( 'bellini_slider_third_party_field')){
				echo do_shortcode( wp_kses_post(get_option( 'bellini_slider_third_party_field')));
			}else{
				esc_html_e( 'No Slider Shortcode Found! ', 'bellini' );
			}
		endif; ?>
	</section>
<?php
	endif;
}



/*--------------------------------------------------------------
## WooCommerce Categories
--------------------------------------------------------------*/

function bellini_woo_product_category(){

if(get_option('bellini_show_frontpage_woo_category', true) == true) :

	if(is_woocommerce_activated()):?>

	<section class="front-product-category" itemscope itemtype="http://schema.org/Offer">
	<div class="bellini__canvas">
	<div class="row">
	<?php
		if(get_option('bellini_product_category_des_pos', 1) == true):
			$column_position = esc_attr(get_option('bellini_product_category_des_pos'));
		endif;
	?>
	<div class="<?php echo bellini_section_header_class_switcher($column_position);?>">
	<?php if(get_option('bellini_woo_category_title') == true): ?>
		<h2 class="col-md-12 element-title element-title--main">
		<?php echo do_shortcode(wp_kses_post(get_option( 'bellini_woo_category_title')));?>
		</h2>
	<?php endif;?>
    <?php if(get_option('bellini_woo_category_description') == true):?>
        <h4 class="col-md-12 element-title--sub">
			<?php echo do_shortcode(wp_kses_post(get_option( 'bellini_woo_category_description')));?>
		</h4>
	<?php endif;?>
	</div>
	<div class="<?php echo bellini_section_content_class_switcher($column_position);?>">
	<?php
	if ( esc_attr(get_option('woo_product_category_layout', 'layout-1')) == 'layout-1' ){
			get_template_part( 'template-parts/woo', 'category-1' );
	}
	?>
	</div>
	</div>
	</div>
    </section>

<?php
endif;
endif;
} //Product Category ends




/*--------------------------------------------------------------
## Woo Featured Product
--------------------------------------------------------------*/

function bellini_woo_product_featured(){

if(get_option('bellini_show_frontpage_woo_products_featured', true) == true) :
	// Check if WooCommerce is Activated
	if(is_woocommerce_activated()):?>

	<?php

	$args = array(
		'post_type' => 'product',
		'post_status' => 'publish',
		'meta_key' => '_featured',
		'meta_value' => 'yes',
		'posts_per_page' => 2,
		'no_found_rows' => true,
	);

	$args['posts_per_page'] = absint(get_option('bellini_featured_slides_no_selector', 2));

	// Set the Loop Arguments
	$loop = new WP_Query( $args );

	// Fire up the Loop
	if ( $loop->have_posts() ) :?>
		<section class="front__product-featured">
		<div class="bellini__canvas">
		<div class="row">
			<h2 class="col-md-12 element-title element-title--main">
		    <?php
		    	if(get_option('woo_featured_product_title') == true):
					echo do_shortcode(wp_kses_post(get_option( 'woo_featured_product_title')));
			    endif;
			?>
    		</h2>

		    <h4 class="col-md-12 element-title--sub">
		    <?php
		    	if(get_option('woo_featured_product_description') == true):
					echo do_shortcode(wp_kses_post(get_option( 'woo_featured_product_description')));
			    endif;
			   ?>
		    </h4>

			<div class="fearured-product__slider col-md-12">
			<ul class="slides">
				<?php
				 while ( $loop->have_posts() ) : $loop->the_post();

				 	if ( get_option('woo_featured_product_layout', 'layout-1') == 'layout-1' ) {
						get_template_part( 'template-parts/woo', 'featured-product-1' );
					}
				endwhile;
				?>
			</ul>
			</div>

		</div><!-- Row ends -->
		</div><!-- Container ends -->
		</section>
		<?php else: ?>
		<section class="container-fluid no-results">
		<div class="row">
		<div class="col-md-4 no-results__icon"><i class="fa fa-info-circle"></i></div>
		<div class="col-md-8 no-results__info">
			<h2 class="no-results__title"><?php esc_html_e( 'No Featured Products Set! ', 'bellini' ); ?></h2>
			<ul>
				<li><?php printf( esc_html__( 'This section will display your Featured WooCommerce Products.', 'bellini' ) ); ?></li>
				<li><?php printf( wp_kses( __( 'Ready to set your first Featured Product? Head over to <a href="%1$s">Products</a> and Click on the Star.', 'bellini' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'edit.php?post_type=product' ) ) ); ?></li>
				<li><?php printf( esc_html__( 'To Re-order or Hide this section install "Homepage Control" plugin.', 'bellini' ) ); ?></li>
			</ul>
		</div>
		</div>
		</section><!-- .no-results .not-found -->
		<?php wp_reset_postdata();
	endif; // End the Loop
	endif; // Close the WooCommerce Plugin Check
	endif;
}


/*--------------------------------------------------------------
## WooCommerce Products
--------------------------------------------------------------*/

function bellini_woo_product_newly_arrived(){

if(get_option('bellini_show_frontpage_woo_products', true) == true) :

	if(is_woocommerce_activated()):?>

	<section class="front-new-arrival">
	<div class="bellini__canvas">
	<div class="row">

	<?php
		if(get_option('bellini_product_general_des_pos', 1) == true):
			$column_position_product = absint(get_option('bellini_product_general_des_pos'));
		endif;
	?>

	<div class="<?php echo bellini_section_header_class_switcher($column_position_product);?>">
	<div class="row">
	<?php
	    if(get_option('bellini_woo_product_title') == true):?>
		    <h2 class="col-md-12 element-title element-title--main">
				<?php echo do_shortcode(wp_kses_post(get_option( 'bellini_woo_product_title')));?>
			</h2>
	<?php endif;?>

	<?php
	    if(get_option('bellini_woo_product_description') == true):?>
			<h4 class="col-md-12 element-title--sub">
				<?php echo do_shortcode(wp_kses_post(get_option( 'bellini_woo_product_description')));?>
			</h4>
	<?php endif;?>
	</div>
	</div>

	<?php

		$args = array('post_type' => 'product','no_found_rows' => true,);

		$args['posts_per_page'] = absint(get_option('woo_product_per_page_select', 12));
		$args['orderby'] 		= esc_html( get_option('woo_product_orderby_select', "date"));
		$args['order'] 			= esc_html( get_option('woo_product_order_select', "DESC"));
		$args['product_cat'] 	= esc_html( get_option( 'bellini_woo_category_selector', '' )) ;

		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) { ?>

		<div class="<?php echo bellini_section_content_class_switcher($column_position_product);?>">
		<div class="row">
		<?php

			while ( $loop->have_posts() ) : $loop->the_post();

				if ( esc_attr(get_option('woo_product_new_layout', 'layout-1')) == 'layout-1' ){
					get_template_part( 'template-parts/woo', 'product-1' );
				}

			endwhile; ?>
		</div>
		</div>
			 </div>
			 <?php if(get_option('woo_product_button_text') == true):?>
			    <div class="front__product__cta container container--spaced">
			    <a href="<?php if(get_option('woo_product_button_url') == true): echo esc_url(get_option( 'woo_product_button_url')); endif;?>">
			       	<button class="button button--cta--center" role="button">
						<?php echo do_shortcode(wp_kses_post(get_option( 'woo_product_button_text')));?>
					</button>
				</a>
			    </div>
	    	<?php endif;

		} else {
			echo esc_html_e( 'No Products Found', 'bellini' );
		}
		wp_reset_postdata();
	?>
	</div>
	</section>
<?php
endif;
endif;
}


/*--------------------------------------------------------------
## Frontpage Blogposts
--------------------------------------------------------------*/

function bellini_front_blog_posts(){

if(get_option('bellini_show_frontpage_blog_posts', true) == true) : ?>

<section class="front-blog">
	<div class="bellini__canvas">
	<div class="post-grid row">

    <?php
    	if(get_option('bellini_home_blogposts_title') == true):?>
	    	<h2 class="col-md-12 element-title element-title--main">
				<?php echo do_shortcode(wp_kses_post(get_option( 'bellini_home_blogposts_title')));?>
			</h2>
	<?php endif;?>

    <?php
    	if(get_option('bellini_home_blogposts_description') == true):?>
    		<h4 class="col-md-12 element-title--sub">
				<?php echo do_shortcode(wp_kses_post(get_option( 'bellini_home_blogposts_description')));?>
			</h4>
	<?php endif; ?>


	<?php

		$args = array(
			'post_type' 		=> 'post',
			'posts_per_page' 	=> 6,
			'orderby' 			=> 'date',
			'order' 			=> 'DESC',
			);

		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				if ( esc_attr(get_option('bellini_home_blogposts_layout', 'layout-1')) == 'layout-1' ) :
					get_template_part( 'template-parts/content' );
				endif;
				if ( esc_attr(get_option('bellini_home_blogposts_layout', 'layout-1')) == 'layout-5' ) :
					get_template_part( 'template-parts/content-lb-5');
				endif;
			endwhile;

			if(get_option('bellini_home_blogposts_button_text') == true):?>
		    <div class="front__blog__cta container">
		    <a href="<?php if(get_option('bellini_home_blogposts_button_url') == true): echo esc_url(get_option( 'bellini_home_blogposts_button_url')); endif;?>">
		       	<button class="button button--cta--center" role="button">
					<?php echo do_shortcode(wp_kses_post(get_option( 'bellini_home_blogposts_button_text')));?>
				</button>
			</a>
		    </div>
	    	<?php endif;
		} else {
			get_template_part( 'template-parts/content', 'none' );
		}
		wp_reset_postdata();
	?>
	</div>
	</div>
</section><!-- Front Blog ends -->

<?php
endif;
}


/*--------------------------------------------------------------
## Feature Blocks
--------------------------------------------------------------*/

function bellini_feature_blocks(){
if(get_option('bellini_show_frontpage_feature_block', true) == true) : ?>
<section class="front-feature-blocks">
<div class="bellini__canvas">
<div class="row">
    <?php
    	if(get_option('bellini_feature_blocks_title') == true):?>
	    <h2 class="col-md-12 element-title element-title--main">
			<?php echo do_shortcode(wp_kses_post(get_option( 'bellini_feature_blocks_title')));?>
		</h2>
	<?php endif;?>
	<?php
		if ( esc_attr(get_option('bellini_feature_block_layout', 'layout-1')) == 'layout-1' ){
			get_template_part( 'template-parts/bellini', 'block-1' );
		}
		if ( esc_attr(get_option('bellini_feature_block_layout', 'layout-1')) == 'layout-3' ) {
			get_template_part( 'template-parts/bellini', 'block-3' );
		}
	?>
</div>
</div>
</section>
<?php
endif;
}


function bellini_frontpage_text_field_shortcode(){
 if(get_option('bellini_show_frontpage_text_section', true) == true) : ?>
	<section class="front-text-field">
	<div class="bellini__canvas">
	<div class="row">
	<?php
		if (get_option( 'bellini_frontpage_textarea_section_field') == true):
			echo do_shortcode( wp_kses_post(get_option( 'bellini_frontpage_textarea_section_field')));
		endif;
	?>
	</div>
	</div>
	</section>
<?php  endif;
}