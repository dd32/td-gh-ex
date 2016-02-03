<?php


//Static Slider
function bellini_static_slider() {
	// Check if hero image is set
	if (get_theme_mod( 'bellini_static_slider_image')):
		$bellini_static_slider_image 	= get_theme_mod('bellini_static_slider_image');
	else:
		// Get the default image
		$bellini_static_slider_image = get_template_directory_uri() . '/images/slider.jpg';
	endif;
	?>

	<section class="front__slider__static container-fluid">
    	<img src="<?php echo $bellini_static_slider_image;?>" class="img-responsive"> <!-- Hero Image -->
    	<div class="slider-content">

    	<?php
    	// Hero Image Heading
    	if(get_theme_mod('bellini_static_slider_title', '') !== ''):?>
    		<h3 class="element-title slider-content__title">
				<?php echo get_theme_mod( 'bellini_static_slider_title');?>
			</h3>
	    <?php endif; ?>


    	<?php
    	// Hero Section Content
    	if(get_theme_mod('bellini_static_slider_content', '') !== ''):
			echo get_theme_mod( 'bellini_static_slider_content');
	    endif;
	    ?>

		<?php
		// Check if buttons are set
		if(get_theme_mod('bellini_static_slider_button_text-1', '') !== '' || get_theme_mod('bellini_static_slider_button_text-2', '') !== ''):?>
			<div class="front__blog__cta">
		<?php
		// Button 1
		if(get_theme_mod('bellini_static_slider_button_text-1', '') !== ''):?>
		    <a class="button slider__cta--one" role="button" href="<?php if(get_theme_mod('bellini_static_slider_button_url-1', '') !== ''): echo get_theme_mod( 'bellini_static_slider_button_url-1'); endif;?>">
				<?php echo get_theme_mod( 'bellini_static_slider_button_text-1');?>
			</a>
	    <?php endif;?>

	    <?php
	    // Button 2
		if(get_theme_mod('bellini_static_slider_button_text-2', '') !== ''):?>
		    <a class="button slider__cta--two" role="button" href="<?php if(get_theme_mod('bellini_static_slider_button_url-2', '') !== ''): echo get_theme_mod( 'bellini_static_slider_button_url-2'); endif;?>">
				<?php echo get_theme_mod( 'bellini_static_slider_button_text-2');?>
			</a>
	    <?php endif;?>

		</div>
	    <?php endif;?>

    </div><!-- Slider Content ends-->
</section>
<?php }



//Woo Product Category
function bellini_woo_product_category(){
	if(is_woocommerce_activated()):?>

	<section class="front-product-category" itemscope itemtype="http://schema.org/Offer">
	<div class="container">
	<div class="row">

	<?php if(get_theme_mod('bellini_woo_category_title', '') !== ''):?>
		<h2 class="col-md-12 element-title element-title--main">
		<?php echo get_theme_mod( 'bellini_woo_category_title');?>
		</h2>
	<?php endif;?>

    <?php if(get_theme_mod('bellini_woo_category_description', '') !== ''):?>
        <h4 class="col-md-12 element-title element-title--sub">
			<?php echo get_theme_mod( 'bellini_woo_category_description');?>
		</h4>
	<?php endif;?>

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
	    ?>

		<div itemprop="category" class="front-product-category__card col-md-3 col-sm-6">
		<div class="front-product-category__card__inner">
		<a href="<?php echo $term_link; ?>">
		    <img  src="<?php echo $cat_thumb_url; ?>" class="img-responsive" alt="<?php echo $prod_cat->name; ?>" itemprop="image" />
		    <h3 class="element-title element-title--sub">
		    	<?php echo $prod_cat->name;?>
		    </h3>
		</a>
		</div>
		</div>
	    <?php endforeach;?>
	</div>
	</div>
    </section>

<?php endif;
} //Product Category ends





// Woo Featured Product
function bellini_woo_product_featured(){
	// Check if WooCommerce is Activated
	if(is_woocommerce_activated()):?>

	<?php

	$args = array(
		'post_type' => 'product',
		'post_status' => 'publish',
		'meta_key' => '_featured',
		'meta_value' => 'yes',
		'posts_per_page' => 2
	);
	// Set the Loop Arguments
	$loop = new WP_Query( $args );

	// Fire up the Loop
	if ( $loop->have_posts() ) :?>
		<section class="front__product-featured">
		<div class="container">
		<div class="row">
			<h2 class="col-md-12 element-title element-title--main">
		    	<?php
		    	if(get_theme_mod('woo_featured_product_title', '') !== ''):
					echo get_theme_mod( 'woo_featured_product_title');
			    endif;
			    ?>
    		</h2>
		    <h4 class="col-md-12 element-title element-title--sub">
		    	<?php
		    	if(get_theme_mod('woo_featured_product_description', '') !== ''):
					echo get_theme_mod( 'woo_featured_product_description');
			    endif;
			    ?>
		    </h4>
			<div class="fearured-product__slider col-md-12">
			<ul class="slides">
				<?php
				 while ( $loop->have_posts() ) : $loop->the_post();
					get_template_part( 'template-parts/content', 'featured-product' );
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
}



// Woo Newly Arrived Product
function bellini_woo_product_newly_arrived(){
	if(is_woocommerce_activated()):?>

	<section class="front-new-arrival">
	<div class="container">
	<div class="row">

	    <?php
	    if(get_theme_mod('bellini_woo_product_title', '') !== ''):?>
		    <h2 class="col-md-12 element-title element-title--main">
				<?php echo do_shortcode(get_theme_mod( 'bellini_woo_product_title'));?>
			</h2>
		<?php endif;?>


	    <?php
	    if(get_theme_mod('bellini_woo_product_description', '') !== ''):?>
			<h4 class="col-md-12 element-title element-title--sub">
				<?php echo do_shortcode(get_theme_mod( 'bellini_woo_product_description'));?>
			</h4>
		<?php endif;?>

	<?php
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => 8,
			'orderby' => 'date',
			'order' => 'DESC',
			);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			echo '<div class="col-md-12 products">';
			while ( $loop->have_posts() ) : $loop->the_post();
				get_template_part( 'template-parts/content', 'product' );
			endwhile;?>
			 </div>
			 <?php if(get_theme_mod('woo_product_button_text', '') !== ''):?>
			    <div class="front__blog__cta container container--spaced">
			    <a href="<?php if(get_theme_mod('woo_product_button_url', '') !== ''): echo get_theme_mod( 'woo_product_button_url'); endif;?>">
			       	<button class="button button--cta--center" role="button">
						<?php echo do_shortcode(get_theme_mod( 'woo_product_button_text'));?>
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
	</div>
	</section>
<?php endif;
}




// Front Blog
function bellini_front_blog_posts(){?>

<section class="front-blog">
	<div class="container">
	<div class="row">


    	<?php
    	if(get_theme_mod('bellini_home_blogposts_title', '') !== ''):?>
	    	<h2 class="col-md-12 element-title element-title--main">
				<?php echo do_shortcode(get_theme_mod( 'bellini_home_blogposts_title'));?>
			</h2>
	    <?php endif;?>

    	<?php
    	if(get_theme_mod('bellini_home_blogposts_description', '') !== ''):?>
    		<h4 class="col-md-12 element-title element-title--sub">
				<?php echo do_shortcode(get_theme_mod( 'bellini_home_blogposts_description'));?>
			</h4>
	    <?php endif; ?>


	<?php
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => 3,
			'orderby' => 'date',
			'order' => 'DESC',
			);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				get_template_part( 'template-parts/content' );
			endwhile;

			if(get_theme_mod('bellini_home_blogposts_button_text', '') !== ''):?>
		    <div class="front__blog__cta container">
		    <a href="<?php if(get_theme_mod('bellini_home_blogposts_button_url', '') !== ''): echo get_theme_mod( 'bellini_home_blogposts_button_url'); endif;?>">
		       	<button class="button button--cta--center" role="button">
					<?php echo do_shortcode(get_theme_mod( 'bellini_home_blogposts_button_text'));?>
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

<?php }



function bellini_feature_blocks(){ ?>

<section class="front-feature-blocks">
<div class="container">
	<div class="row">

    <?php
    	if(get_theme_mod('bellini_feature_blocks_title', '') !== ''):?>
	    <h2 class="col-md-12 element-title element-title--main">
			<?php echo do_shortcode(get_theme_mod( 'bellini_feature_blocks_title'));?>
		</h2>
	<?php endif;?>

		<div class="col-md-4 col-sm-4">
		<div class="feature-block__inner text-center">
			<?php if (get_theme_mod('bellini_feature_block_image_one', '') !== ''): ?>
				<img src="<?php echo get_theme_mod('bellini_feature_block_image_one');?>" class="img-responsive">
			<?php endif; ?>

			<div class="feature-block__content">

			<?php if(get_theme_mod('bellini_feature_block_title_one', '') !== ''):?>
		    	<h2 class="element-title"><?php echo do_shortcode(get_theme_mod( 'bellini_feature_block_title_one'));?></h2>
			<?php endif;?>

			<?php if (get_theme_mod('bellini_feature_block_content_one', '') !== ''): ?>
				<p><?php echo do_shortcode(get_theme_mod('bellini_feature_block_content_one')); ?></p>
			<?php endif; ?>
			</div>
		</div>
		</div>

		<div class="col-md-4 col-sm-4">
		<div class="feature-block__inner text-center">
			<?php if (get_theme_mod('bellini_feature_block_image_two', '') !== ''): ?>
				<img src="<?php echo get_theme_mod('bellini_feature_block_image_two');?>" class="img-responsive">
			<?php endif; ?>

			<div class="feature-block__content">
			<?php if(get_theme_mod('bellini_feature_block_title_two', '') !== ''):?>
		    	<h2 class="element-title"><?php echo do_shortcode(get_theme_mod( 'bellini_feature_block_title_two'));?></h2>
			<?php endif;?>

			<?php if (get_theme_mod('bellini_feature_block_content_two', '') !== ''): ?>
				<p><?php echo do_shortcode(get_theme_mod('bellini_feature_block_content_two')); ?></p>
			<?php endif; ?>
			</div>
		</div>
		</div>

		<div class="col-md-4 col-sm-4">
		<div class="feature-block__inner text-center">
			<?php if (get_theme_mod('bellini_feature_block_image_three', '') !== ''): ?>
				<img src="<?php echo get_theme_mod('bellini_feature_block_image_three');?>" class="img-responsive">
			<?php endif; ?>

			<div class="feature-block__content">

			<?php if(get_theme_mod('bellini_feature_block_title_three', '') !== ''):?>
		    	<h2 class="element-title"><?php echo do_shortcode(get_theme_mod( 'bellini_feature_block_title_three'));?></h2>
			<?php endif;?>

			<?php if (get_theme_mod('bellini_feature_block_content_three', '') !== ''): ?>
				<p><?php echo do_shortcode(get_theme_mod('bellini_feature_block_content_three')); ?></p>
			<?php endif; ?>
			</div>
		</div>
		</div>

	</div>
</div>

</section>

<?php }